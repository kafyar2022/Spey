<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('news', function (Blueprint $table) {
      $table->id();
      $table->string('img')->default('default.jpg');
      $table->integer('category_id');
      $table->string('en_title');
      $table->string('ru_title');
      $table->string('slug')->unique();
      $table->text('ru_text')->nullable();
      $table->text('en_text')->nullable();
      $table->bigInteger('view_rate')->default(0);
      $table->boolean('trashed')->default(false);
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
    Schema::dropIfExists('news');
  }
}
