<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    //
    protected $table = 'order_histories';
    protected $fillable = [
        'status',
        'name',
        'order_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'notes',
        'icons',

    ];
}
