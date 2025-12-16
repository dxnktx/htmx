<h4 class="mb-3">Thông tin liên hệ</h4>
<form action="{{ route('contact_submit') }}" method="post">
    @csrf
    <div class="row mb-3">
        <div class="col-sm-6">
            <label for="name" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="name" placeholder="" value="" required="">
            <div class="invalid-feedback">
                Valid first name is required.
            </div>
        </div>

        <div class="col-sm-6">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" placeholder="" value="" required="">
            <div class="invalid-feedback">
                Valid last name is required.
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-6">
            <label for="email" class="form-label">Địa chỉ Email <span class="text-body-secondary">(Không bắt buộc)</span></label>
            <input type="email" class="form-control" name="email" placeholder="you@example.com">
            <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
            </div>
        </div>

        <div class="col-6">
            <label for="address" class="form-label">Đơn vị công tác/Nơi học/Nơi làm việc</label>
            <input type="text" class="form-control" name="address" placeholder="300A Nguyễn Tất Thành" required="">
            <div class="invalid-feedback">
                Please enter your shipping address.
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <label for="message" class="form-label">Nội dung cần liên hệ</label>
            <textarea name="message" class="form-control" cols="10" rows="5"></textarea>
            <div class="invalid-feedback">
                Please enter your shipping address.
            </div>
        </div>
    </div>

    <div class="col-12">
        <button type="submit" class="w-100 btn btn-primary btn-lg">{{ __('Send Message') }}</button>
    </div>
</form>