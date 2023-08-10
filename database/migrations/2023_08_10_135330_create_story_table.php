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
        Schema::create('story', function (Blueprint $table) {
            $table->bigIncrements('story_id');
            $table->unsignedBigInteger('author_id')->index('story_author_id_foreign');
            $table->unsignedBigInteger('type_id')->index('story_type_id_foreign');
            $table->string('name');
            $table->string('thumbnail');
            $table->integer('coin');
            $table->boolean('isActive');
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
        Schema::dropIfExists('story');
    }
};
