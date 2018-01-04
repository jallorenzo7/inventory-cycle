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

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_transaction');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function stock()
    {
        return $this->belongsTo('App\Stock', 'stock_id');
    }
}
