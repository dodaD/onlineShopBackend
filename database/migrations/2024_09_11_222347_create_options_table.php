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
    Schema::create('options', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->foreignId('product_id')
        ->constrained()
        ->onDelete('cascade');
      $table->string('name', 450);
      $table->string('imgURL');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('options');
  }
};
