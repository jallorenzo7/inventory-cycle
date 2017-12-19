<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'stock_id',
        'amount_received',
        'total',
        'date_transaction',
    ];
}
