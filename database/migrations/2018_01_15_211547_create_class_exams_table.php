<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_exams', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('class_id')->unsigned();
          $table->integer('exam_id')->unsigned();
          $table->timestamps();

          $table->foreign('class_id')
                ->references('id')->on('classes')
                ->onDelete('cascade');

          $table->foreign('exam_id')
                ->references('id')->on('exams')
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
        Schema::dropIfExists('class_exams');
    }
}
