// added this because Web Workers don't have a window object
// more about the stuff above here: https://stackoverflow.com/questions/11219775/global-variable-in-web-worker
// and here: https://developer.mozilla.org/en-US/docs/Web/API/DedicatedWorkerGlobalScope
var window = self;
console.log(window);

// TODO: make sure Window in ZebraJS build below is replaced with DedicatedWorkerGlobalScope
// TODO: make sure that: window.$=window.jQuery=f in the ZebraJS (at the end) build below is replaced with:
// /* ZebraJS - customized build with APIs used below in the jQuery("like") code */ window.$=f
!function(){"use strict";var s={},e=0,f=function(t,e,n){var o,r=[];if("string"==typeof t&&"body"===t.toLocaleLowerCase()&&(t=document.body),"string"==typeof t)if(0===t.indexOf("<")&&1<t.indexOf(">")&&2<t.length)(e=document.createElement("div")).innerHTML=t,r.push(e.firstChild);else if(e?"object"==typeof e&&e.version&&(e=e[0]):e=document,t.match(/^#[^s]+$/))r.push(e.querySelector(t));else if(n)try{r.push(e.querySelector(t))}catch(t){}else try{r=Array.prototype.slice.call(e.querySelectorAll(t))}catch(t){}else if("object"==typeof t&&(t instanceof Document||t instanceof DedicatedWorkerGlobalScope||t instanceof Element||t instanceof Text))r.push(t);else if(t instanceof NodeList)r=Array.prototype.slice.call(t);else if(Array.isArray(t))r=r.concat(t);else if("object"==typeof t&&t.version)return t;for(o in f.fn)r[o]=f.fn[o];return r};f.fn={version:"1.0.0"},f.fn.css=function(e,n){var o,r=["animationIterationCount","borderImageOutset","borderImageSlice","borderImageWidth","boxFlex","boxFlexGroup","boxOrdinalGroup","columnCount","columns","flex","flexGrow","flexPositive","flexShrink","flexNegative","flexOrder","gridRow","gridRowEnd","gridRowSpan","gridRowStart","gridColumn","gridColumnEnd","gridColumnSpan","gridColumnStart","fontWeight","lineClamp","lineHeight","opacity","order","orphans","tabSize","widows","zIndex","zoom","fillOpacity","floodOpacity","stopOpacity","strokeDasharray","strokeDashoffset","strokeMiterlimit","strokeOpacity","strokeWidth"];if("object"==typeof e)this.forEach(function(t){for(o in e)t.style[o]=e[o]+(parseFloat(e[o])===e[o]&&-1===r.indexOf(o)?"px":"")});else{if(void 0===n)return window.getComputedStyle(this[0])[e];this.forEach(function(t){t.style[e]=!1===n||null===n?null:n})}return this},f.fn.on=function(n,o,r,i){var e,a,c,t;if("object"!=typeof n)return e=n.split(" "),void 0===r&&(r=o),this.forEach(function(t){e.forEach(function(e){c=!1,a=e.split("."),n=a[0],a=a[1]||"",void 0===s[n]&&(s[n]=[]),"string"==typeof o?(c=function(t){i&&f(this).off(e,r),this!==t.target&&t.target.matches(o)&&r(t)},t.addEventListener(n,c)):i?(c=function(t){f(this).off(e,r),r(t)},t.addEventListener(n,c)):t.addEventListener(n,r),s[n].push([t,r,a,c])})}),this;for(t in n)this.on(t,n[t])},f.fn.ready=function(t){return"complete"===document.readyState||"loading"!==document.readyState?t():document.addEventListener("DOMContentLoaded",t),this},f.fn.remove=function(){return this.forEach(function(t){var e=f(t);Array.prototype.slice.call(t.querySelectorAll("*")).forEach(function(t){var e=f(t);e.off(),e=null}),e.off(),t.parentNode.removeChild(t),e=null}),this},f.fn.removeClass=function(t){return this._class("remove",t)},f.fn.toggleClass=function(t){return this._class("toggle",t)},f.fn.trigger=function(n,o){return this.forEach(function(t){var e=document.createEvent("HTMLEvents");e.initEvent(n,!0,!0),"object"==typeof o&&Object.keys(o).forEach(function(t){e[t]=o[t]}),t.dispatchEvent(e)}),this},f.fn.val=function(e){var n=[];return void 0===e?"select"===this[0].tagName.toLowerCase()&&this[0].multiple?(Array.prototype.slice.call(this[0].options).map(function(t){t.selected&&n.push(t.value)}),n):this[0].value:(this.forEach(function(t){Array.isArray(e)?"input"===t.tagName.toLowerCase()&&t.type&&("checkbox"===t.type||"radio"===t.type)&&t.value&&-1<e.indexOf(t.value)?t.checked=!0:"select"===t.tagName.toLowerCase()&&t.multiple&&Array.prototype.slice.call(t.options).map(function(t){-1<e.indexOf(t.value)&&(t.selected=!0)}):t.value=e}),this)},f.fn._class=function(n,t){return t=t.split(" "),this.forEach(function(e){t.forEach(function(t){e.classList["add"===n||"toggle"===n&&!e.classList.contains(t)?"add":"remove"](t)})}),this},Element.prototype.matches||(Element.prototype.matches=Element.prototype.matchesSelector||Element.prototype.mozMatchesSelector||Element.prototype.msMatchesSelector||Element.prototype.oMatchesSelector||Element.prototype.webkitMatchesSelector||function(t){for(var e=(this.document||this.ownerDocument).querySelectorAll(t),n=e.length;0<=--n&&e.item(n)!==this;);return-1<n}),window.$=f}();

console.log('>>>>>>>>>>>>>>>>>> amp-search-form Javascript file loaded!!! <<<<<<<<<<<<<<<<<<<<<<<<<<');

var searchFormTriggers = document.getElementsByClassName('search-form-trigger');
for (var i=0, len=searchFormTriggers.length|0; i<len; i=i+1|0) {
    searchFormTriggers[i].addEventListener('click', function (event) {
        var search = document.getElementsByClassName('search-form-wrapper'),
            navbar = document.getElementsByClassName('navbar');

        if (search[0].style.display == 'block') {
            search[0].style.display = 'none';
            navbar[0].style.marginBottom = '';
        } else {
            search[0].style.display = 'block';
            navbar[0].style.marginBottom = '3rem';
        }
    });
}
document.getElementsByClassName('navbar-toggler')[0].addEventListener('click', function (event) {
    var navbar = document.getElementById('collapse-nav');

    if (navbar.style.display == 'block') {
        navbar.style.display = 'none';
    } else {
        navbar.style.display = 'block';
    }
});

// /* Custom jQuery("like") code */
// $(document).ready(function() {
//     // Search button
//     $('.search-form-trigger').on('click', function (event) {
//         if ($('.search-form-wrapper').css('display') == 'block') {
//             $('.search-form-wrapper').css('display', 'none');
//             $('.navbar').css('marginBottom', false);
//         }
//         else {
//             $('.search-form-wrapper').css('display', 'block');
//             $('.navbar').css('marginBottom', '3rem');
//         }
//     });
//     // Navbar mobile button
//     $('.navbar-toggler').on('click', function (event) {
//         if ($('#collapse-nav').css('display') == 'block') {
//             $('#collapse-nav').css('display', 'none');
//         }
//         else {
//             $('#collapse-nav').css('display', 'block');
//         }
//     });
// });