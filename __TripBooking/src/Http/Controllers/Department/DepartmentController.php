<?php

namespace Modules\TripBooking\src\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Department;
use Modules\TripBooking\src\Repositories\Department\DepartmentRepositoryInterface;

class DepartmentController extends Controller
{
    private $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function index()
    {
        $datas = $this->departmentRepository->all();
        return view('TripBooking::department.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->departmentRepository->delete($id);
        return redirect()->route('department_index')->with('success', __('Data is deleted successfully.'));
    }
}
