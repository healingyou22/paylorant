<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    public function CheckoutDetail()
    {
        return $this->hasMany(CheckoutDetail::class, 'checkout_id', 'id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    protected $fillable = [
        'invoice', 'total_payment', 'status', 'user_id'
    ];
}
