<!DOCTYPE html>
<meta name="apple-mobile-web-app-title" content="XenForo">
<html id="XF" lang="ru-RU" dir="LTR"
      style="font-size: 62.5%;"
      data-app="public"
      data-template="forum_list"
      data-container-key=""
      data-content-key=""
      data-logged-in="true"
      data-cookie-prefix="xf_"
      data-csrf="1625472125,0aba17e4f6d71c91c8a44748384bbd0b"
      class="has-no-js template-forum_list  uix_page-- uix_hasSectionLinks "
>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title>@yield('title'){{ config('app.name_forum', __('forum.title')) }}</title>
    @yield('og')

    <meta name="theme-color" content="#2196f3" />
    <meta name="msapplication-TileColor" content="#2196F3">

    @stack('stylesheet')
    <link rel="preload" href="{{ asset('forum_test/styles/uix_dark/fonts/icons/material-icons/fonts/materialdesignicons-webfont.woff2') }}?v=5.5.55" as="font" type="font/woff2" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('forum_test/styles/uix_dark/fonts/icons/material-icons/css/materialdesignicons.min.css') }}" />
    <script src="{{ asset('forum_test/js/xf/preamble.min.js') }}?_v=8fc53ba3"></script>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="icon" type="image/png" href="{{ asset('forum_test/styles/uix_dark/images/favicon.png') }}" sizes="32x32" />
</head>

<body data-template="forum_list">
<style>
    .p-pageWrapper .p-navSticky {
        top: 40px !important;
    }

    .uix_mainTabBar {top: 130px !important;}
    .uix_stickyBodyElement:not(.offCanvasMenu) {
        top: 150px !important;
        min-height: calc(100vh - 150px) !important;
    }
    .uix_sidebarInner .uix_sidebar--scroller {margin-top: 150px;}
    .uix_sidebarInner {margin-top: -150px;}
    .p-body-sideNavInner .uix_sidebar--scroller {margin-top: 150px;}
    .p-body-sideNavInner {margin-top: -150px;}
    .uix_stickyCategoryStrips {top: 150px !important;}
    #XF .u-anchorTarget {
        height: 150px;
        margin-top: -150px;
    }

    @media (max-width: 900px) {

        .p-sectionLinks {display: none;}
        .uix_mainTabBar {top: 90px !important;}
        .uix_stickyBodyElement:not(.offCanvasMenu) {
            top: 110px !important;
            min-height: calc(100vh - 110px) !important;
        }
        .uix_sidebarInner .uix_sidebar--scroller {margin-top: 110px;}
        .uix_sidebarInner {margin-top: -110px;}
        .p-body-sideNavInner .uix_sidebar--scroller {margin-top: 110px;}
        .p-body-sideNavInner {margin-top: -110px;}
        .uix_stickyCategoryStrips {top: 110px !important;}
        #XF .u-anchorTarget {
            height: 110px;
            margin-top: -110px;
        }



    }



    .uix_sidebarNav .uix_sidebar--scroller {max-height: calc(100vh - 110px);}


