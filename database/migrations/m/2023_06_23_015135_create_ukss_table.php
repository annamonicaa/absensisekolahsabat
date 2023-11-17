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
        Schema::create('ukss', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('leader');
            $table->string('secretary');
            $table->string('loc');
            $table->foreignId('church_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukss');
    }
};
