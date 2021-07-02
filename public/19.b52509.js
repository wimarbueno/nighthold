(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[19],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/details.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/user/details.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "detailsUser",
  scrollToTop: false,
  data: function data() {
    return {
      user: '',
      loading: true,
      edits: false,
      editName: false,
      isSendEmail: false,
      isSendUserData: false,
      email_send: '',
      title: window.config.appName,
      url: window.config.appUrl,
      status_msg: "",
      status: false,
      statusUser: false,
      style: "display: none;"
    };
  },
  created: function created() {
    var _this = this;

    axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/api/user").then(function (response) {
      _this.user = response.data.data;
      _this.loading = false;
    });
  },
  methods: {
    showMore: function showMore() {
      this.edits = true;
    },
    showEditName: function showEditName() {
      this.editName = true;
    },
    cancel: function cancel() {
      this.edits = false;
      this.editName = false;
    },
    sendUserData: function sendUserData() {
      var _this2 = this;

      this.isSendUserData = true;

      if (!this.validateForm()) {
        return false;
      }

      var formData = new FormData();
      formData.append("first-name", this.user.firstName);
      formData.append("last-name", this.user.lastName);
      formData.append("country", this.user.country);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/api/edit/name", formData).then(function (res) {
        _this2.statusUser = true;

        _this2.showNotification(res.data.message);

        _this2.isSendUserData = false;
        _this2.editName = false;
      });
    },
    sendEmail: function sendEmail() {
      var _this3 = this;

      this.isSendEmail = true;

      if (!this.validateForm()) {
        return false;
      }

      var formData = new FormData();
      formData.append("email", this.user.email);
      formData.append("password", this.user.password);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/api/edit/email", formData).then(function (res) {
        _this3.status = true;

        _this3.showNotification(res.data.message);

        _this3.isSendEmail = false;
        _this3.edits = false;
      });
    },
    validateForm: function validateForm() {
      if (!this.user.email) {
        this.status = false;
        this.showNotification("Не заполнено поле");
        return false;
      }

      return true;
    },
    updateTodo: function updateTodo() {
      var _this4 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/email/verification-notification").then(function (response) {
        _this4.email_send = response.statusText;
      })["catch"](function (error) {
        _this4.errors = error.response.data.errors;
      });
    },
    showNotification: function showNotification(message) {
      var _this5 = this;

      this.status_msg = message;
      this.style = "";
      setTimeout(function () {
        _this5.status_msg = "";
        _this5.style = "display: none;";
      }, 3000);
    }
  },
  metaInfo: function metaInfo() {
    return {
      title: 'Информация о записи'
    };
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
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/details.vue?vue&type=template&id=78c75232&":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/user/details.vue?vue&type=template&id=78c75232& ***!
  \**********************************************************************************************************************************************************************************************************/
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
    _c("div", { attrs: { "data-v-34b77a92": "" } }, [
      _c(
        "div",
        {
          staticClass: "title-bar text-center text-lg-left position-relative",
          attrs: { "data-v-ba34107c": "", "data-v-34b77a92": "" }
        },
        [
          _c("h1", { attrs: { "data-v-ba34107c": "" } }, [
            _vm._v(_vm._s(_vm.$t("details_1")))
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
          staticClass: "card mt-card-top personal-info",
          attrs: {
            "data-v-15d61d2e": "",
            "data-v-7c3c8cd5": "",
            "data-v-34b77a92": "",
            id: "personal-info-card",
            "data-blz-addressable-by": "personal-info"
          }
        },
        [
          _c(
            "div",
            { staticClass: "card-title", attrs: { "data-v-15d61d2e": "" } },
            [
              _c(
                "div",
                {
                  staticClass: "row",
                  attrs: { "data-v-7c3c8cd5": "", "data-v-15d61d2e": "" }
                },
                [
                  _c(
                    "div",
                    {
                      staticClass: "col-12 col-md-6",
                      attrs: { "data-v-7c3c8cd5": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "h3",
                        {
                          attrs: {
                            "data-v-7c3c8cd5": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [_vm._v(_vm._s(_vm.$t("details_2")))]
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "col-12 col-md-6",
                      attrs: { "data-v-7c3c8cd5": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "a",
                        {
                          staticClass: "card-header-link float-md-right",
                          attrs: {
                            "data-v-7c3c8cd5": "",
                            "data-v-15d61d2e": "",
                            href: "javascript:void(0)"
                          },
                          on: { click: _vm.showEditName }
                        },
                        [
                          _c(
                            "svg",
                            {
                              staticClass: "svg-inline--fa fa-pen fa-w-16",
                              attrs: {
                                "data-v-7c3c8cd5": "",
                                "data-v-15d61d2e": "",
                                "aria-hidden": "true",
                                focusable: "false",
                                "data-prefix": "fas",
                                "data-icon": "pen",
                                role: "img",
                                xmlns: "http://www.w3.org/2000/svg",
                                viewBox: "0 0 512 512"
                              }
                            },
                            [
                              _c("path", {
                                attrs: {
                                  "data-v-7c3c8cd5": "",
                                  "data-v-15d61d2e": "",
                                  fill: "currentColor",
                                  d:
                                    "M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"
                                }
                              })
                            ]
                          ),
                          _vm._v(" " + _vm._s(_vm.$t("details_3")) + "\n    ")
                        ]
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
          _vm.statusUser
            ? _c(
                "div",
                {
                  staticClass: "card-subtitle",
                  style: _vm.style,
                  attrs: { "data-v-15d61d2e": "" }
                },
                [
                  _c(
                    "div",
                    { attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" } },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "alert-message error",
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
                                _vm._v(_vm._s(_vm.status_msg))
                              ])
                            ])
                          ])
                        ]
                      )
                    ]
                  )
                ]
              )
            : _vm._e(),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "card-body", attrs: { "data-v-15d61d2e": "" } },
            [
              _c(
                "div",
                { attrs: { "data-v-7c3c8cd5": "", "data-v-15d61d2e": "" } },
                [
                  _c(
                    "div",
                    {
                      staticClass: "hide",
                      attrs: {
                        "data-v-7c3c8cd5": "",
                        "data-v-15d61d2e": "",
                        id: "loading-placeholder"
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          attrs: {
                            "data-v-7c3c8cd5": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "row",
                              attrs: {
                                "data-v-7c3c8cd5": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "col-12 col-sm-3 col-md-3 col-xl-2 label",
                                  attrs: {
                                    "data-v-7c3c8cd5": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [_vm._v(_vm._s(_vm.$t("details_4")))]
                              ),
                              _vm._v(" "),
                              _vm._m(1)
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "row mt-3 last",
                              attrs: {
                                "data-v-7c3c8cd5": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "col-12 col-sm-3 col-md-3 col-xl-2 label",
                                  attrs: {
                                    "data-v-7c3c8cd5": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [_vm._v(_vm._s(_vm.$t("details_5")))]
                              ),
                              _vm._v(" "),
                              _vm._m(2)
                            ]
                          )
                        ]
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _vm.user.lastName
                    ? _c(
                        "div",
                        {
                          directives: [
                            {
                              name: "show",
                              rawName: "v-show",
                              value: !_vm.editName,
                              expression: "!editName"
                            }
                          ],
                          attrs: {
                            "data-v-7c3c8cd5": "",
                            "data-v-15d61d2e": "",
                            "data-placeholder-id":
                              "placeholder-39866a80-66bb-11eb-9ba0-51d44b2103a2"
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              attrs: {
                                "data-v-7c3c8cd5": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass: "row",
                                  attrs: {
                                    "data-v-7c3c8cd5": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "col-12 col-sm-3 col-md-3 col-xl-2 label",
                                      attrs: {
                                        "data-v-7c3c8cd5": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [_vm._v(_vm._s(_vm.$t("details_4")))]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "col-12 col-sm-9 col-md-9 col-xl-10",
                                      attrs: {
                                        "data-v-7c3c8cd5": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [
                                      _vm.loading
                                        ? _c("span", {
                                            staticClass:
                                              "placeholder-l animated-background",
                                            attrs: {
                                              "data-v-7c3c8cd5": "",
                                              "data-v-15d61d2e": ""
                                            }
                                          })
                                        : _vm._e(),
                                      _vm._v(" "),
                                      !_vm.loading
                                        ? _c(
                                            "span",
                                            {
                                              staticClass: "mr-2",
                                              attrs: {
                                                "data-v-7c3c8cd5": "",
                                                "data-v-15d61d2e": ""
                                              },
                                              model: {
                                                value: _vm.user.lastName,
                                                callback: function($$v) {
                                                  _vm.$set(
                                                    _vm.user,
                                                    "lastName",
                                                    $$v
                                                  )
                                                },
                                                expression: "user.lastName"
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
                                                  "\n                                        "
                                              )
                                            ]
                                          )
                                        : _vm._e(),
                                      _vm._v(" "),
                                      !_vm.loading
                                        ? _c(
                                            "span",
                                            {
                                              staticClass: "mr-2",
                                              attrs: {
                                                "data-v-7c3c8cd5": "",
                                                "data-v-15d61d2e": ""
                                              },
                                              model: {
                                                value: _vm.user.firstName,
                                                callback: function($$v) {
                                                  _vm.$set(
                                                    _vm.user,
                                                    "firstName",
                                                    $$v
                                                  )
                                                },
                                                expression: "user.firstName"
                                              }
                                            },
                                            [
                                              _vm._v(
                                                "\n                                             " +
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
                                  staticClass: "row mt-3 last",
                                  attrs: {
                                    "data-v-7c3c8cd5": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "col-12 col-sm-3 col-md-3 col-xl-2 label",
                                      attrs: {
                                        "data-v-7c3c8cd5": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [_vm._v(_vm._s(_vm.$t("details_5")))]
                                  ),
                                  _vm._v(" "),
                                  _vm.loading
                                    ? _c(
                                        "div",
                                        {
                                          staticClass:
                                            "col-12 col-sm-9 col-md-9 col-xl-10",
                                          attrs: {
                                            "data-v-7c3c8cd5": "",
                                            "data-v-15d61d2e": ""
                                          }
                                        },
                                        [
                                          _c("span", {
                                            staticClass:
                                              "placeholder-l animated-background",
                                            attrs: {
                                              "data-v-7c3c8cd5": "",
                                              "data-v-15d61d2e": ""
                                            }
                                          })
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  !_vm.loading
                                    ? _c(
                                        "div",
                                        {
                                          staticClass:
                                            "col-12 col-sm-9 col-md-9 col-xl-10",
                                          attrs: {
                                            "data-v-7c3c8cd5": "",
                                            "data-v-15d61d2e": ""
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "\n                            " +
                                              _vm._s(_vm.user.countrys) +
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
                    : _vm._e(),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.editName,
                          expression: "editName"
                        }
                      ],
                      attrs: {
                        "data-v-7c3c8cd5": "",
                        "data-v-15d61d2e": "",
                        "data-placeholder-id":
                          "placeholder-3a411ec0-a2a2-11eb-adca-93c5791f3a14"
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "edit-info",
                          attrs: {
                            "data-v-7c3c8cd5": "",
                            "data-v-15d61d2e": "",
                            "data-vv-scope": "edit-personal-info"
                          }
                        },
                        [
                          _c(
                            "form",
                            {
                              attrs: {
                                "data-v-7c3c8cd5": "",
                                "data-v-15d61d2e": ""
                              },
                              on: {
                                submit: function($event) {
                                  $event.preventDefault()
                                  return _vm.sendUserData($event)
                                }
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass: "row",
                                  attrs: {
                                    "data-v-7c3c8cd5": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "col-12 col-md-3 col-xl-2 label",
                                      attrs: {
                                        "data-v-7c3c8cd5": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                            " +
                                          _vm._s(_vm.$t("details_4")) +
                                          "\n                        "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "col-12 col-xl-3 col-lg-4",
                                      attrs: {
                                        "data-v-7c3c8cd5": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.user.lastName,
                                            expression: "user.lastName"
                                          }
                                        ],
                                        staticClass: "input-block",
                                        attrs: {
                                          "data-v-7c3c8cd5": "",
                                          "data-v-15d61d2e": "",
                                          type: "text",
                                          id: "first-name",
                                          name: "first-name",
                                          placeholder: _vm.$t("details_4"),
                                          "data-vv-as": _vm.$t("details_4"),
                                          "aria-required": "true",
                                          "aria-invalid": "false"
                                        },
                                        domProps: { value: _vm.user.lastName },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.user,
                                              "lastName",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      }),
                                      _vm._v(" "),
                                      _c("span", {
                                        staticClass: "is-error",
                                        staticStyle: { display: "none" },
                                        attrs: {
                                          "data-v-7c3c8cd5": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "col-12 col-xl-3 col-lg-4 mt-3 mt-lg-0",
                                      attrs: {
                                        "data-v-7c3c8cd5": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.user.firstName,
                                            expression: "user.firstName"
                                          }
                                        ],
                                        staticClass: "input-block",
                                        attrs: {
                                          "data-v-7c3c8cd5": "",
                                          "data-v-15d61d2e": "",
                                          type: "text",
                                          placeholder: _vm.$t("details_6"),
                                          "data-vv-as": _vm.$t("details_6"),
                                          id: "last-name",
                                          name: "last-name",
                                          "aria-required": "true",
                                          "aria-invalid": "false"
                                        },
                                        domProps: { value: _vm.user.firstName },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.user,
                                              "firstName",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      }),
                                      _vm._v(" "),
                                      _c("span", {
                                        staticClass: "is-error",
                                        staticStyle: { display: "none" },
                                        attrs: {
                                          "data-v-7c3c8cd5": "",
                                          "data-v-15d61d2e": ""
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
                                  staticClass: "row mt-3",
                                  attrs: {
                                    "data-v-7c3c8cd5": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "col-12 col-md-3 col-xl-2 label",
                                      attrs: {
                                        "data-v-7c3c8cd5": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                    " +
                                          _vm._s(_vm.$t("details_5")) +
                                          "\n                        "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "col-12 col-xl-6 col-lg-8",
                                      attrs: {
                                        "data-v-7c3c8cd5": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [
                                      _c(
                                        "select",
                                        {
                                          directives: [
                                            {
                                              name: "model",
                                              rawName: "v-model",
                                              value: _vm.user.country,
                                              expression: "user.country"
                                            }
                                          ],
                                          staticClass: "grid-100 input-block",
                                          attrs: {
                                            "data-v-8dca2dd6": "",
                                            name: "country",
                                            "data-v-7c3c8cd5": "",
                                            id: "country",
                                            title: "",
                                            "data-v-15d61d2e": ""
                                          },
                                          on: {
                                            change: function($event) {
                                              var $$selectedVal = Array.prototype.filter
                                                .call(
                                                  $event.target.options,
                                                  function(o) {
                                                    return o.selected
                                                  }
                                                )
                                                .map(function(o) {
                                                  var val =
                                                    "_value" in o
                                                      ? o._value
                                                      : o.value
                                                  return val
                                                })
                                              _vm.$set(
                                                _vm.user,
                                                "country",
                                                $event.target.multiple
                                                  ? $$selectedVal
                                                  : $$selectedVal[0]
                                              )
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            { attrs: { value: "AUS" } },
                                            [_vm._v("Австралия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "AUT" } },
                                            [_vm._v("Австрия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "AZE" } },
                                            [_vm._v("Азербайджан")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ALA" } },
                                            [_vm._v("Аландские острова")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ALB" } },
                                            [_vm._v("Албания")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "DZA" } },
                                            [_vm._v("Алжир")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ASM" } },
                                            [_vm._v("Американское Самоа")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "AIA" } },
                                            [_vm._v("Ангилья")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "AGO" } },
                                            [_vm._v("Ангола")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "AND" } },
                                            [_vm._v("Андорра")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ATA" } },
                                            [_vm._v("Антарктика")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ATG" } },
                                            [_vm._v("Антигуа и Барбуда")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ARG" } },
                                            [_vm._v("Аргентина")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ARM" } },
                                            [_vm._v("Армения")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ABW" } },
                                            [_vm._v("Аруба")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "AFG" } },
                                            [_vm._v("Афганистан")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BHS" } },
                                            [_vm._v("Багамы")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BGD" } },
                                            [_vm._v("Бангладеш")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BRB" } },
                                            [_vm._v("Барбадос")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BHR" } },
                                            [_vm._v("Бахрейн")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BLZ" } },
                                            [_vm._v("Белиз")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BEL" } },
                                            [_vm._v("Бельгия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BEN" } },
                                            [_vm._v("Бенин")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BMU" } },
                                            [_vm._v("Бермудские о-ва")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BGR" } },
                                            [_vm._v("Болгария")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BOL" } },
                                            [_vm._v("Боливия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BIH" } },
                                            [_vm._v("Босния и Герцеговина")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BWA" } },
                                            [_vm._v("Ботсвана")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BRA" } },
                                            [_vm._v("Бразилия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "IOT" } },
                                            [
                                              _vm._v(
                                                "Британская территория в Индийском океане"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BRN" } },
                                            [_vm._v("Бруней Даруссалам")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BFA" } },
                                            [_vm._v("Буркина Фасо")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BDI" } },
                                            [_vm._v("Бурунди")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BTN" } },
                                            [_vm._v("Бутан")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MKD" } },
                                            [
                                              _vm._v(
                                                "Бывшая Югославская Республика Македония"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "VUT" } },
                                            [_vm._v("Вануату")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GBR" } },
                                            [_vm._v("Великобритания")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "HUN" } },
                                            [_vm._v("Венгрия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "VEN" } },
                                            [_vm._v("Венесуэла")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "VGB" } },
                                            [
                                              _vm._v(
                                                "Виргинские о-ва, Великобритания"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "VIR" } },
                                            [_vm._v("Виргинские о-ва, США")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "UMI" } },
                                            [
                                              _vm._v(
                                                "Внешние Малые острова США"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TLS" } },
                                            [_vm._v("Восточный Тимор")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "VNM" } },
                                            [_vm._v("Вьетнам")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GAB" } },
                                            [_vm._v("Габон")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "HTI" } },
                                            [_vm._v("Гаити")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GUY" } },
                                            [_vm._v("Гайана")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GMB" } },
                                            [_vm._v("Гамбия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GHA" } },
                                            [_vm._v("Гана")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GLP" } },
                                            [_vm._v("Гваделупа")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GTM" } },
                                            [_vm._v("Гватемала")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GIN" } },
                                            [_vm._v("Гвинея")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GNB" } },
                                            [_vm._v("Гвинея-Бисау")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "DEU" } },
                                            [_vm._v("Германия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GGY" } },
                                            [_vm._v("Гернси")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GIB" } },
                                            [_vm._v("Гибралтар")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "HND" } },
                                            [_vm._v("Гондурас")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "HKG" } },
                                            [_vm._v("Гонконг")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GRD" } },
                                            [_vm._v("Гренада")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GRL" } },
                                            [_vm._v("Гренландия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GRC" } },
                                            [_vm._v("Греция")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GEO" } },
                                            [_vm._v("Грузия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "DNK" } },
                                            [_vm._v("Дания")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "COD" } },
                                            [
                                              _vm._v(
                                                "Демократическая республика Конго"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "STP" } },
                                            [
                                              _vm._v(
                                                "Демократическая Республика Сан-Томе и Принсипи"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "JEY" } },
                                            [_vm._v("Джерси")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "DJI" } },
                                            [_vm._v("Джибути")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "DMA" } },
                                            [_vm._v("Доминика")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "DOM" } },
                                            [_vm._v("Доминиканская республика")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "EGY" } },
                                            [_vm._v("Египет")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ZMB" } },
                                            [_vm._v("Замбия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ESH" } },
                                            [_vm._v("Западная Сахара")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ZWE" } },
                                            [_vm._v("Зимбабве")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ISR" } },
                                            [_vm._v("Израиль")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "IND" } },
                                            [_vm._v("Индия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "IDN" } },
                                            [_vm._v("Индонезия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "JOR" } },
                                            [_vm._v("Иордан")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "IRQ" } },
                                            [_vm._v("Ирак")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "IRL" } },
                                            [_vm._v("Ирландия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "IRN" } },
                                            [
                                              _vm._v(
                                                "Исламская Республика Иран"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ISL" } },
                                            [_vm._v("Исландия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ESP" } },
                                            [_vm._v("Испания")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ITA" } },
                                            [_vm._v("Италия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "YEM" } },
                                            [_vm._v("Йемен")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CPV" } },
                                            [_vm._v("Кабо-Верде")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "KAZ" } },
                                            [_vm._v("Казахстан")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CYM" } },
                                            [_vm._v("Каймановы о-ва")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "KHM" } },
                                            [_vm._v("Камбоджа")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CMR" } },
                                            [_vm._v("Камерун")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CAN" } },
                                            [_vm._v("Канада")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "QAT" } },
                                            [_vm._v("Катар")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "KEN" } },
                                            [_vm._v("Кения")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CYP" } },
                                            [_vm._v("Кипр")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "KGZ" } },
                                            [_vm._v("Киргизстан")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "KIR" } },
                                            [_vm._v("Кирибати")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CHN" } },
                                            [_vm._v("Китай")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "COL" } },
                                            [_vm._v("Колумбия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "COM" } },
                                            [_vm._v("Коморские Острова")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "COG" } },
                                            [_vm._v("Конго")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CRI" } },
                                            [_vm._v("Коста-Рика")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CIV" } },
                                            [_vm._v("Кот-д'Ивуар")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CUB" } },
                                            [_vm._v("Куба")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "KWT" } },
                                            [_vm._v("Кувейт")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "LAO" } },
                                            [
                                              _vm._v(
                                                "Лаосская Народно-Демократическая Республика"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "LVA" } },
                                            [_vm._v("Латвия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "LSO" } },
                                            [_vm._v("Лесото")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "LBR" } },
                                            [_vm._v("Либерия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "LBN" } },
                                            [_vm._v("Ливан")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "LBY" } },
                                            [
                                              _vm._v(
                                                "Ливийская Арабская Джамахирия"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "LTU" } },
                                            [_vm._v("Литва")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "LIE" } },
                                            [_vm._v("Лихтенштейн")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "LUX" } },
                                            [_vm._v("Люксембург")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MUS" } },
                                            [_vm._v("Маврикий")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MRT" } },
                                            [_vm._v("Мавритания")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MDG" } },
                                            [_vm._v("Мадагаскар")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MAC" } },
                                            [_vm._v("Макао")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MWI" } },
                                            [_vm._v("Малави")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MYS" } },
                                            [_vm._v("Малайзия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MLI" } },
                                            [_vm._v("Мали")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MLT" } },
                                            [_vm._v("Мальта")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MAR" } },
                                            [_vm._v("Марокко")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MTQ" } },
                                            [_vm._v("Мартиника")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MHL" } },
                                            [_vm._v("Маршалловы о-ва")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MEX" } },
                                            [_vm._v("Мексика")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MOZ" } },
                                            [_vm._v("Мозамбик")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MCO" } },
                                            [_vm._v("Монако")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MNG" } },
                                            [_vm._v("Монголия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MSR" } },
                                            [_vm._v("Монтсеррат")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MMR" } },
                                            [_vm._v("Мьянма")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NAM" } },
                                            [_vm._v("Намибия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NRU" } },
                                            [_vm._v("Науру")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NPL" } },
                                            [_vm._v("Непал")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NER" } },
                                            [_vm._v("Нигер")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NGA" } },
                                            [_vm._v("Нигерия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ANT" } },
                                            [
                                              _vm._v(
                                                "Нидерландские Антильские О-ва"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NLD" } },
                                            [_vm._v("Нидерланды")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NIC" } },
                                            [_vm._v("Никарагуа")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NIU" } },
                                            [_vm._v("Ниуэ")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NZL" } },
                                            [_vm._v("Новая Зеландия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NCL" } },
                                            [_vm._v("Новая Каледония")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NOR" } },
                                            [_vm._v("Норвегия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TZA" } },
                                            [
                                              _vm._v(
                                                "Объединённая Республика Танзания"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ARE" } },
                                            [
                                              _vm._v(
                                                "Объединенные Арабские Эмираты"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "COK" } },
                                            [_vm._v("О-ва Кука")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TCA" } },
                                            [_vm._v("О-ва Теркс и Кайкос")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "FJI" } },
                                            [_vm._v("о-ва Фиджи")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BVT" } },
                                            [_vm._v("О-в Буве")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GUM" } },
                                            [_vm._v("О-в Гуам")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NFK" } },
                                            [_vm._v("О-в Норфолк")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "OMN" } },
                                            [_vm._v("Оман")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SJM" } },
                                            [
                                              _vm._v(
                                                "Острова Свальбард и Ян-Майен"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "WLF" } },
                                            [_vm._v("Острова Уоллис и Футуна")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CCK" } },
                                            [_vm._v("Остров Кокос")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MYT" } },
                                            [_vm._v("Остров Майотта")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "IMN" } },
                                            [_vm._v("Остров Мэн")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CXR" } },
                                            [_vm._v("Остров Рождества")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BLM" } },
                                            [_vm._v("Остров Св. Варфоломея")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SHN" } },
                                            [_vm._v("Остров Св. Елены")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MAF" } },
                                            [_vm._v("Остров Св. Мартина (Фр.)")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "HMD" } },
                                            [
                                              _vm._v(
                                                "Остров Херд и острова МакДональд"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PAK" } },
                                            [_vm._v("Пакистан")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PLW" } },
                                            [_vm._v("Палау")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PSE" } },
                                            [_vm._v("Палестина")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PAN" } },
                                            [_vm._v("Панама")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PNG" } },
                                            [_vm._v("Папуа Новая Гвинея")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PRY" } },
                                            [_vm._v("Парагвай")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PER" } },
                                            [_vm._v("Перу")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PCN" } },
                                            [_vm._v("Питкэрн")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "POL" } },
                                            [_vm._v("Польша")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PRT" } },
                                            [_vm._v("Португалия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PRI" } },
                                            [_vm._v("Пуэрто-Рико")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BLR" } },
                                            [_vm._v("Республика Беларусь")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "KOR" } },
                                            [_vm._v("Республика Корея")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MDV" } },
                                            [_vm._v("Республика Мальдивы")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MDA" } },
                                            [_vm._v("Республика Молдова")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "REU" } },
                                            [_vm._v("Реюньон")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                selected: "",
                                                value: "RUS"
                                              }
                                            },
                                            [_vm._v("Российская Федерация")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "RWA" } },
                                            [_vm._v("Руанда")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ROU" } },
                                            [_vm._v("Румыния")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SLV" } },
                                            [_vm._v("Сальвадор")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "WSM" } },
                                            [_vm._v("Самоа")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SMR" } },
                                            [_vm._v("Сан-Марино")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SAU" } },
                                            [_vm._v("Саудовская Аравия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SWZ" } },
                                            [_vm._v("Свазиленд")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "VAT" } },
                                            [_vm._v("Святой Престол (Ватикан)")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MNP" } },
                                            [_vm._v("Северные Марианские о-ва")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SYC" } },
                                            [_vm._v("Сейшельские о-ва")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SEN" } },
                                            [_vm._v("Сенегал")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SPM" } },
                                            [_vm._v("Сен-Пьер и Микелон")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "VCT" } },
                                            [_vm._v("Сент-Винсент и Гренадины")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "KNA" } },
                                            [_vm._v("Сент-Китс и Невис")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "LCA" } },
                                            [_vm._v("Сент-Люсия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SRB" } },
                                            [_vm._v("Сербия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SGP" } },
                                            [_vm._v("Сингапур")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SVK" } },
                                            [_vm._v("Словакия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SVN" } },
                                            [_vm._v("Словения")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SLB" } },
                                            [_vm._v("Соломоновы о-ва")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SOM" } },
                                            [_vm._v("Сомали")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SDN" } },
                                            [_vm._v("Судан")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SUR" } },
                                            [_vm._v("Суринам")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "USA" } },
                                            [_vm._v("США")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SLE" } },
                                            [_vm._v("Сьерра-Леоне")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TJK" } },
                                            [_vm._v("Таджикистан")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "THA" } },
                                            [_vm._v("Таиланд")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TWN" } },
                                            [_vm._v("Тайвань")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TGO" } },
                                            [_vm._v("Того")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TKL" } },
                                            [_vm._v("Токелау")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TON" } },
                                            [_vm._v("Тонга")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TTO" } },
                                            [_vm._v("Тринидад и Тобаго")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TUV" } },
                                            [_vm._v("Тувалу")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TUN" } },
                                            [_vm._v("Тунис")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TKM" } },
                                            [_vm._v("Туркменистан")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TUR" } },
                                            [_vm._v("Турция")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "UGA" } },
                                            [_vm._v("Уганда")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "UZB" } },
                                            [_vm._v("Узбекистан")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "UKR" } },
                                            [_vm._v("Украина")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "URY" } },
                                            [_vm._v("Уругвай")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "FRO" } },
                                            [_vm._v("Фарерские о-ва")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "FSM" } },
                                            [
                                              _vm._v(
                                                "Федеративные Штаты Микронезии"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PHL" } },
                                            [_vm._v("Филиппины")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "FIN" } },
                                            [_vm._v("Финляндия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "FLK" } },
                                            [
                                              _vm._v(
                                                "Фолклендские о-ва (Мальвинские острова)"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "FRA" } },
                                            [_vm._v("Франция")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GUF" } },
                                            [_vm._v("Французская Гвиана")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PYF" } },
                                            [_vm._v("Французская Полинезия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ATF" } },
                                            [
                                              _vm._v(
                                                "Французские Южные территории"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "HRV" } },
                                            [_vm._v("Хорватия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CAF" } },
                                            [
                                              _vm._v(
                                                "Центральноафриканская республика"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TCD" } },
                                            [_vm._v("Чад")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MNE" } },
                                            [_vm._v("Черногория")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CZE" } },
                                            [_vm._v("Чешская республика")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CHL" } },
                                            [_vm._v("Чили")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CHE" } },
                                            [_vm._v("Швейцария")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SWE" } },
                                            [_vm._v("Швеция")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "LKA" } },
                                            [_vm._v("Шри-Ланка")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ECU" } },
                                            [_vm._v("Эквадор")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "GNQ" } },
                                            [_vm._v("Экваториальная Гвинея")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ERI" } },
                                            [_vm._v("Эритрея")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "EST" } },
                                            [_vm._v("Эстония")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ETH" } },
                                            [_vm._v("Эфиопия")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SGS" } },
                                            [
                                              _vm._v(
                                                "Южная Георгия и Южные Сандвичевы острова"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ZAF" } },
                                            [
                                              _vm._v(
                                                "Южно-Африканская Республика"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "JAM" } },
                                            [_vm._v("Ямайка")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "JPN" } },
                                            [_vm._v("Япония")]
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("span", {
                                        staticClass: "help-block",
                                        attrs: {
                                          "data-v-7c3c8cd5": "",
                                          "data-v-15d61d2e": ""
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
                                  staticClass: "row mt-3",
                                  attrs: {
                                    "data-v-7c3c8cd5": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "col offset-lg-3 offset-xl-2",
                                      attrs: {
                                        "data-v-7c3c8cd5": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [
                                      _c(
                                        "button",
                                        {
                                          staticClass: "btn-primary btn",
                                          attrs: {
                                            "data-v-312dd04b": "",
                                            "data-v-7c3c8cd5": "",
                                            id: "554362333",
                                            "data-v-15d61d2e": ""
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "\n                                        " +
                                              _vm._s(
                                                _vm.isSendUserData
                                                  ? _vm.$t("details_8")
                                                  : _vm.$t("details_7")
                                              ) +
                                              "\n                        "
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "button",
                                        {
                                          staticClass:
                                            "ml-md-3 mt-3 mt-md-0 btn-secondary btn",
                                          attrs: {
                                            "data-v-312dd04b": "",
                                            "data-v-7c3c8cd5": "",
                                            "data-v-15d61d2e": ""
                                          },
                                          on: { click: _vm.cancel }
                                        },
                                        [
                                          _vm._v(
                                            "\n                            " +
                                              _vm._s(_vm.$t("details_10")) +
                                              "\n                        "
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
                  !_vm.user.lastName && !_vm.loading
                    ? _c(
                        "div",
                        {
                          directives: [
                            {
                              name: "show",
                              rawName: "v-show",
                              value: !_vm.editName,
                              expression: "!editName"
                            }
                          ],
                          attrs: {
                            "data-v-7c3c8cd5": "",
                            "data-v-15d61d2e": "",
                            "data-placeholder-id":
                              "placeholder-1fb42fd0-a283-11eb-b1fb-d11e0a8fef5c"
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              attrs: {
                                "data-v-7c3c8cd5": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass: "row",
                                  attrs: {
                                    "data-v-7c3c8cd5": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "col-12 col-sm-3 col-md-3 col-xl-2 label",
                                      attrs: {
                                        "data-v-7c3c8cd5": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [_vm._v(_vm._s(_vm.$t("details_4")))]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "col-12 col-sm-9 col-md-9 col-xl-10",
                                      attrs: {
                                        "data-v-7c3c8cd5": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [
                                      _c(
                                        "a",
                                        {
                                          attrs: {
                                            "data-v-7c3c8cd5": "",
                                            "data-v-15d61d2e": "",
                                            href: "javascript:void(0)"
                                          },
                                          on: { click: _vm.showEditName }
                                        },
                                        [
                                          _vm._v(
                                            "\n                                            " +
                                              _vm._s(_vm.$t("details_9")) +
                                              "\n                                        "
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
                                  staticClass: "row mt-3 last",
                                  attrs: {
                                    "data-v-7c3c8cd5": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "col-12 col-sm-3 col-md-3 col-xl-2 label",
                                      attrs: {
                                        "data-v-7c3c8cd5": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [_vm._v(_vm._s(_vm.$t("details_5")))]
                                  ),
                                  _vm._v(" "),
                                  _c("div", {
                                    staticClass:
                                      "col-12 col-sm-9 col-md-9 col-xl-10",
                                    attrs: {
                                      "data-v-7c3c8cd5": "",
                                      "data-v-15d61d2e": ""
                                    }
                                  })
                                ]
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
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "card mt-card-top email",
          attrs: {
            "data-v-15d61d2e": "",
            "data-v-112a4620": "",
            "data-v-34b77a92": "",
            id: "email-card",
            "data-blz-addressable-by": "email"
          }
        },
        [
          _c(
            "div",
            { staticClass: "card-title", attrs: { "data-v-15d61d2e": "" } },
            [
              _c(
                "div",
                {
                  staticClass: "row",
                  attrs: { "data-v-112a4620": "", "data-v-15d61d2e": "" }
                },
                [
                  _c(
                    "div",
                    {
                      staticClass: "col-12 col-md-6",
                      attrs: { "data-v-112a4620": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "h3",
                        {
                          attrs: {
                            "data-v-112a4620": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [_vm._v(_vm._s(_vm.$t("details_11")))]
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "col-12 col-md-6",
                      attrs: { "data-v-112a4620": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "a",
                        {
                          staticClass: "card-header-link float-md-right",
                          attrs: {
                            "data-v-112a4620": "",
                            "data-v-15d61d2e": "",
                            href: "javascript:void(0)"
                          },
                          on: { click: _vm.showMore }
                        },
                        [
                          _c(
                            "svg",
                            {
                              staticClass: "svg-inline--fa fa-pen fa-w-16",
                              attrs: {
                                "data-v-112a4620": "",
                                "data-v-15d61d2e": "",
                                "aria-hidden": "true",
                                focusable: "false",
                                "data-prefix": "fas",
                                "data-icon": "pen",
                                role: "img",
                                xmlns: "http://www.w3.org/2000/svg",
                                viewBox: "0 0 512 512"
                              }
                            },
                            [
                              _c("path", {
                                attrs: {
                                  "data-v-112a4620": "",
                                  "data-v-15d61d2e": "",
                                  fill: "currentColor",
                                  d:
                                    "M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"
                                }
                              })
                            ]
                          ),
                          _vm._v(" " + _vm._s(_vm.$t("details_3")) + "\n    ")
                        ]
                      )
                    ]
                  )
                ]
              )
            ]
          ),
          _vm._v(" "),
          !_vm.loading && !_vm.user.email_verified_at
            ? _c(
                "div",
                {
                  staticClass: "card-subtitle",
                  attrs: { "data-v-15d61d2e": "" }
                },
                [
                  _c(
                    "div",
                    { attrs: { "data-v-112a4620": "", "data-v-15d61d2e": "" } },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "alert-message info",
                          attrs: {
                            "data-v-4918d6bc": "",
                            "data-v-112a4620": "",
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
                            _c("span", { attrs: { "data-v-112a4620": "" } }, [
                              _c("span", { attrs: { "data-v-112a4620": "" } }, [
                                _vm._v(
                                  "\n\t\t\t\t\t" +
                                    _vm._s(_vm.$t("details_13")) +
                                    " " +
                                    _vm._s(
                                      _vm._f("capitalize")(_vm.user.email)
                                    ) +
                                    ". "
                                ),
                                _c(
                                  "span",
                                  {
                                    directives: [
                                      {
                                        name: "show",
                                        rawName: "v-show",
                                        value: _vm.email_send,
                                        expression: "email_send"
                                      }
                                    ],
                                    attrs: { "data-v-112a4620": "" }
                                  },
                                  [
                                    _vm._v(
                                      "\n\t\t\t\t\t\t" +
                                        _vm._s(_vm.$t("details_12")) +
                                        "\n\t\t\t\t\t"
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "span",
                                  { attrs: { "data-v-112a4620": "" } },
                                  [
                                    _c(
                                      "a",
                                      {
                                        staticClass: "link",
                                        attrs: {
                                          "data-v-112a4620": "",
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
                                          "\n\t\t\t\t\t\t\t" +
                                            _vm._s(_vm.$t("index_7")) +
                                            "\n\t\t\t\t\t\t"
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ])
                            ])
                          ])
                        ]
                      )
                    ]
                  )
                ]
              )
            : _vm._e(),
          _vm._v(" "),
          _vm.status
            ? _c(
                "div",
                {
                  staticClass: "card-subtitle",
                  style: _vm.style,
                  attrs: { "data-v-15d61d2e": "" }
                },
                [
                  _c(
                    "div",
                    { attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" } },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "alert-message error",
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
                                _vm._v(_vm._s(_vm.status_msg))
                              ])
                            ])
                          ])
                        ]
                      )
                    ]
                  )
                ]
              )
            : _vm._e(),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "card-body", attrs: { "data-v-15d61d2e": "" } },
            [
              _c(
                "div",
                { attrs: { "data-v-112a4620": "", "data-v-15d61d2e": "" } },
                [
                  _c(
                    "div",
                    {
                      staticClass: "hide",
                      attrs: {
                        "data-v-112a4620": "",
                        "data-v-15d61d2e": "",
                        id: "placeholder-15"
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          attrs: {
                            "data-v-112a4620": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "row mt-3 mt-sm-0",
                              attrs: {
                                "data-v-112a4620": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "col-4 col-sm-3 col-md-3 col-xl-2 label",
                                  attrs: {
                                    "data-v-112a4620": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                        " +
                                      _vm._s(_vm.$t("details_11")) +
                                      "\n    "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _vm._m(3)
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
                      attrs: {
                        "data-v-112a4620": "",
                        "data-v-15d61d2e": "",
                        "data-placeholder-id":
                          "placeholder-39869190-66bb-11eb-9ba0-51d44b2103a2"
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          attrs: {
                            "data-v-112a4620": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          !_vm.edits
                            ? _c(
                                "div",
                                {
                                  staticClass: "row mt-3 mt-sm-0",
                                  attrs: {
                                    "data-v-112a4620": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "col-sm-12 col-sm-3 col-md-3 col-xl-2 label",
                                      attrs: {
                                        "data-v-112a4620": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                    " +
                                          _vm._s(_vm.$t("details_11")) +
                                          "\n                                "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _vm.loading
                                    ? _c(
                                        "div",
                                        {
                                          staticClass:
                                            "col-sm-12 col-sm-9 col-md-9 col-xl-10",
                                          attrs: {
                                            "data-v-112a4620": "",
                                            "data-v-15d61d2e": ""
                                          }
                                        },
                                        [
                                          _c("span", {
                                            staticClass:
                                              "placeholder-l animated-background",
                                            attrs: {
                                              "data-v-112a4620": "",
                                              "data-v-15d61d2e": ""
                                            }
                                          })
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  !_vm.loading
                                    ? _c(
                                        "div",
                                        {
                                          staticClass:
                                            "col-sm-12 col-sm-9 col-md-9 col-xl-10",
                                          attrs: {
                                            "data-v-112a4620": "",
                                            "data-v-15d61d2e": ""
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "\n                                    " +
                                              _vm._s(_vm.user.email) +
                                              "\n                                "
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ]
                              )
                            : _vm._e(),
                          _vm._v(" "),
                          _vm.edits
                            ? _c(
                                "div",
                                {
                                  attrs: {
                                    "data-v-112a4620": "",
                                    "data-v-15d61d2e": "",
                                    "data-placeholder-id":
                                      "placeholder-68d950a0-a283-11eb-8470-b1c43ac804fd"
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass: "edit-info",
                                      attrs: {
                                        "data-v-112a4620": "",
                                        "data-v-15d61d2e": "",
                                        "data-vv-scope": "edit-email"
                                      }
                                    },
                                    [
                                      _c(
                                        "form",
                                        {
                                          attrs: {
                                            "data-v-112a4620": "",
                                            "data-v-15d61d2e": ""
                                          },
                                          on: {
                                            submit: function($event) {
                                              $event.preventDefault()
                                              return _vm.sendEmail($event)
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "div",
                                            {
                                              staticClass: "row",
                                              attrs: {
                                                "data-v-112a4620": "",
                                                "data-v-15d61d2e": ""
                                              }
                                            },
                                            [
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "col-sm-12 col-md-3 col-xl-2 label email-label",
                                                  attrs: {
                                                    "data-v-112a4620": "",
                                                    "data-v-15d61d2e": ""
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    "\n                                                " +
                                                      _vm._s(
                                                        _vm.$t("details_11")
                                                      ) +
                                                      "\n                                            "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "col-sm-12 col-md-6 col-xl-5 col-lg-7",
                                                  attrs: {
                                                    "data-v-112a4620": "",
                                                    "data-v-15d61d2e": ""
                                                  }
                                                },
                                                [
                                                  _c("input", {
                                                    directives: [
                                                      {
                                                        name: "model",
                                                        rawName: "v-model",
                                                        value: _vm.user.email,
                                                        expression: "user.email"
                                                      }
                                                    ],
                                                    staticClass: "input-block",
                                                    attrs: {
                                                      "data-v-112a4620": "",
                                                      "data-v-15d61d2e": "",
                                                      type: "text",
                                                      id: "email",
                                                      name: "email",
                                                      placeholder: _vm.$t(
                                                        "details_11"
                                                      ),
                                                      "data-vv-validate-on":
                                                        "blur",
                                                      "data-vv-as": _vm.$t(
                                                        "details_11"
                                                      ),
                                                      "aria-required": "true",
                                                      "aria-invalid": "false"
                                                    },
                                                    domProps: {
                                                      value: _vm.user.email
                                                    },
                                                    on: {
                                                      input: function($event) {
                                                        if (
                                                          $event.target
                                                            .composing
                                                        ) {
                                                          return
                                                        }
                                                        _vm.$set(
                                                          _vm.user,
                                                          "email",
                                                          $event.target.value
                                                        )
                                                      }
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  _c("span", {
                                                    staticClass: "is-error",
                                                    staticStyle: {
                                                      display: "none"
                                                    },
                                                    attrs: {
                                                      "data-v-112a4620": "",
                                                      "data-v-15d61d2e": ""
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
                                              staticClass: "row mt-3",
                                              attrs: { "data-v-20eb8c7e": "" }
                                            },
                                            [
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "col-sm-12 col-md-3 col-xl-2 label email-label",
                                                  attrs: {
                                                    "data-v-112a4620": "",
                                                    "data-v-15d61d2e": ""
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    "\n                                                " +
                                                      _vm._s(
                                                        _vm.$t(
                                                          "password_register"
                                                        )
                                                      ) +
                                                      "\n                                            "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "col-sm-12 col-md-6 col-xl-5 col-lg-7",
                                                  attrs: {
                                                    "data-v-112a4620": "",
                                                    "data-v-15d61d2e": ""
                                                  }
                                                },
                                                [
                                                  _c("input", {
                                                    directives: [
                                                      {
                                                        name: "model",
                                                        rawName: "v-model",
                                                        value:
                                                          _vm.user.password,
                                                        expression:
                                                          "user.password"
                                                      }
                                                    ],
                                                    staticClass: "input-block",
                                                    attrs: {
                                                      "data-v-112a4620": "",
                                                      "data-v-15d61d2e": "",
                                                      type: "password",
                                                      id: "password",
                                                      name: "password",
                                                      placeholder: _vm.$t(
                                                        "password_register"
                                                      ),
                                                      "data-vv-validate-on":
                                                        "blur",
                                                      "data-vv-as": _vm.$t(
                                                        "password_register"
                                                      ),
                                                      "aria-required": "true",
                                                      "aria-invalid": "false"
                                                    },
                                                    domProps: {
                                                      value: _vm.user.password
                                                    },
                                                    on: {
                                                      input: function($event) {
                                                        if (
                                                          $event.target
                                                            .composing
                                                        ) {
                                                          return
                                                        }
                                                        _vm.$set(
                                                          _vm.user,
                                                          "password",
                                                          $event.target.value
                                                        )
                                                      }
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  _c("span", {
                                                    staticClass: "is-error",
                                                    staticStyle: {
                                                      display: "none"
                                                    },
                                                    attrs: {
                                                      "data-v-112a4620": "",
                                                      "data-v-15d61d2e": ""
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
                                              staticClass: "row mt-3",
                                              attrs: {
                                                "data-v-112a4620": "",
                                                "data-v-15d61d2e": ""
                                              }
                                            },
                                            [
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "col offset-md-3 offset-lg-3 offset-xl-2",
                                                  attrs: {
                                                    "data-v-112a4620": "",
                                                    "data-v-15d61d2e": ""
                                                  }
                                                },
                                                [
                                                  _c(
                                                    "button",
                                                    {
                                                      staticClass:
                                                        "btn-primary btn",
                                                      attrs: {
                                                        "data-v-312dd04b": "",
                                                        "data-v-112a4620": "",
                                                        "data-v-15d61d2e": ""
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                " +
                                                          _vm._s(
                                                            _vm.isSendEmail
                                                              ? _vm.$t(
                                                                  "details_8"
                                                                )
                                                              : _vm.$t(
                                                                  "details_7"
                                                                )
                                                          ) +
                                                          "\n                            "
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "button",
                                                    {
                                                      staticClass:
                                                        "ml-md-3 mt-3 mt-md-0 btn-secondary btn",
                                                      attrs: {
                                                        "data-v-312dd04b": "",
                                                        "data-v-112a4620": "",
                                                        id: "404532095",
                                                        "data-v-15d61d2e": ""
                                                      },
                                                      on: { click: _vm.cancel }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                                    " +
                                                          _vm._s(
                                                            _vm.$t("details_10")
                                                          ) +
                                                          "\n                            "
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
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "card mt-card-top",
          attrs: {
            "data-v-15d61d2e": "",
            "data-v-9b2a6982": "",
            "data-v-34b77a92": "",
            id: "phone-number-card",
            "data-blz-addressable-by": "phone-number"
          }
        },
        [
          _c(
            "div",
            { staticClass: "card-title", attrs: { "data-v-15d61d2e": "" } },
            [
              _c(
                "div",
                {
                  staticClass: "row",
                  attrs: { "data-v-9b2a6982": "", "data-v-15d61d2e": "" }
                },
                [
                  _c(
                    "div",
                    {
                      staticClass: "col-12 col-md-6",
                      attrs: { "data-v-9b2a6982": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "h3",
                        {
                          attrs: {
                            "data-v-9b2a6982": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [_vm._v(_vm._s(_vm.$t("details_14")))]
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "col-12 col-md-6",
                      attrs: { "data-v-9b2a6982": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "card-header-link float-md-right",
                          attrs: {
                            "data-v-9b2a6982": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "router-link",
                            {
                              staticClass: "link",
                              attrs: {
                                "data-v-9b2a6982": "",
                                to: { name: "sms.update" },
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "svg",
                                {
                                  staticClass: "svg-inline--fa fa-pen fa-w-16",
                                  attrs: {
                                    "data-v-9b2a6982": "",
                                    "aria-hidden": "true",
                                    focusable: "false",
                                    "data-prefix": "fas",
                                    "data-icon": "pen",
                                    role: "img",
                                    xmlns: "http://www.w3.org/2000/svg",
                                    viewBox: "0 0 512 512"
                                  }
                                },
                                [
                                  _c("path", {
                                    attrs: {
                                      "data-v-9b2a6982": "",
                                      fill: "currentColor",
                                      d:
                                        "M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"
                                    }
                                  })
                                ]
                              ),
                              _vm._v(
                                " " + _vm._s(_vm.$t("details_3")) + "\n    "
                              )
                            ]
                          )
                        ],
                        1
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "col-sm-12 col-md-10 label description",
                      attrs: { "data-v-9b2a6982": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "span",
                        {
                          attrs: {
                            "data-v-9b2a6982": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [_vm._v(_vm._s(_vm.$t("details_15")))]
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
                { attrs: { "data-v-9b2a6982": "", "data-v-15d61d2e": "" } },
                [
                  _c(
                    "div",
                    {
                      staticClass: "hide",
                      attrs: {
                        "data-v-9b2a6982": "",
                        "data-v-15d61d2e": "",
                        id: "placeholder-17"
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          attrs: {
                            "data-v-9b2a6982": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "row mt-3 mt-sm-0",
                              attrs: {
                                "data-v-9b2a6982": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "col-4 col-sm-3 col-md-3 col-xl-2 label",
                                  attrs: {
                                    "data-v-9b2a6982": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                        " +
                                      _vm._s(_vm.$t("details_14")) +
                                      "\n    "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _vm._m(4)
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
                      attrs: {
                        "data-v-9b2a6982": "",
                        "data-v-15d61d2e": "",
                        "data-placeholder-id":
                          "placeholder-3986dfb0-66bb-11eb-9ba0-51d44b2103a2"
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          attrs: {
                            "data-v-9b2a6982": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "row mt-3 mt-sm-0",
                              attrs: {
                                "data-v-9b2a6982": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "col-sm-12 col-sm-3 col-md-3 col-xl-2 label",
                                  attrs: {
                                    "data-v-9b2a6982": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [_vm._v(_vm._s(_vm.$t("details_14")))]
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "col-sm-12 col-sm-4 col-md-4 col-xl-2",
                                  attrs: {
                                    "data-v-9b2a6982": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm.loading
                                    ? _c("span", {
                                        staticClass:
                                          "placeholder-l animated-background",
                                        attrs: {
                                          "data-v-9b2a6982": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      })
                                    : _vm._e(),
                                  _vm._v(" "),
                                  !_vm.loading
                                    ? _c(
                                        "div",
                                        {
                                          attrs: {
                                            "data-v-9b2a6982": "",
                                            "data-v-15d61d2e": ""
                                          }
                                        },
                                        [_vm._v(_vm._s(_vm.user.phoneNumber))]
                                      )
                                    : _vm._e()
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "col-sm-12 col-sm-5 col-md-5 col-xl-8",
                                  attrs: {
                                    "data-v-9b2a6982": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _c(
                                    "router-link",
                                    {
                                      staticClass: "link float-md-right",
                                      attrs: {
                                        "data-v-9b2a6982": "",
                                        to: { name: "sms.remove" },
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [
                                      _c(
                                        "svg",
                                        {
                                          staticClass:
                                            "svg-inline--fa fa-times fa-w-10",
                                          attrs: {
                                            "data-v-9b2a6982": "",
                                            "aria-hidden": "true",
                                            focusable: "false",
                                            "data-prefix": "far",
                                            "data-icon": "times",
                                            role: "img",
                                            xmlns: "http://www.w3.org/2000/svg",
                                            viewBox: "0 0 320 512"
                                          }
                                        },
                                        [
                                          _c("path", {
                                            attrs: {
                                              "data-v-9b2a6982": "",
                                              fill: "currentColor",
                                              d:
                                                "M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z"
                                            }
                                          })
                                        ]
                                      ),
                                      _vm._v(
                                        " " +
                                          _vm._s(_vm.$t("details_16")) +
                                          "\n    "
                                      )
                                    ]
                                  )
                                ],
                                1
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
          staticClass: "card mt-card-top battle-tag",
          attrs: {
            "data-v-15d61d2e": "",
            "data-v-05ef4306": "",
            "data-v-34b77a92": "",
            id: "battle-tag-card",
            "data-blz-addressable-by": "battle-tag"
          }
        },
        [
          _c(
            "div",
            { staticClass: "card-title", attrs: { "data-v-15d61d2e": "" } },
            [
              _c(
                "div",
                {
                  staticClass: "row",
                  attrs: { "data-v-05ef4306": "", "data-v-15d61d2e": "" }
                },
                [
                  _c(
                    "div",
                    {
                      staticClass: "col-12 col-md-6",
                      attrs: { "data-v-05ef4306": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "h3",
                        {
                          attrs: {
                            "data-v-05ef4306": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [_vm._v(_vm._s(_vm.title) + "Tag")]
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "col-12 col-md-6",
                      attrs: { "data-v-05ef4306": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "a",
                        {
                          staticClass: "card-header-link float-md-right",
                          attrs: {
                            "data-v-05ef4306": "",
                            "data-v-15d61d2e": "",
                            href: "javascript:void(0)"
                          }
                        },
                        [
                          _vm._v(
                            "\n        " + _vm._s(_vm.$t("details_17")) + " "
                          ),
                          _c(
                            "svg",
                            {
                              staticClass:
                                "svg-inline--fa fa-external-link-alt fa-w-16",
                              attrs: {
                                "data-v-05ef4306": "",
                                "data-v-15d61d2e": "",
                                "aria-hidden": "true",
                                focusable: "false",
                                "data-prefix": "far",
                                "data-icon": "external-link-alt",
                                role: "img",
                                xmlns: "http://www.w3.org/2000/svg",
                                viewBox: "0 0 512 512"
                              }
                            },
                            [
                              _c("path", {
                                attrs: {
                                  "data-v-05ef4306": "",
                                  "data-v-15d61d2e": "",
                                  fill: "currentColor",
                                  d:
                                    "M432,288H416a16,16,0,0,0-16,16V458a6,6,0,0,1-6,6H54a6,6,0,0,1-6-6V118a6,6,0,0,1,6-6H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V304A16,16,0,0,0,432,288ZM500,0H364a12,12,0,0,0-8.48,20.48l48.19,48.21L131.51,340.89a12,12,0,0,0,0,17l22.63,22.63a12,12,0,0,0,17,0l272.2-272.21,48.21,48.2A12,12,0,0,0,512,148V12A12,12,0,0,0,500,0Z"
                                }
                              })
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
                      staticClass: "col-sm-12 col-md-10 label description",
                      attrs: { "data-v-05ef4306": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "span",
                        {
                          attrs: {
                            "data-v-05ef4306": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [_vm._v(_vm._s(_vm.$t("details_18")))]
                      )
                    ]
                  )
                ]
              )
            ]
          ),
          _vm._v(" "),
          _vm._m(5),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "card-body", attrs: { "data-v-15d61d2e": "" } },
            [
              _c(
                "div",
                { attrs: { "data-v-05ef4306": "", "data-v-15d61d2e": "" } },
                [
                  _c(
                    "div",
                    {
                      staticClass: "hide",
                      attrs: {
                        "data-v-05ef4306": "",
                        "data-v-15d61d2e": "",
                        id: "battletag-placeholder"
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "row",
                          attrs: {
                            "data-v-05ef4306": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "col-12 col-md-3 col-xl-2",
                              attrs: {
                                "data-v-05ef4306": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "span",
                                {
                                  staticClass: "label",
                                  attrs: {
                                    "data-v-05ef4306": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [_vm._v(_vm._s(_vm.title) + "Tag")]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _vm._m(6)
                        ]
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      attrs: {
                        "data-v-05ef4306": "",
                        "data-v-15d61d2e": "",
                        "data-placeholder-id":
                          "placeholder-3986dfb1-66bb-11eb-9ba0-51d44b2103a2"
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "row",
                          attrs: {
                            "data-v-05ef4306": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "col-12 col-md-3 col-xl-2",
                              attrs: {
                                "data-v-05ef4306": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "span",
                                {
                                  staticClass: "label",
                                  attrs: {
                                    "data-v-05ef4306": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [_vm._v(_vm._s(_vm.title) + "Tag")]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "col-12 col-md-9 col-xl-10",
                              attrs: {
                                "data-v-05ef4306": "",
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
                                        "data-v-05ef4306": "",
                                        "data-v-15d61d2e": ""
                                      }
                                    },
                                    [
                                      _vm._v(
                                        _vm._s(
                                          _vm._f("capitalize")(_vm.user.name)
                                        )
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
      { staticClass: "card-subtitle", attrs: { "data-v-15d61d2e": "" } },
      [_c("div", { attrs: { "data-v-7c3c8cd5": "", "data-v-15d61d2e": "" } })]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "col-12 col-sm-9 col-md-9 col-xl-10",
        attrs: { "data-v-7c3c8cd5": "", "data-v-15d61d2e": "" }
      },
      [
        _c("span", {
          staticClass: "placeholder-l animated-background",
          attrs: { "data-v-7c3c8cd5": "", "data-v-15d61d2e": "" }
        })
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
        staticClass: "col-12 col-sm-9 col-md-9 col-xl-10",
        attrs: { "data-v-7c3c8cd5": "", "data-v-15d61d2e": "" }
      },
      [
        _c("span", {
          staticClass: "placeholder-l animated-background",
          attrs: { "data-v-7c3c8cd5": "", "data-v-15d61d2e": "" }
        })
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
        staticClass: "col-8 col-sm-9 col-md-9 col-xl-10",
        attrs: { "data-v-112a4620": "", "data-v-15d61d2e": "" }
      },
      [
        _c("span", {
          staticClass: "placeholder-l animated-background",
          attrs: { "data-v-112a4620": "", "data-v-15d61d2e": "" }
        })
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
        staticClass: "col-8 col-sm-9 col-md-9 col-xl-10",
        attrs: { "data-v-9b2a6982": "", "data-v-15d61d2e": "" }
      },
      [
        _c("span", {
          staticClass: "placeholder-l animated-background",
          attrs: { "data-v-9b2a6982": "", "data-v-15d61d2e": "" }
        })
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "card-subtitle", attrs: { "data-v-15d61d2e": "" } },
      [_c("div", { attrs: { "data-v-05ef4306": "", "data-v-15d61d2e": "" } })]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "col-12 col-md-9 col-xl-10",
        attrs: { "data-v-05ef4306": "", "data-v-15d61d2e": "" }
      },
      [
        _c("span", {
          staticClass: "placeholder-l animated-background",
          attrs: { "data-v-05ef4306": "", "data-v-15d61d2e": "" }
        })
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/pages/user/details.vue":
/*!*********************************************!*\
  !*** ./resources/js/pages/user/details.vue ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _details_vue_vue_type_template_id_78c75232___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./details.vue?vue&type=template&id=78c75232& */ "./resources/js/pages/user/details.vue?vue&type=template&id=78c75232&");
/* harmony import */ var _details_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./details.vue?vue&type=script&lang=js& */ "./resources/js/pages/user/details.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _details_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _details_vue_vue_type_template_id_78c75232___WEBPACK_IMPORTED_MODULE_0__["render"],
  _details_vue_vue_type_template_id_78c75232___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/user/details.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/user/details.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/pages/user/details.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_details_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./details.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/details.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_details_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/user/details.vue?vue&type=template&id=78c75232&":
/*!****************************************************************************!*\
  !*** ./resources/js/pages/user/details.vue?vue&type=template&id=78c75232& ***!
  \****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_details_vue_vue_type_template_id_78c75232___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./details.vue?vue&type=template&id=78c75232& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/details.vue?vue&type=template&id=78c75232&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_details_vue_vue_type_template_id_78c75232___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_details_vue_vue_type_template_id_78c75232___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);