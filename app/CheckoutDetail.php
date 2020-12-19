<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckoutDetail extends Model
{
    public function Checkout()
    {
        return $this->belongsTo(Checkout::class, 'checkout_id', 'id');
    }
    public function Weapon()
    {
        return $this->belongsTo(Weapon::class, 'weapon_id', 'id');
    }
    protected $fillable = [
        'total_payment', 'weapon_id', 'checkout_id'
    ];
}
