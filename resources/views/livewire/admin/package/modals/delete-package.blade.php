<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-xl" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.trash class="w-6 h-6" />
                    <span>Delete Package</span>
                </div>

                <div class="border-b"></div>

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label class="w-2/5 border-r ml-3">Category:</label>
                    <select class="flex-1 border-none w-full" wire:model="service_id" disabled>
                        @forelse ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @empty
                            
                        @endforelse
                    </select>
                </div>
    
                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label class="w-2/5 border-r ml-3">Package Name:</label>
                    <input type="text" class="flex-1 border-none" wire:model="name" disabled>
                </div>

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label class="w-2/5 border-r ml-3">No. of Pax:</label>
                    <input type="number" class="flex-1 border-none" wire:model="no_of_pax" disabled>
                </div>

                <div class="border rounded-lg px-3">
                    <p class="my-1.5">Package Inclusions:</p>
                    <textarea cols="30" rows="5" class="w-full border-none focus:ring-0 p-0" wire:model="inclusions" disabled></textarea>
                </div>

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label class="w-2/5 border-r ml-3">Status:</label>
                    <select class="flex-1 border-none w-full" wire:model="status" disabled>
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
                <button class="border bg-red-700 rounded-lg px-3 py-1" wire:click="delete">
                    <div class="flex items-center gap-3">
                        <span class="text-white">Delete</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>
</div>