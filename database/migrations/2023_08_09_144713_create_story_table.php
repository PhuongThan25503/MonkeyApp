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
        Schema::create('story', function (Blueprint $table) {
            $table->unsignedBigInteger('story_id', true);
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('author_id')->on('author');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('type_id')->on('type');
            $table->string('name');
            $table->string('thumbnail');
            $table->integer('coin');
            $table->boolean('isActive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('story');
    }
};
