<?php

namespace Modules\TripBooking\src\Http\Controllers\Front;

use Modules\TripBooking\src\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index()
    {
        return view('TripBooking::front.privacy');
    }
}
