<div class='row mb-3 mt-3'>
    <label for='ten_tai_khoan'
        class='col-sm-2 col-form-label'>{{ __('Tên tài khoản') }}</label>
    <div class='col-sm-10'>
        <input type='text' id='ten_tai_khoan' name='ten_tai_khoan'
            class='form-control @error('ten_tai_khoan') is-invalid @enderror'
            value='{{ old('ten_tai_khoan', $user->ten_tai_khoan ?? $user->ho_va_ten) }}' />
        @error('ten_tai_khoan')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='so_tai_khoan'
        class='col-sm-2 col-form-label'>{{ __('Số tài khoản') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='so_tai_khoan'
            class='form-control @error('so_tai_khoan') is-invalid @enderror'
            value='{{ old('so_tai_khoan', $user->so_tai_khoan) }}' />
        @error('so_tai_khoan')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='ten_ngan_hang'
        class='col-sm-2 col-form-label'>{{ __('Tên ngân hàng') }}</label>
    <div class='col-sm-10'>
        <select name="ten_ngan_hang"
            class='form-control @error('ten_ngan_hang') is-invalid @enderror'>
            @foreach ($banks as $bank)
                <option value="{{ $bank['ten_ngan_hang'] }}"
                    @if ($bank['ten_ngan_hang'] == old('ten_ngan_hang', $user->ngan_hang) || $bank['ten_ngan_hang'] == $user->ngan_hang) selected="selected" @endif>
                    {{ $bank['ten_ngan_hang'] }}</option>
            @endforeach
        </select>
        @error('ten_ngan_hang')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='chi_nhanh'
        class='col-sm-2 col-form-label'>{{ __('Chi nhánh') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='chi_nhanh'
            class='form-control @error('chi_nhanh') is-invalid @enderror'
            value='{{ old('chi_nhanh', $user->chi_nhanh) }}'/>
        @error('chi_nhanh')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
<div class='row mb-3'>
    <label for='dia_diem_den' class='col-sm-2 col-form-label'></label>
    <div class='col-sm-10'>
        <input class="form-check-input" type="checkbox" value="1" name="dong_y_cam_ket"
            id="dong_y_cam_ket"
            class='form-control @error('dong_y_cam_ket') is-invalid @enderror'
            value='{{ old('dong_y_cam_ket', $item->dong_y_cam_ket) }}' required>
        <label class="form-check-label" for="dong_y_cam_ket">
            {{ __('Sau khi đọc và tìm hiểu rõ về chương trình, tôi đồng ý đăng ký và cam kết tham gia chương trình') }}
        </label>
        @error('dong_y_cam_ket')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
