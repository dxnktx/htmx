
<input type='text' name='id' value='{{ old('id', $user->id) }}' hidden/>
<div class='row mb-3 mt-3'>
    <label for='ho_va_ten'
        class='col-sm-2 col-form-label'>{{ __('Họ và tên') }}</label>
    <div class='col-sm-10'>
        <input type='text' id='ho_va_ten' name='ho_va_ten'
            class='form-control @error('ho_va_ten') is-invalid @enderror'
            value='{{ old('ho_va_ten', $user->ho_va_ten) }}'
            onchange="myFunction()" required/>
        @error('ho_va_ten')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
<div class='row mb-3'>
    <label for='gioi_tinh'
        class='col-sm-2 col-form-label'>{{ __('Giới tính') }}</label>
    <div class='col-sm-10'>
        <select name="gioi_tinh" class='form-control @error('gioi_tinh') is-invalid @enderror' required>
            <option value="1" @if (old('gioi_tinh') == '1' || $user->gioi_tinh == '1') selected="selected" @endif>Nam</option>
            <option value="0" @if (old('gioi_tinh') == '0' || $user->gioi_tinh == '0') selected="selected" @endif>Nữ</option>
        </select>
        @error('gioi_tinh')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
<div class='row mb-3'>
    <label for='ngay_sinh'
        class='col-sm-2 col-form-label'>{{ __('Ngày sinh') }}</label>
    <div class='col-sm-10'>
        <input type='date' name='ngay_sinh'
            class='form-control @error('ngay_sinh') is-invalid @enderror'
            value='{{ old('ngay_sinh', $user->ngay_sinh) }}' required/>
        @error('ngay_sinh')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
<div class='row mb-3'>
    <label for='so_cccd' class='col-sm-2 col-form-label'>{{ __('Số CCCD') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='so_cccd'
            class='form-control @error('so_cccd') is-invalid @enderror'
            value='{{ old('so_cccd', $user->so_cccd) }}' required/>
        @error('so_cccd')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
<div class='row mb-3'>
    <label for='so_dien_thoai'
        class='col-sm-2 col-form-label'>{{ __('Số điện thoại') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='so_dien_thoai'
            class='form-control @error('so_dien_thoai') is-invalid @enderror'
            value='{{ old('so_dien_thoai', $user->so_dien_thoai) }}' required/>
        @error('so_dien_thoai')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
<div class='row mb-3'>
    <label for='email'
        class='col-sm-2 col-form-label'>{{ __('Địa chỉ email') }}</label>
    <div class='col-sm-10'>
        <input type='email' name='email'
            class='form-control @error('email') is-invalid @enderror'
            value='{{ old('email', $user->email) }}'
            placeholder='ldoe@example.com' required/>
        @error('email')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
<div class='row mb-3'>
    <label for='dia_chi' class='col-sm-2 col-form-label'>{{ __('Địa chỉ') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='dia_chi'
            class='form-control @error('dia_chi') is-invalid @enderror'
            value='{{ old('dia_chi', $user->dia_chi) }}'
            placeholder='đường Mạc Đĩnh Chi, phường Đông Hoà, TP. Dĩ An, Bình Dương' required/>
        @error('dia_chi')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
<div class='row mb-3'>
    <label for='noi_o_hien_tai'
        class='col-sm-2 col-form-label'>{{ __('Nơi ở hiện tại') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='noi_o_hien_tai'
            class='form-control @error('noi_o_hien_tai') is-invalid @enderror'
            value='{{ old('noi_o_hien_tai', $user->noi_o_hien_tai) }}'
            placeholder='đường Mạc Đĩnh Chi, phường Đông Hoà, TP. Dĩ An, Bình Dương' required/>
        @error('noi_o_hien_tai')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='cccd_mat_truoc' class='col-sm-2 col-form-label'>{{ __('CCCD mặt trước') }}</label>
    <div class='col-sm-10'>
        <input type="file" accept=".jpg,.png" name="cccd_mat_truoc" class='form-control @error('cccd_mat_truoc') is-invalid @enderror' required>
        @error('cccd_mat_truoc') <div class='invalid-feedback'>{{ $message }}</div> @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='cccd_mat_sau' class='col-sm-2 col-form-label'>{{ __('CCCD mặt sau') }}</label>
    <div class='col-sm-10'>
        <input type="file" accept=".jpg,.png" name="cccd_mat_sau" class='form-control @error('cccd_mat_sau') is-invalid @enderror' required>
        @error('cccd_mat_sau') <div class='invalid-feedback'>{{ $message }}</div> @enderror
    </div>
</div>
