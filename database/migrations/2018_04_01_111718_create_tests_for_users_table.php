<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsForUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_for_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_admin_id')->unsigned();
            $table->foreign('test_admin_id')->references('lesson_id')->on('questions');
            $table->integer('module_id_test');
            $table->integer('result');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('tests_for_users');
    }
}
