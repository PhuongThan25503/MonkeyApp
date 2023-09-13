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
        Schema::table('story', function (Blueprint $table) {
            $table->foreign(['author_id'])->references(['id'])->on('user');
            $table->foreign(['type_id'])->references(['type_id'])->on('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('story', function (Blueprint $table) {
            $table->dropForeign('story_author_id_foreign');
            $table->dropForeign('story_type_id_foreign');
        });
    }
};
