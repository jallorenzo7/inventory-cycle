<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'stock_id',
        'quantity',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function stock()
    {
        return $this->belongsTo('App\Stock', 'stock_id');
    }
}
