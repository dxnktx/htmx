@extends('TripBooking::layout.app')

@section('heading', __('Routes'))

@section('button')
    <a href="{{ route('route_edit') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-plus"></i> {{ __('Add New') }}</a>
@endsection

@section('main_content')
    <div class="row mb-3">
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <div>
                <h5>{{ __('Routes') }}</h5>
                <span>{{ __('Below is a list of all routes. You can add and edit routes, change their status and see all infomation for each route.') }}</span>
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
                                    <th>{{ __('Mã tuyến đường') }}</th>
                                    <th>{{ __('Tên tuyến đường') }}</th>
                                    <th>{{ __('Khu vực') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->ma_tuyen_duong }}</td>
                                    <td>{{ $item->ten_tuyen_duong }}</td>
                                    <td>
                                        @foreach($item->stations as $station)
                                            {{ $station['dia_diem_den'] }}, 
                                        @endforeach
                                    </td>
                                    <td class="py-1">
                                        <a href="{{ route('route_delete', $item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ __('Are you sure?') }}');">{{ __('Delete') }}</a>
                                        <a href="{{ route('route_edit', $item->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
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