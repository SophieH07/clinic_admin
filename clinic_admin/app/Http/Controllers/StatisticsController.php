<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $weeklyVisitCount = Visit::whereBetween('visit_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        $latestVisits = Visit::with('patient')->latest('visit_date')->take(5)->get();

        $topReasons = Visit::select('reason', DB::raw('count(*) as total'))->groupBy('reason')->orderBy('total', 'desc')->take(5)->get();

        return view('statistics.index', compact('weeklyVisitCount', 'latestVisits', 'topReasons'));
    }
}
