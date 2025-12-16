<div class='row mb-3 mt-3'>
    <label for='hoan_canh_gia_dinh'
        class='col-sm-2 col-form-label'>{{ __('Hoàn cảnh gia đình') }}</label>
    <div class='col-sm-10'>
        <textarea name='hoan_canh_gia_dinh' cols="30" rows="5" class='form-control @error('hoan_canh_gia_dinh') is-invalid @enderror' placeholder="Mô tả chi tiết hoàn cảnh gia đình (hộ nghèo, cận nghèo, khó khăn, bão lũ, thuộc diện chính sách,..). Vui lòng ghi rõ..." required>{{ old('hoan_canh_gia_dinh', $trip->hoan_canh_gia_dinh) }}</textarea>
        @error('hoan_canh_gia_dinh')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='giay_xac_nhan' class='col-sm-2 col-form-label'>{{ __('Giấy xác nhận') }}</label>
    <div class='col-sm-10'>
        <input type="file" name="giay_xac_nhan" class='form-control @error('giay_xac_nhan') is-invalid @enderror'>
        @error('giay_xac_nhan') <div class='invalid-feedback'>{{ $message }}</div> @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='hoan_canh_ban_than'
        class='col-sm-2 col-form-label'>{{ __('Hoàn cảnh bản thân') }}</label>
    <div class='col-sm-10'>
        <textarea name='hoan_canh_ban_than' cols="30" rows="5" class='form-control @error('hoan_canh_ban_than') is-invalid @enderror' placeholder="Mô tả hoàn cảnh bản thân hiện tại (khuyết tật, mồ côi cha/mẹ, hoặc cả cha lẫn mẹ). Vui lòng ghi rõ..." required>{{ old('hoan_canh_ban_than', $trip->hoan_canh_ban_than) }}</textarea>
        @error('hoan_canh_ban_than')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='thong_tin_nguoi_lien_he'
        class='col-sm-2 col-form-label'>{{ __('Thông tin người liên hệ') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='thong_tin_nguoi_lien_he'
            class='form-control @error('thong_tin_nguoi_lien_he') is-invalid @enderror'
            value='{{ old('thong_tin_nguoi_lien_he', $trip->thong_tin_nguoi_lien_he) }}' placeholder="Họ tên và mối quan hệ với bạn" required/>
        @error('thong_tin_nguoi_lien_he')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='so_dien_thoai_nguoi_than'
        class='col-sm-2 col-form-label'>{{ __('Số điện thoại người thân') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='so_dien_thoai_nguoi_than'
            class='form-control @error('so_dien_thoai_nguoi_than') is-invalid @enderror'
            value='{{ old('so_dien_thoai_nguoi_than', $trip->so_dien_thoai_nguoi_than) }}'
            placeholder='0123456789' required/>
        @error('so_dien_thoai_nguoi_than')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='hanh_ly_mang_theo'
        class='col-sm-2 col-form-label'>{{ __('Hành lý mang theo') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='hanh_ly_mang_theo'
            class='form-control @error('hanh_ly_mang_theo') is-invalid @enderror'
            value='{{ old('hanh_ly_mang_theo', $trip->hanh_ly_mang_theo) }}' placeholder="Balô 5kg/30cm x 20cm, nếu không có thì ghi Không có" required/>
        @error('hanh_ly_mang_theo')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='van_de_suc_khoe'
        class='col-sm-2 col-form-label'>{{ __('Vấn đề sức khỏe') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='van_de_suc_khoe'
            class='form-control @error('van_de_suc_khoe') is-invalid @enderror'
            value='{{ old('van_de_suc_khoe', $trip->van_de_suc_khoe) }}' placeholder="Ghi rõ nếu có vấn đề nào cần lưu ý" required/>
        @error('van_de_suc_khoe')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='tinh_thanh'
        class='col-sm-2 col-form-label'>{{ __('Bạn có nhu cầu về tỉnh nào?') }}</label>
    <div class='col-sm-10'>
        <select name="tinh_thanh"
            class='form-control @error('tinh_thanh') is-invalid @enderror'
            value='{{ old('tinh_thanh', $trip->tinh_thanh) }}' required>
            <option value="">-- Vui lòng chọn --</option>
            @foreach ($stations as $station)
                <option value="{{ $station['tinh_thanh'] }}"
                    @if ($station['tinh_thanh'] == old('tinh_thanh', $trip->tinh_thanh) || $station['tinh_thanh'] == $trip->tinh_thanh) selected="selected" @endif>
                    {{ $station['tinh_thanh'] }}</option>
            @endforeach
        </select>
        @error('tinh_thanh')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>

<div class='row mb-3'>
    <label for='dia_diem_xuong_xe'
        class='col-sm-2 col-form-label'>{{ __('Bạn có nhu cầu xuống xe ở địa điểm nào?') }}</label>
    <div class='col-sm-10'>
        <input type='text' name='dia_diem_xuong_xe'
            class='form-control @error('dia_diem_xuong_xe') is-invalid @enderror'
            value='{{ old('dia_diem_xuong_xe', $trip->dia_diem_xuong_xe) }}' placeholder="Ghi rõ địa điểm và địa chỉ, kèm link Google Map nếu có" required/>
        @error('dia_diem_xuong_xe')
            <div class='invalid-feedback'>{{ $message }}</div>
        @enderror
    </div>
</div>
