<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'name',
        'model_no',
        'engine_no',
        'frame_no',
        'part_no',
        'color',
        'image',
        'quantity',
        'initial_quantity',
        'remarks',
        'price',
        'initial_price',
        'discount',
        'type',
    ];

    public function order()
    {
        return $this->hasOne('App\Order', 'stock_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'product_id');
    }
}
