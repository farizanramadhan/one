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
        'lat',
        'lon',
        'price',
        'status_id',
        'created_by',
        'updated_by',
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function status()
    {
        return $this->belongsTo('App\StatusOrder');
    }
}
