<div class="p-navSticky p-navSticky--all " data-top-offset-breakpoints="
						[
							{
								&quot;breakpoint&quot;: &quot;0&quot;,
								&quot;offset&quot;: &quot;0&quot;
							}


							,{
								&quot;breakpoint&quot;: &quot;0&quot;,
								&quot;offset&quot;: &quot;40px&quot;
							}

						]
					" data-xf-init="sticky-header">

    <nav class="p-nav">
        <div class="p-nav-inner">





            <a class="p-nav-menuTrigger  badgeContainer" data-badge="0" data-xf-click="off-canvas" data-menu=".js-headerOffCanvasMenu" role="button" tabindex="0">
                <i aria-hidden="true"></i>
                <span class="p-nav-menuText">Меню</span>
            </a>





            <div class="p-header-logo p-header-logo--image">
                <a class="uix_logo" href="{{ route('forums.index') }}">

                    <img src="{{ asset('forum_test/logo/6d.png') }}" srcset="{{ asset('forum_test/logo/6d.png') }} 2x" alt="XenForo"
                         width="" height="" />

                </a>

                <a class="uix_logoSmall" href="{{ route('forums.index') }}">
                    <img src="{{ asset('forum_test/logo/6d.png') }}"
                         alt="XenForo"
                    />
                </a>

            </div>





            <div class="p-nav-scroller hScroller" data-xf-init="h-scroller" data-auto-scroll=".p-navEl.is-selected">
                <div class="hScroller-scroll">
                    <ul class="p-nav-list js-offCanvasNavSource">
                        <li>
                            <div class="p-navEl u-ripple " >
                                <a href="{{ route('index') }}"
                                   class="p-navEl-link  "

                                   data-xf-key="1"
                                   data-nav-id="home"><span>Главная</span></a>
                            </div>
                        </li>
                        <li>

                            <div class="p-navEl u-ripple is-selected" data-has-children="true">




                                <a href="{{ route('forums.index') }}"
                                   class="p-navEl-link p-navEl-link--splitMenu "


                                   data-nav-id="forums"><span>Форум</span></a>


                                <a data-xf-key="2"
                                   data-xf-click="menu"
                                   data-menu-pos-ref="< .p-navEl"
                                   class="p-navEl-splitTrigger"
                                   role="button"
                                   tabindex="0"
                                   aria-label="Переключатель раскрытия"
                                   aria-expanded="false"
                                   aria-haspopup="true">
                                </a>




                                <div class="menu menu--structural" data-menu="menu" aria-hidden="true">
                                    <div class="menu-content">




                                        <a href="/index.php?whats-new/posts/"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "


                                           data-nav-id="newPosts"><span>Новые сообщения</span></a>







                                        <a href="/index.php?find-threads/started"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "


                                           data-nav-id="findThreads"><span>Поиск тем</span></a>






                                        <a href="/index.php?find-threads/started"
                                           class="menu-linkRow u-ripple u-indentDepth1 js-offCanvasCopy "


                                           data-nav-id="yourThreads"><span>Ваши темы</span></a>







                                        <a href="/index.php?find-threads/contributed"
                                           class="menu-linkRow u-ripple u-indentDepth1 js-offCanvasCopy "


                                           data-nav-id="contributedThreads"><span>Темы с Вашими сообщениями</span></a>







                                        <a href="/index.php?find-threads/unanswered"
                                           class="menu-linkRow u-ripple u-indentDepth1 js-offCanvasCopy "


                                           data-nav-id="unansweredThreads"><span>Темы без ответов</span></a>





                                        <hr class="menu-separator" />







                                        <a href="/index.php?watched/threads"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "


                                           data-nav-id="watched"><span>Отслеживаемые</span></a>






                                        <a href="/index.php?watched/threads"
                                           class="menu-linkRow u-ripple u-indentDepth1 js-offCanvasCopy "


                                           data-nav-id="watchedThreads"><span>Отслеживаемые темы</span></a>







                                        <a href="/index.php?watched/forums"
                                           class="menu-linkRow u-ripple u-indentDepth1 js-offCanvasCopy "


                                           data-nav-id="watchedForums"><span>Отслеживаемые разделы</span></a>





                                        <hr class="menu-separator" />







                                        <a href="/index.php?search/&amp;type=post"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "


                                           data-nav-id="searchForums"><span>Поиск по форуму</span></a>







                                        <a href="/index.php?forums/-/mark-read&amp;date=1625472125"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "
                                           data-xf-click="overlay"

                                           data-nav-id="markForumsRead"><span>Отметить разделы прочитанными</span></a>




                                    </div>
                                </div>







                            </div>

                        </li>

                        <li>

                            <div class="p-navEl u-ripple " data-has-children="true">




                                <a href="/index.php?whats-new/"
                                   class="p-navEl-link p-navEl-link--splitMenu "


                                   data-nav-id="whatsNew"><span>Что нового</span></a>


                                <a data-xf-key="3"
                                   data-xf-click="menu"
                                   data-menu-pos-ref="< .p-navEl"
                                   class="p-navEl-splitTrigger"
                                   role="button"
                                   tabindex="0"
                                   aria-label="Переключатель раскрытия"
                                   aria-expanded="false"
                                   aria-haspopup="true">
                                </a>




                                <div class="menu menu--structural" data-menu="menu" aria-hidden="true">
                                    <div class="menu-content">




                                        <a href="/index.php?whats-new/posts/"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "
                                           rel="nofollow"

                                           data-nav-id="whatsNewPosts"><span>Новые сообщения</span></a>







                                        <a href="/index.php?whats-new/profile-posts/"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "
                                           rel="nofollow"

                                           data-nav-id="whatsNewProfilePosts"><span>Новые сообщения в профиле</span></a>







                                        <a href="/index.php?whats-new/news-feed"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "
                                           rel="nofollow"

                                           data-nav-id="whatsNewNewsFeed"><span>Ваша лента новостей</span></a>







                                        <a href="/index.php?whats-new/latest-activity"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "
                                           rel="nofollow"

                                           data-nav-id="latestActivity"><span>Недавняя активность</span></a>




                                    </div>
                                </div>







                            </div>

                        </li>

                        <li>

                            <div class="p-navEl u-ripple " data-has-children="true">




                                <a href="/index.php?members/"
                                   class="p-navEl-link p-navEl-link--splitMenu "


                                   data-nav-id="members"><span>Пользователи</span></a>


                                <a data-xf-key="4"
                                   data-xf-click="menu"
                                   data-menu-pos-ref="< .p-navEl"
                                   class="p-navEl-splitTrigger"
                                   role="button"
                                   tabindex="0"
                                   aria-label="Переключатель раскрытия"
                                   aria-expanded="false"
                                   aria-haspopup="true">
                                </a>




                                <div class="menu menu--structural" data-menu="menu" aria-hidden="true">
                                    <div class="menu-content">




                                        <a href="/index.php?online/"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "


                                           data-nav-id="currentVisitors"><span>Сейчас на форуме</span></a>







                                        <a href="/index.php?whats-new/profile-posts/"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "
                                           rel="nofollow"

                                           data-nav-id="newProfilePosts"><span>Новые сообщения в профиле</span></a>







                                        <a href="/index.php?search/&amp;type=profile_post"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "


                                           data-nav-id="searchProfilePosts"><span>Поиск сообщений в профиле</span></a>




                                    </div>
                                </div>







                            </div>

                        </li>

                    </ul>
                </div>
            </div>

            <div class="p-nav-opposite">

                <div class="p-navgroup p-account p-navgroup--member">

                    <a href="{{ route('forums.profile') }}" class="p-navgroup-link u-ripple p-navgroup-link--iconic p-navgroup-link--user rippleButton" data-xf-click="menu" data-xf-key="m" data-menu-pos-ref="< .p-navgroup" aria-expanded="false" aria-haspopup="true">
				        <span class="avatar avatar--xxs" data-user-id="1" title="Thanos">
                            <img src="{{ asset('/storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}" class="avatar-u1-s" width="48" height="48" loading="lazy">
                        </span>
                        <span class="p-navgroup-linkText">{{ auth()->user()->name }}</span>
                        <div class="ripple-container"></div>
                    </a>
                    <div class="menu menu--structural menu--wide menu--account" data-menu="menu" aria-hidden="true"
                         data-href="{{ route('forums.profile') }}"
                         data-load-target=".js-visitorMenuBody">
                        <div class="menu-content js-visitorMenuBody">
                            <div class="menu-row">
                                Загрузка...
                            </div>
                        </div>
                    </div>

                    <a href="/index.php?conversations/"
                       class="p-navgroup-link u-ripple p-navgroup-link--iconic p-navgroup-link--conversations js-badge--conversations badgeContainer"
                       data-badge="0"
                       data-xf-click="menu"
                       data-xf-key=","
                       data-menu-pos-ref="< .p-navgroup"
                       aria-label="Входящие"
                       aria-expanded="false"
                       aria-haspopup="true">
                        <i aria-hidden="true"></i>
                        <span class="p-navgroup-linkText"></span>
                    </a>
                    <div class="menu menu--structural menu--medium" data-menu="menu" aria-hidden="true"
                         data-href="/index.php?conversations/popup"
                         data-nocache="true"
                         data-load-target=".js-convMenuBody">
                        <div class="menu-content">
                            <h3 class="menu-header">Переписки</h3>
                            <div class="js-convMenuBody">
                                <div class="menu-row">Загрузка...</div>
                            </div>
                            <div class="menu-footer menu-footer--split">
                                <div class="menu-footer-main">
                                    <ul class="listInline listInline--bullet">
                                        <li><a href="/index.php?conversations/">Показать все</a></li>

                                        <li><a href="/index.php?conversations/add">Начать новую переписку</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="/index.php?account/alerts"
                       class="p-navgroup-link u-ripple p-navgroup-link--iconic p-navgroup-link--alerts js-badge--alerts badgeContainer"
                       data-badge="0"
                       data-xf-click="menu"
                       data-xf-key="."
                       data-menu-pos-ref="< .p-navgroup"
                       aria-label="Оповещения"
                       aria-expanded="false"
                       aria-haspopup="true">
                        <i aria-hidden="true"></i>
                        <span class="p-navgroup-linkText"></span>
                    </a>
                    <div class="menu menu--structural menu--medium" data-menu="menu" aria-hidden="true"
                         data-href="/index.php?account/alerts-popup"
                         data-nocache="true"
                         data-load-target=".js-alertsMenuBody">
                        <div class="menu-content">
                            <h3 class="menu-header">Оповещения</h3>
                            <div class="js-alertsMenuBody">
                                <div class="menu-row">Загрузка...</div>
                            </div>
                            <div class="menu-footer menu-footer--split">
                                <div class="menu-footer-main">
                                    <ul class="listInline listInline--bullet">
                                        <li><a href="/index.php?account/alerts">Показать все</a></li>
                                        <li><a href="/index.php?account/alerts/mark-read" class="js-alertsMarkRead">Отметить прочитанным</a></li>
                                        <li><a href="/index.php?account/preferences">Настройки</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    </nav>
    <div class="p-sectionLinks">
        <div class="pageContent">
            <div class="p-sectionLinks-inner hScroller" data-xf-init="h-scroller">
                <div class="hScroller-scroll">
                    <ul class="p-sectionLinks-list">

                        <li>

                            <div class="p-navEl u-ripple " >




                                <a href="/index.php?whats-new/posts/"
                                   class="p-navEl-link  "

                                   data-xf-key="alt+1"
                                   data-nav-id="newPosts"><span>Новые сообщения</span></a>









                            </div>

                        </li>

                        <li>

                            <div class="p-navEl u-ripple " data-has-children="true">




                                <a href="/index.php?find-threads/started"
                                   class="p-navEl-link p-navEl-link--splitMenu "


                                   data-nav-id="findThreads"><span>Поиск тем</span></a>


                                <a data-xf-key="alt+2"
                                   data-xf-click="menu"
                                   data-menu-pos-ref="< .p-navEl"
                                   class="p-navEl-splitTrigger"
                                   role="button"
                                   tabindex="0"
                                   aria-label="Переключатель раскрытия"
                                   aria-expanded="false"
                                   aria-haspopup="true">
                                </a>




                                <div class="menu menu--structural" data-menu="menu" aria-hidden="true">
                                    <div class="menu-content">




                                        <a href="/index.php?find-threads/started"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "


                                           data-nav-id="yourThreads"><span>Ваши темы</span></a>







                                        <a href="/index.php?find-threads/contributed"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "


                                           data-nav-id="contributedThreads"><span>Темы с Вашими сообщениями</span></a>







                                        <a href="/index.php?find-threads/unanswered"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "


                                           data-nav-id="unansweredThreads"><span>Темы без ответов</span></a>




                                    </div>
                                </div>







                            </div>

                        </li>

                        <li>

                            <div class="p-navEl u-ripple " data-has-children="true">




                                <a href="/index.php?watched/threads"
                                   class="p-navEl-link p-navEl-link--splitMenu "


                                   data-nav-id="watched"><span>Отслеживаемые</span></a>


                                <a data-xf-key="alt+3"
                                   data-xf-click="menu"
                                   data-menu-pos-ref="< .p-navEl"
                                   class="p-navEl-splitTrigger"
                                   role="button"
                                   tabindex="0"
                                   aria-label="Переключатель раскрытия"
                                   aria-expanded="false"
                                   aria-haspopup="true">
                                </a>




                                <div class="menu menu--structural" data-menu="menu" aria-hidden="true">
                                    <div class="menu-content">




                                        <a href="/index.php?watched/threads"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "


                                           data-nav-id="watchedThreads"><span>Отслеживаемые темы</span></a>







                                        <a href="/index.php?watched/forums"
                                           class="menu-linkRow u-ripple u-indentDepth0 js-offCanvasCopy "


                                           data-nav-id="watchedForums"><span>Отслеживаемые разделы</span></a>




                                    </div>
                                </div>







                            </div>

                        </li>

                        <li>

                            <div class="p-navEl u-ripple " >




                                <a href="/index.php?search/&amp;type=post"
                                   class="p-navEl-link  "

                                   data-xf-key="alt+4"
                                   data-nav-id="searchForums"><span>Поиск по форуму</span></a>









                            </div>

                        </li>

                        <li>

                            <div class="p-navEl u-ripple " >




                                <a href="/index.php?forums/-/mark-read&amp;date=1625472125"
                                   class="p-navEl-link  "
                                   data-xf-click="overlay"
                                   data-xf-key="alt+5"
                                   data-nav-id="markForumsRead"><span>Отметить разделы прочитанными</span></a>









                            </div>

                        </li>

                    </ul>
                </div>
            </div>


            <div class="p-nav-opposite">








                <a class="uix_sidebarCanvasTrigger uix_sidebarTrigger__component p-navgroup-link" data-xf-init="tooltip" title="th_sidebar_uix">
                    <i class="fa--xf far fa-ellipsis-v mdi mdi-dots-vertical" aria-hidden="true"></i>
                    <span class="uix_sidebarTrigger--phrase">th_sidebar_uix</span>
                </a>






            </div>



        </div>
    </div>
