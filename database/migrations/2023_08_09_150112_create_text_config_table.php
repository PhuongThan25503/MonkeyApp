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
        Schema::create('text_config', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('text_id');
            $table->foreign('text_id')->references('text_id')->on('text');
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('page_id')->on('page');
            $table->string('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('text_config');
    }
};
