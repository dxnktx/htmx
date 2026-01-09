<div id="homeBanner" class="carousel slide mb-6 pointer-event" data-bs-ride="carousel">

    <div class="carousel-inner">
        @foreach($banners as $banner)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('/storage/uploads/banner/' . ($banner->image ?? '../default.png')) }}" width="100%">
            <div class="container pt-5">
                <div class="carousel-caption align-items-center flex-column ">
                    <p><a id="btnRegister" class="btn btn-lg col-md-4 col-6 mx-auto btn-success d-sm-block d-none fw-bold" href="javascript:void(0);">Đăng ký ngay</a></p>
                    <p class="mb-2"><a style="padding:5px !important;" id="btnRegisterMb" class="dxn btn btn-sm col-md-4 col-6 mx-auto btn-success d-sm-none d-block fw-bold" href="javascript:void(0);">Đăng ký ngay</a></p>
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

<!-- Popup chọn đối tượng đăng ký-->
<div class="popup-overlay" id="popupRegister">
    <div class="popup-box">
        <h3>ĐĂNG KÝ</h3>
        <div class="popup-actions">
            <a href="{{ auth()->check() ? route('trip_create') : route('login') }}"><button class="btn btn-primary" style="background: #292e6a !important;">Dành cho Sinh viên nội trú KTX</button></a>
            <a href="{{ route('trip_create') }}"><button class="btn btn-success"  style="background: #2d9ee0 !important;">Dành cho Sinh viên ngoại trú KTX</button></a>
        </div>

        <span class="popup-close" id="closePopup">&times;</span>
    </div>
</div>

<style>
    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.6);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .popup-box {
        background: #fff;
        width: 90%;
        max-width: 400px;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        position: relative;
    }
    .popup-box a .btn { width: 300px;}

    .popup-box h3 {
        color: #0c2d66;
        margin-bottom: 30px;
    }

    .popup-box p {
        margin-bottom: 20px;
        color: #555;
    }

    /* Buttons trên 2 dòng */
    .popup-actions {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .btn {
        padding: 12px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
    }

    #btnRegister { z-index: 9999; }
    .btn-primary {
        background: #0a7cff;
        color: #fff;
    }

    .btn-secondary {
        background: #ddd;
        color: #333;
    }

    .btn:hover {
        opacity: 0.9;
    }

    .popup-close {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 22px;
        cursor: pointer;
    }

</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const popup = document.getElementById('popupRegister');
        const openBtn = document.getElementById('btnRegister');
        const openBtnmb = document.getElementById('btnRegisterMb');
        const closeBtn = document.getElementById('closePopup');

        function open() {
            popup.style.display = 'flex';
        }

        function close() {
            popup.style.display = 'none';
        }

        openBtn.addEventListener('click', open);
        openBtn.addEventListener('touchstart', open);
        openBtnmb.addEventListener('click', open);
        openBtnmb.addEventListener('touchstart', open);

        closeBtn.addEventListener('click', close);
    });
</script>
