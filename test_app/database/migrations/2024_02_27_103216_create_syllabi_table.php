<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('syllabi', function (Blueprint $table) {
            $table->id();
            $table->string('courseTitle');
            $table->string('instructor');
            $table->text('courseDescription');
            $table->text('courseOutline');
            $table->string('status')->default('pending'); // Add status column with default value 'pending'
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Add foreign key for user_id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syllabi');
    }
};
