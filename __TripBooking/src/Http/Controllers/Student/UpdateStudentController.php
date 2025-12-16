<?php

namespace Modules\TripBooking\src\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Student\UpdateStudentRequest;
use Modules\TripBooking\src\Repositories\Student\StudentRepositoryInterface;
use Modules\TripBooking\src\Repositories\Department\DepartmentRepositoryInterface;
use Modules\TripBooking\src\Repositories\Unit\UnitRepositoryInterface;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdateStudentController extends Controller
{
    private $studentRepository;
    private $unitRepository;

    public function __construct(StudentRepositoryInterface $studentRepository, UnitRepositoryInterface $unitRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->unitRepository = $unitRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->studentRepository->find($id);
        $units = $this->unitRepository->all();
        return view('TripBooking::student.edit', compact('item', 'units'));
    }

    public function store(UpdateStudentRequest $request)
    {
        $this->studentRepository->update($request);
        return redirect()->route('student_index')->with('success', __('Data is updated successfully.'));
    }
}
