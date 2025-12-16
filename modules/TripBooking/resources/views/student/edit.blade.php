@extends('TripBooking::layout.app')

@section('heading', __('Edit Student'))

@section('button')
<a href="{{ route('student_index') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-folder-check"></i> {{ __('View All') }}</a>
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('student_update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="alert alert-primary d-flex align-items-center m-2" role="alert">
                                <div>
                                    <h5>{{ __('Update student') }}</h5>
                                    <span>{{ __('You can make any changes on the form below and click [Save] button to update student information.') }}</span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $item->id }}">                        
                        
                        <div class='row mb-3'>
                            <label for='ma_sinh_vien' class='col-sm-2 col-form-label'>{{ __('Mã sinh viên') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='ma_sinh_vien' class='form-control @error('ma_sinh_vien') is-invalid @enderror' value='{{ old('ma_sinh_vien', $item->ma_sinh_vien) }}'/>
                                @error('ma_sinh_vien') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='ten_sinh_vien' class='col-sm-2 col-form-label'>{{ __('Tên sinh viên') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='ten_sinh_vien' class='form-control @error('ten_sinh_vien') is-invalid @enderror' value='{{ old('ten_sinh_vien', $item->ten_sinh_vien) }}'/>
                                @error('ten_sinh_vien') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label for='don_vi_dao_tao' class='col-sm-2 col-form-label'>{{ __('Đơn vị đào tạo') }}</label>
                            <div class='col-sm-10'>
                                <select name="don_vi_dao_tao" class='form-control @error('don_vi_dao_tao') is-invalid @enderror' value='{{ old('don_vi_dao_tao', $item->don_vi_dao_tao) }}'>
                                    @foreach ($units as $unit)                                        
                                        <option value="{{ $unit['ma_don_vi'] }}"
                                            @if ($unit['ma_don_vi'] == old('don_vi_dao_tao', $item->don_vi_dao_tao) || $unit['ma_don_vi'] == $item->don_vi_dao_tao)
                                                selected="selected"
                                            @endif
                                        >{{ $unit['ten_don_vi'] }}</option>
                                    @endforeach
                                </select>
                                @error('don_vi_dao_tao') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='khoa_bo_mon' class='col-sm-2 col-form-label'>{{ __('Khoa/Bộ môn') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='khoa_bo_mon' class='form-control @error('khoa_bo_mon') is-invalid @enderror' value='{{ old('khoa_bo_mon', $item->khoa_bo_mon) }}'/>
                                @error('khoa_bo_mon') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='sinh_vien_nam_thu' class='col-sm-2 col-form-label'>{{ __('Sinh viên năm thứ') }}</label>
                            <div class='col-sm-10'>
                                <input type='number' min='1' max='3' name='sinh_vien_nam_thu' class='form-control @error('sinh_vien_nam_thu') is-invalid @enderror' value='{{ old('sinh_vien_nam_thu', $item->sinh_vien_nam_thu ?? 1) }}'/>
                                @error('sinh_vien_nam_thu') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='chuc_vu_trong_doan_doi' class='col-sm-2 col-form-label'>{{ __('Chức vụ trong đoàn đội') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='chuc_vu_trong_doan_doi' class='form-control @error('chuc_vu_trong_doan_doi') is-invalid @enderror' value='{{ old('chuc_vu_trong_doan_doi', $item->chuc_vu_trong_doan_doi) }}'/>
                                @error('chuc_vu_trong_doan_doi') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection