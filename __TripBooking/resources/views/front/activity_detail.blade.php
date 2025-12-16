@extends('TripBooking::layout.guest')

@section('heading', __('Tin tức'))

@section('main_content')

<main class="container">

    <div class="row mb-2">
        @isset($activity_single)
        <main>
            <h1 class="text-body-emphasis">{{ $activity_single->heading }}</h1>
            <p><span>{{ __('Đăng ngày:') }} {{ $activity_single->created_at }} | {{ $activity_single->total_view }} {{ __('Lượt xem') }}</span></p>
            <p><img src="{{ asset('storage/uploads/activity/' . ($activity_single->photo ?? '../default.png')) }}" class="mw-100 py-2 h-auto"></p>
            <div class="fs-5 col-md-12" style="text-align:justify">{!! nl2br($post_single->description) !!}</div>
        </main>           
        @endisset
    </div>

</main>

@endsection