</div>

<div class="offCanvasMenu offCanvasMenu--nav js-headerOffCanvasMenu" data-menu="menu" aria-hidden="true" data-ocm-builder="navigation">
<div class="offCanvasMenu-backdrop" data-menu-close="true"></div>
<div class="offCanvasMenu-content">

<ul class="sidePanel__tabs">
<li>
<a data-attr="navigation" class="sidePanel__tab sidePanel__tab--active js-visitorTab"><i class="fa--xf far fa-bars" aria-hidden="true"></i></a>
</li>



<li>
<a data-attr="account" data-xf-click="toggle" data-target=".js-visitorTabPanel .uix_canvasPanelBody" class="sidePanel__tab js-visitorTab"><i class="fa--xf far fa-user" aria-hidden="true"></i></a>
</li>

<li>
<a data-attr="inbox" data-xf-click="toggle" data-target=".js-convoTabPanel .uix_canvasPanelBody" data-badge="0" class="sidePanel__tab js-convoTab js-badge--conversations badgeContainer">
<i class="fa--xf far fa-inbox" aria-hidden="true"></i>
</a>
</li>

<li>
<a data-attr="alerts" data-xf-click="toggle" data-target=".js-alertTabPanel .uix_canvasPanelBody" data-badge="0" class="sidePanel__tab js-alertTab js-badge--alerts badgeContainer">
<i class="fa--xf far fa-bell" aria-hidden="true"></i>
</a>
</li>

