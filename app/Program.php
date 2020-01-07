<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    protected $fillable = [
        'name',
        'budget',
        'created_by',
        'updated_by',
    ];
}