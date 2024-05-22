@extends('Admin.app')
@section('title')
    Admin - Peserta
@endsection
@section('content')
    @include('sweetalert::alert')
    <main class="py-10 lg:pl-72">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="bg-white">
                <main class="isolate">
                    <div class="rounded-lg shadow-sm bg-gray-50 bg-opacity-45">
                        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                            <h2
                                class="text-2xl px-2 py-2 font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                                Peserta</h2>
                            <div class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                                aria-hidden="true">
                                <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tl from-[#4CAF50] to-[#FF5722] opacity-60"
                                    style="clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 80%, 0% 100%)">
                                </div>
                            </div>
                            <div class="absolute left-20 bottom-0 top-20 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                                aria-hidden="true">
                                <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-br from-[#4CAF50] to-[#FF5722] opacity-60"
                                    style="clip-path: polygon(0 100%, 100% 100%, 100% 0, 50% 20%, 0% 0)">
                                </div>
                            </div>

                            <div class="rounded-md bg-white px-4 sm:px-6 lg:px-12 lg:py-12 shadow-md">
                                <div class="sm:flex sm:items-center">
                                    <div class="sm:flex-auto">
                                        <h1 class="text-base font-bold text-gray-900">Data Peserta</h1>
                                        <p class="mt-2 text-sm text-gray-700">Daftar Peserta yang sudah mendaftar.</p>
                                    </div>
                                </div>
                                <div class="mt-8 flow-root">
                                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                            <table class="min-w-full divide-y divide-gray-300 text-center justify-center"
                                                id="tabelPeserta">
                                                <thead class="text-center justify-center">

                                                    <tr>
                                                        <th scope="col"
                                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                                            <a href="#" class="group inline-flex">
                                                                Nama
                                                                <span
                                                                    class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                                                    <svg class="h-5 w-5" viewBox="0 0 20 20"
                                                                        fill="currentColor" aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </th>
                                                        <th scope="col"
                                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                            <a href="#" class="group inline-flex">
                                                                Alamat
                                                                <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                                                <span
                                                                    class="ml-2 flex-none rounded bg-gray-100 text-gray-900 group-hover:bg-gray-200">
                                                                    <svg class="h-5 w-5" viewBox="0 0 20 20"
                                                                        fill="currentColor" aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </th>
                                                        <th scope="col"
                                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                            <a href="#" class="group inline-flex">
                                                                Email
                                                                <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                                                <span
                                                                    class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                                                    <svg class="invisible ml-2 h-5 w-5 flex-none rounded text-gray-400 group-hover:visible group-focus:visible"
                                                                        viewBox="0 0 20 20" fill="currentColor"
                                                                        aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </th>
                                                        <th scope="col"
                                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                            <a href="#" class="group inline-flex">
                                                                Posisi
                                                                <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                                                <span
                                                                    class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                                                    <svg class="invisible ml-2 h-5 w-5 flex-none rounded text-gray-400 group-hover:visible group-focus:visible"
                                                                        viewBox="0 0 20 20" fill="currentColor"
                                                                        aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </th>
                                                        <th scope="col"
                                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                            <a href="#" class="group inline-flex">
                                                                Klub
                                                                <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                                                <span
                                                                    class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                                                    <svg class="invisible ml-2 h-5 w-5 flex-none rounded text-gray-400 group-hover:visible group-focus:visible"
                                                                        viewBox="0 0 20 20" fill="currentColor"
                                                                        aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </th>
                                                        <th scope="col"
                                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                            <a href="#" class="group inline-flex">
                                                                Aksi
                                                                <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                                                <span
                                                                    class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                                                    <svg class="invisible ml-2 h-5 w-5 flex-none rounded text-gray-400 group-hover:visible group-focus:visible"
                                                                        viewBox="0 0 20 20" fill="currentColor"
                                                                        aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 bg-white text-center justify-center">
                                                    @foreach ($peserta as $items)
                                                        <tr>
                                                            <td
                                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                                                {{ $items->nama }}</td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                                {{ $items->alamat }}</td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                                {{ $items->email }}</td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                                {{ $items->posisi }}</td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                                {{ $items->klub }}</td>
                                                            <td
                                                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm sm:pr-0">
                                                                <button
                                                                    class="text-indigo-600 hover:text-indigo-900 btnEdit"
                                                                    data-id="{{ $items->id }}"
                                                                    data-nama="{{ $items->nama }}"
                                                                    data-email="{{ $items->email }}"
                                                                    data-password="{{ $items->password_lihat }}">Edit</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-md bg-white px-4 sm:px-6 mt-6 lg:px-12 lg:py-12 shadow-md">
                                <div class="sm:flex sm:items-center">
                                    <div class="sm:flex-auto">
                                        <h1 class="text-lg font-semibold text-gray-900">Edit Data Peserta</h1>
                                        <p class="mt-2 text-sm text-gray-700">Form untuk melakukan ganti password untuk
                                            peserta dan ganti email.</p>
                                    </div>
                                </div>
                                <!-- edit_peserta.blade.php -->
                                <form action="" method="POST" class="mt-6 space-y-4" id="formEdit">
                                    @csrf
                                    <input type="hidden" id="editId" name="id" value="">
                                    <div>
                                        <label for="email"
                                            class="block text-sm font-medium text-gray-700">Nama:</label>
                                        <input type="text" id="editNama" name="nama"
                                            class="mt-1 px-2 py-2.5 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    <div>
                                        <label for="email"
                                            class="block text-sm font-medium text-gray-700">Email:</label>
                                        <input type="email" id="editEmail" name="email"
                                            class="mt-1 px-2 py-2.5 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    <div class="relative">
                                        <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                                        <input type="password" id="editPassword" name="password" class="mt-1 px-2 py-2.5 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                            <svg id="passwordIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-2 4a6 6 0 100-12 6 6 0 000 12z" />
                                            </svg>
                                        </button>
                                    </div>
                                    {{-- <div>
                                        <label for="password"
                                            class="block text-sm font-medium text-gray-700">Password:</label>
                                        <input type="password" id="editPassword" name="password"
                                            class="mt-1 px-2 py-2.5 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div> --}}
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Simpan
                                        Perubahan</button>
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
            $('.btnEdit').click(function() {
                // Ambil data dari tombol Edit yang ditekan
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var email = $(this).data('email');
                var password = $(this).data('password');

                // Atur action form dengan URL yang benar termasuk id
                $('#formEdit').attr('action', '/admin/peserta/update/' + id);

                // Isi nilai-nilai form dengan data yang sesuai
                $('#editId').val(id);
                $('#editNama').val(nama);
                $('#editEmail').val(email);
                $('#editPassword').val(password);

                // Tampilkan form edit jika tidak terlihat
                $('#formEdit').removeClass('hidden');
            });
        });
    </script>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('editPassword');
            var passwordIcon = document.getElementById('passwordIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.setAttribute('d',
                    'M5.121 5.121A7.976 7.976 0 0012 10a7.976 7.976 0 006.879-4.879M9.172 9.172a4 4 0 015.656 0M7.757 12.243a2 2 0 012.486 0M6.343 14.657a2 2 0 003.314 0'
                    );
            } else {
                passwordInput.type = 'password';
                passwordIcon.setAttribute('d', 'M15 12a3 3 0 11-6 0 3 3 0 016 0zm-2 4a6 6 0 100-12 6 6 0 000 12z');
            }
        }
    </script>
@endsection
