(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/user/Characters.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/user/Characters.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Characters",
  scrollToTop: false,
  data: function data() {
    return {
      game: '',
      loading: true,
      errored: false,
      validationErrors: '',
      status_msg: "",
      status: "",
      isButtonDisabled: false
    };
  },
  mounted: function mounted() {
    this.getUserCharacters();
  },
  methods: {
    select: function select(message) {
      var _this = this;

      this.isCreatingPost = true;
      var formData = new FormData();
      formData.append("name", message);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/api/user/select", formData).then(function (res) {
        _this.status = true;

        _this.showNotification(res.data);

        _this.isCreatingPost = false;
        _this.isButtonDisabled = true;
      });
    },
    getUserCharacters: function getUserCharacters() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/api/user/characters').then(function (response) {
        _this2.game = response.data;
      })["catch"](function (error) {
        _this2.errored = true;
      })["finally"](function () {
        return _this2.loading = false;
      });
    },
    showNotification: function showNotification(message) {
      var _this3 = this;

      this.status_msg = message;
      setTimeout(function () {
        _this3.status_msg = "";
      }, 3000);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/user/Security.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/user/Security.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Security",
  data: function data() {
    return {
      user: '',
      count: 0,
      loading: true
    };
  },
  created: function created() {
    var _this = this;

    axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/api/user").then(function (response) {
      _this.user = response.data.data;
      _this.loading = false;
    });
  },
  computed: {
    percent: function percent() {
      if (this.user.email_verified_at) {
        this.count = this.count + 50;
      }

      if (this.user.phoneNumber) {
        this.count = this.count + 50;
      }

      return this.count;
    }
  },
  methods: {
    updateTodo: function updateTodo() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/email/verification-notification").then(function (response) {
        _this2.email_send = response.statusText;
      })["catch"](function (error) {
        _this2.errors = error.response.data.errors;
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/user/Transactions.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/user/Transactions.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Transactions",
  scrollToTop: false,
  data: function data() {
    return {
      userId: window.config.userId,
      // Массив всех баннеров.
      donaters: [],
      // Модель текущего баннера
      donater: null,
      loading: true,
      errored: false,
      validationErrors: '',
      last_donater: null,
      currentTime: null,
      // Модель нашего таймера.
      timing: null,
      timingTime: null,
      update: true,
      enable: window.config.topdonat
    };
  },
  computed: {
    apiTimer: function apiTimer() {
      return '/api/top/timer';
    },
    // Ссылка, на которую будем слать запрос.
    resource: function resource() {
      return '/api/top/donate';
    }
  },
  mounted: function mounted() {
    // Получаем баннеры.
    this.getTimer();
    this.getDonaters();
  },
  methods: {
    /// Получаем таймер
    getTimer: function getTimer() {
      var _this = this;

      // Если вдруг вы не установили в файле `resources/js/bootstrap.js`
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post(this.apiTimer).then(function (response) {
        _this.currentTime = response.data.timer;

        if (!_this.timingTime) {
          _this.runTimingTimer();

          _this.changeTime();
        }
      })["catch"](function (error) {// console.error(error);
      });
    },
    // Получить баннеры.
    getDonaters: function getDonaters() {
      var _this2 = this;

      // Если вдруг вы не установили в файле `resources/js/bootstrap.js`
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get(this.resource).then(function (response) {
        // Добавим полученные с сервера баннеры к текущим.
        _this2.donaters = response.data.data;
        _this2.update = false;

        if (response.data.success === true) {
          // Если это был первый запрос на получение баннеров:
          if (!_this2.timing) {
            // а) то необходимо запустить наш таймер.
            _this2.runTiming(); // б) незамедлительно показать первый баннер.


            _this2.changeBanner();
          }
        }
      })["catch"](function (error) {// console.error(error);
      });
    },
    // Запуск таймера.
    runTimingTimer: function runTimingTimer() {
      // Обязательно очищаем предыдущий таймер.
      clearInterval(this.timingTime); // Запускаем новый таймер по смене баннеров.

      this.timingTime = setInterval(this.changeTime, 600000);
    },
    // Запуск таймера.
    runTiming: function runTiming() {
      // Обязательно очищаем предыдущий таймер.
      clearInterval(this.timing);
      this.update = true; // Запускаем новый таймер по смене баннеров.

      this.timing = setInterval(this.changeBanner, 6000);
    },
    changeTime: function changeTime() {
      this.getTimer();
    },
    changeBanner: function changeBanner() {
      // Если в массиве еще есть баннеры.
      if (this.donaters.length) {
        // Метод `splice` на месте удаляет из массива элементы,
        // и возвращает новый массив из удаленных элементов.
        // Даже если был удален всего один элемент, поэтому [0].
        this.banner = this.donaters.splice(0, 3)[0];
      }

      this.update = true; // Если в массиве не осталось баннеров,
      // то нужно подгрузить еще.
      // Это отдельная конструкция `if`,
      // Не нужно объединять её с предыдущей через `else`.

      this.getDonaters();
    },
    sklonyator: function sklonyator(num, words) {
      var cases = [2, 0, 1, 1, 1, 2];
      return words[num % 100 > 4 && num % 100 < 20 ? 2 : cases[num % 10 < 5 ? num % 10 : 5]];
    }
  },
  // Это хук срабатывает перед удалением компонента,
  // не нужно пытаться его запихать в поле `methods`!
  beforeDestroy: function beforeDestroy() {
    clearInterval(this.timingTime); // При использовании компонентного подхода
    // обязательно удаляем наш таймер.

    clearInterval(this.timing);
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/index.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/user/index.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_user_Characters__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../components/user/Characters */ "./resources/js/components/user/Characters.vue");
/* harmony import */ var _components_user_Transactions__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../components/user/Transactions */ "./resources/js/components/user/Transactions.vue");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _components_user_Security__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../components/user/Security */ "./resources/js/components/user/Security.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ __webpack_exports__["default"] = ({
  name: "index",
  components: {
    Security: _components_user_Security__WEBPACK_IMPORTED_MODULE_3__["default"],
    Transactions: _components_user_Transactions__WEBPACK_IMPORTED_MODULE_1__["default"],
    Characters: _components_user_Characters__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  scrollToTop: false,
  data: function data() {
    return {
      user: '',
      balance: '',
      voteBalance: '',
      email_send: false,
      errors: '',
      title: window.config.appName,
      url: window.config.appUrl,
      style: '',
      loading: true
    };
  },
  metaInfo: function metaInfo() {
    return {
      title: this.$t('user_home')
    };
  },
  created: function created() {
    var _this = this;

    axios__WEBPACK_IMPORTED_MODULE_2___default.a.get("/api/user").then(function (response) {
      _this.user = response.data.data;
      _this.balance = response.data.balance;
      _this.voteBalance = response.data.votes;
      _this.loading = false;
    });
  },
  filters: {
    capitalize: function capitalize(value) {
      if (!value) return '';
      value = value.toString();
      return value.charAt(0).toUpperCase() + value.slice(1);
    },
    capitalice: function capitalice(value) {
      if (!value) return '';
      value = value.toString();
      return value.charAt(0).toUpperCase() + value.slice(1);
    }
  },
  methods: {
    updateTodo: function updateTodo() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_2___default.a.post("/email/verification-notification").then(function (response) {
        _this2.email_send = true;
      })["catch"](function (error) {
        _this2.errors = error.response.data.errors;
      });
    },
    sklonyator: function sklonyator(num, words) {
      var cases = [2, 0, 1, 1, 1, 2];
      return words[num % 100 > 4 && num % 100 < 20 ? 2 : cases[num % 10 < 5 ? num % 10 : 5]];
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/user/Characters.vue?vue&type=template&id=51049cd3&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/user/Characters.vue?vue&type=template&id=51049cd3& ***!
  \******************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "row", attrs: { "data-v-0a034e2c": "" } }, [
    _c(
      "div",
      { staticClass: "overview-card col-12", attrs: { "data-v-0a034e2c": "" } },
      [
        _c(
          "div",
          {
            staticClass: "card account-overview-transactions",
            attrs: {
              "data-v-15d61d2e": "",
              "data-v-0a034e2c": "",
              id: "431329672"
            }
          },
          [
            _c(
              "div",
              { staticClass: "card-title", attrs: { "data-v-15d61d2e": "" } },
              [
                _c(
                  "div",
                  { staticClass: "row", attrs: { "data-v-15d61d2e": "" } },
                  [
                    _c(
                      "div",
                      {
                        staticClass: "col-12 col-md-6",
                        attrs: { "data-v-15d61d2e": "" }
                      },
                      [
                        _c(
                          "h3",
                          {
                            staticClass: "text-uppercase",
                            attrs: { "data-v-15d61d2e": "" }
                          },
                          [_vm._v(_vm._s(_vm.$t("index_18")))]
                        )
                      ]
                    )
                  ]
                )
              ]
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "card-body", attrs: { "data-v-15d61d2e": "" } },
              [
                _c(
                  "div",
                  {
                    staticClass: "account-overview-transactions-table",
                    attrs: { "data-v-15d61d2e": "" }
                  },
                  [
                    _c(
                      "div",
                      {
                        staticClass: "account-table-container",
                        attrs: { "data-v-70ad3292": "", "data-v-15d61d2e": "" }
                      },
                      [
                        !_vm.loading
                          ? _c(
                              "table",
                              {
                                staticClass:
                                  "account-table thead-hide thead-no-border table-background-transparent table b-table table-dark",
                                attrs: {
                                  "data-v-483e03c5": "",
                                  "data-v-121e7cc8": "",
                                  "aria-busy": "false",
                                  "aria-colcount": "6",
                                  "sort-direction": "asc",
                                  id: "__BVID__76_"
                                }
                              },
                              [
                                _vm._m(0),
                                _vm._v(" "),
                                _c(
                                  "tbody",
                                  {},
                                  _vm._l(_vm.game, function(characters, i) {
                                    return _c("tr", { key: characters.id }, [
                                      _c(
                                        "td",
                                        {
                                          staticClass:
                                            "d-none d-md-table-cell align-middle",
                                          attrs: { "aria-colindex": "1" }
                                        },
                                        [
                                          _c(
                                            "div",
                                            {
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [
                                              _c("img", {
                                                staticClass:
                                                  "d-block float-left",
                                                staticStyle: {
                                                  "border-radius":
                                                    "20px!important"
                                                },
                                                attrs: {
                                                  "data-v-121e7cc8": "",
                                                  src: characters.class
                                                }
                                              })
                                            ]
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "td",
                                        {
                                          staticClass:
                                            "d-none d-md-table-cell align-middle d-md-none",
                                          attrs: { "aria-colindex": "1" }
                                        },
                                        [
                                          _c(
                                            "div",
                                            {
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [
                                              _c("img", {
                                                staticClass:
                                                  "d-block float-left",
                                                attrs: {
                                                  "data-v-121e7cc8": "",
                                                  src: characters.race
                                                }
                                              })
                                            ]
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "td",
                                        {
                                          staticClass: "align-middle",
                                          attrs: { "aria-colindex": "2" }
                                        },
                                        [
                                          _c("span", {
                                            staticClass: "text-light",
                                            attrs: { "data-v-121e7cc8": "" }
                                          }),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            {
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [
                                              _vm._v(
                                                _vm._s(characters.name) +
                                                  " (" +
                                                  _vm._s(characters.level) +
                                                  ")"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "div",
                                            {
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [_vm._v(_vm._s(characters.server))]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "div",
                                            {
                                              staticClass: "d-md-none",
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [
                                              _c(
                                                "div",
                                                {
                                                  staticClass: "mt-4",
                                                  attrs: {
                                                    "data-v-121e7cc8": ""
                                                  }
                                                },
                                                [
                                                  _c(
                                                    "div",
                                                    {
                                                      staticClass: "info-label",
                                                      attrs: {
                                                        "data-v-121e7cc8": ""
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        _vm._s(
                                                          _vm.$t("index_20")
                                                        )
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass: "text-light",
                                                      attrs: {
                                                        "data-v-121e7cc8": ""
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        _vm._s(
                                                          characters.totaltime
                                                        )
                                                      )
                                                    ]
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "div",
                                                {
                                                  staticClass: "mt-4",
                                                  attrs: {
                                                    "data-v-121e7cc8": ""
                                                  }
                                                },
                                                [
                                                  _c(
                                                    "div",
                                                    {
                                                      staticClass: "info-label",
                                                      attrs: {
                                                        "data-v-121e7cc8": ""
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        _vm._s(
                                                          _vm.$t("index_21")
                                                        )
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass: "text-light",
                                                      attrs: {
                                                        "data-v-121e7cc8": ""
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        _vm._s(
                                                          characters.logout_time
                                                        )
                                                      )
                                                    ]
                                                  )
                                                ]
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "div",
                                            {
                                              staticClass:
                                                "d-md-none mt-4 account-links",
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "col-md-3 col-lg-3 mt-2 mt-md-0",
                                                  attrs: {
                                                    "data-v-7090ae16": "",
                                                    "data-v-15d61d2e": ""
                                                  }
                                                },
                                                [
                                                  _c(
                                                    "button",
                                                    {
                                                      staticClass:
                                                        "btn-tertiary btn",
                                                      attrs: {
                                                        type: "submit",
                                                        "data-v-15d61d2e": ""
                                                      },
                                                      on: {
                                                        click: function(
                                                          $event
                                                        ) {
                                                          return _vm.select(
                                                            characters.name
                                                          )
                                                        }
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                            " +
                                                          _vm._s(
                                                            _vm.$t("index_22")
                                                          ) +
                                                          "\n                                        "
                                                      )
                                                    ]
                                                  )
                                                ]
                                              )
                                            ]
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "td",
                                        {
                                          staticClass:
                                            "d-none d-md-table-cell align-middle",
                                          attrs: { "aria-colindex": "3" }
                                        },
                                        [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "text-light",
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [_vm._v(_vm._s(_vm.$t("index_20")))]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "div",
                                            {
                                              staticClass: "info-label",
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [
                                              _vm._v(
                                                _vm._s(characters.totaltime)
                                              )
                                            ]
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "td",
                                        {
                                          staticClass:
                                            "d-none d-md-table-cell align-middle",
                                          attrs: { "aria-colindex": "3" }
                                        },
                                        [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "text-light",
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [_vm._v(_vm._s(_vm.$t("index_21")))]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "div",
                                            {
                                              staticClass: "info-label",
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [
                                              _vm._v(
                                                _vm._s(characters.logout_time)
                                              )
                                            ]
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("td", {
                                        staticClass:
                                          "d-none d-xl-table-cell align-middle",
                                        attrs: { "aria-colindex": "4" }
                                      }),
                                      _vm._v(" "),
                                      _vm._m(1, true),
                                      _vm._v(" "),
                                      _c(
                                        "td",
                                        {
                                          staticClass:
                                            "d-none d-md-table-cell font-weight-bold text-right align-middle",
                                          attrs: { "aria-colindex": "6" }
                                        },
                                        [
                                          _c(
                                            "div",
                                            {
                                              staticClass: "account-links",
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "col-md-3 col-lg-3 mt-2 mt-md-0",
                                                  attrs: {
                                                    "data-v-7090ae16": "",
                                                    "data-v-15d61d2e": ""
                                                  }
                                                },
                                                [
                                                  characters.name ===
                                                  characters.selected_characters
                                                    ? _c(
                                                        "button",
                                                        {
                                                          staticClass:
                                                            "btn-tertiary btn",
                                                          attrs: {
                                                            disabled: "",
                                                            type: "submit",
                                                            "data-v-15d61d2e":
                                                              ""
                                                          }
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                           " +
                                                              _vm._s(
                                                                _vm.$t(
                                                                  "index_23"
                                                                )
                                                              ) +
                                                              "\n                                        "
                                                          )
                                                        ]
                                                      )
                                                    : _c(
                                                        "button",
                                                        {
                                                          staticClass:
                                                            "btn-tertiary btn",
                                                          attrs: {
                                                            disabled:
                                                              _vm.isButtonDisabled,
                                                            type: "submit",
                                                            "data-v-15d61d2e":
                                                              ""
                                                          },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              return _vm.select(
                                                                characters.name
                                                              )
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                            " +
                                                              _vm._s(
                                                                _vm.$t(
                                                                  "index_22"
                                                                )
                                                              ) +
                                                              "\n                                        "
                                                          )
                                                        ]
                                                      )
                                                ]
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    ])
                                  }),
                                  0
                                )
                              ]
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _vm.loading
                          ? _c(
                              "div",
                              {
                                staticClass:
                                  "table-states-container table-background-transparent",
                                attrs: { "data-v-70ad3292": "" }
                              },
                              [
                                _c("span", {
                                  staticClass: "spinner-loading-40 mr-2",
                                  attrs: { "data-v-70ad3292": "" }
                                }),
                                _vm._v(
                                  "\n                        " +
                                    _vm._s(_vm.$t("account-overview-loading")) +
                                    "\n                    "
                                )
                              ]
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _vm.errored
                          ? _c(
                              "div",
                              {
                                staticClass:
                                  "table-states-container table-background-transparent",
                                attrs: { "data-v-70ad3292": "" }
                              },
                              [
                                _vm._v(
                                  "\n                        " +
                                    _vm._s(_vm.$t("account-overview-error")) +
                                    "\n                    "
                                )
                              ]
                            )
                          : _vm._e()
                      ]
                    )
                  ]
                )
              ]
            )
          ]
        )
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", { staticClass: "thead-dark" }, [
      _c("tr", [
        _c(
          "th",
          { staticClass: "game-icon", attrs: { "aria-colindex": "1" } },
          [_vm._v("Regional Game Franchise Icon Filename")]
        ),
        _c("th", { attrs: { "aria-colindex": "2" } }, [
          _vm._v("Localized Game Name")
        ]),
        _c(
          "th",
          {
            staticClass: "d-none d-md-table-cell",
            attrs: { "aria-colindex": "3" }
          },
          [_vm._v("Game Account Status")]
        ),
        _c(
          "th",
          {
            staticClass: "d-none d-xl-table-cell",
            attrs: { "aria-colindex": "4" }
          },
          [_vm._v("Last Played Date Millis")]
        ),
        _c(
          "th",
          {
            staticClass: "d-none d-md-table-cell",
            attrs: { "aria-colindex": "5" }
          },
          [_vm._v("Game Time View")]
        ),
        _c(
          "th",
          {
            staticClass: "d-none d-md-table-cell",
            attrs: { "aria-colindex": "6" }
          },
          [_vm._v("Links")]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "td",
      {
        staticClass: "d-none d-md-table-cell align-middle",
        attrs: { "aria-colindex": "5" }
      },
      [_c("span", { attrs: { "data-v-121e7cc8": "" } })]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/user/Security.vue?vue&type=template&id=446a0ee9&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/user/Security.vue?vue&type=template&id=446a0ee9& ***!
  \****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "card-body", attrs: { "data-v-15d61d2e": "" } },
    [
      _c(
        "div",
        {
          staticClass: "row",
          attrs: {
            "data-v-38b4c94e": "",
            "data-v-15d61d2e": "",
            "data-placeholder-id":
              "placeholder-40f410f0-63a6-11eb-9286-899007dc9e80"
          }
        },
        [
          _c(
            "div",
            {
              staticClass: "security-level col-12 col-md-5",
              attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
            },
            [
              _c(
                "div",
                {
                  staticClass: "security-level-indicator",
                  attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
                },
                [
                  _c(
                    "div",
                    {
                      staticClass: "radial-progress",
                      attrs: {
                        "data-v-38b4c94e": "",
                        "data-v-15d61d2e": "",
                        "data-progress": _vm.percent
                      }
                    },
                    [
                      _vm._m(0),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "inset",
                          attrs: {
                            "data-v-38b4c94e": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "percentage percentage-low",
                              attrs: {
                                "data-v-38b4c94e": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _vm._v("%\n        "),
                              _c(
                                "div",
                                {
                                  staticClass: "security-level-complete",
                                  attrs: {
                                    "data-v-38b4c94e": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [_vm._v(_vm._s(_vm.$t("index_13")))]
                              )
                            ]
                          )
                        ]
                      )
                    ]
                  )
                ]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "col-12 col-md-7",
              attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
            },
            [
              _c(
                "div",
                {
                  staticClass: "row mt-4 mt-md-0",
                  attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
                },
                [
                  !_vm.loading && _vm.user.email_verified_at
                    ? _c(
                        "div",
                        {
                          staticClass: "col-3",
                          attrs: {
                            "data-v-38b4c94e": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [_vm._m(1)]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  !_vm.loading && !_vm.user.email_verified_at
                    ? _c(
                        "div",
                        {
                          staticClass: "col-3",
                          attrs: {
                            "data-v-38b4c94e": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [_vm._m(2)]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "col-9 security-option",
                      attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _vm.loading
                        ? _c("span", {
                            staticClass: "placeholder-l animated-background",
                            attrs: {
                              "data-v-05ef4306": "",
                              "data-v-15d61d2e": ""
                            }
                          })
                        : _vm._e(),
                      _vm._v(" "),
                      !_vm.loading && _vm.user.email_verified_at
                        ? _c(
                            "div",
                            {
                              attrs: {
                                "data-v-38b4c94e": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _vm._v(
                                "\n                        " +
                                  _vm._s(_vm.$t("index_14")) +
                                  "\n                    "
                              )
                            ]
                          )
                        : _vm._e(),
                      _vm._v(" "),
                      !_vm.loading && !_vm.user.email_verified_at
                        ? _c(
                            "div",
                            {
                              attrs: {
                                "data-v-38b4c94e": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "a",
                                {
                                  staticClass: "security-link",
                                  attrs: {
                                    "data-v-38b4c94e": "",
                                    href: "javascript:void(0)",
                                    "data-v-15d61d2e": ""
                                  },
                                  on: {
                                    click: function($event) {
                                      return _vm.updateTodo()
                                    }
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                            " +
                                      _vm._s(_vm.$t("index_15")) +
                                      "\n                        "
                                  )
                                ]
                              )
                            ]
                          )
                        : _vm._e()
                    ]
                  )
                ]
              ),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "row mt-3",
                  attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
                },
                [
                  !_vm.loading && _vm.user.phoneNumber
                    ? _c(
                        "div",
                        {
                          staticClass: "col-3",
                          attrs: {
                            "data-v-38b4c94e": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [_vm._m(3)]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  !_vm.loading && !_vm.user.phoneNumber
                    ? _c(
                        "div",
                        {
                          staticClass: "col-3",
                          attrs: {
                            "data-v-38b4c94e": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [_vm._m(4)]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "col-9 security-option",
                      attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _vm.loading
                        ? _c("span", {
                            staticClass: "placeholder-l animated-background",
                            attrs: {
                              "data-v-05ef4306": "",
                              "data-v-15d61d2e": ""
                            }
                          })
                        : _vm._e(),
                      _vm._v(" "),
                      !_vm.loading && _vm.user.phoneNumber
                        ? _c(
                            "div",
                            {
                              attrs: {
                                "data-v-38b4c94e": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _vm._v(
                                "\n                        " +
                                  _vm._s(_vm.$t("index_16")) +
                                  "\n                    "
                              )
                            ]
                          )
                        : _vm._e(),
                      _vm._v(" "),
                      !_vm.loading && !_vm.user.phoneNumber
                        ? _c(
                            "div",
                            {
                              attrs: {
                                "data-v-38b4c94e": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "a",
                                {
                                  staticClass: "security-link",
                                  attrs: {
                                    "data-v-38b4c94e": "",
                                    href: "/details/sms/setup/add",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                            " +
                                      _vm._s(_vm.$t("index_17")) +
                                      "\n                        "
                                  )
                                ]
                              )
                            ]
                          )
                        : _vm._e()
                    ]
                  )
                ]
              )
            ]
          )
        ]
      )
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "circle",
        attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
      },
      [
        _c(
          "div",
          {
            staticClass: "mask full",
            attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
          },
          [
            _c("div", {
              staticClass: "fill",
              attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
            })
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticClass: "mask half",
            attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
          },
          [
            _c("div", {
              staticClass: "fill",
              attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
            }),
            _vm._v(" "),
            _c("div", {
              staticClass: "fill fix",
              attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
            })
          ]
        ),
        _vm._v(" "),
        _c("div", {
          staticClass: "shadow",
          attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
        })
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "span",
      {
        staticClass: "add-security verified",
        attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
      },
      [_c("span", { attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" } })]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "span",
      {
        staticClass: "add-security",
        attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
      },
      [
        _c(
          "span",
          { attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" } },
          [
            _c("span", {
              staticClass: "cross",
              attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
            })
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "span",
      {
        staticClass: "add-security verified",
        attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
      },
      [_c("span", { attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" } })]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "span",
      {
        staticClass: "add-security",
        attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
      },
      [
        _c(
          "span",
          { attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" } },
          [
            _c("span", {
              staticClass: "cross",
              attrs: { "data-v-38b4c94e": "", "data-v-15d61d2e": "" }
            })
          ]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/user/Transactions.vue?vue&type=template&id=a075c404&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/user/Transactions.vue?vue&type=template&id=a075c404& ***!
  \********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "row", attrs: { "data-v-0a034e2c": "" } }, [
    _c(
      "div",
      { staticClass: "overview-card col-12", attrs: { "data-v-0a034e2c": "" } },
      [
        _c(
          "div",
          {
            staticClass: "card account-overview-transactions",
            attrs: {
              "data-v-15d61d2e": "",
              "data-v-0a034e2c": "",
              id: "106006071"
            }
          },
          [
            _c(
              "div",
              { staticClass: "card-title", attrs: { "data-v-15d61d2e": "" } },
              [
                _c(
                  "div",
                  { staticClass: "row", attrs: { "data-v-15d61d2e": "" } },
                  [
                    _c(
                      "div",
                      {
                        staticClass: "col-12 col-md-6",
                        attrs: { "data-v-15d61d2e": "" }
                      },
                      [
                        _c(
                          "h3",
                          {
                            staticClass: "text-uppercase",
                            attrs: { "data-v-15d61d2e": "" }
                          },
                          [_vm._v("До сброса: " + _vm._s(_vm.currentTime))]
                        )
                      ]
                    )
                  ]
                )
              ]
            ),
            _vm._v(" "),
            _vm._m(0),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "card-body", attrs: { "data-v-15d61d2e": "" } },
              [
                _c(
                  "div",
                  {
                    staticClass: "account-overview-transactions-table",
                    attrs: {
                      "data-v-15d61d2e": "",
                      "data-placeholder-id":
                        "placeholder-e4cab810-e186-11eb-9690-a9d2fce3ed9b"
                    }
                  },
                  [
                    _c(
                      "div",
                      {
                        staticClass: "account-table-container",
                        attrs: { "data-v-70ad3292": "", "data-v-15d61d2e": "" }
                      },
                      [
                        _c(
                          "table",
                          {
                            staticClass:
                              "table b-table table-hover table-dark account-table thead-hide thead-no-border table-background-transparent",
                            attrs: {
                              "data-v-483e03c5": "",
                              "data-v-70ad3292": "",
                              "aria-busy": "false",
                              "aria-colcount": "4",
                              "aria-rowcount": "-1",
                              "sort-direction": "asc",
                              id: "__BVID__74_"
                            }
                          },
                          [
                            _vm._m(1),
                            _vm._v(" "),
                            _c(
                              "tbody",
                              {},
                              [
                                _vm._l(_vm.donaters, function(payment, i) {
                                  return !_vm.update
                                    ? _c(
                                        "tr",
                                        {
                                          key: payment.id,
                                          attrs: { "aria-rowindex": i }
                                        },
                                        [
                                          _c(
                                            "td",
                                            {
                                              staticClass:
                                                "d-none d-md-table-cell blz-md-15 align-middle text-nowrap",
                                              attrs: { "aria-colindex": "1" }
                                            },
                                            [
                                              _vm._v(
                                                "\n                                    " +
                                                  _vm._s(i + 1) +
                                                  "\n                                "
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "td",
                                            {
                                              staticClass:
                                                "w-100 w-md-auto blz-md-40 pl-3 pr-1 align-middle text-white blz-text-md-white-70",
                                              attrs: { "aria-colindex": "2" }
                                            },
                                            [
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "d-none d-block d-md-none",
                                                  attrs: {
                                                    "data-v-70ad3292": ""
                                                  }
                                                },
                                                [
                                                  _c(
                                                    "div",
                                                    {
                                                      staticClass: "label",
                                                      attrs: {
                                                        "data-v-70ad3292": ""
                                                      }
                                                    },
                                                    [_vm._v(_vm._s(i + 1))]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "h6",
                                                    {
                                                      staticClass:
                                                        " blz-truncate-2",
                                                      attrs: {
                                                        "data-v-70ad3292": ""
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        _vm._s(payment.username)
                                                      )
                                                    ]
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "d-none d-md-block",
                                                  attrs: {
                                                    "data-v-70ad3292": ""
                                                  }
                                                },
                                                [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "blz-truncate-2",
                                                      attrs: {
                                                        "data-v-70ad3292": ""
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        _vm._s(payment.username)
                                                      )
                                                    ]
                                                  )
                                                ]
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "td",
                                            {
                                              staticClass:
                                                "d-none d-md-table-cell blz-md-15 align-middle text-nowrap",
                                              attrs: { "aria-colindex": "3" }
                                            },
                                            [
                                              _vm._v(
                                                _vm._s(payment.bonuses) +
                                                  " " +
                                                  _vm._s(
                                                    _vm.sklonyator(
                                                      payment.bonuses,
                                                      [
                                                        _vm.$t("index_1"),
                                                        _vm.$t("index_2"),
                                                        _vm.$t("index_3")
                                                      ]
                                                    )
                                                  )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                }),
                                _vm._v(" "),
                                _vm.last_donater && !_vm.update
                                  ? _c(
                                      "tr",
                                      {
                                        key: "5",
                                        attrs: { "aria-rowindex": "5" }
                                      },
                                      [
                                        _c(
                                          "td",
                                          {
                                            staticClass:
                                              "d-none d-md-table-cell blz-md-15 align-middle text-nowrap",
                                            attrs: { "aria-colindex": "1" }
                                          },
                                          [
                                            _vm._v(
                                              "\n                                    ...\n                                "
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "td",
                                          {
                                            staticClass:
                                              "w-100 w-md-auto blz-md-40 pl-3 pr-1 align-middle text-white blz-text-md-white-70",
                                            attrs: { "aria-colindex": "2" }
                                          },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "d-none d-block d-md-none",
                                                attrs: { "data-v-70ad3292": "" }
                                              },
                                              [
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass: "label",
                                                    attrs: {
                                                      "data-v-70ad3292": ""
                                                    }
                                                  },
                                                  [_vm._v("...")]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "h6",
                                                  {
                                                    staticClass:
                                                      " blz-truncate-2",
                                                    attrs: {
                                                      "data-v-70ad3292": ""
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        _vm.last_donater
                                                          .username
                                                      )
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "d-none d-md-block",
                                                attrs: { "data-v-70ad3292": "" }
                                              },
                                              [
                                                _c(
                                                  "span",
                                                  {
                                                    staticClass:
                                                      "blz-truncate-2",
                                                    attrs: {
                                                      "data-v-70ad3292": ""
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        _vm.last_donater
                                                          .username
                                                      )
                                                    )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "td",
                                          {
                                            staticClass:
                                              "d-none d-md-table-cell blz-md-15 align-middle text-nowrap",
                                            attrs: { "aria-colindex": "3" }
                                          },
                                          [
                                            _vm._v(
                                              _vm._s(_vm.payment.bonuses) +
                                                " " +
                                                _vm._s(
                                                  _vm.sklonyator(
                                                    _vm.payment.bonuses,
                                                    [
                                                      _vm.$t("index_1"),
                                                      _vm.$t("index_2"),
                                                      _vm.$t("index_3")
                                                    ]
                                                  )
                                                )
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  : _vm._e()
                              ],
                              2
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _vm.update
                          ? _c(
                              "div",
                              {
                                staticClass:
                                  "table-states-container table-background-transparent",
                                attrs: { "data-v-70ad3292": "" }
                              },
                              [
                                _c("span", {
                                  staticClass: "spinner-loading-40 mr-2",
                                  attrs: { "data-v-70ad3292": "" }
                                }),
                                _vm._v(
                                  "\n                            " +
                                    _vm._s(_vm.$t("account-overview-loading")) +
                                    "\n                        "
                                )
                              ]
                            )
                          : _vm._e()
                      ]
                    )
                  ]
                )
              ]
            )
          ]
        )
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "card-subtitle", attrs: { "data-v-15d61d2e": "" } },
      [
        _c("div", { attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" } }, [
          _c(
            "div",
            {
              staticClass: "alert-message info",
              attrs: {
                "data-v-4918d6bc": "",
                "data-v-6061b8eb": "",
                "data-v-15d61d2e": ""
              }
            },
            [
              _c("div", {
                staticClass: "d-none icon",
                attrs: { "data-v-4918d6bc": "" }
              }),
              _vm._v(" "),
              _c("div", { attrs: { "data-v-4918d6bc": "" } }, [
                _c("h3", {
                  staticClass: "uppercase",
                  attrs: { "data-v-4918d6bc": "" }
                }),
                _vm._v(" "),
                _c("div", { attrs: { "data-v-6061b8eb": "" } }, [
                  _c("span", { attrs: { "data-v-6061b8eb": "" } }, [
                    _vm._v(
                      "Игрок, пожертвовавший больше всего в течение суток, получает 10 бонусов каждый час. Обновление таймера раз в 5 минут."
                    )
                  ])
                ])
              ])
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", { staticClass: "thead-dark" }, [
      _c("tr", [
        _c(
          "th",
          {
            staticClass:
              "sorting sorting_desc d-none d-md-table-cell blz-md-15",
            attrs: {
              tabindex: "0",
              "aria-colindex": "1",
              "aria-label": "Click to sort Ascending",
              "aria-sort": "descending"
            }
          },
          [_vm._v("Дата")]
        ),
        _vm._v(" "),
        _c(
          "th",
          {
            staticClass: "w-100 w-md-auto blz-md-40 pl-3 pr-1",
            attrs: { "aria-colindex": "2" }
          },
          [_vm._v("Наименование")]
        ),
        _vm._v(" "),
        _c(
          "th",
          {
            staticClass: "d-none d-md-table-cell blz-md-15",
            attrs: { "aria-colindex": "3" }
          },
          [_vm._v("Итого")]
        )
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/index.vue?vue&type=template&id=794fb692&":
/*!********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/user/index.vue?vue&type=template&id=794fb692& ***!
  \********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("section", { staticClass: "main-content-section" }, [
    _c(
      "div",
      { staticClass: "account-overview", attrs: { "data-v-0a034e2c": "" } },
      [
        _c(
          "div",
          { staticClass: "title-bar", attrs: { "data-v-0a034e2c": "" } },
          [
            _c("h1", { attrs: { "data-v-0a034e2c": "" } }, [
              _vm._v(_vm._s(_vm.$t("user_home")))
            ])
          ]
        ),
        _vm._v(" "),
        !_vm.loading && !_vm.user.email_verified_at
          ? _c(
              "div",
              {
                directives: [
                  {
                    name: "show",
                    rawName: "v-show",
                    value: !_vm.email_send,
                    expression: "!email_send"
                  }
                ],
                staticClass: "m-0 alert-message info clearfix",
                attrs: { "data-v-4918d6bc": "", "data-v-0a034e2c": "" }
              },
              [
                _c(
                  "div",
                  {
                    staticClass: "float-left icon",
                    attrs: { "data-v-4918d6bc": "" }
                  },
                  [
                    _c(
                      "svg",
                      {
                        staticClass:
                          "svg-inline--fa fa-exclamation-triangle fa-w-18 fa-3x",
                        attrs: {
                          "data-v-0a034e2c": "",
                          "aria-hidden": "true",
                          focusable: "false",
                          "data-prefix": "fal",
                          "data-icon": "exclamation-triangle",
                          role: "img",
                          xmlns: "http://www.w3.org/2000/svg",
                          viewBox: "0 0 576 512"
                        }
                      },
                      [
                        _c("path", {
                          attrs: {
                            "data-v-0a034e2c": "",
                            fill: "currentColor",
                            d:
                              "M270.2 160h35.5c3.4 0 6.1 2.8 6 6.2l-7.5 196c-.1 3.2-2.8 5.8-6 5.8h-20.5c-3.2 0-5.9-2.5-6-5.8l-7.5-196c-.1-3.4 2.6-6.2 6-6.2zM288 388c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28zm281.5 52L329.6 24c-18.4-32-64.7-32-83.2 0L6.5 440c-18.4 31.9 4.6 72 41.6 72H528c36.8 0 60-40 41.5-72zM528 480H48c-12.3 0-20-13.3-13.9-24l240-416c6.1-10.6 21.6-10.7 27.7 0l240 416c6.2 10.6-1.5 24-13.8 24z"
                          }
                        })
                      ]
                    )
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass: "float-left reduced-width",
                    attrs: { "data-v-4918d6bc": "" }
                  },
                  [
                    _c("h3", {
                      staticClass: "uppercase",
                      attrs: { "data-v-4918d6bc": "" }
                    }),
                    _vm._v(" "),
                    _c("span", { attrs: { "data-v-0a034e2c": "" } }, [
                      _c(
                        "span",
                        {
                          staticClass: "label notification-title",
                          attrs: { "data-v-0a034e2c": "" }
                        },
                        [
                          _vm._v(
                            "\n\t\t\t\t" +
                              _vm._s(_vm.$t("index_4")) +
                              " (" +
                              _vm._s(_vm._f("capitalize")(_vm.user.email)) +
                              ") " +
                              _vm._s(_vm.$t("index_5")) +
                              "\n\t\t\t        "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "span",
                        {
                          staticClass: "description",
                          attrs: { "data-v-0a034e2c": "" }
                        },
                        [
                          _vm._v(
                            "\n                            " +
                              _vm._s(_vm.$t("index_6")) +
                              "\n\t\t\t            "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "span",
                        {
                          staticClass: "banner-link",
                          attrs: { "data-v-0a034e2c": "" }
                        },
                        [
                          _c(
                            "a",
                            {
                              attrs: {
                                "data-v-0a034e2c": "",
                                href: "javascript:void(0)"
                              },
                              on: {
                                click: function($event) {
                                  return _vm.updateTodo()
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n                                " +
                                  _vm._s(_vm.$t("index_7")) +
                                  "\n                            "
                              )
                            ]
                          )
                        ]
                      )
                    ])
                  ]
                )
              ]
            )
          : _vm._e(),
        _vm._v(" "),
        _c(
          "div",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.email_send,
                expression: "email_send"
              }
            ],
            staticClass: "m-0 alert-message info clearfix",
            attrs: { "data-v-4918d6bc": "", "data-v-0a034e2c": "" }
          },
          [
            _c(
              "div",
              {
                staticClass: "float-left icon",
                attrs: { "data-v-4918d6bc": "" }
              },
              [
                _c(
                  "svg",
                  {
                    staticClass:
                      "svg-inline--fa fa-exclamation-triangle fa-w-18 fa-3x",
                    attrs: {
                      "data-v-0a034e2c": "",
                      "aria-hidden": "true",
                      focusable: "false",
                      "data-prefix": "fal",
                      "data-icon": "exclamation-triangle",
                      role: "img",
                      xmlns: "http://www.w3.org/2000/svg",
                      viewBox: "0 0 576 512"
                    }
                  },
                  [
                    _c("path", {
                      attrs: {
                        "data-v-0a034e2c": "",
                        fill: "currentColor",
                        d:
                          "M270.2 160h35.5c3.4 0 6.1 2.8 6 6.2l-7.5 196c-.1 3.2-2.8 5.8-6 5.8h-20.5c-3.2 0-5.9-2.5-6-5.8l-7.5-196c-.1-3.4 2.6-6.2 6-6.2zM288 388c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28zm281.5 52L329.6 24c-18.4-32-64.7-32-83.2 0L6.5 440c-18.4 31.9 4.6 72 41.6 72H528c36.8 0 60-40 41.5-72zM528 480H48c-12.3 0-20-13.3-13.9-24l240-416c6.1-10.6 21.6-10.7 27.7 0l240 416c6.2 10.6-1.5 24-13.8 24z"
                      }
                    })
                  ]
                )
              ]
            ),
            _vm._v(" "),
            _c(
              "div",
              {
                staticClass: "float-left reduced-width",
                attrs: { "data-v-4918d6bc": "" }
              },
              [
                _c("h3", {
                  staticClass: "uppercase",
                  attrs: { "data-v-4918d6bc": "" }
                }),
                _vm._v(" "),
                _c("span", { attrs: { "data-v-0a034e2c": "" } }, [
                  _c(
                    "span",
                    {
                      staticClass: "label notification-title",
                      attrs: { "data-v-0a034e2c": "" }
                    },
                    [
                      _vm._v(
                        "\n\t\t\t\t" +
                          _vm._s(_vm.$t("index_4")) +
                          " (" +
                          _vm._s(_vm._f("capitalize")(_vm.user.email)) +
                          ") " +
                          _vm._s(_vm.$t("index_5")) +
                          "\n\t\t\t        "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "span",
                    {
                      staticClass: "description",
                      attrs: { "data-v-0a034e2c": "" }
                    },
                    [
                      _vm._v(
                        "\n                            " +
                          _vm._s(_vm.$t("index_8")) +
                          " " +
                          _vm._s(_vm.user.email) +
                          ".\n\t\t\t            "
                      )
                    ]
                  )
                ])
              ]
            )
          ]
        ),
        _vm._v(" "),
        _c("div", { staticClass: "row", attrs: { "data-v-0a034e2c": "" } }, [
          _c(
            "div",
            {
              staticClass: "overview-card col-12 col-xl-6",
              attrs: { "data-v-0a034e2c": "" }
            },
            [
              _c(
                "div",
                {
                  staticClass: "card account-overview-code",
                  attrs: {
                    "data-v-15d61d2e": "",
                    "data-v-7090ae16": "",
                    "data-v-0a034e2c": ""
                  }
                },
                [
                  _c(
                    "div",
                    {
                      staticClass: "card-title",
                      attrs: { "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "div",
                        {
                          attrs: {
                            "data-v-7090ae16": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "h3",
                            {
                              attrs: {
                                "data-v-7090ae16": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _vm._v(
                                "\n                                    " +
                                  _vm._s(_vm.$t("user_active_code")) +
                                  "\n    "
                              )
                            ]
                          )
                        ]
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "card-body",
                      attrs: { "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "div",
                        {
                          attrs: {
                            "data-v-7090ae16": "",
                            "data-v-15d61d2e": "",
                            id: "redeem-code-form"
                          }
                        },
                        [
                          _c(
                            "form",
                            {
                              staticClass: "row",
                              attrs: {
                                "data-v-7090ae16": "",
                                "data-v-15d61d2e": "",
                                id: "code-claim",
                                method: "get",
                                autocomplete: "off",
                                autocorrect: "off",
                                autocapitalize: "off",
                                spellcheck: "false",
                                action: "/"
                              }
                            },
                            [
                              _c("input", {
                                attrs: {
                                  "data-v-7090ae16": "",
                                  "data-v-15d61d2e": "",
                                  type: "hidden",
                                  name: "returnUrl",
                                  value: "/"
                                }
                              }),
                              _vm._v(" "),
                              _vm._m(0),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "col-md-4 col-lg-4 mt-2 mt-md-0",
                                  attrs: {
                                    "data-v-7090ae16": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _c(
                                    "button",
                                    {
                                      staticClass: "btn-tertiary btn",
                                      attrs: {
                                        "data-v-312dd04b": "",
                                        "data-v-7090ae16": "",
                                        id: "redeem-code-button",
                                        "data-v-15d61d2e": "",
                                        disabled: ""
                                      }
                                    },
                                    [
                                      _vm._v(
                                        _vm._s(_vm.$t("user_active_a_code")) +
                                          "\n    "
                                      )
                                    ]
                                  )
                                ]
                              )
                            ]
                          )
                        ]
                      )
                    ]
                  )
                ]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "overview-card col-12 col-xl-6",
              attrs: { "data-v-0a034e2c": "" }
            },
            [
              _c(
                "div",
                {
                  staticClass: "card account-overview-code",
                  attrs: {
                    "data-v-15d61d2e": "",
                    "data-v-50ca0f34": "",
                    "data-v-0a034e2c": ""
                  }
                },
                [
                  _c(
                    "div",
                    {
                      staticClass: "card-title",
                      attrs: { "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "row",
                          attrs: {
                            "data-v-50ca0f34": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "col-12 col-md-6",
                              attrs: {
                                "data-v-50ca0f34": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "h3",
                                {
                                  attrs: {
                                    "data-v-50ca0f34": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [_vm._v(_vm._s(_vm.$t("user_balance_home")))]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "col-12 col-md-6",
                              attrs: {
                                "data-v-50ca0f34": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "router-link",
                                {
                                  staticClass:
                                    "card-header-link float-md-right",
                                  attrs: {
                                    "data-v-50ca0f34": "",
                                    to: { name: "payment" },
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                        " +
                                      _vm._s(_vm.$t("user_balance_payment")) +
                                      " "
                                  ),
                                  _c(
                                    "svg",
                                    {
                                      staticClass:
                                        "svg-inline--fa fa-chevron-right fa-w-10",
                                      attrs: {
                                        "data-v-50ca0f34": "",
                                        "aria-hidden": "true",
                                        focusable: "false",
                                        "data-prefix": "fas",
                                        "data-icon": "chevron-right",
                                        role: "img",
                                        xmlns: "http://www.w3.org/2000/svg",
                                        viewBox: "0 0 320 512"
                                      }
                                    },
                                    [
                                      _c("path", {
                                        attrs: {
                                          "data-v-50ca0f34": "",
                                          fill: "currentColor",
                                          d:
                                            "M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                        }
                                      })
                                    ]
                                  )
                                ]
                              )
                            ],
                            1
                          )
                        ]
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "card-body",
                      attrs: { "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "div",
                        {
                          attrs: {
                            "data-v-19975e4f": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "row",
                              attrs: {
                                "data-v-19975e4f": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass: "col-12 col-md-8",
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm.loading
                                    ? _c("span", {
                                        staticClass:
                                          "placeholder-l animated-background",
                                        attrs: {
                                          "data-v-05ef4306": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      })
                                    : _vm._e(),
                                  _vm._v(" "),
                                  !_vm.loading
                                    ? _c(
                                        "span",
                                        {
                                          staticClass: "balance",
                                          attrs: {
                                            "data-v-50ca0f34": "",
                                            "data-v-15d61d2e": ""
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "\n                                    " +
                                              _vm._s(_vm.balance) +
                                              " " +
                                              _vm._s(
                                                _vm.sklonyator(_vm.balance, [
                                                  _vm.$t("index_1"),
                                                  _vm.$t("index_2"),
                                                  _vm.$t("index_3")
                                                ])
                                              ) +
                                              "\n                                        "
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "row mt-3 mt-md-3",
                              attrs: {
                                "data-v-19975e4f": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass: "col-12 col-md-8",
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm.loading
                                    ? _c("span", {
                                        staticClass:
                                          "placeholder-l animated-background",
                                        attrs: {
                                          "data-v-05ef4306": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      })
                                    : _vm._e(),
                                  _vm._v(" "),
                                  !_vm.loading
                                    ? _c(
                                        "span",
                                        {
                                          staticClass: "vote",
                                          attrs: {
                                            "data-v-50ca0f35": "",
                                            "data-v-15d61d2e": ""
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "\n                                    " +
                                              _vm._s(_vm.voteBalance) +
                                              " " +
                                              _vm._s(
                                                _vm.sklonyator(
                                                  _vm.voteBalance,
                                                  [
                                                    _vm.$t("vote_21"),
                                                    _vm.$t("vote_22"),
                                                    _vm.$t("vote_23")
                                                  ]
                                                )
                                              ) +
                                              "\n                                        "
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ]
                              )
                            ]
                          )
                        ]
                      )
                    ]
                  )
                ]
              )
            ]
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row", attrs: { "data-v-0a034e2c": "" } }, [
          _c(
            "div",
            {
              staticClass: "overview-card col-12 col-xl-6",
              attrs: { "data-v-0a034e2c": "" }
            },
            [
              _c(
                "div",
                {
                  staticClass: "card account-overview-details",
                  attrs: {
                    "data-v-15d61d2e": "",
                    "data-v-19975e4f": "",
                    "data-v-0a034e2c": ""
                  }
                },
                [
                  _c(
                    "div",
                    {
                      staticClass: "card-title",
                      attrs: { "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "row",
                          attrs: {
                            "data-v-19975e4f": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "col-12 col-md-8 col-lg-7",
                              attrs: {
                                "data-v-19975e4f": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "h3",
                                {
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [_vm._v(_vm._s(_vm.$t("user_data")))]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "col-12 col-md-4 col-lg-5",
                              attrs: {
                                "data-v-19975e4f": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "router-link",
                                {
                                  staticClass:
                                    "card-header-link float-md-right",
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    to: { name: "details" },
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                        " +
                                      _vm._s(_vm.$t("user_details")) +
                                      " "
                                  ),
                                  _c(
                                    "svg",
                                    {
                                      staticClass:
                                        "svg-inline--fa fa-chevron-right fa-w-10",
                                      attrs: {
                                        "data-v-19975e4f": "",
                                        "aria-hidden": "true",
                                        focusable: "false",
                                        "data-prefix": "fas",
                                        "data-icon": "chevron-right",
                                        role: "img",
                                        xmlns: "http://www.w3.org/2000/svg",
                                        viewBox: "0 0 320 512"
                                      }
                                    },
                                    [
                                      _c("path", {
                                        attrs: {
                                          "data-v-19975e4f": "",
                                          fill: "currentColor",
                                          d:
                                            "M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                        }
                                      })
                                    ]
                                  )
                                ]
                              )
                            ],
                            1
                          )
                        ]
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "card-body",
                      attrs: { "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "div",
                        {
                          attrs: {
                            "data-v-19975e4f": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "row",
                              attrs: {
                                "data-v-19975e4f": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass: "label col-12 col-md-4",
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                        " +
                                      _vm._s(_vm.$t("index_9")) +
                                      "\n                                    "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "col-12 col-md-8",
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm.loading
                                    ? _c("span", {
                                        staticClass:
                                          "placeholder-l animated-background",
                                        attrs: {
                                          "data-v-05ef4306": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      })
                                    : _vm._e(),
                                  _vm._v(" "),
                                  !_vm.loading
                                    ? _c(
                                        "span",
                                        {
                                          attrs: {
                                            "data-v-19975e4f": "",
                                            "data-v-15d61d2e": ""
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "\n                                            " +
                                              _vm._s(_vm.user.id) +
                                              "\n                                        "
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "row mt-3 mt-md-3",
                              attrs: {
                                "data-v-19975e4f": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass: "label col-12 col-md-4",
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                        " +
                                      _vm._s(_vm.$t("index_10")) +
                                      "\n                                    "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "col-12 col-md-8",
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm.loading
                                    ? _c("span", {
                                        staticClass:
                                          "placeholder-l animated-background",
                                        attrs: {
                                          "data-v-05ef4306": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      })
                                    : _vm._e(),
                                  _vm._v(" "),
                                  !_vm.loading
                                    ? _c(
                                        "span",
                                        {
                                          attrs: {
                                            "data-v-19975e4f": "",
                                            "data-v-15d61d2e": ""
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "\n                                            " +
                                              _vm._s(
                                                _vm._f("capitalize")(
                                                  _vm.user.lastName
                                                )
                                              ) +
                                              " " +
                                              _vm._s(
                                                _vm._f("capitalize")(
                                                  _vm.user.firstName
                                                )
                                              ) +
                                              "\n                                        "
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "row mt-3 mt-md-3",
                              attrs: {
                                "data-v-19975e4f": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass: "label col-12 col-md-4",
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.title) +
                                      "Tag\n                                    "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "col-12 col-md-8",
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm.loading
                                    ? _c("span", {
                                        staticClass:
                                          "placeholder-l animated-background",
                                        attrs: {
                                          "data-v-05ef4306": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      })
                                    : _vm._e(),
                                  _vm._v(" "),
                                  !_vm.loading
                                    ? _c(
                                        "span",
                                        {
                                          attrs: {
                                            "data-v-19975e4f": "",
                                            "data-v-15d61d2e": ""
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "\n                                            " +
                                              _vm._s(
                                                _vm._f("capitalize")(
                                                  _vm.user.name
                                                )
                                              ) +
                                              "\n                                        "
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "row mt-3 mt-md-3",
                              attrs: {
                                "data-v-19975e4f": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass: "label col-12 col-md-4",
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                " +
                                      _vm._s(_vm.$t("user_details_email")) +
                                      "\n    "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "col-12 col-md-8 text-truncate",
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm.loading
                                    ? _c("span", {
                                        staticClass:
                                          "placeholder-l animated-background",
                                        attrs: {
                                          "data-v-05ef4306": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      })
                                    : _vm._e(),
                                  _vm._v(" "),
                                  !_vm.loading
                                    ? _c(
                                        "span",
                                        {
                                          attrs: {
                                            "data-v-19975e4f": "",
                                            "data-v-15d61d2e": ""
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "\n\t\t\t\t\t" +
                                              _vm._s(_vm.user.email) +
                                              "\n\t\t\t\t"
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "row mt-3 mt-md-3",
                              attrs: {
                                "data-v-19975e4f": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass: "label col-12 col-md-4",
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.$t("index_11")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "col-12 col-md-8",
                                  attrs: {
                                    "data-v-19975e4f": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm.loading
                                    ? _c("span", {
                                        staticClass:
                                          "placeholder-l animated-background",
                                        attrs: {
                                          "data-v-05ef4306": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      })
                                    : _vm._e(),
                                  _vm._v(" "),
                                  !_vm.loading
                                    ? _c(
                                        "span",
                                        {
                                          attrs: {
                                            "data-v-19975e4f": "",
                                            "data-v-15d61d2e": ""
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "\n                                        " +
                                              _vm._s(_vm.user.phoneNumber) +
                                              "\n                                        "
                                          ),
                                          !_vm.user.phoneNumber
                                            ? _c(
                                                "a",
                                                {
                                                  staticClass: "float-md-left",
                                                  attrs: {
                                                    "data-v-19975e4f": "",
                                                    href:
                                                      "/details/sms/setup/add",
                                                    "data-v-15d61d2e": ""
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    "\n\t\t\t\t\t\t" +
                                                      _vm._s(
                                                        _vm.$t("index_12")
                                                      ) +
                                                      "\n\t\t\t\t\t"
                                                  )
                                                ]
                                              )
                                            : _vm._e()
                                        ]
                                      )
                                    : _vm._e()
                                ]
                              )
                            ]
                          )
                        ]
                      )
                    ]
                  )
                ]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "overview-card col-12 col-xl-6",
              attrs: { "data-v-0a034e2c": "" }
            },
            [
              _c(
                "div",
                {
                  staticClass: "card account-overview-security",
                  attrs: {
                    "data-v-15d61d2e": "",
                    "data-v-38b4c94e": "",
                    "data-v-0a034e2c": ""
                  }
                },
                [
                  _c(
                    "div",
                    {
                      staticClass: "card-title",
                      attrs: { "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "row",
                          attrs: {
                            "data-v-38b4c94e": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "col-12 col-md-6",
                              attrs: {
                                "data-v-38b4c94e": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "h3",
                                {
                                  attrs: {
                                    "data-v-38b4c94e": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [_vm._v(_vm._s(_vm.$t("user_security")))]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "col-12 col-md-6",
                              attrs: {
                                "data-v-38b4c94e": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "router-link",
                                {
                                  staticClass:
                                    "card-header-link float-md-right",
                                  attrs: {
                                    "data-v-38b4c94e": "",
                                    to: { name: "security" },
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                        " +
                                      _vm._s(_vm.$t("user_a_security")) +
                                      " "
                                  ),
                                  _c(
                                    "svg",
                                    {
                                      staticClass:
                                        "svg-inline--fa fa-chevron-right fa-w-10",
                                      attrs: {
                                        "data-v-38b4c94e": "",
                                        "aria-hidden": "true",
                                        focusable: "false",
                                        "data-prefix": "fas",
                                        "data-icon": "chevron-right",
                                        role: "img",
                                        xmlns: "http://www.w3.org/2000/svg",
                                        viewBox: "0 0 320 512"
                                      }
                                    },
                                    [
                                      _c("path", {
                                        attrs: {
                                          "data-v-38b4c94e": "",
                                          fill: "currentColor",
                                          d:
                                            "M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                        }
                                      })
                                    ]
                                  )
                                ]
                              )
                            ],
                            1
                          )
                        ]
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c("Security")
                ],
                1
              )
            ]
          )
        ]),
        _vm._v(" "),
        _c("characters"),
        _vm._v(" "),
        _c("transactions")
      ],
      1
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "col-md-6 col-lg-7",
        attrs: { "data-v-7090ae16": "", "data-v-15d61d2e": "" }
      },
      [
        _c("input", {
          staticClass: "input-block",
          attrs: {
            "data-v-7090ae16": "",
            "data-v-15d61d2e": "",
            placeholder: "XXXX-XXXX-XXXX-XXXX",
            type: "text",
            id: "redeem-code",
            name: "keyCode",
            value: ""
          }
        })
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/user/Characters.vue":
/*!*****************************************************!*\
  !*** ./resources/js/components/user/Characters.vue ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Characters_vue_vue_type_template_id_51049cd3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Characters.vue?vue&type=template&id=51049cd3& */ "./resources/js/components/user/Characters.vue?vue&type=template&id=51049cd3&");
/* harmony import */ var _Characters_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Characters.vue?vue&type=script&lang=js& */ "./resources/js/components/user/Characters.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Characters_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Characters_vue_vue_type_template_id_51049cd3___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Characters_vue_vue_type_template_id_51049cd3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/user/Characters.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/user/Characters.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/components/user/Characters.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Characters_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Characters.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/user/Characters.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Characters_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/user/Characters.vue?vue&type=template&id=51049cd3&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/user/Characters.vue?vue&type=template&id=51049cd3& ***!
  \************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Characters_vue_vue_type_template_id_51049cd3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Characters.vue?vue&type=template&id=51049cd3& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/user/Characters.vue?vue&type=template&id=51049cd3&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Characters_vue_vue_type_template_id_51049cd3___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Characters_vue_vue_type_template_id_51049cd3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/user/Security.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/user/Security.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Security_vue_vue_type_template_id_446a0ee9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Security.vue?vue&type=template&id=446a0ee9& */ "./resources/js/components/user/Security.vue?vue&type=template&id=446a0ee9&");
/* harmony import */ var _Security_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Security.vue?vue&type=script&lang=js& */ "./resources/js/components/user/Security.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Security_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Security_vue_vue_type_template_id_446a0ee9___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Security_vue_vue_type_template_id_446a0ee9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/user/Security.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/user/Security.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/user/Security.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Security_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Security.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/user/Security.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Security_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/user/Security.vue?vue&type=template&id=446a0ee9&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/user/Security.vue?vue&type=template&id=446a0ee9& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Security_vue_vue_type_template_id_446a0ee9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Security.vue?vue&type=template&id=446a0ee9& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/user/Security.vue?vue&type=template&id=446a0ee9&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Security_vue_vue_type_template_id_446a0ee9___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Security_vue_vue_type_template_id_446a0ee9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/user/Transactions.vue":
/*!*******************************************************!*\
  !*** ./resources/js/components/user/Transactions.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Transactions_vue_vue_type_template_id_a075c404___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Transactions.vue?vue&type=template&id=a075c404& */ "./resources/js/components/user/Transactions.vue?vue&type=template&id=a075c404&");
/* harmony import */ var _Transactions_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Transactions.vue?vue&type=script&lang=js& */ "./resources/js/components/user/Transactions.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Transactions_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Transactions_vue_vue_type_template_id_a075c404___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Transactions_vue_vue_type_template_id_a075c404___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/user/Transactions.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/user/Transactions.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/user/Transactions.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Transactions_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Transactions.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/user/Transactions.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Transactions_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/user/Transactions.vue?vue&type=template&id=a075c404&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/user/Transactions.vue?vue&type=template&id=a075c404& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Transactions_vue_vue_type_template_id_a075c404___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Transactions.vue?vue&type=template&id=a075c404& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/user/Transactions.vue?vue&type=template&id=a075c404&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Transactions_vue_vue_type_template_id_a075c404___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Transactions_vue_vue_type_template_id_a075c404___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/pages/user/index.vue":
/*!*******************************************!*\
  !*** ./resources/js/pages/user/index.vue ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_vue_vue_type_template_id_794fb692___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=794fb692& */ "./resources/js/pages/user/index.vue?vue&type=template&id=794fb692&");
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/pages/user/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _index_vue_vue_type_template_id_794fb692___WEBPACK_IMPORTED_MODULE_0__["render"],
  _index_vue_vue_type_template_id_794fb692___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/user/index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/user/index.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./resources/js/pages/user/index.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/user/index.vue?vue&type=template&id=794fb692&":
/*!**************************************************************************!*\
  !*** ./resources/js/pages/user/index.vue?vue&type=template&id=794fb692& ***!
  \**************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_794fb692___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=template&id=794fb692& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/index.vue?vue&type=template&id=794fb692&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_794fb692___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_794fb692___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);