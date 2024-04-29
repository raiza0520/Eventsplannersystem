<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-lg" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.edit class="w-6 h-6" />
                    <span>Edit Profile</span>
                </div>
                
                <div class="border-b"></div>

                <div class="flex items-center gap-3 p-3 border rounded-lg overflow-hidden cursor-pointer">
                    @if (auth()->user()->getFirstMediaUrl('users'))
                    <img class="h-auto w-2/5" src="{{ asset(auth()->user()->getFirstMediaUrl('users')) }}">
                    @else
                    <img class="h-auto w-2/5" src="{{ asset('assets/img/logo.png') }}" alt="Your Company">
                    @endif
                    <input id="profile" type="file" class="flex-1" wire:model="file">
                </div>

                @error('file')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror
    
                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">Name:</label>
                    <input type="text" class="flex-1 border-none" wire:model="name">
                </div>

                @error('name')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror

                <div 
                    class="flex items-center border rounded-lg overflow-hidden"
                    x-data="{ type: 'password', toggleViewPassword() { this.type = this.type == 'password' ? 'text' : 'password' } }">
                    <label for="new-password" class="w-2/5 border-r ml-3">New Password:</label>
                    <input x-bind:type="type" class="flex-1 border-none" wire:model="password">
                    <x-icons.eye class="w-4 h-4 cursor-pointer mx-3" x-on:click="toggleViewPassword" />
                </div>

                @error('password')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror

                <div 
                    class="flex items-center border rounded-lg overflow-hidden"
                    x-data="{ type: 'password', toggleViewPassword() { this.type = this.type == 'password' ? 'text' : 'password' } }">
                    <label for="confirm-password" class="w-2/5 border-r ml-3">Confirm Password:</label>
                    <input x-bind:type="type" class="flex-1 border-none" wire:model="password_confirmation">
                    <x-icons.eye class="w-4 h-4 cursor-pointer mx-3" x-on:click="toggleViewPassword" />
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
                <button class="border bg-blue-500 rounded-lg px-3 py-1" wire:click="save">
                    <div class="flex items-center gap-3">
                        <span class="text-white">Save</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>
</div>