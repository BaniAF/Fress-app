<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign-In</title>
    <!-- Style -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/argon-dashboard-tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/argon-dashboard-tailwind.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    @include('sweetalert::alert')
    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section>
            <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
                <div class="container z-1">
                    <div class="flex flex-wrap -mx-3">
                        <div
                            class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 dark:bg-gray-950 rounded-2xl bg-clip-border">
                                <div class="p-6 pb-0 mb-0">
                                    <h4 class="font-bold">Sign In</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="flex-auto p-6">
                                    <form id="loginform" action="login" method="POST" role="form">
                                        @csrf
                                        @if ($message = Session::get('failed'))
                                            <div class="mx-auto max-w-7xl px-4 py-1 mb-2 sm:px-6 lg:px-8">
                                                <div class="mx-auto max-w-4xl">

                                                    <div class="rounded-md bg-red-50 p-2">
                                                        <div class="flex">
                                                            <div class="flex-shrink-0">
                                                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="ml-3">
                                                                <h3 class="text-sm font-medium text-red-800">
                                                                    {{ $message }}</h3>
                                                                {{-- <div class="mt-2 text-sm text-red-700">
                                                                    <ul role="list" class="list-disc space-y-1 pl-5">
                                                                        
                                                                    </ul>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                        @if ($errors->has('email') || $errors->has('password'))
                                            <div class="mx-auto max-w-7xl px-4 py-1 sm:px-6 lg:px-8">
                                                <div class="mx-auto max-w-xl">
                                                    <div class="rounded-md bg-yellow-50 p-4">
                                                        <div class="flex">
                                                            <div class="flex-shrink-0">
                                                                <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="ml-1">
                                                                <h3 class="text-sm font-bold text-yellow-800">There were
                                                                    {{ $errors->count() }} errors with your submission
                                                                </h3>
                                                                <div class="mt-2 text-sm text-yellow-700">
                                                                    <ul role="list" class="list-disc space-y-1 pl-9">
                                                                        @if ($errors->has('email'))
                                                                            <li>{{ $errors->first('email') }}</li>
                                                                        @endif
                                                                        @if ($errors->has('password'))
                                                                            <li>{{ $errors->first('password') }}</li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="mb-4">
                                            <input type="text" placeholder="Email"
                                                class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"
                                                name="email" />
                                        </div>

                                        <div class="relative mb-4">
                                            <input type="password"
                                                class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 pr-10 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                placeholder="Password" aria-label="Password"
                                                aria-describedby="password-addon" name="password" />
                                            <button type="button" onclick="togglePasswordVisibility(this)"
                                                class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 text-gray-400 cursor-pointer" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm0 14a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-10a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex justify-center">
                                            <button type="button" onclick="window.location.href = '/'"
                                                class="mr-4 px-3 py-1 bg-gray-200 rounded-lg shadow-md focus:outline-none cursor-pointer hover:-translate-y-px hover:shadow-xs ease-in">
                                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                                </svg>
                                            </button>

                                            <button type="submit"
                                                class="px-10 w-96 py-3 font-bold leading-normal text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">Sign
                                                in</button>
                                        </div>


                                    </form>
                                </div>
                                <div
                                    class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                                    <p class="mx-auto mb-6 leading-normal text-sm">Don't have an account? <a
                                            href="{{ route('signup') }}"
                                            class="font-semibold text-transparent bg-clip-text bg-gradient-to-tl from-blue-500 to-violet-500">Sign
                                            up</a></p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="absolute top-0 right-0 hidden lg:flex flex-col justify-center w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0">
                            <div class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden rounded-xl"
                                style="background-image: url('{{ asset('images/ss5.jpg') }}');">
                                <span
                                    class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
                                <h4 class="z-20 mt-12 font-bold text-white">"Diego Maradona"</h4>
                                <p class="z-20 text-white">Gol yang dicetak adalah sebagian dari tangan Tuhan, dan sebagian dari kepala Maradona.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

<script src="{{ asset('assets/js/argon-dashboard-tailwind.js') }}"></script>
<script src="{{ asset('assets/js/argon-dashboard-tailwind.min.js') }}"></script>
<script src="{{ asset('assets/js/perfect-scrollbar.js') }}"></script>

<script>
    function togglePasswordVisibility(button) {
        var input = button.previousElementSibling;
        if (input.type === "password") {
            input.type = "text";
            button.innerHTML =
                '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 cursor-pointer" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M15.293 4.293a1 1 0 0 1 1.414 1.414l-12 12a1 1 0 0 1-1.414-1.414l12-12zM10 11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" clip-rule="evenodd"/></svg>';
        } else {
            input.type = "password";
            button.innerHTML =
                '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 cursor-pointer" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm0 14a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-10a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" clip-rule="evenodd"/></svg>';
        }
    }
</script>

<script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        // Prevent the form from submitting immediately
        event.preventDefault();

        // Show loading screen
        document.getElementById('loadingScreen').classList.remove('hidden');

        // Submit the form after 3 seconds
        setTimeout(function() {
            event.target.submit();
        }, 3000);
    });
</script>

</html>
