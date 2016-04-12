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
            $table->string('ip_adress');
            $table->string('device_id')->nullable();
            $table->string('platform')->nullable();
            $table->string('name')->nullable();
            $table->integer('exam_id')->unsigned();

            $table->foreign('exam_id')->references('id')->on('exams');
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
        Schema::drop('visits');
    }
}
