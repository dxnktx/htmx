<footer class="py-5 text-center text-body-secondary bg-body-tertiary" style="background-image: url('/assets/images/footer-bg.png');">
  <div class="container text-start" style="color:#fff">
    <footer class="py-5">
      <div class="row">
        <div class="col-md-5 py-2">
          <h5>{{ __('Giới thiệu') }}</h5>
          <p>
            Chương trình Hành trình mùa xuân tổ chức tặng vé xe miễn phí cho sinh viên có hoàn cảnh khó khăn về quê đón Tết Nguyên đán Ất Tỵ năm 2025 do Ban Cán sự Đoàn ĐHQG-HCM và Trung tâm Quản lý Ký túc xá ĐHQG-HCM phối hợp thực hiện.
          </p>
        </div>
  
        <div class="col-md-3 col-6 py-2">
          <h5>{{ __('Hướng dẫn') }}</h5>
          <ul class="nav flex-column" style="color:#fff">
            <li class="nav-item mb-2"><a href="{{ route('intro') }}" class="nav-link p-0 text-white">Thông tin</a></li>
            <li class="nav-item mb-2"><a href="{{ route('trip_create') }}" class="nav-link p-0 text-white">Đăng ký vé xe</a></li>
            <li class="nav-item mb-2"><a href="{{ route('tin_tuc') }}" class="nav-link p-0 text-white">Tin tức</a></li>
            <li class="nav-item mb-2"><a href="{{ route('contact') }}" class="nav-link p-0 text-white">Liên hệ</a></li>
          </ul>
        </div>
  
        <div class="col-md-4 py-2">
          <form>
            <h5>{{ __('Thông tin liên hệ') }}</h5>
            <!-- <p>❤️ Chung tay hỗ trợ vé xe miễn phí trong chương trình. Chuyến xe mùa Xuân - Tết Nguyên Đán 2025.</p> -->
            <div class="fb-page" data-href="https://www.facebook.com/tuoitrevnuhcm" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/tuoitrevnuhcm" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/tuoitrevnuhcm">Tuổi Trẻ Đại Học Quốc Gia TP.Hồ Chí Minh</a></blockquote></div>
          </form>
        </div>
      </div>
  
      <div class="d-flex justify-content-between py-4 my-4 border-top">
        <p>© 2025 {{ __('KTX ĐHQG TPHCM') }}. {{ __('All rights reserved') }}.</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
        </ul>
      </div>
    </footer>
  </div>
</footer>