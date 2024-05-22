@extends('User.app')
@section('title')
    Profil
@endsection
@section('content')
@include('sweetalert::alert')
<div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8" x-data="{ isLoading: true }" x-init="setTimeout(() => isLoading = false, 1000)">
    <div class="rounded-lg bg-gray-50 bg-opacity-25 px-5 py-6 shadow sm:px-6" x-show="!isLoading">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
                <div class="space-y-10 divide-y divide-gray-200">
                    <!-- Profile Section Header -->
                    <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3">
                        <div class="px-4 sm:px-0">
                            <h2 class="text-lg font-semibold leading-7 text-gray-900">Informasi Pribadi</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Tampilan Data Diri sekaligus bisa merubah langsung!</p>
                        </div>

                        <!-- Profile Form -->
                        <form class="bg-gray-50 shadow-md rounded-lg md:col-span-2" action="{{ route('user.profil.update', ['nama' => $userDetails->nama]) }}" method="POST">
                            @csrf
                            <div class="px-4 py-6 sm:p-8">
                                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <!-- Full Name -->
                                    <div class="sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
                                        <div class="mt-2 relative">
                                            <input type="text" name="first-name" id="first-name"
                                                value="{{ $userDetails->nama }}"
                                                class="block w-full rounded-md border-gray-300 py-1.5 pl-10 pr-3 text-gray-900 shadow-sm focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <i class="fas fa-user absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400"></i>
                                        </div>
                                    </div>

                                    <!-- Nickname -->
                                    <div class="sm:col-span-3">
                                        <label for="nickname" class="block text-sm font-medium leading-6 text-gray-900">Nama Panggilan</label>
                                        <div class="mt-2 relative">
                                            <input type="text" name="nickname" id="nickname"
                                                value="{{ $userDetails->username }}"
                                                class="block w-full rounded-md border-gray-300 py-1.5 pl-10 pr-3 text-gray-900 shadow-sm focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <i class="fas fa-user-tag absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400"></i>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="sm:col-span-6">
                                        <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
                                        <div class="mt-2 relative">
                                            <input type="text" name="address" id="address"
                                                value="{{ $userDetails->alamat }}"
                                                class="block w-full rounded-md border-gray-300 py-1.5 pl-10 pr-3 text-gray-900 shadow-sm focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <i class="fas fa-map-marker-alt absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400"></i>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="sm:col-span-6">
                                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Alamat Email</label>
                                        <p class="mt-1 text-sm text-red-600">*Jika ingin mengganti email silahkan menghubungi admin <b>(no.telp)</b>.</p>
                                        <div class="mt-2 relative">
                                            <input id="email" name="email" type="email" readonly
                                                value="{{ $userDetails->email }}"
                                                class="block w-full rounded-md border-gray-300 py-1.5 pl-10 pr-3 text-gray-900 shadow-sm focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" readonly>
                                            <i class="fas fa-envelope absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400"></i>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="sm:col-span-4">
                                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                        <div class="mt-2 relative">
                                            <input type="password" id="password" name="password"
                                                value="{{ $userDetails->password_lihat }}" maxlength="10"
                                                class="block w-full rounded-md border-gray-300 py-1.5 pl-10 pr-3 text-gray-900 shadow-sm focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                                            <i class="fas fa-eye-slash absolute inset-y-0 left-0 pl-3 flex items-center cursor-pointer" id="togglePassword"></i>
                                        </div>
                                    </div>

                                    <!-- Position -->
                                    <div class="sm:col-span-2">
                                        <label for="position" class="block text-sm font-medium leading-6 text-gray-900">Posisi</label>
                                        <div class="mt-2 relative">
                                            <input type="text" name="position" id="position"
                                                value="{{ $userDetails->posisi }}"
                                                class="block w-full rounded-md border-gray-300 py-1.5 pl-10 pr-3 text-gray-900 shadow-sm focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <i class="fas fa-person absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400"></i>
                                        </div>
                                    </div>

                                    <!-- Club -->
                                    <div class="sm:col-span-2">
                                        <label for="club" class="block text-sm font-medium leading-6 text-gray-900">Klub</label>
                                        <div class="mt-2 relative">
                                            <input type="text" name="club" id="club"
                                                value="{{ $userDetails->klub }}"
                                                class="block w-full rounded-md border-gray-300 py-1.5 pl-10 pr-3 text-gray-900 shadow-sm focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <i class="fas fa-futbol absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Save Button -->
                            <div class="flex items-center justify-end gap-x-6 border-t border-gray-200 px-4 py-4 sm:px-8">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 transition duration-200 ease-in-out">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading Indicator -->
        <div x-show="isLoading" class="flex items-center justify-center h-screen">
            <svg class="animate-spin h-10 w-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.373A8 8 0 0012 20v4c-4.418 0-8-3.582-8-8h4zm10-3.373a8 8 0 01-8 8v-4c4.418 0 8-3.582 8-8h-4zm-2-5.373A8 8 0 0012 4V0c4.418 0 8 3.582 8 8h-4z"></path>
            </svg>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const passwordInput = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            this.classList.toggle("fa-eye-slash");
            this.classList.toggle("fa-eye");
        });
    </script>
@endsection
