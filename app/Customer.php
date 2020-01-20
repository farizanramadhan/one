<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = [
      'no_ktp',
      'full_name',
      'address',
      'province',
      'city',
      'distric',
      'email',
      'phone',
      'ktp_file',
      'description',
      'created_by',
      'updated_by',
  ];
}
