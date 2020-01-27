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
        'status_id',
        'notes',
        'created_by',
        'updated_by',
        'type_cash',
        'source_fund',
        'promo',
        'motive',
        'purpose',
    ];
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    public function program()
    {
        return $this->belongsTo('App\Program');
    }
    public function kavling()
    {
        return $this->belongsTo('App\Kavling');
    }
    public function orderHistory()
    {
        return $this->hasMany('App\OrderHistory');
    }
    public function status()
    {
        return $this->belongsTo('App\StatusOrder');
    }
}
