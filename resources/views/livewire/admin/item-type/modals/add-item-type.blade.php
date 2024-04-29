<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-xl" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.plus class="w-6 h-6" />
                    <span>Add Item Type</span>
                </div>

                <div class="border-b"></div>
                
                <div class="flex items-center border rounded-lg overflow-hidden py-1">
                    <label class="w-2/5 border-r ml-3">Photo:</label>
                    <input id="profile" type="file" class="flex-1 border-none" wire:model="file">
                </div>
                
                <div class="border-b"></div>

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">Name:</label>
                    <input type="text" class="flex-1 border-none" wire:model="name">
                </div>

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="itemprice" class="w-2/5 border-r ml-3">price:</label>
                    <input type="number" class="flex-1 border-none" wire:model="itemprice">
                </div>

                @error('name')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label class="w-2/5 border-r ml-3">Type:</label>
                    <select class="flex-1 border-none w-full" wire:model="type">
                        <option value="" hidden></option>
                        <option value="addons">Addons</option>
                        <option value="customize">Customize</option>
                    </select>
                </div>

                @error('type')
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
                <button class="border bg-blue-500 rounded-lg px-3 py-1" wire:click="save">
                    <div class="flex items-center gap-3">
                        <span class="text-white">Add</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>
</div>