<?php

namespace Modules\TripBooking\src\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Student;
use Modules\TripBooking\src\Repositories\Student\StudentRepositoryInterface;

class StudentController extends Controller
{
    private $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        $datas = $this->studentRepository->all();
        return view('TripBooking::student.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->studentRepository->delete($id);
        return redirect()->route('student_index')->with('success', __('Data is deleted successfully.'));
    }
    
    public function export() 
    {
        return $this->studentRepository->export();
    }

}
