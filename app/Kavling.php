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
        'location',
        'price',
        'status',
        'created_by',
        'updated_by',
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
