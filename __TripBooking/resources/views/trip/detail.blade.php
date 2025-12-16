@extends('TripBooking::layout.guest')

@section('heading', __('Trip Detail'))

@section('button')
    <a href="{{ route('trip_index') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-folder-check"></i>
        {{ __('View All') }}</a>
@endsection

@section('main_content')
    <!-- Nav tabs -->
        
    @if(isset($user) && isset($student) && isset($trip))
    <div class="container pb-2">
        @switch($trip->status)
            @case(1)
                <div class="alert alert-success" role="alert">
                    {{ __('Congratulations. This application has been approved. Please continue to check news updates for your trip on the website.') }}
                </div>
            @break

            @case(2)
                <div class="alert alert-primary" role="alert">
                    {{ __('Sorry. Your registration has been rejected. Please double check your login information and try again later.') }}
                </div>
            @break

            @default
                <div class="alert alert-warning" role="alert">
                    {{ __('Thank you for your application, we are reviewing it and will get back to you as soon as possible. You can edit your application here.') }}
                    <a href="{{ route('trip_create') }}">{{ __('Edit') }}</a>
                </div>
        @endswitch
        <div class="row mt-3">
            <h3>Thông tin cá nhân</h3>

            <div class='col-md-6'>
                <label for='cccd_mat_truoc' class='col-md-12 col-form-label'>{{ __('CCCD mặt trước') }}</label>
                <div class='col-md-12'>
                    <img src="{{ asset('storage/uploads/user/' . ($user->cccd_mat_truoc ?? '../default.png')) }}"
                        class="w-75">
                </div>
            </div>
            <div class='col-md-6'>
                <label for='cccd_mat_sau' class='col-md-12 col-form-label'>{{ __('CCCD mặt sau') }}</label>
                <div class='col-md-12'>
                    <img src="{{ asset('storage/uploads/user/' . ($user->cccd_mat_sau ?? '../default.png')) }}"
                        class="w-75">
                </div>
            </div>

            <div class='col-md-4'>
                <label for='ho_va_ten' class='col-md-12 col-form-label'>{{ __('Họ và tên') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='ho_va_ten' class='form-control' value='{{ $user->ho_va_ten }}'
                        disabled />
                </div>
            </div>
            <div class='col-md-4'>
                <label for='gioi_tinh' class='col-md-12 col-form-label'>{{ __('Giới tính') }}</label>
                <div class='col-md-12'>
                    <select name="gioi_tinh" class='form-control' disabled>
                        <option value="1" @if ($user->gioi_tinh == '1') selected="selected" @endif>Nam</option>
                        <option value="0" @if ($user->gioi_tinh == '0') selected="selected" @endif>Nữ</option>
                    </select>
                    @error('gioi_tinh')
                        <div class='invalid-feedback'>{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class='col-md-4'>
                <label for='ngay_sinh' class='col-md-12 col-form-label'>{{ __('Ngày sinh') }}</label>
                <div class='col-md-12'>
                    <input type='date' name='ngay_sinh' class='form-control' value='{{ $user->ngay_sinh }}'
                        disabled />
                </div>
            </div>
            <div class='col-md-4'>
                <label for='so_cccd' class='col-md-12 col-form-label'>{{ __('Số CCCD') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='so_cccd' class='form-control' value='{{ $user->so_cccd }}' disabled />
                </div>
            </div>
            <div class='col-md-4'>
                <label for='so_dien_thoai' class='col-md-12 col-form-label'>{{ __('Số điện thoại') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='so_dien_thoai' class='form-control' value='{{ $user->so_dien_thoai }}'
                        disabled />
                </div>
            </div>
            <div class='col-md-4'>
                <label for='email' class='col-md-12 col-form-label'>{{ __('Địa chỉ email') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='email' class='form-control' value='{{ $user->email }}' disabled />
                </div>
            </div>
            <div class='col-md-6'>
                <label for='dia_chi' class='col-md-12 col-form-label'>{{ __('Địa chỉ') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='dia_chi' class='form-control' value='{{ $user->dia_chi }}' disabled />
                </div>
            </div>
            <div class='col-md-6'>
                <label for='noi_o_hien_tai' class='col-md-12 col-form-label'>{{ __('Nơi ở hiện tại') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='noi_o_hien_tai' class='form-control'
                        value='{{ $user->noi_o_hien_tai }}' disabled />
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <h3>Thông tin sinh viên</h3>

            <div class='col-md-4'>
                <label for='ma_sinh_vien' class='col-md-12 col-form-label'>{{ __('Mã sinh viên') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='ma_sinh_vien' class='form-control' value='{{ $student->ma_sinh_vien }}'
                        disabled />
                </div>
            </div>
            <div class='col-md-4'>
                <label for='ten_sinh_vien' class='col-md-12 col-form-label'>{{ __('Họ tên sinh viên') }}</label>
                <div class='col-md-12'>
                    <input type='text' id='ten_sinh_vien' name='ten_sinh_vien' class='form-control'
                        value='{{ $student->ten_sinh_vien }}' disabled />
                </div>
            </div>
            <div class='col-md-4'>
                <label for='don_vi_dao_tao' class='col-md-12 col-form-label'>{{ __('Đơn vị đào tạo') }}</label>
                <div class='col-md-12'>
                    <select name="don_vi_dao_tao" class='form-control' disabled>
                        <option value="{{ $student->don_vi_dao_tao }}">{{ $student->don_vi_dao_tao }}</option>
                    </select>
                </div>
            </div>
            <div class='col-md-4'>
                <label for='khoa_bo_mon' class='col-md-12 col-form-label'>{{ __('Khoa/Bộ môn') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='khoa_bo_mon' class='form-control'
                        value='{{ $student->khoa_bo_mon }}' disabled />
                </div>
            </div>
            <div class='col-md-4'>
                <label for='sinh_vien_nam_thu' class='col-md-12 col-form-label'>{{ __('Sinh viên năm thứ') }}</label>
                <div class='col-md-12'>
                    <input type='number' name='sinh_vien_nam_thu' class='form-control'
                        value='{{ $student->sinh_vien_nam_thu }}' disabled />
                </div>
            </div>
            <div class='col-md-4'>
                <label for='sinh_vien_nam_thu' class='col-md-12 col-form-label'>{{ __('Sinh viên năm thứ') }}</label>
                <div class='col-md-12'>
                    <input type='number' name='sinh_vien_nam_thu' class='form-control'
                        value='{{ $student->sinh_vien_nam_thu }}' disabled />
                </div>
            </div>
            <div class='col-md-4'>
                <label for='diem_trung_binh' class='col-md-12 col-form-label'>{{ __('Điểm trung bình') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='diem_trung_binh' class='form-control'
                        value='{{ $student->diem_trung_binh }}' disabled />
                </div>
            </div>
            <div class='col-md-4'>
                <label for='thanh_tich_hoat_dong_xa_hoi'
                    class='col-md-12 col-form-label'>{{ __('Thành tích hoạt động xã hội') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='thanh_tich_hoat_dong_xa_hoi' class='form-control'
                        value='{{ $student->thanh_tich_hoat_dong_xa_hoi }}' disabled />
                </div>
            </div>
            <div class='col-md-4'>
                <label for='danh_hieu_5_tot' class='col-md-12 col-form-label'>{{ __('Sinh viên 5 tốt') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='danh_hieu_5_tot' class='form-control'
                        value='{{ $student->danh_hieu_5_tot }}' disabled />
                </div>
            </div>

        </div>

        <div class="row mt-3">
            <h3>Thông tin chuyến đi</h3>

            <div class='col-md-3 col-6'>
                <label for='tinh_thanh' class='col-md-12 col-form-label'>{{ __('Điểm đến') }}</label>
                <div class='col-md-12'>
                    <select name="tinh_thanh" class='form-control' disabled>
                        <option value="{{ $trip->tinh_thanh }}">{{ $trip->tinh_thanh }}</option>
                    </select>
                </div>
            </div>
            <div class='col-md-3 col-6'>
                <label for='dia_diem_xuong_xe' class='col-md-12 col-form-label'>{{ __('Địa điểm xuống xe') }}</label>
                <div class='col-md-12'>
                    <select name="dia_diem_xuong_xe" class='form-control' disabled>
                        <option value="{{ $trip->dia_diem_xuong_xe }}">{{ $trip->dia_diem_xuong_xe }}</option>
                    </select>
                </div>
            </div>

            <div class='col-md-3 col-6'>
                <label for='hanh_ly_mang_theo' class='col-md-12 col-form-label'>{{ __('Hành lý mang theo') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='hanh_ly_mang_theo' class='form-control'
                        value='{{ $trip->hanh_ly_mang_theo }}' disabled />
                </div>
            </div>

            <div class='col-md-3 col-6'>
                <label for='so_dien_thoai_nguoi_than'
                    class='col-md-12 col-form-label'>{{ __('Số điện thoại người thân') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='so_dien_thoai_nguoi_than' class='form-control'
                        value='{{ $trip->so_dien_thoai_nguoi_than }}' disabled />
                </div>
            </div>

            <div class='col-md-4'>
                <label for='hoan_canh_gia_dinh'
                    class='col-md-12 col-form-label'>{{ __('Hoàn cảnh gia đình') }}</label>
                <div class='col-md-12'>
                    <textarea name="hoan_canh_gia_dinh" class="form-control" cols="30" rows="5" disabled>{{ $trip->hoan_canh_gia_dinh }}</textarea>
                </div>
            </div>

            <div class='col-md-4'>
                <label for='hoan_canh_ban_than'
                    class='col-md-12 col-form-label'>{{ __('Hoàn cảnh bản thân') }}</label>
                <div class='col-md-12'>
                    <textarea name="hoan_canh_ban_than" class="form-control" cols="30" rows="5" disabled>{{ $trip->hoan_canh_ban_than }}</textarea>
                </div>
            </div>

            <div class='col-md-4'>
                <label for='van_de_suc_khoe' class='col-md-12 col-form-label'>{{ __('Vấn đề sức khỏe') }}</label>
                <div class='col-md-12'>
                    <textarea name="van_de_suc_khoe" class="form-control" cols="30" rows="5" disabled>{{ $trip->van_de_suc_khoe }}</textarea>
                </div>
            </div>

        </div>

        <div class="row mt-3">
            <h3>Tài khoản ngân hàng</h3>
            <div class='col-md-3 col-6'>
                <label for='ten_tai_khoan' class='col-md-12 col-form-label'>{{ __('Tên tài khoản') }}</label>
                <div class='col-md-12'>
                    <input type='text' id='ten_tai_khoan' name='ten_tai_khoan' class='form-control'
                        value='{{ $user->ten_tai_khoan }}' disabled />

                </div>
            </div>

            <div class='col-md-3 col-6'>
                <label for='so_tai_khoan' class='col-md-12 col-form-label'>{{ __('Số tài khoản') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='so_tai_khoan' class='form-control'
                        value='{{ $user->so_tai_khoan }}' disabled />
                </div>
            </div>

            <div class='col-md-3 col-6'>
                <label for='ngan_hang' class='col-md-12 col-form-label'>{{ __('Tên ngân hàng') }}</label>
                <div class='col-md-12'>
                    <select name="ngan_hang" class='form-control' disabled>
                        <option value="{{ $user->ngan_hang }}">{{ $user->ngan_hang }}</option>
                    </select>
                </div>
            </div>

            <div class='col-md-3 col-6'>
                <label for='chi_nhanh' class='col-md-12 col-form-label'>{{ __('Chi nhánh') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='chi_nhanh' class='form-control' value='{{ $user->chi_nhanh }}'
                        disabled />
                </div>
            </div>

        </div>
        @if (isset($trip->giay_xac_nhan))
            <div class='col-md-12'>
                <label for='giay_xac_nhan' class='col-md-12 col-form-label'>{{ __('Giấy chứng nhận') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='giay_xac_nhan' class='form-control'
                        value='{{ asset('storage/uploads/trip/' . $trip->giay_xac_nhan) }}' disabled />
                </div>
                <div class="col-md-12">
                    @if(substr($trip->giay_xac_nhan, -3) == 'pdf')
                        <embed src="{{ asset('storage/uploads/trip/' . $trip->giay_xac_nhan) }}" class="w-100" height="999px" />
                    @else
                        <img src="{{ asset('storage/uploads/trip/' . $trip->giay_xac_nhan) }}" class="form-control w-100">
                    @endif
                </div>
            </div>
        @else
            <div class='col-md-12'>

                <label for='giay_xac_nhan' class='col-md-12 col-form-label'>{{ __('Giấy chứng nhận') }}</label>
                <div class='col-md-12'>
                    <input type='text' name='giay_xac_nhan' class='form-control' value='Không có' disabled />
                </div>
            </div>
        @endif

        @can('edit-trip')
            <div class="row my-3 text-center">
                <a href="{{ route('trip_delete', $trip->id) }}" class="col-md-2 col-6 mx-2 btn btn-danger btn-sm"
                    onClick="return confirm('{{ __('Are you sure?') }}');">{{ __('Delete') }}</a>
                <a href="{{ route('trip_approve', $trip->id) }}"
                    class="col-md-2 col-6 mx-2 btn btn-success btn-sm">{{ __('Approve') }}</a>
                <a href="{{ route('trip_reject', $trip->id) }}"
                    class="col-md-2 col-6 mx-2 btn btn-warning btn-sm">{{ __('Reject') }}</a>
                <a href="{{ route('trip_reset', $trip->id) }}"
                    class="col-md-2 col-6 mx-2 btn btn-primary btn-sm">{{ __('Reset') }}</a>
            </div>
        @endcan
    </div>
    @else
    <div class="alert alert-danger text-center fs-5">
        Không tồn tại dữ liệu của sinh viên này.
    </div>
    @endif
@endsection
