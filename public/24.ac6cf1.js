(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[24],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/payment/valute.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/user/payment/valute.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "valute",
  data: function data() {
    return {
      sum: ''
    };
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/payment/valute.vue?vue&type=template&id=553ddaf9&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/user/payment/valute.vue?vue&type=template&id=553ddaf9& ***!
  \*****************************************************************************************************************************************************************************************************************/
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
    {
      staticClass: "card mt-card-top",
      attrs: { "data-v-15d61d2e": "", "data-v-15e52fe7": "" }
    },
    [
      _vm._m(0),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "card-body", attrs: { "data-v-15d61d2e": "" } },
        [
          _c(
            "div",
            { attrs: { "data-v-15e52fe7": "", "data-v-15d61d2e": "" } },
            [
              _c(
                "div",
                { attrs: { "data-v-15e52fe7": "", "data-v-15d61d2e": "" } },
                [
                  _c(
                    "div",
                    {
                      staticClass: "mt-4",
                      attrs: { "data-v-15e52fe7": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _vm._v(
                        "\n                    Будьте внимательны при вводе суммы пополнения кошелька.\n                "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "form",
                    {
                      attrs: {
                        "data-v-15e52fe7": "",
                        "data-v-15d61d2e": "",
                        method: "POST"
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "row",
                          attrs: {
                            "data-v-15e52fe7": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "col-sm-12 col-md-6 col-xl-4",
                              attrs: {
                                "data-v-15e52fe7": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sum,
                                    expression: "sum"
                                  }
                                ],
                                staticClass: "mt-3",
                                attrs: {
                                  "data-v-15e52fe7": "",
                                  "data-v-15d61d2e": "",
                                  type: "number",
                                  name: "sum",
                                  id: "code",
                                  autofocus: "autofocus",
                                  placeholder: "Введите сумму",
                                  "aria-required": "true",
                                  "aria-invalid": "false"
                                },
                                domProps: { value: _vm.sum },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.sum = $event.target.value
                                  }
                                }
                              }),
                              _vm._v(" "),
                              _c(
                                "span",
                                {
                                  staticClass: "is-error",
                                  attrs: {
                                    "data-v-15e52fe7": "",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [_vm._v("Вы ввели некорректную сумму")]
                              )
                            ]
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "row mt-4",
                          attrs: {
                            "data-v-15e52fe7": "",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "col-12",
                              attrs: {
                                "data-v-15e52fe7": "",
                                "data-v-15d61d2e": ""
                              }
                            },
                            [
                              _c(
                                "button",
                                {
                                  staticClass: "btn-primary mr-3 btn",
                                  attrs: {
                                    "data-v-312dd04b": "",
                                    "data-v-15e52fe7": "",
                                    type: "submit",
                                    "data-v-15d61d2e": ""
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                            Отправить\n                        "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "router-link",
                                {
                                  staticClass: "btn btn-secondary back-btn",
                                  attrs: {
                                    "data-v-2d0dc31c": "",
                                    "data-v-15d61d2e": "",
                                    to: { name: "payment" }
                                  }
                                },
                                [_vm._v("Отмена")]
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
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "card-title", attrs: { "data-v-15d61d2e": "" } },
      [
        _c("div", { attrs: { "data-v-15e52fe7": "", "data-v-15d61d2e": "" } }, [
          _c(
            "h3",
            { attrs: { "data-v-15e52fe7": "", "data-v-15d61d2e": "" } },
            [_vm._v("Введите желаемую сумму")]
          )
        ])
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/pages/user/payment/valute.vue":
/*!****************************************************!*\
  !*** ./resources/js/pages/user/payment/valute.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _valute_vue_vue_type_template_id_553ddaf9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./valute.vue?vue&type=template&id=553ddaf9& */ "./resources/js/pages/user/payment/valute.vue?vue&type=template&id=553ddaf9&");
/* harmony import */ var _valute_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./valute.vue?vue&type=script&lang=js& */ "./resources/js/pages/user/payment/valute.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _valute_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _valute_vue_vue_type_template_id_553ddaf9___WEBPACK_IMPORTED_MODULE_0__["render"],
  _valute_vue_vue_type_template_id_553ddaf9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/user/payment/valute.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/user/payment/valute.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/pages/user/payment/valute.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_valute_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./valute.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/payment/valute.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_valute_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/user/payment/valute.vue?vue&type=template&id=553ddaf9&":
/*!***********************************************************************************!*\
  !*** ./resources/js/pages/user/payment/valute.vue?vue&type=template&id=553ddaf9& ***!
  \***********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_valute_vue_vue_type_template_id_553ddaf9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./valute.vue?vue&type=template&id=553ddaf9& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/payment/valute.vue?vue&type=template&id=553ddaf9&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_valute_vue_vue_type_template_id_553ddaf9___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_valute_vue_vue_type_template_id_553ddaf9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);