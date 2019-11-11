/**
 * ZebraJS (a truly modular, jQuery compatible, JavaScript micro-library for modern browsers)
 * https://stefangabos.github.io/zebrajs/
 *
 * IMPORTANT: custom minimal version needed for the jQuery "like" code below
 * The minified code was customized here: https://stefangabos.github.io/zebrajs/download/
 * and it only includes APIs used below, in the 'jQuery "like" code' section
 */
!function(){"use strict";var s={},e=0,f=function(t,e,n){var o,r=[];if("string"==typeof t&&"body"===t.toLocaleLowerCase()&&(t=document.body),"string"==typeof t)if(0===t.indexOf("<")&&1<t.indexOf(">")&&2<t.length)(e=document.createElement("div")).innerHTML=t,r.push(e.firstChild);else if(e?"object"==typeof e&&e.version&&(e=e[0]):e=document,t.match(/^#[^s]+$/))r.push(e.querySelector(t));else if(n)try{r.push(e.querySelector(t))}catch(t){}else try{r=Array.prototype.slice.call(e.querySelectorAll(t))}catch(t){}else if("object"==typeof t&&(t instanceof Document||t instanceof Window||t instanceof Element||t instanceof Text))r.push(t);else if(t instanceof NodeList)r=Array.prototype.slice.call(t);else if(Array.isArray(t))r=r.concat(t);else if("object"==typeof t&&t.version)return t;for(o in f.fn)r[o]=f.fn[o];return r};f.fn={version:"1.0.0"},f.fn.addClass=function(t){return this._class("add",t)},f.fn.attr=function(n,e){if("object"==typeof n)this.forEach(function(t){for(var e in n)t.setAttribute(e,n[e])});else if("string"==typeof n){if(void 0===e)return this[0].getAttribute(n);this.forEach(function(t){!1===e||null===e?t.removeAttribute(n):t.setAttribute(n,e)})}return this},f.fn.clone=function(r,t){var e=[],i=this;return this.forEach(function(n){var o=n.cloneNode(!0);e.push(o),r&&Object.keys(s).forEach(function(e){s[e].forEach(function(t){r&&t[0]===n&&(f(o).on(e+(t[2]?"."+t[2]:""),t[1]),n.zjs&&o.zjs.data&&(o.zjs={},o.zjs.data=n.zjs.data))})}),t&&i._clone_data_and_events(n,o)}),f(e)},f.fn.closest=function(e){var n=[];return this[0].matches(e)?this:(this.forEach(function(t){for(;!((t=t.parentNode)instanceof Document);)if(t.matches(e)){-1===n.indexOf(t)&&n.push(t);break}}),f(n))},f.fn.data=function(n,o){if(void 0!==n)return n=n.replace(/-([a-z])/gi,function(){return arguments[1].toUpperCase()}).replace(/-/g,""),void 0!==o?(this.forEach(function(t){t.dataset[n]="object"==typeof o?JSON.stringify(o):o}),this):(this.some(function(e){if(void 0!==e.dataset[n]){try{o=JSON.parse(e.dataset[n])}catch(t){o=e.dataset[n]}return!0}}),o)},f.fn.detach=function(){var n=[];return this.forEach(function(t){var e=f(t);n=n.concat(e.clone(!0,!0)),e.remove()}),f(n)},f.fn.eq=function(t){return f(this.get(t))},f.fn.find=function(t){var n=[];return this.forEach(function(e){"object"==typeof t&&t.version?t.forEach(function(t){t.isSameNode(e)&&n.push(e)}):"object"==typeof t&&(t instanceof Document||t instanceof Element||t instanceof Window)?t.isSameNode(e)&&n.push(e):n.push(e.querySelector(t))}),n=n.filter(function(t){return null!==t}),f(n)},f.fn.first=function(){return f(this[0])},f.fn.get=function(t){return this[t]},f.fn.hasClass=function(t){for(var e=0;e<this.length;e++)if(this[e].classList.contains(t))return!0;return!1},f.fn.html=function(e){return e?(this.forEach(function(t){t.innerHTML=e}),this):this[0].innerHTML},f.fn.is=function(e){var n=!1;return this.forEach(function(t){if("string"==typeof e&&t.matches(e)||"object"==typeof e&&e.version&&t===e[0]||"object"==typeof e&&(e instanceof Document||e instanceof Element||e instanceof Text||e instanceof Window)&&t===e)return!(n=!0)}),n},f.fn.off=function(t,r){var i,e=t?t.split(" "):Object.keys(s),a=!t;return this.forEach(function(o){e.forEach(function(n){n=(i=n.split("."))[0],i=i[1]||"",void 0!==s[n]&&s[n].forEach(function(t,e){if(t[0]===o&&(void 0===r||r===t[1])&&(a||i===t[2]))return o.removeEventListener(n,t[3]||t[1]),s[n].splice(e,1),void(0===s[n].length&&delete s[n])})})}),this},f.fn.offset=function(){var t=this[0].getBoundingClientRect();return{left:t.left+window.pageXOffset-document.documentElement.clientLeft,top:t.top+window.pageYOffset-document.documentElement.clientTop}},f.fn.on=function(n,o,r,i){var e,a,c,t;if("object"!=typeof n)return e=n.split(" "),void 0===r&&(r=o),this.forEach(function(t){e.forEach(function(e){c=!1,a=e.split("."),n=a[0],a=a[1]||"",void 0===s[n]&&(s[n]=[]),"string"==typeof o?(c=function(t){i&&f(this).off(e,r),this!==t.target&&t.target.matches(o)&&r(t)},t.addEventListener(n,c)):i?(c=function(t){f(this).off(e,r),r(t)},t.addEventListener(n,c)):t.addEventListener(n,r),s[n].push([t,r,a,c])})}),this;for(t in n)this.on(t,n[t])},f.fn.one=function(t,e,n){this.on(t,e,n,!0)},f.fn.outerHeight=function(t){var e=window.getComputedStyle(this[0]);return parseFloat(e.height)+(t?parseFloat(e.marginTop)+parseFloat(e.marginBottom):0)||0},f.fn.outerWidth=function(t){var e=window.getComputedStyle(this[0]);return parseFloat(e.width)+(t?parseFloat(e.marginLeft)+parseFloat(e.marginRight):0)||0},f.fn.parent=function(e){var n=[];return this.forEach(function(t){e&&!t.parentNode.matches(e)||n.push(t.parentNode)}),f(n)},f.fn.parents=function(e){var n=[];return this.forEach(function(t){for(;!((t=t.parentNode)instanceof Document||(-1===n.indexOf(t)&&n.push(t),e&&t.matches(e))););}),f(n)},f.fn.ready=function(t){return"complete"===document.readyState||"loading"!==document.readyState?t():document.addEventListener("DOMContentLoaded",t),this},f.fn.remove=function(){return this.forEach(function(t){var e=f(t);Array.prototype.slice.call(t.querySelectorAll("*")).forEach(function(t){var e=f(t);e.off(),e=null}),e.off(),t.parentNode.removeChild(t),e=null}),this},f.fn.removeClass=function(t){return this._class("remove",t)},f.fn.serialize=function(){var t=this[0],n=[];return"object"==typeof t&&"FORM"===t.nodeName&&Array.prototype.slice.call(t.elements).forEach(function(e){e.name&&!e.disabled&&-1===["file","reset","submit","button"].indexOf(e.type)&&("select-multiple"===e.type?Array.prototype.slice.call(e.options).forEach(function(t){t.selected&&n.push(encodeURIComponent(e.name)+"="+encodeURIComponent(t.value))}):(-1===["checkbox","radio"].indexOf(e.type)||e.checked)&&n.push(encodeURIComponent(e.name)+"="+encodeURIComponent(e.value)))}),n.join("&").replace(/%20/g,"+")},f.fn.text=function(e){return e?(this.forEach(function(t){t.textContent=e}),this):this[0].textContent},f.fn.toggleClass=function(t){return this._class("toggle",t)},f.fn.trigger=function(n,o){return this.forEach(function(t){var e=document.createEvent("HTMLEvents");e.initEvent(n,!0,!0),"object"==typeof o&&Object.keys(o).forEach(function(t){e[t]=o[t]}),t.dispatchEvent(e)}),this},f.fn.val=function(e){var n=[];return void 0===e?"select"===this[0].tagName.toLowerCase()&&this[0].multiple?(Array.prototype.slice.call(this[0].options).map(function(t){t.selected&&n.push(t.value)}),n):this[0].value:(this.forEach(function(t){Array.isArray(e)?"input"===t.tagName.toLowerCase()&&t.type&&("checkbox"===t.type||"radio"===t.type)&&t.value&&-1<e.indexOf(t.value)?t.checked=!0:"select"===t.tagName.toLowerCase()&&t.multiple&&Array.prototype.slice.call(t.options).map(function(t){-1<e.indexOf(t.value)&&(t.selected=!0)}):t.value=e}),this)},f.fn._class=function(n,t){return t=t.split(" "),this.forEach(function(e){t.forEach(function(t){e.classList["add"===n||"toggle"===n&&!e.classList.contains(t)?"add":"remove"](t)})}),this},f.fn._clone_data_and_events=function(t,e){var n=Array.prototype.slice.call(t.children),r=Array.prototype.slice.call(e.children),i=this;n&&n.length&&n.forEach(function(n,o){Object.keys(s).forEach(function(e){s[e].forEach(function(t){t[0]===n&&(f(r[o]).on(e+(t[2]?"."+t[2]:""),t[1]),n.zjs&&n.zjs.data&&(r[o].zjs={},r[o].zjs.data=n.zjs.data))})}),i._clone_data_and_events(n,r[o])})},f.fn._dom_search=function(t,n){var o,r,i,a=[],c=this;return this.forEach(function(e){o=!1,n&&(null===(r="children"===t?e:e.parentNode).getAttribute("id")&&r.setAttribute("id",c._random("id")),o=!0),"siblings"===t?a=a.concat(Array.prototype.filter.call(n?e.parentNode.querySelectorAll("#"+e.parentNode.id+">"+n):e.parentNode.children,function(t){return t!==e})):"children"===t?a=a.concat(Array.prototype.slice.call(n?e.parentNode.querySelectorAll("#"+e.id+">"+n):e.children)):"previous"!==t&&"next"!==t||(i=e[("next"===t?"next":"previous")+"ElementSibling"],n&&!f(i).is(n)||(a=a.concat([i]))),o&&r.removeAttribute("id")}),f(a)},f.each=function(t,e){for(var n=0;n<this.length;n++)if(!1===e.call(this[n],n,this[n]))return},f.each=function(t,e){for(var n=0;n<this.length;n++)if(!1===e.call(this[n],n,this[n]))return},f.extend=function(t){var e,n,o;if(Object.assign)return Object.assign.apply(null,[t].concat(Array.prototype.slice.call(arguments,1)));try{o=Object(t)}catch(t){throw new TypeError("Cannot convert undefined or null to object")}for(e=1;e<arguments.length;e++)if("object"==typeof arguments[e])for(n in arguments[e])Object.prototype.hasOwnProperty.call(arguments[e],n)&&(o[n]=arguments[e][n]);return o},f.inArray=function(t,e){return e.indexOf(t)},Element.prototype.matches||(Element.prototype.matches=Element.prototype.matchesSelector||Element.prototype.mozMatchesSelector||Element.prototype.msMatchesSelector||Element.prototype.oMatchesSelector||Element.prototype.webkitMatchesSelector||function(t){for(var e=(this.document||this.ownerDocument).querySelectorAll(t),n=e.length;0<=--n&&e.item(n)!==this;);return-1<n}),window.$=window.jQuery=f}();

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