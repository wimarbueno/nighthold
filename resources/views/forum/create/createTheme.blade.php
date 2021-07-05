@section('og')
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ route('forums.index') }}" />
<meta property="og:title" content="@yield('title') {{ config('app.name_forum', __('forum.title')) }}" />
<meta property="og:image" content="{{ asset('/forum/static/images/social-thumbs/wow.png') }}" />
<meta property="og:description" content="@lang('forum.description')" />
@endsection

@section('sidebar')
    <div class="breadcrumb block ">
        <div class="pageContent">
            <ul class="p-breadcrumbs " itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="{{ route('index') }}" itemprop="item">

                        <i class="fa--xf far fa-home" aria-hidden="true"></i>
                        <span style="display: none;" itemprop="name">Главная</span>

                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="{{ route('forums.index') }}" itemprop="item">

                        <span itemprop="name">@lang('navbar.Navbar-forums')</span>

                    </a>
                    <meta itemprop="position" content="2">
                </li>
                @foreach ($sidebar as $category)
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                        <a href="{{ route('forum.show', [$category->id])}}" itemprop="item">

                            <span itemprop="name">{{ $category->name }}</span>

                        </a>
                        <meta itemprop="position" content="3">
                    </li>
                    @if($category->categories)
                        @foreach ($category->categories as $childCategory)

                            @include('forum.child_category', ['category' => $childCategory])
                        @endforeach
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endsection

