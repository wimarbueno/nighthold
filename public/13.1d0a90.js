(window.webpackJsonp=window.webpackJsonp||[]).push([[13],{37:function(t,e,r){"use strict";r.r(e);var a=r(0),s=r.n(a),i=r(17),n=r.n(i);function o(t,e,r,a,s,i,n){try{var o=t[i](n),l=o.value}catch(t){return void r(t)}o.done?e(l):Promise.resolve(l).then(a,s)}var l,m,u={middleware:"guest",metaInfo:function(){return{title:this.$t("verify_email")}},data:function(){return{status:"",form:new n.a({email:""})}},created:function(){this.$route.query.email&&(this.form.email=this.$route.query.email)},methods:{send:(l=s.a.mark((function t(){var e,r;return s.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,this.form.post("/api/email/resend");case 2:e=t.sent,r=e.data,this.status=r.status,this.form.reset();case 6:case"end":return t.stop()}}),t,this)})),m=function(){var t=this,e=arguments;return new Promise((function(r,a){var s=l.apply(t,e);function i(t){o(s,r,a,i,n,"next",t)}function n(t){o(s,r,a,i,n,"throw",t)}i(void 0)}))},function(){return m.apply(this,arguments)})}},c=r(2),f=Object(c.a)(u,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"row"},[r("div",{staticClass:"col-lg-8 m-auto"},[r("card",{attrs:{title:t.$t("verify_email")}},[r("form",{on:{submit:function(e){return e.preventDefault(),t.send(e)},keydown:function(e){return t.form.onKeydown(e)}}},[r("alert-success",{attrs:{form:t.form,message:t.status}}),t._v(" "),r("div",{staticClass:"form-group row"},[r("label",{staticClass:"col-md-3 col-form-label text-md-right"},[t._v(t._s(t.$t("email")))]),t._v(" "),r("div",{staticClass:"col-md-7"},[r("input",{directives:[{name:"model",rawName:"v-model",value:t.form.email,expression:"form.email"}],staticClass:"form-control",class:{"is-invalid":t.form.errors.has("email")},attrs:{type:"email",name:"email"},domProps:{value:t.form.email},on:{input:function(e){e.target.composing||t.$set(t.form,"email",e.target.value)}}}),t._v(" "),r("has-error",{attrs:{form:t.form,field:"email"}})],1)]),t._v(" "),r("div",{staticClass:"form-group row"},[r("div",{staticClass:"col-md-9 ml-md-auto"},[r("v-button",{attrs:{loading:t.form.busy}},[t._v("\n              "+t._s(t.$t("send_verification_link"))+"\n            ")])],1)])],1)])],1)])}),[],!1,null,null,null);e.default=f.exports}}]);