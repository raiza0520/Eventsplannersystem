<?php

namespace App\Livewire\Public\Components\Modals;

use Livewire\{Component, WithFileUploads};
use Livewire\Attributes\{On, Rule}; 
use Illuminate\Support\Facades\Auth;


use App\Models\Transaction;
use App\Models\Payment;

class Paymentform extends Component
{
    use WithFileUploads;

    public $modal;

    #[Rule('required|file|mimes:jpg,jpeg,png|max:5120')]
    public $file;

    #[Rule('required|max:50')]
    public $name;
   
    #[Rule('required')]
    public $amount;
   
    #[Rule('required')]
    public $ref;
   
    #[Rule('required')]
    public $email;

    public $pID;
    public $package_amount;
    public $user_id;

    public $transaction = [];
    public $payment = [];

    #[On('selected-paymnet-form')]
    public function data(Payment $payment) 
    {
        $this->payment = $payment;

        $this->pID = $payment->transaction_id;
        $res = Transaction::where('id', $this->pID)->get();
        foreach ($res as $key => $value) {
            $this->package_amount = $value->package_amount;
            $this->user_id = $value->user_id;
        }
    }
    public function update() {
        $sum = $this->package_amount  * 0.30;
        if ($this->validate()) {
            if ($sum != 0) {
                if ($this->amount == $sum) { 
                    $deleted = Payment::where('transaction_id', $this->pID)->delete();
                    
                        if ($deleted) {
                            $pay = Payment::create([
                                'id' => $this->pID,
                                'transaction_id' => $this->pID,
                                'name' => $this->name,
                                'amount' => $this->amount,
                                'email' => $this->email,
                                'ref_no' => $this->ref,
                                'type' => 'down_payment',
                            ]);
                            
                            $transaction = Transaction::where('id', $this->pID)->first();
                            
                            $transaction->addMedia($this->file)->toMediaCollection('transactions');
                        }
                    
                    return redirect('account/transactions');
                
                }else{
                    $this->js('alert("Please make sure to pay the exact amount for 30% downpayment.")');
                }
            }else{
                $this->js('alert("Please make sure to pay the exact amount for 30% downpayment.")');
            }
        }else{
            $this->js('alert("Please fillup all Input fields")');
        }
    }

    public function render()
    {
        return view('livewire.public.components.modals.paymentform');
    }
}
