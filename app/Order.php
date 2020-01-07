<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'customer_id',
        'program_id',
        'kavling_id',
        'project_id',
        'status',
        'notes',
        'created_by',
        'updated_by',
    ];

}
