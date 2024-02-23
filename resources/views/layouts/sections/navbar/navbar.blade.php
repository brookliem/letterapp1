@php
    $containerNav = $containerNav ?? "container-fluid";
    $navbarDetached = $navbarDetached ?? "";

@endphp

<!-- Navbar -->
@if (isset($navbarDetached) && $navbarDetached == "navbar-detached")
    <nav class="layout-navbar {{ $containerNav }} navbar navbar-expand-xl {{ $navbarDetached }} align-items-center bg-danger"
        id="layout-navbar">
@endif
@if (isset($navbarDetached) && $navbarDetached == "")
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-danger" id="layout-navbar">
        <div class="{{ $containerNav }}">
@endif

<!--  Brand demo (display only for navbar-full and hide on below xl) -->
@if (isset($navbarFull))
    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="{{ url("/") }}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">
                @include("_partials.macros", ["width" => 25, "withbg" => "#696cff"])
            </span>
            <span class="app-brand-text demo menu-text fw-bolder">{{ config("variables.templateName") }}</span>
        </a>
    </div>
@endif

<!-- ! Not required for layout-without-menu -->
@if (!isset($navbarHideToggle))
    <div
        class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? " d-xl-none " : "" }} {{ isset($contentNavbar) ? " d-xl-none " : "" }}">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
@endif

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->

    <!-- /Search -->
    @php
        $id = Auth::user()->id;
        $profile = App\Models\User::find($id);
    @endphp


    <ul class="navbar-nav flex-row align-items-center ms-auto">

        <!-- Place this tag where you want the button to render. -->
        <!-- User -->
        <li class="name" style="margin-top: 3px; font-size:15px;">
            @auth
                Hi, {{ auth()->user()->name }}
            @endauth
        </li>

        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar" style="width: 45px; height:45px">
                    <img class="rounded-circle header-profile-user"
                        src="{{ !empty($profile->image) ? url("upload/user-images/" . $profile->image) : url("upload/default.png") }}"
                        alt="Header Avatar">
                </div>
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="/akun-profil">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar" style="width: 45px; height:45px">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ !empty($profile->image) ? url("upload/user-images/" . $profile->image) : url("upload/default.png") }}"
                                        alt="Header Avatar">
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">@auth
                                    {{ auth()->user()->name }} @endauth
                                </span>
                                <small class="text-muted">@auth
                                    {{ auth()->user()->role }} @endauth
                                </small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a href="/akun-profil" class="dropdown-item" href="javascript:void(0);">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Akun Profil</span>
                    </a>
                </li>
                <li>
                    <a method="post" href="/keluar" class="dropdown-item">
                        @csrf
                        <i class='bx bx-power-off me-2'></i>
                        <span class="align-middle">Keluar</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ User -->
    </ul>
</div>

@if (!isset($navbarDetached))
    </div>
@endif
</nav>
<!-- / Navbar -->
