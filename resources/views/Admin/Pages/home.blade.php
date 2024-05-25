@extends('Admin.app')
@section('title')
    Admin Dashboard
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
                                Dashboard</h2>
                        </div>

                        <div class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                            aria-hidden="true">
                            <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#ACE2E1] to-[#008DDA] opacity-30"
                                style="clip-path: polygon(63.1% 29.5%, 100% 17.1%, 76.6% 3%, 48.4% 0%, 44.6% 4.7%, 54.5% 25.3%, 59.8% 49%, 55.2% 57.8%, 44.4% 57.2%, 27.8% 47.9%, 35.1% 81.5%, 0% 97.7%, 39.2% 100%, 35.2% 81.4%, 97.2% 52.8%, 63.1% 29.5%)">
                            </div>
                        </div>
                        <div class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                            aria-hidden="true">
                            <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-br from-[#66FFCC] to-[#FF99CC] opacity-40"
                                style="clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 80%)">
                            </div>
                        </div>

                        {{-- count data --}}
                        <div class=" mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Rekap Nilai dan Peserta</h3>
                            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                                <div
                                    class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                                    <dt>
                                        <div class="absolute rounded-md bg-indigo-500 p-3">
                                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                            </svg>
                                        </div>
                                        <p class="ml-16 truncate text-sm font-medium text-gray-500">Total Peserta</p>
                                    </dt>
                                    <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                        <p class="text-2xl font-semibold text-gray-900">{{ $totalPeserta }}</p>
                                        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                        </div>
                                    </dd>
                                </div>
                                <div
                                    class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                                    <dt>
                                        <div class="absolute rounded-md bg-indigo-500 p-3">
                                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                                            </svg>
                                        </div>
                                        <p class="ml-16 truncate text-sm font-medium text-gray-500">Total Indikator Nilai
                                        </p>
                                    </dt>
                                    <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                        <p class="text-2xl font-semibold text-gray-900">{{ $totalKondisi }}</p>
                                        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                        </div>
                                    </dd>
                                </div>
                                <div>
                                    <form action="{{ route('edit.waktu') }}" method="post">
                                        @csrf
                                        <div class="rounded-md bg-white px-4 sm:px-6 lg:px-12 lg:py-12 shadow-md">
                                            <span class="mb-1 text-lg font-bold">Waktu Peserta </span>
                                            <!-- Select waktu dan nama peserta -->
                                            <input type="hidden" id="timerValue" name="timerValue" value="">
                                            <div class="mb-4">
                                                <label for="participantSelect"
                                                    class="block text-sm font-medium text-gray-700">Nama Peserta</label>
                                                <select id="participantSelect" name="participantSelect"
                                                    class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md">
                                                    <option value="">Pilih Peserta</option>
                                                    @foreach ($dataPeserta as $item)
                                                        <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label for="hourSelect"
                                                    class="block text-sm font-medium text-gray-700">Waktu</label>
                                                <select id="hourSelect" name="hourSelect"
                                                    class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md">
                                                    <option value="">Pilih Waktu</option>
                                                    @foreach ($dataWaktu as $item)
                                                        <option value="{{ $item['id'] }}">{{ $item['nama_waktu'] }} Detik
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button id="submitButton"
                                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full"
                                                type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </dl>
                        </div>

                        <form action="{{ route('simpan.firebase') }}" method="post">
                            @csrf
                            <button type="submit">Ini Coba Firebase</button>
                        </form>
                        {{-- countdown --}}
                        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="rounded-md bg-white px-4 sm:px-6 lg:px-12 lg:py-12 shadow-md text-center">
                                    <!-- Timer content here -->
                                    <div>
                                        {{-- <form action="" method="post">
                                            @csrf
                                            <div class="px-4 sm:px-6 lg:px-12 lg:py-12">
                                                <!-- Select waktu dan nama peserta -->
                                                <input type="hidden" id="timerValue" name="timerValue" value="">
                                                <div class="mb-4">
                                                    <label for="participantSelect"
                                                        class="block text-sm font-medium text-gray-700">Nama
                                                        Peserta</label>
                                                    <select id="pesertaTime" name="pesertaTime"
                                                        class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" selected disabled>Pilih Peserta</option>
                                                        @foreach ($dataPeserta as $item)
                                                            <option value="{{ $item['id'] }}">{{ $item['nama'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="hourSelect"
                                                        class="block text-sm font-medium text-gray-700">Waktu</label>
                                                    <select id="hourPeserta" name="hourPeserta"
                                                        class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" selected disabled>Pilih Waktu</option>
                                                        @foreach ($dataWaktuPeserta as $item)
                                                            <option value="{{ $item['nama_waktu'] }}">{{ $item['nama_waktu'] }} Detik
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </form> --}}
                                        <form action="" method="post">
                                            @csrf
                                            <div class="px-4 sm:px-6 lg:px-12 lg:py-12">
                                                <!-- Select waktu dan nama peserta -->
                                                <input type="hidden" id="timerValue" name="timerValue" value="">
                                        
                                                <!-- Nama Peserta -->
                                                <div class="mb-4">
                                                    <label for="pesertaTime" class="block text-sm font-medium text-gray-700">Nama Peserta</label>
                                                    <select id="pesertaTime" name="pesertaTime"
                                                        class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" selected disabled>Pilih Peserta</option>
                                                        @foreach ($dataPeserta as $item)
                                                            <option value="{{ $item->id }}" {{ old('pesertaTime') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                        
                                                <!-- Waktu -->
                                                <div class="mb-4">
                                                    <label for="hourPeserta" class="block text-sm font-medium text-gray-700">Waktu</label>
                                                    <select id="hourPeserta" name="hourPeserta"
                                                        class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" selected disabled>Pilih Waktu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>                                                                                                               
                                    </div>
                                    <div id="timerDisplay" class="text-4xl lg:text-9xl font-bold mb-4 timer"></div>
                                    <div class="flex justify-center">
                                        <button id="startButton"
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">Start</button>
                                        <button id="stopButton"
                                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full ml-2">Stop</button>
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
        const dataWaktuPeserta = @json($dataWaktuPeserta);
        const dataTimes = @json($dataWaktu);
    
        document.getElementById('pesertaTime').addEventListener('change', function() {
            const selectedPesertaNama = this.options[this.selectedIndex].text;
            console.log('Selected Peserta Nama:', selectedPesertaNama); // Debug log
            const matchingPesertas = dataWaktuPeserta.filter(p => p.nama === selectedPesertaNama);
            console.log('Matching Pesertas:', matchingPesertas); // Debug log
            matchingPesertas.forEach(peserta => {
                console.log('id_waktu:', peserta.id_waktu);
            });
            const hourSelect = document.getElementById('hourPeserta');
    
            // Clear previous options
            hourSelect.innerHTML = '<option value="" selected disabled>Pilih Waktu</option>';
    
            matchingPesertas.forEach(matchingPesertas => {
                // Find matching time based on id_waktmatchingPesertas); // Debug log
                const matchingTime = dataTimes.find(time => time.id == matchingPesertas.id_waktu);
                // console.log('Data Matching di Cek :', matchingTime); // Debug log
                if (matchingTime) {
                    const option = document.createElement('option');
                    option.value = matchingTime.id;
                    option.textContent = matchingTime.nama_waktu;
                    hourSelect.appendChild(option);
                    console.log('Option added:', option); // Debug log
                } else {
                    console.log('No matching time found for the selected participant.'); // Debug log
                }
            });
        });

        var hourPesertaSelect = document.getElementById('hourPeserta');
        var timerDisplay = document.getElementById('timerDisplay');
        var startButton = document.getElementById('startButton');
        var stopButton = document.getElementById('stopButton');
        var intervalId;
        
        // Script untuk tombol start
        startButton.addEventListener('click', function() {
            var selectedWaktu = hourPesertaSelect.value;
            if (selectedWaktu) {
                var waktu = dataTimes.find(time => time.id == selectedWaktu);
                if (waktu) {
                    var waktuDetik = parseInt(waktu.nama_waktu, 10);
                    startTimer(waktuDetik);
                    
                    // Kirim waktuDetik ke controller menggunakan fetch API
                    fetch('/simpan-firebase', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token CSRF untuk Laravel
                        },
                        body: JSON.stringify({ waktuDetik: waktuDetik })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Ada masalah dengan permintaan.');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Respon dari simpan-firebase:', data);
                        // Lakukan sesuatu dengan respon jika diperlukan
                    })
                    .catch(error => {
                        console.error('Ada kesalahan:', error);
                    });
                } else {
                    alert('Nama waktu tidak ditemukan');
                }
            } else {
                alert('Pilih waktu terlebih dahulu');
            }
        });

        // Script untuk tombol stop
        stopButton.addEventListener('click', function() {
            stopTimer();

            // Kirim permintaan ke controller untuk menghentikan koneksi
            fetch('/simpan-firebase', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token CSRF untuk Laravel
                },
                body: JSON.stringify({ stop: true }) // Kirim flag 'stop' ke controller
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Ada masalah dengan permintaan.');
                }
                return response.json();
            })
            .then(data => {
                console.log('Respon dari store-firebase:', data);
                // Lakukan sesuatu dengan respon jika diperlukan
            })
            .catch(error => {
                console.error('Ada kesalahan:', error);
            });
        });

        function startTimer(seconds) {
            var display = timerDisplay;
            var timer = seconds;
            var minutes;
            var seconds;

            intervalId = setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                display.textContent = minutes + ':' + seconds;

                if (--timer < 0) {
                    clearInterval(intervalId);
                    display.textContent = '00:00';
                }
            }, 1000);
        }

        function stopTimer() {
            clearInterval(intervalId);
        }
    </script>    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ketika formulir disubmit
            document.getElementById('editForm').addEventListener('submit', function(e) {
                e.preventDefault(); // Mencegah aksi default

                // Mengambil nilai waktu yang dipilih
                var selectedTime = document.getElementById('hourSelect').value;

                // Menyimpan nilai waktu pada input tersembunyi
                document.getElementById('timerValue').value = selectedTime;

                // Mengupdate timer dengan nilai waktu yang dipilih
                document.getElementById('timer').textContent = selectedTime;

                // Mengirimkan formulir
                this.submit();
            });
        });
    </script>
    {{-- <script>
        var hourPesertaSelect = document.getElementById('hourPeserta');
        var timerDisplay = document.getElementById('timerDisplay');
        var startButton = document.getElementById('startButton');
        var stopButton = document.getElementById('stopButton');
        var intervalId;
        

        startButton.addEventListener('click', function() {
            var selectedWaktu = hourPesertaSelect.value;
            console.log(selectedWaktu);
            if (selectedWaktu) {
                var waktuDetik = parseInt(selectedWaktu, 10);
                startTimer(waktuDetik);
            } else {
                alert('Pilih waktu terlebih dahulu');
            }
        });

        stopButton.addEventListener('click', function() {
            stopTimer();
        });

        function startTimer(seconds) {
            var display = timerDisplay;
            var timer = seconds;
            var minutes;
            var seconds;

            intervalId = setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                display.textContent = minutes + ':' + seconds;

                if (--timer < 0) {
                    clearInterval(intervalId);
                    display.textContent = '00:00';
                }
            }, 1000);
        }

        function stopTimer() {
            clearInterval(intervalId);
        }
    </script> --}}
    {{-- <script>
        const dataWaktuPeserta = @json($dataWaktuPeserta);

        document.getElementById('pesertaTime').addEventListener('change', function() {
            const selectedPesertaId = this.value;
            const selectedPeserta = dataWaktuPeserta.find(p => p.id == selectedPesertaId);
            const hourSelect = document.getElementById('hourPeserta');

            // Clear previous options
            hourSelect.innerHTML = '<option value="" selected disabled>Pilih Waktu</option>';

            if (selectedPeserta) {
                const option = document.createElement('option');
                option.value = selectedPeserta.id_waktu;
                option.textContent = selectedPeserta.nama_waktu;
                hourSelect.appendChild(option);
            }
        });
    </script> --}}

@endsection
