"use strict";

jQuery(function ($) {
  /*
  * jQuery appear plugin
  *
  * Copyright (c) 2012 Andrey Sidorov
  * licensed under MIT license.
  *
  * https://github.com/morr/jquery.appear/
  *
  * Version: 0.3.6
  */
  (function ($) {
    var selectors = [];
    var check_binded = false;
    var check_lock = false;
    var defaults = {
      interval: 250,
      force_process: false
    };
    var $window = $(window);
    var $prior_appeared = [];

    function process() {
      check_lock = false;

      for (var index = 0, selectorsLength = selectors.length; index < selectorsLength; index++) {
        var $appeared = $(selectors[index]).filter(function () {
          return $(this).is(':appeared');
        });
        $appeared.trigger('appear', [$appeared]);

        if ($prior_appeared[index]) {
          var $disappeared = $prior_appeared[index].not($appeared);
          $disappeared.trigger('disappear', [$disappeared]);
        }

        $prior_appeared[index] = $appeared;
      }
    }

    ;

    function add_selector(selector) {
      selectors.push(selector);
      $prior_appeared.push();
    } // "appeared" custom filter


    $.expr[':']['appeared'] = function (element) {
      var $element = $(element);

      if (!$element.is(':visible')) {
        return false;
      }

      var window_left = $window.scrollLeft();
      var window_top = $window.scrollTop();
      var offset = $element.offset();
      var left = offset.left;
      var top = offset.top;

      if (top + $element.height() >= window_top && top - ($element.data('appear-top-offset') || 0) <= window_top + $window.height() && left + $element.width() >= window_left && left - ($element.data('appear-left-offset') || 0) <= window_left + $window.width()) {
        return true;
      } else {
        return false;
      }
    };

    $.fn.extend({
      // watching for element's appearance in browser viewport
      appear: function appear(options) {
        var opts = $.extend({}, defaults, options || {});
        var selector = this.selector || this;

        if (!check_binded) {
          var on_check = function on_check() {
            if (check_lock) {
              return;
            }

            check_lock = true;
            setTimeout(process, opts.interval);
          };

          $(window).scroll(on_check).resize(on_check);
          check_binded = true;
        }

        if (opts.force_process) {
          setTimeout(process, opts.interval);
        }

        add_selector(selector);
        return $(selector);
      }
    });
    $.extend({
      // force elements's appearance check
      force_appear: function force_appear() {
        if (check_binded) {
          process();
          return true;
        }

        return false;
      }
    });
  })(function () {
    if (typeof module !== 'undefined') {
      // Node
      return require('jquery');
    } else {
      return jQuery;
    }
  }());
});
"use strict";