</style>
<div id="jumpToTop"></div>
<div class="uix_pageWrapper--fixed">
    <div class="p-pageWrapper" id="top">
        <div class="p-staffBar " data-xf-init="sticky-header">
            <div class="pageContent">







                <div class="p-staffBar-inner hScroller" data-xf-init="h-scroller">
                    <div class="hScroller-scroll">






                        <a class="p-staffBar-link menuTrigger" data-xf-key="alt+m" data-xf-click="menu" role="button" tabindex="0" aria-expanded="false" aria-haspopup="true">Модератор</a>
                        <div class="menu" data-menu="menu" aria-hidden="true">
                            <div class="menu-content">
                                <h4 class="menu-header">Инструменты модератора</h4>



                                <a href="/index.php?approval-queue/" class="menu-linkRow">В ожидании одобрения</a>


                                <a href="/index.php?reports/" class="menu-linkRow" title="Last report update: 05.07.2021 в 08:43">Жалобы</a>



                            </div>
                        </div>



                        <a href="/admin.php" class="p-staffBar-link" target="_blank">Панель управления</a>



                        <a href="/admin.php" target="_blank" class="p-staffBar-link menuTrigger uix_adminTrigger" data-xf-click="menu" role="button" tabindex="0" aria-expanded="false" aria-haspopup="true">

                            Панель управления

                        </a>
                        <div class="menu" data-menu="menu" aria-hidden="true">
                            <div class="menu-content">
                                <h4 class="menu-header">Инструменты модератора</h4>



                                <a href="/admin.php" target="_blank" class="menu-linkRow">Панель управления</a>


                                <a href="/index.php?approval-queue/" class="menu-linkRow">В ожидании одобрения</a>


                                <a href="/index.php?reports/" class="menu-linkRow" title="Last report update: 05.07.2021 в 08:43">Жалобы</a>






                            </div>
                        </div>


                    </div>
                </div>





            </div>
        </div>
        <header class="p-header" id="header">
            <div class="p-header-inner">
                <div class="p-header-content">
                    <div class="p-header-logo p-header-logo--image">
                        <a class="uix_logo" href="{{ route('forums.index') }}">

                            <img src="{{ asset('forum_test/logo/6d.png') }}" srcset="{{ asset('forum_test/logo/6d.png') }} 2x" alt="XenForo"
                                 width="518" height="140" />

                        </a>

                        <a class="uix_logoSmall" href="{{ route('forums.index') }}">
                            <img src="{{ asset('forum_test/logo/6d.png') }}"
                                 alt="XenForo"
                            />
                        </a>

                    </div>
                    <div class="p-nav-opposite">
                        <div class="p-navgroup p-discovery">
                            <div class="uix_searchBar">
                                <div class="uix_searchBarInner">
                                    <form action="/index.php?search/search" method="post" class="uix_searchForm" data-xf-init="quick-search">
                                        <a class="uix_search--close">
                                            <i class="fa--xf far fa-window-close" aria-hidden="true"></i>
                                        </a>
                                        <input type="text" class="input js-uix_syncValue uix_searchInput uix_searchDropdown__trigger" autocomplete="off" data-uixsync="search" name="keywords" placeholder="Поиск..." aria-label="Поиск" data-menu-autofocus="true" />
                                        <a href="/index.php?search/"
                                           class="uix_search--settings u-ripple"
                                           data-xf-key="/"
                                           aria-label="Поиск"
                                           aria-expanded="false"
                                           aria-haspopup="true"
                                           title="Поиск">
                                            <i class="fa--xf far fa-cog" aria-hidden="true"></i>
                                        </a>
                                        <span class=" uix_searchIcon">
							<i class="fa--xf far fa-search" aria-hidden="true"></i>
						</span>
                                        <input type="hidden" name="_xfToken" value="1625472125,0aba17e4f6d71c91c8a44748384bbd0b" />
                                    </form>
                                </div>


                                <a class="uix_searchIconTrigger p-navgroup-link p-navgroup-link--iconic p-navgroup-link--search u-ripple"
                                   aria-label="Поиск"
                                   aria-expanded="false"
                                   aria-haspopup="true"
                                   title="Поиск">
                                    <i aria-hidden="true"></i>
                                </a>



                                <a href="/index.php?search/"
                                   class="p-navgroup-link p-navgroup-link--iconic p-navgroup-link--search u-ripple js-uix_minimalSearch__target"
                                   data-xf-click="menu"
                                   aria-label="Поиск"
                                   aria-expanded="false"
                                   aria-haspopup="true"
                                   title="Поиск">
                                    <i aria-hidden="true"></i>
                                </a>


                                <div class="menu menu--structural menu--wide" data-menu="menu" aria-hidden="true">
                                    <form action="/index.php?search/search" method="post"
                                          class="menu-content"
                                          data-xf-init="quick-search">
                                        <h3 class="menu-header">Поиск</h3>

                                        <div class="menu-row">

                                            <input type="text" class="input js-uix_syncValue" name="keywords" data-uixsync="search" placeholder="Поиск..." aria-label="Поиск" data-menu-autofocus="true" />

                                        </div>


                                        <div class="menu-row">
                                            <label class="iconic"><input type="checkbox"  name="c[title_only]" value="1" /><i aria-hidden="true"></i><span class="iconic-label">Искать только в заголовках</span></label>

                                        </div>

                                        <div class="menu-row">
                                            <div class="inputGroup">
                                                <span class="inputGroup-text" id="ctrl_search_menu_by_member">Автор:</span>
                                                <input type="text" class="input" name="c[users]" data-xf-init="auto-complete" placeholder="Пользователь" aria-labelledby="ctrl_search_menu_by_member" />
                                            </div>
                                        </div>
                                        <div class="menu-footer">
							<span class="menu-footer-controls">
								<button type="submit" class="button--primary button button--icon button--icon--search"><span class="button-text">Найти</span></button>
								<a href="/index.php?search/" class="button"><span class="button-text">Расширенный поиск...</span></a>
							</span>
                                        </div>

                                        <input type="hidden" name="_xfToken" value="1625472125,0aba17e4f6d71c91c8a44748384bbd0b" />
                                    </form>
                                </div>


                                <div class="menu menu--structural menu--wide uix_searchDropdown__menu" aria-hidden="true">
                                    <form action="/index.php?search/search" method="post"
                                          class="menu-content"
                                          data-xf-init="quick-search">


                                        <input name="keywords"
                                               class="js-uix_syncValue"
                                               data-uixsync="search"
                                               placeholder="Поиск..."
                                               aria-label="Поиск"
                                               type="hidden" />



                                        <div class="menu-row">
                                            <label class="iconic"><input type="checkbox"  name="c[title_only]" value="1" /><i aria-hidden="true"></i><span class="iconic-label">Искать только в заголовках</span></label>

                                        </div>

                                        <div class="menu-row">
                                            <div class="inputGroup">
                                                <span class="inputGroup-text">Автор:</span>
                                                <input class="input" name="c[users]" data-xf-init="auto-complete" placeholder="Пользователь" />
                                            </div>
                                        </div>
                                        <div class="menu-footer">
							<span class="menu-footer-controls">
								<button type="submit" class="button--primary button button--icon button--icon--search"><span class="button-text">Найти</span></button>
								<a href="/index.php?search/" class="button" rel="nofollow"><span class="button-text">th_advanced_uix...</span></a>
							</span>
                                        </div>

                                        <input type="hidden" name="_xfToken" value="1625472125,0aba17e4f6d71c91c8a44748384bbd0b" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @include('forum.navigation')
        @stack('header')
        <div class="p-body">
            <div class="p-body-inner ">
                <!--div class="blockMessage blockMessage--error blockMessage--errorUixAddon">
                    <h2 style="margin: 0 0 .5em 0">UI.X Error</h2>
                    <p>
                        It appears that you do not have the UI.X Add-on installed. Please install this add-on to ensure your style works as expected. You can download the UI.X add-on <a href="https://www.themehouse.com/xenforo/2/addons/uix-addon">here</a>.
                    </p>
                    <a href="https://www.themehouse.com/help/documentation/uix2" class="button--primary button"><span class="button-text">
									<i class="fa--xf far fa-exclamation-triangle" aria-hidden="true"></i> View Documentation
								</span></a>
                </div-->
                @yield('sidebar')
                <noscript><div class="blockMessage blockMessage--important blockMessage--iconic u-noJsOnly">JavaScript отключён. Для полноценно использования нашего сайта, пожалуйста, включите JavaScript в своём браузере.</div></noscript>
                <div class="blockMessage blockMessage--important blockMessage--iconic js-browserWarning" style="display: none">Вы используете устаревший браузер. Этот и другие сайты могут отображаться в нем неправильно.<br />Необходимо обновить браузер или попробовать использовать <a href="https://www.google.com/chrome/" target="_blank" rel="noopener">другой</a>.</div>

                <script type="text/template" id="xfReactTooltipTemplate">
                    <div class="tooltip-content-inner">
                        <div class="reactTooltip">

                            <a href="#" class="reaction reaction--1" data-reaction-id="1"><i aria-hidden="true"></i><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="reaction-sprite js-reaction" alt="Like" title="Like" data-xf-init="tooltip" data-extra-class="tooltip--basic tooltip--noninteractive" /></a>

                            <a href="#" class="reaction reaction--2" data-reaction-id="2"><i aria-hidden="true"></i><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="reaction-sprite js-reaction" alt="Love" title="Love" data-xf-init="tooltip" data-extra-class="tooltip--basic tooltip--noninteractive" /></a>

                            <a href="#" class="reaction reaction--3" data-reaction-id="3"><i aria-hidden="true"></i><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="reaction-sprite js-reaction" alt="Haha" title="Haha" data-xf-init="tooltip" data-extra-class="tooltip--basic tooltip--noninteractive" /></a>

                            <a href="#" class="reaction reaction--4" data-reaction-id="4"><i aria-hidden="true"></i><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="reaction-sprite js-reaction" alt="Wow" title="Wow" data-xf-init="tooltip" data-extra-class="tooltip--basic tooltip--noninteractive" /></a>

                            <a href="#" class="reaction reaction--5" data-reaction-id="5"><i aria-hidden="true"></i><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="reaction-sprite js-reaction" alt="Sad" title="Sad" data-xf-init="tooltip" data-extra-class="tooltip--basic tooltip--noninteractive" /></a>

                            <a href="#" class="reaction reaction--6" data-reaction-id="6"><i aria-hidden="true"></i><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="reaction-sprite js-reaction" alt="Angry" title="Angry" data-xf-init="tooltip" data-extra-class="tooltip--basic tooltip--noninteractive" /></a>

                        </div>
                    </div>
                </script>

                <div uix_component="MainContainer" class="uix_contentWrapper">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <footer class="p-footer" id="footer">
            <div class="p-footer-inner">
                <div class="pageContent">
                    <div class="p-footer-row">

                        <div class="p-footer-row-main">
                            <ul class="p-footer-linkList p-footer-choosers">
                                <li><a href="#" data-xf-click="overlay" data-xf-init="tooltip" title="Выбор языка" rel="nofollow"><i class="fa fa-globe" aria-hidden="true"></i> Русский (RU)</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="p-footer-row-opposite">
                        <ul class="p-footer-linkList">
                            <li><a href="{{ route('forums.index') }}" data-xf-click="overlay">Обратная связь</a></li>
                            <li><a href="{{ route('forums.index') }}">Условия и правила</a></li>
                            <li><a href="{{ route('forums.index') }}">Политика конфиденциальности</a></li>
                            <li><a href="{{ route('forums.index') }}">Помощь</a></li>
                            <li><a href="{{ route('index') }}">Главная</a></li>
                            <li><a href="#top" title="Верх" data-xf-click="scroll-to"><i class="fa fa-arrow-up" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <div class="uix_fabBar uix_fabBar--active">


            <div class="u-scrollButtons js-scrollButtons" data-trigger-type="both">
                <a href="#top" class="button--scroll ripple-JsOnly button" data-xf-click="scroll-to"><span class="button-text"><i class="fa--xf far fa-arrow-up" aria-hidden="true"></i><span class="u-srOnly">Верх</span></span></a>

                <a href="#footer" class="button--scroll ripple-JsOnly button" data-xf-click="scroll-to"><span class="button-text"><i class="fa--xf far fa-arrow-down" aria-hidden="true"></i><span class="u-srOnly">Низ</span></span></a>

            </div>



            <div class="p-title-pageAction">


                <a href="/index.php?forums/-/create-thread" class="button--cta button button--icon button--icon--write" data-xf-click="overlay"><span class="button-text">
			Создать тему...
		</span></a>

            </div>



        </div>
    </div>
