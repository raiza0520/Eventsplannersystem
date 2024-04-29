<div x-data="transaction">
    <div class="flex items-center justify-between mb-5">
        <h3 class="font-semibold text-xl">Manage Transaction</h3>
        <div class="flex items-center gap-2">
            @if ($transaction['remarks'] == 'pending')
                <button class="bg-black rounded-lg px-3 py-1.5" wire:click="updateRemarks('accepted')">
                    <span class="text-white">Accept</span>
                </button>
                <!-- <button class="bg-black rounded-lg px-3 py-1.5" wire:click="updateRemarks('declined')">
                    <span class="text-white">Decline</span>
                </button> -->
                <button class="bg-black rounded-lg px-3 py-1.5" x-on:click="toggleDeclineModal">
                    <span class="text-white">Decline</span>
                </button>
            @endif

            @if ($transaction['remarks'] == 'accepted')
            <button class="bg-black rounded-lg px-3 py-1.5" x-on:click="toggleCancelationModal()">
                <span class="text-white">Cancel</span>
            </button>
            @endif
        </div>
    </div>
    <div class="bg-white rounded-lg p-3 space-y-3">
        <?php 
            $addonstotal = 0; 
            foreach ($transaction->addons as $type => $addon){
                foreach ($addon as $item){
                    foreach ($item_types as $item_type){
                        if (strtolower($item_type->name) == $type){
                            if ($item->quantity > 0){
                                $addonstotal += $item_type->itemprice * $item->quantity;
                            }
                        }
                    }
                }
            }
        ?>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <h3 class="font-semibold">{{ $transaction->transactionNumber() }}</h3>
                <span class="border h-3"></span>
                <div class="font-semibold border rounded-full px-3">
                    <span class="text-sm capitalize">{{ $transaction['remarks'] }}</span>
                </div>
                @if(!empty($transaction->reason))
                    <span class="cursor-pointer" style="color: red;font-size: 12px;" x-on:click="toggleViewReasonModal">Click here to view Reason...</span>
                @endif 
            </div>
            <span class="font-semibold">₱ {{ number_format($transaction['package_amount']  + $addonstotal, 2) }}</span>
        </div>
        <div class="border-b"></div>
        <div class="space-y-3 border rounded-lg overflow-hidden p-3">
            <h3 class="font-semibold mb-3">Package</h3>
            <div class="flex items-center bg-yellow-300 rounded-md pr-10">
                <span class="w-1/5 ml-3">Package Name:</span>
                <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $package['name'] }}</div>
            </div>
            <div class="flex items-center bg-yellow-300 rounded-md pr-10">
                <span class="w-1/5 ml-3">Category:</span>
                <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $package['service']['name'] }}</div>
            </div>
            <div class="flex items-center bg-yellow-300 rounded-md pr-10">
                <span class="w-1/5 ml-3">Price:</span>
                <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">₱ {{ number_format($transaction['package_amount'], 2) }}</div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-3">
            <div class="space-y-3 border rounded-lg overflow-hidden p-3">
                <h3 class="font-semibold mb-3">Reservation</h3>
                <div class="flex items-center bg-yellow-300 rounded-md">
                    <span class="w-2/5 ml-3">Name:</span>
                    <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $reservation['name'] }}</div>
                </div>
                <div class="flex items-center bg-yellow-300 rounded-md">
                    <span class="w-2/5 ml-3">Contact Info:</span>
                    <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $reservation['contact'] }}</div>
                </div>
                <div class="flex items-center bg-yellow-300 rounded-md">
                    <span class="w-2/5 ml-3">Date of Use:</span>
                    <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $reservation['date_of_use'] }}</div>
                </div>
                <div class="flex items-center bg-yellow-300 rounded-md">
                    <span class="w-2/5 ml-3">Location (Venue):</span>
                    <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $reservation['location'] }}</div>
                </div>
                <div class="flex items-center bg-yellow-300 rounded-md">
                    <span class="w-2/5 ml-3">Email:</span>
                    <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $reservation['email'] }}</div>
                </div>
            </div>
            <div class="space-y-3 border rounded-lg overflow-hidden p-3">
                <h3 class="font-semibold mb-3">Down Payment</h3>
                <div class="flex items-center bg-yellow-300 rounded-md">
                    <span class="w-2/5 ml-3">Name:</span>
                    <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $payment['name'] }}</div>
                </div>
                <div class="flex items-center bg-yellow-300 rounded-md">
                    <span class="w-2/5 ml-3">Amount:</span>
                    <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">₱ {{ number_format($payment['amount'], 2) }}</div>
                </div>
                <div class="flex items-center bg-yellow-300 rounded-md">
                    <span class="w-2/5 ml-3">Reference No.:</span>
                    <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $payment['ref_no'] }}</div>
                </div>
                <div class="flex items-center bg-yellow-300 rounded-md">
                    <span class="w-2/5 ml-3">Receipt:</span>
                    <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">
                        @if ($transaction->getFirstMedia('transactions'))
                        <span class="cursor-pointer" x-on:click="toggleViewReceiptModal">View file</span> 
                        @else
                        <span>N/A</span> 
                        @endif
                    </div>
                </div>
                <div class="flex items-center bg-yellow-300 rounded-md">
                    <span class="w-2/5 ml-3">Email:</span>
                    <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $payment['email'] }}</div>
                </div>
            </div>
        </div>
        <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th colspan="5" class="px-3 py-1 bg-black text-left text-sm font-semibold text-white">Addons
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="px-3 py-2 bg-gray-200 text-left text-sm font-semibold text-gray-900">Image</th>
                                <th scope="col" class="px-3 py-2 bg-gray-200 text-left text-sm font-semibold text-gray-900">Name</th>
                                <th scope="col" class="px-3 py-2 bg-gray-200 text-left text-sm font-semibold text-gray-900">
                                    Price</th>
                                <th scope="col" class="px-3 py-2 bg-gray-200 text-left text-sm font-semibold text-gray-900">
                                    Quantiy</th>
                                <th scope="col" class="px-3 py-2 bg-gray-200 text-left text-sm font-semibold text-gray-900">
                                    Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <?php $addonstotal = 0; ?>
                            @foreach ($transaction->addons as $type => $addon)
                                @foreach ($addon as $item)
                                    @foreach ($item_types as $item_type)
                                        @if (strtolower($item_type->name) == $type)
                                            @if ($item->quantity > 0)
                                                <tr>
                                                    <td class="px-3 py-2 text-sm text-gray-500">
                                                        <a target="_blank" href="{{ asset($item_type->getFirstMedia('itemTypes')->getUrl()) }}">
                                                            <img src="{{ asset($item_type->getFirstMedia('itemTypes')->getUrl()) }}" class="w-auto h-14">
                                                        </a>
                                                    </td>
                                                    <td class="px-3 py-2 text-sm text-gray-500">{{ ucfirst($item->name) }}</td>
                                                    <td class="px-3 py-2 text-sm text-gray-500">₱ {{ number_format($item_type->itemprice, 2) }}</td>
                                                    <td class="px-3 py-2 text-sm text-gray-500">{{ $item->quantity }}</td>
                                                    <td class="px-3 py-2 text-sm text-gray-500">
                                                        <?php $addonstotal += $item_type->itemprice * $item->quantity; ?>
                                                        ₱ {{ number_format($item_type->itemprice * $item->quantity, 2) }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="px-3 py-1 bg-black text-left text-sm font-semibold text-white"></th>
                                <th class="px-3 py-1 bg-black text-left text-sm font-semibold text-white">Total Amount</th>
                                <th class="px-3 py-1 bg-black text-left text-sm font-semibold text-white">₱ {{
                                    number_format($addonstotal, 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>
    </div>

    @if ($transaction->getFirstMedia('transactions'))
        @livewire('admin.transaction.modals.receipt', ['modal' => 'receipt_modal', 'transaction' => $transaction])
    @endif
    @livewire('admin.transaction.modals.decline', ['modal' => 'decline_modal', 'transaction' => $transaction])
    @livewire('admin.transaction.modals.reason', ['modal' => 'reason_modal', 'transaction' => $transaction])
    @livewire('admin.transaction.modals.cancel', ['modal' => 'cancel_modal', 'transaction' => $transaction])
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('transaction', () => ({
                receipt_modal: false,
                decline_modal: false,
                reason_modal: false,
                cancel_modal: false,
        
                toggleViewReceiptModal() {
                    this.receipt_modal = ! this.receipt_modal
                }, toggleDeclineModal(){
                    this.decline_modal = ! this.decline_modal
                }, toggleViewReasonModal(){
                    this.reason_modal = ! this.reason_modal
                }, toggleCancelationModal(){
                    this.cancel_modal = ! this.cancel_modal
                },
            }))
        })
    </script>
</div>