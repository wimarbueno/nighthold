<div class="Pane Pane--dirtDark Pane--above">
   <div class="Pane-bg">
      <div class="Pane-overlay"></div>
   </div>
   <div class="Pane-content">
      <div class="SiteFooter">
         <div class="NavbarFooter is-regionless" >
            <div class="NavbarFooter-overlay" role="presentation"></div>
            <div class="NavbarFooter-selector">
               <div class="NavbarFooter-selectorToggle" tabindex="0" role="button" aria-haspopup="true" aria-label="Выберите язык">
                  <div class="NavbarFooter-icon NavbarFooter-selectorToggleIcon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true">
                        <use xlink:href="#Navbar-icon-globe"></use>
                     </svg>
                  </div>
                  <label class="NavbarFooter-selectorToggleLabel">
                      {{ config('app.locales.'.app()->getLocale()) }}
                  </label>
                  <div class="NavbarFooter-icon NavbarFooter-selectorToggleArrow">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true">
                        <use xlink:href="#Navbar-icon-selector"></use>
                     </svg>
                  </div>
               </div>
               <div class="NavbarFooter-selectorDropdown" role="listbox">
                  <div class="NavbarFooter-selectorDropdownContainer">
                     <div class="NavbarFooter-selectorCloser">
                        <div class="NavbarFooter-selectorCloserAnchor">
                           <div class="NavbarFooter-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true">
                                 <use xlink:href="#Navbar-icon-close"></use>
                              </svg>
                           </div>
                        </div>
                     </div>
                     <div class="NavbarFooter-selectorLocales NavbarFooter-selectorSection">
                          <div class="NavbarFooter-selectorSectionBlock">
                              <a class="NavbarFooter-selectorLocale @if(app()->isLocale('de-de')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'de-de') }}">
                                  <div class="NavbarFooter-selectorOptionLabel">Deutsch</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                          <use xlink:href="#Navbar-icon-check"></use>
                                      </svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(app()->isLocale('en-gb')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'en-gb') }}">
                                  <div class="NavbarFooter-selectorOptionLabel">English (EU)</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                          <use xlink:href="#Navbar-icon-check"></use>
                                      </svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(app()->isLocale('es-es')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'es-es') }}" data-id="es-es">
                                  <div class="NavbarFooter-selectorOptionLabel">Español (EU)</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(app()->isLocale('fr-fr')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'fr-fr') }}" data-id="fr-fr">
                                  <div class="NavbarFooter-selectorOptionLabel">Français</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(app()->isLocale('it-it')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'it-it') }}" data-id="it-it">
                                  <div class="NavbarFooter-selectorOptionLabel">Italiano</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                          </div>
                          <div class="NavbarFooter-selectorSectionBlock">
                              <a class="NavbarFooter-selectorLocale @if(app()->isLocale('pt-pt')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'pt-pt') }}" data-id="pt-pt">
                                  <div class="NavbarFooter-selectorOptionLabel">Português (EU)</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(app()->isLocale('ru-ru')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'ru-ru') }}" data-id="ru-ru">
                                  <div class="NavbarFooter-selectorOptionLabel">Русский</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use>
                                      </svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(app()->isLocale('ko-kr')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'ko-kr') }}" data-id="ko-kr">
                                  <div class="NavbarFooter-selectorOptionLabel">한국어</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(app()->isLocale('zh-tw')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'zh-tw') }}" data-id="zh-tw">
                                  <div class="NavbarFooter-selectorOptionLabel">繁體中文</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use>
                                      </svg>
                                  </div>
                              </a>
                              <a class="NavbarFooter-selectorLocale @if(app()->isLocale('zh-cn')) is-active is-selected @endif NavbarFooter-selectorOption" href="{{ route('lang.switch', 'zh-cn') }}" data-id="zh-cn">
                                  <div class="NavbarFooter-selectorOptionLabel">简体中文</div>
                                  <div class="NavbarFooter-selectorOptionCheck NavbarFooter-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="#Navbar-icon-check"></use></svg>
                                  </div>
                              </a>
                          </div>
                      </div>
                     <div class="NavbarFooter-selectorTick"></div>
                  </div>
               </div>
            </div>
            <style>.NavbarFooter-doNotSell {
               display: none;
               }
               .NavbarFooter[data-country="US"][data-administrative-division="CA"] > .NavbarFooter-doNotSell,
               .NavbarFooter[data-country="US"][data-administrative-division="NV"] > .NavbarFooter-doNotSell {
               display: block;
               }
            </style>
            <nav class="NavbarFooter-links NavbarFooter-mainLinks">
                @include('layouts.providers.pages')
            </nav>
            <div class="NavbarFooter-copyright">© {{ config('app.name') }}, Inc., 2021</div>
         </div>
      </div>
   </div>
</div>
