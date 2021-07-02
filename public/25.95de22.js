(window.webpackJsonp=window.webpackJsonp||[]).push([[25],{51:function(a,t,s){"use strict";s.r(t);var d=s(4),e=s.n(d),i={name:"security",scrollToTop:!1,data:function(){return{user:"",loading:!0,edits:!1,editsQuestion:!1,isSendEmail:!1,isSendQuestion:!1,status_msg:"",status:!1,statusQuestion:!1,style:"display: none;"}},created:function(){var a=this;e.a.get("/api/user").then((function(t){a.user=t.data.data,a.loading=!1}))},methods:{showChangePassword:function(){this.edits=!0},showChangeQuestion:function(){this.editsQuestion=!0},cancel:function(){this.edits=!1},cancelQuestion:function(){this.editsQuestion=!1},sendChangeQuestion:function(){var a=this;if(this.isSendQuestion=!0,!this.validateFormQuestion())return!1;var t=new FormData;t.append("question",this.user.question),t.append("answer",this.user.answer),e.a.post("/api/edit/question",t).then((function(t){a.statusQuestion=!0,a.showNotificationQuestion(t.data.message),a.isSendQuestion=!1,t.data.success&&(a.editsQuestion=!1)}))},sendChangePassword:function(){var a=this;if(this.isSendEmail=!0,!this.validateForm())return!1;var t=new FormData;t.append("oldPassword",this.user.oldPassword),t.append("newPassword",this.user.newPassword),t.append("confirmPassword",this.user.confirmPassword),e.a.post("/api/edit/password",t).then((function(t){a.status=!0,a.showNotification(t.data.message),a.isSendEmail=!1,t.data.success&&(a.edits=!1)}))},validateFormQuestion:function(){return this.user.question&&!!this.user.answer||(this.status=!1,this.showNotification("Не заполнено поле"),!1)},validateForm:function(){return this.user.oldPassword&&this.user.newPassword&&!!this.user.confirmPassword||(this.status=!1,this.showNotification("Не заполнено поле"),!1)},updateTodo:function(){var a=this;e.a.post("/email/verification-notification").then((function(t){a.email_send=t.statusText})).catch((function(t){a.errors=t.response.data.errors}))},showNotification:function(a){var t=this;this.status_msg=a,this.style="",setTimeout((function(){t.status_msg="",t.style="display: none;"}),3e3)},showNotificationQuestion:function(a){var t=this;this.status_msg=a,this.style="",setTimeout((function(){t.status_msg="",t.style="display: none;"}),3e3)}},metaInfo:function(){return{title:this.$t("security_1")}},filters:{capitalize:function(a){return a?(a=a.toString()).charAt(0).toUpperCase()+a.slice(1):""},capitalice:function(a){return a?(a=a.toString()).charAt(0).toUpperCase()+a.slice(1):""}}},r=s(2),l=Object(r.a)(i,(function(){var a=this,t=a.$createElement,s=a._self._c||t;return s("section",{staticClass:"main-content-section"},[s("div",{staticClass:"security-overview",attrs:{"data-v-37d13747":""}},[s("div",{staticClass:"title-bar text-center text-lg-left position-relative",attrs:{"data-v-ba34107c":"","data-v-37d13747":""}},[s("h1",{attrs:{"data-v-ba34107c":""}},[a._v(a._s(a.$t("security_1")))]),a._v(" "),s("div",{staticClass:"back d-lg-none position-absolute",attrs:{"data-v-ba34107c":""}},[s("a",{staticClass:"router-link-active",attrs:{"data-v-ba34107c":"",href:"/"}},[s("svg",{staticClass:"svg-inline--fa fa-chevron-left fa-w-8",attrs:{"data-v-ba34107c":"","aria-hidden":"true",focusable:"false","data-prefix":"fal","data-icon":"chevron-left",role:"img",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 256 512"}},[s("path",{attrs:{"data-v-ba34107c":"",fill:"currentColor",d:"M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z"}})])])])]),a._v(" "),s("div",{staticClass:"card mt-card-top password-info",attrs:{"data-v-15d61d2e":"","data-v-6061b8eb":"","data-v-37d13747":"",id:"password-card","data-blz-addressable-by":"password"}},[s("div",{staticClass:"card-title",attrs:{"data-v-15d61d2e":""}},[s("div",{staticClass:"row",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col-12 col-md-6",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("h3",{attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[a._v(a._s(a.$t("security_2")))])]),a._v(" "),s("div",{staticClass:"col-12 col-md-6",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("a",{staticClass:"card-header-link float-md-right",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":"",href:"javascript:void(0)"},on:{click:a.showChangePassword}},[s("svg",{staticClass:"svg-inline--fa fa-pen fa-w-16",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":"","aria-hidden":"true",focusable:"false","data-prefix":"fas","data-icon":"pen",role:"img",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 512 512"}},[s("path",{attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":"",fill:"currentColor",d:"M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"}})]),a._v(" "+a._s(a.$t("details_3"))+"\n    ")])]),a._v(" "),s("div",{staticClass:"col-sm-12 col-md-10 label description",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("span",{attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[a._v(a._s(a.$t("security_3")))])])])]),a._v(" "),a.status?s("div",{staticClass:"card-subtitle",style:a.style,attrs:{"data-v-15d61d2e":""}},[s("div",{attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"alert-message error",attrs:{"data-v-4918d6bc":"","data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"d-none icon",attrs:{"data-v-4918d6bc":""}}),a._v(" "),s("div",{attrs:{"data-v-4918d6bc":""}},[s("h3",{staticClass:"uppercase",attrs:{"data-v-4918d6bc":""}}),a._v(" "),s("div",{attrs:{"data-v-6061b8eb":""}},[s("span",{attrs:{"data-v-6061b8eb":""}},[a._v(a._s(a.status_msg))])])])])])]):a._e(),a._v(" "),s("div",{staticClass:"card-body",attrs:{"data-v-15d61d2e":""}},[s("div",{attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"hide",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":"",id:"placeholder-89"}},[s("div",{attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"row mt-3 mt-sm-0",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col-4 col-sm-3 col-md-3 col-xl-2 label",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[a._v("\n        "+a._s(a.$t("security_2"))+"\n    ")]),a._v(" "),a._m(0)])])]),a._v(" "),s("div",{attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":"","data-placeholder-id":"placeholder-04135f90-66be-11eb-9975-935b2acb1ee2"}},[a.edits?a._e():s("div",{attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"row mt-2 mt-sm-0",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col-sm-12 col-sm-3 col-md-3 col-xl-2 label",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[a._v(a._s(a.$t("security_2")))]),a._v(" "),s("div",{staticClass:"col-sm-12 col-sm-9 col-md-9 col-xl-10",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[a._v(a._s(a.$t("security_4")))])])]),a._v(" "),a.edits?s("div",{attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"hide",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":"",id:"placeholder-9"}},[s("div",{attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"row mt-3 mt-sm-0",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col-4 col-sm-3 col-md-3 col-xl-2 label",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[a._v("\n                    "+a._s(a.$t("security_2"))+"\n                    ")]),a._v(" "),a._m(1)])])]),a._v(" "),s("div",{attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":"","data-placeholder-id":"placeholder-12088d80-cad4-11eb-a2a5-39aa9ac31a12"}},[s("div",{staticClass:"edit-info",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("form",{attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":"",id:"edit-password"},on:{submit:function(t){return t.preventDefault(),a.sendChangePassword(t)}}},[s("div",{staticClass:"row",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col-sm-12 col-md-3 col-xl-2 label tall-text",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[a._v(a._s(a.$t("security_5")))]),a._v(" "),s("div",{staticClass:"col-sm-12 col-md-6 col-xl-5 col-lg-7",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"blz-password input-block",attrs:{"data-v-75bcaa18":"","data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"password-reveal-wrapper",attrs:{"data-v-75bcaa18":""}},[s("input",{directives:[{name:"model",rawName:"v-model",value:a.user.oldPassword,expression:"user.oldPassword"}],attrs:{"data-v-75bcaa18":"",id:"old-password",placeholder:a.$t("security_6"),type:"password",name:"oldPassword",autocomplete:"current-password",maxlength:"128","data-vv-as":a.$t("security_5")},domProps:{value:a.user.oldPassword},on:{input:function(t){t.target.composing||a.$set(a.user,"oldPassword",t.target.value)}}})])]),a._v(" "),s("span",{staticClass:"is-error",staticStyle:{display:"none"},attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}})])]),a._v(" "),s("div",{staticClass:"row mt-3",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col-sm-12 col-md-3 col-xl-2 label tall-text",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[a._v(a._s(a.$t("security_7")))]),a._v(" "),s("div",{staticClass:"col-sm-12 col-md-6 col-xl-5 col-lg-7",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"blz-password input-block",attrs:{"data-v-75bcaa18":"","data-v-6061b8eb":"","data-v-15d61d2e":"","aria-required":"false","aria-invalid":"false"}},[s("div",{staticClass:"password-reveal-wrapper",attrs:{"data-v-75bcaa18":""}},[s("input",{directives:[{name:"model",rawName:"v-model",value:a.user.newPassword,expression:"user.newPassword"}],attrs:{"data-v-75bcaa18":"",id:"new-password",placeholder:a.$t("security_8"),type:"password",name:"newPassword",autocomplete:"new-password",maxlength:"128","data-vv-as":a.$t("security_7")},domProps:{value:a.user.newPassword},on:{input:function(t){t.target.composing||a.$set(a.user,"newPassword",t.target.value)}}}),a._v(" "),s("span",{staticClass:"caps-lock-indicator",attrs:{"data-v-75bcaa18":""}})])]),a._v(" "),s("span",{staticClass:"is-error",staticStyle:{display:"none"},attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}})])]),a._v(" "),s("div",{staticClass:"row mt-3",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col-sm-12 col-md-3 col-xl-2 label tall-text",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[a._v(a._s(a.$t("security_9")))]),a._v(" "),s("div",{staticClass:"col-sm-12 col-md-6 col-xl-5 col-lg-7",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"blz-password input-block",attrs:{"data-v-75bcaa18":"","data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"password-reveal-wrapper",attrs:{"data-v-75bcaa18":""}},[s("input",{directives:[{name:"model",rawName:"v-model",value:a.user.confirmPassword,expression:"user.confirmPassword"}],attrs:{"data-v-75bcaa18":"",id:"confirm-password",placeholder:a.$t("security_10"),type:"password",name:"confirmPassword",autocomplete:"new-password",maxlength:"128","data-vv-as":a.$t("security_9"),"data-vv-validate-on":"none"},domProps:{value:a.user.confirmPassword},on:{input:function(t){t.target.composing||a.$set(a.user,"confirmPassword",t.target.value)}}})])]),a._v(" "),s("span",{staticClass:"is-error",staticStyle:{display:"none"},attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}})])]),a._v(" "),s("div",{staticClass:"row mt-3",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col offset-md-3 offset-lg-3 offset-xl-2",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("button",{staticClass:"btn-primary btn",attrs:{"data-v-312dd04b":"","data-v-6061b8eb":"",id:"password-submit",type:"submit","data-v-15d61d2e":""}},[a._v("\n                        "+a._s(a.isSendEmail?a.$t("details_8"):a.$t("details_7"))+"\n                    ")]),a._v(" "),s("button",{staticClass:"ml-md-3 mt-2 mt-md-0 btn-secondary btn",attrs:{"data-v-312dd04b":"","data-v-6061b8eb":"",id:"255314618",type:"button","data-v-15d61d2e":""},on:{click:a.cancel}},[a._v("\n                        "+a._s(a.$t("details_10"))+"\n                    ")])])])])])])]):a._e()])])])]),a._v(" "),s("div",{staticClass:"card mt-card-top secret-question",attrs:{"data-v-15d61d2e":"","data-v-45fa6e14":"","data-v-37d13747":"",id:"secret-question-card","data-blz-addressable-by":"secret-question"}},[s("div",{staticClass:"card-title",attrs:{"data-v-15d61d2e":""}},[s("div",{staticClass:"row",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col-12 col-md-6",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("h3",{attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[a._v(a._s(a.$t("security_11")))])]),a._v(" "),s("div",{staticClass:"col-12 col-md-6",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("a",{staticClass:"card-header-link float-md-right",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":"",href:"javascript:void(0)"},on:{click:a.showChangeQuestion}},[s("svg",{staticClass:"svg-inline--fa fa-pen fa-w-16",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":"","aria-hidden":"true",focusable:"false","data-prefix":"fas","data-icon":"pen",role:"img",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 512 512"}},[s("path",{attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":"",fill:"currentColor",d:"M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"}})]),a._v(" "+a._s(a.$t("details_3"))+"\n    ")])])])]),a._v(" "),a.statusQuestion?s("div",{staticClass:"card-subtitle",style:a.style,attrs:{"data-v-15d61d2e":""}},[s("div",{attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"alert-message error",attrs:{"data-v-4918d6bc":"","data-v-6061b8eb":"","data-v-15d61d2e":""}},[s("div",{staticClass:"d-none icon",attrs:{"data-v-4918d6bc":""}}),a._v(" "),s("div",{attrs:{"data-v-4918d6bc":""}},[s("h3",{staticClass:"uppercase",attrs:{"data-v-4918d6bc":""}}),a._v(" "),s("div",{attrs:{"data-v-6061b8eb":""}},[s("span",{attrs:{"data-v-6061b8eb":""}},[a._v(a._s(a.status_msg))])])])])])]):a._e(),a._v(" "),a.editsQuestion?a._e():s("div",{staticClass:"card-body",attrs:{"data-v-15d61d2e":""}},[s("div",{attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("div",{staticClass:"hide",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":"",id:"placeholder-95"}},[s("div",{attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("div",{staticClass:"row mt-3 mt-sm-0",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col-4 col-sm-3 col-md-3 col-xl-2 label",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[a._v("\n        "+a._s(a.$t("security_11"))+"\n    ")]),a._v(" "),a._m(2)])])]),a._v(" "),s("div",{attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":"","data-placeholder-id":"placeholder-0413adb0-66be-11eb-9975-935b2acb1ee2"}},[s("div",{attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("div",{staticClass:"row mt-3 mt-sm-0",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col-sm-12 col-sm-3 col-md-3 col-xl-2 label",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[a._v("\n                            "+a._s(a.$t("security_11"))+"\n                        ")]),a._v(" "),s("div",{staticClass:"col-sm-12 col-sm-9 col-md-9 col-xl-9",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[a.user.question?s("span",{attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[a._v("\n                                "+a._s(a.user.questions)+"\n\t\t\t\t\t\t    ")]):s("span",{attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("a",{attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":"",href:"javascript:void(0)"},on:{click:a.showChangeQuestion}},[a._v("\n\t\t\t\t\t\t\t\t    Выберите секретный вопрос\n\t\t\t\t\t\t\t    ")])])])])])])])]),a._v(" "),a.editsQuestion?s("div",{staticClass:"card-body",attrs:{"data-v-15d61d2e":""}},[s("div",{attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[a._m(3),a._v(" "),s("div",{attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":"","data-placeholder-id":"placeholder-2a1725a1-d03b-11eb-979a-d943ff92edde"}},[s("form",{staticClass:"edit-info",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""},on:{submit:function(t){return t.preventDefault(),a.sendChangeQuestion(t)}}},[s("div",{staticClass:"row",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col-sm-12 col-md-3 col-xl-2 label tall-text",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[a._v("Секретный вопрос")]),a._v(" "),s("div",{staticClass:"col-sm-12 col-md-6 col-xl-5 col-lg-7",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("select",{directives:[{name:"model",rawName:"v-model",value:a.user.question,expression:"user.question"}],staticClass:"grid-100 input-block",attrs:{"data-v-8dca2dd6":"","data-v-45fa6e14":"",id:"question-select",title:"Выбрать новый вопрос",name:"question","data-vv-as":"секретный вопрос","data-v-15d61d2e":""},on:{change:function(t){var s=Array.prototype.filter.call(t.target.options,(function(a){return a.selected})).map((function(a){return"_value"in a?a._value:a.value}));a.$set(a.user,"question",t.target.multiple?s:s[0])}}},[s("option",{attrs:{"data-v-8dca2dd6":"",title:"Выбрать новый вопрос",value:""}},[a._v("\n                    Выбрать новый вопрос\n                ")]),s("option",{attrs:{"data-v-8dca2dd6":"",title:"Марка вашей первой машины",value:"19"}},[a._v("\n                    Марка вашей первой машины\n                ")]),s("option",{attrs:{"data-v-8dca2dd6":"",title:"Название улицы, где вы жили, когда оканчивали школу",value:"20"}},[a._v("\n                    Название улицы, где вы жили, когда оканчивали школу\n                ")]),s("option",{attrs:{"data-v-8dca2dd6":"",title:"Место, куда вы в первый раз летали самолетом",value:"21"}},[a._v("\n                    Место, куда вы в первый раз летали самолетом\n                ")]),s("option",{attrs:{"data-v-8dca2dd6":"",title:"Первая компьютерная игра, которую вы успешно прошли",value:"22"}},[a._v("\n                    Первая компьютерная игра, которую вы успешно прошли\n                ")]),s("option",{attrs:{"data-v-8dca2dd6":"",title:"Кличка вашего второго домашнего животного",value:"23"}},[a._v("\n                    Кличка вашего второго домашнего животного\n                ")]),s("option",{attrs:{"data-v-8dca2dd6":"",title:"Название любимой спортивной команды или имя любимого игрока",value:"24"}},[a._v("\n                    Название любимой спортивной команды или имя любимого игрока\n                ")])]),a._v(" "),s("span",{staticClass:"is-error",staticStyle:{display:"none"},attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}})])]),a._v(" "),s("div",{staticClass:"row mt-3",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col-sm-12 col-md-3 col-xl-2 label tall-text",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[a._v("Секретный ответ")]),a._v(" "),s("div",{staticClass:"col-sm-12 col-md-6 col-xl-5 col-lg-7",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("input",{directives:[{name:"model",rawName:"v-model",value:a.user.answer,expression:"user.answer"}],staticClass:"input-block",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":"",type:"text",id:"answer",name:"answer",placeholder:"Ввести секретный ответ","data-vv-as":"секретный ответ","aria-required":"true","aria-invalid":"true"},domProps:{value:a.user.answer},on:{input:function(t){t.target.composing||a.$set(a.user,"answer",t.target.value)}}}),a._v(" "),s("span",{staticClass:"is-error",staticStyle:{display:"none"},attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}})])]),a._v(" "),s("div",{staticClass:"row mt-3",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("div",{staticClass:"col offset-md-3 offset-lg-3 offset-xl-2",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[s("button",{staticClass:"btn-primary btn",attrs:{"data-v-312dd04b":"","data-v-45fa6e14":"",id:"sqa-submit",type:"submit","data-v-15d61d2e":""}},[a._v("\n                "+a._s(a.isSendQuestion?a.$t("details_8"):a.$t("details_7"))+"\n                ")]),a._v(" "),s("button",{staticClass:"ml-md-3 mt-3 mt-md-0 btn-secondary btn",attrs:{"data-v-312dd04b":"","data-v-45fa6e14":"",id:"379347358",type:"button","data-v-15d61d2e":""},on:{click:a.cancelQuestion}},[a._v("\n                    Отмена\n                ")])])])])])])]):a._e()])])])}),[function(){var a=this.$createElement,t=this._self._c||a;return t("div",{staticClass:"col-8 col-sm-9 col-md-9 col-xl-10",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[t("span",{staticClass:"placeholder-l animated-background",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}})])},function(){var a=this.$createElement,t=this._self._c||a;return t("div",{staticClass:"col-8 col-sm-9 col-md-9 col-xl-10",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}},[t("span",{staticClass:"placeholder-l animated-background",attrs:{"data-v-6061b8eb":"","data-v-15d61d2e":""}})])},function(){var a=this.$createElement,t=this._self._c||a;return t("div",{staticClass:"col-8 col-sm-9 col-md-9 col-xl-10",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[t("span",{staticClass:"placeholder-l animated-background",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}})])},function(){var a=this.$createElement,t=this._self._c||a;return t("div",{staticClass:"hide",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":"",id:"placeholder-67"}},[t("div",{attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[t("div",{staticClass:"row mt-3 mt-sm-0",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[t("div",{staticClass:"col-4 col-sm-3 col-md-3 col-xl-2 label",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[this._v("\n                    Секретный вопрос\n                ")]),this._v(" "),t("div",{staticClass:"col-8 col-sm-9 col-md-9 col-xl-10",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}},[t("span",{staticClass:"placeholder-l animated-background",attrs:{"data-v-45fa6e14":"","data-v-15d61d2e":""}})])])])])}],!1,null,null,null);t.default=l.exports}}]);