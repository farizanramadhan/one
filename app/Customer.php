<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = [
      'full_name',
      'email',
      'phone',
      'description',
      'address'
  ];
}
