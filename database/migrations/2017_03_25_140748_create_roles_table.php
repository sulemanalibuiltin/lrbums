<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('homepage_id')->unsigned();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->integer('level')->default(0);
            $table->integer('created_by')->default(0)->unsigned();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('roles');
    }
}
