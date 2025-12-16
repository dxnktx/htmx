@extends('TripBooking::layout.guest')

@section('heading', __('Liên hệ'))

@section('main_content')

    <div class="container">
        <div class="text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('assets/images/4.jpg')}}" alt="" width="80%" height="auto">
            <h2>Liên hệ</h2>
            <p class="lead">Email pctsv@ktxhcm.edu.vn hoặc youth@vnuhcm.edu.vn<br>
                Địa chỉ: Phòng 525, Nhà điều hành ĐHQG-HCM, số 1 Võ Trường Toản, phường Linh Trung, thành phố Thủ Đức, TP.HCM.</p>
        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                @include('TripBooking::front.partials.cart')
            </div>
            <div class="col-md-7 col-lg-8">
                @include('TripBooking::front.partials.form')
            </div>
        </div>

        <div class="row py-3">            
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.208029372992!2d106.7783782672!3d10.882211068527493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d89aad780e49%3A0x54542761d4c22175!2zS8O9IHTDumMgeMOhIEtodSBCIC0gxJDhuqFpIGjhu41jIFF14buRYyBnaWEgVFAuSENN!5e1!3m2!1svi!2s!4v1732264244404!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

@endsection
