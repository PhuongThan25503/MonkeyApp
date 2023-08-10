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
        Schema::table('touch', function (Blueprint $table) {
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
        Schema::table('touch', function (Blueprint $table) {
            $table->dropForeign('touch_page_id_foreign');
            $table->dropForeign('touch_text_id_foreign');
        });
    }
};
