<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v21.0&appId=822627229884522"></script>
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

    <div class="nav-scroller py-1 mb-3 border-bottom">
        <nav class="nav nav-underline justify-content-center">
            <a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('trang-chu') ? 'active' : '' }}" href="/">{{ __('Home') }}</a>
            <a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('gioi-thieu') ? 'active' : '' }}" href="{{ route('intro') }}">{{ __('About Us') }}</a>
            <a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('tin-tuc') ? 'active' : '' }}" href="{{ route('tin_tuc') }}">{{ __('News') }}</a>
            <a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('trip/create') ? 'active' : '' }}" href="{{ route('trip_create') }}">{{ __('Register') }}</a>
            <a class="nav-item nav-link link-body-emphasis px-2 {{ Request::is('lien-he') ? 'active' : '' }}" href="{{ route('contact') }}">{{ __('Contact Us') }}</a>
        </nav>
    </div>
</div>
