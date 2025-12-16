@extends('TripBooking::layout.guest')

@section('heading', __('Thư viện hình ảnh'))

@section('main_content')

    <main class="container">

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($galleries as $item)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/uploads/gallery/' . $item->image)}}" class="w-100">
                            <div class="card-body">
                                <p class="card-text">{{ $item->album }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">{{ __('View') }}</button>
                                    </div>
                                    <small class="text-body-secondary">{{ $item->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>

@endsection
