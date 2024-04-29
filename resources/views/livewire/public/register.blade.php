<div>
    <form wire:submit="register">
        <div class="grid place-items-center w-screen h-screen">
            <div class="w-96 h-[600px] shadow-lg rounded-3xl overflow-hidden bg-yellow-300 relative">
                <a href="/">
                    <img class="absolute top-3 left-3 h-20 w-auto" src="{{ asset('assets/img/logo.png') }}">
                </a>
                <div class="flex justify-center py-3 mb-12">
                    <a href="/register">
                        <span class="font-bold text-2xl text-white">Signup</span>
                    </a>
                </div>
                
                <div class="space-y-3 px-10">
                    <input wire:model="given_name" type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="First Name" required>
                    @error('given_name')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror

                    <input wire:model="family_name" type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Last Name" required>
                    @error('family_name')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror

                    <input wire:model="email" type="email" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Email Address" required>
                    @error('email')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror

                    <input wire:model="password" type="password" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Password" required>
                    @error('password')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror

                    <ul class="space-y-1 list-disc"> 
                        <li class="text-xs ml-5">Password must:</li>
                        <li class="text-xs ml-5">6 characters minimum.</li>
                        <li class="text-xs ml-5">20 characters maximum.</li>
                    </ul>
                </div>
                <div class="space-y-3 px-10 mt-8">
                    <button type="submit" class="w-full bg-white rounded-lg px-3 py-2 hover:bg-gray-300">
                        <span class="text-blue-500">Signup</span>
                    </button>
                </div>
    
                <div class="absolute -bottom-16 left-0 right-0 bg-white rounded-t-full py-20 text-center">
                    <a href="/login">
                        <span class="font-bold text-2xl">Login</span>
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
