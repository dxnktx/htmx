@extends('TripBooking::layout.app')

@section('heading', __('Activities'))

@section('button')
    <a href="{{ route('activity_edit') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-plus"></i> {{ __('Add New') }}</a>
@endsection

@section('main_content')
    <div class="row mb-3">
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <div>
                <h5>{{ __('Activities') }}</h5>
                <span>{{ __('Below is a list of all activities. You can add and edit activities, change their status and see all infomation for each activity_type.') }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Heading') }}</th>
                                    <th>{{ __('Photo') }}</th>
                                    <th>{{ __('Short Description') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->heading }}</td>
                                    <td><img src="{{ asset('/storage/uploads/activity/' . ($item->photo ?? '../default.png')) }}" height="50px"></td>
                                    <td>{{ $item->short_description }}</td>
                                    <td class="py-1">
                                        <a href="{{ route('activity_delete', $item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ __('Are you sure?') }}');">{{ __('Delete') }}</a>
                                        <a href="{{ route('activity_edit', $item->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection