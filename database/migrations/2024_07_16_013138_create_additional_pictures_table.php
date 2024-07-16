<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('additional_pictures', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->foreignId('product_id')
        ->constrained()
        ->onDelete('cascade');
      $table->string('imgURL');
      $table->boolean('optinal');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('additional_pictures');
  }
};
