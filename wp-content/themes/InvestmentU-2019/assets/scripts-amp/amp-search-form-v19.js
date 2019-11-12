var window = self; // added this because Web Workers don't have a window object
// more about the stuff above here: https://stackoverflow.com/questions/11219775/global-variable-in-web-worker
// and here: https://developer.mozilla.org/en-US/docs/Web/API/DedicatedWorkerGlobalScope

console.log(window);

/* ZebraJS - customized build with APIs used below in the jQuery("like") code */
!function(){"use strict";var s={},e=0,f=function(t,e,n){var o,r=[];if("string"==typeof t&&"body"===t.toLocaleLowerCase()&&(t=document.body),"string"==typeof t)if(0===t.indexOf("<")&&1<t.indexOf(">")&&2<t.length)(e=document.createElement("div")).innerHTML=t,r.push(e.firstChild);else if(e?"object"==typeof e&&e.version&&(e=e[0]):e=document,t.match(/^#[^s]+$/))r.push(e.querySelector(t));else if(n)try{r.push(e.querySelector(t))}catch(t){}else try{r=Array.prototype.slice.call(e.querySelectorAll(t))}catch(t){}else if("object"==typeof t&&(t instanceof Document||t instanceof DedicatedWorkerGlobalScope||t instanceof Element||t instanceof Text))r.push(t);else if(t instanceof NodeList)r=Array.prototype.slice.call(t);else if(Array.isArray(t))r=r.concat(t);else if("object"==typeof t&&t.version)return t;for(o in f.fn)r[o]=f.fn[o];return r};f.fn={version:"1.0.0"},f.fn.on=function(n,o,r,i){var e,a,c,t;if("object"!=typeof n)return e=n.split(" "),void 0===r&&(r=o),this.forEach(function(t){e.forEach(function(e){c=!1,a=e.split("."),n=a[0],a=a[1]||"",void 0===s[n]&&(s[n]=[]),"string"==typeof o?(c=function(t){i&&f(this).off(e,r),this!==t.target&&t.target.matches(o)&&r(t)},t.addEventListener(n,c)):i?(c=function(t){f(this).off(e,r),r(t)},t.addEventListener(n,c)):t.addEventListener(n,r),s[n].push([t,r,a,c])})}),this;for(t in n)this.on(t,n[t])},f.fn.ready=function(t){return"complete"===document.readyState||"loading"!==document.readyState?t():document.addEventListener("DOMContentLoaded",t),this},f.fn.remove=function(){return this.forEach(function(t){var e=f(t);Array.prototype.slice.call(t.querySelectorAll("*")).forEach(function(t){var e=f(t);e.off(),e=null}),e.off(),t.parentNode.removeChild(t),e=null}),this},f.fn.removeClass=function(t){return this._class("remove",t)},f.fn.toggleClass=function(t){return this._class("toggle",t)},f.fn.trigger=function(n,o){return this.forEach(function(t){var e=document.createEvent("HTMLEvents");e.initEvent(n,!0,!0),"object"==typeof o&&Object.keys(o).forEach(function(t){e[t]=o[t]}),t.dispatchEvent(e)}),this},f.fn.val=function(e){var n=[];return void 0===e?"select"===this[0].tagName.toLowerCase()&&this[0].multiple?(Array.prototype.slice.call(this[0].options).map(function(t){t.selected&&n.push(t.value)}),n):this[0].value:(this.forEach(function(t){Array.isArray(e)?"input"===t.tagName.toLowerCase()&&t.type&&("checkbox"===t.type||"radio"===t.type)&&t.value&&-1<e.indexOf(t.value)?t.checked=!0:"select"===t.tagName.toLowerCase()&&t.multiple&&Array.prototype.slice.call(t.options).map(function(t){-1<e.indexOf(t.value)&&(t.selected=!0)}):t.value=e}),this)},f.fn._class=function(n,t){return t=t.split(" "),this.forEach(function(e){t.forEach(function(t){e.classList["add"===n||"toggle"===n&&!e.classList.contains(t)?"add":"remove"](t)})}),this},Element.prototype.matches||(Element.prototype.matches=Element.prototype.matchesSelector||Element.prototype.mozMatchesSelector||Element.prototype.msMatchesSelector||Element.prototype.oMatchesSelector||Element.prototype.webkitMatchesSelector||function(t){for(var e=(this.document||this.ownerDocument).querySelectorAll(t),n=e.length;0<=--n&&e.item(n)!==this;);return-1<n}),window.$=f}();

console.log('>>>>>>>>>>>>>>>>>> amp-search-form Javascript file loaded!!! <<<<<<<<<<<<<<<<<<<<<<<<<<');

document.getElementById('navbar').addEventListener('click', function () {
    var search = document.getElementsByClassName('search-form-wrapper');
    if (search[0].style.display == 'block') {
        search[0].style.display = 'none';
    }
    else {
        search[0].style.display = 'block';
    }
});

// /* Just a simply test to check if ZebraJS works at all */
// $('amp-img#logo').remove();

// /* Custom jQuery("like") code */
// $(document).ready(function() {
//     $('.search-form-trigger').on('click', function () {
//         $('.navbar').toggleClass('mb-5');
//         $('.search-form-wrapper').toggleClass('open');
//         $('.search-form-wrapper .search').trigger('focus');
//         $('html').toggleClass('search-form-open');
//     });

// // $('[data-toggle=search-form-close]').on('click', function () {
// //     $('.search-form-wrapper').removeClass('open');
// //     $('html').removeClass('search-form-open');
// // });

//     $('.search-form-wrapper .search').on('keypress', function (event) {
//         if ($(this).val() == "Search") $(this).val("");
//     });

//     $('.search-close').on('click', function () {
//         $('.search-form-wrapper').removeClass('open');
//         $('html').removeClass('search-form-open');
//     });
// });