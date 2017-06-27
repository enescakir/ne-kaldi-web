<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExamNotification extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('exam_notification', function (Blueprint $table) {
      $table->increments('id');

      $table->integer('exam_id')->unsigned()->nullable();
      $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');

      $table->integer('notification_id')->unsigned()->nullable();
      $table->foreign('notification_id')->references('id')->on('notifications')->onDelete('cascade');

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
    Schema::dropIfExists('exam_notification');
  }
}
