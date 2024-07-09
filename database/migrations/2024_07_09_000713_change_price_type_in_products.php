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
        Schema::table('products', function ($table) {
            $table->dropColumn('price'); // Тому що в деяких скілах може бути занадто багато симболів для діскріпшену з типом string
        });

        Schema::table('products', function ($table) {
            $table->float('price', precision: 4);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
