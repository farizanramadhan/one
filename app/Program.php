<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    protected $fillable = [
        'name',
        'budget',
        'project_id',
        'created_by',
        'updated_by',
    ];
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
