<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Weapon()
    {
        return $this->hasMany(Weapon::class, 'category_id', 'id');
    }
}
