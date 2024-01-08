<?php

namespace App\Services;

use App\Models\Currency;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;

class ConverterService
{
    public function convert(array $data): ?float
    {
        $firstCurrency = Currency::where('code', $data['firstCurrency'])->firstOrFail();
        $secondCurrency = Currency::where('code', $data['secondCurrency'])->firstOrFail();
        $resultCurrency = Currency::where('code', $data['resultCurrency'])->firstOrFail();

        $firstAmount = $this->convertCurrencyToResult($data['firstAmount'], $firstCurrency, $resultCurrency);
        $secondAmount = $this->convertCurrencyToResult($data['secondAmount'], $secondCurrency, $resultCurrency);

        return $this->calculate($data['operator'], $firstAmount, $secondAmount);
    }

    // Convert current amount to final currency if needed
    public function convertCurrencyToResult(float $amount, Currency $amountCurrency, Currency $resultCurrency): float
    {
        if ($amountCurrency->id === $resultCurrency->id) {
            return $amount;
        }

        $url = "https://v6.exchangerate-api.com/v6/35d6ba576abf92be9d84dd4f/pair/$amountCurrency->code/$resultCurrency->code/$amount";
        $response = Http::get($url)->json();

        return $response['conversion_result'];
    }

    // Return result depend of operator or exception
    public function calculate($operator, float $firstAmount, float $secondAmount): ?float
    {
        return match ($operator) {
            '+' => round($firstAmount + $secondAmount, 2),
            '-' => round($firstAmount - $secondAmount, 2),
            '*' => round($firstAmount * $secondAmount, 2),
            '/' => $secondAmount != 0
                ? round($firstAmount / $secondAmount, 2)
                : throw new InvalidArgumentException("Division par 0 impossible"),
            default => throw new InvalidArgumentException("Opérateur non pris en charge")
        };
    }

    public function formatCalculationToString(array $calculation, float $result): string
    {
        return "{$calculation['firstAmount']} {$calculation['firstCurrency']} {$calculation['operator']} {$calculation['secondAmount']} {$calculation['secondCurrency']} = $result {$calculation['resultCurrency']}";
    }
}
