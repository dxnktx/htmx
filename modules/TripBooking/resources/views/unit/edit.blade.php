@extends('TripBooking::layout.app')

@section('heading', __('Edit Unit'))

@section('button')
<a href="{{ route('unit_index') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-folder-check"></i> {{ __('View All') }}</a>
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('unit_update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="alert alert-primary d-flex align-items-center m-2" role="alert">
                                <div>
                                    <h5>{{ __('Update unit') }}</h5>
                                    <span>{{ __('You can make any changes on the form below and click [Save] button to update unit information.') }}</span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $item->id }}">                        
                        
                        <div class='row mb-3'>
                            <label for='ten_don_vi' class='col-sm-2 col-form-label'>{{ __('Tên đơn vị') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='ten_don_vi' class='form-control @error('ten_don_vi') is-invalid @enderror' value='{{ old('ten_don_vi', $item->ten_don_vi) }}'/>
                                @error('ten_don_vi') <div class='invalid-feedback'>{{ $message }}</div> @enderror
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