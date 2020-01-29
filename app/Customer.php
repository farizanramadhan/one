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
      'province',
      'city',
      'distric',
      'email',
      'phone',
      'ktp_file',
      'income',
      'program_is',
      'status',
      'description',
      'created_by',
      'updated_by',
  ];
  protected $casts = [
    'status' => 'array',
];
}
