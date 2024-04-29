<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-4xl" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.eye class="w-6 h-6" />
                    <span>View Packages</span>
                </div>
                
                <div class="border-b"></div>

                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Name</th>
                            <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Service</th>
                            <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">No. of Pax</th>
                            <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($packages as $package)
                        <tr>
                            <td class="px-3 py-2 text-sm text-gray-500">{{ $package->name }}</td>
                            <td class="px-3 py-2 text-sm text-gray-500">{{ $package->service->name }}</td>
                            <td class="px-3 py-2 text-sm text-gray-500">{{ $package->no_of_pax }}</td>
                            <td class="px-3 py-2 text-sm text-gray-500">{{ $package->status ? 'Active' : 'Inactive' }}</td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex items-center justify-between">
                <button class="border rounded-lg px-3 py-1" x-on:click="{{ $modal }} = false">
                    <div class="flex items-center gap-3">
                        <span>Close</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>
</div>