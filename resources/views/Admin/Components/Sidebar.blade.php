<div class="bg-white">

    <div x-data="{ open: false }" @keydown.window.escape="open = false">

        <div x-show="open" class="relative z-50 lg:hidden"
            x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog"
            aria-modal="true">

            <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900/80"
                x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state."></div>


            <div class="fixed inset-0 flex">

                <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in-out duration-300 transform"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                    x-description="Off-canvas menu, show/hide based on off-canvas menu state."
                    class="relative mr-16 flex w-full max-w-xs flex-1" @click.away="open = false">

                    <div x-show="open" x-transition:enter="ease-in-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        x-description="Close button, show/hide based on off-canvas menu state."
                        class="absolute left-full top-0 flex w-16 justify-center pt-5">
                        <button type="button" class="-m-2.5 p-2.5" @click="open = false">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Sidebar component, swap this element with another sidebar if you like -->
                    <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-2">
                        <div class="flex h-16 shrink-0 items-center">
                            <img class="h-8 w-auto"
                                src="{{ asset('Icons/master.png') }}"
                                alt="Your Company">
                        </div>
                        <nav class="flex flex-1 flex-col">
                            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                                <li>
                                    <ul role="list" class="-mx-2 space-y-1">
                                        <li>
                                            <a href="{{ route('admin') }}"
                                                class="bg-gray-50 text-indigo-600 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                                x-state-description="Current: &quot;bg-gray-50 text-indigo-600&quot;, Default: &quot;text-gray-700 hover:text-indigo-600 hover:bg-gray-50&quot;">
                                                <svg class="h-6 w-6 shrink-0 text-indigo-600" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                                                    </path>
                                                </svg>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.peserta') }}"
                                                class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                                x-state-description="undefined: &quot;bg-gray-50 text-indigo-600&quot;, undefined: &quot;text-gray-700 hover:text-indigo-600 hover:bg-gray-50&quot;">
                                                <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z">
                                                    </path>
                                                </svg>
                                                Peserta
                                            </a>
                                        </li>
                                       
                                        <li>
                                            <{{ route('admin.kondisi') }} href="#"
                                                class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                                x-state-description="undefined: &quot;bg-gray-50 text-indigo-600&quot;, undefined: &quot;text-gray-700 hover:text-indigo-600 hover:bg-gray-50&quot;">
                                                <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75">
                                                    </path>
                                                </svg>
                                                Indikator Nilai
                                                </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.nilai') }}"
                                                class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                                x-state-description="undefined: &quot;bg-gray-50 text-indigo-600&quot;, undefined: &quot;text-gray-700 hover:text-indigo-600 hover:bg-gray-50&quot;">
                                                <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z"></path>
                                                </svg>
                                                Penilaian
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <div class="flex items-center justify-between px-4 py-2 bg-gray-100">
                            <h1 class="text-xl font-semibold">Halo, {{ Auth::user()->name }}!</h1>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-gradient-to-r from-blue-300 to-blue-600 text-white px-4 py-2 rounded-md hover:bg-gradient-to-r hover:from-blue-400 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 font-medium transition duration-300 ease-in-out transform hover:scale-105">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Static sidebar for desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6">
                <div class="flex h-16 shrink-0 items-center">
                    <img class="h-12 w-auto" src="{{ asset('Icons/master.png') }}"
                        alt="Your Company">
                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li>
                                    <a href="{{ route('admin') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->route()->named('admin') ? 'bg-gray-50 text-indigo-600' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50' }}"
                                        x-state:on="{{ request()->route()->named('admin') ? 'Current' : 'Default' }}"
                                        x-state:off="{{ !request()->route()->named('admin') ? 'Current' : 'Default' }}"
                                        x-state-description="Current: &quot;bg-gray-50 text-indigo-600&quot;, Default: &quot;text-gray-700 hover:text-indigo-600 hover:bg-gray-50&quot;">
                                        <svg class="h-6 w-6 shrink-0
                                            @if (request()->route()->named('admin'))
                                                text-indigo-600
                                                
                                            @else
                                            text-gray-400 group-hover:text-indigo-600 hover:bg-gray-50
                                            @endif"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                                            </path>
                                        </svg>
                                        Dashboard
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.peserta') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->route()->named('admin.peserta') ? 'bg-gray-50 text-indigo-600' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50' }}"
                                        x-state:on="{{ request()->route()->named('admin.peserta') ? 'Current' : 'Default' }}"
                                        x-state:off="{{ !request()->route()->named('admin.peserta') ? 'Current' : 'Default' }}"
                                        x-state-description="Current: &quot;bg-gray-50 text-indigo-600&quot;, Default: &quot;text-gray-700 hover:text-indigo-600 hover:bg-gray-50&quot;">
                                        <svg class="h-6 w-6 shrink-0
                                            @if (request()->route()->named('admin.peserta'))
                                                text-indigo-600
                                                
                                            @else
                                                text-gray-400 group-hover:text-indigo-600 hover:bg-gray-50
                                            @endif"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z">
                                            </path>
                                        </svg>
                                        Peserta
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.kondisi') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->route()->named('admin.kondisi') ? 'bg-gray-50 text-indigo-600' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50' }}"
                                        x-state:on="{{ request()->route()->named('admin.kondisi') ? 'Current' : 'Default' }}"
                                        x-state:off="{{ !request()->route()->named('admin.kondisi') ? 'Current' : 'Default' }}"
                                        x-state-description="Current: &quot;bg-gray-50 text-indigo-600&quot;, Default: &quot;text-gray-700 hover:text-indigo-600 hover:bg-gray-50&quot;">
                                        <svg class="h-6 w-6 shrink-0
                                            @if (request()->route()->named('admin.kondisi'))
                                                text-indigo-600
                                                
                                            @else
                                                text-gray-400 group-hover:text-indigo-600 hover:bg-gray-50
                                            @endif"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75">
                                            </path>
                                        </svg>
                                        Indikator Nilai
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.nilai') }}"
                                        class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->route()->named('admin.nilai') ? 'bg-gray-50 text-indigo-600' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50' }}"
                                        x-state:on="{{ request()->route()->named('admin.nilai') ? 'Current' : 'Default' }}"
                                        x-state:off="{{ !request()->route()->named('admin.nilai') ? 'Current' : 'Default' }}"
                                        x-state-description="Current: &quot;bg-gray-50 text-indigo-600&quot;, Default: &quot;text-gray-700 hover:text-indigo-600 hover:bg-gray-50&quot;">
                                        <svg class="h-6 w-6 shrink-0
                                            @if (request()->route()->named('admin.nilai'))
                                                text-indigo-600
                                                
                                            @else
                                                text-gray-400 group-hover:text-indigo-600 hover:bg-gray-50
                                            @endif"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z"></path>
                                        </svg>
                                        Penilaian
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="flex items-center justify-between px-4 py-2 mb-14">
                        <h1 class="text-lg font-semibold">Halo, {{ Auth::user()->name }}!</h1>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-gradient-to-r from-blue-300 to-blue-600 text-white px-4 py-2 rounded-md hover:bg-gradient-to-r hover:from-blue-400 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 font-medium transition duration-300 ease-in-out transform hover:scale-105">Logout</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>

        <div class="sticky top-0 z-40 flex items-center gap-x-6 bg-white px-4 py-4 shadow-sm sm:px-6 lg:hidden">
            <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="open = true">
                <span class="sr-only">Open sidebar</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                </svg>
            </button>
            <div class="flex-1 text-md font-semibold capitalize leading-6 text-gray-900">{{ request()->route()->getName() === 'admin' ? 'Dashboard' : str_replace('admin.', '', request()->route()->getName()) }}
            </div>
        </div>
    </div>

</div>
