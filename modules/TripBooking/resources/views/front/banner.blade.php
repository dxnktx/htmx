<div id="homeBanner" class="carousel slide mb-6 pointer-event" data-bs-ride="carousel">
    
    <div class="carousel-inner">
        @foreach($banners as $banner)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('/storage/uploads/banner/' . ($banner->image ?? '../default.png')) }}" width="100%">
            <div class="container pt-5">
                <div class="carousel-caption align-items-center flex-column ">
                    <p><a class="btn btn-lg col-md-4 col-6 mx-auto btn-success d-sm-block d-none fw-bold" href="{{ route('trip_create') }}">Đăng ký ngay</a></p>
                    <p class="mb-2"><a class="btn btn-sm col-md-4 col-6 mx-auto btn-success d-sm-none d-block fw-bold" href="{{ route('trip_create') }}">Đăng ký ngay</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#homeBanner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homeBanner" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
