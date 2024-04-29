<div x-data="gallery">
    <div class="flex items-center justify-between mb-5">
        <h3 class="font-semibold text-xl">Gallery</h3>
        <button class="bg-black rounded-lg px-3 py-1.5"
            x-on:click="toggleAddImageModal">
            <div class="flex items-center gap-3">
                <x-icons.plus class="w-5 h-5" stroke="#FFF" />
                <span class="text-white">Add Image</span>
            </div>
        </button>
    </div>

    <div class="bg-white rounded-lg p-3">

        <div class="overflow-auto">
            <table class="min-w-full divide-y divide-gray-300">
                <thead>
                    <tr>
                        <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Photo</th>
                        <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Type</th>
                        <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Status</th>
                        <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($images as $image)
                    <tr>
                        <td
                            class="w-full max-w-0 py-2 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none">
                            <img src="{{ asset($image->getFirstMedia('gallery')->getUrl()) }}" class="w-auto h-14">
                        </td>
                        <td class="px-3 py-2 text-sm text-gray-500 capitalize">{{ $image->type }}</td>
                        <td class="px-3 py-2 text-sm text-gray-500">{{ $image->status ? 'Active' : 'Inactive' }}</td>
                        <td class="px-3 py-2 text-sm text-gray-500">
                            <button wire:click="toggleEditImageModal({{ $image->id }})">Edit</button>
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @livewire('admin.gallery.modals.add-image', ['modal' => 'add_image_modal'])
    @livewire('admin.gallery.modals.edit-image', ['modal' => 'edit_image_modal'])

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('gallery', () => ({
                add_image_modal: false,
                edit_image_modal: @entangle('edit_image_modal'),
     
                toggleAddImageModal() {
                    this.add_image_modal = ! this.add_image_modal
                },
            }))
        })
    </script>
</div>