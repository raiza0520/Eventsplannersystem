<div x-data="data">
    <div class="h-screen py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="flex gap-0">
                <nav class="w-72">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7 my-5">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li 
                                    @class([
                                        'relative text-black flex rounded-l-full items-center justify-between', 
                                        'bg-white'=> $tab == 'profile'
                                    ])>
                                    <a 
                                        href="/account/profile"
                                        class="group flex items-center gap-x-3 px-5 py-2 text-sm leading-6 font-semibold">
                                        Profile
                                    </a>
                                </li>

                                <li 
                                    @class([
                                        'relative flex rounded-l-full text-black items-center justify-between', 
                                        'bg-white'=> $tab == 'transactions'
                                    ])>
                                    <a 
                                        href="/account/transactions"
                                        class="group flex items-center gap-x-3 px-5 py-2 text-sm leading-6 font-semibold">
                                        Transactions
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div class="flex-1 bg-white rounded-2xl px-5 py-3">
                    <div x-show="tab == 'profile'" style="display: none;">
                        @livewire('public.components.tabs.profile')
                    </div>
                    <div x-show="tab == 'transactions'" style="display: none;">
                        @livewire('public.components.tabs.transaction')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('data', () => ({
                tab: @entangle('tab').live,
     
                switchTab(tab) {
                    this.tab = tab
                },
            }))
        })
    </script>
</div>