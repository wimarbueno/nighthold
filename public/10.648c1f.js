(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[10],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/games.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/user/games.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "games",
  scrollToTop: false,
  data: function data() {
    return {
      dataSL: '',
      dataWotlk: '',
      loginSl: '',
      loginWotlk: '',
      banned: {
        active: '',
        bandate: '',
        bannedby: '',
        banreason: '',
        id: '',
        unbandate: ''
      },
      loading: true,
      errored: false,
      validationErrors: ''
    };
  },
  mounted: function mounted() {
    this.getUserGame();
    this.getUserBanned();
  },
  computed: {
    classObject: function classObject() {
      return {
        'text-warning': this.banned === 1,
        'info-label': this.banned === 0
      };
    }
  },
  methods: {
    localeDate: function localeDate(payDate) {
      return new Date(payDate).toLocaleDateString();
    },
    getUserGame: function getUserGame() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/api/user/game').then(function (response) {
        _this.dataSL = response.data.dataSL;
        _this.dataWotlk = response.data.dataWotlk;
        _this.loginSl = response.data.loginSl;
        _this.loginWotlk = response.data.loginWotlk;
        _this.loading = false;
      })["catch"](function (error) {
        _this.errored = true;
      })["finally"](function () {
        return _this.loading = false;
      });
    },
    getUserBanned: function getUserBanned() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/api/user/banned').then(function (response) {
        _this2.banned = response.data.data;
      })["catch"](function (error) {
        _this2.errored = true;
      })["finally"](function () {
        return _this2.loading = false;
      });
    },
    userBanned: function userBanned(ban) {
      if (ban === 0) {
        return this.$t('user_banned_0');
      } else {
        return this.$t('user_banned_1');
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/games.vue?vue&type=template&id=30319f26&":
/*!********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/user/games.vue?vue&type=template&id=30319f26& ***!
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
    _c("div", [
      _c(
        "div",
        {
          staticClass: "title-bar text-center text-lg-left position-relative",
          attrs: { "data-v-ba34107c": "" }
        },
        [
          _c("h1", { attrs: { "data-v-ba34107c": "" } }, [
            _vm._v(_vm._s(_vm.$t("account_overview_games")))
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "back d-lg-none position-absolute",
              attrs: { "data-v-ba34107c": "" }
            },
            [
              _c(
                "a",
                {
                  staticClass: "router-link-active",
                  attrs: { "data-v-ba34107c": "", href: "/" }
                },
                [
                  _c(
                    "svg",
                    {
                      staticClass: "svg-inline--fa fa-chevron-left fa-w-8",
                      attrs: {
                        "data-v-ba34107c": "",
                        "aria-hidden": "true",
                        focusable: "false",
                        "data-prefix": "fal",
                        "data-icon": "chevron-left",
                        role: "img",
                        xmlns: "http://www.w3.org/2000/svg",
                        viewBox: "0 0 256 512"
                      }
                    },
                    [
                      _c("path", {
                        attrs: {
                          "data-v-ba34107c": "",
                          fill: "currentColor",
                          d:
                            "M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z"
                        }
                      })
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
          staticClass: "card mt-card-top account-overview-games",
          attrs: {
            "data-v-15d61d2e": "",
            "data-blz-addressable-by": "game-accounts"
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
                        [_vm._v(_vm._s(_vm.$t("account_overview_games")))]
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
                  staticClass: "account-overview-games-table",
                  attrs: {
                    "data-v-15d61d2e": "",
                    "data-placeholder-id":
                      "placeholder-1fdf44b0-66bd-11eb-9975-935b2acb1ee2"
                  }
                },
                [
                  _vm.loading
                    ? _c("div", { staticClass: "content-placeholder" }, [
                        _vm._m(0)
                      ])
                    : _vm._e(),
                  _vm._v(" "),
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
                            id: "__BVID__85_"
                          }
                        },
                        [
                          _vm._m(1),
                          _vm._v(" "),
                          _c("tbody", {}, [
                            _c("tr", {}, [
                              _vm._m(2),
                              _vm._v(" "),
                              _c(
                                "td",
                                {
                                  staticClass: "align-middle",
                                  attrs: { "aria-colindex": "2" }
                                },
                                [
                                  _c(
                                    "span",
                                    {
                                      staticClass: "text-light",
                                      attrs: { "data-v-121e7cc8": "" }
                                    },
                                    [_vm._v("WoW: Wrath of the Lich King®")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { attrs: { "data-v-121e7cc8": "" } },
                                    [_vm._v("(" + _vm._s(_vm.loginWotlk) + ")")]
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
                                          attrs: { "data-v-121e7cc8": "" }
                                        },
                                        [
                                          _c(
                                            "div",
                                            {
                                              staticClass: "info-label",
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [_vm._v("Состояние записи")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            {
                                              class: _vm.classObject,
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [_vm._v("Неактивна")]
                                          )
                                        ]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _vm._m(3)
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
                                      class: _vm.classObject,
                                      attrs: { "data-v-121e7cc8": "" }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                " +
                                          _vm._s(_vm.userBanned(_vm.banned)) +
                                          "\n                            "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "info-label",
                                      attrs: { "data-v-121e7cc8": "" }
                                    },
                                    [_vm._v("Состояние записи")]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "td",
                                {
                                  staticClass:
                                    "d-none d-xl-table-cell align-middle",
                                  attrs: { "aria-colindex": "4" }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass: "text-light",
                                      attrs: { "data-v-121e7cc8": "" }
                                    },
                                    [_vm._v(_vm._s(_vm.dataWotlk))]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "info-label",
                                      attrs: { "data-v-121e7cc8": "" }
                                    },
                                    [_vm._v("Последняя игра")]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _vm._m(4),
                              _vm._v(" "),
                              _vm._m(5)
                            ]),
                            _vm._v(" "),
                            _c("tr", {}, [
                              _vm._m(6),
                              _vm._v(" "),
                              _c(
                                "td",
                                {
                                  staticClass: "align-middle",
                                  attrs: { "aria-colindex": "2" }
                                },
                                [
                                  _c(
                                    "span",
                                    {
                                      staticClass: "text-light",
                                      attrs: { "data-v-121e7cc8": "" }
                                    },
                                    [_vm._v("WoW®: Shadowlands®")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { attrs: { "data-v-121e7cc8": "" } },
                                    [_vm._v("(" + _vm._s(_vm.loginSl) + ")")]
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
                                          attrs: { "data-v-121e7cc8": "" }
                                        },
                                        [
                                          _c(
                                            "div",
                                            {
                                              staticClass: "info-label",
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [_vm._v("Состояние записи")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            {
                                              class: _vm.classObject,
                                              attrs: { "data-v-121e7cc8": "" }
                                            },
                                            [_vm._v("Неактивна")]
                                          )
                                        ]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _vm._m(7)
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
                                      class: _vm.classObject,
                                      attrs: { "data-v-121e7cc8": "" }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                " +
                                          _vm._s(_vm.userBanned(_vm.banned)) +
                                          "\n                            "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "info-label",
                                      attrs: { "data-v-121e7cc8": "" }
                                    },
                                    [_vm._v("Состояние записи")]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "td",
                                {
                                  staticClass:
                                    "d-none d-xl-table-cell align-middle",
                                  attrs: { "aria-colindex": "4" }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass: "text-light",
                                      attrs: { "data-v-121e7cc8": "" }
                                    },
                                    [_vm._v(_vm._s(_vm.dataSL))]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "info-label",
                                      attrs: { "data-v-121e7cc8": "" }
                                    },
                                    [_vm._v("Последняя игра")]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _vm._m(8),
                              _vm._v(" "),
                              _vm._m(9)
                            ])
                          ])
                        ]
                      )
                    : _vm._e()
                ]
              )
            ]
          )
        ]
      )
    ])
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
        staticClass: "content-body",
        staticStyle: { height: "100%", width: "100%" }
      },
      [
        _c("div", {
          staticClass: "animated-background",
          staticStyle: { height: "20px", width: "100%", display: "block" }
        }),
        _vm._v(" "),
        _c("br"),
        _vm._v(" "),
        _c("div", {
          staticClass: "animated-background",
          staticStyle: { height: "20px", width: "100%", display: "block" }
        }),
        _vm._v(" "),
        _c("br"),
        _vm._v(" "),
        _c("div", {
          staticClass: "animated-background",
          staticStyle: { height: "20px", width: "100%", display: "block" }
        }),
        _vm._v(" "),
        _c("br"),
        _vm._v(" "),
        _c("div", {
          staticClass: "animated-background",
          staticStyle: { height: "20px", width: "100%", display: "block" }
        })
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
      { staticClass: "game-icon", attrs: { "aria-colindex": "1" } },
      [
        _c("div", { attrs: { "data-v-121e7cc8": "" } }, [
          _c("img", {
            staticClass: "d-block float-left",
            attrs: {
              "data-v-121e7cc8": "",
              src: __webpack_require__(/*! ../../../static/images/game-icons/world-of-warcraft.svg */ "./resources/static/images/game-icons/world-of-warcraft.svg")
            }
          })
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "d-md-none mt-4 account-links",
        attrs: { "data-v-121e7cc8": "" }
      },
      [
        _c("div", { attrs: { "data-v-121e7cc8": "" } }, [
          _c("a", { attrs: { "data-v-121e7cc8": "", href: "/" } })
        ])
      ]
    )
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
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "td",
      {
        staticClass:
          "d-none d-md-table-cell font-weight-bold text-right align-middle",
        attrs: { "aria-colindex": "6" }
      },
      [
        _c(
          "div",
          { staticClass: "account-links", attrs: { "data-v-121e7cc8": "" } },
          [
            _c("div", { attrs: { "data-v-121e7cc8": "" } }, [
              _c("a", { attrs: { "data-v-121e7cc8": "", href: "/" } })
            ])
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
      "td",
      { staticClass: "game-icon", attrs: { "aria-colindex": "1" } },
      [
        _c("div", { attrs: { "data-v-121e7cc8": "" } }, [
          _c("img", {
            staticClass: "d-block float-left",
            attrs: {
              "data-v-121e7cc8": "",
              src: __webpack_require__(/*! ../../../static/images/game-icons/world-of-warcraft.svg */ "./resources/static/images/game-icons/world-of-warcraft.svg")
            }
          })
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "d-md-none mt-4 account-links",
        attrs: { "data-v-121e7cc8": "" }
      },
      [
        _c("div", { attrs: { "data-v-121e7cc8": "" } }, [
          _c("a", { attrs: { "data-v-121e7cc8": "", href: "/" } })
        ])
      ]
    )
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
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "td",
      {
        staticClass:
          "d-none d-md-table-cell font-weight-bold text-right align-middle",
        attrs: { "aria-colindex": "6" }
      },
      [
        _c(
          "div",
          { staticClass: "account-links", attrs: { "data-v-121e7cc8": "" } },
          [
            _c("div", { attrs: { "data-v-121e7cc8": "" } }, [
              _c("a", { attrs: { "data-v-121e7cc8": "", href: "/" } })
            ])
          ]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/pages/user/games.vue":
/*!*******************************************!*\
  !*** ./resources/js/pages/user/games.vue ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _games_vue_vue_type_template_id_30319f26___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./games.vue?vue&type=template&id=30319f26& */ "./resources/js/pages/user/games.vue?vue&type=template&id=30319f26&");
/* harmony import */ var _games_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./games.vue?vue&type=script&lang=js& */ "./resources/js/pages/user/games.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _games_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _games_vue_vue_type_template_id_30319f26___WEBPACK_IMPORTED_MODULE_0__["render"],
  _games_vue_vue_type_template_id_30319f26___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/user/games.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/user/games.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./resources/js/pages/user/games.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_games_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./games.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/games.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_games_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/user/games.vue?vue&type=template&id=30319f26&":
/*!**************************************************************************!*\
  !*** ./resources/js/pages/user/games.vue?vue&type=template&id=30319f26& ***!
  \**************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_games_vue_vue_type_template_id_30319f26___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./games.vue?vue&type=template&id=30319f26& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/games.vue?vue&type=template&id=30319f26&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_games_vue_vue_type_template_id_30319f26___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_games_vue_vue_type_template_id_30319f26___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/static/images/game-icons/world-of-warcraft.svg":
/*!******************************************************************!*\
  !*** ./resources/static/images/game-icons/world-of-warcraft.svg ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/world-of-warcraft.svg?3c732b2e2171c5d9983ab630ec6ae850";

/***/ })

}]);