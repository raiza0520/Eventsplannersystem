<div>
    <form wire:submit="login">
        <div class="grid place-items-center w-screen h-screen">
            <div class="w-96 h-[500px] shadow-lg rounded-3xl overflow-hidden bg-yellow-300 relative">
                <a href="/">
                    <img class="absolute top-3 left-3 h-20 w-auto" src="{{ asset('assets/img/logo.png') }}">
                </a>
                <div class="flex justify-center py-3">
                    <a href="/register">
                        <span class="font-bold text-2xl text-white">Signup</span>
                    </a>
                </div>
                <div class="h-full bg-white rounded-t-full">
                    <div class="flex justify-center pt-20 mb-20">
                        <a href="/login">
                            <span class="font-bold text-2xl">Login</span>
                        </a>
                    </div>
                    
                    <div class="space-y-3 px-10">
                        <input wire:model="email" type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Email Address" required>
                        @error('email')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror

                        <input wire:model="password" type="password" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Password" required>
                        @error('password')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror

                        <div>
                            <a href="/forgot-password">
                                <span class="text-sm text-gray-500 italic">Forgot password?</span>
                            </a>
                        </div>

                        <button type="submit" class="w-full bg-yellow-300 rounded-lg px-3 py-2 hover:bg-yellow-400">
                            <span class="text-white">Login</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