</div>
<div class="u-bottomFixer js-bottomFixTarget"></div>
<script>
    if (typeof (window.themehouse) !== 'object') {
        window.themehouse = {};
    }
    if (typeof (window.themehouse.settings) !== 'object') {
        window.themehouse.settings = {};
    }
    window.themehouse.settings = {
        common: {
            '20180112': {
                init: false,
            },
        },
        data: {
            version: '2.2.1.0.0',
            jsVersion: 'No JS Files',
            templateVersion: '2.1.8.0_Release',
            betaMode: 0,
            theme: '',
            url: 'http://akaunting.loc/',
            user: '1',
        },
        inputSync: {},
        minimalSearch: {
            breakpoint: "900",
            dropdownBreakpoint: "900",
        },
        sidebar: {
            enabled: '',
            link: '/index.php?uix/toggle-sidebar.json&amp;t=1625472125%2C0aba17e4f6d71c91c8a44748384bbd0b',
            state: '',
        },
        sidebarNav: {
            enabled: '',
            link: '/index.php?uix/toggle-sidebar-navigation.json&amp;t=1625472125%2C0aba17e4f6d71c91c8a44748384bbd0b',
            state: '',
        },
        fab: {
            enabled: 1,
        },
        checkRadius: {
            enabled: 0,
            selectors: '.p-footer-inner, .uix_extendedFooter, .p-nav, .p-sectionLinks, .p-staffBar, .p-header, #wpadminbar',
        },
        nodes: {
            enabled: 0,
        },
        nodesCollapse: {
            enabled: '',
            link: '/index.php?uix/toggle-category.json&amp;t=1625472125%2C0aba17e4f6d71c91c8a44748384bbd0b',
            state: '',
        },
        widthToggle: {
            enabled: '',
            link: '/index.php?uix/toggle-width.json&amp;t=1625472125%2C0aba17e4f6d71c91c8a44748384bbd0b',
            state: '',
        },
    }

    window.document.addEventListener('DOMContentLoaded', function() {

        try {
            window.themehouse.common['20180112'].init();
        } catch(e) {
            console.log('Error caught', e);
        }



        var jsVersionPrefix = 'No JS Files';
        if (typeof(window.themehouse.settings.data.jsVersion) === 'string') {
            var jsVersionSplit = window.themehouse.settings.data.jsVersion.split('_');
            if (jsVersionSplit.length) {
                jsVersionPrefix = jsVersionSplit[0];
            }
        }
        var templateVersionPrefix = 'No JS Template Version';
        if (typeof(window.themehouse.settings.data.templateVersion) === 'string') {
            var templateVersionSplit = window.themehouse.settings.data.templateVersion.split('_');
            if (templateVersionSplit.length) {
                templateVersionPrefix = templateVersionSplit[0];
            }
        }
        if (jsVersionPrefix !== templateVersionPrefix) {
            var splitFileVersion = jsVersionPrefix.split('.');
            var splitTemplateVersion = templateVersionPrefix.split('.');
            console.log('version mismatch', jsVersionPrefix, templateVersionPrefix);
        }

    });
