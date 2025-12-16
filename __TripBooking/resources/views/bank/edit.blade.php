@extends('TripBooking::layout.app')

@section('heading', __('Edit Bank'))

@section('button')
<a href="{{ route('bank_index') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-folder-check"></i> {{ __('View All') }}</a>
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('bank_update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="alert alert-primary d-flex align-items-center m-2" role="alert">
                                <div>
                                    <h5>{{ __('Update bank') }}</h5>
                                    <span>{{ __('You can make any changes on the form below and click [Save] button to update bank information.') }}</span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $item->id }}">                        
                        
                        <div class='row mb-3'>
                            <label for='ma_ngan_hang' class='col-sm-2 col-form-label'>{{ __('Mã ngân hàng') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='ma_ngan_hang' class='form-control @error('ma_ngan_hang') is-invalid @enderror' value='{{ old('ma_ngan_hang', $item->ma_ngan_hang) }}'/>
                                @error('ma_ngan_hang') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='ten_ngan_hang' class='col-sm-2 col-form-label'>{{ __('Tên ngân hàng') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='ten_ngan_hang' class='form-control @error('ten_ngan_hang') is-invalid @enderror' value='{{ old('ten_ngan_hang', $item->ten_ngan_hang) }}'/>
                                @error('ten_ngan_hang') <div class='invalid-feedback'>{{ $message }}</div> @enderror
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