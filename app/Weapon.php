<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function CheckoutDetail()
    {
        return $this->hasMany(CheckoutDetail::class, 'weapon_id', 'id');
    }
}
