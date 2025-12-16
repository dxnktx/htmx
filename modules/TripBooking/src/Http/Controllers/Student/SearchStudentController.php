<?php

namespace Modules\TripBooking\src\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Student\SearchStudentRequest;
use Modules\TripBooking\src\Repositories\Student\StudentRepositoryInterface;

class SearchStudentController extends Controller
{
    private $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function create(SearchStudentRequest $request)
    {
        $datas = $this->studentRepository->search($request);
        return view('TripBooking::student.index', compact('datas'));
    }
}
