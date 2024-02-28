<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('it_departments', function (Blueprint $table) {
            $table->id();
            $table->string('courseTitle');
            $table->string('instructor');
            $table->text('courseDescription');
            $table->text('courseOutline');
            $table->string('department')->default('IT'); // Set default value to 'IT'
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('it_departments');
    }
}
