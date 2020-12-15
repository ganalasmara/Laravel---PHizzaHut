<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }
    public function pizza()
    {
        return $this->belongsTo('App\Pizza', 'pizza_id');
    }
}
