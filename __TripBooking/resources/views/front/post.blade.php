@extends('TripBooking::layout.guest')

@section('heading', __('Tin tức'))

@section('main_content')

<main class="container">

    <div class="row mb-2">
        @isset($post_single)
        <main>
            <h1 class="text-body-emphasis">{{ $post_single->heading }}</h1>
            <span>{{ __('Đăng ngày:') }} {{ $post_single->created_at }} | {{ $post_single->total_view }} {{ __('Lượt xem') }}</span>
            <img src="{{ asset('storage/uploads/post/' . ($post_single->photo ?? '../default.png')) }}" class="mw-100 py-2 h-auto">
            <div class="fs-5 col-md-12" style="text-align:justify">{{ $post_single->description }}</div>
        </main>           
        @endisset
    </div>

</main>

@endsection