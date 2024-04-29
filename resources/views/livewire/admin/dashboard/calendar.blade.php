<div>
    <div class="flex items-center justify-evenly text-gray-900">
        <button type="button"
            class="-m-1.5 flex items-center justify-center p-1.5 text-gray-400 hover:text-gray-500"
            wire:click="togglePrevMonth">
            <span class="sr-only">Previous month</span>
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <label class="text-sm font-semibold">{{ $month['name'] }} {{ $year }}</label>
        <button type="button"
            class="-m-1.5 flex items-center justify-center p-1.5 text-gray-400 hover:text-gray-500"
            wire:click="toggleNextMonth">
            <span class="sr-only">Next month</span>
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div class="mt-6 grid grid-cols-7 text-xs text-center leading-6 text-gray-500">
        <div>S</div>
        <div>M</div>
        <div>T</div>
        <div>W</div>
        <div>T</div>
        <div>F</div>
        <div>S</div>
    </div>
    <div class="isolate mt-2 grid grid-cols-7 gap-px rounded-lg overflow-hidden bg-gray-200 text-sm shadow ring-1 ring-gray-200">
        <!-- Fill the empty cells before the first day -->
        @for ($i = 0; $i < $dates[0]->dayOfWeek; $i++)
        <div></div>
        @endfor

        <!-- Calendar dates -->
        @foreach ($dates as $date)
        <button type="button" class="bg-white py-1.5 text-gray-900 hover:bg-gray-100 focus:z-10">
            <time datetime="{{ $date->format('Y-m-d') }}"
                @class([
                'mx-auto flex h-7 w-7 items-center justify-center rounded-full',
                'bg-gray-900 font-semibold text-white' => $date->format('Y-m-d') == date('Y-m-d')
                ])>
                <span>{{ $date->format('d') }}</span>
            </time>
        </button>
        @endforeach
    </div>
</div>