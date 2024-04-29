<div x-data="data">
    <div class="h-screen py-24 sm:py-32 relative">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 pb-20">
            <div class="grid grid-cols-12 gap-3">
                @forelse ($packages as $value)
                <div class="col-span-12 md:col-span-6">
                    <div x-data="{ checked: false }" class="space-y-2">
                        <div class="flex items-center justify-between">
                            <label for="package-{{ $value->id }}" class="flex items-center gap-2">
                                <input type="radio" id="package-{{ $value->id }}" name="package" value="{{ $value->id }}" wire:model.live="id">
                                <span class="text-lg font-semibold uppercase">{{ $value->name }}</span>
                            </label>
                            <span class="text-lg font-semibold">₱ {{ number_format($value->price, 2) }}</span>
                        </div>
                        <div
                            class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 h-52">
                            <img src="{{ asset($value->getFirstMedia('packages')->getUrl()) }}"
                                class="absolute inset-0 -z-10 h-auto w-full">
                        </div>
                        <div x-data="{ open: false, toggle() { this.open =! this.open } }">
                            <button class="bg-black rounded-md px-3 py-1 mb-3" x-on:click="toggle">
                                <span class="text-white" x-text="open ? 'Hide details' : 'View details'"></span>
                            </button>
                            <div class="bg-white rounded-md p-3" style="display: none;" x-show="open">
                                <p>{!! $value->inclusions !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>

        @isset($id)
        <div x-show="! steps_modal" class="fixed bottom-0 left-0 right-0 mx-8 mb-2">
            <div class="bg-yellow-300 border border-black rounded-2xl px-8 py-3">
                <div class="flex items-center justify-end gap-3">
                    @auth
                    <button class="bg-black rounded-md px-3 py-1" x-on:click="steps_modal = true, step = 'confirmation'">
                        <span class="text-white">Confirm</span>
                    </button>
                    <button class="bg-black rounded-md px-3 py-1" x-on:click="steps_modal = true, step = 'customize'">
                        <span class="text-white">Customize Package</span>
                    </button>
                    @else
                    <a href="/login" class="bg-black rounded-md px-3 py-1">
                        <span class="text-white">Login</span>
                    </a>
                    <a href="/register" class="bg-black rounded-md px-3 py-1">
                        <span class="text-white">Register</span>
                    </a>
                    @endauth
                </div>
            </div>
        </div>
        @endisset

        @livewire('public.components.modals.steps', ['modal_id' => 'steps_modal'])
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('data', () => ({
                step: @entangle('step'),
                steps_modal: false,
     
                toggleNext(step) {
                    this.step = step
                },

                toggleBack(step) {
                    this.step = step
                },
            }))
        })
    </script>
</div>