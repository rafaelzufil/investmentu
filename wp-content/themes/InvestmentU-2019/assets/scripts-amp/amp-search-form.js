!function(){"use strict";var e={},t=function(e,o,n){var r,s=[];if("string"==typeof e&&"body"===e.toLocaleLowerCase()&&(e=document.body),"string"==typeof e)if(0===e.indexOf("<")&&1<e.indexOf(">")&&2<e.length)(o=document.createElement("div")).innerHTML=e,s.push(o.firstChild);else if(o?"object"==typeof o&&o.version&&(o=o[0]):o=document,e.match(/^#[^s]+$/))s.push(o.querySelector(e));else if(n)try{s.push(o.querySelector(e))}catch(e){}else try{s=Array.prototype.slice.call(o.querySelectorAll(e))}catch(e){}else if("object"==typeof e&&(e instanceof Document||e instanceof Window||e instanceof Element||e instanceof Text))s.push(e);else if(e instanceof NodeList)s=Array.prototype.slice.call(e);else if(Array.isArray(e))s=s.concat(e);else if("object"==typeof e&&e.version)return e;for(r in t.fn)s[r]=t.fn[r];return s};t.fn={version:"1.0.0"},t.fn.on=function(o,n,r,s){var c,a,i,l;if("object"!=typeof o)return c=o.split(" "),void 0===r&&(r=n),this.forEach(function(l){c.forEach(function(c){i=!1,a=c.split("."),o=a[0],a=a[1]||"",void 0===e[o]&&(e[o]=[]),"string"==typeof n?(i=function(e){s&&t(this).off(c,r),this!==e.target&&e.target.matches(n)&&r(e)},l.addEventListener(o,i)):s?(i=function(e){t(this).off(c,r),r(e)},l.addEventListener(o,i)):l.addEventListener(o,r),e[o].push([l,r,a,i])})}),this;for(l in o)this.on(l,o[l])},t.fn.ready=function(e){return"complete"===document.readyState||"loading"!==document.readyState?e():document.addEventListener("DOMContentLoaded",e),this},t.fn.removeClass=function(e){return this._class("remove",e)},t.fn.toggleClass=function(e){return this._class("toggle",e)},t.fn.trigger=function(e,t){return this.forEach(function(o){var n=document.createEvent("HTMLEvents");n.initEvent(e,!0,!0),"object"==typeof t&&Object.keys(t).forEach(function(e){n[e]=t[e]}),o.dispatchEvent(n)}),this},t.fn.val=function(e){var t=[];return void 0===e?"select"===this[0].tagName.toLowerCase()&&this[0].multiple?(Array.prototype.slice.call(this[0].options).map(function(e){e.selected&&t.push(e.value)}),t):this[0].value:(this.forEach(function(t){Array.isArray(e)?"input"===t.tagName.toLowerCase()&&t.type&&("checkbox"===t.type||"radio"===t.type)&&t.value&&-1<e.indexOf(t.value)?t.checked=!0:"select"===t.tagName.toLowerCase()&&t.multiple&&Array.prototype.slice.call(t.options).map(function(t){-1<e.indexOf(t.value)&&(t.selected=!0)}):t.value=e}),this)},t.fn._class=function(e,t){return t=t.split(" "),this.forEach(function(o){t.forEach(function(t){o.classList["add"===e||"toggle"===e&&!o.classList.contains(t)?"add":"remove"](t)})}),this},Element.prototype.matches||(Element.prototype.matches=Element.prototype.matchesSelector||Element.prototype.mozMatchesSelector||Element.prototype.msMatchesSelector||Element.prototype.oMatchesSelector||Element.prototype.webkitMatchesSelector||function(e){for(var t=(this.document||this.ownerDocument).querySelectorAll(e),o=t.length;0<=--o&&t.item(o)!==this;);return-1<o}),window.$=window.jQuery=t}(),$(document).ready(function(){$("[data-toggle=search-form]").on("click",function(){$(".navbar").toggleClass("mb-5"),$(".search-form-wrapper").toggleClass("open"),$(".search-form-wrapper .search").trigger("focus"),$("html").toggleClass("search-form-open")}),$("[data-toggle=search-form-close]").on("click",function(){$(".search-form-wrapper").removeClass("open"),$("html").removeClass("search-form-open")}),$(".search-form-wrapper .search").on("keypress",function(e){"Search"==$(this).val()&&$(this).val("")}),$(".search-close").on("click",function(){$(".search-form-wrapper").removeClass("open"),$("html").removeClass("search-form-open")})});