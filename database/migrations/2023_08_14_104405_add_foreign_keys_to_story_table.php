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
//        Schema::table('story', function (Blueprint $table) {
//            $table->foreign(['author_id'])->references(['id'])->on('user');
//        });
        Schema::table('user', function (Blueprint $table){
            $table->string('email')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::table('story', function (Blueprint $table) {
//            $table->dropForeign('story_author_id_foreign');
//        });
    }
};
