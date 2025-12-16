@extends('TripBooking::layout.guest')

@section('heading', __('Home'))

@section('main_content')

    <main class="container">

        <section name="banner">
            @include('TripBooking::front.banner')
        </section>

        <section name="countdown">
            @include('TripBooking::front.partials.countdown')
        </section>

        <section name="post">
            <div class="row my-3">
                <!-- Three columns of text below the carousel -->
                <div class="row text-center" style="background-color:#efefcd">
                    <h2 class="py-3 fw-bold text-uppercase">CHƯƠNG TRÌNH HÀNH TRÌNH MÙA XUÂN</h2>
                    <div class="col-lg-4">
                        <img src="{{ asset('assets/images/1.jpg') }}" alt="Chương trình chuyến xe" width="100%" max-height="140px">
                        <h2 class="fw-bold py-2 text-danger text-uppercase">Đối tượng</h2>
                        <p>Sinh viên nội trú Ký túc xá ĐHQG-HCM và sinh viên đang học tập tại các cơ sở đào tạo thuộc ĐHQG-HCM.</p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <img src="{{ asset('assets/images/2.jpg') }}" alt="Chương trình chuyến xe" width="100%" max-height="140px">
                        <h2 class="fw-bold py-2 text-danger text-uppercase">Các tuyến xe</h2>
                        <p>Đăk Nông, Đăk Lăk, Gia Lai, Kon Tum, Bình Thuận, Ninh Thuận, Khánh Hoà, Phú Yên, Bình Định, Quảng Ngãi, Quảng Nam, Đà Nẵng, Thừa Thiên – Huế, Quảng Trị, Quảng Bình, Hà Tĩnh, Nghệ An, Thanh Hoá, Ninh Bình, Hà Nam, Hà Nội.</p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <img src="{{ asset('assets/images/3.jpg') }}" alt="Chương trình chuyến xe" width="100%" max-height="140px">
                        <h2 class="fw-bold py-2 text-danger text-uppercase">Quy trình thực hiện</h2>
                        <p>Đăng ký - Xét duyệt - BTC tặng vé hoặc tổ chức chuyến xe tập trung.</p>
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div>            
        </section>
        
        @include('TripBooking::front.main-content')
        <!--
        <section name="post">
            <div class="row my-3">
                <div class="row text-center" style="background-color:#efefcd">
                    <h2 class="py-3 fw-bold text-uppercase">Chung tay hỗ trợ vé xe miễn phí trong chương trình<br>Chuyến xe mùa Xuân – Tết Nguyên Đán 2025</h2>
                    <div class="col-12 py-3">
                        <img src="{{ asset('assets/images/4.png') }}" alt="Chương trình chuyến xe" width="100%" max-height="140px">
                        <p class="my-3 fs-4">❤️ Chuyến xe mùa Xuân 2025 chỉ còn vài tháng nữa xe chính thức lăn bánh, cùng chúng tôi gây quỹ mang đến những tấm vé xe - tấm vé về với gia đình cho các em học sinh sinh viên nghèo nhé.</p>
                        <a href="{{ route('contact') }}" class="btn btn-warning">{{ __('Quyên góp') }}</a>
                    </div>
                </div>
            </div>            
        </section>
        -->
        {{-- @include('TripBooking::front.partner') --}}

        @include('TripBooking::front.home-news')
    </main>

@endsection
