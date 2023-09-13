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
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id')->index('user_role_id_foreign');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('api_token', 80)->nullable()->unique();
            $table->string('fullname');
            $table->string('address');
            $table->string('phone');
            $table->timestamps();
            $table->string('email')->unique();
            $table->timestamp('token_expired_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
