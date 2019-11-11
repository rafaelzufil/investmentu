/**
 * ZebraJS (a truly modular, jQuery compatible, JavaScript micro-library for modern browsers)
 * https://stefangabos.github.io/zebrajs/
 *
 * IMPORTANT: custom minimal version needed for the jQuery "like" code below
 * The minified code was customized here: https://stefangabos.github.io/zebrajs/download/
 * and it only includes APIs used below, in the 'jQuery "like" code' section
 */
!function(){"use strict";var s={},e=0,f=function(t,e,n){var o,r=[];if("string"==typeof t&&"body"===t.toLocaleLowerCase()&&(t=document.body),"string"==typeof t)if(0===t.indexOf("<")&&1<t.indexOf(">")&&2<t.length)(e=document.createElement("div")).innerHTML=t,r.push(e.firstChild);else if(e?"object"==typeof e&&e.version&&(e=e[0]):e=document,t.match(/^#[^s]+$/))r.push(e.querySelector(t));else if(n)try{r.push(e.querySelector(t))}catch(t){}else try{r=Array.prototype.slice.call(e.querySelectorAll(t))}catch(t){}else if("object"==typeof t&&(t instanceof Document||t instanceof Window||t instanceof Element||t instanceof Text))r.push(t);else if(t instanceof NodeList)r=Array.prototype.slice.call(t);else if(Array.isArray(t))r=r.concat(t);else if("object"==typeof t&&t.version)return t;for(o in f.fn)r[o]=f.fn[o];return r};f.fn={version:"1.0.0"},f.fn.on=function(n,o,r,i){var e,a,c,t;if("object"!=typeof n)return e=n.split(" "),void 0===r&&(r=o),this.forEach(function(t){e.forEach(function(e){c=!1,a=e.split("."),n=a[0],a=a[1]||"",void 0===s[n]&&(s[n]=[]),"string"==typeof o?(c=function(t){i&&f(this).off(e,r),this!==t.target&&t.target.matches(o)&&r(t)},t.addEventListener(n,c)):i?(c=function(t){f(this).off(e,r),r(t)},t.addEventListener(n,c)):t.addEventListener(n,r),s[n].push([t,r,a,c])})}),this;for(t in n)this.on(t,n[t])},f.fn.ready=function(t){return"complete"===document.readyState||"loading"!==document.readyState?t():document.addEventListener("DOMContentLoaded",t),this},f.fn.removeClass=function(t){return this._class("remove",t)},f.fn.toggleClass=function(t){return this._class("toggle",t)},f.fn.trigger=function(n,o){return this.forEach(function(t){var e=document.createEvent("HTMLEvents");e.initEvent(n,!0,!0),"object"==typeof o&&Object.keys(o).forEach(function(t){e[t]=o[t]}),t.dispatchEvent(e)}),this},f.fn.val=function(e){var n=[];return void 0===e?"select"===this[0].tagName.toLowerCase()&&this[0].multiple?(Array.prototype.slice.call(this[0].options).map(function(t){t.selected&&n.push(t.value)}),n):this[0].value:(this.forEach(function(t){Array.isArray(e)?"input"===t.tagName.toLowerCase()&&t.type&&("checkbox"===t.type||"radio"===t.type)&&t.value&&-1<e.indexOf(t.value)?t.checked=!0:"select"===t.tagName.toLowerCase()&&t.multiple&&Array.prototype.slice.call(t.options).map(function(t){-1<e.indexOf(t.value)&&(t.selected=!0)}):t.value=e}),this)},f.fn._class=function(n,t){return t=t.split(" "),this.forEach(function(e){t.forEach(function(t){e.classList["add"===n||"toggle"===n&&!e.classList.contains(t)?"add":"remove"](t)})}),this},Element.prototype.matches||(Element.prototype.matches=Element.prototype.matchesSelector||Element.prototype.mozMatchesSelector||Element.prototype.msMatchesSelector||Element.prototype.oMatchesSelector||Element.prototype.webkitMatchesSelector||function(t){for(var e=(this.document||this.ownerDocument).querySelectorAll(t),n=e.length;0<=--n&&e.item(n)!==this;);return-1<n}),window.$=window.jQuery=f}();

/**
 * jQuery "like" code
 *
 * NOTE: this piece of code is mainly the same as in footer.php (for toggling the search form)
 * but it was customized a bit to make it work with zebra.js which is a lightweight library with the same
 * APIs as jQuery
 *
 * What changed below in comparison to what's in the same code in footer.php for non-AMP based pages:
 *
 * - calls like $(<something>).click(function() {...}) was changed to $(<something>).on('click', funcion() {...})
 * - calls like $(<something>).keypress(function() {...}) was changed to $(<something>).on('keypress', funcion() {...})
 * - calls like $(<something>).focus() was changed to $(<something>).trigger('focus')
 * - added some 'return false' lines for 'click' events (was not present in the original code, but should be there too probably)
 *
 * All these changes mainly done due to the ZebraJS limitations ( no support for click() / focus() / keypress() )
 */
$(document).ready(function() {
    $('[data-toggle=search-form]').on('click', function () {
        $('.navbar').toggleClass('mb-5');
        $('.search-form-wrapper').toggleClass('open');
        $('.search-form-wrapper .search').trigger('focus');
        $('html').toggleClass('search-form-open');
        return false;
    });

    $('[data-toggle=search-form-close]').on('click', function () {
        $('.search-form-wrapper').removeClass('open');
        $('html').removeClass('search-form-open');
        return false;
    });

    $('.search-form-wrapper .search').on('keypress', function (event) {
        if ($(this).val() == "Search") $(this).val("");
    });

    $('.search-close').on('click', function () {
        $('.search-form-wrapper').removeClass('open');
        $('html').removeClass('search-form-open');
        return false;
    });
});