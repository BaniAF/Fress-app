<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
<!-- Style -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/argon-dashboard-tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/argon-dashboard-tailwind.min.css') }}">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.10/dist/cdn.min.js"></script>
<!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>
<body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    @include('Landing/Components/navbar')
   @yield('content')
   @include('Landing.Components/footer')
  </body>
  
  <script src="{{ asset('assets/js/argon-dashboard-tailwind.js') }}"></script>
  <script src="{{ asset('assets/js/argon-dashboard-tailwind.min.js') }}"></script>
  <script src="{{ asset('assets/js/perfect-scrollbar.js') }}"></script>
</html>