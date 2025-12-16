<?php

namespace Modules\TripBooking\src\Http\Controllers\Front;

use Illuminate\Http\Request;
use Modules\TripBooking\src\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $datas = Activity::orderBy('id', 'desc')->paginate(10);
        return view('TripBooking::front.activity_list', compact('datas'));
    }

    public function detail($slug)
    {
        $activity_single = Activity::where('slug', $slug)->first();
        $activity_single->total_view += 1;
        $activity_single->update();

        return view('TripBooking::front.activity_detail', compact('activity_single'));
    }
}
