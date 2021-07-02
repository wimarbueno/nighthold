(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[25],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/security.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/user/security.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "security",
  scrollToTop: false,
  data: function data() {
    return {
      user: '',
      loading: true,
      edits: false,
      editsQuestion: false,
      isSendEmail: false,
      isSendQuestion: false,
      status_msg: "",
      status: false,
      statusQuestion: false,
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
    showChangePassword: function showChangePassword() {
      this.edits = true;
    },
    showChangeQuestion: function showChangeQuestion() {
      this.editsQuestion = true;
    },
    cancel: function cancel() {
      this.edits = false;
    },
    cancelQuestion: function cancelQuestion() {
      this.editsQuestion = false;
    },
    sendChangeQuestion: function sendChangeQuestion() {
      var _this2 = this;

      this.isSendQuestion = true;

      if (!this.validateFormQuestion()) {
        return false;
      }

      var formData = new FormData();
      formData.append("question", this.user.question);
      formData.append("answer", this.user.answer);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/api/edit/question", formData).then(function (res) {
        _this2.statusQuestion = true;

        _this2.showNotificationQuestion(res.data.message);

        _this2.isSendQuestion = false;

        if (res.data.success) {
          _this2.editsQuestion = false;
        }
      });
    },
    sendChangePassword: function sendChangePassword() {
      var _this3 = this;

      this.isSendEmail = true;

      if (!this.validateForm()) {
        return false;
      }

      var formData = new FormData();
      formData.append("oldPassword", this.user.oldPassword);
      formData.append("newPassword", this.user.newPassword);
      formData.append("confirmPassword", this.user.confirmPassword);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/api/edit/password", formData).then(function (res) {
        _this3.status = true;

        _this3.showNotification(res.data.message);

        _this3.isSendEmail = false;

        if (res.data.success) {
          _this3.edits = false;
        }
      });
    },
    validateFormQuestion: function validateFormQuestion() {
      if (!this.user.question) {
        this.status = false;
        this.showNotification("Не заполнено поле");
        return false;
      }

      if (!this.user.answer) {
        this.status = false;
        this.showNotification("Не заполнено поле");
        return false;
      }

      return true;
    },
    validateForm: function validateForm() {
      if (!this.user.oldPassword) {
        this.status = false;
        this.showNotification("Не заполнено поле");
        return false;
      }

      if (!this.user.newPassword) {
        this.status = false;
        this.showNotification("Не заполнено поле");
        return false;
      }

      if (!this.user.confirmPassword) {
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
    },
    showNotificationQuestion: function showNotificationQuestion(message) {
      var _this6 = this;

      this.status_msg = message;
      this.style = "";
      setTimeout(function () {
        _this6.status_msg = "";
        _this6.style = "display: none;";
      }, 3000);
    }
  },
  metaInfo: function metaInfo() {
    return {
      title: this.$t('security_1')
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/security.vue?vue&type=template&id=e4876f2a&":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/user/security.vue?vue&type=template&id=e4876f2a& ***!
  \***********************************************************************************************************************************************************************************************************/
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
      { staticClass: "security-overview", attrs: { "data-v-37d13747": "" } },
      [
        _c(
          "div",
          {
            staticClass: "title-bar text-center text-lg-left position-relative",
            attrs: { "data-v-ba34107c": "", "data-v-37d13747": "" }
          },
          [
            _c("h1", { attrs: { "data-v-ba34107c": "" } }, [
              _vm._v(_vm._s(_vm.$t("security_1")))
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
            staticClass: "card mt-card-top password-info",
            attrs: {
              "data-v-15d61d2e": "",
              "data-v-6061b8eb": "",
              "data-v-37d13747": "",
              id: "password-card",
              "data-blz-addressable-by": "password"
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
                    attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" }
                  },
                  [
                    _c(
                      "div",
                      {
                        staticClass: "col-12 col-md-6",
                        attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" }
                      },
                      [
                        _c(
                          "h3",
                          {
                            attrs: {
                              "data-v-6061b8eb": "",
                              "data-v-15d61d2e": ""
                            }
                          },
                          [_vm._v(_vm._s(_vm.$t("security_2")))]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "col-12 col-md-6",
                        attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" }
                      },
                      [
                        _c(
                          "a",
                          {
                            staticClass: "card-header-link float-md-right",
                            attrs: {
                              "data-v-6061b8eb": "",
                              "data-v-15d61d2e": "",
                              href: "javascript:void(0)"
                            },
                            on: { click: _vm.showChangePassword }
                          },
                          [
                            _c(
                              "svg",
                              {
                                staticClass: "svg-inline--fa fa-pen fa-w-16",
                                attrs: {
                                  "data-v-6061b8eb": "",
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
                                    "data-v-6061b8eb": "",
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
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "col-sm-12 col-md-10 label description",
                        attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" }
                      },
                      [
                        _c(
                          "span",
                          {
                            attrs: {
                              "data-v-6061b8eb": "",
                              "data-v-15d61d2e": ""
                            }
                          },
                          [_vm._v(_vm._s(_vm.$t("security_3")))]
                        )
                      ]
                    )
                  ]
                )
              ]
            ),
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
                      {
                        attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" }
                      },
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
                                _c(
                                  "span",
                                  { attrs: { "data-v-6061b8eb": "" } },
                                  [_vm._v(_vm._s(_vm.status_msg))]
                                )
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
                  { attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" } },
                  [
                    _c(
                      "div",
                      {
                        staticClass: "hide",
                        attrs: {
                          "data-v-6061b8eb": "",
                          "data-v-15d61d2e": "",
                          id: "placeholder-89"
                        }
                      },
                      [
                        _c(
                          "div",
                          {
                            attrs: {
                              "data-v-6061b8eb": "",
                              "data-v-15d61d2e": ""
                            }
                          },
                          [
                            _c(
                              "div",
                              {
                                staticClass: "row mt-3 mt-sm-0",
                                attrs: {
                                  "data-v-6061b8eb": "",
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
                                      "data-v-6061b8eb": "",
                                      "data-v-15d61d2e": ""
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "\n        " +
                                        _vm._s(_vm.$t("security_2")) +
                                        "\n    "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _vm._m(0)
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
                          "data-v-6061b8eb": "",
                          "data-v-15d61d2e": "",
                          "data-placeholder-id":
                            "placeholder-04135f90-66be-11eb-9975-935b2acb1ee2"
                        }
                      },
                      [
                        !_vm.edits
                          ? _c(
                              "div",
                              {
                                attrs: {
                                  "data-v-6061b8eb": "",
                                  "data-v-15d61d2e": ""
                                }
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass: "row mt-2 mt-sm-0",
                                    attrs: {
                                      "data-v-6061b8eb": "",
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
                                          "data-v-6061b8eb": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      },
                                      [_vm._v(_vm._s(_vm.$t("security_2")))]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "col-sm-12 col-sm-9 col-md-9 col-xl-10",
                                        attrs: {
                                          "data-v-6061b8eb": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      },
                                      [_vm._v(_vm._s(_vm.$t("security_4")))]
                                    )
                                  ]
                                )
                              ]
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _vm.edits
                          ? _c(
                              "div",
                              {
                                attrs: {
                                  "data-v-6061b8eb": "",
                                  "data-v-15d61d2e": ""
                                }
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass: "hide",
                                    attrs: {
                                      "data-v-6061b8eb": "",
                                      "data-v-15d61d2e": "",
                                      id: "placeholder-9"
                                    }
                                  },
                                  [
                                    _c(
                                      "div",
                                      {
                                        attrs: {
                                          "data-v-6061b8eb": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass: "row mt-3 mt-sm-0",
                                            attrs: {
                                              "data-v-6061b8eb": "",
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
                                                  "data-v-6061b8eb": "",
                                                  "data-v-15d61d2e": ""
                                                }
                                              },
                                              [
                                                _vm._v(
                                                  "\n                    " +
                                                    _vm._s(
                                                      _vm.$t("security_2")
                                                    ) +
                                                    "\n                    "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _vm._m(1)
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
                                      "data-v-6061b8eb": "",
                                      "data-v-15d61d2e": "",
                                      "data-placeholder-id":
                                        "placeholder-12088d80-cad4-11eb-a2a5-39aa9ac31a12"
                                    }
                                  },
                                  [
                                    _c(
                                      "div",
                                      {
                                        staticClass: "edit-info",
                                        attrs: {
                                          "data-v-6061b8eb": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      },
                                      [
                                        _c(
                                          "form",
                                          {
                                            attrs: {
                                              "data-v-6061b8eb": "",
                                              "data-v-15d61d2e": "",
                                              id: "edit-password"
                                            },
                                            on: {
                                              submit: function($event) {
                                                $event.preventDefault()
                                                return _vm.sendChangePassword(
                                                  $event
                                                )
                                              }
                                            }
                                          },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticClass: "row",
                                                attrs: {
                                                  "data-v-6061b8eb": "",
                                                  "data-v-15d61d2e": ""
                                                }
                                              },
                                              [
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "col-sm-12 col-md-3 col-xl-2 label tall-text",
                                                    attrs: {
                                                      "data-v-6061b8eb": "",
                                                      "data-v-15d61d2e": ""
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        _vm.$t("security_5")
                                                      )
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
                                                      "data-v-6061b8eb": "",
                                                      "data-v-15d61d2e": ""
                                                    }
                                                  },
                                                  [
                                                    _c(
                                                      "div",
                                                      {
                                                        staticClass:
                                                          "blz-password input-block",
                                                        attrs: {
                                                          "data-v-75bcaa18": "",
                                                          "data-v-6061b8eb": "",
                                                          "data-v-15d61d2e": ""
                                                        }
                                                      },
                                                      [
                                                        _c(
                                                          "div",
                                                          {
                                                            staticClass:
                                                              "password-reveal-wrapper",
                                                            attrs: {
                                                              "data-v-75bcaa18":
                                                                ""
                                                            }
                                                          },
                                                          [
                                                            _c("input", {
                                                              directives: [
                                                                {
                                                                  name: "model",
                                                                  rawName:
                                                                    "v-model",
                                                                  value:
                                                                    _vm.user
                                                                      .oldPassword,
                                                                  expression:
                                                                    "user.oldPassword"
                                                                }
                                                              ],
                                                              attrs: {
                                                                "data-v-75bcaa18":
                                                                  "",
                                                                id:
                                                                  "old-password",
                                                                placeholder: _vm.$t(
                                                                  "security_6"
                                                                ),
                                                                type:
                                                                  "password",
                                                                name:
                                                                  "oldPassword",
                                                                autocomplete:
                                                                  "current-password",
                                                                maxlength:
                                                                  "128",
                                                                "data-vv-as": _vm.$t(
                                                                  "security_5"
                                                                )
                                                              },
                                                              domProps: {
                                                                value:
                                                                  _vm.user
                                                                    .oldPassword
                                                              },
                                                              on: {
                                                                input: function(
                                                                  $event
                                                                ) {
                                                                  if (
                                                                    $event
                                                                      .target
                                                                      .composing
                                                                  ) {
                                                                    return
                                                                  }
                                                                  _vm.$set(
                                                                    _vm.user,
                                                                    "oldPassword",
                                                                    $event
                                                                      .target
                                                                      .value
                                                                  )
                                                                }
                                                              }
                                                            })
                                                          ]
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c("span", {
                                                      staticClass: "is-error",
                                                      staticStyle: {
                                                        display: "none"
                                                      },
                                                      attrs: {
                                                        "data-v-6061b8eb": "",
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
                                                  "data-v-6061b8eb": "",
                                                  "data-v-15d61d2e": ""
                                                }
                                              },
                                              [
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "col-sm-12 col-md-3 col-xl-2 label tall-text",
                                                    attrs: {
                                                      "data-v-6061b8eb": "",
                                                      "data-v-15d61d2e": ""
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        _vm.$t("security_7")
                                                      )
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
                                                      "data-v-6061b8eb": "",
                                                      "data-v-15d61d2e": ""
                                                    }
                                                  },
                                                  [
                                                    _c(
                                                      "div",
                                                      {
                                                        staticClass:
                                                          "blz-password input-block",
                                                        attrs: {
                                                          "data-v-75bcaa18": "",
                                                          "data-v-6061b8eb": "",
                                                          "data-v-15d61d2e": "",
                                                          "aria-required":
                                                            "false",
                                                          "aria-invalid":
                                                            "false"
                                                        }
                                                      },
                                                      [
                                                        _c(
                                                          "div",
                                                          {
                                                            staticClass:
                                                              "password-reveal-wrapper",
                                                            attrs: {
                                                              "data-v-75bcaa18":
                                                                ""
                                                            }
                                                          },
                                                          [
                                                            _c("input", {
                                                              directives: [
                                                                {
                                                                  name: "model",
                                                                  rawName:
                                                                    "v-model",
                                                                  value:
                                                                    _vm.user
                                                                      .newPassword,
                                                                  expression:
                                                                    "user.newPassword"
                                                                }
                                                              ],
                                                              attrs: {
                                                                "data-v-75bcaa18":
                                                                  "",
                                                                id:
                                                                  "new-password",
                                                                placeholder: _vm.$t(
                                                                  "security_8"
                                                                ),
                                                                type:
                                                                  "password",
                                                                name:
                                                                  "newPassword",
                                                                autocomplete:
                                                                  "new-password",
                                                                maxlength:
                                                                  "128",
                                                                "data-vv-as": _vm.$t(
                                                                  "security_7"
                                                                )
                                                              },
                                                              domProps: {
                                                                value:
                                                                  _vm.user
                                                                    .newPassword
                                                              },
                                                              on: {
                                                                input: function(
                                                                  $event
                                                                ) {
                                                                  if (
                                                                    $event
                                                                      .target
                                                                      .composing
                                                                  ) {
                                                                    return
                                                                  }
                                                                  _vm.$set(
                                                                    _vm.user,
                                                                    "newPassword",
                                                                    $event
                                                                      .target
                                                                      .value
                                                                  )
                                                                }
                                                              }
                                                            }),
                                                            _vm._v(" "),
                                                            _c("span", {
                                                              staticClass:
                                                                "caps-lock-indicator",
                                                              attrs: {
                                                                "data-v-75bcaa18":
                                                                  ""
                                                              }
                                                            })
                                                          ]
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c("span", {
                                                      staticClass: "is-error",
                                                      staticStyle: {
                                                        display: "none"
                                                      },
                                                      attrs: {
                                                        "data-v-6061b8eb": "",
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
                                                  "data-v-6061b8eb": "",
                                                  "data-v-15d61d2e": ""
                                                }
                                              },
                                              [
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "col-sm-12 col-md-3 col-xl-2 label tall-text",
                                                    attrs: {
                                                      "data-v-6061b8eb": "",
                                                      "data-v-15d61d2e": ""
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        _vm.$t("security_9")
                                                      )
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
                                                      "data-v-6061b8eb": "",
                                                      "data-v-15d61d2e": ""
                                                    }
                                                  },
                                                  [
                                                    _c(
                                                      "div",
                                                      {
                                                        staticClass:
                                                          "blz-password input-block",
                                                        attrs: {
                                                          "data-v-75bcaa18": "",
                                                          "data-v-6061b8eb": "",
                                                          "data-v-15d61d2e": ""
                                                        }
                                                      },
                                                      [
                                                        _c(
                                                          "div",
                                                          {
                                                            staticClass:
                                                              "password-reveal-wrapper",
                                                            attrs: {
                                                              "data-v-75bcaa18":
                                                                ""
                                                            }
                                                          },
                                                          [
                                                            _c("input", {
                                                              directives: [
                                                                {
                                                                  name: "model",
                                                                  rawName:
                                                                    "v-model",
                                                                  value:
                                                                    _vm.user
                                                                      .confirmPassword,
                                                                  expression:
                                                                    "user.confirmPassword"
                                                                }
                                                              ],
                                                              attrs: {
                                                                "data-v-75bcaa18":
                                                                  "",
                                                                id:
                                                                  "confirm-password",
                                                                placeholder: _vm.$t(
                                                                  "security_10"
                                                                ),
                                                                type:
                                                                  "password",
                                                                name:
                                                                  "confirmPassword",
                                                                autocomplete:
                                                                  "new-password",
                                                                maxlength:
                                                                  "128",
                                                                "data-vv-as": _vm.$t(
                                                                  "security_9"
                                                                ),
                                                                "data-vv-validate-on":
                                                                  "none"
                                                              },
                                                              domProps: {
                                                                value:
                                                                  _vm.user
                                                                    .confirmPassword
                                                              },
                                                              on: {
                                                                input: function(
                                                                  $event
                                                                ) {
                                                                  if (
                                                                    $event
                                                                      .target
                                                                      .composing
                                                                  ) {
                                                                    return
                                                                  }
                                                                  _vm.$set(
                                                                    _vm.user,
                                                                    "confirmPassword",
                                                                    $event
                                                                      .target
                                                                      .value
                                                                  )
                                                                }
                                                              }
                                                            })
                                                          ]
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c("span", {
                                                      staticClass: "is-error",
                                                      staticStyle: {
                                                        display: "none"
                                                      },
                                                      attrs: {
                                                        "data-v-6061b8eb": "",
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
                                                  "data-v-6061b8eb": "",
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
                                                      "data-v-6061b8eb": "",
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
                                                          "data-v-6061b8eb": "",
                                                          id: "password-submit",
                                                          type: "submit",
                                                          "data-v-15d61d2e": ""
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          "\n                        " +
                                                            _vm._s(
                                                              _vm.isSendEmail
                                                                ? _vm.$t(
                                                                    "details_8"
                                                                  )
                                                                : _vm.$t(
                                                                    "details_7"
                                                                  )
                                                            ) +
                                                            "\n                    "
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "button",
                                                      {
                                                        staticClass:
                                                          "ml-md-3 mt-2 mt-md-0 btn-secondary btn",
                                                        attrs: {
                                                          "data-v-312dd04b": "",
                                                          "data-v-6061b8eb": "",
                                                          id: "255314618",
                                                          type: "button",
                                                          "data-v-15d61d2e": ""
                                                        },
                                                        on: {
                                                          click: _vm.cancel
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          "\n                        " +
                                                            _vm._s(
                                                              _vm.$t(
                                                                "details_10"
                                                              )
                                                            ) +
                                                            "\n                    "
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
                            )
                          : _vm._e()
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
            staticClass: "card mt-card-top secret-question",
            attrs: {
              "data-v-15d61d2e": "",
              "data-v-45fa6e14": "",
              "data-v-37d13747": "",
              id: "secret-question-card",
              "data-blz-addressable-by": "secret-question"
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
                    attrs: { "data-v-45fa6e14": "", "data-v-15d61d2e": "" }
                  },
                  [
                    _c(
                      "div",
                      {
                        staticClass: "col-12 col-md-6",
                        attrs: { "data-v-45fa6e14": "", "data-v-15d61d2e": "" }
                      },
                      [
                        _c(
                          "h3",
                          {
                            attrs: {
                              "data-v-45fa6e14": "",
                              "data-v-15d61d2e": ""
                            }
                          },
                          [_vm._v(_vm._s(_vm.$t("security_11")))]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "col-12 col-md-6",
                        attrs: { "data-v-45fa6e14": "", "data-v-15d61d2e": "" }
                      },
                      [
                        _c(
                          "a",
                          {
                            staticClass: "card-header-link float-md-right",
                            attrs: {
                              "data-v-45fa6e14": "",
                              "data-v-15d61d2e": "",
                              href: "javascript:void(0)"
                            },
                            on: { click: _vm.showChangeQuestion }
                          },
                          [
                            _c(
                              "svg",
                              {
                                staticClass: "svg-inline--fa fa-pen fa-w-16",
                                attrs: {
                                  "data-v-45fa6e14": "",
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
                                    "data-v-45fa6e14": "",
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
            _vm.statusQuestion
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
                      {
                        attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" }
                      },
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
                                _c(
                                  "span",
                                  { attrs: { "data-v-6061b8eb": "" } },
                                  [_vm._v(_vm._s(_vm.status_msg))]
                                )
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
            !_vm.editsQuestion
              ? _c(
                  "div",
                  {
                    staticClass: "card-body",
                    attrs: { "data-v-15d61d2e": "" }
                  },
                  [
                    _c(
                      "div",
                      {
                        attrs: { "data-v-45fa6e14": "", "data-v-15d61d2e": "" }
                      },
                      [
                        _c(
                          "div",
                          {
                            staticClass: "hide",
                            attrs: {
                              "data-v-45fa6e14": "",
                              "data-v-15d61d2e": "",
                              id: "placeholder-95"
                            }
                          },
                          [
                            _c(
                              "div",
                              {
                                attrs: {
                                  "data-v-45fa6e14": "",
                                  "data-v-15d61d2e": ""
                                }
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass: "row mt-3 mt-sm-0",
                                    attrs: {
                                      "data-v-45fa6e14": "",
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
                                          "data-v-45fa6e14": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      },
                                      [
                                        _vm._v(
                                          "\n        " +
                                            _vm._s(_vm.$t("security_11")) +
                                            "\n    "
                                        )
                                      ]
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
                        _c(
                          "div",
                          {
                            attrs: {
                              "data-v-45fa6e14": "",
                              "data-v-15d61d2e": "",
                              "data-placeholder-id":
                                "placeholder-0413adb0-66be-11eb-9975-935b2acb1ee2"
                            }
                          },
                          [
                            _c(
                              "div",
                              {
                                attrs: {
                                  "data-v-45fa6e14": "",
                                  "data-v-15d61d2e": ""
                                }
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass: "row mt-3 mt-sm-0",
                                    attrs: {
                                      "data-v-45fa6e14": "",
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
                                          "data-v-45fa6e14": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      },
                                      [
                                        _vm._v(
                                          "\n                            " +
                                            _vm._s(_vm.$t("security_11")) +
                                            "\n                        "
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "col-sm-12 col-sm-9 col-md-9 col-xl-9",
                                        attrs: {
                                          "data-v-45fa6e14": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      },
                                      [
                                        _vm.user.question
                                          ? _c(
                                              "span",
                                              {
                                                attrs: {
                                                  "data-v-45fa6e14": "",
                                                  "data-v-15d61d2e": ""
                                                }
                                              },
                                              [
                                                _vm._v(
                                                  "\n                                " +
                                                    _vm._s(_vm.user.questions) +
                                                    "\n\t\t\t\t\t\t    "
                                                )
                                              ]
                                            )
                                          : _c(
                                              "span",
                                              {
                                                attrs: {
                                                  "data-v-45fa6e14": "",
                                                  "data-v-15d61d2e": ""
                                                }
                                              },
                                              [
                                                _c(
                                                  "a",
                                                  {
                                                    attrs: {
                                                      "data-v-45fa6e14": "",
                                                      "data-v-15d61d2e": "",
                                                      href: "javascript:void(0)"
                                                    },
                                                    on: {
                                                      click:
                                                        _vm.showChangeQuestion
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n\t\t\t\t\t\t\t\t    Выберите секретный вопрос\n\t\t\t\t\t\t\t    "
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
                    )
                  ]
                )
              : _vm._e(),
            _vm._v(" "),
            _vm.editsQuestion
              ? _c(
                  "div",
                  {
                    staticClass: "card-body",
                    attrs: { "data-v-15d61d2e": "" }
                  },
                  [
                    _c(
                      "div",
                      {
                        attrs: { "data-v-45fa6e14": "", "data-v-15d61d2e": "" }
                      },
                      [
                        _vm._m(3),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            attrs: {
                              "data-v-45fa6e14": "",
                              "data-v-15d61d2e": "",
                              "data-placeholder-id":
                                "placeholder-2a1725a1-d03b-11eb-979a-d943ff92edde"
                            }
                          },
                          [
                            _c(
                              "form",
                              {
                                staticClass: "edit-info",
                                attrs: {
                                  "data-v-45fa6e14": "",
                                  "data-v-15d61d2e": ""
                                },
                                on: {
                                  submit: function($event) {
                                    $event.preventDefault()
                                    return _vm.sendChangeQuestion($event)
                                  }
                                }
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass: "row",
                                    attrs: {
                                      "data-v-45fa6e14": "",
                                      "data-v-15d61d2e": ""
                                    }
                                  },
                                  [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "col-sm-12 col-md-3 col-xl-2 label tall-text",
                                        attrs: {
                                          "data-v-45fa6e14": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      },
                                      [_vm._v("Секретный вопрос")]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "col-sm-12 col-md-6 col-xl-5 col-lg-7",
                                        attrs: {
                                          "data-v-45fa6e14": "",
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
                                                value: _vm.user.question,
                                                expression: "user.question"
                                              }
                                            ],
                                            staticClass: "grid-100 input-block",
                                            attrs: {
                                              "data-v-8dca2dd6": "",
                                              "data-v-45fa6e14": "",
                                              id: "question-select",
                                              title: "Выбрать новый вопрос",
                                              name: "question",
                                              "data-vv-as": "секретный вопрос",
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
                                                  "question",
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
                                              {
                                                attrs: {
                                                  "data-v-8dca2dd6": "",
                                                  title: "Выбрать новый вопрос",
                                                  value: ""
                                                }
                                              },
                                              [
                                                _vm._v(
                                                  "\n                    Выбрать новый вопрос\n                "
                                                )
                                              ]
                                            ),
                                            _c(
                                              "option",
                                              {
                                                attrs: {
                                                  "data-v-8dca2dd6": "",
                                                  title:
                                                    "Марка вашей первой машины",
                                                  value: "19"
                                                }
                                              },
                                              [
                                                _vm._v(
                                                  "\n                    Марка вашей первой машины\n                "
                                                )
                                              ]
                                            ),
                                            _c(
                                              "option",
                                              {
                                                attrs: {
                                                  "data-v-8dca2dd6": "",
                                                  title:
                                                    "Название улицы, где вы жили, когда оканчивали школу",
                                                  value: "20"
                                                }
                                              },
                                              [
                                                _vm._v(
                                                  "\n                    Название улицы, где вы жили, когда оканчивали школу\n                "
                                                )
                                              ]
                                            ),
                                            _c(
                                              "option",
                                              {
                                                attrs: {
                                                  "data-v-8dca2dd6": "",
                                                  title:
                                                    "Место, куда вы в первый раз летали самолетом",
                                                  value: "21"
                                                }
                                              },
                                              [
                                                _vm._v(
                                                  "\n                    Место, куда вы в первый раз летали самолетом\n                "
                                                )
                                              ]
                                            ),
                                            _c(
                                              "option",
                                              {
                                                attrs: {
                                                  "data-v-8dca2dd6": "",
                                                  title:
                                                    "Первая компьютерная игра, которую вы успешно прошли",
                                                  value: "22"
                                                }
                                              },
                                              [
                                                _vm._v(
                                                  "\n                    Первая компьютерная игра, которую вы успешно прошли\n                "
                                                )
                                              ]
                                            ),
                                            _c(
                                              "option",
                                              {
                                                attrs: {
                                                  "data-v-8dca2dd6": "",
                                                  title:
                                                    "Кличка вашего второго домашнего животного",
                                                  value: "23"
                                                }
                                              },
                                              [
                                                _vm._v(
                                                  "\n                    Кличка вашего второго домашнего животного\n                "
                                                )
                                              ]
                                            ),
                                            _c(
                                              "option",
                                              {
                                                attrs: {
                                                  "data-v-8dca2dd6": "",
                                                  title:
                                                    "Название любимой спортивной команды или имя любимого игрока",
                                                  value: "24"
                                                }
                                              },
                                              [
                                                _vm._v(
                                                  "\n                    Название любимой спортивной команды или имя любимого игрока\n                "
                                                )
                                              ]
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c("span", {
                                          staticClass: "is-error",
                                          staticStyle: { display: "none" },
                                          attrs: {
                                            "data-v-45fa6e14": "",
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
                                      "data-v-45fa6e14": "",
                                      "data-v-15d61d2e": ""
                                    }
                                  },
                                  [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "col-sm-12 col-md-3 col-xl-2 label tall-text",
                                        attrs: {
                                          "data-v-45fa6e14": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      },
                                      [_vm._v("Секретный ответ")]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "col-sm-12 col-md-6 col-xl-5 col-lg-7",
                                        attrs: {
                                          "data-v-45fa6e14": "",
                                          "data-v-15d61d2e": ""
                                        }
                                      },
                                      [
                                        _c("input", {
                                          directives: [
                                            {
                                              name: "model",
                                              rawName: "v-model",
                                              value: _vm.user.answer,
                                              expression: "user.answer"
                                            }
                                          ],
                                          staticClass: "input-block",
                                          attrs: {
                                            "data-v-45fa6e14": "",
                                            "data-v-15d61d2e": "",
                                            type: "text",
                                            id: "answer",
                                            name: "answer",
                                            placeholder:
                                              "Ввести секретный ответ",
                                            "data-vv-as": "секретный ответ",
                                            "aria-required": "true",
                                            "aria-invalid": "true"
                                          },
                                          domProps: { value: _vm.user.answer },
                                          on: {
                                            input: function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                _vm.user,
                                                "answer",
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
                                            "data-v-45fa6e14": "",
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
                                      "data-v-45fa6e14": "",
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
                                          "data-v-45fa6e14": "",
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
                                              "data-v-45fa6e14": "",
                                              id: "sqa-submit",
                                              type: "submit",
                                              "data-v-15d61d2e": ""
                                            }
                                          },
                                          [
                                            _vm._v(
                                              "\n                " +
                                                _vm._s(
                                                  _vm.isSendQuestion
                                                    ? _vm.$t("details_8")
                                                    : _vm.$t("details_7")
                                                ) +
                                                "\n                "
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
                                              "data-v-45fa6e14": "",
                                              id: "379347358",
                                              type: "button",
                                              "data-v-15d61d2e": ""
                                            },
                                            on: { click: _vm.cancelQuestion }
                                          },
                                          [
                                            _vm._v(
                                              "\n                    Отмена\n                "
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
                )
              : _vm._e()
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
      {
        staticClass: "col-8 col-sm-9 col-md-9 col-xl-10",
        attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" }
      },
      [
        _c("span", {
          staticClass: "placeholder-l animated-background",
          attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" }
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
        attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" }
      },
      [
        _c("span", {
          staticClass: "placeholder-l animated-background",
          attrs: { "data-v-6061b8eb": "", "data-v-15d61d2e": "" }
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
        attrs: { "data-v-45fa6e14": "", "data-v-15d61d2e": "" }
      },
      [
        _c("span", {
          staticClass: "placeholder-l animated-background",
          attrs: { "data-v-45fa6e14": "", "data-v-15d61d2e": "" }
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
        staticClass: "hide",
        attrs: {
          "data-v-45fa6e14": "",
          "data-v-15d61d2e": "",
          id: "placeholder-67"
        }
      },
      [
        _c("div", { attrs: { "data-v-45fa6e14": "", "data-v-15d61d2e": "" } }, [
          _c(
            "div",
            {
              staticClass: "row mt-3 mt-sm-0",
              attrs: { "data-v-45fa6e14": "", "data-v-15d61d2e": "" }
            },
            [
              _c(
                "div",
                {
                  staticClass: "col-4 col-sm-3 col-md-3 col-xl-2 label",
                  attrs: { "data-v-45fa6e14": "", "data-v-15d61d2e": "" }
                },
                [
                  _vm._v(
                    "\n                    Секретный вопрос\n                "
                  )
                ]
              ),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "col-8 col-sm-9 col-md-9 col-xl-10",
                  attrs: { "data-v-45fa6e14": "", "data-v-15d61d2e": "" }
                },
                [
                  _c("span", {
                    staticClass: "placeholder-l animated-background",
                    attrs: { "data-v-45fa6e14": "", "data-v-15d61d2e": "" }
                  })
                ]
              )
            ]
          )
        ])
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/pages/user/security.vue":
/*!**********************************************!*\
  !*** ./resources/js/pages/user/security.vue ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _security_vue_vue_type_template_id_e4876f2a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./security.vue?vue&type=template&id=e4876f2a& */ "./resources/js/pages/user/security.vue?vue&type=template&id=e4876f2a&");
/* harmony import */ var _security_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./security.vue?vue&type=script&lang=js& */ "./resources/js/pages/user/security.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _security_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _security_vue_vue_type_template_id_e4876f2a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _security_vue_vue_type_template_id_e4876f2a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/user/security.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/user/security.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/pages/user/security.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_security_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./security.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/security.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_security_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/user/security.vue?vue&type=template&id=e4876f2a&":
/*!*****************************************************************************!*\
  !*** ./resources/js/pages/user/security.vue?vue&type=template&id=e4876f2a& ***!
  \*****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_security_vue_vue_type_template_id_e4876f2a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./security.vue?vue&type=template&id=e4876f2a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/security.vue?vue&type=template&id=e4876f2a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_security_vue_vue_type_template_id_e4876f2a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_security_vue_vue_type_template_id_e4876f2a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);