<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('module_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->integer('status')->default(1);
            $table->timestamps();


            //$table->foreign('module_id')->references('id')->on('modules');
            //$table->foreign('role_id')->references('id')->on('roles');
            //$table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_role');
    }
}
