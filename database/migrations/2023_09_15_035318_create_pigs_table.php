<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePigsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pigs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('breed');
            $table->date('mother')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_arrival')->nullable();
            $table->float('weight')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pigs');
    }
}