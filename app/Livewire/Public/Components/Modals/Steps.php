<?php

namespace App\Livewire\Public\Components\Modals;

use Livewire\{Component, WithFileUploads};
use Livewire\Attributes\On; 

use Illuminate\Support\Facades\{DB, Auth};

use App\Models\{Package, Transaction, Reservation, Payment, Bank, ItemType};

class Steps extends Component
{
    use WithFileUploads;

    public $modal_id;

    public $file;
    
    public $steps = 'confirmation';

    public $package = [];
    public $addons = [];
    public $customize = [];
    public $reservation = [];
    public $payment = [];
    public $banks = [];
    public $item_types = [];

    public function  mount() 
    {
        $this->banks = $this->banks()->get();  
        $this->item_types = $this->item_types()->get();  
    }

    public function proceed($value) 
    {
        switch ($value) {
            case 'confirm':
                $this->validate([
                    'reservation.name' => 'required',
                    'reservation.contact' => 'required',
                    'reservation.date_of_use' => 'required|date',
                    'reservation.location' => 'required',
                    'reservation.email' => 'required|email',
                ]);
                break;

            case 'confirm2':
                $this->validate([
                    'payment.name' => 'required',
                    'payment.amount' => 'required|numeric|gt:0',
                    'payment.ref_no' => 'required',
                    'payment.email' => 'required|email',
                    'file' => 'required|file|mimes:jpg,jpeg,png|max:5120'
                ]);
                break;
            
            default:
                # code...
                break;
        }

        $this->dispatch('proceed-step', step: $value);   
    }

    public function submit() 
    {
        $addontotal = 0;
        foreach ($this->addons as $type => $addon){
            foreach ($addon as $item){
                if ($item['quantity'] > 0){
                    $total = 0;
                    foreach ($this->item_types as $aitem){
                        if (strtolower($aitem->name) == $item['name']){
                            $total += $item['quantity'] * $aitem->itemprice;
                            $addontotal += $total;
                        }  
                    }
                }
            }
        }

        try {
            DB::transaction(function () {
                $transaction = Transaction::create([
                    'user_id' => Auth::user()->id,
                    'package_id' => $this->package->id,
                    'package_amount' => $this->package->price,
                    'addons' => (object) $this->addons,
                    'customize' => (object) $this->customize,
                    'remarks' => 'pending'
                ]);
    
                Reservation::create([
                    'transaction_id' => $transaction->id,
                    'name' => $this->reservation['name'],
                    'contact' => $this->reservation['contact'],
                    'date_of_use' => date('Y-m-d H:i:s', strtotime($this->reservation['date_of_use'])),
                    'location' => $this->reservation['location'],
                    'email' => $this->reservation['email'],
                ]);
    
                Payment::create([
                    'id' => $transaction->id,
                    'transaction_id' => $transaction->id,
                    'name' => $this->reservation['name'],
                    'type' => 'down_payment',
                    'amount' => "0",
                    'ref_no' => "N/A",
                    'email' => "N/A"
                ]);

                // $transaction->addMedia($this->file)->toMediaCollection('transactions');
    
                $this->js('alert("Your reservation has been submitted.")');

                return redirect()->route('account', ['tab' => 'transactions']);
            });
        } catch (\Throwable $th) {
            $this->js('alert("We\'re unable to process your reservation at this time.")');
        }
    }

    public function increment($type, $keys) {
        $key = explode('.', $keys);
        
        $this->$type[$key[0]][$key[1]][$key[2]]++;
        $this->$type[$key[0]][$key[1]]['amount'] = $this->$type[$key[0]][$key[1]][$key[2]] * $this->$type[$key[0]][$key[1]]['price'];
    }

    public function decrement($type, $keys) {
        $key = explode('.', $keys);

        $this->$type[$key[0]][$key[1]][$key[2]] != 0 ? $this->$type[$key[0]][$key[1]][$key[2]]-- : 0;
        $this->$type[$key[0]][$key[1]]['amount'] = $this->$type[$key[0]][$key[1]][$key[2]] * $this->$type[$key[0]][$key[1]]['price'];
    }
    
    #[On('selected-package')]
    public function data(Package $package) 
    {
        $this->package = $package;

        foreach ($package['addons'] as $type => $addon) {
            $this->addons[$type] = [];

            foreach ($addon as $key => $value) {
                $this->addons[$type][$key] = [
                    'name' => $value->name,
                    'price' => 0,
                    'quantity' => 0,
                    'amount' => 0
                ];
            }
        }

        foreach ($package['customize'] as $type => $customize) {
            $this->customize[$type] = [];

            foreach ($addon as $key => $value) {
                $this->customize[$type][$key] = [
                    'name' => $value->name,
                    'price' => 0,
                    'quantity' => 0,
                    'amount' => 0
                ];
            }
        }
    }

    public function banks() {
        return Bank::where('status', true);
    }
    
    public function item_types() 
    {
        return ItemType::where('status', true);
    }

    public function render()
    {
        return view('livewire.public.components.modals.steps');
    }
}
