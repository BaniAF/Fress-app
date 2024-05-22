<nav x-data="{ open: false }" class="border-b border-indigo-300 border-opacity-25 bg-indigo-600 lg:border-none">
    <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-8">
        <div class="relative flex h-16 items-center justify-between lg:justify-around lg:border-b lg:border-indigo-400 lg:border-opacity-25">
            <!-- Logo Section -->
            <div class="flex items-center px-2 lg:px-4">
                <div class="flex-shrink-0">
                    <img class="block h-8 w-8 lg:h-12 lg:w-auto" src="{{ asset('Icons/master.png') }}" alt="Your Company">
                </div>
            </div>
        
            <!-- Desktop Navigation Links -->
            <div class="hidden lg:flex lg:ml-10 lg:space-x-4">
                <a href="{{ route('user') }}"
                   class="nav-link @if (request()->route()->named('user')) bg-indigo-700 text-white @else text-white hover:bg-indigo-500 hover:bg-opacity-75 @endif rounded-md py-2 px-3 text-sm font-medium">
                    Dashboard
                </a>
                <a href="{{ route('user.profil') }}"
                   class="nav-link @if (request()->route()->named('user.profil')) bg-indigo-700 text-white @else text-white hover:bg-indigo-500 hover:bg-opacity-75 @endif rounded-md py-2 px-3 text-sm font-medium">
                    Profil
                </a>
            </div>
        
            <!-- User Info and Logout Button -->
            <div class="flex items-center lg:ml-auto px-2 lg:px-4">
                @auth('peserta')
                    <h1 class="text-xl text-white font-semibold hidden lg:block">Halo, {{ auth('peserta')->user()->nama }}!</h1>
                @endauth
                <div class="border-l border-gray-300 h-6 mx-4 hidden lg:block"></div> <!-- Divider -->
                <form action="{{ route('logout') }}" method="POST" class="hidden lg:block">
                    @csrf
                    <button type="submit"
                        class="bg-gradient-to-r from-green-300 to-blue-600 text-white font-bold px-4 py-2 rounded-md hover:bg-gradient-to-r hover:from-green-400 hover:to-blue-700 focus:outline-non focus:ring-opacity-50 transition duration-300 ease-in-out transform hover:scale-105">
                        Logout
                    </button>
                </form>
            </div>
        
            <!-- Mobile Menu Button -->
            <div class="flex lg:hidden">
                <button type="button"
                    class="inline-flex items-center justify-center rounded-md bg-indigo-600 p-2 text-indigo-200 hover:bg-indigo-500 hover:bg-opacity-75 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600"
                    aria-controls="mobile-menu" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
                    <span class="sr-only">Open main menu</span>
                    <svg x-state:on="Menu open" x-state:off="Menu closed" class="block h-6 w-6" :class="{ 'hidden': open, 'block': !(open) }" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                    </svg>
                    <svg x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-6 w-6" :class="{ 'block': open, 'hidden': !(open) }" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="lg:hidden" id="mobile-menu" x-show="open" @click.away="open = false">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <a href="{{ route('user') }}"
                   class="block nav-link @if (request()->route()->named('user')) bg-indigo-700 text-white @else text-gray-300 hover:bg-indigo-500 hover:bg-opacity-75 @endif rounded-md py-2 px-3 text-base font-medium">
                    Dashboard
                </a>
                <a href="{{ route('user.profil') }}"
                   class="block nav-link @if (request()->route()->named('user.profil')) bg-indigo-700 text-white @else text-gray-300 hover:bg-indigo-500 hover:bg-opacity-75 @endif rounded-md py-2 px-3 text-base font-medium">
                    Profil
                </a>
                <div class="border-t border-gray-700 mt-4 pt-4">
                    @auth('peserta')
                        <h1 class="text-lg text-gray-300">Halo, {{ auth('peserta')->user()->nama }}!</h1>
                    @endauth
                    <form action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-300 to-blue-600 text-white px-4 py-2 rounded-md hover:bg-gradient-to-r hover:from-blue-400 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 font-medium transition duration-300 ease-in-out transform hover:scale-105">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>

    <div x-description="Mobile menu, show/hide based on menu state." class="lg:hidden" id="mobile-menu" x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="{{ route('user') }}"
                class="bg-indigo-700 text-white block rounded-md py-2 px-3 text-base font-medium" aria-current="page"
                x-state:on="Current" x-state:off="Default"
                x-state-description="Current: &quot;bg-indigo-700 text-white&quot;, Default: &quot;text-white hover:bg-indigo-500 hover:bg-opacity-75&quot;">Dashboard</a>
            <a href="{{ route('user.profil') }}"
                class="text-white hover:bg-indigo-500 hover:bg-opacity-75 block rounded-md py-2 px-3 text-base font-medium"
                x-state-description="undefined: &quot;bg-indigo-700 text-white&quot;, undefined: &quot;text-white hover:bg-indigo-500 hover:bg-opacity-75&quot;">Profil</a>
        </div>
    </div>


</nav>
