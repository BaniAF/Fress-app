@extends('Landing.app')
@section('title')
    Sistem Penghitungan Reaksi Cepat
@endsection
@section('content')
    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section>
            <div id="container" class="relative flex items-center min-h-screen mt-24 md:mt-0 lg:mt-0 lg:p-0 overflow-hidden bg-center bg-cover">
                <div class="container z-1">
                    {{-- section home --}}
                    <div class="bg-white">
                        <main class="isolate">
                            <!-- Hero section -->
                            <div id="home" class=" isolate -z-10">
                                <svg class="absolute inset-x-0 top-0 -z-10 h-[64rem] w-full stroke-gray-200 [mask-image:radial-gradient(32rem_32rem_at_center,white,transparent)]"
                                    aria-hidden="true">
                                    <defs>
                                        <pattern id="1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84" width="200" height="200"
                                            x="50%" y="-1" patternUnits="userSpaceOnUse">
                                            <path d="M.5 200V.5H200" fill="none" />
                                        </pattern>
                                    </defs>
                                    <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                                        <path
                                            d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
                                            stroke-width="0" />
                                    </svg>
                                    <rect width="100%" height="100%" stroke-width="0"
                                        fill="url(#1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84)" />
                                </svg>
                                <div class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                                    aria-hidden="true">
                                    <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#ACE2E1] to-[#008DDA] opacity-30"
                                        style="clip-path: polygon(63.1% 29.5%, 100% 17.1%, 76.6% 3%, 48.4% 0%, 44.6% 4.7%, 54.5% 25.3%, 59.8% 49%, 55.2% 57.8%, 44.4% 57.2%, 27.8% 47.9%, 35.1% 81.5%, 0% 97.7%, 39.2% 100%, 35.2% 81.4%, 97.2% 52.8%, 63.1% 29.5%)">
                                    </div>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="mx-auto max-w-7xl px-6 pb-32 pt-8 sm:pt-18 md:pt-48 lg:px-8 lg:pt-28">
                                        <div
                                            class="mx-auto max-w-2xl gap-x-32 lg:mx-0 lg:flex lg:max-w-none lg:items-center">
                                            <div class="w-full max-w-xl lg:shrink-0 xl:max-w-2xl">
                                                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                                                    Football Reaction Speed System (FRESS)</h1>
                                                <p
                                                    class="relative justify-around mt-8 text-lg leading-8 text-gray-600 sm:max-w-md lg:max-w-none">
                                                    &emsp;&emsp; <b>Waktu reaksi</b> sangat penting dalam performa olahraga
                                                    dan mengacu secara khusus pada selang waktu antara munculnya stimulus
                                                    dan timbulnya respon motorik. Sehingga mengukur waktu reaksi dapat
                                                    menjadi strategi yang efektif untuk mengetahui tingkat kinerja seorang
                                                    pemain berdasarkan pengambilan keputusannya.
                                                    <br>
                                                    &emsp;&emsp; Oleh karena itu perlunya adanya teknologi untuk mengukur
                                                    seberapa Tingkat kecepatan reaksi keputusan pemain kombinasin dengan
                                                    teknik dasar.

                                                </p>
                                                <div class="mt-8">
                                                    <a href="{{ route('signup') }}" type="button"
                                                        class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-blue-500 to-violet-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">daftar
                                                        sekarang</a>
                                                    <a href={{ route('login') }} type="button"
                                                        class="mr-3 inline-block px-6 py-3 font-bold text-center bg-gradient-to-r from-cyan-500 to-blue-500 uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Masuk
                                                        Sekarang</a>
                                                </div>
                                            </div>
                                            <div
                                                class="mt-14 flex justify-end gap-8 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0">
                                                <div
                                                    class="ml-auto w-44 flex-none space-y-8 pt-32 sm:ml-0 sm:pt-80 lg:order-last lg:pt-36 xl:order-none xl:pt-80">
                                                    <div class="relative">
                                                        <img src="{{ asset('images/ss1.png') }}" alt=""
                                                            class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                                                        <div
                                                            class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mr-auto w-44 flex-none space-y-8 sm:mr-0 sm:pt-52 lg:pt-36">
                                                    <div class="relative">
                                                        <img src="{{ asset('images/ss2.png') }}" alt=""
                                                            class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                                                        <div
                                                            class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                                        </div>
                                                    </div>
                                                    <div class="relative">
                                                        <img src="{{ asset('images/ss3.jpg') }}" alt=""
                                                            class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                                                        <div
                                                            class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <!-- Content section -->
              <div class="mx-auto -mt-12 max-w-7xl px-6 sm:mt-0 lg:px-8 xl:-mt-8">
                <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                  <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our mission</h2>
                  <div class="mt-6 flex flex-col gap-x-8 gap-y-20 lg:flex-row">
                    <div class="lg:w-full lg:max-w-2xl lg:flex-auto">
                      <p class="text-xl leading-8 text-gray-600">Aliquet nec orci mattis amet quisque ullamcorper neque, nibh sem. At arcu, sit dui mi, nibh dui, diam eget aliquam. Quisque id at vitae feugiat egestas ac. Diam nulla orci at in viverra scelerisque eget. Eleifend egestas fringilla sapien.</p>
                      <div class="mt-10 max-w-xl text-base leading-7 text-gray-700">
                        <p>Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris semper sed amet vitae sed turpis id. Id dolor praesent donec est. Odio penatibus risus viverra tellus varius sit neque erat velit. Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris semper sed amet vitae sed turpis id.</p>
                        <p class="mt-10">Et vitae blandit facilisi magna lacus commodo. Vitae sapien duis odio id et. Id blandit molestie auctor fermentum dignissim. Lacus diam tincidunt ac cursus in vel. Mauris varius vulputate et ultrices hac adipiscing egestas. Iaculis convallis ac tempor et ut. Ac lorem vel integer orci.</p>
                      </div>
                    </div>
                    <div class="lg:flex lg:flex-auto lg:justify-center">
                      <dl class="w-64 space-y-8 xl:w-80">
                        <div class="flex flex-col-reverse gap-y-4">
                          <dt class="text-base leading-7 text-gray-600">Transactions every 24 hours</dt>
                          <dd class="text-5xl font-semibold tracking-tight text-gray-900">44 million</dd>
                        </div>
                        <div class="flex flex-col-reverse gap-y-4">
                          <dt class="text-base leading-7 text-gray-600">Assets under holding</dt>
                          <dd class="text-5xl font-semibold tracking-tight text-gray-900">$119 trillion</dd>
                        </div>
                        <div class="flex flex-col-reverse gap-y-4">
                          <dt class="text-base leading-7 text-gray-600">New users annually</dt>
                          <dd class="text-5xl font-semibold tracking-tight text-gray-900">46,000</dd>
                        </div>
                      </dl>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Values section -->
              <div class="mx-auto mt-32 max-w-7xl px-6 sm:mt-40 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                  <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our values</h2>
                  <p class="mt-6 text-lg leading-8 text-gray-600">Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.</p>
                </div>
                <dl class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 text-base leading-7 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                  <div>
                    <dt class="font-semibold text-gray-900">Be world-class</dt>
                    <dd class="mt-1 text-gray-600">Aut illo quae. Ut et harum ea animi natus. Culpa maiores et sed sint et magnam exercitationem quia. Ullam voluptas nihil vitae dicta molestiae et. Aliquid velit porro vero.</dd>
                  </div>
                  <div>
                    <dt class="font-semibold text-gray-900">Share everything you know</dt>
                    <dd class="mt-1 text-gray-600">Mollitia delectus a omnis. Quae velit aliquid. Qui nulla maxime adipisci illo id molestiae. Cumque cum ut minus rerum architecto magnam consequatur. Quia quaerat minima.</dd>
                  </div>
                  <div>
                    <dt class="font-semibold text-gray-900">Always learning</dt>
                    <dd class="mt-1 text-gray-600">Aut repellendus et officiis dolor possimus. Deserunt velit quasi sunt fuga error labore quia ipsum. Commodi autem voluptatem nam. Quos voluptatem totam.</dd>
                  </div>
                  <div>
                    <dt class="font-semibold text-gray-900">Be supportive</dt>
                    <dd class="mt-1 text-gray-600">Magnam provident veritatis odit. Vitae eligendi repellat non. Eum fugit impedit veritatis ducimus. Non qui aspernatur laudantium modi. Praesentium rerum error deserunt harum.</dd>
                  </div>
                  <div>
                    <dt class="font-semibold text-gray-900">Take responsibility</dt>
                    <dd class="mt-1 text-gray-600">Sit minus expedita quam in ullam molestiae dignissimos in harum. Tenetur dolorem iure. Non nesciunt dolorem veniam necessitatibus laboriosam voluptas perspiciatis error.</dd>
                  </div>
                  <div>
                    <dt class="font-semibold text-gray-900">Enjoy downtime</dt>
                    <dd class="mt-1 text-gray-600">Ipsa in earum deserunt aut. Quos minus aut animi et soluta. Ipsum dicta ut quia eius. Possimus reprehenderit iste aspernatur ut est velit consequatur distinctio.</dd>
                  </div>
                </dl>
              </div>
              <!-- Team section -->
              <div id="ourteam" class="mx-auto mt-32 max-w-7xl px-6 sm:mt-48 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                  <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our team</h2>
                  <p class="mt-6 text-lg leading-8 text-gray-600">Sit facilis neque ab nulla vel. Cum eos in laudantium. Temporibus eos totam in dolorum. Nemo vel facere repellendus ut eos dolores similique.</p>
                </div>
                <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-2 gap-x-8 gap-y-16 text-center sm:grid-cols-3 md:grid-cols-4 lg:mx-0 lg:max-w-none lg:grid-cols-5 xl:grid-cols-6">
                  <li>
                    <img class="mx-auto h-24 w-24 rounded-full" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                    <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">Michael Foster</h3>
                    <p class="text-sm leading-6 text-gray-600">Co-Founder / CTO</p>
                  </li>
                  <li>
                    <img class="mx-auto h-24 w-24 rounded-full" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                    <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">Michael Foster</h3>
                    <p class="text-sm leading-6 text-gray-600">Co-Founder / CTO</p>
                  </li>
                  <li>
                    <img class="mx-auto h-24 w-24 rounded-full" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                    <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">Michael Foster</h3>
                    <p class="text-sm leading-6 text-gray-600">Co-Founder / CTO</p>
                  </li>
          
                  <!-- More people... -->
                </ul>
              </div>          --}}
                        </main>
                    </div>
                    {{-- endsection home --}}

                    {{-- section about --}}
                    <div id="about" class="">
                        <div aria-hidden="true" class="relative">
                            <img src="{{ asset('images/ss4.jpg') }}" alt=""
                                class="h-96 w-full object-cover object-center rounded-lg">
                            <div class="absolute inset-0 bg-gradient-to-t from-white"></div>
                        </div>

                        <div class="relative mx-auto -mt-12 max-w-7xl px-4 pb-16 sm:px-6 sm:pb-24 lg:px-8">
                            <div class="mx-auto max-w-2xl text-center lg:max-w-4xl">
                                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Tujuan & Fitur</h2>
                                <p class="mt-4 text-gray-500"><b>Tujuannya</b> adalah, Mengukur reaksi keputusan pemain,
                                    Mengukur teknik dasar passing control pemain, Memberikan record pemain dalam melakukan
                                    tes teknik dasar.</p>
                            </div>

                            <dl
                                class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:max-w-none lg:grid-cols-3 lg:gap-x-8">

                                <div class="border-t border-gray-200 pt-4">
                                    <div class="flex items-center font-medium text-gray-900">
                                        <div class="rounded-md bg-gradient-to-r from-cyan-500 to-blue-500 p-3">
                                            <img src="{{ asset('Icons/pie-chart.svg') }}" alt="Icon" class="h-6 w-6"
                                                style="filter: brightness(0) invert(1);">
                                        </div>
                                        <div class="ml-4 mt-4 flex flex-col">
                                            <span class="font-bold">Dashboard</span>
                                            <p class="text-sm text-gray-500">Pemantauan Aktivitas dan Penilaian.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 pt-4">
                                    <div class="flex items-center font-medium text-gray-900">
                                        <div class="rounded-md bg-gradient-to-r from-cyan-500 to-blue-500 p-3">
                                            <img src="{{ asset('Icons/award.svg') }}" alt="Icon" class="h-6 w-6"
                                                style="filter: brightness(0) invert(1);">
                                        </div>
                                        <div class="ml-4 mt-4 flex flex-col">
                                            <span class="font-bold">Nilai</span>
                                            <p class="text-sm text-gray-500">Penghitungan nilai yang terkomputerisasi.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 pt-4">
                                    <div class="flex items-center font-medium text-gray-900">
                                        <div class="rounded-md bg-gradient-to-r from-cyan-500 to-blue-500 p-3">
                                            <img src="{{ asset('Icons/file.svg') }}" alt="Icon" class="h-6 w-6"
                                                style="filter: brightness(0) invert(1);">
                                        </div>
                                        <div class="ml-4 mt-4 flex flex-col">
                                            <span class="font-bold">Laporan</span>
                                            <p class="text-sm text-gray-500">Cetak laporanmu dalam bentuk PDF.</p>
                                        </div>
                                    </div>
                                </div>
                            </dl>
                        </div>
                    </div>
                    {{-- endsection about --}}
                </div>
            </div>
            </div>
            </div>
        </section>
    </main>
    <script>
        function scrollTo(element) {
            document.querySelector(element).scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>
@endsection
