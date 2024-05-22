@extends('Admin.app')
@section('title')
    Admin - Kondisi
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
                                Indikator Penilaian</h2>
                        </div>
                        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
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
                            {{-- isi dari card kondisi --}}
                            <div>
                                <h2 class="text-lg font-bold text-gray-500">Daftar Indikator Nilai</h2>
                                <ul role="list"
                                    class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 sm:gap-6 lg:grid-cols-3">
                                    {{-- @if ($kondisiList->isEmpty())
                                        <li class="col-span-1 flex rounded-md shadow-sm">
                                            <div class="flex flex-1 items-center justify-center bg-white px-4 py-2">
                                                <p class=" text-sm lg:text-lg text-red-600">*Tidak ada data</p>
                                            </div>
                                        </li>
                                    @else --}}
                                    @foreach ($kondisiList as $kondisi)
                                        <li class="col-span-1 flex rounded-md shadow-sm">
                                            <div
                                                class="flex w-16 flex-shrink-0 items-center justify-center bg-gradient-to-r from-cyan-500 to-blue-500 rounded-l-md text-md font-bold text-md lg:text-2xl text-white">
                                                {{ $kondisi->nilai_huruf }}
                                            </div>
                                            <div
                                                class="flex flex-1 items-center justify-between truncate rounded-r-md border-b border-r border-t border-gray-200 bg-white px-4 py-2">
                                                <div class="w-1/2">
                                                    <p class="font-bold text-sm lg:text-xl text-gray-900">
                                                        {{ $kondisi->nilai_min }} - {{ $kondisi->nilai_max }} Point</p>
                                                    <p class="font-medium text-gray-900">
                                                        @php
                                                            $waktu = $waktuList[$kondisi->id_waktu];
                                                            $menit = floor($waktu / 60);
                                                            $detik = $waktu % 60;
                                                        @endphp
                                                        @if ($menit > 0)
                                                            {{ $menit }} menit
                                                        @endif
                                                        @if ($detik > 0)
                                                            {{ $detik }} detik
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="w-1/4 flex-row justify-between">
                                                    <!-- Button Edit -->
                                                    <div class="flex-column">
                                                        <button
                                                            class="bg-indigo-500 hover:bg-indigo-900  rounded-md px-2 py-1 font-bold text-white mb-2 editButton"
                                                            data-id="{{ $kondisi->id }}"
                                                            data-nilai-huruf="{{ $kondisi->nilai_huruf }}"
                                                            data-nilai-min="{{ $kondisi->nilai_min }}"
                                                            data-nilai-max="{{ $kondisi->nilai_max }}"
                                                            data-id-waktu="{{ $kondisi->id_waktu }}">Edit</button>
                                                        <!-- Button Delete -->
                                                    </div>
                                                    <form action="{{ route('kondisi.softdelete', $kondisi->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="bg-red-500 rounded-md  px-2 py-1 text-sm font-bold text-white hover:bg-red-600">Delete</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </li>
                                    @endforeach
                                    {{-- @endif --}}
                                </ul>
                            </div>

                            <div class="pt-1 bg-white rounded-md px-4 py-3 mt-10 shadow-md">
                                <form method="POST" action="{{ route('tambah.waktu') }}">
                                    @csrf
                                    <label for="name"
                                        class="block text-md font-bold leading-4 mt-4 text-gray-900">Tambah
                                        Waktu</label>
                                    <div class="relative mt-2">
                                        <div class="flex items-center gap-x-2">
                                            <input type="text" name="name" id="name"
                                                class="block w-80 focus:border-white bg-gray-50 py-2 px-2 text-gray-900 focus:ring-0 sm:text-sm lg:text-lg sm:leading-6"
                                                placeholder="Contoh : 120">
                                            <span class="text-danger">* Waktu dalam satuan detik</span>
                                        </div>

                                    </div>
                                    <button type="submit"
                                        class="mt-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-1 px-2 rounded">Tambah
                                        Waktu</button>
                                </form>
                            </div>

                            {{-- add kondisi --}}
                            <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3">
                                <div class="px-4 sm:px-0">
                                    <h2 class="text-base font-semibold leading-7 text-gray-900">Kondisi Penilaian
                                    </h2>
                                    <p class="mt-1 text-sm leading-6 text-gray-600">masukkan kondisi nilai yang ingin
                                        dicapai</p>
                                </div>

                                <form method="POST" action="{{ route('simpan.kondisi') }}" id="formKondisi"
                                    class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                                    @csrf
                                    <div class="px-4 py-6 sm:p-8">
                                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                            {{-- nilai waktu --}}
                                            <input type="hidden" id="editId" name="editId">
                                            <div class="sm:col-span-3">
                                                <label for="waktu"
                                                    class="block text-sm font-bold leading-6 text-gray-900">Waktu</label>
                                                <p class="mt-1 text-sm leading-6 text-gray-600">dalam satuan detik (s)</p>
                                                <div class="mt-2">
                                                    <select id="waktu" name="waktu" autocomplete="waktu-name"
                                                        class="block w-full rounded-md border-0 py-2.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                        @foreach ($timeList as $waktu)
                                                            <option value="{{ $waktu['id'] }}">{{ $waktu['nama_waktu'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- nilai huruf --}}
                                            <div class="sm:col-span-3">
                                                <label for="nilai-huruf"
                                                    class="block text-sm font-bold leading-6 text-gray-900">Nilai dalam
                                                    Huruf</label>
                                                <p class="mt-1 text-sm leading-6 text-gray-600">bisa dalam bentuk
                                                    <b>A,B,C,D</b>
                                                </p>
                                                <div class="mt-2">
                                                    <input type="text" name="nilai-huruf" id="nilai-huruf"
                                                        class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>
                                            {{-- nilai awal --}}
                                            <div class="sm:col-span-3">
                                                <label for="range-awal"
                                                    class="block text-sm font-bold leading-6 text-gray-900">Range Nilai
                                                    Minimal</label>
                                                <p class="mt-1 text-sm leading-6 text-gray-600">tulis angka contoh. <b>
                                                        1/2/3</b></p>
                                                <div class="mt-2">
                                                    <input id="range-awal" name="range-awal" type="text"
                                                        class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                                </div>
                                            </div>
                                            {{-- nilai akhir --}}
                                            <div class="sm:col-span-3">
                                                <label for="range-akhir"
                                                    class="block text-sm font-bold leading-6 text-gray-900">Range Nilai
                                                    Maksimal</label>
                                                <p class="mt-1 text-sm leading-6 text-gray-600">tulis angka contoh.
                                                    <b>13/14/15</b>
                                                </p>
                                                <div class="mt-2">
                                                    <input id="range-akhir" name="range-akhir" type="text"
                                                        class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                                        <button type="submit"
                                            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            // Tangani klik tombol Edit
            $('.editButton').click(function() {
                // Ambil data dari tombol Edit yang ditekan
                var kondisiId = $(this).data('id');
                var nilaiHuruf = $(this).data('nilai-huruf');
                var nilaiMin = $(this).data('nilai-min');
                var nilaiMax = $(this).data('nilai-max');
                var idWaktu = $(this).data('id-waktu');

                // Isi nilai-nilai form Kondisi dengan data yang sesuai
                $('#editId').val(kondisiId); // Menetapkan nilai editId ke input hidden
                $('#nilai-huruf').val(nilaiHuruf);
                $('#range-awal').val(nilaiMin);
                $('#range-akhir').val(nilaiMax);
                $('#waktu').val(idWaktu);

                // Tampilkan form Kondisi
                $('#formKondisi').removeClass('hidden');
            });

            $('#formKondisi').submit(function() {
                // Jika editId tidak ada, atur nilai editId ke null
                if (!$('#editId').val()) {
                    $('#editId').val(null);
                }
            });
        });
    </script>
@endsection
