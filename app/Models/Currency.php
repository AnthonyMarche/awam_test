<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCurrency
 */
class Currency extends Model
{
    use HasFactory;

    protected $fillable = ['name' ,'code'];

    public function exchangeRates(): HasMany
    {
        return $this->hasMany(ExchangeRate::class, 'currency_from_id', 'id')
            ->orWhere('currency_to_id', $this->id);
    }
}