</ul>

<div class="sidePanel sidePanel--nav sidePanel--visitor">
<div class="sidePanel__tabPanels">

<div data-content="navigation" class="is-active sidePanel__tabPanel js-navigationTabPanel">

<div class="offCanvasMenu-header">
Меню
<a class="offCanvasMenu-closer" data-menu-close="true" role="button" tabindex="0" aria-label="Закрыть"></a>
</div>

<div class="p-offCanvasAccountLink">
    <a href="/index.php?account/" class="p-navgroup-link u-ripple p-navgroup-link--iconic p-navgroup-link--user rippleButton" data-xf-click="menu" data-xf-key="m" data-menu-pos-ref="< .p-navgroup" aria-expanded="false" aria-haspopup="true">
				<span class="avatar avatar--xxs" data-user-id="1" title="Thanos">
			<img src="{{ asset('/storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}" class="avatar-u1-s" width="48" height="48" loading="lazy">
		</span>
        <span class="p-navgroup-linkText">{{ auth()->user()->name }}</span>
        <div class="ripple-container"></div>
    </a>
<hr class="offCanvasMenu-separator" />
</div>

<div class="js-offCanvasNavTarget"></div>

<div class="offCanvasMenu-linkHolder "><div class="p-navEl__inner u-ripple"><a data-nav-id="profile" href="/index.php?members/thanos.1/" class="offCanvasMenu-link">th_profile_uix</a></div></div>
<div class="offCanvasMenu-linkHolder "><div class="p-navEl__inner u-ripple"><a data-nav-id="alerts" href="/index.php?account/alerts" class="offCanvasMenu-link">Оповещения</a></div></div>
<div class="offCanvasMenu-linkHolder "><div class="p-navEl__inner u-ripple"><a data-nav-id="settings" href="/index.php?account/preferences" class="offCanvasMenu-link">Настройки</a></div></div>



