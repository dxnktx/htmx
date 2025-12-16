<?php

namespace Modules\TripBooking\src\Http\Requests\Trip;

use Modules\TripBooking\src\Http\Requests\BaseFormRequest;

class UpdateTripRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'ma_sinh_vien' => 'required',
            'don_vi_dao_tao' => 'required',
            'khoa_bo_mon' => 'required',
            'sinh_vien_nam_thu' => 'required',

            'thong_tin_nguoi_lien_he' => 'required',
            'so_dien_thoai_nguoi_than' => 'required',
            'tinh_thanh' => 'required',
            'dia_diem_xuong_xe' => 'required',
            'dong_y_cam_ket' => 'required',

            'ho_va_ten' => 'required',
            'gioi_tinh' => 'required',
            'so_cccd' => 'required',
            'ngay_sinh' => 'required',
            'cccd_mat_truoc' => 'required|mimes:jpeg,png',
            'cccd_mat_sau' => 'required|mimes:jpeg,png',
            'so_dien_thoai' => 'required',
            'email' => 'required|email',
            'dia_chi' => 'required',
            'noi_o_hien_tai' => 'required',
        ]);
    }

   public function messages()
   {
        return array_merge(parent::messages(), [
            'ma_sinh_vien.required' => 'Mã sinh viên không được để trống.',
            'don_vi_dao_tao.required' => 'Đơn vị đào tạo không được để trống.',
            'khoa_bo_mon.required' => 'Khoa/bộ môn không được để trống.',
            'sinh_vien_nam_thu.required' => 'Sinh viên năm thứ mấy không được để trống.',
            'thong_tin_nguoi_lien_he.required' => 'Thông tin người liên hệ không được để trống.',
            'so_dien_thoai_nguoi_than.required' => 'Số điện thoại người thân không được để trống.',
            'tinh_thanh.required' => 'Tỉnh thành đi đến không được để trống.',
            'dia_diem_xuong_xe.required' => 'Địa điểm xuống xe không được để trống.',
            'ho_va_ten.required' => 'Họ và tên không được để trống.',
            'gioi_tinh.required' => 'Giới tính không được để trống.',
            'so_cccd.required' => 'Số CCCD không được để trống.',
            'ngay_sinh.required' => 'Ngày sinh không được để trống.',
            'cccd_mat_truoc.required' => 'Bạn chưa tải lên CCCD mặt trước.',
            'cccd_mat_sau.required' => 'Bạn chưa tải lên CCCD mặt sau.',
            'cccd_mat_truoc.mimes' => 'Định dang hình ảnh CCCD mặt trước không đúng, yêu cầu phải là hình JPG hoặc PNG.',
            'cccd_mat_sau.mimes' => 'Định dang hình ảnh CCCD mặt trước không đúng, yêu cầu phải là hình JPG hoặc PNG.',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống.',
            'email.required' => 'Địa chỉ email không được để trống.',
            'dia_chi.required' => 'Địa chỉ không được để trống.',
            'noi_o_hien_tai.required' => 'Nơi ở hiện tại không được để trống.',
            'dong_y_cam_ket.required' => 'Bạn chưa đồng ý cam kết nên không thể đăng ký.',  
        ]);
   }

   public function filters()
   {
       return array_merge(parent::messages(), [
            
       ]);
   }
}
