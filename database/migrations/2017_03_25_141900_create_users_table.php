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
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('designation_id')->default(0)->unsigned();
            $table->string('title', 255);
            $table->string('email', 100)->nullable();
            $table->string('contact', 100)->nullable();
            $table->string('username', 255);
            $table->string('password', 255);
            $table->dateTime('last_login')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->default(0)->unsigned();
            $table->dateTime('deleted_at')->nullable();
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
