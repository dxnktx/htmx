<?php

namespace Modules\TripBooking\src\Repositories\Student;

use Modules\TripBooking\src\Models\Student;
use Modules\TripBooking\src\Filters\StudentFilter;
use Modules\TripBooking\src\Repositories\BaseRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Modules\TripBooking\src\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
    protected $model;

    public function __construct(Student $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        try {
            DB::transaction(function () use ($request) {
                $obj = $this->model->where('id', $request->id)->firstOrNew();
                $obj->ma_sinh_vien = $request->ma_sinh_vien;
                $obj->ten_sinh_vien = $request->ten_sinh_vien;
                $obj->don_vi_dao_tao = $request->don_vi_dao_tao;
                $obj->khoa_bo_mon = $request->khoa_bo_mon;
                $obj->sinh_vien_nam_thu = $request->sinh_vien_nam_thu;
                $obj->chuc_vu_trong_doan_doi = $request->chuc_vu_trong_doan_doi;
                $obj->save();
            });
        } catch (\Exception $e) {
            Log::error('Insert failed', ['exception' => $e->getMessage()]);
            return redirect()->route('booking_index')->with('warning', __('There is some error in booking step.'));
        }
    }

    public function createApiStudent($response)
    {
        try {
            DB::transaction(function () use ($response) {
                $obj = $this->model->where('id', $response['Id'])->firstOrNew();
                $obj->ma_sinh_vien = $response['StudentCode'];
                $obj->ten_sinh_vien = $response['Name'];
                $obj->don_vi_dao_tao = $response['UniversityName'];
                $obj->khoa_bo_mon = '';
                $obj->sinh_vien_nam_thu = $response['YearStudent'];
                $obj->chuc_vu_trong_doan_doi = 'Không có';
                $obj->save();
            });
        } catch (\Exception $e) {
            Log::error('Insert failed', ['exception' => $e->getMessage()]);
            return redirect()->back()->with('warning', __('There is some error in student step.'));
        }
    }
     
    /**
     * Export all student
     *
     * @return bool
     */
    public function export()
    {
        return Excel::download(new StudentExport, 'student.xlsx');
    }
    
}