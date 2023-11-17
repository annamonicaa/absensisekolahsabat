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
        Schema::create('ukssmems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id');
            $table->foreignId('ukss_id');
            $table->foreignId('church_id');
            $table->foreignId('triwulan_id');
            $table->timestamps();
            
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukssmem');
    }
};
