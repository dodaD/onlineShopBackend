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
    Schema::table('additional_pictures', function (Blueprint $table) {
      $table->dropColumn('option_name');
    });
    Schema::table('additional_pictures', function (Blueprint $table) {
      $table->string('option_name')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('additional_pictures', function (Blueprint $table) {
      $table->dropColumn('option_name');
    });
    Schema::table('additional_pictures', function (Blueprint $table) {
      $table->string('option_name');
    });
  }
};
