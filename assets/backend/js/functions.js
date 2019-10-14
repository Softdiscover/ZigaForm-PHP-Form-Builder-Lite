$uifm(document).ready(function ($) {

$.fn.removeCss = function() {
  var removedCss = $.makeArray(arguments);
  return this.each(function() {
    var e$ = $(this);
    var style = e$.attr('style');
    if (typeof style !== 'string') return;
    style = $.trim(style);
    var styles = style.split(/;+/);
    var sl = styles.length;
    for (var l = removedCss.length, i = 0; i < l; i++) {
      var r = removedCss[i];
      if (!r) continue;
      for (var j = 0; j < sl;) {
        var sp = $.trim(styles[j]);
        if (!sp || (sp.indexOf(r) === 0 && $.trim(sp.substring(r.length)).indexOf(':') === 0)) {
          styles.splice(j, 1);
          sl--;
        } else {
          j++;
        }
      }
    }
    if (styles.length === 0) {
      e$.removeAttr('style');
    } else {
      e$.attr('style', styles.join(';'));
    }
  });
};

});