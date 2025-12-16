@extends('TripBooking::layout.app')

@section('heading', __('Galleries'))

@section('button')
    <a href="{{ route('gallery_edit') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-plus"></i> {{ __('Add New') }}</a>
@endsection

@section('main_content')
    <div class="row mb-3">
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <div>
                <h5>{{ __('Galleries') }}</h5>
                <span>{{ __('Below is a list of all galleries. You can add and edit galleries, change their status and see all infomation for each gallery.') }}</span>
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
                                    <th>{{ __('Album') }}</th>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->album }}</td>
                                    <td><img src="{{ asset('/storage/uploads/gallery/' . ($item->image ?? 'default.png')) }}" height="50px"></td></td>
                                    <td class="py-1">
                                        <a href="{{ route('gallery_delete', $item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ __('Are you sure?') }}');">{{ __('Delete') }}</a>
                                        <a href="{{ route('gallery_edit', $item->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
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