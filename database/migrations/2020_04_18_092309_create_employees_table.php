<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('employee_code');
            $table->string('name');
            $table->enum('gender', ['male', 'female','other']);
            $table->date('dob');
            $table->unsignedInteger('position_code');
            $table->unsignedInteger('affiliation_code');
            $table->unsignedInteger('location_code');

            $table->foreign('position_code')->references('position_code')->on('positions');
            $table->foreign('affiliation_code')->references('affiliation_code')->on('affiliations');
            $table->foreign('location_code')->references('location_code')->on('locations');
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
        Schema::dropIfExists('employees');
    }
}
