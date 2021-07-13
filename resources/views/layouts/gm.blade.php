<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>GM Панель</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('gmassets/images/favicon.ico') }}">

    @stack('css')

    <link href="{{ asset('gmassets/css/default/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{ asset('gmassets/css/default/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <link href="{{ asset('gmassets/css/default/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="{{ asset('gmassets/css/default/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
    <link href="{{ asset('gmassets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="loading">
<div id="wrapper">
    <div class="navbar-custom">
        <div class="container-fluid">

            <ul class="list-unstyled topnav-menu float-end mb-0">

                <li class="dropdown d-none d-lg-inline-block">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                        <i class="fe-maximize noti-icon"></i>
                    </a>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-bell noti-icon"></i>
                        <span class="badge bg-danger rounded-circle noti-icon-badge">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                        <span class="float-end">
                                            <a href="" class="text-dark">
                                                <small>Очистить</small>
                                            </a>
                                        </span>Уведомления
                            </h5>
                        </div>

                        <div class="noti-scroll" data-simplebar>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon bg-soft-primary text-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Это только проверка
                                    <small class="text-muted">1 минуту назад</small>
                                </p>
                            </a>

                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            Просмотреть все
                            <i class="fe-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('/storage/'.Utils::ImagesLogo(auth()->user()->avatar)) }}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ms-1">
                                    {{ auth()->user()->name }} <i class="mdi mdi-chevron-down"></i>
                                </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Привет!</h6>
                        </div>

                        <!-- item-->
                        <a href="{{ route('user', ['overview']) }}" class="dropdown-item notify-item">
                            <i class="ri-account-circle-line"></i>
                            <span>@lang('navbar.navbar_33')</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item notify-item">
                                <i class="ri-logout-box-line"></i>
                                <span>@lang('navbar.navbar_7')</span>
                            </a>
                        </form>
                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ route('gm.index') }}" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <span class="logo-lg-text-light">GM Panel</span>
                            </span>
                    <span class="logo-lg">
                                <span class="logo-lg-text-light">GM Panel</span>
                            </span>
                </a>

                <a href="{{ route('gm.index') }}" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <span class="logo-lg-text-light">GM Panel</span>
                            </span>
                    <span class="logo-lg">
                                <span class="logo-lg-text-light">GM Panel</span>
                            </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="left-side-menu">

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{ route('gm.index') }}" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <span class="logo-lg-text-light">GM Panel</span>
                        </span>
                <span class="logo-lg">
                            <span class="logo-lg-text-light">GM Panel</span>
                        </span>
            </a>

            <a href="{{ route('gm.index') }}" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <span class="logo-lg-text-light">GM Panel</span>
                        </span>
                <span class="logo-lg">
                            <span class="logo-lg-text-light">GM Panel</span>
                        </span>
            </a>
        </div>

        <div class="h-100" data-simplebar>

            <!-- User box -->
            <div class="user-box text-center">
                <img src="{{ asset('/storage/'.Utils::ImagesLogo(auth()->user()->avatar)) }}" alt="user-img" title="Mat Helme"
                     class="rounded-circle avatar-md">
                <div class="dropdown">
                    <a href="#" class="text-reset dropdown-toggle h5 mt-2 mb-1 d-block"
                       data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
                    <div class="dropdown-menu user-pro-dropdown">

                        <!-- item-->
                        <a href="{{ route('user', ['overview']) }}" class="dropdown-item notify-item">
                            <i class="fe-user me-1"></i>
                            <span>@lang('navbar.navbar_33')</span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item notify-item">
                                <i class="fe-log-out me-1"></i>
                                <span>@lang('navbar.navbar_7')</span>
                            </a>
                        </form>

                    </div>
                </div>
                <p class="text-reset">Тикеты</p>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul id="side-menu">

                    <li class="menu-title">Меню</li>

                    <li>
                        <a href="{{ route('gm.index') }}">
                            <i class="ri-message-2-line"></i>
                            <span> Главная </span>
                        </a>
                    </li>

                    <li class="menu-title mt-2">Приложения</li>
                    <li>
                        <a href="{{ route('gm.ticket') }}">
                            <i class="ri-customer-service-2-line"></i>
                            <span> Тикеты </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gm.mute') }}">
                            <i class="ri-shield-user-line"></i>
                            <span> Муты </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="ri-message-2-line"></i>
                            <span> Чат </span>
                        </a>
                    </li>
                    <!--li>
                        <a href="#sidebarEmail" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarEmail">
                            <i class="ri-mail-line"></i>
                            <span> Email </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEmail">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="email-inbox.html">Inbox</a>
                                </li>
                                <li>
                                    <a href="email-read.html">Read Email</a>
                                </li>
                                <li>
                                    <a href="email-templates.html">Email Templates</a>
                                </li>
                            </ul>
                        </div>
                    </li-->
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="content-page">
        {{ $slot }}
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> &copy; WLGroup
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{ asset('gmassets/js/vendor.min.js') }}"></script>

@stack('scripts')

<script src="{{ asset('gmassets/js/app.min.js') }}"></script>

</body>
</html>
