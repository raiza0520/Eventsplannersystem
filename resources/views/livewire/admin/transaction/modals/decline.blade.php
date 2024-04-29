<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-xl" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.plus class="w-6 h-6" />
                    <span>Feedback!</span>
                </div>
                
                <div class="border-b"></div>

                <div class="border rounded-lg px-3 pb-3">
                    <p class="my-1.5">Reason for declining the client:</p>
                    <div wire:ignore>
                        <textarea cols="30" rows="5" class="w-full border-none focus:ring-0 p-0" wire:model="reason"></textarea>
                    </div>
                </div>

                @error('reason')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex items-center justify-between">
                <button class="border rounded-lg px-3 py-1" x-on:click="{{ $modal }} = false">
                    <div class="flex items-center gap-3">
                        <span>Close</span>
                    </div>
                </button>
                <button class="border bg-blue-500 rounded-lg px-3 py-1" wire:click="saveReason({{ $transaction->id }})">
                    <div class="flex items-center gap-3">
                        <span class="text-white">Save</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>

</div>