@extends('TripBooking::layout.guest')

@section('heading', __('Tin tức'))

@section('main_content')

<main class="container">

    <div class="row mb-2">
        @isset($post_single)
        <main>
            <h1 class="text-body-emphasis">{{ $post_single->heading }}</h1>
            <p><span>{{ __('Đăng ngày:') }} {{ $post_single->created_at }} | {{ $post_single->total_view ?? 0 }} {{ __('Lượt xem') }}</span></p>            
            <div class="fs-5 col-md-12" style="text-align:justify">{!! nl2br($post_single->description) !!}</div>
        </main>           
        @endisset
    </div>

</main>

@endsection

@push('styles')
<style>
    input[type=image] {
        max-width:100%;
    }
</style>
@endpush