<div x-data="package">
    <div class="flex items-center justify-between mb-5">
        <h3 class="font-semibold text-xl">Packages</h3>
        <button class="bg-black rounded-lg px-3 py-1.5"
            x-on:click="toggleAddPackageModal">
            <div class="flex items-center gap-3">
                <x-icons.plus class="w-5 h-5" stroke="#FFF" />
                <span class="text-white">Add Package</span>
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
                        <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Service</th>
                        <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">No. of Pax</th>
                        <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Status</th>
                        <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($packages as $package)
                    <tr>
                        <td
                            class="w-full max-w-0 py-2 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none">
                            <img src="{{ asset($package->getFirstMedia('packages')->getUrl()) }}" class="w-auto h-14">
                        </td>
                        <td class="px-3 py-2 text-sm text-gray-500">{{ $package->name }}</td>
                        <td class="px-3 py-2 text-sm text-gray-500">{{ $package->service->name }}</td>
                        <td class="px-3 py-2 text-sm text-gray-500">{{ $package->no_of_pax }}</td>
                        <td class="px-3 py-2 text-sm text-gray-500">{{ $package->status ? 'Active' : 'Inactive' }}</td>
                        <td class="px-3 py-2 text-sm text-gray-500">
                            <div class="flex items-center gap-3">
                                <button wire:click="toggleEditPackageModal({{ $package->id }})">
                                    <span class="hover:text-blue-600">Edit</span>
                                </button>
                                <button wire:click="toggleDeletePackageModal({{ $package->id }})">
                                    <span class="hover:text-red-700">Delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @livewire('admin.package.modals.add-package', ['modal' => 'add_package_modal'])
    @livewire('admin.package.modals.edit-package', ['modal' => 'edit_package_modal'])
    @livewire('admin.package.modals.delete-package', ['modal' => 'delete_package_modal'])

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('package', () => ({
                add_package_modal: false,
                edit_package_modal: @entangle('edit_package_modal'),
                delete_package_modal: @entangle('delete_package_modal'),
     
                toggleAddPackageModal() {
                    this.add_package_modal = ! this.add_package_modal
                },
            }))
        })
    </script>
</div>