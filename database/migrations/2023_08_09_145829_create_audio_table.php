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
        Schema::create('audio', function (Blueprint $table) {
            $table->unsignedBigInteger('audio_id',true);
            $table->string('audio');
            $table->timestamps();
        });
        Schema::table('text', function(Blueprint $table){
            $table->foreign('audio_id')->references('audio_id')->on('audio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audio');
    }
};
