<?php

namespace Modules\TripBooking\src\Repositories\Trip;

use Modules\TripBooking\src\Models\Trip;
use Modules\TripBooking\src\Filters\TripFilter;
use Modules\TripBooking\src\Http\Requests\Trip\SearchTripRequest;
use Modules\TripBooking\src\Repositories\BaseRepository;
use Modules\TripBooking\src\Models\Student;
use Modules\Authetication\src\Models\User;

use Modules\TripBooking\src\Exports\TripExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TripRepository extends BaseRepository implements TripRepositoryInterface
{
    protected $model;

    public function __construct(Trip $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        try {
            DB::transaction(function () use ($request) {

                $trip = $this->model->where('ma_sinh_vien', $request->ma_sinh_vien)->firstOrNew();

                if ($request->hasFile('giay_xac_nhan')) {

                    if (is_file(public_path('storage/uploads/trip/' . $trip->giay_xac_nhan))) {
                        unlink(public_path('storage/uploads/trip/' . $trip->giay_xac_nhan));
                    }

                    $ext = $request->file('giay_xac_nhan')->extension();
                    $final_name = 'giay_xac_nhan_' . time() . '.' . $ext;

                    $request->file('giay_xac_nhan')->move(public_path('storage/uploads/trip/'), $final_name);
                    //dd($ext, $final_name);
                    $trip->giay_xac_nhan = $final_name;
                }

                $trip->ma_sinh_vien = $request->ma_sinh_vien;
                $trip->hoan_canh_gia_dinh = $request->hoan_canh_gia_dinh;
                $trip->hoan_canh_ban_than = $request->hoan_canh_ban_than;
                $trip->thong_tin_nguoi_lien_he = $request->thong_tin_nguoi_lien_he;
                $trip->so_dien_thoai_nguoi_than = $request->so_dien_thoai_nguoi_than;
                $trip->hanh_ly_mang_theo = $request->hanh_ly_mang_theo;
                $trip->van_de_suc_khoe = $request->van_de_suc_khoe;
                $trip->tinh_thanh = $request->tinh_thanh;
                $trip->dia_diem_xuong_xe = $request->dia_diem_xuong_xe;
                $trip->dong_y_cam_ket = $request->dong_y_cam_ket;

                $student = Student::where('ma_sinh_vien', $request->ma_sinh_vien)->firstOrNew();
                $student->ma_sinh_vien = $request->ma_sinh_vien;
                $student->ten_sinh_vien = $request->ho_va_ten;
                $student->don_vi_dao_tao = $request->don_vi_dao_tao;
                $student->khoa_bo_mon = $request->khoa_bo_mon;
                $student->sinh_vien_nam_thu = $request->sinh_vien_nam_thu;
                $student->diem_trung_binh = $request->diem_trung_binh;
                $student->thanh_tich_hoat_dong_xa_hoi = $request->thanh_tich_hoat_dong_xa_hoi;
                $student->danh_hieu_5_tot = $request->danh_hieu_5_tot;

                $user = User::where('id', $request->id)->firstOrNew();
                $user->username = $user->username ?? $request->ma_sinh_vien;
                $user->name = $user->name ?? $request->ho_va_ten;
                $user->password = $user->password ?? Hash::make(str_replace('-', '', $request->ngay_sinh));
                $user->ma_sinh_vien = $request->ma_sinh_vien;
                $user->ho_va_ten = $request->ho_va_ten;
                $user->gioi_tinh = $request->gioi_tinh;
                $user->ngay_sinh = $request->ngay_sinh;
                $user->so_cccd = $request->so_cccd;
                $user->so_dien_thoai = $request->so_dien_thoai;
                $user->email = $request->email;
                $user->dia_chi = $request->dia_chi;
                $user->noi_o_hien_tai = $request->noi_o_hien_tai;
                $user->so_tai_khoan = $request->so_tai_khoan;
                $user->ten_tai_khoan = $request->ten_tai_khoan;
                $user->ngan_hang = $request->ten_ngan_hang;
                $user->chi_nhanh = $request->chi_nhanh;

                if ($request->hasFile('cccd_mat_truoc')) {

                    if (is_file(public_path('storage/uploads/user/' . $user->cccd_mat_truoc))) {
                        unlink(public_path('storage/uploads/user/' . $user->cccd_mat_truoc));
                    }

                    $ext = $request->file('cccd_mat_truoc')->extension();
                    $final_name = 'cccd_mat_truoc_' . time() . '.' . $ext;

                    $request->file('cccd_mat_truoc')->move(public_path('storage/uploads/user/'), $final_name);

                    $user->cccd_mat_truoc = $final_name;
                }

                if ($request->hasFile('cccd_mat_sau')) {

                    if (is_file(public_path('storage/uploads/user/' . $user->cccd_mat_sau))) {
                        unlink(public_path('storage/uploads/user/' . $user->cccd_mat_sau));
                    }

                    $ext = $request->file('cccd_mat_sau')->extension();
                    $final_name = 'cccd_mat_sau_' . time() . '.' . $ext;

                    $request->file('cccd_mat_sau')->move(public_path('storage/uploads/user/'), $final_name);

                    $user->cccd_mat_sau = $final_name;
                }
                $rs1 = $trip->save();
                $rs2 = $student->save();
                $rs3 = $user->save();
            });
        } catch (\Exception $e) {
            Log::error('Insert failed', ['exception' => $e->getMessage()]);
            return redirect()->back()->with('error', __('There is some error in trip step.'));
        }
    }

    /**
     * Search trip by keyword
     *
     * @return Trips
     */
    public function search(SearchTripRequest $request)
    {
        return $this->model->filter(new TripFilter($request))->paginate(10);
    }

    /**
     * Export all trip
     *
     * @return bool
     */
    public function export()
    {
        return Excel::download(new TripExport, 'trip.xlsx');
    }
}
