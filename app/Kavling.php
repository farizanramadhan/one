<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kavling extends Model
{
    //
    protected $fillable = [
        'name',
        'type',
        'address',
        'description',
        'project_id',
        'created_by',
        'updated_by',
    ];

}
