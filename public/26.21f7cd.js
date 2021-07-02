(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[26],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/sms/remove.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/user/sms/remove.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "remove",
  metaInfo: function metaInfo() {
    return {
      title: this.$t('security_1')
    };
  },
  methods: {
    cancel: function cancel() {},
    "delete": function _delete() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/api/edit/phone").then(function (res) {
        if (res.data.success) {
          _this.edits = false;
        }
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/sms/remove.vue?vue&type=template&id=edeabd36&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/user/sms/remove.vue?vue&type=template&id=edeabd36& ***!
  \*************************************************************************************************************************************************************************************************************/
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
    _c("div", { attrs: { "data-v-1f840139": "" } }, [
      _c("h1", { attrs: { "data-v-1f840139": "" } }, [
        _vm._v("Открепить номер телефона")
      ]),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "card",
          attrs: {
            "data-v-15d61d2e": "",
            "data-v-1f840139": "",
            id: "428713955"
          }
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
                { attrs: { "data-v-1f840139": "", "data-v-15d61d2e": "" } },
                [
                  _vm._v(
                    "\n                Если вы отключите эту функцию, уровень безопасности вашей записи понизится. Отключить?\n                "
                  ),
                  _c(
                    "div",
                    {
                      staticClass: "mt-4",
                      attrs: { "data-v-1f840139": "", "data-v-15d61d2e": "" }
                    },
                    [
                      _c(
                        "button",
                        {
                          staticClass: "btn-primary mr-md-3 btn",
                          attrs: {
                            "data-v-312dd04b": "",
                            "data-v-1f840139": "",
                            type: "button",
                            "data-v-15d61d2e": ""
                          }
                        },
                        [
                          _vm._v(
                            "\n                    Удалить\n                "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "button",
                        {
                          staticClass: "btn-secondary mt-3 mt-md-0 btn",
                          attrs: {
                            "data-v-312dd04b": "",
                            "data-v-1f840139": "",
                            type: "button",
                            "data-v-15d61d2e": ""
                          },
                          on: { click: _vm.cancel }
                        },
                        [
                          _vm._v(
                            "\n                    Не удалять\n                "
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
      { staticClass: "card-title", attrs: { "data-v-15d61d2e": "" } },
      [
        _c("div", { attrs: { "data-v-1f840139": "", "data-v-15d61d2e": "" } }, [
          _c(
            "h3",
            { attrs: { "data-v-1f840139": "", "data-v-15d61d2e": "" } },
            [_vm._v("Вы уверены?")]
          )
        ])
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/pages/user/sms/remove.vue":
/*!************************************************!*\
  !*** ./resources/js/pages/user/sms/remove.vue ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _remove_vue_vue_type_template_id_edeabd36___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./remove.vue?vue&type=template&id=edeabd36& */ "./resources/js/pages/user/sms/remove.vue?vue&type=template&id=edeabd36&");
/* harmony import */ var _remove_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./remove.vue?vue&type=script&lang=js& */ "./resources/js/pages/user/sms/remove.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _remove_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _remove_vue_vue_type_template_id_edeabd36___WEBPACK_IMPORTED_MODULE_0__["render"],
  _remove_vue_vue_type_template_id_edeabd36___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/user/sms/remove.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/user/sms/remove.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/pages/user/sms/remove.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_remove_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./remove.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/sms/remove.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_remove_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/user/sms/remove.vue?vue&type=template&id=edeabd36&":
/*!*******************************************************************************!*\
  !*** ./resources/js/pages/user/sms/remove.vue?vue&type=template&id=edeabd36& ***!
  \*******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_remove_vue_vue_type_template_id_edeabd36___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./remove.vue?vue&type=template&id=edeabd36& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/user/sms/remove.vue?vue&type=template&id=edeabd36&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_remove_vue_vue_type_template_id_edeabd36___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_remove_vue_vue_type_template_id_edeabd36___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);