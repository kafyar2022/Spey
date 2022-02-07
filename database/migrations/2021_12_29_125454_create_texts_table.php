<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('texts', function (Blueprint $table) {
      $table->id();
      $table->integer('page_id');
      $table->string('caption');
      $table->string('anchor');
      $table->text('en_text');
      $table->text('ru_text');
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
    Schema::dropIfExists('texts');
  }
}
