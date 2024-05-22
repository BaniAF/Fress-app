@extends('Admin.app')
@section('title')
    Admin - Nilai
@endsection
@section('content')
    @include('sweetalert::alert')
    <main class="py-10 lg:pl-72">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="bg-white">
                <main class="isolate">
                    <div class="rounded-lg shadow-sm bg-gray-50 bg-opacity-45">
                        <div>
                            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                                Penilaian</h2>
                        </div>
                        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                            {{-- styling bg --}}
                            {{-- <div class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                                aria-hidden="true">
                                <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30"
                                    style="clip-path: polygon(63.1% 29.5%, 100% 17.1%, 76.6% 3%, 48.4% 0%, 44.6% 4.7%, 54.5% 25.3%, 59.8% 49%, 55.2% 57.8%, 44.4% 57.2%, 27.8% 47.9%, 35.1% 81.5%, 0% 97.7%, 39.2% 100%, 35.2% 81.4%, 97.2% 52.8%, 63.1% 29.5%)">
                                </div>
                            </div> --}}
                            <div class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                                aria-hidden="true">
                                <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-br from-[#66FFCC] to-[#FF99CC] opacity-40"
                                    style="clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 80%)">
                                </div>
                            </div>
                            <div class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                                aria-hidden="true">
                                <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-r from-[#FFD700] to-[#FF6347] opacity-50"
                                    style="clip-path: polygon(0 10%, 100% 0, 100% 90%, 0% 100%)">
                                </div>
                            </div>

                            {{-- form nilai --}}
                            <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3">
                                <div class="px-4 sm:px-0">
                                    <h2 class="text-xl font-bold leading-7 text-gray-900">Penilaian Atlet
                                    </h2>
                                    <p class="mt-1 text-sm leading-6 text-gray-600">masukkan nilai atlet yang ingin didata.
                                    </p>
                                </div>

                                <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2"
                                    action="{{ route('simpan.nilai') }}" method="POST">
                                    @csrf
                                    <div class="px-4 py-6 sm:p-8">
                                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                            <div class="sm:col-span-6">
                                                <label for="peserta"
                                                    class="block text-md font-bold leading-6 text-gray-900">Pilih
                                                    Atlet</label>
                                                <div class="mt-2">
                                                    <select id="peserta" name="peserta" autocomplete="country-name"
                                                        class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                        <option value="" selected disabled>Pilih Atlet</option>
                                                        @foreach ($dataPeserta as $peserta)
                                                            <option value="{{ $peserta->id }}"
                                                                data-waktu="{{ $peserta->waktu ? $peserta->waktu->nama_waktu : '0' }}">
                                                                {{ $peserta->nama }} 
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-6">
                                                <label for=""
                                                    class="block text-md font-bold leading-6 text-gray-900">Hasil Nilai
                                                    Atlet</label>
                                                <p class="mt-1 text-sm leading-6 text-gray-600">Masukkan Nilai yang didapat
                                                    Atlet (dalam angka).
                                                </p>
                                                <div class="mt-2">
                                                    <input type="number" name="nilai_peserta" id="nilai_peserta"
                                                        class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                                        <button type="submit"
                                            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">Save
                                        </button>
                                    </div>
                                </form>
                            </div>

                            {{-- tabel peserta --}}

                            <div class="bg-white px-6 py-6 rounded-md shadow-md mt-14">
                                <div class="mt-8 flow-root">
                                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                            <div class="flex justify-between items-center  py-6">
                                                <h2 class="text-2xl font-bold mb-4">Daftar Nilai Peserta</h2>
                                                <div class="mt-4">
                                                    <button
                                                        class="bg-blue-500 hover:bg-blue-600  font-bold py-2 px-4 rounded">
                                                        <a href="{{ route('cetak.nilai') }}"
                                                            class="block w-full h-full text-center text-white hover:text-gray-600 hover:no-underline">
                                                            Download PDF
                                                        </a> 
                                                    </button>
                                                </div>
                                            </div>
                                            <table id="tabelPeserta"
                                                class="min-w-full divide-y divide-gray-300 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg items-center justify-center text-center">
                                                <thead class="bg-gray-800 text-white text-center">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                                                            Nama
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                                                            Alamat
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                                                            Posisi
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                                                            Klub
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                                                            Nilai
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                                                            Hasil Akhir
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                                                            Waktu
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                                                            Aksi
                                                        </th>
                                                    </tr>
                                                </thead>
                                                {{-- <tbody class="bg-white divide-y divide-gray-200 ">
                                                    @foreach ($dataNilai as $nilai)
                                                        @if (isset($nilai->peserta) && isset($nilai->peserta->waktu))
                                                            <tr class="hover:bg-gray-100">
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                    {{ $nilai->peserta->nama }}
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    {{ $nilai->peserta->alamat }}
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    {{ $nilai->peserta->posisi }}
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    {{ $nilai->peserta->klub }}
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    {{ $nilai->nilai_peserta }} Points
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                        {{ $nilai->kondisi->nilai_huruf }} 
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                                                    data-detik="{{ $nilai->peserta->waktu->nama_waktu }}"
                                                                    >
                                                                    {{$nilai->peserta->id_waktu}}
                                                                    <!-- Tempat untuk menampilkan waktu yang sudah diformat -->
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                                    <form action="{{ route('hapus.nilai', $nilai->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="text-red-600 hover:text-red-900">Delete</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody> --}}
                                                <tbody class="bg-white divide-y divide-gray-200 ">
                                                    @forelse ($dataNilai as $nilai)
                                                        @if (isset($nilai->peserta) && isset($nilai->peserta->waktu))
                                                            <tr class="hover:bg-gray-100">
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                    {{ $nilai->peserta->nama }}
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    {{ $nilai->peserta->alamat }}
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    {{ $nilai->peserta->posisi }}
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    {{ $nilai->peserta->klub }}
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    {{ $nilai->nilai_peserta }} Points
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    {{ $nilai->kondisi->nilai_huruf }}
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                                                    data-detik="{{ $nilai->peserta->waktu->nama_waktu }}">
                                                                    {{ $nilai->peserta->id_waktu }}
                                                                    <!-- Tempat untuk menampilkan waktu yang sudah diformat -->
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                                    <form action="{{ route('hapus.nilai', $nilai->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="text-red-600 hover:text-red-900">Delete</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @empty
                                                        <tr>
                                                            <td colspan="8"
                                                                class="text-center py-4 text-sm text-gray-500">
                                                                Tidak ada data
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const options = document.querySelectorAll('#peserta option[data-waktu]');
            options.forEach(option => {
                const detik = parseInt(option.getAttribute('data-waktu'), 10);
                if (detik > 59) {
                    const menit = Math.floor(detik / 60);
                    const sisaDetik = detik % 60;
                    const waktuFormatted = `${menit} menit ${sisaDetik} detik`;
                    option.textContent = `${option.textContent} - ${waktuFormatted}`;
                } else if (detik > 0) {
                    option.textContent = `${option.textContent} - ${detik} detik`;
                } else {
                    option.textContent = `${option.textContent} - Waktu Tidak Tersedia`;
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mengambil semua elemen <td> yang memiliki atribut 'data-detik'
            const waktuElements = document.querySelectorAll('td[data-detik]');

            waktuElements.forEach(element => {
                const detik = parseInt(element.getAttribute('data-detik'), 10);
                let waktuFormatted = '';

                if (detik > 59) {
                    console.log("Data Detik ", detik);
                    const menit = Math.floor(detik / 60);
                    const sisaDetik = detik % 60;
                    if (sisaDetik == 0) {
                        waktuFormatted = `${menit} menit`;
                    } else {
                        waktuFormatted = `${menit} menit ${sisaDetik} detik`;
                    }
                } else {
                    waktuFormatted = `${detik} detik`;
                }

                // Memperbarui teks elemen dengan waktu yang sudah diformat
                element.textContent = waktuFormatted;
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#tabelPeserta').DataTable();
        });
    </script>
@endsection
