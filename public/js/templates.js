define(['hogan'], function(Hogan) {
  var t = {
    'new' : new Hogan.Template(function(c,p,i){var _=this;_.b(i=i||"");_.b(_.v(_.f("name",c,p,0)));_.b(" test number 2");return _.fl();;}),
    'test' : new Hogan.Template(function(c,p,i){var _=this;_.b(i=i||"");_.b(_.v(_.f("name",c,p,0)));_.b(" says hello! ");_.b(_.v(_.f("name",c,p,0)));_.b(" is a pretty good guy.");return _.fl();;})
  },
  r = function(n) {
    var tn = t[n];
    return function(c, p, i) {
      return tn.render(c, p || t, i);
    };
  };
  return {
    'new' : r('new'),
    'test' : r('test')
  };
});
