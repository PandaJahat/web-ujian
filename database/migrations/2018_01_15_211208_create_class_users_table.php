<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_users', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('class_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->timestamps();

          $table->foreign('class_id')
                ->references('id')->on('classes')
                ->onDelete('cascade');

          $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_users');
    }
}
