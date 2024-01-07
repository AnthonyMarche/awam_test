<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;


/**
 * @mixin IdeHelperExchangeRate
 */
class ExchangeRate extends Model
{
    use HasFactory;

    protected $fillable = ['exchange_rate', 'currency_from_id', 'currency_to_id'];

    public function currencyFrom(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_from_id');
    }

    public function currencyTo(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_to_id');
    }

    // Return rate to currencies depend on place in entity (from or to)
    public static function findRateByCurrencies(Currency $currencyFrom, Currency $currencyTo): float
    {
        $exchangeRate = self::where(function (Builder $query) use ($currencyFrom, $currencyTo) {
            $query->where('currency_from_id', $currencyFrom->id)
                ->where('currency_to_id', $currencyTo->id);
        })
            ->orWhere(function (Builder $query) use ($currencyFrom, $currencyTo) {
                $query->where('currency_from_id', $currencyTo->id)
                    ->where('currency_to_id', $currencyFrom->id);
            })
            ->first();

        if (!$exchangeRate) {
            throw (new ModelNotFoundException("Taux d'échange non trouvé"));
        }

        return match ($currencyFrom->id) {
            $exchangeRate->currency_from_id => $exchangeRate->exchange_rate,
            $exchangeRate->currency_to_id => 1 / $exchangeRate->exchange_rate,
        };
    }
}
