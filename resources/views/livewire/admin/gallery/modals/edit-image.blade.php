<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-xl" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.edit class="w-6 h-6" />
                    <span>Edit Image</span>
                </div>

                <div class="border-b"></div>

                <div class="flex items-center gap-3 p-3 border rounded-lg overflow-hidden">
                    @if ($gallery)
                        <img class="h-auto w-2/5" src="{{ asset($gallery->getFirstMediaUrl('gallery')) }}">
                    @endif
                    <input id="profile" type="file" class="flex-1" wire:model="file">
                </div>

                @error('file')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror
    
                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label class="w-2/5 border-r ml-3">Type:</label>
                    <select class="flex-1 border-none w-full" wire:model="type">
                        <option value="carousel">Carousel</option>
                        <option value="portfolio">Portfolio</option>
                    </select>
                </div>

                @error('type')
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