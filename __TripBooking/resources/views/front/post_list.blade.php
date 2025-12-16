@extends('TripBooking::layout.guest')

@section('heading', __('Post'))

@section('main_content')

<main class="container">

    <div class="row mb-2">
        <div class="col-md-12">
            @if(isset($datas) && $datas->count() > 0)
                @foreach($datas as $item)
                    <div class="row border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-none d-lg-block py-2">
                            <img src="{{ asset('storage/uploads/post/' . ($item->photo ?? '../default.png')) }}" width="200" max-height="250">
                        </div>
                        <div class="col ps-4 pb-3 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary-emphasis">{{ $item->type }}</strong>
                            <h3 class="mb-0">{{ $item->heading }}</h3>
                            <div class="mb-1 text-body-secondary">{{ date('d/m/Y - h:i', strtotime($item->created_at)) }}</div>
                            <p class="card-text mb-auto">{{ $item->short_description }}.</p>
                            <a href="{{ route('tin_tuc_chi_tiet', $item->slug) }}" class="icon-link gap-1 icon-link-hover stretched-link text-decoration-none">
                                {{ __('Continue reading') }}
                                <svg class="bi">
                                    <use xlink:href="#chevron-right"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-danger" role="alert">
                    {{ __('Hiện tại chưa có tin tức nào!!!') }}
                </div>
            @endif
        </div>

    </div>

</main>

@endsection