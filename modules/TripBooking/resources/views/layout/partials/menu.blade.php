@can('browse-trip')
<li class="nav-item {{ Request::is('trip/*') || Request::is('trip') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('trip') ? 'active' : '' }}">
        <i class="bi bi-airplane-engines"></i>
        <p>
            {{ __('Trips') }}
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item"><a class="nav-link {{ Request::is('trip') ? 'active' : '' }}" href="{{ route('trip_index') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('trip') ? '-fill' : '' }}"></i> {{ __('All Trips') }}</a></li>
    </ul>
</li>
@endcan

@can('browse-student')
<li class="nav-item {{ Request::is('student/*') || Request::is('student') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('student') ? 'active' : '' }}">
        <i class="nav-icon bi bi-people"></i>
        <p>
            {{ __('Students') }}
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item"><a class="nav-link {{ Request::is('student') ? 'active' : '' }}" href="{{ route('student_index') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('student') ? '-fill' : '' }}"></i> {{ __('All Students') }}</a></li>
    </ul>
</li>
@endcan

@can('browse-station')
<li class="nav-item {{ Request::is('station/*') || Request::is('station') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('station') ? 'active' : '' }}">
        <i class="bi bi-sign-turn-left"></i>
        <p>
            {{ __('Stations') }}
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item"><a class="nav-link {{ Request::is('station') ? 'active' : '' }}" href="{{ route('station_index') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('station') ? '-fill' : '' }}"></i> {{ __('All Stations') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('station/edit') ? 'active' : '' }}" href="{{ route('station_edit') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('station/edit') ? '-fill' : '' }}"></i> {{ __('Add A Station') }}</a></li>
    </ul>
</li>
@endcan

@can('browse-unit')
<li class="nav-item {{ Request::is('unit/*') || Request::is('unit') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('unit') || Request::is('unit/*') ? 'active' : '' }}">
        <i class="bi bi-buildings"></i>
        <p>
            {{ __('Units') }}
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item"><a class="nav-link {{ Request::is('unit') ? 'active' : '' }}" href="{{ route('unit_index') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('unit') ? '-fill' : '' }}"></i> {{ __('All Units') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('unit/edit') ? 'active' : '' }}" href="{{ route('unit_edit') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('unit/edit') ? '-fill' : '' }}"></i> {{ __('Add A Unit') }}</a></li>
    </ul>
</li>
@endcan

@can('browse-bank')
<li class="nav-item {{ Request::is('bank/*') || Request::is('bank') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('bank') ? 'active' : '' }}">
        <i class="bi bi-bank2"></i>
        <p>
            {{ __('Banks') }}
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item"><a class="nav-link {{ Request::is('bank') ? 'active' : '' }}" href="{{ route('bank_index') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('bank') ? '-fill' : '' }}"></i> {{ __('All Banks') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('bank/edit') ? 'active' : '' }}" href="{{ route('bank_edit') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('bank/edit') ? '-fill' : '' }}"></i> {{ __('Add A Bank') }}</a></li>
    </ul>
</li>
@endcan

@can('browse-partner')
<li class="nav-item {{ Request::is('partner/*') || Request::is('partner') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('partner') ? 'active' : '' }}">
        <i class="bi bi-person-vcard"></i>
        <p>
            {{ __('Partners') }}
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item"><a class="nav-link {{ Request::is('partner') ? 'active' : '' }}" href="{{ route('partner_index') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('partner') ? '-fill' : '' }}"></i> {{ __('All Partners') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('partner/edit') ? 'active' : '' }}" href="{{ route('partner_edit') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('partner/edit') ? '-fill' : '' }}"></i> {{ __('Add A Partner') }}</a></li>
    </ul>
</li>
@endcan

@can('browse-post')
<li class="nav-item {{ Request::is('post/*') || Request::is('post') || Request::is('category/*') || Request::is('category') || Request::is('activity/*') || Request::is('activity') || Request::is('banner/*') || Request::is('banner') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('post') ? 'active' : '' }}">
        <i class="bi bi-pencil-square"></i>
        <p>
            {{ __('Posts') }}
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item"><a class="nav-link {{ Request::is('post/edit') ? 'active' : '' }}" href="{{ route('post_edit') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('post/edit') ? '-fill' : '' }}"></i> {{ __('Add A Post') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('post') ? 'active' : '' }}" href="{{ route('post_index') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('post') ? '-fill' : '' }}"></i> {{ __('All Posts') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('activity') ? 'active' : '' }}" href="{{ route('activity_index') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('activity') ? '-fill' : '' }}"></i> {{ __('All Activities') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('banner') ? 'active' : '' }}" href="{{ route('banner_index') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('banner') ? '-fill' : '' }}"></i> {{ __('All Banners') }}</a></li>
    </ul>
</li>
@endcan

@can('browse-contact')
<li class="nav-item {{ Request::is('contact/*') || Request::is('contact') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">
        <i class="bi bi-mailbox"></i>
        <p>
            {{ __('Contacts') }}
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item"><a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ route('contact_index') }}"><i class="nav-icon bi bi-caret-right{{ Request::is('contact') ? '-fill' : '' }}"></i> {{ __('All Contacts') }}</a></li>
    </ul>
</li>
@endcan