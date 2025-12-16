<?php

namespace Modules\TripBooking\src\Exports;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Modules\TripBooking\src\Models\Student;
use Modules\TripBooking\src\Filters\StudentFilter;
use Maatwebsite\Excel\Concerns\FromView;

class StudentExport implements FromView
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
        $students = \Modules\TripBooking\src\Models\Student::with('rUser', 'rTrip')->orderBy('created_at')->get();
        
        return view('TripBooking::student.export', [
            'students' => $students,
        ]);
    }

}
