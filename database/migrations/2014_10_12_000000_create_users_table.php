<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigincrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->integer('gender');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('phone_number')->unique();
            $table->string('password');
            $table->integer('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('users');
    }
}
