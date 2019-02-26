<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Transformer\EventTransformer;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'permission:access-reports']);
    }

    public function index(Request $request)
    {
        $query = null;
        if ($request->countries) {
            $query = Event::whereIn('country_code', $request->countries);
        }

        if ($request->start) {
            $query = $query ? $query->where('plan_date', '>=', $request->start) : Event::where('plan_date', '>=', $request->start);
        }

        if ($request->end) {
            $query = $query ? $query->where('plan_date', '<=', $request->end) : Event::where('plan_date', '<=', $request->end);
        }
        return fractal($query->get(), new EventTransformer())->respond();
    }
}
