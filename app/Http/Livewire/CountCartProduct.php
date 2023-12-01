<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class CountCartProduct extends Component
{
    public $productId;
    public $price_subscribe;
    public $price;
    public $class_id;
    public $subscribe_id;

    public function mount()
    {
        $this->price_subscribe = 0;
        $this->price = 0;
        $this->class_id = 0;
        $this->subscribe_id = 0;
    }

    public function render()
    {
        $products = Product::where('id', $this->productId)->first();
        return view('livewire.count-cart-product', compact('products'));
    }

    public function countSubscribe($price, $id)
    {
        $this->price_subscribe = $price;
        $this->price = $this->price_subscribe;
        $this->subscribe_id = $id;
    }

    public function checkout()
    {
        if(auth()->user()->image){
            if ($this->subscribe_id) {
                $time = Carbon::now();
                $time->setTimezone('Asia/Jakarta');
                $no_transactions = "INV-" . date('Ymd') . auth()->user()->id . $this->productId .  $this->subscribe_id . $time->format('His');
                $transaction = Transaction::create([
                    'no_transactions' => $no_transactions,
                    'user_id' => auth()->user()->id,
                    'product_id' => $this->productId,
                    'product_subscribes_id' => $this->subscribe_id
                ]);
                return redirect()->route('detailTransaction', $transaction->no_transactions);
            }
        }else{
            return redirect()->route('profile');
        }
    }
}
