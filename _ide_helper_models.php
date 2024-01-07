<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\CalculationHistory
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $detail
 * @method static \Illuminate\Database\Eloquent\Builder|CalculationHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CalculationHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CalculationHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CalculationHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CalculationHistory whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CalculationHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CalculationHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperCalculationHistory {}
}

namespace App\Models{
/**
 * App\Models\Currency
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $code
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ExchangeRate> $exchangeRates
 * @property-read int|null $exchange_rates_count
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperCurrency {}
}

namespace App\Models{
/**
 * App\Models\ExchangeRate
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float $exchange_rate
 * @property int $currency_from_id
 * @property int $currency_to_id
 * @property-read \App\Models\Currency $currencyFrom
 * @property-read \App\Models\Currency $currencyTo
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate whereCurrencyFromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate whereCurrencyToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperExchangeRate {}
}

