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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.10/dist/cdn.min.js"></script>
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/argon-dashboard-tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/argon-dashboard-tailwind.min.css') }}"> --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</head>

<body>
    @include('User/Components/navbar')
    <div class="bg-gray-100">
        <div class="min-h-full">
            <div class="bg-indigo-600 pb-32">
                <header class="py-10">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <h1
                            class="text-3xl font-bold tracking-tight 
    @if (request()->route()->named('user')) text-white 
    @else
        text-white 
        @endif">
                            @if (request()->route()->named('user'))
                                Dashboard
                            @elseif(request()->route()->named('user.profil'))
                                Profil
                            @endif
                        </h1>
                    </div>
                </header>
            </div>

            <main class="-mt-32">
                @yield('content')
            </main>
        </div>
    </div>
</body>
@include('User/Components/footer')

</html>