/*! skrollr 0.6.30 (2015-06-19) | Alexander Prinzhorn - https://github.com/Prinzhorn/skrollr | Free to use under terms of MIT license */
!function (a, b, c) {
  "use strict";

  function d(c) {
    if (e = b.documentElement, f = b.body, T(), ha = this, c = c || {}, ma = c.constants || {}, c.easing) for (var d in c.easing) {
      W[d] = c.easing[d];
    }
    ta = c.edgeStrategy || "set", ka = {
      beforerender: c.beforerender,
      render: c.render,
      keyframe: c.keyframe
    }, la = c.forceHeight !== !1, la && (Ka = c.scale || 1), na = c.mobileDeceleration || y, pa = c.smoothScrolling !== !1, qa = c.smoothScrollingDuration || A, ra = {
      targetTop: ha.getScrollTop()
    }, Sa = (c.mobileCheck || function () {
      return /Android|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent || navigator.vendor || a.opera);
    })(), Sa ? (ja = b.getElementById(c.skrollrBody || z), ja && ga(), X(), Ea(e, [s, v], [t])) : Ea(e, [s, u], [t]), ha.refresh(), wa(a, "resize orientationchange", function () {
      var a = e.clientWidth,
          b = e.clientHeight;
      (b !== Pa || a !== Oa) && (Pa = b, Oa = a, Qa = !0);
    });
    var g = U();
    return function h() {
      $(), va = g(h);
    }(), ha;
  }

  var e,
      f,
      g = {
    get: function get() {
      return ha;
    },
    init: function init(a) {
      return ha || new d(a);
    },
    VERSION: "0.6.29"
  },
      h = Object.prototype.hasOwnProperty,
      i = a.Math,
      j = a.getComputedStyle,
      k = "touchstart",
      l = "touchmove",
      m = "touchcancel",
      n = "touchend",
      o = "skrollable",
      p = o + "-before",
      q = o + "-between",
      r = o + "-after",
      s = "skrollr",
      t = "no-" + s,
      u = s + "-desktop",
      v = s + "-mobile",
      w = "linear",
      x = 1e3,
      y = .004,
      z = "skrollr-body",
      A = 200,
      B = "start",
      C = "end",
      D = "center",
      E = "bottom",
      F = "___skrollable_id",
      G = /^(?:input|textarea|button|select)$/i,
      H = /^\s+|\s+$/g,
      I = /^data(?:-(_\w+))?(?:-?(-?\d*\.?\d+p?))?(?:-?(start|end|top|center|bottom))?(?:-?(top|center|bottom))?$/,
      J = /\s*(@?[\w\-\[\]]+)\s*:\s*(.+?)\s*(?:;|$)/gi,
      K = /^(@?[a-z\-]+)\[(\w+)\]$/,
      L = /-([a-z0-9_])/g,
      M = function M(a, b) {
    return b.toUpperCase();
  },
      N = /[\-+]?[\d]*\.?[\d]+/g,
      O = /\{\?\}/g,
      P = /rgba?\(\s*-?\d+\s*,\s*-?\d+\s*,\s*-?\d+/g,
      Q = /[a-z\-]+-gradient/g,
      R = "",
      S = "",
      T = function T() {
    var a = /^(?:O|Moz|webkit|ms)|(?:-(?:o|moz|webkit|ms)-)/;

    if (j) {
      var b = j(f, null);

      for (var c in b) {
        if (R = c.match(a) || +c == c && b[c].match(a)) break;
      }

      if (!R) return void (R = S = "");
      R = R[0], "-" === R.slice(0, 1) ? (S = R, R = {
        "-webkit-": "webkit",
        "-moz-": "Moz",
        "-ms-": "ms",
        "-o-": "O"
      }[R]) : S = "-" + R.toLowerCase() + "-";
    }
  },
      U = function U() {
    var b = a.requestAnimationFrame || a[R.toLowerCase() + "RequestAnimationFrame"],
        c = Ha();
    return (Sa || !b) && (b = function b(_b) {
      var d = Ha() - c,
          e = i.max(0, 1e3 / 60 - d);
      return a.setTimeout(function () {
        c = Ha(), _b();
      }, e);
    }), b;
  },
      V = function V() {
    var b = a.cancelAnimationFrame || a[R.toLowerCase() + "CancelAnimationFrame"];
    return (Sa || !b) && (b = function b(_b2) {
      return a.clearTimeout(_b2);
    }), b;
  },
      W = {
    begin: function begin() {
      return 0;
    },
    end: function end() {
      return 1;
    },
    linear: function linear(a) {
      return a;
    },
    quadratic: function quadratic(a) {
      return a * a;
    },
    cubic: function cubic(a) {
      return a * a * a;
    },
    swing: function swing(a) {
      return -i.cos(a * i.PI) / 2 + .5;
    },
    sqrt: function sqrt(a) {
      return i.sqrt(a);
    },
    outCubic: function outCubic(a) {
      return i.pow(a - 1, 3) + 1;
    },
    bounce: function bounce(a) {
      var b;
      if (.5083 >= a) b = 3;else if (.8489 >= a) b = 9;else if (.96208 >= a) b = 27;else {
        if (!(.99981 >= a)) return 1;
        b = 91;
      }
      return 1 - i.abs(3 * i.cos(a * b * 1.028) / b);
    }
  };

  d.prototype.refresh = function (a) {
    var d,
        e,
        f = !1;

    for (a === c ? (f = !0, ia = [], Ra = 0, a = b.getElementsByTagName("*")) : a.length === c && (a = [a]), d = 0, e = a.length; e > d; d++) {
      var g = a[d],
          h = g,
          i = [],
          j = pa,
          k = ta,
          l = !1;

      if (f && F in g && delete g[F], g.attributes) {
        for (var m = 0, n = g.attributes.length; n > m; m++) {
          var p = g.attributes[m];
          if ("data-anchor-target" !== p.name) {
            if ("data-smooth-scrolling" !== p.name) {
              if ("data-edge-strategy" !== p.name) {
                if ("data-emit-events" !== p.name) {
                  var q = p.name.match(I);

                  if (null !== q) {
                    var r = {
                      props: p.value,
                      element: g,
                      eventType: p.name.replace(L, M)
                    };
                    i.push(r);
                    var s = q[1];
                    s && (r.constant = s.substr(1));
                    var t = q[2];
                    /p$/.test(t) ? (r.isPercentage = !0, r.offset = (0 | t.slice(0, -1)) / 100) : r.offset = 0 | t;
                    var u = q[3],
                        v = q[4] || u;
                    u && u !== B && u !== C ? (r.mode = "relative", r.anchors = [u, v]) : (r.mode = "absolute", u === C ? r.isEnd = !0 : r.isPercentage || (r.offset = r.offset * Ka));
                  }
                } else l = !0;
              } else k = p.value;
            } else j = "off" !== p.value;
          } else if (h = b.querySelector(p.value), null === h) throw 'Unable to find anchor target "' + p.value + '"';
        }

        if (i.length) {
          var w, x, y;
          !f && F in g ? (y = g[F], w = ia[y].styleAttr, x = ia[y].classAttr) : (y = g[F] = Ra++, w = g.style.cssText, x = Da(g)), ia[y] = {
            element: g,
            styleAttr: w,
            classAttr: x,
            anchorTarget: h,
            keyFrames: i,
            smoothScrolling: j,
            edgeStrategy: k,
            emitEvents: l,
            lastFrameIndex: -1
          }, Ea(g, [o], []);
        }
      }
    }

    for (Aa(), d = 0, e = a.length; e > d; d++) {
      var z = ia[a[d][F]];
      z !== c && (_(z), ba(z));
    }

    return ha;
  }, d.prototype.relativeToAbsolute = function (a, b, c) {
    var d = e.clientHeight,
        f = a.getBoundingClientRect(),
        g = f.top,
        h = f.bottom - f.top;
    return b === E ? g -= d : b === D && (g -= d / 2), c === E ? g += h : c === D && (g += h / 2), g += ha.getScrollTop(), g + .5 | 0;
  }, d.prototype.animateTo = function (a, b) {
    b = b || {};
    var d = Ha(),
        e = ha.getScrollTop(),
        f = b.duration === c ? x : b.duration;
    return oa = {
      startTop: e,
      topDiff: a - e,
      targetTop: a,
      duration: f,
      startTime: d,
      endTime: d + f,
      easing: W[b.easing || w],
      done: b.done
    }, oa.topDiff || (oa.done && oa.done.call(ha, !1), oa = c), ha;
  }, d.prototype.stopAnimateTo = function () {
    oa && oa.done && oa.done.call(ha, !0), oa = c;
  }, d.prototype.isAnimatingTo = function () {
    return !!oa;
  }, d.prototype.isMobile = function () {
    return Sa;
  }, d.prototype.setScrollTop = function (b, c) {
    return sa = c === !0, Sa ? Ta = i.min(i.max(b, 0), Ja) : a.scrollTo(0, b), ha;
  }, d.prototype.getScrollTop = function () {
    return Sa ? Ta : a.pageYOffset || e.scrollTop || f.scrollTop || 0;
  }, d.prototype.getMaxScrollTop = function () {
    return Ja;
  }, d.prototype.on = function (a, b) {
    return ka[a] = b, ha;
  }, d.prototype.off = function (a) {
    return delete ka[a], ha;
  }, d.prototype.destroy = function () {
    var a = V();
    a(va), ya(), Ea(e, [t], [s, u, v]);

    for (var b = 0, d = ia.length; d > b; b++) {
      fa(ia[b].element);
    }

    e.style.overflow = f.style.overflow = "", e.style.height = f.style.height = "", ja && g.setStyle(ja, "transform", "none"), ha = c, ja = c, ka = c, la = c, Ja = 0, Ka = 1, ma = c, na = c, La = "down", Ma = -1, Oa = 0, Pa = 0, Qa = !1, oa = c, pa = c, qa = c, ra = c, sa = c, Ra = 0, ta = c, Sa = !1, Ta = 0, ua = c;
  };

  var X = function X() {
    var d, g, h, j, o, p, q, r, s, t, u, v;
    wa(e, [k, l, m, n].join(" "), function (a) {
      var e = a.changedTouches[0];

      for (j = a.target; 3 === j.nodeType;) {
        j = j.parentNode;
      }

      switch (o = e.clientY, p = e.clientX, t = a.timeStamp, G.test(j.tagName) || a.preventDefault(), a.type) {
        case k:
          d && d.blur(), ha.stopAnimateTo(), d = j, g = q = o, h = p, s = t;
          break;

        case l:
          G.test(j.tagName) && b.activeElement !== j && a.preventDefault(), r = o - q, v = t - u, ha.setScrollTop(Ta - r, !0), q = o, u = t;
          break;

        default:
        case m:
        case n:
          var f = g - o,
              w = h - p,
              x = w * w + f * f;

          if (49 > x) {
            if (!G.test(d.tagName)) {
              d.focus();
              var y = b.createEvent("MouseEvents");
              y.initMouseEvent("click", !0, !0, a.view, 1, e.screenX, e.screenY, e.clientX, e.clientY, a.ctrlKey, a.altKey, a.shiftKey, a.metaKey, 0, null), d.dispatchEvent(y);
            }

            return;
          }

          d = c;
          var z = r / v;
          z = i.max(i.min(z, 3), -3);
          var A = i.abs(z / na),
              B = z * A + .5 * na * A * A,
              C = ha.getScrollTop() - B,
              D = 0;
          C > Ja ? (D = (Ja - C) / B, C = Ja) : 0 > C && (D = -C / B, C = 0), A *= 1 - D, ha.animateTo(C + .5 | 0, {
            easing: "outCubic",
            duration: A
          });
      }
    }), a.scrollTo(0, 0), e.style.overflow = f.style.overflow = "hidden";
  },
      Y = function Y() {
    var a,
        b,
        c,
        d,
        f,
        g,
        h,
        j,
        k,
        l,
        m,
        n = e.clientHeight,
        o = Ba();

    for (j = 0, k = ia.length; k > j; j++) {
      for (a = ia[j], b = a.element, c = a.anchorTarget, d = a.keyFrames, f = 0, g = d.length; g > f; f++) {
        h = d[f], l = h.offset, m = o[h.constant] || 0, h.frame = l, h.isPercentage && (l *= n, h.frame = l), "relative" === h.mode && (fa(b), h.frame = ha.relativeToAbsolute(c, h.anchors[0], h.anchors[1]) - l, fa(b, !0)), h.frame += m, la && !h.isEnd && h.frame > Ja && (Ja = h.frame);
      }
    }

    for (Ja = i.max(Ja, Ca()), j = 0, k = ia.length; k > j; j++) {
      for (a = ia[j], d = a.keyFrames, f = 0, g = d.length; g > f; f++) {
        h = d[f], m = o[h.constant] || 0, h.isEnd && (h.frame = Ja - h.offset + m);
      }

      a.keyFrames.sort(Ia);
    }
  },
      Z = function Z(a, b) {
    for (var c = 0, d = ia.length; d > c; c++) {
      var e,
          f,
          i = ia[c],
          j = i.element,
          k = i.smoothScrolling ? a : b,
          l = i.keyFrames,
          m = l.length,
          n = l[0],
          s = l[l.length - 1],
          t = k < n.frame,
          u = k > s.frame,
          v = t ? n : s,
          w = i.emitEvents,
          x = i.lastFrameIndex;

      if (t || u) {
        if (t && -1 === i.edge || u && 1 === i.edge) continue;

        switch (t ? (Ea(j, [p], [r, q]), w && x > -1 && (za(j, n.eventType, La), i.lastFrameIndex = -1)) : (Ea(j, [r], [p, q]), w && m > x && (za(j, s.eventType, La), i.lastFrameIndex = m)), i.edge = t ? -1 : 1, i.edgeStrategy) {
          case "reset":
            fa(j);
            continue;

          case "ease":
            k = v.frame;
            break;

          default:
          case "set":
            var y = v.props;

            for (e in y) {
              h.call(y, e) && (f = ea(y[e].value), 0 === e.indexOf("@") ? j.setAttribute(e.substr(1), f) : g.setStyle(j, e, f));
            }

            continue;
        }
      } else 0 !== i.edge && (Ea(j, [o, q], [p, r]), i.edge = 0);

      for (var z = 0; m - 1 > z; z++) {
        if (k >= l[z].frame && k <= l[z + 1].frame) {
          var A = l[z],
              B = l[z + 1];

          for (e in A.props) {
            if (h.call(A.props, e)) {
              var C = (k - A.frame) / (B.frame - A.frame);
              C = A.props[e].easing(C), f = da(A.props[e].value, B.props[e].value, C), f = ea(f), 0 === e.indexOf("@") ? j.setAttribute(e.substr(1), f) : g.setStyle(j, e, f);
            }
          }

          w && x !== z && ("down" === La ? za(j, A.eventType, La) : za(j, B.eventType, La), i.lastFrameIndex = z);
          break;
        }
      }
    }
  },
      $ = function $() {
    Qa && (Qa = !1, Aa());
    var a,
        b,
        d = ha.getScrollTop(),
        e = Ha();
    if (oa) e >= oa.endTime ? (d = oa.targetTop, a = oa.done, oa = c) : (b = oa.easing((e - oa.startTime) / oa.duration), d = oa.startTop + b * oa.topDiff | 0), ha.setScrollTop(d, !0);else if (!sa) {
      var f = ra.targetTop - d;
      f && (ra = {
        startTop: Ma,
        topDiff: d - Ma,
        targetTop: d,
        startTime: Na,
        endTime: Na + qa
      }), e <= ra.endTime && (b = W.sqrt((e - ra.startTime) / qa), d = ra.startTop + b * ra.topDiff | 0);
    }

    if (sa || Ma !== d) {
      La = d > Ma ? "down" : Ma > d ? "up" : La, sa = !1;
      var h = {
        curTop: d,
        lastTop: Ma,
        maxTop: Ja,
        direction: La
      },
          i = ka.beforerender && ka.beforerender.call(ha, h);
      i !== !1 && (Z(d, ha.getScrollTop()), Sa && ja && g.setStyle(ja, "transform", "translate(0, " + -Ta + "px) " + ua), Ma = d, ka.render && ka.render.call(ha, h)), a && a.call(ha, !1);
    }

    Na = e;
  },
      _ = function _(a) {
    for (var b = 0, c = a.keyFrames.length; c > b; b++) {
      for (var d, e, f, g, h = a.keyFrames[b], i = {}; null !== (g = J.exec(h.props));) {
        f = g[1], e = g[2], d = f.match(K), null !== d ? (f = d[1], d = d[2]) : d = w, e = e.indexOf("!") ? aa(e) : [e.slice(1)], i[f] = {
          value: e,
          easing: W[d]
        };
      }

      h.props = i;
    }
  },
      aa = function aa(a) {
    var b = [];
    return P.lastIndex = 0, a = a.replace(P, function (a) {
      return a.replace(N, function (a) {
        return a / 255 * 100 + "%";
      });
    }), S && (Q.lastIndex = 0, a = a.replace(Q, function (a) {
      return S + a;
    })), a = a.replace(N, function (a) {
      return b.push(+a), "{?}";
    }), b.unshift(a), b;
  },
      ba = function ba(a) {
    var b,
        c,
        d = {};

    for (b = 0, c = a.keyFrames.length; c > b; b++) {
      ca(a.keyFrames[b], d);
    }

    for (d = {}, b = a.keyFrames.length - 1; b >= 0; b--) {
      ca(a.keyFrames[b], d);
    }
  },
      ca = function ca(a, b) {
    var c;

    for (c in b) {
      h.call(a.props, c) || (a.props[c] = b[c]);
    }

    for (c in a.props) {
      b[c] = a.props[c];
    }
  },
      da = function da(a, b, c) {
    var d,
        e = a.length;
    if (e !== b.length) throw "Can't interpolate between \"" + a[0] + '" and "' + b[0] + '"';
    var f = [a[0]];

    for (d = 1; e > d; d++) {
      f[d] = a[d] + (b[d] - a[d]) * c;
    }

    return f;
  },
      ea = function ea(a) {
    var b = 1;
    return O.lastIndex = 0, a[0].replace(O, function () {
      return a[b++];
    });
  },
      fa = function fa(a, b) {
    a = [].concat(a);

    for (var c, d, e = 0, f = a.length; f > e; e++) {
      d = a[e], c = ia[d[F]], c && (b ? (d.style.cssText = c.dirtyStyleAttr, Ea(d, c.dirtyClassAttr)) : (c.dirtyStyleAttr = d.style.cssText, c.dirtyClassAttr = Da(d), d.style.cssText = c.styleAttr, Ea(d, c.classAttr)));
    }
  },
      ga = function ga() {
    ua = "translateZ(0)", g.setStyle(ja, "transform", ua);
    var a = j(ja),
        b = a.getPropertyValue("transform"),
        c = a.getPropertyValue(S + "transform"),
        d = b && "none" !== b || c && "none" !== c;
    d || (ua = "");
  };

  g.setStyle = function (a, b, c) {
    var d = a.style;
    if (b = b.replace(L, M).replace("-", ""), "zIndex" === b) isNaN(c) ? d[b] = c : d[b] = "" + (0 | c);else if ("float" === b) d.styleFloat = d.cssFloat = c;else try {
      R && (d[R + b.slice(0, 1).toUpperCase() + b.slice(1)] = c), d[b] = c;
    } catch (e) {}
  };

  var ha,
      ia,
      ja,
      ka,
      la,
      ma,
      na,
      oa,
      pa,
      qa,
      ra,
      sa,
      ta,
      ua,
      va,
      wa = g.addEvent = function (b, c, d) {
    var e = function e(b) {
      return b = b || a.event, b.target || (b.target = b.srcElement), b.preventDefault || (b.preventDefault = function () {
        b.returnValue = !1, b.defaultPrevented = !0;
      }), d.call(this, b);
    };

    c = c.split(" ");

    for (var f, g = 0, h = c.length; h > g; g++) {
      f = c[g], b.addEventListener ? b.addEventListener(f, d, !1) : b.attachEvent("on" + f, e), Ua.push({
        element: b,
        name: f,
        listener: d
      });
    }
  },
      xa = g.removeEvent = function (a, b, c) {
    b = b.split(" ");

    for (var d = 0, e = b.length; e > d; d++) {
      a.removeEventListener ? a.removeEventListener(b[d], c, !1) : a.detachEvent("on" + b[d], c);
    }
  },
      ya = function ya() {
    for (var a, b = 0, c = Ua.length; c > b; b++) {
      a = Ua[b], xa(a.element, a.name, a.listener);
    }

    Ua = [];
  },
      za = function za(a, b, c) {
    ka.keyframe && ka.keyframe.call(ha, a, b, c);
  },
      Aa = function Aa() {
    var a = ha.getScrollTop();
    Ja = 0, la && !Sa && (f.style.height = ""), Y(), la && !Sa && (f.style.height = Ja + e.clientHeight + "px"), Sa ? ha.setScrollTop(i.min(ha.getScrollTop(), Ja)) : ha.setScrollTop(a, !0), sa = !0;
  },
      Ba = function Ba() {
    var a,
        b,
        c = e.clientHeight,
        d = {};

    for (a in ma) {
      b = ma[a], "function" == typeof b ? b = b.call(ha) : /p$/.test(b) && (b = b.slice(0, -1) / 100 * c), d[a] = b;
    }

    return d;
  },
      Ca = function Ca() {
    var a,
        b = 0;
    return ja && (b = i.max(ja.offsetHeight, ja.scrollHeight)), a = i.max(b, f.scrollHeight, f.offsetHeight, e.scrollHeight, e.offsetHeight, e.clientHeight), a - e.clientHeight;
  },
      Da = function Da(b) {
    var c = "className";
    return a.SVGElement && b instanceof a.SVGElement && (b = b[c], c = "baseVal"), b[c];
  },
      Ea = function Ea(b, d, e) {
    var f = "className";
    if (a.SVGElement && b instanceof a.SVGElement && (b = b[f], f = "baseVal"), e === c) return void (b[f] = d);

    for (var g = b[f], h = 0, i = e.length; i > h; h++) {
      g = Ga(g).replace(Ga(e[h]), " ");
    }

    g = Fa(g);

    for (var j = 0, k = d.length; k > j; j++) {
      -1 === Ga(g).indexOf(Ga(d[j])) && (g += " " + d[j]);
    }

    b[f] = Fa(g);
  },
      Fa = function Fa(a) {
    return a.replace(H, "");
  },
      Ga = function Ga(a) {
    return " " + a + " ";
  },
      Ha = Date.now || function () {
    return +new Date();
  },
      Ia = function Ia(a, b) {
    return a.frame - b.frame;
  },
      Ja = 0,
      Ka = 1,
      La = "down",
      Ma = -1,
      Na = Ha(),
      Oa = 0,
      Pa = 0,
      Qa = !1,
      Ra = 0,
      Sa = !1,
      Ta = 0,
      Ua = [];

  "function" == typeof define && define.amd ? define([], function () {
    return g;
  }) : "undefined" != typeof module && module.exports ? module.exports = g : a.skrollr = g;
}(window, document);
'use strict';

