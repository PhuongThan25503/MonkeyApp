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
        Schema::dropIfExists('author');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('author', function (Blueprint $table) {
            $table->bigIncrements('author_id');
            $table->string('name');
            $table->date('DOB');
            $table->boolean('gender');
            $table->timestamps();
        });
    }
};
