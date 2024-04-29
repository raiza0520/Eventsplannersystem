<div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 bg-yellow-300 px-4 sm:gap-x-6 sm:px-6 lg:px-8"
    x-data="header">
    <button type="button" class="-m-2.5 p-2.5 text-gray-700" x-on:click="toggleSidebar">
        <span class="sr-only">Open sidebar</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </button>

    <!-- Separator -->
    <div class="h-6 w-px bg-gray-900/10 lg:hidden" aria-hidden="true"></div>

    <div class="flex justify-end flex-1 gap-x-4 self-stretch lg:gap-x-6">
        <div class="flex items-center gap-x-4 lg:gap-x-6">
            <!-- Profile dropdown -->
            <div class="relative" x-data="{ open: false, toggle() { this.open =! this.open } }">
                <button type="button" class="-m-1.5 flex items-center p-1.5" id="user-menu-button" aria-expanded="false"
                    aria-haspopup="true"
                    x-on:click="toggle">
                    <span class="sr-only">Open user menu</span>
                    @if (auth()->user()->getFirstMediaUrl('users'))
                        <img class="w-7 h-7" src="{{ asset(auth()->user()->getFirstMediaUrl('users')) }}">
                    @else
                        <img class="w-7 h-7" src="{{ asset('assets/img/logo.png') }}" alt="Your Company">
                    @endif
                </button>

                <div class="absolute right-0 z-10 mt-9 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                    style="display: none;" 
                    x-show="open"
                    x-on:click.away="open = false">
                    <span class="block px-4 py-2 text-sm text-gray-700 cursor-pointer" role="menuitem" tabindex="-1"
                        id="user-menu-item-2"
                        x-on:click="toggleViewProfileModal">View Profile</span>
                    <span class="block px-4 py-2 text-sm text-gray-700 cursor-pointer" role="menuitem" tabindex="-1"
                        id="user-menu-item-1"
                        x-on:click="toggleEditProfileModal">Edit Profile</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-2">
                            Sign out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute">
        @livewire('admin.dashboard.modals.edit-profile', ['modal' => 'edit_profile_modal'])
        @livewire('admin.dashboard.modals.view-profile', ['modal' => 'view_profile_modal'])
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('header', () => ({
                edit_profile_modal: false,
                view_profile_modal: false,

                toggleEditProfileModal() {
                    this.edit_profile_modal = ! this.edit_profile_modal
                },

                toggleViewProfileModal() {
                    this.view_profile_modal = ! this.view_profile_modal
                }
            }))
        })
    </script>
</div>