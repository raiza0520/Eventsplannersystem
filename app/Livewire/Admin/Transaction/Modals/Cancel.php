<?php

namespace App\Livewire\Admin\Transaction\Modals;

use Livewire\Component;
use Livewire\Attributes\{On, Rule}; 

use App\Models\Transaction;

class Cancel extends Component
{

    public $modal;
    public $transaction = [];

    #[Rule('required|max:50')]
    public $reason;

    public function saveReason($value){
        Transaction::where("id", $value)->update(["remarks" => "cancelled", "reason" => $this->reason]);
        
        return redirect('admin/transactions/manage/'.$value);
    }
    public function render()
    {
        return view('livewire.admin.transaction.modals.cancel');
    }
}
