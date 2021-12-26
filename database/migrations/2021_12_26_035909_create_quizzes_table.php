<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('quizzes', function (Blueprint $table) {
      $table->id();
      $table->string('level');
      $table->longText('question');
      $table->string('option_1');
      $table->string('option_2');
      $table->string('option_3');
      $table->string('option_4');
      $table->string('correct_option');
      $table->string('img');
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
    Schema::dropIfExists('quizzes');
  }
}