</script>
@stack('scripts')
<script>
    $(document).ready(function() {
        var ua = navigator.userAgent.toLowerCase();
        var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");

        if(isAndroid) {
            $('html').addClass('device--isAndroid');
        }
    })
</script>
<script>

    $(document).ready(function() {
        var sidebar = $('.p-body-sidebar');
        var backdrop = $('.p-body-sidebar [data-ocm-class="offCanvasMenu-backdrop"]');

        $('.uix_sidebarCanvasTrigger').click(function(e) {
            e.preventDefault();
            sidebar.addClass('offCanvasMenu offCanvasMenu--blocks is-active is-transitioning');
            $('body').addClass('sideNav--open');

            window.setTimeout(function() {
                sidebar.removeClass('is-transitioning');
            }, 250);

            $('.uix_sidebarInner').addClass('offCanvasMenu-content');
            backdrop.addClass('offCanvasMenu-backdrop');
            $('body').addClass('is-modalOpen');
        });

        backdrop.click(function() {
            sidebar.addClass('is-transitioning');
            sidebar.removeClass('is-active');

            window.setTimeout(function() {
                sidebar.removeClass('offCanvasMenu offCanvasMenu--blocks is-transitioning');
                $('.uix_sidebarInner').removeClass('offCanvasMenu-content');
                backdrop.removeClass('offCanvasMenu-backdrop');
                $('body').removeClass('is-modalOpen');
            }, 250);
        })
    });

