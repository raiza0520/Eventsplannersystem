<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-xl" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.edit class="w-6 h-6" />
                    <span>Edit Account</span>
                </div>

                <div class="border-b"></div>
    
                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">Name:</label>
                    <input type="text" class="flex-1 border-none" wire:model="name">
                </div>

                @error('name')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">Account Name:</label>
                    <input type="text" class="flex-1 border-none" wire:model="account_name">
                </div>

                @error('account_name')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">Account Number:</label>
                    <input type="text" class="flex-1 border-none" wire:model="account_number">
                </div>

                @error('account_number')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">Status:</label>
                    <select class="flex-1 border-none w-full" wire:model="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
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
                <button class="border bg-blue-500 rounded-lg px-3 py-1" wire:click="update">
                    <div class="flex items-center gap-3">
                        <span class="text-white">Save</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>
</div>