<x-forum-layout>

    @push('stylesheet')
        <link rel="stylesheet" href="{{ asset('forum_test/css/create_post.css') }}" />
        <link rel="stylesheet" href="{{ asset('forum_test/css/create_post_style.css') }}" />
    @endpush

    <div class="p-body-main  ">
            <div uix_component="MainContent" class="p-body-content">
                <div class="p-body-pageContent">
                    <form action="{{ route('forums.create.post', ['category' => $category]) }}" method="post" class="block" data-xf-init="attachment-manager ajax-submit draft" data-draft-url="{{ route('forums.draft.post', ['category' => $category]) }}" data-draft-autosave="60">
                        <div class="block-container">
                            <div class="block-body">

                                <dl class="formRow formRow--input formRow--fullWidth formRow--noLabel">
                                    <dt>
                                        <div class="formRow-labelWrapper">
                                            <label class="formRow-label" for="_xfUid-1-1625502102">Заголовок</label></div>
                                    </dt>
                                    <dd>
                                        <input type="text" name="title" data-xf-init="" class="input js-titleInput  input--title" value="" autocomplete="off" placeholder="Заголовок темы" autofocus="autofocus" maxlength="150" id="_xfUid-1-1625502102">
                                    </dd>
                                </dl>

                                <dl class="formRow formRow--fullWidth formRow--noLabel formRow--noTopPadding formRow--noBottomPadding formRow--mergeNext formRow--mergePrev">
                                    <dt>
                                        <div class="formRow-labelWrapper"></div>
                                    </dt>
                                    <dd>

                                        <ul class="inputTypes">

                                            <li>
                                                <label class="inputTypes-type">
                                                    <input type="radio" name="discussion_type" value="discussion" class="inputTypes-input" data-xf-init="disabler" data-hide="true" data-optional="true" data-autofocus="false" data-container=".js-threadTypeData[data-type-id='discussion']" checked="checked">
                                                    <span class="inputTypes-display inputTypes-display--type_discussion">
								<span class="inputTypes-icon">


										<i class="fa--xf far fa-comments" aria-hidden="true"></i>

								</span>
								<span class="inputTypes-title">Обсуждение</span>
							</span>
                                                </label>
                                            </li>

                                            <li>
                                                <label class="inputTypes-type">
                                                    <input type="radio" name="discussion_type" value="poll" class="inputTypes-input" data-xf-init="disabler" data-hide="true" data-optional="true" data-autofocus="false" data-container=".js-threadTypeData[data-type-id='poll']">
                                                    <span class="inputTypes-display inputTypes-display--type_poll">
								<span class="inputTypes-icon">


										<i class="fa--xf far fa-chart-bar" aria-hidden="true"></i>

								</span>
								<span class="inputTypes-title">Опрос</span>
							</span>
                                                </label>
                                            </li>

                                        </ul>

                                    </dd>
                                </dl>





                                <div class="js-inlineNewPostFields">

                                    <dl class="formRow formRow--input formRow--fullWidth formRow--noLabel formRow--mergePrev">
                                        <dt>
                                            <div class="formRow-labelWrapper">
                                                <label class="formRow-label" for="_xfUid-2-1625502102">Сообщение</label></div>
                                        </dt>
                                        <dd>


                                            <script class="js-editorToolbars" type="application/json">{"toolbarButtons":{"moreText":{"buttons":["clearFormatting","bold","italic","fontSize","textColor","fontFamily","strikeThrough","underline","xfInlineCode","xfInlineSpoiler"],"buttonsVisible":"5","align":"left"},"moreParagraph":{"buttons":["xfList","align","paragraphFormat"],"buttonsVisible":"3","align":"left"},"moreRich":{"buttons":["insertLink","insertImage","xfSmilie","xfMedia","xfQuote","insertTable","insertHR","insertVideo","xfSpoiler","xfCode"],"buttonsVisible":"6","align":"left"},"moreMisc":{"buttons":["undo","redo","xfBbCode","xfDraft"],"buttonsVisible":"4","align":"right"}},"toolbarButtonsMD":{"moreText":{"buttons":["bold","italic","fontSize","textColor","fontFamily","strikeThrough","underline","xfInlineCode","xfInlineSpoiler"],"buttonsVisible":"3","align":"left"},"moreParagraph":{"buttons":["xfList","align","paragraphFormat"],"buttonsVisible":"3","align":"left"},"moreRich":{"buttons":["insertLink","insertImage","xfSmilie","insertVideo","xfMedia","xfQuote","insertTable","insertHR","xfSpoiler","xfCode"],"buttonsVisible":"2","align":"left"},"moreMisc":{"buttons":["undo","redo","clearFormatting","xfBbCode","xfDraft"],"buttonsVisible":"1","align":"right"}},"toolbarButtonsSM":{"moreText":{"buttons":["bold","italic","fontSize","textColor","fontFamily","strikeThrough","underline","xfInlineCode","xfInlineSpoiler"],"buttonsVisible":"2","align":"left"},"moreParagraph":{"buttons":["xfList","align","paragraphFormat"],"buttonsVisible":"1","align":"left"},"moreRich":{"buttons":["insertLink","insertImage","xfSmilie","xfQuote","insertVideo","xfMedia","insertTable","insertHR","xfSpoiler","xfCode"],"buttonsVisible":"3","align":"left"},"moreMisc":{"buttons":["undo","redo","xfBbCode","clearFormatting","xfDraft"],"buttonsVisible":"1","align":"right"}},"toolbarButtonsXS":{"moreText":{"buttons":["bold","italic","fontSize","textColor","fontFamily","xfList","align","paragraphFormat","strikeThrough","underline","xfInlineSpoiler","xfInlineCode"],"buttonsVisible":"2","align":"left"},"moreParagraph":{"buttons":[],"buttonsVisible":"0","align":"left"},"moreRich":{"buttons":["insertLink","insertImage","xfSmilie","xfQuote","insertVideo","xfMedia","insertTable","insertHR","xfSpoiler","xfCode"],"buttonsVisible":"2","align":"left"},"moreMisc":{"buttons":["undo","redo","xfBbCode","clearFormatting","xfDraft"],"buttonsVisible":"1","align":"right"}}}