</script>
<script>

    /****** OFF CANVAS ***/
    $(document).ready(function() {
        var panels = {
            navigation: {
                position: 1
            },
            account: {
                position: 2
            },
            inbox: {
                position: 3
            },
            alerts: {
                position: 4
            }
        };


        var tabsContainer = $('.sidePanel__tabs');

        var activeTab = 'navigation';

        var activeTabPosition = panels[activeTab].position;

        var generateDirections = function() {
            $('.sidePanel__tabPanel').each(function() {
                var tabPosition = $(this).attr('data-content');
                var activeTabPosition = panels[activeTab].position;

                if (tabPosition != activeTab) {
                    if (panels[tabPosition].position < activeTabPosition) {
                        $(this).addClass('is-left');
                    }

                    if (panels[tabPosition].position > activeTabPosition) {
                        $(this).addClass('is-right');
                    }
                }
            });
        };

        generateDirections();

        $('.sidePanel__tab').click(function() {
            $(tabsContainer).find('.sidePanel__tab').removeClass('sidePanel__tab--active');
            $(this).addClass('sidePanel__tab--active');

            activeTab = $(this).attr('data-attr');

            $('.sidePanel__tabPanel').removeClass('is-active');

            $('.sidePanel__tabPanel[data-content="' + activeTab + '"]').addClass('is-active');
            $('.sidePanel__tabPanel').removeClass('is-left').removeClass('is-right');
            generateDirections();
        });
    });

    /******** extra info post toggle ***********/

    $(document).ready(function() {
        XF.thThreadsUserExtraTrigger = XF.Click.newHandler({
            eventNameSpace: 'XFthThreadsUserExtraTrigger',

            init: function(e) {},

            click: function(e)
            {
                var parent =  this.$target.parents('.message-user');
                var triggerContainer = this.$target.parent('.thThreads__userExtra--toggle');
                var container = triggerContainer.siblings('.thThreads__message-userExtras');
                var child = container.find('.message-userExtras');
                var eleHeight = child.height();
                if (parent.hasClass('userExtra--expand')) {
                    container.css({ height: eleHeight });
                    parent.toggleClass('userExtra--expand');
                    window.setTimeout(function() {
                        container.css({ height: '0' });
                        window.setTimeout(function() {
                            container.css({ height: '' });
                        }, 200);
                    }, 17);

                } else {
                    container.css({ height: eleHeight });
                    window.setTimeout(function() {
                        parent.toggleClass('userExtra--expand');
                        container.css({ height: '' });
                    }, 200);
                }
            }
        });

        XF.Click.register('ththreads-userextra-trigger', 'XF.thThreadsUserExtraTrigger');
    });

    /******** Backstretch images ***********/

    $(document).ready(function() {
        if ( 0 ) {

            $("body").addClass('uix__hasBackstretch');

            $("body").backstretch([

            ], {
                duration: 4000,
                fade: 500
            });

            $("body").css("zIndex","");
        }
    });

    // sidenav canvas blur fix

    $(document).ready(function(){
        $('.p-body-sideNavTrigger .button').click(function(){
            $('body').addClass('sideNav--open');
        });
    })

    $(document).ready(function(){
        $("[data-ocm-class='offCanvasMenu-backdrop']").click(function(){
            $('body').removeClass('sideNav--open');
        });
    })

    $(document).on('editor:start', function (m, ed) {
        if (typeof (m) !== 'undefined' && typeof (m.target) !== 'undefined') {
            var ele = $(m.target);
            if (ele.hasClass('js-editor')) {
                var wrapper = ele.closest('.message-editorWrapper');
                if (wrapper.length) {
                    window.setTimeout(function() {
                        var innerEle = wrapper.find('.fr-element');
                        if (innerEle.length) {
                            innerEle.focus(function (e) {
                                $('html').addClass('uix_editor--focused')
                            });
                            innerEle.blur(function (e) {
                                $('html').removeClass('uix_editor--focused')
                            });
                        }
                    }, 0);
                }
            }
        }
    });

    // off canvas menu closer keyboard shortcut
    $(document).ready(function() {
        $(document.body).onPassive('keyup', function(e) {
            switch (e.key) {
                case 'Escape':
                    $('.offCanvasMenu.is-active .offCanvasMenu-backdrop').click();
                    return;
            }
        });
    });