</div>



<div data-content="account" class="sidePanel__tabPanel js-visitorTabPanel">
<div class="uix_canvasPanelBody" data-menu="menu" aria-hidden="true"
data-href="{{ route('forums.profile') }}"
data-load-target=".js-visitorMenuBody">
<div class="offCanvasMenu-header">
Ваша учётная запись
<a class="offCanvasMenu-closer" data-menu-close="true" role="button" tabindex="0" aria-label="Закрыть"></a>
</div>
<div class="js-visitorMenuBody"></div>
</div>
</div>

<div data-content="inbox" class="sidePanel__tabPanel js-convoTabPanel">
<div class="uix_canvasPanelBody" data-menu="menu" aria-hidden="true"
data-href="/index.php?conversations/popup"
data-nocache="true"
data-target=".js-convMenuBody">
<div class="offCanvasMenu-header">
Переписки
<a class="offCanvasMenu-closer" data-menu-close="true" role="button" tabindex="0" aria-label="Закрыть"></a>
</div>
<div class="js-convMenuBody">
</div>
</div>
<div class="menu-footer">
<a href="/index.php?conversations/add" class="u-pullRight">Начать новую переписку</a>
<a href="/index.php?conversations/">Показать все...</a>
</div>
</div>

<div data-content="alerts" class="sidePanel__tabPanel js-alertTabPanel">
<div class="uix_canvasPanelBody" data-menu="menu" aria-hidden="true"
data-href="/index.php?account/alerts-popup"
data-nocache="true"
data-target=".js-alertsMenuBody">
<div class="offCanvasMenu-header">
Оповещения
<a class="offCanvasMenu-closer" data-menu-close="true" role="button" tabindex="0" aria-label="Закрыть"></a>
</div>
<div class="js-alertsMenuBody">
</div>
</div>
<div class="menu-footer menu-footer--split">
<span class="menu-footer-main">
<a href="/index.php?account/alerts">Показать все...</a>
</span>
<span class="menu-footer-opposite">
<a href="/index.php?account/preferences">Настройки</a>
</span>
</div>
</div>



</div>
</div>


<div class="offCanvasMenu-installBanner js-installPromptContainer" style="display: none;" data-xf-init="install-prompt">
<div class="offCanvasMenu-installBanner-header">Установить приложение</div>
<button type="button" class="js-installPromptButton button"><span class="button-text">Установить</span></button>
</div>
</div>
</div>
