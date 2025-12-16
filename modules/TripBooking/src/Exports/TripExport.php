<?php

namespace Modules\TripBooking\src\Exports;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Models\Trip;
use Modules\TripBooking\src\Filters\TripFilter;
use Maatwebsite\Excel\Concerns\FromView;

class TripExport implements FromView
{
    //private $id;
    private $request;

    public function __construct(Request $request=null) {
    	$this->request = $request;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $trips = Trip::with('rUser', 'rStudent')->orderBy('created_at')->get();
        
        return view('TripBooking::trip.export', compact('trips'));
    }

}
