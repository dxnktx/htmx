<?php

namespace Modules\TripBooking\src\Repositories\Department;

use Modules\TripBooking\src\Models\Department;
use Modules\TripBooking\src\Filters\DepartmentFilter;
use Modules\TripBooking\src\Repositories\BaseRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    protected $model;

    public function __construct(Department $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        $obj = $this->model->where('id', $request->id)->firstOrNew();

        if($request->hasFile('image')) {

            if(is_file(public_path('storage/uploads/department/' . $obj->image))) {
                unlink(public_path('storage/uploads/department/' . $obj->image));
            }

            $ext = $request->file('image')->extension();
            $final_name = 'department_' . time() . '.' . $ext;

            $request->file('image')->move(public_path('storage/uploads/department/'), $final_name);

            $obj->image = $final_name;
        }

        $obj->ma_khoa = $request->ma_khoa;
        $obj->ten_khoa = $request->ten_khoa;
        $obj->save();
    }
}