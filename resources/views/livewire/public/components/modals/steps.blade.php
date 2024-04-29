<div x-show="{{ $modal_id }}" style="display: none;">
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black bg-opacity-80 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all my-8 w-full">
                    @if($package)
                    <div x-show="step == 'confirmation'">
                        <div class="bg-white p-4 sm:p-6 sm:pb-4">
                            <div class="space-3 border border-black rounded-lg overflow-hidden">
                                <div class="relative isolate flex flex-col justify-end overflow-hidden bg-gray-900 h-56">
                                    <img src="{{ asset('assets/img/package-1.png') }}" class="absolute inset-0 -z-10 h-auto w-full">
                                </div>
                                <div class="p-3">
                                    <h3 class="text-xl font-semibold uppercase">{{ $package['name'] }}</h3>
                                    <div>
                                        {!! $package['inclusions'] !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <div class="flex items-center justify-end gap-3">
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'addons'">
                                        <span class="text-white">Select</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="step == 'addons'">
                        <div class="bg-white p-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Our Services</h3>
                                <span class="text-lg font-semibold">Add ons</span>
                                <div class="grid grid-cols-12">
                                    @foreach ($addons as $type => $addon)
                                        @foreach ($item_types as $aitem)
                                                <?php if ($type == strtolower($aitem->name)): ?>
                                                    <div class="col-span-12 md:col-span-4 p-3" style="border-width: 2px;border-color: solid black;" align="center">
                                                        <a target="_blank" href="{{ asset($aitem->getFirstMedia('itemTypes')->getUrl()) }}">
                                                            <img src="{{ asset($aitem->getFirstMedia('itemTypes')->getUrl()) }}" class="w-auto h-14">
                                                        </a>
                                                        <span class="text-lg font-semibold capitalize">{{ $type }}</span>
                                                        @foreach ($addon as $key => $item)
                                                        <ul class="space-y-2">
                                                            <li class="flex items-center gap-2">
                                                                <div class="flex items-center">
                                                                    <button class="border border-black rounded-l px-3 py-2" wire:click="decrement('addons', '{{ $type }}.{{ $key }}.quantity')">
                                                                        <x-icons.minus class="w-5 h-5"/>
                                                                    </button>
                                                                    <input type="text" class="w-16 border border-black px-3 py-2 text-sm text-center" min="0" disabled wire:model.live="addons.{{ $type }}.{{ $key }}.quantity">
                                                                    <button class="border border-black rounded-r px-3 py-2" wire:click="increment('addons', '{{ $type }}.{{ $key }}.quantity')">
                                                                        <x-icons.plus class="w-5 h-5" />
                                                                    </button>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        @endforeach
                                                    </div>
                                                <?php endif ?>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <div class="flex items-center gap-2">
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'confirmation'">
                                        <span class="text-white">Back</span>
                                    </button>
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'customize'">
                                        <span class="text-white">Select</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="step == 'customize'">
                        <div class="bg-white p-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Our Services</h3>
                                <span class="text-lg font-semibold">Customization</span>
                                @foreach ($customize as $type => $custom)
                                    @foreach ($item_types as $aitem)
                                        <?php if ($type == strtolower($aitem->name)): ?>
                                            <div class="col-span-12 md:col-span-4 p-3" style="border-width: 2px;border-color: solid black;" align="center">
                                                <a target="_blank" href="{{ asset($aitem->getFirstMedia('itemTypes')->getUrl()) }}">
                                                    <img src="{{ asset($aitem->getFirstMedia('itemTypes')->getUrl()) }}" class="w-auto h-14">
                                                </a>
                                                <span class="text-lg font-semibold capitalize">{{ $type }}</span>
                                                @foreach ($custom as $key => $item)
                                                    <ul class="space-y-2">
                                                        <li class="flex items-center gap-2">
                                                            <div class="flex items-center">
                                                                <button class="border border-black rounded-l px-3 py-2" wire:click="decrement('addons', '{{ $type }}.{{ $key }}.quantity')">
                                                                    <x-icons.minus class="w-5 h-5"/>
                                                                </button>
                                                                <input type="text" class="w-16 border border-black px-3 py-2 text-sm text-center" min="0" disabled wire:model.live="addons.{{ $type }}.{{ $key }}.quantity">
                                                                <button class="border border-black rounded-r px-3 py-2" wire:click="increment('addons', '{{ $type }}.{{ $key }}.quantity')">
                                                                    <x-icons.plus class="w-5 h-5" />
                                                                </button>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        <?php endif ?>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <div class="flex items-center gap-2">
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'confirmation'">
                                        <span class="text-white">Back</span>
                                    </button>
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'summary'">
                                        <span class="text-white">Select</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div x-show="step == 'summary'">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-y-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Creating Package</h3>
                                <p class="text-lg font-semibold">{{ $package['name'] }}</p>
                                <div class="border border-gray-300 rounded-md overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <th colspan="6" class="px-3 py-1.5 bg-black text-sm font-semibold text-gray-900 text-center">
                                                    <span class="font-semibold text-white">Add ons</span>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="col"
                                                    class="py-1.5 bg-gray-300 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Image
                                                </th>
                                                <th scope="col"
                                                    class="py-1.5 bg-gray-300 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Name
                                                </th>
                                                <th scope="col" class="px-3 py-1.5 bg-gray-300 text-left text-sm font-semibold text-gray-900">Quantity</th>
                                                <th scope="col" class="px-3 py-1.5 bg-gray-300 text-left text-sm font-semibold text-gray-900">Price</th>
                                                <th scope="col" class="relative whitespace-nowrap py-1.5 bg-gray-300 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <?php $addontotal = 0; ?>
                                            @forelse ($addons as $type => $addon)
                                                @foreach ($addon as $item)
                                                    @if ($item['quantity'] > 0)
                                                        <tr>
                                                            <td class="whitespace-nowrap py-1.5 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 capitalize">
                                                                @foreach ($item_types as $aitem)
                                                                    <?php if (strtolower($aitem->name) == $item['name']): ?>
                                                                        <a target="_blank" href="{{ asset($aitem->getFirstMedia('itemTypes')->getUrl()) }}">
                                                                            <img src="{{ asset($aitem->getFirstMedia('itemTypes')->getUrl()) }}" class="w-auto h-14">
                                                                        </a>
                                                                    <?php endif ?>
                                                                @endforeach
                                                            </td>
                                                            <td class="whitespace-nowrap py-1.5 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 capitalize">{{ $item['name'] }}</td>
                                                            <td class="whitespace-nowrap px-3 py-1.5 text-sm text-gray-500">{{ $item['quantity'] }}</td>
                                                            <td class="whitespace-nowrap px-3 py-1.5 text-sm text-gray-500">
                                                                <?php $total = 0; ?>
                                                                @foreach ($item_types as $aitem)
                                                                    <?php if (strtolower($aitem->name) == $item['name']): ?>
                                                                        <?php  
                                                                            $total += $item['quantity'] * $aitem->itemprice;
                                                                            $addontotal += $total;
                                                                        ?>  
                                                                        ₱ {{ number_format($aitem->itemprice, 2) }}</td>
                                                                    <?php endif ?>
                                                                @endforeach  
                                                            
                                                            <td class="relative whitespace-nowrap py-1.5 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">₱ {{ number_format($total, 2) }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="border rounded-md p-3">
                                    <p class="text-lg font-semibold">{{ $package['name'] }} = <span>{{ number_format($package['price'], 2) }}</span></p>
                                    <p class="text-lg font-semibold">Addons = <span>₱ {{ number_format($addontotal, 2) }}</span></p>
                                </div>
                                <div class="border rounded-md p-3 text-right">
                                    <p class="text-lg font-semibold">Total = <span>₱ {{ number_format($package['price'] + $addontotal, 2) }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <div class="flex items-center gap-2">
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'customize'">
                                            <span class="text-white">Back</span>
                                        </button>
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'reservation'">
                                        <span class="text-white">Reservation Form</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="step == 'reservation'">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-y-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Reservation Form</h3>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Name:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model.live="reservation.name">
                                </div>

                                @error('reservation.name')
                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                                @enderror

                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Contact Info:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model.live="reservation.contact" onkeypress="return isNumberKey(event)" maxlength="12" pattern=".{12,12}" >
                                </div>

                                @error('reservation.contact')
                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                                @enderror

                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Date of Use:</span>
                                    <input type="datetime-local" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model.live="reservation.date_of_use">
                                </div>

                                @error('reservation.date_of_use')
                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                                @enderror

                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Location (Venue):</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model.live="reservation.location">
                                </div>

                                @error('reservation.location')
                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                                @enderror

                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Email:</span>
                                    <input type="email" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model="reservation.email">
                                </div>

                                @error('reservation.email')
                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <div class="flex items-center gap-2">
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'summary'">
                                        <span class="text-white">Back</span>
                                    </button>
                                    <button class="bg-black rounded-md px-3 py-1" wire:click="proceed('confirm')">
                                        <span class="text-white">Confirm</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="step == 'confirm'">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-y-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Confirm Reservation</h3>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Name:</span>
                                    <span class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $reservation['name'] ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Contact Info:</span>
                                    <span class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $reservation['contact'] ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Date of Use:</span>
                                    <span class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $reservation['date_of_use'] ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Location (Venue):</span>
                                    <span class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $reservation['location'] ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Down Payment:</span>
                                    <div class="flex-1 relative py-1">
                                        <span class="absolute left-3 top-1">₱</span>
                                        <span class="w-full bg-transparent rounded-r-md pr-3 pl-7 py-1 border-none">{{ number_format($payment['amount'] ?? 0, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <div class="flex items-center gap-2">
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'reservation'">
                                        <span class="text-white">Back</span>
                                    </button>
                                    <button class="bg-black rounded-md px-3 py-1" wire:click="submit">
                                        <span class="text-white">Confirm</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
