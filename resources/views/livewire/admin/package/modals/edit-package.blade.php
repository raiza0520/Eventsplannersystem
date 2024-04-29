<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-5xl" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.edit class="w-6 h-6" />
                    <span>Edit Package</span>
                </div>

                <div class="border-b"></div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="col-span-2 md:col-span-1 border rounded-md p-3 space-y-3">
                        <div class="flex items-center gap-3 p-3 border rounded-lg overflow-hidden">
                            @if ($package)
                                <img class="h-auto w-2/5" src="{{ asset($package->getFirstMediaUrl('packages')) }}">
                            @endif
                            <input id="profile" type="file" class="flex-1" wire:model="file">
                        </div>

                        @error('file')
                            <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror

                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">Category:</label>
                            <select class="flex-1 border-none w-full" wire:model="service_id">
                                @forelse ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                        </div>

                        @error('service_id')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror
            
                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">Package Name:</label>
                            <input type="text" class="flex-1 border-none" wire:model="name">
                        </div>

                        @error('name')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror

                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">Price:</label>
                            <div class="flex-1 relative">
                                <span class="absolute left-3 top-2">₱</span>
                                <input type="number" class="w-full border-none pl-7" wire:model="price">
                            </div>
                        </div>

                        @error('price')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror

                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">No. of Pax:</label>
                            <input type="number" class="flex-1 border-none" wire:model="no_of_pax">
                        </div>

                        @error('no_of_pax')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror

                        <div class="border rounded-lg px-3">
                            <p class="my-1.5">Package Inclusions:</p>
                            <div wire:ignore>
                                <textarea id="edit-inclusions" cols="30" rows="5" class="w-full border-none focus:ring-0 p-0" wire:model="inclusions"></textarea>
                            </div>
                        </div>

                        @error('inclusions')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror

                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">Status:</label>
                            <select class="flex-1 border-none w-full" wire:model="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-span-2 md:col-span-1 border rounded-md p-3 space-y-3">
                        <div class="border rounded-lg p-3">
                            <p class="font-semibold">Addons:</p>
                            @foreach ($item_types->where('type', 'addons') as $key => $item)
                                    @foreach ($item_types as $aitem)
                                        <?php 
                                            if ($aitem->name == $item->name): 
                                            $type = $aitem->name;
                                        ?>
                                            <ul style="border-width: 2px;border-color: solid black;">
                                                <li style="padding: 3px;">
                                                    <label for="update-{{ $key }}" class="space-x-2">
                                                        <input type="checkbox" id="update-{{ $key }}" wire:model.live="addon_types.{{ strtolower(str_replace(' ', ' ', $item->name)) }}">
                                                        <span>{{ $item->name }}</span>
                                                    </label>
                                                    <a target="_blank" href="{{ asset($aitem->getFirstMedia('itemTypes')->getUrl()) }}">
                                                        <img src="{{ asset($aitem->getFirstMedia('itemTypes')->getUrl()) }}" class="w-auto h-14">
                                                    </a>
                                                </li>
                                                <li  style="padding: 3px;">
                                                    <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-0.5" value="{{ $item->itemprice }}" placeholder="Price" readonly>
                                                </li>
                                            </ul>
                                            <br>
                                        <?php endif ?>
                                    @endforeach
                                @endforeach
                        </div>
                        <div class="border rounded-lg p-3">
                            <p class="font-semibold">Customize:</p>
                            @foreach ($item_types->where('type', 'customize') as $key => $item)
                                    @foreach ($item_types as $aitem)
                                        <?php 
                                            if ($aitem->name == $item->name): 
                                            $type = $aitem->name;
                                        ?>
                                            <ul style="border-width: 2px;border-color: solid black;">
                                                <li style="padding: 3px;">
                                                    <label for="update-{{ $key }}" class="space-x-2">
                                                        <input type="checkbox" id="update-{{ $key }}" wire:model.live="customize_types.{{ strtolower(str_replace(' ', ' ', $item->name)) }}">
                                                        <span>{{ $item->name }}</span>
                                                    </label>
                                                    <a target="_blank" href="{{ asset($aitem->getFirstMedia('itemTypes')->getUrl()) }}">
                                                        <img src="{{ asset($aitem->getFirstMedia('itemTypes')->getUrl()) }}" class="w-auto h-14">
                                                    </a>
                                                </li>
                                                <li  style="padding: 3px;">
                                                    <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-0.5" value="{{ $item->itemprice }}" placeholder="Price" readonly>
                                                </li>
                                            </ul>
                                            <br>
                                        <?php endif ?>
                                    @endforeach
                                @endforeach
                        </div>
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
                <button class="border bg-blue-500 rounded-lg px-3 py-1" wire:click="update">
                    <div class="flex items-center gap-3">
                        <span class="text-white">Save</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#edit-inclusions' ) )
        .then( editor => {
            editor.model.document.on('change:data', () => {
                @this.set('inclusions', editor.getData());
            })
        })
        .catch( error => {
            console.error( error );
        })
    </script>
</div>