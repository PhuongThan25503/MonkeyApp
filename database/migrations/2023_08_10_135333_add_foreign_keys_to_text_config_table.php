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
        Schema::table('text_config', function (Blueprint $table) {
            $table->foreign(['page_id'])->references(['page_id'])->on('page');
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
        Schema::table('text_config', function (Blueprint $table) {
            $table->dropForeign('text_config_page_id_foreign');
            $table->dropForeign('text_config_text_id_foreign');
        });
    }
};
