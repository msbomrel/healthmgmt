<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
      'employee_code',
      'name',
      'gender',
      'dob',
      'position_code',
      'affiliation_code',
      'location_code'
    ];

    public function location(){
        return $this->belongsTo(Location::class,'location_code', 'location_code');
    }

    public function affiliation(){
        return $this->belongsTo(Affiliation::class,'affiliation_code', 'affiliation_code');
    }

    public function position(){
        return $this->belongsTo(Position::class,'position_code', 'position_code');
    }

    public function hasfile(){
        return $this->belongsTo(Healthexamfile::class,'employee_code', 'employee_code');
    }
}
