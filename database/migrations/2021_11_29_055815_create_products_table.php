<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('img')->default('default.png');
      $table->string('icon')->nullable();
      $table->integer('category_id');
      $table->string('en_title');
      $table->string('ru_title');
      $table->string('slug')->unique();
      $table->string('en_instruction')->nullable();
      $table->string('ru_instruction')->nullable();
      $table->text('en_composition')->nullable();
      $table->text('ru_composition')->nullable();
      $table->text('en_indications')->nullable();
      $table->text('ru_indications')->nullable();
      $table->text('en_description')->nullable();
      $table->text('ru_description')->nullable();
      $table->text('en_method')->nullable();
      $table->text('ru_method')->nullable();
      $table->boolean('recipe');
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
    Schema::dropIfExists('products');
  }
}
