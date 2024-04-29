<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-xl" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.plus class="w-6 h-6" />
                    <span>Add Package</span>
                </div>

                <div class="border-b"></div>

                <label for="profile" class="flex items-center gap-3 p-3 border rounded-lg overflow-hidden cursor-pointer">
                    <img class="h-auto w-2/5" src="{{ asset('assets/img/logo.png') }}" alt="Your Company">
                    <input id="profile" type="file" class="flex-1">
                </label>

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">Category:</label>
                    <select class="flex-1 border-none w-full">
                        <option value="" hidden></option>
                        <option value="1">Wedding Planning Services</option>
                    </select>
                </div>
    
                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">Package Name:</label>
                    <input type="text" class="flex-1 border-none">
                </div>

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">No. of Pax:</label>
                    <input type="number" class="flex-1 border-none">
                </div>

                <div class="border rounded-lg px-3">
                    <p for="name" class="my-1.5">Package Inclusions:</p>
                    <textarea cols="30" rows="5" class="w-full border-none focus:ring-0 p-0"></textarea>
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
                <button class="border bg-blue-500 rounded-lg px-3 py-1">
                    <div class="flex items-center gap-3">
                        <span class="text-white">Add</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>
</div>