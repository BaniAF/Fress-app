@extends('User.app')
@section('title')
    User Dashboard
@endsection
@section('content')
    <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8" x-data="{ isLoading: true }" x-init="setTimeout(() => isLoading = false, 1000)">
        <!-- Summary of total amount activity -->
        <div class="rounded-lg bg-white bg-opacity-45 px-5 py-6 shadow sm:px-6" x-show="!isLoading">
            <div class="bg-gray-100 rounded-md">
                <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
                    <div>
                        <h3 class="text-md lg:text-lg font-bold leading-6 text-gray-900">Rangkuman Nilai</h3>
                        <dl
                            class="mt-5 grid grid-cols-1 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow md:grid-cols-3 md:divide-x md:divide-y-0">
                            <div class="px-4 py-5 sm:p-6">
                                <dt class="text-base font-normal text-gray-900">Total Percobaan yang diikuti</dt>
                                <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                        {{$jumlahDataNilai}}
                                    </div>
                                </dd>
                            </div>
                            <div class="px-4 py-5 sm:p-6">
                                <dt class="text-base font-normal text-gray-900">Nilai Tertinggi</dt>
                                <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                        {{$nilaiTertinggi}}
                                    </div>
                                </dd>
                            </div>
                            <div class="px-4 py-5 sm:p-6">
                                <dt class="text-base font-normal text-gray-900">Nilai terrendah</dt>
                                <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                        {{$nilaiTerendah}}
                                    </div>
                            </div>
                            </dd>
                    </div>
                    </dl>
                </div>
            </div>
            <div class="mt-5 lg:mt-12"></div>

            <!-- Card Information for detail nilai -->
            <div class="rounded-xl bg-white" x-show="!isLoading">
                <div class="rounded-xl shadow mx-auto max-w-7xl py-12 sm:px-6 lg:px-8 ">
                    <div class=" mx-auto max-w-4xl ">

                        <div>
                            <div class="px-4 sm:px-0">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-xl font-semibold leading-7 text-gray-900">Hasil Nilai Nilai</h3>
                                    <a href="{{ route('user.cetak') }}" class="text-sm font-semibold text-indigo-600 bg-indigo-100 rounded-md py-2 px-3 hover:bg-indigo-600 hover:text-white transition-colors duration-300">
                                        Download Hasil
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div x-data="{ slide: 0, maxSlide:  {{ count($dataNilai) - 1 }} }">
                        <div class="overflow-hidden">
                            <div class="flex transition-transform duration-300 ease-in-out"
                                :style="'transform: translateX(-' + (slide * 100) + '%)'">
                                @if ($dataNilai->isEmpty())
                                    <p class="text-gray-600">Data kosong.</p>
                                @else
                                    @foreach ($dataNilai as $nilai)
                                        <!-- Card Nilai-->
                                        <div class="flex-none w-full md:w-1/3 p-4">
                                            <!-- Content Card -->
                                            <div class="flex flex-col justify-between bg-white p-6 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-2 transition duration-300">
                                                <div>
                                                    <div class="flex items-center text-center">
                                                        <h3 id="tier-freelancer" class="text-6xl font-semibold text-gray-800">{{ $nilai->kondisi->nilai_huruf }}</h3>
                                                    </div>
                                                    <p class="mt-6 flex items-baseline">
                                                        <span class="text-xl font-bold text-gray-800">{{ $nilai->nilai_peserta }} Point /</span>
                                                        <span class="text-lg font-bold text-gray-800" data-detik="{{ $nilai->peserta->waktu->nama_waktu }}"></span>
                                                    </p>
                                                    <p class="mt-4 text-sm text-gray-600">Nilai anda ketika melakukan tes tanggal :</p>
                                                    <span class="font-bold">{{$nilai->created_at->format('d-m-Y')}}.</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                    @endforeach
                                @endif

                            </div>
                        </div>

                        <!-- Tombol Navigasi -->
                        <div class="mt-4 flex justify-center space-x-2 md:space-x-4">
                            <button @click="slide = Math.max(slide - 1, 0)" :disabled="slide === 0"
                                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 md:px-6 md:py-3"
                                    @if ($dataNilai->isEmpty()) disabled @endif>
                                Previous
                            </button>
                            <button @click="slide = Math.min(slide + 1, maxSlide)" :disabled="slide === maxSlide"
                                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 md:px-6 md:py-3"
                                    @if ($dataNilai->isEmpty()) disabled @endif>
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- loading transition --}}
        <div x-show="isLoading" class="flex items-center justify-center h-screen"
            x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <svg class="animate-spin h-10 w-10 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.373A8 8 0 0012 20v4c-4.418 0-8-3.582-8-8h4zm10-3.373a8 8 0 01-8 8v-4c4.418 0 8-3.582 8-8h-4zm-2-5.373A8 8 0 0012 4V0c4.418 0 8 3.582 8 8h-4z">
                </path>
            </svg>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mengambil semua elemen <td> yang memiliki atribut 'data-detik'
            const waktuElements = document.querySelectorAll('span[data-detik]');

            waktuElements.forEach(element => {
                const detik = parseInt(element.getAttribute('data-detik'), 10);
                let waktuFormatted = '';

                if (detik > 59) {
                    console.log("Data Detik ", detik);
                    const menit = Math.floor(detik / 60);
                    const sisaDetik = detik % 60;
                    if (sisaDetik==0) {
                        waktuFormatted = `${menit} menit`;
                    }else{
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
@endsection
