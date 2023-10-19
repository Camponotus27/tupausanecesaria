<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomVisit;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class StadisticsApiController extends Controller
{
    public function visits(Request $request)
    {
        $path_search = $request->pathSearch;

        $visits;
        if (empty($path_search)) {
            return CustomVisit::countPerDayChart()->get();
        }

        $threeMonthsAgo = Carbon::now()->subMonths(3);

        return CustomVisit::countPerDayChart()
            ->where('url', url('/') . $request->pathSearch)
            ->whereDate('created_at', '>=', $threeMonthsAgo)
            ->get();
    }
}
