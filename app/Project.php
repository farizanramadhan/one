<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'name',
        'address',
        'availability',
        'description',
        'created_by',
        'updated_by',
    ];
    public function kavling()
    {
        return $this->hasMany('App\Kavling');
    }
}
