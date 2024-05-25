<?php

namespace App\Http\Controllers;

use App\Models\time;
use App\Models\Nilai;
use App\Models\Kondisi;
use App\Models\Peserta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Providers\Services\firebaseService;
use Ramsey\Uuid\Type\Time as TypeTime;
use Spatie\FlareClient\Time\Time as TimeTime;

class AdminController extends Controller
{
    protected $database;
    public function __construct()
    {
        $this->database = firebaseService::connect();
    }
    public function index()
{
    $dataPeserta = Peserta::all()->unique('nama');
    $totalPeserta = $dataPeserta->count();
    $dataKondisi = Kondisi::all();
    $totalKondisi = $dataKondisi->count();
    $dataWaktu = Time::all();
    $idWaktuPeserta = Peserta::pluck('id_waktu');
    $dataWaktuPeserta = Peserta::whereIn('id_waktu', $idWaktuPeserta)->orderBy('nama')->get();

    return view('Admin.Pages.home', compact('dataPeserta', 'dataWaktu', 'dataWaktuPeserta', 'totalPeserta', 'totalKondisi', 'idWaktuPeserta'));
}

// public function index()
// {
//     // Get distinct participants with their corresponding time names
//     $dataPeserta = Peserta::select('peserta.nama', 'peserta.id', 'peserta.id_waktu', 'times.nama_waktu')
//         ->join('times', 'peserta.id_waktu', '=', 'times.id')
//         ->orderBy('peserta.nama')
//         ->get()
//         ->groupBy('nama');

//     // Prepare an array to hold unique participant names and their corresponding id_waktu
//     $uniquePeserta = [];

//     foreach ($dataPeserta as $nama => $pesertaGroup) {
//         foreach ($pesertaGroup as $peserta) {
//             $uniquePeserta[$nama][] = [
//                 'id' => $peserta->id,
//                 'id_waktu' => $peserta->id_waktu,
//                 'nama_waktu' => $peserta->nama_waktu,
//             ];
//         }
//     }

//     // Count the total number of unique participants
//     $totalPeserta = count($uniquePeserta);

//     // Fetch all data from the Kondisi table
//     $dataKondisi = Kondisi::all();
//     $totalKondisi = $dataKondisi->count();

//     // Fetch all data from the Time table
//     $dataWaktu = Time::all();

//     return view('Admin.Pages.home', compact('uniquePeserta', 'dataWaktu', 'totalPeserta', 'totalKondisi'));
// }

    public function storeFirebase(Request $request)
    {
        $reference = $this->database->getReference('tb_database');
        if (!$reference->getSnapshot()->exists()) {
            $reference->set([]);
        }

        if ($request->has('waktuDetik')) {
            // Jika permintaan memiliki data 'waktuDetik', maka proses sebagai permintaan start
            $waktuDetik = $request->input('waktuDetik');
            $newData = [
                'koneksi' => 'Start',
                'waktu' => $waktuDetik,
            ];
        } else {
            // Jika tidak, maka proses sebagai permintaan stop
            $newData = [
                'koneksi' => 'Stop',
            ];
        }

        $reference->update($newData);

        alert()->success('Success', 'Data Tersimpan');
        return redirect()->back();
    }

    public function editWaktu(Request $request)
    {
        $idPeserta = $request->participantSelect;

        // Mencari peserta berdasarkan ID
        $editPeserta = Peserta::find($idPeserta);

        // Jika peserta tidak ditemukan
        if (!$editPeserta) {
            return "Peserta dengan ID $idPeserta tidak ditemukan.";
        }

        // Mendapatkan waktu baru dari input form
        $idWaktuBaru = $request->input('hourSelect');

        // Mencari data terkait dengan id_peserta yang sebelumnya diubah
        $dataTerkait = Peserta::where('id', $idPeserta)->get();

        // Jika ada data terkait
        if ($dataTerkait->isNotEmpty()) {
            foreach ($dataTerkait as $data) {
                // Jika id_waktu pada data terkait belum memiliki nilai
                if ($data->id_waktu === null) {
                    $data->id_waktu = $idWaktuBaru;
                    $data->save();
                } else {
                    // Buat data baru berdasarkan data terkait dengan id_waktu yang baru
                    $dataBaru = new Peserta();
                    $dataBaru->id = 'AK' . str_pad(Peserta::count() + 1, 3, '0', STR_PAD_LEFT);
                    $dataBaru->nama = $data->nama;
                    $dataBaru->username = $data->username;
                    $dataBaru->alamat = $data->alamat;
                    $dataBaru->email = $data->email;
                    $dataBaru->password = $data->password;
                    $dataBaru->password_lihat = $data->password_lihat;
                    $dataBaru->posisi = $data->posisi;
                    $dataBaru->klub = $data->klub;
                    $dataBaru->id_waktu = $idWaktuBaru;
                    $dataBaru->save();
                }
            }
        }

        return redirect('admin');
    }


