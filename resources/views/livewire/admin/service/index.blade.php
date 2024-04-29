<div x-data="service">
    <div class="flex items-center justify-between mb-5">
        <h3 class="font-semibold text-xl">Services</h3>
        <button class="bg-black rounded-lg px-3 py-1.5"
            x-on:click="toggleAddServiceModal">
            <div class="flex items-center gap-3">
                <x-icons.plus class="w-5 h-5" stroke="#FFF" />
                <span class="text-white">Add Service</span>
            </div>
        </button>
    </div>

    <div class="bg-white rounded-lg p-3">
        <div class="flex py-4 relative">
            <label for="search-field" class="sr-only">Search</label>
            <x-icons.search class="w-4 h-4 absolute top-6 left-3.5" />
            <input 
                id="search-field"
                class="block bg-white rounded-full h-full w-full border py-1.5 pl-10 pr-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                placeholder="Search here"
                wire:model.live="search">
        </div>

        <div class="overflow-auto">
            <table class="min-w-full divide-y divide-gray-300">
                <thead>
                    <tr>
                        <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Photo</th>
                        <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Name</th>
                        <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Status</th>
                        <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($services as $service)
                    <tr>
                        <td class="w-full max-w-0 py-2 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none">
                            <img src="{{ asset($service->getFirstMedia('services')->getUrl()) }}" class="w-auto h-14">
                        </td>
                        <td class="px-3 py-2 text-sm text-gray-500">{{ $service->name }}</td>
                        <td class="px-3 py-2 text-sm text-gray-500">{{ $service->status ? 'Active' : 'Inactive' }}</td>
                        <td class="px-3 py-2 text-sm text-gray-500">
                            <button wire:click="toggleEditServiceModal({{ $service->id }})">Edit</button>
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @livewire('admin.service.modals.add-service', ['modal' => 'add_service_modal'])
    @livewire('admin.service.modals.edit-service', ['modal' => 'edit_service_modal'])

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('service', () => ({
                add_service_modal: false,
                edit_service_modal: @entangle('edit_service_modal'),
     
                toggleAddServiceModal() {
                    this.add_service_modal = ! this.add_service_modal
                },
            }))
        })
    </script>
</div>