<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;


class OwnerListUsersProduct extends Component
{

    public $product_id;

    public function render()
    {
        $data = Transaction::where('product_id',$this->product_id)->get();
        return view('livewire.owner-list-users-product',compact('data'));
    }

}
