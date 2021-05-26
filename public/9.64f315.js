(window.webpackJsonp=window.webpackJsonp||[]).push([[9],{213:function(t,e,r){"use strict";var o=r(0),n=r.n(o);function s(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}function i(t){return(i="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}function a(t,e,r,o,n,s,i){try{var a=t[s](i),c=a.value}catch(t){return void r(t)}a.done?e(c):Promise.resolve(c).then(o,n)}function c(t,e){var r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};"object"===i(t)&&(r=t,t=""),r=function(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{},o=Object.keys(r);"function"==typeof Object.getOwnPropertySymbols&&(o=o.concat(Object.getOwnPropertySymbols(r).filter(function(t){return Object.getOwnPropertyDescriptor(r,t).enumerable}))),o.forEach(function(e){s(t,e,r[e])})}return t}({url:t,title:e,width:600,height:720},r);var o=void 0!==window.screenLeft?window.screenLeft:window.screen.left,n=void 0!==window.screenTop?window.screenTop:window.screen.top,a=window.innerWidth||document.documentElement.clientWidth||window.screen.width,c=window.innerHeight||document.documentElement.clientHeight||window.screen.height;r.left=a/2-r.width/2+o,r.top=c/2-r.height/2+n;var l=Object.keys(r).reduce(function(t,e){return t.push("".concat(e,"=").concat(r[e])),t},[]).join(","),u=window.open(t,e,l);return window.focus&&u.focus(),u}var l={name:"LoginWithGithub",computed:{githubAuth:function(){return window.config.githubAuth},url:function(){return"/api/oauth/github"}},mounted:function(){window.addEventListener("message",this.onMessage,!1)},beforeDestroy:function(){window.removeEventListener("message",this.onMessage)},methods:{login:function(){var t,e=(t=n.a.mark(function t(){var e,r;return n.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return e=c("",this.$t("login")),t.next=3,this.$store.dispatch("auth/fetchOauthUrl",{provider:"github"});case 3:r=t.sent,e.location.href=r;case 5:case"end":return t.stop()}},t,this)}),function(){var e=this,r=arguments;return new Promise(function(o,n){var s=t.apply(e,r);function i(t){a(s,o,n,i,c,"next",t)}function c(t){a(s,o,n,i,c,"throw",t)}i(void 0)})});return function(){return e.apply(this,arguments)}}(),onMessage:function(t){t.origin===window.origin&&t.data.token&&(this.$store.dispatch("auth/saveToken",{token:t.data.token}),this.$router.push({name:"home"}))}}},u=r(2),m=Object(u.a)(l,function(){var t=this.$createElement,e=this._self._c||t;return this.githubAuth?e("button",{staticClass:"btn btn-dark ml-auto",attrs:{type:"button"},on:{click:this.login}},[this._v("\n  "+this._s(this.$t("login_with"))+"\n  "),e("fa",{attrs:{icon:["fab","github"]}})],1):this._e()},[],!1,null,null,null);e.a=m.exports},35:function(t,e,r){"use strict";r.r(e);var o=r(0),n=r.n(o),s=r(14),i=r.n(s);function a(t,e,r,o,n,s,i){try{var a=t[s](i),c=a.value}catch(t){return void r(t)}a.done?e(c):Promise.resolve(c).then(o,n)}var c={components:{LoginWithGithub:r(213).a},middleware:"guest",metaInfo:function(){return{title:this.$t("register")}},data:function(){return{form:new i.a({name:"",email:"",password:"",password_confirmation:""}),mustVerifyEmail:!1}},methods:{register:function(){var t,e=(t=n.a.mark(function t(){var e,r,o,s;return n.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,this.form.post("/api/register");case 2:if(e=t.sent,!(r=e.data).status){t.next=8;break}this.mustVerifyEmail=!0,t.next=16;break;case 8:return t.next=10,this.form.post("/api/login");case 10:return o=t.sent,s=o.data.token,this.$store.dispatch("auth/saveToken",{token:s}),t.next=15,this.$store.dispatch("auth/updateUser",{user:r});case 15:this.$router.push({name:"home"});case 16:case"end":return t.stop()}},t,this)}),function(){var e=this,r=arguments;return new Promise(function(o,n){var s=t.apply(e,r);function i(t){a(s,o,n,i,c,"next",t)}function c(t){a(s,o,n,i,c,"throw",t)}i(void 0)})});return function(){return e.apply(this,arguments)}}()}},l=r(2),u=Object(l.a)(c,function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"row"},[r("div",{staticClass:"col-lg-8 m-auto"},[t.mustVerifyEmail?r("card",{attrs:{title:t.$t("register")}},[r("div",{staticClass:"alert alert-success",attrs:{role:"alert"}},[t._v("\n        "+t._s(t.$t("verify_email_address"))+"\n      ")])]):r("card",{attrs:{title:t.$t("register")}},[r("form",{on:{submit:function(e){return e.preventDefault(),t.register(e)},keydown:function(e){return t.form.onKeydown(e)}}},[r("div",{staticClass:"form-group row"},[r("label",{staticClass:"col-md-3 col-form-label text-md-right"},[t._v(t._s(t.$t("name")))]),t._v(" "),r("div",{staticClass:"col-md-7"},[r("input",{directives:[{name:"model",rawName:"v-model",value:t.form.name,expression:"form.name"}],staticClass:"form-control",class:{"is-invalid":t.form.errors.has("name")},attrs:{type:"text",name:"name"},domProps:{value:t.form.name},on:{input:function(e){e.target.composing||t.$set(t.form,"name",e.target.value)}}}),t._v(" "),r("has-error",{attrs:{form:t.form,field:"name"}})],1)]),t._v(" "),r("div",{staticClass:"form-group row"},[r("label",{staticClass:"col-md-3 col-form-label text-md-right"},[t._v(t._s(t.$t("email")))]),t._v(" "),r("div",{staticClass:"col-md-7"},[r("input",{directives:[{name:"model",rawName:"v-model",value:t.form.email,expression:"form.email"}],staticClass:"form-control",class:{"is-invalid":t.form.errors.has("email")},attrs:{type:"email",name:"email"},domProps:{value:t.form.email},on:{input:function(e){e.target.composing||t.$set(t.form,"email",e.target.value)}}}),t._v(" "),r("has-error",{attrs:{form:t.form,field:"email"}})],1)]),t._v(" "),r("div",{staticClass:"form-group row"},[r("label",{staticClass:"col-md-3 col-form-label text-md-right"},[t._v(t._s(t.$t("password")))]),t._v(" "),r("div",{staticClass:"col-md-7"},[r("input",{directives:[{name:"model",rawName:"v-model",value:t.form.password,expression:"form.password"}],staticClass:"form-control",class:{"is-invalid":t.form.errors.has("password")},attrs:{type:"password",name:"password"},domProps:{value:t.form.password},on:{input:function(e){e.target.composing||t.$set(t.form,"password",e.target.value)}}}),t._v(" "),r("has-error",{attrs:{form:t.form,field:"password"}})],1)]),t._v(" "),r("div",{staticClass:"form-group row"},[r("label",{staticClass:"col-md-3 col-form-label text-md-right"},[t._v(t._s(t.$t("confirm_password")))]),t._v(" "),r("div",{staticClass:"col-md-7"},[r("input",{directives:[{name:"model",rawName:"v-model",value:t.form.password_confirmation,expression:"form.password_confirmation"}],staticClass:"form-control",class:{"is-invalid":t.form.errors.has("password_confirmation")},attrs:{type:"password",name:"password_confirmation"},domProps:{value:t.form.password_confirmation},on:{input:function(e){e.target.composing||t.$set(t.form,"password_confirmation",e.target.value)}}}),t._v(" "),r("has-error",{attrs:{form:t.form,field:"password_confirmation"}})],1)]),t._v(" "),r("div",{staticClass:"form-group row"},[r("div",{staticClass:"col-md-7 offset-md-3 d-flex"},[r("v-button",{attrs:{loading:t.form.busy}},[t._v("\n              "+t._s(t.$t("register"))+"\n            ")]),t._v(" "),r("login-with-github")],1)])])])],1)])},[],!1,null,null,null);e.default=u.exports}}]);