    // Kontroller Peserta


    public function peserta()
    {
        $peserta = Peserta::all()->unique('nama');

        return view('Admin.Pages.peserta', compact('peserta'));
    }




    public function editpeserta($pesertaId)
    {
        // dd($pesertaId);
        // Menggunakan metode find() untuk mencari peserta berdasarkan ID
        $editpeserta = Peserta::find($pesertaId);

        // Periksa apakah peserta ditemukan
        if (!$editpeserta) {
            return "Peserta dengan ID $pesertaId tidak ditemukan.";
        }

        // Jika peserta ditemukan, kirimkan data peserta ke tampilan
        return view('Admin.Pages.peserta', compact('editpeserta'));
    }


    public function updatepeserta(Request $request, $pesertaId)
    {
        $peserta = Peserta::findOrFail($pesertaId);

        // dd($request->all());
        // Perbarui password hanya jika diisi
        if ($request->filled('password')) {
            $peserta->password = bcrypt($request->input('password'));
            $peserta->password = $request->input('password');
        }
        $peserta->email = $request->input('email');

        $peserta->save();
        alert()->success('Sukses!', 'Data Peserta Diperbaharui!');
        return redirect()->route('admin.peserta');
    }


    // Controller Kondisi

    public function kondisi()
    {
        // Mengambil data kondisi yang belum dihapus dari model Kondisi
        $kondisiList = Kondisi::whereNull('deleted_at')->orderBy('id_waktu', 'asc')->get();
        $timeList = Time::all();
        // Mengambil data waktu dari model Time dan melakukan join berdasarkan id_waktu dari kondisiList
        $waktuList = Time::join('kondisi', 'times.id', '=', 'kondisi.id_waktu')
            ->whereNull('kondisi.deleted_at')
            ->orderBy('times.nama_waktu')
            ->pluck('times.nama_waktu', 'times.id')
            ->toArray();

        // Mengirimkan data ke tampilan 'Admin.Pages.kondisi'
        return view('Admin.Pages.kondisi', compact('kondisiList', 'waktuList', 'timeList'));
    }

    public function delete($id)
    {
        $kondisi = Kondisi::find($id);

        // Cek apakah kondisi ditemukan
        if ($kondisi) {
            // Coba hapus referensi id_kondisi di tabel nilai dan cek apakah ada yang terhapus
            $deletedRows = Nilai::where('id_kondisi', $id)->delete();

            // Jika ada baris yang terhapus, baru hapus kondisi
            if ($deletedRows > 0) {
                $kondisi->delete();
                alert()->success('Sukses!', 'Hapus Data Berhasil!');
            } else {
                alert()->info('Informasi', 'Tidak ada data nilai yang terkait, kondisi tidak dihapus.');
            }

            return redirect()->route('admin.kondisi');
        } else {
            alert()->error('Gagal!', 'Data tidak ditemukan!');
            return redirect()->route('admin.kondisi');
        }
    }

    public function storewaktu(Request $request)
    {
        $request->validate([
            'name' => 'required|integer', // Ubah validasi sesuai kebutuhan Anda
        ]);

        time::create([
            'nama_waktu' => $request->name,
        ]);
        alert()->success('Sukses!', 'Waktu telah ditambahkan!');
        return redirect()->back();
    }

