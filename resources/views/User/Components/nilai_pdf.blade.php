<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')


    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <h3 class="text-center">{{ $title }}</h3>
</head>

<body>


    <div class="container mt-5">
        <!-- Kop Surat -->
        <div class="header">
            <img src="{{ public_path('images/kop_baru.jpg') }}" alt=""
                style="width: 16cm; height: auto; display: block; margin: auto;">
            <h1 class="text-center text-xl font-bold">{{ $title }}</h1>
            <hr>
        </div>

        <!-- Tabel Nilai -->
        <table class="table table-striped mt-5">
            <thead class="thead-dark">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Tanggal</th>
                    <th class="px-4 py-2 text-left">Nama Peserta</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">Nilai Peserta</th>
                    <th class="px-4 py-2 text-left">ID Kondisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $item->created_at->format('d-m-Y') }}</td>
                        <td class="border px-4 py-2">{{ $item->nama_peserta }}</td>
                        <td class="border px-4 py-2">{{ $item->peserta->alamat }}</td>
                        <td class="border px-4 py-2">{{ $item->nilai_peserta }}</td>
                        <td class="border px-4 py-2">{{ $item->kondisi->nilai_huruf }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        <p class="text-left text-sm font-bold"> Data ini diunduh pada {{ $date }}</p>
    </div>
</body>

</html>
