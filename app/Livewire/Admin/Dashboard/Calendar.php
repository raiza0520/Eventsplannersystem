<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;

use Carbon\Carbon;

class Calendar extends Component
{
    public $year;
    public $month;

    public $dates = [];

    public function mount() {
        $this->dates = $this->dates(Carbon::now());
    }

    public function dates($date) {
        $dates = [];
        
        $this->year = $date->year;

        $this->month = [
            'name' => $date->format('F'),
            'value' => $date->month
        ];

        $daysInMonth = $date->daysInMonth;

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $dates[] = Carbon::create($this->year, $this->month['value'], $day);
        }

        return $dates;
    }

    public function togglePrevMonth() {
        $month = $this->month['value']--;

        if ($month == 0) {
            $this->month['value'] = 12;
            $this->year--;
        }

        $this->dates = $this->dates(Carbon::create($this->year, $this->month['value'], 1));
    }

    public function toggleNextMonth() {
        $month = $this->month['value']++;
        
        if ($month > 12) {
            $this->month['value'] = 1;
            $this->year++;
        }

        $this->dates = $this->dates(Carbon::create($this->year, $this->month['value'], 1));
    }

    public function render()
    {
        return view('livewire.admin.dashboard.calendar')->with([
            'dates' => $this->dates
        ]);
    }
}
