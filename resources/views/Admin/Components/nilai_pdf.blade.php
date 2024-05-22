<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')


    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>{{$title}}</title>
</head>

<body>


    <div class="container mt-5">
        <!-- Kop Surat -->
        <div class="header">
            <img src="{{ public_path('images/kop_baru.jpg') }}" alt="" style="width: 16cm; height: auto; display: block; margin: auto;">
            <h3 class="text-center">{{$title}}</h3>
            <hr>
        </div>

        <!-- Tabel Nilai -->
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>Alamat Peserta</th>
                    <th>Nilai Peserta</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_peserta }}</td>
                        <td>{{ $item->peserta->alamat }}</td>
                        <td>{{ $item->nilai_peserta }}</td>
                        <td>{{ $item->kondisi->nilai_huruf }}</td>
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