</script>
<script>

    $(document).ready(function() {
        var uixMegaHovered = false;
        $('.uix-navEl--hasMegaMenu').hoverIntent({
            over: function() {
                if (uixMegaHovered) {
                    menu = $(this).attr('data-nav-id');

                    $('.p-nav').addClass('uix_showMegaMenu');

                    $('.uix_megaMenu__content').removeClass('uix_megaMenu__content--active');

                    $('.uix_megaMenu__content--' + menu).addClass('uix_megaMenu__content--active');
                }
            },
            timeout: 200,
        });

        $('.p-nav').mouseenter(function() {
            uixMegaHovered = true;
        });

        $('.p-nav').mouseleave(function() {
            $(this).removeClass('uix_showMegaMenu');
            uixMegaHovered = false;
        });
    });

</script>
<script>

    /******** signature collapse toggle ***********/
    $(window).on('load', function() {
        window.setTimeout(function() {
            var maxHeight = 100;

            /*** check if expandable ***/
            var eles = [];

            $('.message-signature').each(function() {
                var height = $(this).height();
                if (height > maxHeight) {
                    eles.push($(this));
                }
            });

            for (var i = 0; i < eles.length; i++) {
                eles[i].addClass('message-signature--expandable');
            };

            /**** expand function ***/
            var expand = function(container, canClose) {
                var inner = container.find('.bbWrapper');
                var eleHeight = inner.height();
                var isExpanded = container.hasClass('message-signature--expanded');

                if (isExpanded) {
                    if (canClose) {
                        container.css({ height: eleHeight });
                        container.removeClass('message-signature--expanded');
                        window.setTimeout(function() {
                            container.css({ height: maxHeight });
                            window.setTimeout(function() {
                                container.css({ height: '' });
                            }, 200);
                        }, 17);
                    }

                } else {
                    container.css({ height: eleHeight });
                    window.setTimeout(function() {
                        container.addClass('message-signature--expanded');
                        container.css({ height: '' });
                    }, 200);
                }
            }

            /*** handle hover ***/


            /*** handle click ***/
            $('.uix_signatureExpand').click(function() {
                var container =  $(this).parent('.message-signature');
                expand(container, true);
            });
        }, 0);
    });

