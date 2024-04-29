<div>
    <div class="flex items-center justify-center h-screen mx-8 mb-10" style="margin-top: 105px;">
        <div x-data="carousel" class="relative w-full">
            <div class="overflow-hidden rounded-2xl">
                <div class="flex transition-transform" style="transform: translateX(-{{ $current }} * 100%);">
                    <div class="flex-shrink-0">
                        @forelse ($images as $key => $image)
                        
                            @if ($current == $key)
                            <img 
                                src="{{ asset($image->getFirstMedia('gallery')->getUrl()) }}" 
                                class="w-screen h-screen object-cover"
                                alt="carousel-image">
                            @endif
                        @empty
                            
                        @endforelse
                    </div>
                </div>
            </div>
            
            @if ($images->count() > 1)
            <div class="absolute h-full top-0 left-0 right-0 flex justify-between">
                <button wire:click="togglePrevious" class="w-20 flex items-center justify-center">
                    <x-icons.caret-left class="w-14 h-14" fill="#f8e046" />
                </button>
                <button wire:click="toggleNext" class="w-20 flex items-center justify-center">
                    <x-icons.caret-right class="w-14 h-14" fill="#f8e046" />
                </button>
            </div>
            @endif
        </div>
    </div>
</div>
