<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Kondisi;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // home view page
    public function index()
    {
        // Mendapatkan nama pengguna yang sedang login
        $namaPengguna = Auth::user()->nama;

        // Mencari ID peserta berdasarkan nama pengguna
        $idPeserta = Peserta::where('nama', $namaPengguna)->value('id');

        // Jika ID peserta ditemukan, maka kita ambil data nilai berdasarkan kolom nama_peserta
        if ($idPeserta) {
            // Mengambil data nilai yang tidak di-soft delete dan preload data peserta dan kondisi
            // Memfilter keluar nilai yang memiliki kondisi yang telah dihapus
            $dataNilai = Nilai::with(['peserta.waktu', 'kondisi' => function ($query) {
                $query->whereNull('deleted_at'); // Hanya memuat kondisi yang tidak di-soft delete
            }])->where('nama_peserta', $namaPengguna)
                ->whereHas('kondisi', function ($query) {
                    $query->whereNull('deleted_at'); // Memastikan kondisi tidak di-soft delete
                })->whereNull('deleted_at')->get();

            // Menghitung jumlah data nilai
            $jumlahDataNilai = $dataNilai->count();

            // Mencari nilai tertinggi dan terendah
            $nilaiTertinggi = $dataNilai->max('nilai_peserta');
            $nilaiTerendah = $dataNilai->min('nilai_peserta');

            return view('User.Pages.home', compact('dataNilai', 'jumlahDataNilai', 'nilaiTertinggi', 'nilaiTerendah'));
        } else {
            // Jika tidak ditemukan, Anda dapat menangani kasus ini sesuai kebutuhan Anda
            return redirect()->route('login')->with('error', 'Peserta tidak ditemukan.');
        }
    }




    // public function cetakPDF()
    // {
    //     try {
    //         $userId = Auth::user()->id; // Mendapatkan ID pengguna yang sedang login

    //         // Mengambil data nilai yang tidak di-soft delete dan preload data peserta dan kondisi
    //         // Memfilter keluar nilai yang memiliki kondisi yang telah dihapus
    //         // Filter untuk hanya mengambil nilai dari pengguna yang sedang login
    //         $nilaiPrint = Nilai::with(['peserta.waktu', 'kondisi' => function ($query) {
    //             $query->whereNull('deleted_at'); // Hanya memuat kondisi yang tidak di-soft delete
    //         }])->whereHas('kondisi', function ($query) {
    //             $query->whereNull('deleted_at'); // Memastikan kondisi tidak di-soft delete
    //         })->where('user_id', $userId) // Filter nilai berdasarkan user_id
    //             ->whereNull('deleted_at')
    //             ->get();

    //         $data = [
    //             'title' => 'Rekap Nilai Peserta',
    //             'date' => date('m/d/Y'),
    //             'nilai' => $nilaiPrint
    //         ];

    //         $pdf = PDF::loadView('User.Components.nilai_pdf', $data);
    //         // Menggunakan response()->stream() untuk menampilkan PDF di browser
    //         return $pdf->stream('Nilai_' . $userId . '.pdf'); // Menambahkan user_id ke nama file
    //     } catch (\Exception $e) {
    //         // Log error atau handle error sesuai kebutuhan
    //         return redirect()->route('user')->with('error', 'Gagal mendownload PDF: ' . $e->getMessage());
    //     }
    // }

    // public function cetakPDF()
    // {
    //     if (Auth::check()) {
    //         $userId = Auth::user()->id;
    //         $nilaiPrint = Nilai::where('id_peserta', $userId)->get();

    //         if ($nilaiPrint->isEmpty()) {
    //             dd('Tidak ada data nilai');
    //         }
    //         $data = [
    //             'title' => 'Rekap Nilai Peserta',
    //             'date' => date('m/d/Y'),
    //             'nilai' => $nilaiPrint
    //         ];

    //         $pdf = PDF::loadView('User.Components.nilai_pdf', $data); // Gunakan $data di sini
    //         return $pdf->download('Nilai_' . $userId . '.pdf');
    //     } else {
    //         dd('User tidak terautentikasi');
    //     }
    // }

    public function cetakPDF()
{
    if (Auth::check()) {
        $userName = Auth::user()->nama; // Ambil nama pengguna yang terautentikasi

        // Mengecek nilai berdasarkan nama_peserta
        $nilaiPrint = Nilai::where('nama_peserta', $userName)->get();

        // Mengecek apakah ada data nilai yang ditemukan
        if ($nilaiPrint->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data nilai.');
        }

        $data = [
            'title' => 'Rekap Nilai Peserta',
            'date' => date('m/d/Y'),
            'nilai' => $nilaiPrint,
        ];

        $pdf = PDF::loadView('User.Components.nilai_pdf', $data); // Gunakan $data di sini
        return $pdf->stream('Nilai_' . $userName . '.pdf');
    } else {
        dd('User tidak terautentikasi');
    }
}

    // profil view page
    public function profil()
    {
        $userDetails = Peserta::find(Auth::user()->id);
        return view('User.Pages.profil', compact('userDetails'));
    }

    public function updateUser(Request $request, $nama)
    {
        // Cari semua pengguna dengan nama yang sama
        $users = Peserta::where('nama', $nama)->get();

        if ($users->isEmpty()) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        foreach ($users as $user) {
            // Simpan nama lama untuk update tabel Nilai
            $oldName = $user->nama;

            // Perbarui data pengguna
            $user->nama = $request->input('first-name', $user->nama); // Jaga nama tetap sama jika tidak ada input baru
            $user->username = $request->input('nickname', $user->username);
            $user->password = bcrypt($request->input('password'));
            $user->alamat = $request->input('address', $user->alamat);
            $user->posisi = $request->input('position', $user->posisi);
            $user->klub = $request->input('club', $user->klub);
            $user->save(); // Simpan perubahan

            // Perbarui nama_peserta di tabel Nilai jika nama berubah
            if ($oldName != $user->nama) {
                Nilai::where('nama_peserta', $oldName)->update(['nama_peserta' => $user->nama]);
            }
        }

        alert()->success('Sukses!', 'Data berhasil diubah');
        return redirect()->route('user.profil');
    }
}
