@extends('Admin.app')
@section('title')
    Admin - Peserta
@endsection
@section('content')
    <main class="py-10 lg:pl-72">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="bg-white">
                <main class="isolate">
                    <div class="rounded-lg shadow-sm bg-gray-50 bg-opacity-45">
                        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                            <div class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                                                aria-hidden="true">
                                                <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30"
                                                    style="clip-path: polygon(63.1% 29.5%, 100% 17.1%, 76.6% 3%, 48.4% 0%, 44.6% 4.7%, 54.5% 25.3%, 59.8% 49%, 55.2% 57.8%, 44.4% 57.2%, 27.8% 47.9%, 35.1% 81.5%, 0% 97.7%, 39.2% 100%, 35.2% 81.4%, 97.2% 52.8%, 63.1% 29.5%)">
                                                </div>
                                            </div>
                                        
                            <div class="rounded-md bg-white px-4 sm:px-6 lg:px-12 lg:py-12 shadow-md">
                                <div class="sm:flex sm:items-center">
                                    <div class="sm:flex-auto">
                                        <h1 class="text-base font-semibold leading-6 text-gray-900">Edit Data Peserta</h1>
                                        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account
                                            including their name, title, email and role.</p>
                                        </div>
                                </div>
                                <!-- edit_peserta.blade.php -->

                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label for="nama">Nama:</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $editpeserta->nama }}">
                                    </div>
                                    <div>
                                        <label for="username">Username:</label>
                                        <input type="text" id="username" name="username" value="{{ $editpeserta->username }}">
                                    </div>
                                    <div>
                                        <label for="password">Password:</label>
                                        <input type="password" id="password" name="password">
                                    </div>
                                    <div>
                                        <label for="alamat">Alamat:</label>
                                        <input type="text" id="alamat" name="alamat" value="{{ $editpeserta->alamat }}">
                                    </div>
                                    <div>
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" value="{{ $editpeserta->email }}">
                                    </div>
                                    <div>
                                        <label for="klub">Klub:</label>
                                        <input type="text" id="klub" name="klub" value="{{ $editpeserta->klub }}">
                                    </div>
                                    <div>
                                        <label for="posisi">Posisi:</label>
                                        <input type="text" id="posisi" name="posisi" value="{{ $editpeserta->posisi }}">
                                    </div>
                                    <button type="submit">Simpan Perubahan</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </main>
@endsection
