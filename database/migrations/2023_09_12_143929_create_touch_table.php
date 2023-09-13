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
        Schema::create('touch', function (Blueprint $table) {
            $table->bigIncrements('touch_id');
            $table->unsignedBigInteger('page_id')->index('touch_page_id_foreign');
            $table->unsignedBigInteger('text_id')->index('touch_text_id_foreign');
            $table->json('data');
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
        Schema::dropIfExists('touch');
    }
};
