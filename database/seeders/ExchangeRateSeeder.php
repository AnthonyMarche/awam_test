<?php

namespace Database\Seeders;

use App\Models\ExchangeRate;
use Illuminate\Database\Seeder;

class ExchangeRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExchangeRate::create([
            'exchange_rate' => 0.90,
            'currency_from_id' => 2,
            'currency_to_id' => 1,
        ]);
    }
}