</script>
<script>
    jQuery.extend(true, XF.config, {
        //
        userId: 1,
        enablePush: false,
        pushAppServerKey: '',
        url: {
            fullBase: '{{ route('index') }}',
            basePath: '/',
            css: '/css.php?css=__SENTINEL__&s=3&l=2&d=1625471874',
            keepAlive: '/index.php?login/keep-alive'
        },
        cookie: {
            path: '/',
            domain: '',
            prefix: 'xf_',
            secure: false
        },
        cacheKey: 'bf588983c33a9bb44c9204c3c86fa9d5',
        csrf: '1625472125,0aba17e4f6d71c91c8a44748384bbd0b',
        js: {"\/forum_test\/js\/themehouse\/uix_dark\/ripple.min.js?_v=8fc53ba3":true,"\/forum_test\/js\/themehouse\/global\/20180112.min.js?_v=8fc53ba3":true,"\/forum_test\/js\/themehouse\/uix_dark\/index.min.js?_v=8fc53ba3":true,"\/forum_test\/js\/themehouse\/uix_dark\/vendor\/hover-intent\/jquery.hoverIntent.min.js?_v=8fc53ba3":true},
        css: {"public:node_list.less":true,"public:share_controls.less":true,"public:uix.less":true,"public:uix_socialMedia.less":true,"public:extra.less":true},
        time: {
            now: 1625472125,
            today: 1625439600,
            todayDow: 1,
            tomorrow: 1625526000,
            yesterday: 1625353200,
            week: 1624921200
        },
        borderSizeFeature: '2px',
        fontAwesomeWeight: 'r',
        enableRtnProtect: true,
        enableFormSubmitSticky: true,
        uploadMaxFilesize: 52428800,
        allowedVideoExtensions: ["m4v","mov","mp4","mp4v","mpeg","mpg","ogv","webm"],
        allowedAudioExtensions: ["mp3","ogg","wav"],
        shortcodeToEmoji: true,
        visitorCounts: {
            conversations_unread: '0',
            alerts_unviewed: '0',
            total_unread: '0',
            title_count: true,
            icon_indicator: true
        },
        jsState: {},
        publicMetadataLogoUrl: '',
        publicPushBadgeUrl: 'http://akaunting.loc/styles/default/xenforo/bell.png'
    });

    jQuery.extend(XF.phrases, {
        //
        date_x_at_time_y: "{date} в {time}",
        day_x_at_time_y:  "{day} в {time}",
        yesterday_at_x:   "Вчера в {time}",
        x_minutes_ago:    "{minutes} мин. назад",
        one_minute_ago:   "Минуту назад",
        a_moment_ago:     "Только что",
        today_at_x:       "Сегодня в {time}",
        in_a_moment:      "Через секунду",
        in_a_minute:      "Через минуту",
        in_x_minutes:     "Через {minutes} мин.",
        later_today_at_x: "Сегодня в {time}",
        tomorrow_at_x:    "Завтра в {time}",

        day0: "Воскресенье",
        day1: "Понедельник",
        day2: "Вторник",
        day3: "Среда",
        day4: "Четверг",
        day5: "Пятница",
        day6: "Суббота",

        dayShort0: "Вс",
        dayShort1: "Пн",
        dayShort2: "Вт",
        dayShort3: "Ср",
        dayShort4: "Чт",
        dayShort5: "Пт",
        dayShort6: "Сб",

        month0: "Январь",
        month1: "Февраль",
        month2: "Март",
        month3: "Апрель",
        month4: "Май",
        month5: "Июнь",
        month6: "Июль",
        month7: "Август",
        month8: "Сентябрь",
        month9: "Октябрь",
        month10: "Ноябрь",
        month11: "Декабрь",

        active_user_changed_reload_page: "Ваша сессия истекла. Перезагрузите страницу.",
        server_did_not_respond_in_time_try_again: "Сервер не ответил вовремя. Пожалуйста, попробуйте снова.",
        oops_we_ran_into_some_problems: "Упс! Мы столкнулись с некоторыми проблемами.",
        oops_we_ran_into_some_problems_more_details_console: "Упс! Мы столкнулись с некоторыми проблемами. Пожалуйста, попробуйте позже. Более детальную информацию об ошибке Вы можете посмотреть в консоли браузера",
        file_too_large_to_upload: "Файл слишком большой для загрузки.",
        uploaded_file_is_too_large_for_server_to_process: "Загружаемый файл слишком большой для обработки сервером.",
        files_being_uploaded_are_you_sure: "Файлы ещё загружаются. Вы уверены, что хотите отправить эту форму?",
        attach: "Прикрепить файлы",
        rich_text_box: "Текстовое поле с поддержкой форматирования",
        close: "Закрыть",
        link_copied_to_clipboard: "Ссылка скопирована в буфер обмена.",
        text_copied_to_clipboard: "Текст скопирован в буфер обмена.",
        loading: "Загрузка...",

        processing: "Обработка",
        'processing...': "Обработка...",

        showing_x_of_y_items: "Показано {count} из {total} элементов",
        showing_all_items: "Показаны все элементы",
        no_items_to_display: "Нет элементов для отображения",

        number_button_up: "Увеличить",
        number_button_down: "Уменьшить",

        push_enable_notification_title: "Push-уведомления для сайта XenForo успешно включены",
        push_enable_notification_body: "Спасибо за включение push-уведомлений!"
    });
