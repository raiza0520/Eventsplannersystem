<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-lg" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.eye class="w-6 h-6" />
                    <span>View Profile</span>
                </div>
                
                <div class="border-b"></div>

                <div class="flex items-center gap-3 p-3 border rounded-lg overflow-hidden cursor-pointer">
                    @if (auth()->user()->getFirstMediaUrl('users'))
                    <img class="h-auto w-2/5" src="{{ asset(auth()->user()->getFirstMediaUrl('users')) }}">
                    @else
                    <img class="h-auto w-2/5" src="{{ asset('assets/img/logo.png') }}" alt="Your Company">
                    @endif
                    <div class="space-y-1">
                        <div>
                            <h3 for="admin" class="capitalize">Role:</h3>
                            <label for="role" class="font-semibold">{{ auth()->user()->role }}</label>
                        </div>
                        <div>
                            <h3 for="admin" class="capitalize">Name:</h3>
                            <label for="name" class="font-semibold">{{ auth()->user()->name }}</label>
                        </div>
                        <div>
                            <h3 for="admin" class="capitalize">Joined:</h3>
                            <label for="joined" class="font-semibold">{{ auth()->user()->created_at }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex items-center justify-between">
                <button class="border rounded-lg px-3 py-1" x-on:click="{{ $modal }} = false">
                    <div class="flex items-center gap-3">
                        <span>Close</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>
</div>