<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
    protected $fillable = [
      'affiliation_code',
      'affiliation_name'
    ];
}
