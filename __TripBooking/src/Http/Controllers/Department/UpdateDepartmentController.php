<?php

namespace Modules\TripBooking\src\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Department\UpdateDepartmentRequest;
use Modules\TripBooking\src\Repositories\Department\DepartmentRepositoryInterface;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdateDepartmentController extends Controller
{
    private $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->departmentRepository->find($id);
        return view('TripBooking::department.edit', compact('item'));
    }

    public function store(UpdateDepartmentRequest $request)
    {
        $this->departmentRepository->update($request);
        return redirect()->route('department_index')->with('success', __('Data is updated successfully.'));
    }
}
