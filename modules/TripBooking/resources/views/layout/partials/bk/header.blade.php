<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v21.0&appId=822627229884522"></script>
<!-- Facebook Messenger Chat Plugin -->
<div id="fb-customer-chat"
     class="fb-customerchat"
     attribution="page_inbox"
     page_id="1239560201543707"
     theme_color="#0084ff"
     logged_in_greeting="Xin chào! Tôi có thể hỗ trợ gì cho bạn?"
     logged_out_greeting="Xin chào! Vui lòng đăng nhập Facebook để chat.">
</div>

<div class="container">
    <header class="border-bottom lh-1 pb-3">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-4 col-3 pt-1">
                <a class="blog-header-logo text-body-emphasis text-decoration-none" href="/">
                    <img src="/assets/images/logo.png" style="width:auto; max-width:100%; max-height:100px">
                </a>
            </div>
            <div class="col-md-4 col-9 pt-1">
                <a class="blog-header-logo text-body-emphasis text-decoration-none" href="/">
                    <img src="/assets/images/logos.png" width="100%" height="auto">
                </a>
            </div>
            <div class="col-md-4 d-none d-md-block text-end">
                <!--
                @if(app()->getLocale() == 'vi')
                    <a href="{!! route('switch_language', ['en']) !!}"><img src="{{ asset('/assets/images/united-kingdom.svg') }}" alt="English" title="{{ __('English') }}" class="mx-1" style="width:24px;"></a>
                @else
                    <a href="{!! route('switch_language', ['vi']) !!}"><img src="{{ asset('/assets/images/vietnam.svg') }}" alt="Tiếng Việt" title="{{ __('Tiếng Việt') }}" class="mx-1" style="width:24px"></a>
                @endif
                -->
                @if(auth()->check())
                    @if(auth()->user()->can('browse-dashboard'))
                        <a class="btn btn-sm btn-outline-success me-1" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    @endif
                    <a class="btn btn-sm btn-outline-danger me-5" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                @endif
            </div>
        </div>
    </header>

    <!--<div class="nav-scroller py-1 mb-3 border-bottom">
        <nav class="nav nav-underline justify-content-center">
            <a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('trang-chu') ? 'active' : '' }}" href="/">{{ __('Home') }}</a>
            <a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('gioi-thieu') ? 'active' : '' }}" href="{{ route('intro') }}">{{ __('About Us') }}</a>
            <a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('tin-tuc') ? 'active' : '' }}" href="{{ route('tin_tuc') }}">{{ __('News') }}</a>
            <a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('trip/create') ? 'active' : '' }}" href="{{ route('trip_create') }}">{{ __('Register') }}</a>
            <a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('lien-he') ? 'active' : '' }}" href="{{ route('contact') }}">{{ __('Contact Us') }}</a>
        </nav>
    </div>-->
    <div class="nav-scroller py-1 mb-3 border-bottom">
    <nav class="menu nav nav-underline justify-content-center">
        <div class="menu-toggle" id="menuToggle">☰</div>
        <ul class="menu-list" id="menuList">
            <li><a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('trang-chu') ? 'active' : '' }}" href="/">{{ __('Home') }}</a></li>
            <li><a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('gioi-thieu') ? 'active' : '' }}" href="{{ route('intro') }}">{{ __('About Us') }}</a></li>
            <li><a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('tin-tuc') ? 'active' : '' }}" href="{{ route('tin_tuc') }}">{{ __('News') }}</a></li>
            <li class="has-sub">
                <a class="nav-item nav-link link-body-emphasis px-2" href="#">Đăng ký</a>
                <ul class="sub-menu">
                    <li><a class="nav-item link-body-emphasis {{ Request::is('trip/create') ? 'active' : '' }}" href="{{ auth()->check() ? route('trip_create') : route('login') }}">Dành cho Sinh viên nội trú KTX</a></li>
                    <li><a class="nav-item link-body-emphasis {{ Request::is('trip/create') ? 'active' : '' }}" href="{{ route('trip_create') }}">Dành cho Sinh viên ngoại trú KTX</a></li>
                </ul>
            </li>
            <li><a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('lien-he') ? 'active' : '' }}" href="{{ route('contact') }}">{{ __('Contact Us') }}</a></li>
        </ul>
    </nav>
    </div>

<style>
    .menu {
        background: none;/*#0a7cff;*/
    }

    .menu-list {
        list-style: none;
        display: flex;
        margin-bottom: 0;
        gap:30px;
    }

    .menu-list li {
        position: relative;
    }

    .menu-list > li > a {
        display: block;
        /*padding: 5px 20px;*/
        color: #000;
        text-decoration: none;
    }

    .menu-list > li > a:hover {
        /*background: #055ec2;*/
    }

    /* Submenu */
    .sub-menu {
        position: absolute;
        top: 100%;
        left: 0;
        background: #ffffff;
        min-width: 260px;
        display: none;
        list-style: none;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        z-index: 999;
        padding: 10px;
    }

    .sub-menu li a {
        /*padding: 5px 15px;*/
        display: block;
        color: #333;
        text-decoration: none;
        padding: 5px 0;
    }

    .sub-menu li a:hover {
        color: #ff0000;
    }

    /* Hover desktop */
    .has-sub:hover .sub-menu {
        display: block;
    }

    /* Toggle mobile */
    .menu-toggle {
        display: none;
        color: #fff;
        font-size: 24px;
        padding:5px 10px;
        cursor: pointer;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .menu {
            background:#0c2d66 ;
        }
        .justify-content-center {
             justify-content: left !important;
        }
        .menu-toggle {
            display: block;
        }

        .menu-list {
            flex-direction: column;
            display: none;
        }

        .menu-list.show {
            display: block;
        }

        .sub-menu {
            background: none !important;
            position: static;
            box-shadow: none;
        }

        .menu-list li a { color: #ffffff !important; }

        .has-sub > a::after {
            content: " ▼";
            float: right;
        }
    }
</style>

    <script>
        document.getElementById('menuToggle').onclick = function () {
            document.getElementById('menuList').classList.toggle('show');
        };

        document.querySelectorAll('.has-sub > a').forEach(item => {
            item.addEventListener('click', function (e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    this.nextElementSibling.style.display =
                        this.nextElementSibling.style.display === 'block' ? 'none' : 'block';
                }
            });
        });
    </script>

</div>
