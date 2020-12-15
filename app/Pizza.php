<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public function cartDetail()
    {
        return $this->hasOne('App\CartDetail');
    }

    public function transactionDetail()
    {
        return $this->hasOne('App\TransactionDetail');
    }
}