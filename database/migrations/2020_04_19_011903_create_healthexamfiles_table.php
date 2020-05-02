<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthexamfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthexamfiles', function (Blueprint $table) {
            $table->unsignedInteger('employee_code');
            $table->string('target_year');
            $table->string('implementation_date');

            $table->string('medical_exam_course')->nullable();
            $table->string('classification')->nullable();
            $table->string('awareness_date')->nullable();
            $table->string('judgement_result')->nullable();
            $table->boolean('require_reexamination')->default(0);
            $table->string('judgement_date')->nullable();

            $table->foreign('employee_code')->references('employee_code')->on('employees');

            $table->primary(['employee_code', 'target_year','implementation_date'],'emp_target_impl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('healthexamfiles');
    }
}
