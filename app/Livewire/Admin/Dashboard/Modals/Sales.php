<?php

namespace App\Livewire\Admin\Dashboard\Modals;

use Livewire\Component;

use App\Models\Transaction;

class Sales extends Component
{
    public $modal;

    public function data()
    {
        $data = [];

        for ($m = 0; $m < 12; $m++) {
            $from = date('Y-m-01', strtotime(date('Y-01-01') . ' + ' . $m . ' month'));
            $to = date('Y-m-t', strtotime(date('Y-01-01') . ' + ' . $m . ' month'));

            $transactions = Transaction::where('remarks', 'accepted')->whereBetween('created_at', [$from, $to]);

            $data[date('M', strtotime($from))] = $transactions->sum('total_amount');
        }

        return $data;
    }

    public function render()
    {
        return view('livewire.admin.dashboard.modals.sales')->with([
            'data' => $this->data()
        ]);
    }
}
