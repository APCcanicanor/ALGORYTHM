<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiologyDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('biology_departments', function (Blueprint $table) {
            $table->id();
            $table->string('courseTitle');
            $table->string('instructor');
            $table->text('courseDescription');
            $table->text('courseOutline');
            $table->string('department')->default('Biology'); // Set default value to 'Biology'
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('biology_departments');
    }
}

