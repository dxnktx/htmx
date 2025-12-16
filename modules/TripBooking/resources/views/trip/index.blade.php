@extends('TripBooking::layout.app')

@section('heading', __('Trips'))

@section('main_content')
<div class="row mb-3">
    <div class="alert alert-primary d-flex align-items-center" role="alert">
        <div>
            <h5>{{ __('Trips') }}</h5>
            <span>{{ __('Below is a list of all trips. You can add and edit trips, change their status and see all infomation for each trip.') }}</span>
        </div>
    </div>
</div>
<!--
<div class="row my-2 justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="search-container position-relative">
            <form action="{{ route('trip_search') }}" method="get" name="trip_search" class="d-flex align-items-center">
                <input name="keyword" class="form-control search-input ps-5" type="search"
                    placeholder="{{ __('Search anything...') }}" aria-label="Search">
                <button class="btn btn-search btn-outline-primary ms-2" type="submit">{{ __('Search') }}</button>
            </form>
        </div>
    </div>
</div>
-->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Mã sinh viên') }}</th>
                                <th>{{ __('Tên sinh viên') }}</th>
                                <th>{{ __('Hành lý mang theo') }}</th>
                                <th>{{ __('Tỉnh thành') }}</th>
                                <th>{{ __('Địa điểm xuống xe') }}</th>
                                <th>{{ __('Trạng thái') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration + (($_GET['page'] ?? 1) - 1) * 10 }}
                                </td>
                                <td>{{ $item->ma_sinh_vien }}</td>
                                <td>{!! $item->rStudent->ten_sinh_vien ?? '' !!}</td>
                                <td>{{ $item->hanh_ly_mang_theo }}</td>
                                <td>{{ $item->tinh_thanh }}</td>
                                <td>{{ substr($item->dia_diem_xuong_xe, 0, 30) . '...' }}</td>
                                <td>@if($item->status == 0) <span class="badge text-bg-primary">Đang xét duyệt</span> @elseif($item->status == 1) <span class="badge text-bg-success">Đã xét duyệt</span> @else <span class="badge text-bg-danger">Đã từ chối</span> @endif</td>
                                <td class="py-1">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="{{ route('trip_detail', $item->ma_sinh_vien) }}" class="btn btn-primary btn-sm">{{ __('View') }}</a>
                                        <a href="{{ route('trip_approve', $item->id) }}" class="btn btn-success btn-sm">{{ __('Approve') }}</a>
                                        <a href="{{ route('trip_reject', $item->id) }}" class="btn btn-warning btn-sm">{{ __('Reject') }}</a>
                                        <a href="{{ route('trip_delete', $item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ __('Are you sure?') }}');">{{ __('Delete') }}</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="jk-paginator mb-3">
                        {!! $datas->appends($_GET)->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection