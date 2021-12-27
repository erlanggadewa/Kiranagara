<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('regions', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->string('latitude');
      $table->string('longitude');
      $table->string('size_area');
      $table->string('population');
      $table->longText('description');
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
    Schema::dropIfExists('regions');
  }
}
