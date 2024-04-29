<div>
    <div class="flex items-center justify-between mb-5">
        <h3 class="font-semibold text-xl">Transaction Records</h3>
        <button class="py-1.5" wire:click="refresh"
            x-on:click="toggleAddServiceModal">
            <x-icons.refresh class="w-6 h-6" stroke="#000" wire:target="refresh" wire:loading.class="animate-spin" />
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
        
        <div class="w-full border-b mb-3">
            <select class="border rounded-t px-8 py-0.5" onchange="filteringStatusFunction()" id="statusFilter">
                <option value="allTransactions" <?php if (!empty($_GET['filter'])){if($_GET['filter'] == 'approved'){echo 'selected';}}else{echo 'selected';} ?>>All Transaction</option>
                <option value="accepted" <?php if (!empty($_GET['filter'])){if($_GET['filter'] == 'accepted'){echo 'selected';}} ?>>Accepted</option>
                <option value="pending" <?php if (!empty($_GET['filter'])){if($_GET['filter'] == 'pending'){echo 'selected';}} ?>>Pending</option>
                <option value="cancelled" <?php if (!empty($_GET['filter'])){if($_GET['filter'] == 'cancelled'){echo 'selected';}} ?>>Cancelled</option>
            </select>
        </div>
        <!-- calling function for status filtering here -->
        <script>
            function filteringStatusFunction() {
              var filter = document.getElementById("statusFilter").value;

              if (filter != "allTransactions") {
                window.location.href = "{{ URL::to('/') }}/admin/transactions?filter=" + filter;
              }else{
                window.location.href = "{{ URL::to('/') }}/admin/transactions";
              }
            }
        </script>
        <!-- end: calling function for status filtering here -->
        <div class="overflow-auto">
            <table class="min-w-full divide-y divide-gray-300">
                <thead>
                    <tr>
                        <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Transaction ID</th>
                        <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Name</th>
                        <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Package Name</th>
                        <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Amount</th>
                        <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Date</th>
                        <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Remarks</th>
                        <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($transactions as $transaction)
                        <?php if (!empty($_GET['filter'])): ?>
                            <?php if ($transaction->remarks == $_GET['filter']): ?>
                                <tr>
                                    <td class="px-3 py-2 text-sm text-gray-500">{{ $transaction->transactionNumber() }}</td>
                                    <td class="px-3 py-2 text-sm text-gray-500">{{ $transaction->user->name }}</td>
                                    <td class="px-3 py-2 text-sm text-gray-500">{{ $transaction->package->name }}</td>
                                    <td class="px-3 py-2 text-sm text-gray-500">₱ {{ number_format($transaction->total_amount, 2) }}</td>
                                    <td class="px-3 py-2 text-sm text-gray-500">{{ date('m/d/Y', strtotime($transaction->reservation->date_of_use)) }}</td>
                                    <td class="px-3 py-2 text-sm text-gray-500 capitalize">{{ $transaction->remarks }}</td>
                                    <td class="px-3 py-2 text-sm text-gray-500">
                                        <a href="/admin/transactions/manage/{{ $transaction->id }}">View</a>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php else: ?>
                            <tr>
                                    <td class="px-3 py-2 text-sm text-gray-500">{{ $transaction->transactionNumber() }}</td>
                                    <td class="px-3 py-2 text-sm text-gray-500">{{ $transaction->user->name }}</td>
                                    <td class="px-3 py-2 text-sm text-gray-500">{{ $transaction->package->name }}</td>
                                    <td class="px-3 py-2 text-sm text-gray-500">₱ {{ number_format($transaction->total_amount, 2) }}</td>
                                    <td class="px-3 py-2 text-sm text-gray-500">{{ date('m/d/Y', strtotime($transaction->reservation->date_of_use)) }}</td>
                                    <td class="px-3 py-2 text-sm text-gray-500 capitalize">{{ $transaction->remarks }}</td>
                                    <td class="px-3 py-2 text-sm text-gray-500">
                                        <a href="/admin/transactions/manage/{{ $transaction->id }}">View</a>
                                    </td>
                                </tr>
                        <?php endif ?>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>