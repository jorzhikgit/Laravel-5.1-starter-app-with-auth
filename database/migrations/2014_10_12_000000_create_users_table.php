<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
            $table->string('firstname');
            $table->string('lastname');
            //$table->string('username')->unique();
            $table->string('username');// two users with the same username?
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('address');
            $table->string('address2');
            $table->string('city');
            $table->string('province');
            $table->string('zip');
            $table->string('phone');
            $table->string('country');
            $table->string('company');
            $table->string('picture');
            $table->string('provider_id');
            $table->string('provider');
            $table->string('token');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
