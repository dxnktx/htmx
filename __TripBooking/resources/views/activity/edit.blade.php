@extends('TripBooking::layout.app')

@section('heading', __('Edit Activity'))

@section('button')
<a href="{{ route('activity_index') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-folder-check"></i> {{ __('View All') }}</a>
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('activity_update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="alert alert-primary d-flex align-items-center m-2" role="alert">
                                <div>
                                    <h5>{{ __('Update activity') }}</h5>
                                    <span>{{ __('You can make any changes on the form below and click [Save] button to update activity information.') }}</span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $item->id }}">                        
                        
                        <div class='row mb-3'>
                            <label for='heading' class='col-sm-2 col-form-label'>{{ __('Heading') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='heading' class='form-control @error('heading') is-invalid @enderror' value='{{ old('heading', $item->heading) }}'/>
                                @error('heading') <div class='invalid-feedback'>{{ $message }}</div> @enderror
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
                            <label for='short_description' class='col-sm-2 col-form-label'>{{ __('Short Description') }}</label>
                            <div class='col-sm-10'>
                                <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" cols="30" rows="3">{{ old('short_description', $item->short_description) }}</textarea>
                                @error('short_description') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='description' class='col-sm-2 col-form-label'>{{ __('Description') }}</label>
                            <div class='col-sm-10'>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ old('description', $item->description) }}</textarea>
                                @error('description') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='total_view' class='col-sm-2 col-form-label'>{{ __('Total View') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='total_view' class='form-control @error('total_view') is-invalid @enderror' value='{{ old('total_view', $item->total_view) }}'/>
                                @error('total_view') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                        <div class='row mb-3'>
                            <label for='' class='col-sm-2 col-form-label'>{{ __('Existing Photo') }}</label>
                            <div class='col-sm-10'>
                                <img src="{{ asset('storage/uploads/activity/' . ($item->photo ?? '../default.png')) }}" height="50px">
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='photo' class='col-sm-2 col-form-label'>{{ __('Photo') }}</label>
                            <div class='col-sm-10'>
                                <input type="file" name="photo" class='form-control @error('photo') is-invalid @enderror' value='{{ old('photo', $item->photo) }}'/>
                                @error('photo') <div class='invalid-feedback'>{{ $message }}</div> @enderror
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

    @push('scripts')
    <script src="https://cdn.tiny.cloud/1/5i9ce24vx2b5fk8g7q4nqtmbj6mgo0tdomsp6ixyqdmycex8/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea#description',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
        </script>
    @endpush
@endsection