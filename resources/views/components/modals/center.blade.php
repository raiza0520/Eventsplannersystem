@props([
    'modal' => 'id',
    'width' => 'sm:max-w-lg'
])

<div x-show="{{ $modal }}">
    <div class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black bg-opacity-80 transition-opacity"></div>
    
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto lg:pl-72">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full {{ $width }}"
                    x-on:click.away="{{ $modal }} = false">
                    <div class="bg-white p-4">
                        {{ $content }}
                    </div>
                    <div class="bg-gray-50 px-4 py-3">
                        {{ $footer }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>