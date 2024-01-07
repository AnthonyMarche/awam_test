<?php

namespace App\Console\Commands;

use App\Mail\CalculationsHistory;
use App\Models\CalculationHistory;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;

class EmailDailyCalculations extends Command
{
    private const APP_OWNER_EMAIL = 'appowner@gmail.com';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:email-daily-calculations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Sends an email containing the calculation history from the previous day";

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        try {
            $calculationsHistory = CalculationHistory::whereDate("created_at", Date::yesterday())->get();
            Mail::to(self::APP_OWNER_EMAIL)->send(new CalculationsHistory($calculationsHistory));
        } catch (Exception $e) {
            $this->error($e->getMessage());
            return 1;
        }

        $this->info('Email envoyé avec succès.');
        return 0;
    }
}
