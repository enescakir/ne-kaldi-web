<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('platform')->nullable();
            $table->integer('exam_id')->unsigned();
            $table->integer('visitor_id')->unsigned();
            $table->timestamps();

            $table->foreign('exam_id')->references('id')->on('exams');
            $table->foreign('visitor_id')->references('id')->on('visitors');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('visits');
    }
}
