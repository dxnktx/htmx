@extends('TripBooking::layout.app')

@section('heading', __('Edit Category'))

@section('button')
<a href="{{ route('category_index') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-folder-check"></i> {{ __('View All') }}</a>
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('category_update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="alert alert-primary d-flex align-items-center m-2" role="alert">
                                <div>
                                    <h5>{{ __('Update category') }}</h5>
                                    <span>{{ __('You can make any changes on the form below and click [Save] button to update category information.') }}</span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $item->id }}">                        
                        
                        <div class='row mb-3'>
                            <label for='name' class='col-sm-2 col-form-label'>{{ __('Name') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='name' class='form-control @error('name') is-invalid @enderror' value='{{ old('name', $item->name) }}'/>
                                @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='slug' class='col-sm-2 col-form-label'>{{ __('Slug') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='slug' class='form-control @error('slug') is-invalid @enderror' value='{{ old('slug', $item->slug) }}'/>
                                @error('slug') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='' class='col-sm-2 col-form-label'>{{ __('Existing Photo') }}</label>
                            <div class='col-sm-10'>
                                <img src="{{ asset('storage/uploads/post_type/' . ($item->image ?? '../default.png')) }}" height="50px">
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='image' class='col-sm-2 col-form-label'>{{ __('Image') }}</label>
                            <div class='col-sm-10'>
                                <input type="file" name="image" class='form-control @error('image') is-invalid @enderror'>
                                @error('image') <div class='invalid-feedback'>{{ $message }}</div> @enderror
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