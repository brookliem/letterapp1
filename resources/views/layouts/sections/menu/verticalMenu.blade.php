<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme bg-warning">

    <!-- ! Hide app brand if navbar-full -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&family=Roboto+Condensed:wght@700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            /*Colors*/
            --primary-color: #0E4BF1;
            --panel-color: #FFF;
            --text-color: #000;
            --black-light-color: #707070;
            --border-color: #e6e5e5;
            --toggle-color: #DDD;
            --box1-color: #4DA3FF;
            --box2-color: #FFE6AC;
            --box3-color: #E7D1FC;
            --title-icon-color: #fff;

            /*Transition*/
            --tran-02: all 0.2s ease;
            --tran-03: all 0.3s ease;
            --tran-04: all 0.4s ease;
            --tran-05: all 0.5s ease;
        }

        .sidebar .image {
            margin-left: 3px;
            margin-right: -18px;
            min-width: 60px;
            display: flex;
            align-items: center;
        }

        .sidebar .image-text img {
            width: 86px;
            height: 87px;
            border-radius: 6px;
            margin-top: 2px;
        }

        .sidebar header .image-text {
            display: flex;
            align-items: center;
        }

        .sidebar .image-text .header-text {
            display: flex;
            flex-direction: column;
            color: var(--text-color);
            margin-top: -3px;
            margin-left: 2px;
        }

        .header-text .name {
            font-weight: 600;
            font-size: 22px;
            color: rgb(255, 174, 44);
            margin-left: 12px;
        }

        .header-text .profession {
            font-weight: 500;
            font-size: 21px;
            margin-top: -6px;
            color: rgb(255, 174, 44);
            margin-left: 12px;
            margin-right: -19px;
        }
    </style>

    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                </span>

                <div class="text header-text">
                </div>
            </div>
        </header>
    </nav>


    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1" style="margin-top: 32.5px; margin-left:6px;">
        @if (session("role") == "Admin")
            @foreach ($verticalMenuAdminData[0]->menu as $menu)
                {{-- adding active and open class if child is active --}}

                {{-- menu headers --}}
                @if (isset($menu->menuHeader))
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">{{ $menu->menuHeader }}</span>
                    </li>
                @else
                    {{-- active menu method --}}
                    @php
                        $activeClass = null;
                        $currentRouteName = Route::currentRouteName();

                        if ($currentRouteName === $menu->slug) {
                            $activeClass = "active";
                        } elseif (isset($menu->submenu)) {
                            if (gettype($menu->slug) === "array") {
                                foreach ($menu->slug as $slug) {
                                    if (str_contains($currentRouteName, $slug) and strpos($currentRouteName, $slug) === 0) {
                                        $activeClass = "active open";
                                    }
                                }
                            } else {
                                if (str_contains($currentRouteName, $menu->slug) and strpos($currentRouteName, $menu->slug) === 0) {
                                    $activeClass = "active open";
                                }
                            }
                        }
                    @endphp

                    {{-- main menu --}}
                    <li class="menu-item {{ $activeClass }}">
                        <a href="{{ isset($menu->url) ? url($menu->url) : "javascript:void(0);" }}"
                            class="{{ isset($menu->submenu) ? "menu-link menu-toggle" : "menu-link" }}"
                            @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
                            @isset($menu->icon)
                                <i class="{{ $menu->icon }}"></i>
                            @endisset
                            <div>{{ isset($menu->name) ? __($menu->name) : "" }}</div>
                        </a>

                        {{-- submenu --}}
                        @isset($menu->submenu)
                            @include("layouts.sections.menu.submenu", ["menu" => $menu->submenu])
                        @endisset
                    </li>
                @endif
            @endforeach
        @elseif(session("role") == "User")
            @foreach ($verticalMenuUserData[0]->menu as $menu)
                {{-- adding active and open class if child is active --}}

                {{-- menu headers --}}
                @if (isset($menu->menuHeader))
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">{{ $menu->menuHeader }}</span>
                    </li>
                @else
                    {{-- active menu method --}}
                    @php
                        $activeClass = null;
                        $currentRouteName = Route::currentRouteName();

                        if ($currentRouteName === $menu->slug) {
                            $activeClass = "active";
                        } elseif (isset($menu->submenu)) {
                            if (gettype($menu->slug) === "array") {
                                foreach ($menu->slug as $slug) {
                                    if (str_contains($currentRouteName, $slug) and strpos($currentRouteName, $slug) === 0) {
                                        $activeClass = "active open";
                                    }
                                }
                            } else {
                                if (str_contains($currentRouteName, $menu->slug) and strpos($currentRouteName, $menu->slug) === 0) {
                                    $activeClass = "active open";
                                }
                            }
                        }
                    @endphp

                    {{-- main menu --}}
                    <li class="menu-item {{ $activeClass }}">
                        <a href="{{ isset($menu->url) ? url($menu->url) : "javascript:void(0);" }}"
                            class="{{ isset($menu->submenu) ? "menu-link menu-toggle" : "menu-link" }}"
                            @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
                            @isset($menu->icon)
                                <i class="{{ $menu->icon }}"></i>
                            @endisset
                            <div>{{ isset($menu->name) ? __($menu->name) : "" }}</div>
                        </a>

                        {{-- submenu --}}
                        @isset($menu->submenu)
                            @include("layouts.sections.menu.submenu", ["menu" => $menu->submenu])
                        @endisset
                    </li>
                @endif
            @endforeach
        @elseif(session("role") == "Master")
            @foreach ($verticalMenuData[0]->menu as $menu)
                {{-- adding active and open class if child is active --}}

                {{-- menu headers --}}
                @if (isset($menu->menuHeader))
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">{{ $menu->menuHeader }}</span>
                    </li>
                @else
                    {{-- active menu method --}}
                    @php
                        $activeClass = null;
                        $currentRouteName = Route::currentRouteName();

                        if ($currentRouteName === $menu->slug) {
                            $activeClass = "active";
                        } elseif (isset($menu->submenu)) {
                            if (gettype($menu->slug) === "array") {
                                foreach ($menu->slug as $slug) {
                                    if (str_contains($currentRouteName, $slug) and strpos($currentRouteName, $slug) === 0) {
                                        $activeClass = "active open";
                                    }
                                }
                            } else {
                                if (str_contains($currentRouteName, $menu->slug) and strpos($currentRouteName, $menu->slug) === 0) {
                                    $activeClass = "active open";
                                }
                            }
                        }
                    @endphp

                    {{-- main menu --}}
                    <li class="menu-item {{ $activeClass }}">
                        <a href="{{ isset($menu->url) ? url($menu->url) : "javascript:void(0);" }}"
                            class="{{ isset($menu->submenu) ? "menu-link menu-toggle" : "menu-link" }}"
                            @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
                            @isset($menu->icon)
                                <i class="{{ $menu->icon }}"></i>
                            @endisset
                            <div>{{ isset($menu->name) ? __($menu->name) : "" }}</div>
                        </a>

                        {{-- submenu --}}
                        @isset($menu->submenu)
                            @include("layouts.sections.menu.submenu", ["menu" => $menu->submenu])
                        @endisset
                    </li>
                @endif
            @endforeach
        @endif
    </ul>

</aside>
