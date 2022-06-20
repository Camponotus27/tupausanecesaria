<?php

namespace App\Http\Controllers;

use Shetabit\Visitor\Models\Visit;
use Illuminate\Http\Request;

class StadisticsController extends Controller
{
    public function visits(Request $request)
    {
        $visits_grouped_created = Visit::where('url', 'not like', "%.css")
            ->where('created_at', '>=', date("d-m-Y",strtotime(date("d-m-Y")."- 1 month")))
            ->where('url', url('/'))
            ->orWhere('url', url('/') . '/menu')
            ->get()
            ->groupBy(function ($visit) {
                return $visit->created_at->format('Y-m-d');
            });

        return view('stadistics.index', compact('visits_grouped_created'));
    }
}
