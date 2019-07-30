// JavaScript Document
var revive = {
  getCookie: function(name) {
    return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(name).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;
  },
  setCookie: function(name, value, days) {
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days * 86400000));
      var expires = "; expires=" + date.toGMTString();
    } else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
  },
  display: function(zone_id) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = revive.generateCode(zone_id);
    document.getElementById( 'revive-' + zone_id).appendChild(script);
  },
  generateCode: function(zone_id) {
    //var m3_u = (location.protocol == 'https:' ? 'https://ads.web.oxfordclub.com/www/delivery/ajs.php' : '//ads.web.oxfordclub.com/www/delivery/ajs.php');
    var m3_u = 'https://ads.web.oxfordclub.com/www/delivery/ajs.php';
    var m3_r = Math.floor(Math.random() * 99999999999);
    var html = '';
    if (!document.MAX_used) document.MAX_used = ',';
    //html += "<scr" + "ipt type='text/javascript' src='" + m3_u;
    html += m3_u;
    html += "?zoneid=" + zone_id + "&amp;target=_blank&amp;block=1";
    if (typeof author != 'undefined') html += "&amp;author=" + author;
    if (typeof category != 'undefined') html += "&amp;cat=" + category;
    if (typeof tag != 'undefined') html += "&amp;tag=" + tag;
    html += "&amp;signup=" + revive.getCookie('signup');
    html += '&amp;referral_source=' + revive.getCookie("referral_source");
    if (typeof pubcodes != 'undefined' && pubcodes != "") html += "&amp;pubcodes=" + pubcodes;
    html += '&amp;cb=' + m3_r;
    if (document.MAX_used != ',') html += "&amp;exclude=" + document.MAX_used;
    html += (document.charset ? '&amp;charset=' + document.charset : (document.characterSet ? '&amp;charset=' + document.characterSet : ''));
    html += "&amp;loc=" + escape(window.location);
    if (document.referrer) html += "&amp;referer=" + escape(document.referrer);
    if (document.context) html += "&context=" + escape(document.context);
    if (document.mmm_fo) html += "&amp;mmm_fo=1";
    //html += "'><\/scr" + "ipt>";
    return html;
  },
  hasSignedUp: function() {
    return revive.getCookie('signup') !== null;
  }
}