</script>
                                            <script class="js-editorToolbarSizes" type="application/json">{"SM":420,"MD":575,"LG":900}</script>
                                            <script class="js-editorDropdowns" type="application/json">{"xfList":{"cmd":"xfList","icon":"fa-list","buttons":["formatOL","formatUL","indent","outdent"],"title":"List"}}</script>
                                            <script class="js-editorLanguage" type="application/json">
		{
			"Align Center": "По центру",
			"Align Left": "По левому краю",
			"Align Right": "По правому краю",
			"Align Justify": "Выравнивание текста",
			"Align": "Выравнивание",
			"Alignment": "Выравнивание",
			"Back": "Назад",
			"Bold": "Полужирный",
			"By URL": "По URL",
			"Clear Formatting": "Удалить форматирование",
			"Code": "Код",
			"Text Color": "Цвет текста",
			"Decrease Indent": "Уменьшить отступ",
			"Delete Draft": "Удалить черновик",
			"Drafts": "Черновики",
			"Drop image": "Перетащите изображение",
			"Drop video": "Перетащите видео",
			"Edit Link": "Редактировать ссылку",
			"Font Family": "Шрифт",
			"Font Size": "Размер шрифта",
			"Normal": "Обычный",
			"Heading 1": "Заголовок 1",
			"Heading 2": "Заголовок 2",
			"Heading 3": "Заголовок 3",
			"Increase Indent": "Увеличить отступ",
			"Inline Code": "Однострочный код",
			"Insert GIF": "Вставить GIF",
			"Insert Horizontal Line": "Вставить горизонтальную линию",
			"Inline Spoiler": "Размытый текст",
			"Insert Image": "Изображение",
			"Insert Link": "Ссылка",
			"Insert": "Вставить",
			"Italic": "Курсив",
			"List": "Список",
			"Loading image": "Загрузка изображения",
			"Media": "Медиа",
			"More Text": "Дополнительные параметры...",
			"More Paragraph": "Дополнительные параметры...",
			"More Rich": "Дополнительные параметры...",
			"More Misc": "Дополнительные параметры...",
			"Open Link": "Перейти по ссылке",
			"or click": "Или нажмите здесь",
			"Ordered List": "Нумерованный список",
			"Paragraph Format": "Формат абзаца",
			"Preview": "Предварительный просмотр",
			"Quote": "Цитата",
			"Redo": "Повторить",
			"Remove": "Удалить",
			"Replace": "Заменить",
			"Save Draft": "Сохранить черновик",
			"Smilies": "Смайлы",
			"Something went wrong. Please try again.": "Что-то пошло не так. Попробуйте ещё раз или обратитесь к администратору.",
			"Spoiler": "Спойлер",
			"Strikethrough": "Зачёркнутый",
			"Text": "Текст",
			"Toggle BB Code": "Переключение BB-кодов",
			"Underline": "Подчёркнутый",
			"Undo": "Отменить",
			"Unlink": "Удалить ссылку",
			"Unordered List": "Маркированный список",
			"Update": "Обновить",
			"Upload Image": "Загрузить изображение",
			"Uploading": "Загрузка",
			"URL": "URL-адрес",
			"Insert Table": "Вставить таблицу",
			"Table Header": "Заголовок таблицы",
			"Remove Table": "Удалить таблицу",
			"Row": "Строка",
			"Column": "Колонка",
			"Insert row above": "Вставить строку выше",
			"Insert row below": "Вставить строку ниже",
			"Delete row": "Удалить строку",
			"Insert column before": "Вставить столбец до",
			"Insert column after": "Вставить столбец после",
			"Delete column": "Удалить колонку",
			"Ctrl": "Ctrl",
			"Shift": "Shift",
			"Alt": "Alt",
			"Insert Video": "Вставить видео",
			"Upload Video": "Загрузить видео",
			"Width": "Ширина",
			"Height": "Высота",
			"Change Size": "Изменить размер",
			"None": "Нет",
			"Alternative Text": "Альтернативный текст",
			"__lang end__": ""
		}
	</script>

                                            <script class="js-editorCustom" type="application/json">[]</script>

                                            <script class="js-xfEditorMenu" type="text/template">
                                                <div class="menu" data-menu="menu" aria-hidden="true"
                                                     data-href="href"
                                                     data-load-target=".js-xfEditorMenuBody">
                                                    <div class="menu-content">
                                                        <div class="js-xfEditorMenuBody">
                                                            <div class="menu-row">Загрузка...</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </script>

                                            <textarea name="message_html" class="input js-editor u-jsOnly" data-xf-init="editor" data-original-name="message" data-buttons-remove="xfInsertGif" style="height: 287px; display: none;" aria-label="Текстовое поле с поддержкой форматирования" data-preview-url="/index.php?forums/main-forum.2/thread-preview" id="_xfUid-2-1625502102" data-min-height="250"></textarea>
                                            <input type="hidden" value="" data-bb-code="message">
                                            <noscript>
                                                <textarea name="message" class="input" aria-label="Текстовое поле с поддержкой форматирования"></textarea>
                                            </noscript>
                                        </dd>
                                    </dl>



                                    <dl class="formRow formRow--fullWidth formRow--noLabel formRow--mergePrev formRow--noTopPadding">
                                        <dt>
                                            <div class="formRow-labelWrapper"></div>
                                        </dt>
                                        <dd>





                                            <div class="attachmentUploads js-attachmentUploads  ">
                                                <div class="hScroller" data-xf-init="h-scroller">
                                                    <div class="hScroller-scroll is-calculated" style="margin-bottom: -47px;">
                                                        <ul class="attachUploadList js-attachmentFiles">

                                                        </ul>
                                                    </div><i class="hScroller-action hScroller-action--end" aria-hidden="true"></i><i class="hScroller-action hScroller-action--start" aria-hidden="true"></i>
                                                </div>

                                                <div class="attachmentUploads-banner js-attachmentInsertMultiRow u-hidden">
                                                    <button type="button" class="button--link js-attachmentSelect button rippleButton" data-toggle="Отменить"><span class="button-text">
				Вставить несколько...
			</span></button>
                                                    <ul class="attachmentUploads-selectActions js-attachmentSelectActions">
                                                        <li>
					<span class="button button--link selectAll rippleButton">
						<span class="button-text">
							<label class="iconic"><input type="checkbox" value="1" data-xf-init="check-all" data-container="< .attachmentUploads"><i aria-hidden="true"></i><span class="iconic-label">Выбрать все</span></label>

						</span>
					</span>
                                                        </li>
                                                        <li class="js-attachmentSelectInsertActions">
                                                            <span class="insert-label">Вставить:</span>
                                                            <span class="buttonGroup">
						<button type="button" class="button--link js-attachmentSelectAction button rippleButton" data-action="thumbnail" title="Изображение" disabled=""><span class="button-text">
							Миниатюра
						</span></button>
						<button type="button" class="button--link js-attachmentSelectAction button rippleButton" data-action="full" title="Изображение" disabled=""><span class="button-text">
							Полное изображение
						</span></button>
					</span>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="button--link button--iconOnly js-attachmentSelectAction button button--icon rippleButton" data-action="delete" disabled=""><i class="fa--xf far fa-trash-alt" aria-hidden="true"></i><span class="button-text">
						<span class="u-srOnly">Удалить</span>
					</span></button>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>



                                            <span class="js-attachButton"><a href="/index.php?attachments/upload&amp;type=post&amp;context[node_id]=2&amp;hash=9b02183d6931d1b4beecca4eb786d77c" class="button--link js-attachmentUpload button button--icon button--icon--attach rippleButton" target="_blank" data-accept=".zip,.txt,.pdf,.png,.jpg,.jpeg,.jpe,.gif"><span class="button-text">Прикрепить файлы</span></a><input type="file" multiple="multiple" accept=".zip,.txt,.pdf,.png,.jpg,.jpeg,.jpe,.gif" title="Прикрепить файлы" style="visibility: hidden; position: absolute; width: 1px; height: 1px; overflow: hidden; left: -1000px;"></span>
                                            <input type="hidden" name="attachment_hash" value="9b02183d6931d1b4beecca4eb786d77c">
                                            <input type="hidden" name="attachment_hash_combined" value="{&quot;type&quot;:&quot;post&quot;,&quot;context&quot;:{&quot;node_id&quot;:2},&quot;hash&quot;:&quot;9b02183d6931d1b4beecca4eb786d77c&quot;}">







                                        </dd>
                                    </dl>

                                    <ul class="listPlain">


                                        <li class="js-threadTypeData is-disabled" data-type-id="poll" style="display:none;">
                                            <hr class="formRowSep ">








                                            <dl class="formRow formRow--input">
                                                <dt>
                                                    <div class="formRow-labelWrapper">
                                                        <label class="formRow-label" for="_xfUid-3-1625502102">Вопрос</label></div>
                                                </dt>
                                                <dd>
                                                    <input type="text" class="input is-disabled" name="poll[question]" maxlength="100" id="_xfUid-3-1625502102" disabled="">
                                                </dd>
                                            </dl>





                                            <dl class="formRow formRow--input">
                                                <dt>
                                                    <div class="formRow-labelWrapper">
                                                        <label class="formRow-label">Возможные ответы</label></div>
                                                </dt>
                                                <dd>


                                                    <ul class="inputList">




                                                        <li data-xf-init="field-adder" data-remaining="9">
                                                            <input type="text" class="input is-disabled" name="poll[new_responses][]" maxlength="100" placeholder="Вариант ответа..." disabled="">
                                                        </li>

                                                    </ul>

                                                </dd>
                                            </dl>



                                            <dl class="formRow">
                                                <dt>
                                                    <div class="formRow-labelWrapper">
                                                        <label class="formRow-label">Максимум разрешённых ответов</label></div>
                                                </dt>
                                                <dd>

                                                    <ul class="inputChoices">
                                                        <li class="inputChoices-choice"><label class="iconic  iconic--radio"><input type="radio" name="poll[max_votes_type]" value="single" checked="checked" disabled="" class="is-disabled"><i aria-hidden="true"></i><span class="iconic-label">Один</span></label></li>
                                                        <li class="inputChoices-choice"><label class="iconic  iconic--radio"><input type="radio" name="poll[max_votes_type]" value="unlimited" disabled="" class="is-disabled"><i aria-hidden="true"></i><span class="iconic-label">Без ограничения</span></label></li>
                                                        <li class="inputChoices-choice"><label class="iconic  iconic--radio iconic--noLabel"><input type="radio" name="poll[max_votes_type]" value="number" data-xf-init="disabler" disabled="" class="is-disabled"><i aria-hidden="true"></i></label>
                                                            <ul class="inputChoices-dependencies is-disabled">
                                                                <li class="inputChoices-choice"><div class="inputGroup inputGroup--numbers inputNumber inputGroup--joined" data-xf-init="number-box"><input type="number" pattern="\d*" class="input input--number js-numberBoxTextInput is-disabled" value="2" min="1" max="255" step="1" required="required" name="poll[max_votes_value]" disabled=""><button type="button" tabindex="-1" class="inputGroup-text inputNumber-button inputNumber-button--up js-up is-disabled" data-dir="up" title="Увеличить" aria-label="Увеличить" disabled=""></button><button type="button" tabindex="-1" class="inputGroup-text inputNumber-button inputNumber-button--down js-down is-disabled" data-dir="down" title="Уменьшить" aria-label="Уменьшить" disabled=""></button></div></li>
                                                            </ul>
                                                        </li>

                                                    </ul>

                                                    <div class="formRow-explain">Максимальное число ответов, которое пользователь может выбрать.</div>
                                                </dd>
                                            </dl>



                                            <dl class="formRow">
                                                <dt>
                                                    <div class="formRow-labelWrapper">
                                                        <label class="formRow-label">Настройки</label></div>
                                                </dt>
                                                <dd>

                                                    <ul class="inputChoices">
                                                        <li class="inputChoices-choice"><label class="iconic"><input type="checkbox" name="poll[change_vote]" value="1" checked="checked" disabled="" class="is-disabled"><i aria-hidden="true"></i><span class="iconic-label">Разрешить проголосовавшим изменять свои голоса</span></label></li>
                                                        <li class="inputChoices-choice"><label class="iconic"><input type="checkbox" name="poll[public_votes]" value="1" disabled="" class="is-disabled"><i aria-hidden="true"></i><span class="iconic-label">Разрешить видеть всем, кто и как проголосовал</span></label></li>
                                                        <li class="inputChoices-choice"><label class="iconic"><input type="checkbox" name="poll[view_results_unvoted]" value="1" checked="checked" disabled="" class="is-disabled"><i aria-hidden="true"></i><span class="iconic-label">Разрешить видеть результаты без участия в голосовании</span></label></li>
                                                        <li class="inputChoices-choice"><label class="iconic"><input type="checkbox" name="poll[close]" value="1" data-xf-init="disabler" disabled="" class="is-disabled"><i aria-hidden="true"></i><span class="iconic-label">Закрыть этот опрос через:</span></label>
                                                            <ul class="inputChoices-dependencies is-disabled">
                                                                <li class="inputChoices-option"><div class="inputGroup">
                                                                        <div class="inputGroup inputGroup--numbers inputNumber inputGroup--joined" data-xf-init="number-box"><input type="number" pattern="\d*" class="input input--number js-numberBoxTextInput is-disabled" value="7" min="1" max="365" step="1" required="required" name="poll[close_length]" disabled=""><button type="button" tabindex="-1" class="inputGroup-text inputNumber-button inputNumber-button--up js-up is-disabled" data-dir="up" title="Увеличить" aria-label="Увеличить" disabled=""></button><button type="button" tabindex="-1" class="inputGroup-text inputNumber-button inputNumber-button--down js-down is-disabled" data-dir="down" title="Уменьшить" aria-label="Уменьшить" disabled=""></button></div>
                                                                        <span class="inputGroup-splitter"></span>

                                                                        <select name="poll[close_units]" class="input--autoSize input is-disabled" disabled="">
                                                                            <option value="hours">Часов</option>
                                                                            <option value="days" selected="selected">Дней</option>
                                                                            <option value="weeks">Недель</option>
                                                                            <option value="months">Месяцев</option>

                                                                        </select>

                                                                    </div></li>
                                                            </ul>
                                                        </li>

                                                    </ul>

                                                </dd>
                                            </dl>




                                        </li>



                                    </ul>

                                    <hr class="formRowSep">

                                    <input type="hidden" name="_xfSet[watch_thread]" value="1">

                                    <dl class="formRow">
                                        <dt>
                                            <div class="formRow-labelWrapper">
                                                <label class="formRow-label">Статус темы</label></div>
                                        </dt>
                                        <dd>

                                            <ul class="inputChoices">
                                                <li class="inputChoices-choice"><label class="iconic"><input type="checkbox" name="discussion_open" value="1" checked="checked"><i aria-hidden="true"></i><span class="iconic-label">Открыта</span></label>
                                                    <dfn class="inputChoices-explain">Пользователи смогут оставлять свои ответы в этой теме</dfn>
                                                    <input type="hidden" name="_xfSet[discussion_open]" value="1"></li>
                                                <li class="inputChoices-choice"><label class="iconic"><input type="checkbox" name="sticky" value="1"><i aria-hidden="true"></i><span class="iconic-label">Закреплено</span></label>
                                                    <dfn class="inputChoices-explain">Важные темы всегда находятся вверху первой страницы списка тем своего раздела</dfn>
                                                    <input type="hidden" name="_xfSet[sticky]" value="1"></li>

                                            </ul>

                                        </dd>
                                    </dl>

                                </div>
                            </div>


                            <dl class="formRow formSubmitRow formSubmitRow--sticky is-sticky" data-xf-init="form-submit-row" style="height: 56px;">
                                <dt></dt>
                                <dd>
                                    <div class="formSubmitRow-main" style="bottom: 0px; left: 20px; width: 1001px;">
                                        <div class="formSubmitRow-bar"></div>
                                        <div class="formSubmitRow-controls"><button type="submit" class="button--primary button button--icon button--icon--write rippleButton"><span class="button-text">Создать тему</span></button></div>
                                    </div>
                                </dd>
                            </dl>

                        </div>

                        @csrf

                    </form>
                </div>
            </div>
    </div>

    @push('scripts')
    <script src="{{ asset('forum_test/js/vendor/jquery/jquery-3.5.1.min.js') }}?_v=8fc53ba3"></script>
    <script src="{{ asset('forum_test/js/vendor/vendor-compiled.js') }}?_v=8fc53ba3"></script>
    <script src="{{ asset('forum_test/js/xf/core-compiled.js') }}?_v=8fc53ba3"></script>
    <script src="{{ asset('forum_test/js/xf/attachment_manager-compiled.js') }}?_v=8fc53ba3"></script>
    <script src="{{ asset('forum_test/js/xf/prefix_menu.min.js') }}?_v=8fc53ba3"></script>
    <script src="{{ asset('forum_test/js/xf/editor-compiled.js') }}?_v=8fc53ba3"></script>
    <script src="{{ asset('forum_test/js/themehouse/uix_dark/ripple.min.js') }}?_v=8fc53ba3"></script>
    <script src="{{ asset('forum_test/js/themehouse/global/20180112.min.js') }}?_v=8fc53ba3"></script>
    <script src="{{ asset('forum_test/js/themehouse/uix_dark/index.min.js') }}?_v=8fc53ba3"></script>
    <script src="{{ asset('forum_test/js/themehouse/uix_dark/vendor/hover-intent/jquery.hoverIntent.min.js') }}?_v=8fc53ba3"></script>
    @endpush
</x-forum-layout>
