<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('assetsgm/img/icons/icon-48x48.png') }}" />

    <title>Панель ГМ</title>

    <link href="{{ asset('assetsgm/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    @stack('css')
</head>

<body>
<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{ route('gm.index') }}">
                <span class="align-middle">Панель ГМ</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Меню
                </li>

                <li class="sidebar-item {{ request()->routeIs('gm.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('gm.index') }}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Главная</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('gm.ticket') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('gm.ticket') }}">
                        <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Тикеты</span>
                    </a>
                </li>

                <!--li class="sidebar-item">
                    <a class="sidebar-link" href="pages-profile.html">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                    </a>
                </li-->

            </ul>

        </div>
    </nav>

    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle js-sidebar-toggle">
                <i class="hamburger align-self-center"></i>
            </a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                            <div class="position-relative">
                                <i class="align-middle" data-feather="bell"></i>
                                <span class="indicator">0</span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                            <div class="dropdown-menu-header">
                                Нет новых уведомлений
                            </div>
                            <!--div class="list-group">
                                <a href="#" class="list-group-item">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-2">
                                            <i class="text-danger" data-feather="alert-circle"></i>
                                        </div>
                                        <div class="col-10">
                                            <div class="text-dark">Update completed</div>
                                            <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
                                            <div class="text-muted small mt-1">30m ago</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div-- class="dropdown-menu-footer">
                                <a href="#" class="text-muted">Show all notifications</a>
                            </div-->
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                            <div class="position-relative">
                                <i class="align-middle" data-feather="message-square"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
                            <div class="dropdown-menu-header">
                                <div class="position-relative">
                                    Нет новых сообщений
                                </div>
                            </div>
                            <!--div class="list-group">
                                <a href="#" class="list-group-item">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-2">
                                            <img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
                                        </div>
                                        <div class="col-10 ps-2">
                                            <div class="text-dark">Vanessa Tucker</div>
                                            <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
                                            <div class="text-muted small mt-1">15m ago</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-menu-footer">
                                <a href="#" class="text-muted">Show all messages</a>
                            </div-->
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                        </a>

                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                            <img src="{{ asset('/storage/'.Utils::ImagesLogo(auth()->user()->avatar)) }}" class="avatar img-fluid rounded me-1" alt="{{ auth()->user()->name }}" />
                            <span class="text-dark">{{ auth()->user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('user', ['overview']) }}"><i class="align-middle me-1" data-feather="user"></i> @lang('navbar.navbar_33')</a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">@lang('navbar.navbar_7')</a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        {{ $slot }}

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <a class="text-muted" href="{{ route('index') }}" target="_blank"><strong>WLGroup</strong></a> &copy;
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{ asset('assetsgm/js/app.js') }}"></script>
@stack('scripts')

</body>

</html>
