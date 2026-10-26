<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracker;
class StatsController extends Controller
{
    public function pages(Request $request)
    {
        $type = $request->query('type', 'page');
        if (!in_array($type, ['page', 'ip'], true)) {
            abort(400, 'Невідомий тип групування.');
        }
        $rows = Tracker::query()
            ->selectRaw(
                "{$type}, count(*) as hits, max(visited_at) as last_visit"
            )
            ->groupBy($type)
            ->orderByDesc('hits')
            ->get();
        return view('stats.pages', compact('rows', 'type'));
    }
}
