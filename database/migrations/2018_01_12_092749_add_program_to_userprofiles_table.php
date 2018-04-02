<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProgramToUserprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userprofiles', function (Blueprint $table) {
            $table->integer('program_id')->unsigned();
            $table->timestamps();

            $table->foreign('program_id')
                  ->references('id')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userprofiles', function (Blueprint $table) {
            //
        });
    }
}
