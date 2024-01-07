<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCalculationHistory
 */
class CalculationHistory extends Model
{
    use HasFactory;

    protected $fillable = ['detail'];
}
