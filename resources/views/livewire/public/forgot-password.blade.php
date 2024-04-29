<div>
    <div class="grid place-items-center w-screen h-screen">
        <div class="w-96 h-[400px] shadow-lg rounded-3xl overflow-hidden bg-yellow-300 relative">
            <div class="flex justify-center py-3 my-5">
                <a href="/register">
                    <span class="font-bold text-2xl text-white">Forgot Password</span>
                </a>
            </div>
            
            @if ($validated)
            <div class="space-y-3 px-10" wire:key="password">
                <div 
                    class="flex items-center overflow-hidden rounded-lg border"
                    x-data="{ type: 'password', toggleViewPassword() { this.type = this.type == 'password' ? 'text' : 'password' } }">
                    <input x-bind:type="type" class="flex-1 border-none" wire:model="password" placeholder="Password">
                    <x-icons.eye class="w-4 h-4 cursor-pointer mx-3" x-on:click="toggleViewPassword" />
                </div>
        
                @error('password')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror
        
                <div 
                    class="flex items-center border rounded-lg overflow-hidden"
                    x-data="{ type: 'password', toggleViewPassword() { this.type = this.type == 'password' ? 'text' : 'password' } }">
                    <input x-bind:type="type" class="flex-1 border-none" wire:model="password_confirmation" placeholder="Confirm Pasword">
                    <x-icons.eye class="w-4 h-4 cursor-pointer mx-3" x-on:click="toggleViewPassword" />
                </div>
            </div>
            <div class="space-y-3 px-10 mt-5">
                <button 
                    class="w-full bg-white rounded-lg px-3 py-2 hover:bg-gray-300"
                    wire:click="update"
                    wire:target="update"
                    wire:loading.attr="disabled"
                    wire:loading.class="cursor-wait">
                    <span class="text-blue-500">Reset Password</span>
                </button>
            </div>
            @else
                @empty($user)
                <div class="mt-10">
                    <div class="space-y-3 px-10" wire:key="email">
                        <input wire:model.live="email" type="email" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Email Address" required>
                        
                        @error('email')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-3 px-10 mt-5">
                        <button 
                            class="w-full bg-white rounded-lg px-3 py-2 hover:bg-gray-300"
                            wire:click="sendEmail"
                            wire:target="sendEmail"
                            wire:loading.attr="disabled"
                            wire:loading.class="cursor-wait">
                            <span class="text-blue-500">Send Code</span>
                        </button>
                    </div>
                </div>
                @else
                <div class="mt-10">
                    <div class="space-y-3 px-10" wire:key="code">
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Code" required wire:model.live="code">
                        
                        @error('code')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-3 px-10 mt-5">
                        <button 
                            class="w-full bg-white rounded-lg px-3 py-2 hover:bg-gray-300"
                            wire:click="verifyCode"
                            wire:target="verifyCode"
                            wire:loading.attr="disabled"
                            wire:loading.class="cursor-wait">
                            <span class="text-blue-500">Verify</span>
                        </button>
                    </div>
                </div>
                @endempty
            @endif

            <div class="absolute -bottom-16 left-0 right-0 bg-white rounded-t-full py-20 text-center">
                <a href="/login">
                    <span class="font-bold text-2xl">Login</span>
                </a>
            </div>
        </div>
    </div>
</div>
