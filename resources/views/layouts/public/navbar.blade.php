<nav class="bg-black rounded-2xl mx-8 my-1 fixed top-0 left-0 right-0 z-10"
    x-data="menu">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex h-16 items-center justify-between gap-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-20 w-auto" src="{{ asset('assets/img/logo.png') }}"
                        alt="Your Company">
                </div>
            </div>
            
            <div class="flex-1 hidden sm:ml-6 sm:block">
                <div class="flex justify-evenly space-x-4">
                    <a href="/"
                        @class([
                            'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white', 
                            'bg-yellow-300 text-white' => request()->routeIs('home')
                        ])>
                        <span>Home</span>
                    </a>
                    <a href="/about-us"
                        @class([
                            'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white', 
                            'bg-yellow-300 text-white' => request()->routeIs('about-us')
                        ])>
                        <span>About Us</span>
                    </a>
                    <a href="/services"
                        @class([
                            'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white', 
                            'bg-yellow-300 text-white' => request()->routeIs('services')
                        ])>
                        <span>Services</span>
                    </a>
                    <a href="/portfolio"
                        @class([
                            'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white', 
                            'bg-yellow-300 text-white' => request()->routeIs('portfolio')
                        ])>
                        <span>Portfolio</span>
                    </a>
                </div>
            </div>

            <div class="hidden sm:ml-6 sm:block">
                <div class="flex items-center">
                    @auth
                    <!-- Profile dropdown -->
                    <div class="relative ml-3" x-data="{ open: false, toggle() { this.open =! this.open } }">
                        <div>
                            <button type="button"
                                class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true" x-on:click="toggle">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <x-icons.user-circle class="w-8 h-8" fill="#f8e046" />
                            </button>
                        </div>

                        <div class="absolute right-0 z-10 mt-9 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                            style="display: none;" x-show="open">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="/account/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="user-menu-item-0">Your Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                    id="user-menu-item-2">
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="flex items-center gap-2">
                        <a href="/login"
                            class="rounded-md px-3 py-2 text-sm font-medium bg-gray-800 text-white hover:bg-gray-700 hover:text-white">
                            <span>Login</span>
                        </a>
                    </div>
                    @endauth
                </div>
            </div>
            <div class="-mr-2 flex sm:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false" x-on:click="toggleMenu">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true"
                        style="display: none;"
                        x-show="!menu">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true"
                        style="display: none;"
                        x-show="menu">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Home</a>
            <a href="/about-us"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About
                Us</a>
            <a href="/services"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Services</a>
            <a href="/portfolio"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Portfolio</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
                <span class="text-base font-medium text-white">Tom Cook</span>
                <button type="button"
                    class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                        out</a>
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('menu', () => ({
                menu: false, 

                toggleMenu() { 
                    this.menu =! this.menu 
                }
            }))
        })
    </script>
</nav>