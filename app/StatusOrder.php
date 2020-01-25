<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusOrder extends Model
{
    protected $table = 'status_orders';
    protected $fillable = [
        'name',
        'parent',
        'created_at',
        'updated_at',
    ];
}