</script>
<form style="display:none" hidden="hidden">
    <input type="text" name="_xfClientLoadTime" value="" id="_xfClientLoadTime" title="_xfClientLoadTime" tabindex="-1" />
</form>
<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "WebSite",
			"url": "http://akaunting.loc/index.php",
			"potentialAction": {
				"@type": "SearchAction",
				"target": "http://akaunting.loc/index.php?search/search&keywords={search_keywords}",
				"query-input": "required name=search_keywords"
			}
		}
		</script>
<script type="text/template" id="xfReactTooltipTemplate">
    <div class="tooltip-content-inner">
        <div class="reactTooltip">

            <a href="#" class="reaction reaction--1" data-reaction-id="1"><i aria-hidden="true"></i><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="reaction-sprite js-reaction" alt="Like" title="Like" data-xf-init="tooltip" data-extra-class="tooltip--basic tooltip--noninteractive" /></a>

            <a href="#" class="reaction reaction--2" data-reaction-id="2"><i aria-hidden="true"></i><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="reaction-sprite js-reaction" alt="Love" title="Love" data-xf-init="tooltip" data-extra-class="tooltip--basic tooltip--noninteractive" /></a>

            <a href="#" class="reaction reaction--3" data-reaction-id="3"><i aria-hidden="true"></i><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="reaction-sprite js-reaction" alt="Haha" title="Haha" data-xf-init="tooltip" data-extra-class="tooltip--basic tooltip--noninteractive" /></a>

            <a href="#" class="reaction reaction--4" data-reaction-id="4"><i aria-hidden="true"></i><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="reaction-sprite js-reaction" alt="Wow" title="Wow" data-xf-init="tooltip" data-extra-class="tooltip--basic tooltip--noninteractive" /></a>

            <a href="#" class="reaction reaction--5" data-reaction-id="5"><i aria-hidden="true"></i><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="reaction-sprite js-reaction" alt="Sad" title="Sad" data-xf-init="tooltip" data-extra-class="tooltip--basic tooltip--noninteractive" /></a>

            <a href="#" class="reaction reaction--6" data-reaction-id="6"><i aria-hidden="true"></i><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="reaction-sprite js-reaction" alt="Angry" title="Angry" data-xf-init="tooltip" data-extra-class="tooltip--basic tooltip--noninteractive" /></a>

        </div>
    </div>
</script>
</body>
</html>
