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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->string('email', 200)->unique();
            $table->string('password', 100);
            $table->string('avatar', 255)->nullable();
            $table->string('verify_token', 100)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->tinyInteger('status')->default(0)->comment('0: InActive, 1: Active');
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
