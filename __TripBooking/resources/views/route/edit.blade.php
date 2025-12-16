@extends('TripBooking::layout.app')

@section('heading', __('Edit Route'))

@section('button')
<a href="{{ route('route_index') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-folder-check"></i> {{ __('View All') }}</a>
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('route_update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="alert alert-primary d-flex align-items-center m-2" role="alert">
                                <div>
                                    <h5>{{ __('Update route') }}</h5>
                                    <span>{{ __('You can make any changes on the form below and click [Save] button to update route information.') }}</span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $item->id }}">                        
                        
                        <div class='row mb-3'>
                            <label for='ma_tuyen_duong' class='col-sm-2 col-form-label'>{{ __('Mã tuyến đường') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='ma_tuyen_duong' class='form-control @error('ma_tuyen_duong') is-invalid @enderror' value='{{ old('ma_tuyen_duong', $item->ma_tuyen_duong) }}'/>
                                @error('ma_tuyen_duong') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='ten_tuyen_duong' class='col-sm-2 col-form-label'>{{ __('Tên tuyến đường') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='ten_tuyen_duong' class='form-control @error('ten_tuyen_duong') is-invalid @enderror' value='{{ old('ten_tuyen_duong', $item->ten_tuyen_duong) }}'/>
                                @error('ten_tuyen_duong') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='khu_vuc' class='col-sm-2 col-form-label'>{{ __('Khu vực') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='khu_vuc' class='form-control @error('khu_vuc') is-invalid @enderror' value='{{ old('khu_vuc', $item->khu_vuc) }}'/>
                                @error('khu_vuc') <div class='invalid-feedback'>{{ $message }}</div> @enderror
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