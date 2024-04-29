<div x-data="dashboard">
    <div class="grid grid-cols-12 gap-5">
        <div class="col-span-6 bg-white rounded-lg space-y-3 p-5">
            @livewire('admin.dashboard.calendar')
        </div>
        <div class="col-span-6 bg-white rounded-lg space-y-3 p-5">
            <h3 class="font-semibold">Service Offers</h3>
            
            <div class="space-y-1">
                <button class="w-full border rounded-lg px-3 py-1.5"
                    x-on:click="toggleViewPackagesModal">
                    <div class="flex items-center gap-3">
                        <x-icons.eye class="w-6 h-6" />
                        <span>View Package</span>
                    </div>
                </button>
                <button class="w-full border rounded-lg px-3 py-1.5"
                    x-on:click="toggleAddPackageModal">
                    <div class="flex items-center gap-3">
                        <x-icons.plus class="w-6 h-6" />
                        <span>Add Package</span>
                    </div>
                </button>
                <button class="w-full border rounded-lg px-3 py-1.5"
                    x-on:click="redirect('/admin/packages')">
                    <div class="flex items-center gap-3">
                        <x-icons.edit class="w-6 h-6" />
                        <span>Edit Package</span>
                    </div>
                </button>
                <button class="w-full border rounded-lg px-3 py-1.5"
                    x-on:click="redirect('/admin/packages')">
                    <div class="flex items-center gap-3">
                        <x-icons.trash class="w-6 h-6" />
                        <span>Delete Package</span>
                    </div>
                </button>
            </div>
        </div>
        <div class="col-span-6 bg-white rounded-lg space-y-3 p-5">
            <h3 class="font-semibold">Sales Report</h3>
            <div class="space-y-1">
                <button class="w-full border rounded-lg px-3 py-1.5"
                    x-on:click="toggleSalesModal">
                    <div class="flex items-center gap-3">
                        <x-icons.line-chart class="w-6 h-6" />
                        <span>Sales</span>
                    </div>
                </button>
                <button class="w-full border rounded-lg px-3 py-1.5"
                    x-on:click="toggleMostPurchasedPackageModal">
                    <div class="flex items-center gap-3">
                        <x-icons.cart-check class="w-6 h-6" />
                        <span>Most Purchase Package</span>
                    </div>
                </button>
            </div>
        </div>
    </div>

    @livewire('admin.dashboard.modals.view-packages', ['modal' => 'view_packages_modal'])
    @livewire('admin.package.modals.add-package', ['modal' => 'add_package_modal'])
    @livewire('admin.dashboard.modals.most-purchased-package', ['modal' => 'most_purchased_package_modal'])
    @livewire('admin.dashboard.modals.sales', ['modal' => 'sales_modal'])

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dashboard', () => ({
                edit_profile_modal: false,
                view_profile_modal: false,
                view_packages_modal: false,
                add_package_modal: false,
                most_purchased_package_modal: false,
                sales_modal: false,

                toggleEditProfileModal() {
                    this.edit_profile_modal = ! this.edit_profile_modal
                },

                toggleViewProfileModal() {
                    this.view_profile_modal = ! this.view_profile_modal
                },

                toggleViewPackagesModal() {
                    this.view_packages_modal = ! this.view_packages_modal
                },

                toggleAddPackageModal() {
                    this.add_package_modal = ! this.add_package_modal
                },

                toggleMostPurchasedPackageModal() {
                    this.most_purchased_package_modal = ! this.most_purchased_package_modal
                },

                toggleSalesModal() {
                    this.sales_modal = ! this.sales_modal
                },

                redirect(url) {
                    window.location.href = url
                },
            }))
        })
    </script>
</div>