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
        Schema::create('text_config', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('text_id')->index('text_config_text_id_foreign');
            $table->unsignedBigInteger('page_id')->index('text_config_page_id_foreign');
            $table->string('position');
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
        Schema::dropIfExists('text_config');
    }
};
