<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = [
      'no_ktp',
      'no_npwp',
      'full_name',
      'address',
      'customer_job_id',
      'province',
      'city',
      'distric',
      'email',
      'phone',
      'ktp_file',
      'income',
      'program_id',
      'status',
      'description',
      'type_data',
      'created_by',
      'updated_by',
  ];
  protected $casts = [
    'status' => 'array',
];

    public function program()
    {
        return $this->belongsTo('App\Program');
    }
    public function customerJob()
    {
        return $this->belongsTo('App\CustomerJob');
    }
    public function distrik()
    {
        return $this->belongsTo('Laravolt\Indonesia\Models\Kecamatan','distric');
    }

}
