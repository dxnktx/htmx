<div class='row mb-3 mt-3'>
    <label for='ma_sinh_vien'
        class='col-sm-2 col-form-label'>{{ __('Mã sinh viên') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='ma_sinh_vien'
            class='form-control @error('ma_sinh_vien') is-invalid @enderror'
            value='{{ old('ma_sinh_vien', $student->ma_sinh_vien) }}' required @auth disabled @endauth/>
        @error('ma_sinh_vien')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
<!--
<div class='row mb-3'>
    <label for='ten_sinh_vien'
        class='col-sm-2 col-form-label'>{{ __('Họ tên sinh viên') }}</label>
    <div class='col-sm-10'>
        <input type='text' id='ten_sinh_vien' name='ten_sinh_vien'
            class='form-control @error('ten_sinh_vien') is-invalid @enderror'
            value='{{ old('ten_sinh_vien', $student->ten_sinh_vien ?? $user->ho_va_ten) }}' />
        @error('ten_sinh_vien')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
-->
<div class='row mb-3'>
    <label for='don_vi_dao_tao'
        class='col-sm-2 col-form-label'>{{ __('Đơn vị đào tạo') }}</label>
    <div class='col-sm-10'>
        <select name="don_vi_dao_tao"
            class='form-control @error('don_vi_dao_tao') is-invalid @enderror'
            value='{{ old('don_vi_dao_tao', $student->don_vi_dao_tao) }}' required>
            <option value="">-- Vui lòng chọn --</option>
            @foreach ($units as $unit)
                <option value="{{ $unit['ten_don_vi'] }}"
                    @if (
                        $unit['ten_don_vi'] == old('don_vi_dao_tao', $student->don_vi_dao_tao) ||
                            $unit['ten_don_vi'] == $student->don_vi_dao_tao) selected="selected" @endif>
                    {{ $unit['ten_don_vi'] }}</option>
            @endforeach
        </select>
        @error('don_vi_dao_tao')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
<div class='row mb-3'>
    <label for='khoa_bo_mon'
        class='col-sm-2 col-form-label'>{{ __('Khoa/bộ môn') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='khoa_bo_mon'
            class='form-control @error('khoa_bo_mon') is-invalid @enderror'
            value='{{ old('khoa_bo_mon', $student->khoa_bo_mon) }}'
            placeholder='Công nghệ Thông tin' required/>
        @error('khoa_bo_mon')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
<div class='row mb-3'>
    <label for='sinh_vien_nam_thu'
        class='col-sm-2 col-form-label'>{{ __('Sinh viên năm thứ') }}</label>
    <div class='col-sm-10'>
        <input type='number' min='1' max='5' name='sinh_vien_nam_thu'
            class='form-control @error('sinh_vien_nam_thu') is-invalid @enderror'
            value='{{ old('sinh_vien_nam_thu', $student->sinh_vien_nam_thu) }}' required/>
        @error('sinh_vien_nam_thu')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
<div class='row mb-3'>
    <label for='diem_trung_binh'
        class='col-sm-2 col-form-label'>{{ __('Điểm trung bình tích lũy') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='diem_trung_binh'
            class='form-control @error('diem_trung_binh') is-invalid @enderror'
            value='{{ old('diem_trung_binh', $student->diem_trung_binh) }}' required/>
        @error('diem_trung_binh')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
<div class='row mb-3'>
    <label for='thanh_tich_hoat_dong_xa_hoi'
        class='col-sm-2 col-form-label'>{{ __('Thành tích hoạt động xã hội') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='thanh_tich_hoat_dong_xa_hoi'
            class='form-control @error('thanh_tich_hoat_dong_xa_hoi') is-invalid @enderror'
            value='{{ old('thanh_tich_hoat_dong_xa_hoi', $student->thanh_tich_hoat_dong_xa_hoi ?? 'Không có') }}' />
        @error('thanh_tich_hoat_dong_xa_hoi')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='danh_hieu_5_tot'
        class='col-sm-2 col-form-label'>{{ __('Danh hiệu sinh viên 5 tốt') }}</label>
    <div class='col-sm-10'>
        <select name="danh_hieu_5_tot"
            class='form-control @error('danh_hieu_5_tot') is-invalid @enderror'
            value='{{ old('danh_hieu_5_tot', $student->danh_hieu_5_tot) }}' required>
            @php $medals = array( 'Không có', 'Cấp trường', 'Cấp ĐHQG-HCM', 'Cấp TP.HCM', 'Khác'); @endphp
            @foreach ($medals as $medal)
                <option value="{{ $medal }}" @if ($medal == old('danh_hieu_5_tot', $student->danh_hieu_5_tot) || $medal == $student->danh_hieu_5_tot) selected="selected" @endif>
                    {{ $medal }}
                </option>
            @endforeach
        </select>
        @error('danh_hieu_5_tot')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
