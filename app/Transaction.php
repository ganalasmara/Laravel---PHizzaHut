<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function transactionDetails()
    {
        return $this->hasMany('App\TransactionDetail', 'transaction_id');
    }
}
