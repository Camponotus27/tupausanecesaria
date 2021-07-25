<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomVisit;
use Illuminate\Support\Facades\Validator;

class StadisticsApiController extends Controller
{
    public function visits(Request $request)
    {
        $path_search = $request->pathSearch;

        $visits;
        if (empty($path_search)) {
            return CustomVisit::countPerDayChart()->get();
        }

        return CustomVisit::countPerDayChart()
            ->where('url', url('/') . $request->pathSearch)
            ->get();
    }
}
