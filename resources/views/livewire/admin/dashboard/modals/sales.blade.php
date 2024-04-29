<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-lg" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.line-chart class="w-6 h-6" />
                    <span>Sales</span>
                </div>

                <div>
                    <canvas id="myChart"></canvas>
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
                  
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @js(array_keys($data)),
                datasets: [{
                    label: 'Total Sales',
                    data: @js(array_values($data)),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>