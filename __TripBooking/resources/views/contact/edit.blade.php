@extends('TripBooking::layout.app')

@section('heading', __('Edit Contact'))

@section('button')
<a href="{{ route('contact_index') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-folder-check"></i> {{ __('View All') }}</a>
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('contact_update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="alert alert-primary d-flex align-items-center m-2" role="alert">
                                <div>
                                    <h5>{{ __('Update contact') }}</h5>
                                    <span>{{ __('You can make any changes on the form below and click [Save] button to update contact information.') }}</span>
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
                            <label for='phone' class='col-sm-2 col-form-label'>{{ __('Phone') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='phone' class='form-control @error('phone') is-invalid @enderror' value='{{ old('phone', $item->phone) }}'/>
                                @error('phone') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='email' class='col-sm-2 col-form-label'>{{ __('Email') }}</label>
                            <div class='col-sm-10'>
                                <input type='text' name='email' class='form-control @error('email') is-invalid @enderror' value='{{ old('email', $item->email) }}'/>
                                @error('email') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='message' class='col-sm-2 col-form-label'>{{ __('Message') }}</label>
                            <div class='col-sm-10'>
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" cols="30" rows="5">{{ old('message', $item->message) }}</textarea>
                                @error('message') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class='row mb-3'>
                            <label for='status'
                                class='col-sm-2 col-form-label'>{{ __('Trạng thái') }}</label>
                            <div class='col-sm-10'>
                                <select name="status"
                                    class='form-control @error('status') is-invalid @enderror'
                                    value='{{ old('status', $item->status) }}' required>
                                    @php $statuses = array('Chưa đọc', 'Đã đọc', 'Đã phản hồi', 'Đã lưu trữ'); @endphp
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status }}" @if ($status == old('status', $item->status) || $status == $item->status) selected="selected" @endif>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <div class='invalid-feedback'>{{ $message }}</div>
                                @enderror
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