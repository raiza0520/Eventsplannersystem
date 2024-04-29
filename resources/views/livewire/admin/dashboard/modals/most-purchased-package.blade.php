<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-lg" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.cart-check class="w-6 h-6" />
                    <span>Most Purchased Package</span>
                </div>

                <div class="flex flex-col items-center w-full max-w-screen-md bg-white rounded-lg border p-3">
                    <span class="font-semibold mb-3">As of {{ date('F') }}</span>
                    <div class="flex items-end flex-grow w-full space-x-2 sm:space-x-3">
                        @forelse ($packages as $package)
                        @php
                            // Define a scaling factor to bring the values within a reasonable range
                            $scalingFactor = 0.05;
                            $scaledHeight = $package->transactions_sum_total_amount * $scalingFactor;
                            // Limit the maximum height to a reasonable value (e.g., 100 pixels)
                            $maxHeight = min($scaledHeight, 100);
                        @endphp
                        <div class="relative flex flex-col items-center flex-grow pb-5 group mt-5">
                            <span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">
                                ₱ {{ $package->transactions_sum_total_amount ?? 0 }}
                            </span>
                            <div class="relative flex justify-center rounded-t-xl w-full bg-red-600" style="height: {{ $maxHeight > 0 ? $maxHeight : 10 }}px;"></div>
                            <span class="absolute bottom-0 text-xs font-bold">{{ $package->name }}</span>
                        </div>
                        @empty
                        <span class="w-full text-center">No data available.</span>
                        @endforelse
                    </div>
                </div>
                

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label class="w-2/5 border-r ml-3">Category:</label>
                    <select class="flex-1 border-none w-full" wire:model.live="service_id">
                        <option value="" hidden>All</option>
                        @forelse ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @empty
                        
                        @endforelse
                    </select>
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