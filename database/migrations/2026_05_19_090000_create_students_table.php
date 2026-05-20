<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {

            $table->id();

            $table->foreignId('userId')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('classId')
                  ->constrained('classes')
                  ->onDelete('cascade');

            $table->date('dob');

            $table->string('address', 100);

            $table->enum('status', ['active', 'inactive']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
