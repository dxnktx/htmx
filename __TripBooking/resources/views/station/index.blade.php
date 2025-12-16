@extends('TripBooking::layout.app')

@section('heading', __('Stations'))

@section('button')
    <a href="{{ route('station_edit') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-plus"></i> {{ __('Add New') }}</a>
@endsection

@section('main_content')
    <div class="row mb-3">
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <div>
                <h5>{{ __('Stations') }}</h5>
                <span>{{ __('Below is a list of all stations. You can add and edit stations, change their status and see all infomation for each station.') }}</span>
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
                                    <th>{{ __('Station') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration + (($_GET['page'] ?? 1) - 1) * 10 }}
                                    </td>
                                    <td>{{ $item->tinh_thanh }}</td>
                                    <td class="py-1">
                                        <a href="{{ route('station_delete', $item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ __('Are you sure?') }}');">{{ __('Delete') }}</a>
                                        <a href="{{ route('station_edit', $item->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
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