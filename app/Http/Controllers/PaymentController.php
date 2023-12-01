<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function storePayment(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image'
        ]);

        $name = $request->image->hashName();
        $request->image->storeAs('ImagePayment', $name);
        Payment::create([
            'transaction_id' => $id,
            'name' => $name
        ]);

        return back();
    }
}
