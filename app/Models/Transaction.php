<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function subscribe()
    {
        return $this->belongsTo(ProductSubscribe::class, 'product_subscribes_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'transaction_id', 'id');
    }
}
