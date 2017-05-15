<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provinces', function (Blueprint $table) {
            //

            $table->foreign('country_id')->references('id')->on('countries');
        });

        Schema::table('divisions', function (Blueprint $table) {
            //

            $table->foreign('province_id')->references('id')->on('provinces');
        });

        Schema::table('districts', function (Blueprint $table) {
            //

            $table->foreign('division_id')->references('id')->on('divisions');
        });
        Schema::table('tehsils', function (Blueprint $table) {
            //

            $table->foreign('district_id')->references('id')->on('districts');
        });
        Schema::table('departments', function (Blueprint $table) {
            //

            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('department_type_id')->references('id')->on('department_types');
        });


        Schema::table('users', function (Blueprint $table) {
            //

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('designation_id')->references('id')->on('designations');
        });

        Schema::table('roles', function (Blueprint $table) {
            //

            $table->foreign('homepage_id')->references('id')->on('modules');
        });

        Schema::table('module_role', function (Blueprint $table){

            $table->foreign('module_id')->references('id')->on('modules');
            $table->foreign('role_id')->references('id')->on('roles');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('users', function (Blueprint $table) {
            //
        });*/
    }
}