function _typeof2(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof2 = function _typeof2(obj) { return typeof obj; }; } else { _typeof2 = function _typeof2(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof2(obj); }

var _typeof = typeof Symbol === "function" && _typeof2(Symbol.iterator) === "symbol" ? function (obj) {
  return _typeof2(obj);
} : function (obj) {
  return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : _typeof2(obj);
};

(function (factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define(['jquery'], factory);
  } else if ((typeof module === 'undefined' ? 'undefined' : _typeof(module)) === 'object' && module.exports) {
    // Node/CommonJS
    module.exports = function (root, jQuery) {
      if (jQuery === undefined) {
        // require('jQuery') returns a factory that requires window to
        // build a jQuery instance, we normalize how we use modules
        // that require this pattern but the window provided is a noop
        // if it's defined (how jquery works)
        if (typeof window !== 'undefined') {
          jQuery = require('jquery');
        } else {
          jQuery = require('jquery')(root);
        }
      }

      factory(jQuery);
      return jQuery;
    };
  } else {
    // Browser globals
    factory(jQuery);
  }
})(function ($) {
  $.fn.tilt = function (options) {
    /**
     * RequestAnimationFrame
     */
    var requestTick = function requestTick() {
      if (this.ticking) return;
      requestAnimationFrame(updateTransforms.bind(this));
      this.ticking = true;
    };
    /**
     * Bind mouse movement evens on instance
     */


    var bindEvents = function bindEvents() {
      var _this = this;

      $(this).on('mousemove', mouseMove);
      $(this).on('mouseenter', mouseEnter);
      if (this.settings.reset) $(this).on('mouseleave', mouseLeave);
      if (this.settings.glare) $(window).on('resize', updateGlareSize.bind(_this));
    };
    /**
     * Set transition only on mouse leave and mouse enter so it doesn't influence mouse move transforms
     */


    var setTransition = function setTransition() {
      var _this2 = this;

      if (this.timeout !== undefined) clearTimeout(this.timeout);
      $(this).css({
        'transition': this.settings.speed + 'ms ' + this.settings.easing
      });
      if (this.settings.glare) this.glareElement.css({
        'transition': 'opacity ' + this.settings.speed + 'ms ' + this.settings.easing
      });
      this.timeout = setTimeout(function () {
        $(_this2).css({
          'transition': ''
        });
        if (_this2.settings.glare) _this2.glareElement.css({
          'transition': ''
        });
      }, this.settings.speed);
    };
    /**
     * When user mouse enters tilt element
     */


    var mouseEnter = function mouseEnter(event) {
      this.ticking = false;
      $(this).css({
        'will-change': 'transform'
      });
      setTransition.call(this); // Trigger change event

      $(this).trigger("tilt.mouseEnter");
    };
    /**
     * Return the x,y position of the mouse on the tilt element
     * @returns {{x: *, y: *}}
     */


    var getMousePositions = function getMousePositions(event) {
      if (typeof event === "undefined") {
        event = {
          pageX: $(this).offset().left + $(this).outerWidth() / 2,
          pageY: $(this).offset().top + $(this).outerHeight() / 2
        };
      }

      return {
        x: event.pageX,
        y: event.pageY
      };
    };
    /**
     * When user mouse moves over the tilt element
     */


    var mouseMove = function mouseMove(event) {
      this.mousePositions = getMousePositions(event);
      requestTick.call(this);
    };
    /**
     * When user mouse leaves tilt element
     */


    var mouseLeave = function mouseLeave() {
      setTransition.call(this);
      this.reset = true;
      requestTick.call(this); // Trigger change event

      $(this).trigger("tilt.mouseLeave");
    };
    /**
     * Get tilt values
     *
     * @returns {{x: tilt value, y: tilt value}}
     */


    var getValues = function getValues() {
      var width = $(this).outerWidth();
      var height = $(this).outerHeight();
      var left = $(this).offset().left;
      var top = $(this).offset().top;
      var percentageX = (this.mousePositions.x - left) / width;
      var percentageY = (this.mousePositions.y - top) / height; // x or y position inside instance / width of instance = percentage of position inside instance * the max tilt value

      var tiltX = (this.settings.maxTilt / 2 - percentageX * this.settings.maxTilt).toFixed(2);
      var tiltY = (percentageY * this.settings.maxTilt - this.settings.maxTilt / 2).toFixed(2); // angle

      var angle = Math.atan2(this.mousePositions.x - (left + width / 2), -(this.mousePositions.y - (top + height / 2))) * (180 / Math.PI); // Return x & y tilt values

      return {
        tiltX: tiltX,
        tiltY: tiltY,
        'percentageX': percentageX * 100,
        'percentageY': percentageY * 100,
        angle: angle
      };
    };
    /**
     * Update tilt transforms on mousemove
     */


    var updateTransforms = function updateTransforms() {
      this.transforms = getValues.call(this);

      if (this.reset) {
        this.reset = false;
        $(this).css('transform', 'perspective(' + this.settings.perspective + 'px) rotateX(0deg) rotateY(0deg)'); // Rotate glare if enabled

        if (this.settings.glare) {
          this.glareElement.css('transform', 'rotate(180deg) translate(-50%, -50%)');
          this.glareElement.css('opacity', '0');
        }

        return;
      } else {
        $(this).css('transform', 'perspective(' + this.settings.perspective + 'px) rotateX(' + (this.settings.disableAxis === 'x' ? 0 : this.transforms.tiltY) + 'deg) rotateY(' + (this.settings.disableAxis === 'y' ? 0 : this.transforms.tiltX) + 'deg) scale3d(' + this.settings.scale + ',' + this.settings.scale + ',' + this.settings.scale + ')'); // Rotate glare if enabled

        if (this.settings.glare) {
          this.glareElement.css('transform', 'rotate(' + this.transforms.angle + 'deg) translate(-50%, -50%)');
          this.glareElement.css('opacity', '' + this.transforms.percentageY * this.settings.maxGlare / 100);
        }
      } // Trigger change event


      $(this).trigger("change", [this.transforms]);
      this.ticking = false;
    };
    /**
     * Prepare elements
     */


    var prepareGlare = function prepareGlare() {
      var glarePrerender = this.settings.glarePrerender; // If option pre-render is enabled we assume all html/css is present for an optimal glare effect.

      if (!glarePrerender) // Create glare element
        $(this).append('<div class="js-tilt-glare"><div class="js-tilt-glare-inner"></div></div>'); // Store glare selector if glare is enabled

      this.glareElementWrapper = $(this).find(".js-tilt-glare");
      this.glareElement = $(this).find(".js-tilt-glare-inner"); // Remember? We assume all css is already set, so just return

      if (glarePrerender) return; // Abstracted re-usable glare styles

      var stretch = {
        'position': 'absolute',
        'top': '0',
        'left': '0',
        'width': '100%',
        'height': '100%'
      }; // Style glare wrapper

      this.glareElementWrapper.css(stretch).css({
        'overflow': 'hidden',
        'pointer-events': 'none'
      }); // Style glare element

      this.glareElement.css({
        'position': 'absolute',
        'top': '50%',
        'left': '50%',
        'background-image': 'linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%)',
        'width': '' + $(this).outerWidth() * 2,
        'height': '' + $(this).outerWidth() * 2,
        'transform': 'rotate(180deg) translate(-50%, -50%)',
        'transform-origin': '0% 0%',
        'opacity': '0'
      });
    };
    /**
     * Update glare on resize
     */


    var updateGlareSize = function updateGlareSize() {
      this.glareElement.css({
        'width': '' + $(this).outerWidth() * 2,
        'height': '' + $(this).outerWidth() * 2
      });
    };
    /**
     * Public methods
     */


    $.fn.tilt.destroy = function () {
      $(this).each(function () {
        $(this).find('.js-tilt-glare').remove();
        $(this).css({
          'will-change': '',
          'transform': ''
        });
        $(this).off('mousemove mouseenter mouseleave');
      });
    };

    $.fn.tilt.getValues = function () {
      var results = [];
      $(this).each(function () {
        this.mousePositions = getMousePositions.call(this);
        results.push(getValues.call(this));
      });
      return results;
    };

    $.fn.tilt.reset = function () {
      $(this).each(function () {
        var _this3 = this;

        this.mousePositions = getMousePositions.call(this);
        this.settings = $(this).data('settings');
        mouseLeave.call(this);
        setTimeout(function () {
          _this3.reset = false;
        }, this.settings.transition);
      });
    };
    /**
     * Loop every instance
     */


    return this.each(function () {
      var _this4 = this;
      /**
       * Default settings merged with user settings
       * Can be set trough data attributes or as parameter.
       * @type {*}
       */


      this.settings = $.extend({
        maxTilt: $(this).is('[data-tilt-max]') ? $(this).data('tilt-max') : 20,
        perspective: $(this).is('[data-tilt-perspective]') ? $(this).data('tilt-perspective') : 300,
        easing: $(this).is('[data-tilt-easing]') ? $(this).data('tilt-easing') : 'cubic-bezier(.03,.98,.52,.99)',
        scale: $(this).is('[data-tilt-scale]') ? $(this).data('tilt-scale') : '1',
        speed: $(this).is('[data-tilt-speed]') ? $(this).data('tilt-speed') : '400',
        transition: $(this).is('[data-tilt-transition]') ? $(this).data('tilt-transition') : true,
        disableAxis: $(this).is('[data-tilt-disable-axis]') ? $(this).data('tilt-disable-axis') : null,
        axis: $(this).is('[data-tilt-axis]') ? $(this).data('tilt-axis') : null,
        reset: $(this).is('[data-tilt-reset]') ? $(this).data('tilt-reset') : true,
        glare: $(this).is('[data-tilt-glare]') ? $(this).data('tilt-glare') : false,
        maxGlare: $(this).is('[data-tilt-maxglare]') ? $(this).data('tilt-maxglare') : 1
      }, options); // Add deprecation warning & set disableAxis to deprecated axis setting

      if (this.settings.axis !== null) {
        console.warn('Tilt.js: the axis setting has been renamed to disableAxis. See https://github.com/gijsroge/tilt.js/pull/26 for more information');
        this.settings.disableAxis = this.settings.axis;
      }

      this.init = function () {
        // Store settings
        $(_this4).data('settings', _this4.settings); // Prepare element

        if (_this4.settings.glare) prepareGlare.call(_this4); // Bind events

        bindEvents.call(_this4);
      }; // Init


      this.init();
    });
  };
  /**
   * Auto load
   */


  $('[data-tilt]').tilt();
  return true;
});