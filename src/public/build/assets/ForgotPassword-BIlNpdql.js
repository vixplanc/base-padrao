import{T as u,o as m,f as c,s as i,q as a,p as s,Z as d,c as p,t as f,b as _,a as t,l as g,h as b,g as x}from"./app-BP3_VncP.js";import{_ as h}from"./GuestLayout-D4tKaABh.js";import{_ as y,a as k,b as v}from"./TextInput-CmrtA4pM.js";import{P as V}from"./PrimaryButton-DJyhs8Uw.js";import"./ApplicationLogo-BWoh0R1_.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const w=t("div",{class:"mb-4 text-sm text-gray-600"}," Esqueceu a sua senha? Não tem problema, informe seu email para enviarmos um link para resetar sua senha. ",-1),B={key:0,class:"mb-4 font-medium text-sm text-green-600"},N={class:"flex items-center justify-end mt-4"},T={__name:"ForgotPassword",props:{status:{type:String}},setup(o){const e=u({email:""}),l=()=>{e.post(route("password.email"))};return(P,r)=>(m(),c(h,null,{default:i(()=>[a(s(d),{title:"Forgot Password"}),w,o.status?(m(),p("div",B,f(o.status),1)):_("",!0),t("form",{onSubmit:x(l,["prevent"])},[t("div",null,[a(y,{for:"email",value:"Email"}),a(k,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":r[0]||(r[0]=n=>s(e).email=n),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),a(v,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),t("div",N,[a(V,{class:b({"opacity-25":s(e).processing}),disabled:s(e).processing},{default:i(()=>[g(" Link para resetar a senha. ")]),_:1},8,["class","disabled"])])],32)]),_:1}))}};export{T as default};
