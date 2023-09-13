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
        Schema::table('audio', function (Blueprint $table) {
            $table->foreign(['text_id'])->references(['text_id'])->on('text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audio', function (Blueprint $table) {
            $table->dropForeign('audio_text_id_foreign');
        });
    }
};
