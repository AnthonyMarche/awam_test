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
        Schema::dropIfExists('exchange_rates');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float("exchange_rate");
            $table->foreignId('currency_from_id')->constrained("currencies");
            $table->foreignId('currency_to_id')->constrained("currencies");
        });
    }
};
