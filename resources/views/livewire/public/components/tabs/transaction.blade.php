<div x-data="{ open: '', toggle(open) { this.open=open} }">
    @forelse ($transactions as $key => $transaction)
    <div x-data="payment">
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
            <div class="bg-white border rounded-lg p-3 space-y-3">
                <div class="flex items-center justify-between cursor-pointer" x-on:click="toggle('{{ md5($key) }}')">
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
                    <span class="font-semibold">₱ {{ number_format($transaction['package_amount'] + $addonstotal, 2) }}</span>
                </div>
                <div x-show="open == '{{ md5($key) }}'" class="space-y-3">
                    <div class="space-y-3 border rounded-lg overflow-hidden p-3 mt-3">
                        <h3 class="font-semibold mb-3">Package</h3>
                        <div class="flex items-center bg-yellow-300 rounded-md pr-10">
                            <span class="w-1/5 ml-3">Package Name:</span>
                            <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{
                                $transaction['package']['name'] }}</div>
                        </div>
                        <div class="flex items-center bg-yellow-300 rounded-md pr-10">
                            <span class="w-1/5 ml-3">Category:</span>
                            <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{
                                $transaction['package']['service']['name'] }}</div>
                        </div>
                        <div class="flex items-center bg-yellow-300 rounded-md pr-10">
                            <span class="w-1/5 ml-3">Price:</span>
                            <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">₱ {{
                                number_format($transaction['package_amount'], 2) }}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="space-y-3 border rounded-lg overflow-hidden p-3">
                            <h3 class="font-semibold mb-3">Reservation</h3>
                            <div class="flex items-center bg-yellow-300 rounded-md">
                                <span class="w-2/5 ml-3">Name:</span>
                                <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{
                                    $transaction['reservation']['name'] }}</div>
                            </div>
                            <div class="flex items-center bg-yellow-300 rounded-md">
                                <span class="w-2/5 ml-3">Contact Info:</span>
                                <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{
                                    $transaction['reservation']['contact'] }}</div>
                            </div>
                            <div class="flex items-center bg-yellow-300 rounded-md">
                                <span class="w-2/5 ml-3">Date of Use:</span>
                                <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{
                                    $transaction['reservation']['date_of_use'] }}</div>
                            </div>
                            <div class="flex items-center bg-yellow-300 rounded-md">
                                <span class="w-2/5 ml-3">Location (Venue):</span>
                                <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{
                                    $transaction['reservation']['location'] }}</div>
                            </div>
                            <div class="flex items-center bg-yellow-300 rounded-md">
                                <span class="w-2/5 ml-3">Email:</span>
                                <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{
                                    $transaction['reservation']['email'] }}</div>
                            </div>
                        </div>
                        <div class="space-y-3 border rounded-lg overflow-hidden p-3">
                            <?php if ($transaction->remarks == "accepted"): ?>
                                <?php if ($transaction['payment']['amount'] != 0): ?>
                                    <h3 class="font-semibold mb-3">Down Payment&nbsp;&nbsp;&nbsp;&nbsp;<a type="button" x-on:click="toggleTermModal" style="color:blue"><u>Terms and condition</u></a></h3></h3>
                                    <div class="flex items-center bg-yellow-300 rounded-md">
                                        <span class="w-2/5 ml-3">Name:</span>
                                        <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{
                                            $transaction['payment']['name'] }}</div>
                                    </div>
                                    <div class="flex items-center bg-yellow-300 rounded-md">
                                        <span class="w-2/5 ml-3">Amount:</span>
                                        <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">₱ {{
                                            number_format($transaction['payment']['amount'], 2) }}</div>
                                    </div>
                                    <div class="flex items-center bg-yellow-300 rounded-md">
                                        <span class="w-2/5 ml-3">Reference No.:</span>
                                        <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{
                                            $transaction['payment']['ref_no'] }}</div>
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
                                        <div class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{
                                            $transaction['payment']['email'] }}</div>
                                    </div>
                                <?php else: ?>
                                    <h3 class="font-semibold mb-3">Down Payment&nbsp;&nbsp;&nbsp;&nbsp;<a type="button" x-on:click="toggleTermModal" style="color:blue"><u>Terms and condition</u></a></h3>
                                    <br>
                                    <br>
                                    <div align="center">
                                        <button class="inline-flex items-center rounded-md bg-yellow-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" wire:click="togglePaymentModal({{ $transaction['id'] }})">
                                            <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            Payment
                                        </button>
                                    </div>
                                <?php endif ?>
                            <?php else: ?>
                                <h3 class="font-semibold mb-3">Down Payment&nbsp;&nbsp;&nbsp;&nbsp;<a type="button" x-on:click="toggleTermModal" style="color:blue"><u>Terms and condition</u></a></h3>
                                    <br>
                                    <br>
                                    <p>Info: <i>please wait to accept your request to proceed to payment</i></p>
                            <?php endif ?>
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
            </div>
        
            @if (!$loop->last)
            <div class="border-b my-3"></div>
            @endif

            @if ($transaction->getFirstMedia('transactions'))
                @livewire('public.components.modals.receipt', ['modal' => 'receipt_modal', 'transaction' => $transaction])
            @endif
            @livewire('public.components.modals.terms', ['modal' => 'term_modal'])
            @livewire('public.components.modals.reason', ['modal' => 'reason_modal', 'transaction' => $transaction])
            @livewire('public.components.modals.paymentform', ['modal' => 'payment_modal', 'transaction' => $transaction])
    </div>
    @empty
    <div class="text-center">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            aria-hidden="true">
            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
        </svg>
        <h3 class="mt-2 text-sm font-semibold text-gray-900">No data available</h3>
        <p class="mt-1 text-sm text-gray-500">Get started by creating a new reservation.</p>
        <div class="mt-6">
            <a 
                href="/services"
                class="inline-flex items-center rounded-md bg-yellow-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path
                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                New Reservation
            </a>
        </div>
    </div>
    @endforelse
</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('payment', () => ({
            receipt_modal: false,
            reason_modal: false,
            term_modal: false,
            payment_modal: @entangle('payment_modal'),
                
            toggleViewReceiptModal() {
                this.receipt_modal = ! this.receipt_modal
            }, toggleTermModal(){
                this.term_modal = ! this.term_modal
            }, toggleViewReasonModal(){
                this.reason_modal = ! this.reason_modal
            }, toggleViewDownPaymentModal(){
                this.payment_modal = ! this.payment_modal
            },
            }))
        })
</script>