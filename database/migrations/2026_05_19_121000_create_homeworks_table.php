<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeworks', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | PRIMARY KEY
            |--------------------------------------------------------------------------
            */

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | FOREIGN KEY -> CLASSES TABLE
            |--------------------------------------------------------------------------
            */

            $table->foreignId('class_id')

                  ->constrained('classes')

                  ->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | HOMEWORK DETAILS
            |--------------------------------------------------------------------------
            */

            // Homework title/topic

            $table->string('topic', 100);

            // Extra instructions/details

            $table->text('description')->nullable();

            /*
            |--------------------------------------------------------------------------
            | FILE STORAGE
            |--------------------------------------------------------------------------
            |
            | Stores file path only
            | Example:
            | homeworks/abc123.pdf
            |
            */

            $table->string('file')->nullable();

            /*
            |--------------------------------------------------------------------------
            | SUBMISSION DEADLINE
            |--------------------------------------------------------------------------
            */

            $table->date('due_date')->nullable();

            /*
            |--------------------------------------------------------------------------
            | HOMEWORK STATUS
            |--------------------------------------------------------------------------
            */

            // active / inactive / completed

            $table->string('status', 20)->default('active');

            /*
            |--------------------------------------------------------------------------
            | TIMESTAMPS
            |--------------------------------------------------------------------------
            */

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
        Schema::dropIfExists('homeworks');
    }
};