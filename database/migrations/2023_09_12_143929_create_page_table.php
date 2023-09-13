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
        Schema::create('page', function (Blueprint $table) {
            $table->bigIncrements('page_id');
            $table->unsignedBigInteger('story_id')->nullable()->index('page_story_id_foreign');
            $table->string('background')->nullable();
            $table->timestamps();
            $table->integer('page_num')->nullable();
            $table->unsignedBigInteger('text_id')->nullable()->index('page_text_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page');
    }
};
