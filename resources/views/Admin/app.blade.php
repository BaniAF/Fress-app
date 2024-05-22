<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    {{-- Style --}}
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('Icons/mini logo.png') }}" type="image/x-icon" class="h-4 w-auto">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- DataTables with Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</head>

<body>
    @include('Admin.Components.Sidebar')
    @yield('content')
</body>

<!-- Add jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Add DataTables library -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Add DataTables Bootstrap 5 integration -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<!-- Add Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"
    integrity="sha384-lDmr0soGVc0iRn1FEnVeXJoGA4xP6Pj67YPotUkW0p5oax6TafqY94DGMw3Us7Ml"
    crossorigin="anonymous">
</script>
<!-- Add Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-PQvSHOebtXfmcN+tVo4P4e8LD/q1XJy6m/k47btkZlJspj/+UtM+Yt4kzi/aqzFT"
    crossorigin="anonymous"></script>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#tabelPeserta').DataTable();
    });
</script>

</html>
