<div class="lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col" x-show="sidebar">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex grow flex-col gap-y-5 overflow-x-hidden overflow-y-auto bg-black pb-4">
        <div class="flex h-16 shrink-0 items-center justify-between px-6 gap-2">
            <img class="h-10 w-auto" src="{{ asset('assets/img/logo.png') }}" alt="Your Company">
            <span class="text-white text-center">Dani’s Catering and Events</span>
        </div>
        <nav class="flex flex-1 flex-col pl-6">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                <li>
                    <ul role="list" class="-mx-2 space-y-1">
                        <li @class([ 'relative flex rounded-l-full text-gray-400 items-center justify-between'
                            , 'bg-yellow-300 text-black'=> request()->routeIs('dashboard')
                            ])>
                            <a href="/admin/dashboard"
                                class="group flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <x-icons.home class="w-6 h-6"
                                    fill="{{ request()->routeIs('dashboard') ? '#000' : '#9ba3ae' }}" />
                                Dashboard
                            </a>
                            @if (request()->routeIs('dashboard'))
                            <span class="absolute right-0 rounded-l-full bg-yellow-300 w-5 h-16"></span>
                            @endif
                        </li>
                        <li @class(['relative flex rounded-l-full text-gray-400 items-center justify-between'
                            , 'bg-yellow-300 text-black'=> request()->routeIs('transactions') || request()->routeIs('transactions.manage')
                            ])>
                            <a href="/admin/transactions"
                                class="group flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <x-icons.museum class="w-6 h-6"
                                    fill="{{ request()->routeIs('transactions') || request()->routeIs('transactions.manage') ? '#000' : '#9ba3ae' }}" />
                                Transaction Records
                            </a>
                            @if (request()->routeIs('transactions') || request()->routeIs('transactions.manage'))
                            <span class="absolute right-0 rounded-l-full bg-yellow-300 w-5 h-16"></span>
                            @endif
                        </li>
                        <li @class([ 'relative flex rounded-l-full text-gray-400 items-center justify-between'
                            , 'bg-yellow-300 text-black'=> request()->routeIs('services')
                            ])>
                            <a href="/admin/services"
                                class="group flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <x-icons.services class="w-6 h-6"
                                    fill="{{ request()->routeIs('services') ? '#000' : '#9ba3ae' }}" />
                                Services
                            </a>
                            @if (request()->routeIs('services'))
                            <span class="absolute right-0 rounded-l-full bg-yellow-300 w-5 h-16"></span>
                            @endif
                        </li>
                        <li @class([ 'relative flex rounded-l-full text-gray-400 items-center justify-between'
                            , 'bg-yellow-300 text-black'=> request()->routeIs('packages')
                            ])>
                            <a href="/admin/packages"
                                class="group flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <x-icons.list-check class="w-6 h-6"
                                    stroke="{{ request()->routeIs('packages') ? '#000' : '#9ba3ae' }}" />
                                Packages
                            </a>
                            @if (request()->routeIs('packages'))
                            <span class="absolute right-0 rounded-l-full bg-yellow-300 w-5 h-16"></span>
                            @endif
                        </li>
                        <li @class([ 'relative flex rounded-l-full text-gray-400 items-center justify-between'
                            , 'bg-yellow-300 text-black'=> request()->routeIs('gallery')
                            ])>
                            <a href="/admin/gallery"
                                class="group flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <x-icons.gallery-heart class="w-6 h-6"
                                    stroke="{{ request()->routeIs('gallery') ? '#000' : '#9ba3ae' }}" />
                                Gallery
                            </a>
                            @if (request()->routeIs('gallery'))
                            <span class="absolute right-0 rounded-l-full bg-yellow-300 w-5 h-16"></span>
                            @endif
                        </li>
                        
                        <li @class([ 'relative flex rounded-l-full text-gray-400 items-center justify-between'
                            , 'bg-yellow-300 text-black'=> request()->routeIs('item-types')
                            ])>
                            <a href="/admin/item-types"
                                class="group flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <x-icons.list-check class="w-6 h-6"
                                    stroke="{{ request()->routeIs('item-types') ? '#000' : '#9ba3ae' }}" />
                                Item Types
                            </a>
                            @if (request()->routeIs('item-types'))
                            <span class="absolute right-0 rounded-l-full bg-yellow-300 w-5 h-16"></span>
                            @endif
                        </li>
                    </ul>
                </li>

                <li class="mt-auto">
                    <ul role="list" class="-mx-2 space-y-1">
                        <li @class([ 'relative flex rounded-l-full text-gray-400 items-center justify-between'
                            , 'bg-yellow-300 text-black'=> request()->routeIs('banks')
                            ])>
                            <a href="/admin/banks"
                                class="group flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <x-icons.card-transfer class="w-6 h-6"
                                    stroke="{{ request()->routeIs('banks') ? '#000' : '#9ba3ae' }}" />
                                Account of Dani’s
                            </a>
                            @if (request()->routeIs('banks'))
                            <span class="absolute right-0 rounded-l-full bg-yellow-300 w-5 h-16"></span>
                            @endif
                        </li>
                        <li class="relative flex rounded-l-full text-gray-400 items-center justify-between">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="group flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                    <x-icons.logout class="w-5 h-5" fill="#9ba3ae" />
                                    <span>Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>