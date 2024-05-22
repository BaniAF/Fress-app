<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign-Up</title>
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
    <section class="min-h-screen">
      <div class="bg-top relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-cover min-h-50-screen rounded-xl"  style="background-image: url('{{ asset('images/ss7.jpg') }}');">
        <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-zinc-800 to-zinc-700 opacity-60"></span>
        <div class="container z-10">
          <div class="flex flex-wrap justify-center -mx-3">
            <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
              <h1 class="mt-12 mb-2 text-white">Daftarkan Diri Anda!</h1>
              <p class="text-lg text-white">Football Reaction Speed System <b class="text-yellow-500">(FRESS).</b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48 mb-5">
          <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
            <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-6">
                <form action="{{route('daftar')}}" method="POST" role="form text-left">
                  @csrf
                  <div class="mb-4">
                    <input type="text" class="placeholder:text-gray-500 text-md focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Nama Lengkap" aria-label="Nama Lengkap" aria-describedby="nama-description" name="nama"/>
                  </div>
                  <div class="mb-4">
                    <input type="text" class="placeholder:text-gray-500 text-md focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Nama Panggilan" aria-label="Nama Panggilan" aria-describedby="username-description" name="username" />
                  </div>
                  <div class="mb-4">
                    <input type="email" class="placeholder:text-gray-500 text-md focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email"/>
                  </div>
                  <div class="mb-4">
                    <input type="text" class="placeholder:text-gray-500 text-md focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Alamat" aria-label="Alamat" aria-describedby="Alamat-description" name="alamat" />
                  </div>
                  <div class="mb-4 relative">
                    <input type="password" class="placeholder:text-gray-500 text-md focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password" />
                    <button type="button" onclick="togglePasswordVisibility(this)" class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm0 14a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-10a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="mb-4">
                  <input type="text" class="placeholder:text-gray-500 text-md focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Posisi" aria-label="Posisi" aria-describedby="Posisi-description"  name="posisi"/>
                </div>
                <div class="mb-4">
                  <input type="text" class="placeholder:text-gray-500 text-md focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Klub" aria-label="Klub" aria-describedby="Klub-description" name="klub" />
                </div>
                <div class="flex justify-center">
                  <button type="button" onclick="window.location.href = '/'" class="mr-4 px-3 py-1 bg-gray-200 rounded-lg shadow-md focus:outline-none cursor-pointer hover:-translate-y-px hover:shadow-xs ease-in">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </button>
                  <button type="submit" class="inline-block w-80 px-8 py-2.5 font-bold text-white bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-xs leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% hover:border-slate-700 hover:bg-slate-700 hover:text-white">Daftar</button>
                </div> 
                  <p class="mt-4 mb-0 leading-normal text-md">Sudah punya akun? <a href="{{route('login')}}" class="text-md font-bold text-slate-700">Sign in</a></p>
                </form>
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
          button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 cursor-pointer" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M15.293 4.293a1 1 0 0 1 1.414 1.414l-12 12a1 1 0 0 1-1.414-1.414l12-12zM10 11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" clip-rule="evenodd"/></svg>';
      } else {
          input.type = "password";
          button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 cursor-pointer" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm0 14a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-10a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" clip-rule="evenodd"/></svg>';
      }
  }
</script>
</html>