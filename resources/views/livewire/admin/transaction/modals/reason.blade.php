<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-xl" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.plus class="w-6 h-6" />
                    <span>Reason for Cancelation/Declining the client:!</span>
                </div>
                
                <div class="border-b"></div>

                <div class="border rounded-lg px-3 pb-3">
                    <div wire:ignore>
                        <textarea cols="30" rows="5" class="w-full border-none focus:ring-0 p-0" readonly>{{ $transaction->reason }}</textarea>
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