<div>
    <div class="space-y-3">
        <div class="flex items-center gap-3">
            <span class="text-xl font-semibold">Profile</span>
        </div>

        <div class="flex items-center gap-3">
            <div class="w-1/5">
                <label for="profile" class="cursor-pointer">
                    @if (auth()->user()->getFirstMediaUrl('users'))
                    <img class="h-auto" src="{{ asset(auth()->user()->getFirstMediaUrl('users')) }}">
                    @else
                    <img class="h-auto" src="{{ asset('assets/img/logo.png') }}" alt="Your Company">
                    @endif
                    
                    <input id="profile" type="file" class="sr-only" wire:model="file">
                </label>
            </div>
            <div class="flex-1 space-y-3">
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
        </div>

        @error('file')
        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
        @enderror

        <div class="flex items-center justify-end">
            <button class="bg-yellow-300 rounded-md px-3 py-1.5" wire:click="save">
                <div class="flex items-center gap-3">
                    <span class="font-semibold">Save changes</span>
                </div>
            </button>
        </div>
    </div>
</div>
