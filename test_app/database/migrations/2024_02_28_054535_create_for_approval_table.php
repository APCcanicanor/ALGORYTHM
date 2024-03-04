<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForApprovalTable extends Migration
{
    public function up()
    {
        Schema::create('for_approval', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('courseTitle');
            $table->string('instructor');
            $table->text('courseDescription');
            $table->text('courseOutline');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('for_approval');
    }
}