    public function storekondisi(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'waktu' => 'required',
            'nilai-huruf' => 'required|string',
            'range-awal' => 'required|string',
            'range-akhir' => 'required|string',
        ]);


        // Cek apakah ada editId yang dikirimkan
        if ($request->input('editId') != null) {
            // Jika ada, maka lakukan update data
            $kondisi = Kondisi::find($request->input('editId'));
            if (!$kondisi) {
                return redirect()->back()->with('error', 'Kondisi penilaian tidak ditemukan!');
            }

            // Update data berdasarkan input yang diterima
            $kondisi->nilai_huruf = $request->input('nilai-huruf');
            $kondisi->nilai_min = $request->input('range-awal');
            $kondisi->nilai_max = $request->input('range-akhir');
            $kondisi->id_waktu = $request->input('waktu');
            $kondisi->save();
            alert()->success('Sukses!', 'Data berhasil diubah');
            return redirect()->route('admin.kondisi');
        } else {
            // Jika tidak ada editId, maka lakukan penyimpanan baru
            // dd($request->all());
            // Hitung total Kondisi untuk menentukan id baru
            $totalKondisi = Kondisi::count();

            // Buat objek Kondisi baru
            $kondisi = new Kondisi([
                'id' => kondisi::generateNewId(),
                'nilai_huruf' => $request->input('nilai-huruf'),
                'nilai_min' => $request->input('range-awal'),
                'nilai_max' => $request->input('range-akhir'),
                'id_waktu' => $request->input('waktu'),
            ]);

            // Simpan objek Kondisi ke dalam database
            $kondisi->save();

            alert()->success('Sukses!', 'Data berhasil disimpan');
            // Setelah berhasil, Anda dapat mengarahkan pengguna ke halaman lain atau memberikan respons sesuai kebutuhan
            return redirect()->route('admin.kondisi');
        }
    }

    // Controller Nilai

    // public function penilaian()
    // {
    //     // Mengambil semua data peserta termasuk yang di-soft delete
    //     $dataPeserta = Peserta::with(['waktu'])->withTrashed()->get();

    //     // Mengambil data nilai yang tidak di-soft delete dan preload data peserta dan kondisi
    //     // Memfilter keluar nilai yang memiliki kondisi yang telah dihapus
    //     $dataNilai = Nilai::with(['peserta.waktu', 'kondisi' => function ($query) {
    //         $query->whereNull('deleted_at'); // Hanya memuat kondisi yang tidak di-soft delete
    //     }])->whereHas('kondisi', function ($query) {
    //         $query->whereNull('deleted_at'); // Memastikan kondisi tidak di-soft delete
    //     })->whereNull('deleted_at')->get();


    //     // dd($dataNilai);
    //     // Mengirimkan data ke tampilan 'Admin.Pages.nilai'
    //     return view('Admin.Pages.nilai', compact('dataPeserta', 'dataNilai'));
    // }

    public function penilaian()
    {
        // Mengambil semua data peserta termasuk yang di-soft delete
        $dataPeserta = Peserta::with(['waktu'])->get();
        // dd($dataPeserta);

        // Mengambil data nilai yang tidak di-soft delete dan preload data peserta dan kondisi
        // Memfilter keluar nilai yang memiliki kondisi yang telah dihapus
        $dataNilai = Nilai::with(['peserta.waktu', 'kondisi' => function ($query) {
            $query->whereNull('deleted_at'); // Hanya memuat kondisi yang tidak di-soft delete
        }])->whereHas('kondisi', function ($query) {
            $query->whereNull('deleted_at'); // Memastikan kondisi tidak di-soft delete
        })->whereNull('deleted_at')->get();

        // Cek apakah data peserta atau data nilai kosong
        // if ($dataPeserta->isEmpty() || $dataNilai->isEmpty()) {
        //     return view('Admin.Pages.nilai', ['message' => 'Tidak ada rekaman data']);
        // }

        // Mengirimkan data ke tampilan 'Admin.Pages.nilai'
        return view('Admin.Pages.nilai')->with([
            'dataNilai' => $dataNilai,
            'dataPeserta' => $dataPeserta
        ]);
    }


    // public function storeNilai(Request $request)
    // {

    //     $dataNilai = Nilai::count();

    //     $nilai = new Nilai([
    //         'id' => 'N' . str_pad($dataNilai + 1, 2, '0', STR_PAD_LEFT),
    //         'id_peserta' => $request->input('peserta'),
    //         'nilai_peserta' => $request->input('nilai_peserta'),
    //     ]);

    //     // Simpan objek nilai ke dalam database
    //     $nilai->save();

    //     alert()->success('Sukses!', 'Nilai telah ditambahkan!');
    //     return redirect()->route('admin.nilai');
    // }

    // public function storeNilai(Request $request)
    // {
    //     $dataNilai = Nilai::count();

    //     // Mendapatkan ID dan nama peserta dari input
    //     $idPeserta = $request->input('peserta');
    //     $namaPeserta = Peserta::find($idPeserta)->nama; // Mendapatkan nama peserta berdasarkan ID

    //     // Membuat objek Nilai baru dengan data yang diberikan
    //     $nilai = new Nilai([
    //         'id' => 'N' . str_pad($dataNilai + 1, 2, '0', STR_PAD_LEFT),
    //         'id_peserta' => $idPeserta,
    //         'nama_peserta' => $namaPeserta, // Menyimpan nama peserta dalam kolom nama_peserta
    //         'nilai_peserta' => $request->input('nilai_peserta'),
    //     ]);

    //     // Simpan objek nilai ke dalam database
    //     $nilai->save();

    //     alert()->success('Sukses!', 'Nilai telah ditambahkan!');
    //     return redirect()->route('admin.nilai');
    // }

    // public function storeNilai(Request $request)
    // {
    //     $dataNilai = Nilai::count();

    //     // Mendapatkan ID dan nama peserta dari input
    //     $idPeserta = $request->input('peserta');
    //     $peserta = Peserta::find($idPeserta);
    //     $namaPeserta = $peserta->nama;
    //     $idWaktuPeserta = $peserta->id_waktu; // Mengambil id_waktu dari peserta

    //     // Mendapatkan nilai_peserta dari input
    //     $nilaiPeserta = $request->input('nilai_peserta');

    //     // Menentukan id_kondisi berdasarkan nilai_peserta dan id_waktu
    //     $kondisi = Kondisi::where('nilai_min', '<=', $nilaiPeserta)
    //         ->where('nilai_max', '>=', $nilaiPeserta)
    //         ->where('id_waktu', $idWaktuPeserta) // Memastikan id_waktu sesuai
    //         ->first();

    //     // Membuat objek Nilai baru dengan data yang diberikan
    //     $nilai = new Nilai([
    //         'id' => 'N' . str_pad($dataNilai + 1, 2, '0', STR_PAD_LEFT),
    //         'id_peserta' => $idPeserta,
    //         'nama_peserta' => $namaPeserta,
    //         'nilai_peserta' => $nilaiPeserta,
    //         'id_kondisi' => $kondisi ? $kondisi->id : null, // Menyimpan id_kondisi jika kondisi ditemukan
    //     ]);

    //     // Simpan objek nilai ke dalam database
    //     $nilai->save();

    //     alert()->success('Sukses!', 'Nilai telah ditambahkan!');
    //     return redirect()->route('admin.nilai');
    // }

    public function storeNilai(Request $request)
    {
        $dataNilai = Nilai::count();

        // Mendapatkan ID dan nama peserta dari input
        $idPeserta = $request->input('peserta');
        $peserta = Peserta::find($idPeserta);
        $namaPeserta = $peserta->nama;
        $idWaktuPeserta = $peserta->id_waktu;

        // Mendapatkan nilai_peserta dari input
        $nilaiPeserta = $request->input('nilai_peserta');
        $nilaiPesertaInt = intval($nilaiPeserta);

        // Memastikan hanya memilih kondisi yang tidak di-soft delete
        $kondisi = Kondisi::where('id_waktu', $idWaktuPeserta)
            ->where('nilai_min', '<=', $nilaiPesertaInt)
            ->where('nilai_max', '>=', $nilaiPesertaInt)
            ->whereNull('deleted_at')
            ->first();

        if ($kondisi === null) {
            alert()->error('Gagal!', 'Nilai kondisi tidak ada!');
        } else {
            // Membuat objek Nilai baru dengan data yang diberikan
            $nilai = new Nilai([
                'id' => Nilai::generateNewId(),
                'id_peserta' => $idPeserta,
                'nama_peserta' => $namaPeserta,
                'nilai_peserta' => $nilaiPeserta,
                'id_kondisi' => $kondisi->id,
            ]);

            // Simpan objek nilai ke dalam database
            $nilai->save();

            alert()->success('Sukses!', 'Nilai telah ditambahkan!');
        }

        return redirect()->route('admin.nilai');
    }


    // public function storeNilai(Request $request)
    // {
    //     $dataNilai = Nilai::count();
    //     // dd($dataNilai);

    //     // Mendapatkan ID dan nama peserta dari input
    //     $idPeserta = $request->input('peserta');
    //     $peserta = Peserta::find($idPeserta);
    //     $namaPeserta = $peserta->nama;
    //     $idWaktuPeserta = $peserta->id_waktu; // Mengambil id_waktu dari peserta
    //     // dd($idWaktuPeserta);

    //     // Mendapatkan nilai_peserta dari input
    //     $nilaiPeserta = $request->input('nilai_peserta');
    //     $nilaiPesertaInt = intval($nilaiPeserta);
    //     // dd($nilaiPeserta);
    //     // Memastikan hanya memilih kondisi yang tidak di-soft delete
    //     $kondisi = Kondisi::where('id_waktu', $idWaktuPeserta)
    //         ->where('nilai_min', '<=', $nilaiPesertaInt)
    //         ->where('nilai_max', '>=', $nilaiPesertaInt)
    //         ->whereNull('deleted_at') // Menambahkan kondisi untuk mengabaikan yang di-soft delete
    //         ->first();
    //     // $idKondisi = $kondisi->id;

    //     if ($kondisi === NULL) {
    //         alert()->error('Gagal!', 'Nilai kondisi tidak ada!');
    //     } else {
    //         // Membuat objek Nilai baru dengan data yang diberikan
    //         $nilai = new Nilai([
    //             'id' => 'N' . str_pad($dataNilai + 1, 2, '0', STR_PAD_LEFT),
    //             'id_peserta' => $idPeserta,
    //             'nama_peserta' => $namaPeserta,
    //             'nilai_peserta' => $nilaiPeserta,
    //             'id_kondisi' => $kondisi ? $kondisi->id : null,
    //         ]);

    //         // Simpan objek nilai ke dalam database
    //         $nilai->save();

    //         alert()->success('Sukses!', 'Nilai telah ditambahkan!');
    //     }
    //     return redirect()->route('admin.nilai');
    // }



    public function deleteNilai($id)
    {
        try {
            // Mencari nilai berdasarkan ID
            $nilai = Nilai::findOrFail($id);

            // Menghapus nilai menggunakan soft delete
            $nilai->delete();

            // Redirect ke halaman sebelumnya dengan pesan sukses
            alert()->success('Sukses!', 'Data Telah Dihapus!');
            return back();
        } catch (\Exception $e) {
            // Redirect ke halaman sebelumnya dengan pesan error
            alert()->error('Gagal!', 'Data tidak Dihapus: ' . $e->getMessage() . '!');
            return back();
        }
    }


    public function cetakPDF()
    {
        try {
            // Mengambil data nilai yang tidak di-soft delete dan preload data peserta dan kondisi
            // Memfilter keluar nilai yang memiliki kondisi yang telah dihapus
            $nilaiPrint = Nilai::with(['peserta.waktu', 'kondisi' => function ($query) {
                $query->whereNull('deleted_at'); // Hanya memuat kondisi yang tidak di-soft delete
            }])->whereHas('kondisi', function ($query) {
                $query->whereNull('deleted_at'); // Memastikan kondisi tidak di-soft delete
            })->whereNull('deleted_at')->get();

            $data = [
                'title' => 'Rekap Nilai Peserta (Admin)',
                'date' => date('m/d/Y'),
                'nilai' => $nilaiPrint
            ];

            $pdf = PDF::loadView('Admin.Components.nilai_pdf', $data);
            // Menggunakan response()->stream() untuk menampilkan PDF di browser
            return $pdf->stream('Nilai.pdf');
        } catch (\Exception $e) {
            // Log error atau handle error sesuai kebutuhan
            return redirect()->route('admin.nilai')->with('error', 'Gagal mendownload PDF: ' . $e->getMessage());
        }
    }
}
