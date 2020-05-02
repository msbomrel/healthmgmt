<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Healthexamfile extends Model
{
    protected $fillable = [
      'employee_code',
      'target_year',
      'implementation_date',
      'medical_exam_course',
      'classification',
      'awareness_date',
      'judgement_result',
      'require_reexamination',
      'judgement_date'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_code','employee_code');
    }
}
