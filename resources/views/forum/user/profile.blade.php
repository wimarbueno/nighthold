@section('og')
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('forums.index') }}" />
    <meta property="og:title" content="@yield('title') {{ config('app.name_forum', __('forum.title')) }}" />
    <meta property="og:image" content="{{ asset('/forum/static/images/social-thumbs/wow.png') }}" />
    <meta property="og:description" content="@lang('forum.description')" />
@endsection

<x-forum-layout>

    @push('stylesheet')
        <link rel="stylesheet" href="{{ asset('forum_test/css/profile.css') }}" />
        <link rel="stylesheet" href="{{ asset('forum_test/css/profile_style.css') }}" />
    @endpush

    @push('header')
            <div class="pageContent">


                <div class="uix_headerInner">


                    <div class="p-title ">


                        <h1 class="p-title-value">Информация</h1>


                    </div>




                </div>



            </div>
    @endpush

        <div class="p-body-main  p-body-main--withSideNav">
            <div class="p-body-sideNav">
                <div class="p-body-sideNavTrigger">
                    <button type="button" class="button--link button rippleButton" data-xf-click="off-canvas" data-menu="#js-SideNavOcm"><span class="button-text">
												Ваша учётная запись
											</span><div class="ripple-container"></div></button>
                </div>
                <div class="p-body-sideNavInner" data-ocm-class="offCanvasMenu offCanvasMenu--blocks" id="js-SideNavOcm" data-ocm-builder="sideNav" aria-hidden="true">
                    <div class="uix_sidebar--scroller">
                        <div data-ocm-class="offCanvasMenu-backdrop" data-menu-close="true" class=""></div>
                        <div data-ocm-class="offCanvasMenu-content" class="">
                            <div class="p-body-sideNavContent">


                                <div class="block">
                                    <div class="block-container">
                                        <h3 class="block-header">Ваша учётная запись</h3>
                                        <div class="block-body">

                                            <a class="blockLink rippleButton" href="/index.php?members/thanos.1/">Ваш профиль</a>
                                            <a class="blockLink  rippleButton" href="/index.php?account/alerts">
                                                Оповещения
                                            </a>
                                            <a class="blockLink  rippleButton" href="/index.php?account/reactions">
                                                Полученные реакции
                                            </a>

                                            <a class="blockLink  rippleButton" href="/index.php?account/bookmarks">
                                                Закладки
                                            </a>


                                        </div>

                                        <h3 class="block-minorHeader">Настройки</h3>
                                        <div class="block-body">

                                            <a class="blockLink is-selected rippleButton" href="/index.php?account/account-details">
                                                Информация
                                            </a>
                                            <a class="blockLink  rippleButton" href="/index.php?account/security">
                                                Пароль и безопасность
                                            </a>
                                            <a class="blockLink  rippleButton" href="/index.php?account/privacy">
                                                Конфиденциальность
                                            </a>
                                            <a class="blockLink  rippleButton" href="/index.php?account/preferences">
                                                Настройки
                                            </a>

                                            <a class="blockLink  rippleButton" href="/index.php?account/signature">
                                                Подпись
                                            </a>



                                            <a class="blockLink  rippleButton" href="/index.php?account/following">
                                                Подписки
                                            </a>
                                            <a class="blockLink  rippleButton" href="/index.php?account/ignored">
                                                Игнорирование
                                            </a>
                                            <a href="/index.php?logout/&amp;t=1625496709%2C4c762222fabeb1e2fc4a0e2926d75961" class="blockLink rippleButton">Выйти</a>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div uix_component="MainContent" class="p-body-content">
                <div class="p-body-pageContent">
                    <form action="/index.php?account/account-details" method="post" class="block" data-xf-init="ajax-submit" data-force-flash-message="true">

                        <div class="block-container">
                            <div class="block-body">

                                <dl class="formRow">
                                    <dt>
                                        <div class="formRow-labelWrapper">
                                            <label class="formRow-label">Имя пользователя</label></div>
                                    </dt>
                                    <dd>
                                        {{ auth()->user()->name }}
                                    </dd>
                                </dl>



                                <dl class="formRow formRow--button">
                                    <dt>
                                        <div class="formRow-labelWrapper">
                                            <label class="formRow-label">Электронная почта</label></div>
                                    </dt>
                                    <dd>
                                        {{ auth()->user()->email }}

                                        <a href="/index.php?account/email" class="button--link button rippleButton" data-xf-click="overlay"><span class="button-text">Изменить</span></a>

                                    </dd>
                                </dl>




                                <dl class="formRow">
                                    <dt>
                                        <div class="formRow-labelWrapper">
                                            <label class="formRow-label">Параметры электронной почты</label></div>
                                    </dt>
                                    <dd>

                                        <ul class="inputChoices">
                                            <li class="inputChoices-choice"><label class="iconic"><input type="checkbox" name="option[receive_admin_email]" value="1"><i aria-hidden="true"></i><span class="iconic-label">Получать электронные письма о новостях и обновлениях</span></label></li>
                                            <li class="inputChoices-choice"><label class="iconic"><input type="checkbox" name="enable_activity_summary_email" value="1"><i aria-hidden="true"></i><span class="iconic-label">Получать электронные письма со сводкой активности</span></label>
                                                <dfn class="inputChoices-explain">Мы будем информировать Вас о новом контенте, если заметим Ваше отсутствие в течение некоторого времени.</dfn></li>

                                        </ul>

                                        <div class="formRow-explain">Дополнительные параметры электронной почты Вы можете найти в <a href="/index.php?account/preferences">настройках</a>.</div>
                                    </dd>
                                </dl>







                                <dl class="formRow">
                                    <dt>
                                        <div class="formRow-labelWrapper">
                                            <label class="formRow-label">Аватар</label></div>
                                    </dt>
                                    <dd>


                                        <a href="/index.php?account/avatar" class="avatar avatar--m" data-user-id="1" data-xf-click="overlay">
                                            <img src="/data/avatars/m/0/1.jpg?1625486712" alt="Thanos" class="avatar-u1-m" width="96" height="96" loading="lazy">
                                        </a>

                                        <div class="formRow-explain">Нажмите на изображение для изменения аватара.</div>
                                    </dd>
                                </dl>

                                <dl class="formRow formRow--input">
                                    <dt>
                                        <div class="formRow-labelWrapper">
                                            <label class="formRow-label" for="_xfUid-1-1625496709">Нестандартное звание</label></div>
                                    </dt>
                                    <dd>
                                        <input type="text" class="input" name="user[custom_title]" maxlength="50" id="_xfUid-1-1625496709">
                                        <div class="formRow-explain">Введённый здесь текст заменит звание, которое отображается под Вашим именем в сообщениях.</div>
                                    </dd>
                                </dl>
                                <hr class="formRowSep">
                                <dl class="formRow formRow--input">
                                    <dt>
                                        <div class="formRow-labelWrapper">
                                            <label class="formRow-label">Дата рождения</label></div>
                                    </dt>
                                    <dd>



                                        <div class="inputGroup inputGroup--auto">

                                            <select name="dob_month" class="input">
                                                <option value="0" selected="selected">&nbsp;</option>
                                                <option value="1">Январь</option>
                                                <option value="2">Февраль</option>
                                                <option value="3">Март</option>
                                                <option value="4">Апрель</option>
                                                <option value="5">Май</option>
                                                <option value="6">Июнь</option>
                                                <option value="7">Июль</option>
                                                <option value="8">Август</option>
                                                <option value="9">Сентябрь</option>
                                                <option value="10">Октябрь</option>
                                                <option value="11">Ноябрь</option>
                                                <option value="12">Декабрь</option>

                                            </select>

                                            <span class="inputGroup-splitter"></span>
                                            <input type="text" class="input" name="dob_day" pattern="\d*" size="4" maxlength="2" placeholder="День">
                                            <span class="inputGroup-splitter"></span>
                                            <input type="text" class="input" name="dob_year" pattern="\d*" size="6" maxlength="4" placeholder="Год">
                                        </div>


                                    </dd>
                                </dl>
                                <dl class="formRow">
                                    <dt>
                                        <div class="formRow-labelWrapper"></div>
                                    </dt>
                                    <dd>

                                        <ul class="inputChoices">
                                            <li class="inputChoices-choice"><label class="iconic"><input type="checkbox" name="option[show_dob_date]" value="1" checked="1" data-xf-init="disabler"><i aria-hidden="true"></i><span class="iconic-label">Показывать день и месяц рождения</span></label>
                                                <ul class="inputChoices-dependencies">
                                                    <li class="inputChoices-option"><ul class="inputChoices">
                                                            <li class="inputChoices-choice"><label class="iconic"><input type="checkbox" name="option[show_dob_year]" value="1"><i aria-hidden="true"></i><span class="iconic-label">Показывать год рождения</span></label>
                                                                <dfn class="inputChoices-explain">Это позволит пользователям видеть Ваш возраст.</dfn></li>

                                                        </ul></li>
                                                </ul>
                                            </li>

                                        </ul>

                                    </dd>
                                </dl>
                                <hr class="formRowSep">
                                <dl class="formRow formRow--input">
                                    <dt>
                                        <div class="formRow-labelWrapper">
                                            <label class="formRow-label" for="_xfUid-2-1625496709">Местоположение</label></div>
                                    </dt>
                                    <dd>
                                        <input type="text" class="input" name="profile[location]" maxlength="50" id="_xfUid-2-1625496709">
                                    </dd>
                                </dl>
                            </div>

                            <dl class="formRow formSubmitRow formSubmitRow--sticky is-sticky" data-xf-init="form-submit-row" style="height: 56px;">
                                <dt></dt>
                                <dd>
                                    <div class="formSubmitRow-main" style="bottom: 0px; left: 290px; width: 707px;">
                                        <div class="formSubmitRow-bar"></div>
                                        <div class="formSubmitRow-controls"><button type="submit" class="button--primary button button--icon button--icon--save rippleButton"><span class="button-text">Сохранить</span></button></div>
                                    </div>
                                </dd>
                            </dl>


                        </div>

                        <input type="hidden" name="_xfToken" value="1625496709,4c762222fabeb1e2fc4a0e2926d75961">

                    </form>
                </div>
            </div>
        </div>

    @push('scripts')
        <script src="{{ asset('forum_test/js/vendor/jquery/jquery-3.5.1.min.js') }}?_v=8fc53ba3"></script>
        <script src="{{ asset('forum_test/js/vendor/vendor-compiled.js') }}?_v=8fc53ba3"></script>
        <script src="{{ asset('forum_test/js/xf/core-compiled.js') }}?_v=8fc53ba3"></script>
        <script src="{{ asset('forum_test/js/themehouse/uix_dark/ripple.min.js') }}?_v=8fc53ba3"></script>
        <script src="{{ asset('forum_test/js/themehouse/global/20180112.min.js') }}?_v=8fc53ba3"></script>
        <script src="{{ asset('forum_test/js/themehouse/uix_dark/index.min.js') }}?_v=8fc53ba3"></script>
        <script src="{{ asset('forum_test/js/themehouse/uix_dark/vendor/hover-intent/jquery.hoverIntent.min.js') }}?_v=8fc53ba3"></script>
    @endpush
</x-forum-layout>
