<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'model_no',
        'engine_no',
        'frame_no',
        'part_name',
        'part_no',
        'color',
        'quantity',
        'initial_quantity',
        'remarks',
        'price',
        'initial_price',
        'discount',
        'type',
    ];
}
