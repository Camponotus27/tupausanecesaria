<?php

namespace App\Models;

use App\Scopes\ClearVisitScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Shetabit\Visitor\Models\Visit;

class CustomVisit extends Visit
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new ClearVisitScope());
    }

    public function scopeCountPerDayChart($query)
    {
        return $query
            ->selectRaw('date(created_at) AS date, count(1) AS count')
            ->groupBy('date');
    }
}
