<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function cartDetails()
    {
        return $this->hasMany('App\CartDetail', 'cart_id');
    }
}
