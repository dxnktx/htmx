@extends('TripBooking::layout.guest')

@section('heading', __('Giới thiệu'))

@section('main_content')

<main class="container">

    <div class="alert alert-danger" role="alert">
        Không tìm thấy bài viết giới thiệu, vui lòng tạo bài viết mới với tên tùy ý nhưng slug cần phải là [<strong>gioi-thieu</strong>]
    </div>

</main>

@endsection