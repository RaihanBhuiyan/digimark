window.requestAnimFrame = (function () {
    return (
        window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimationFrame ||
        function (a) {
            window.setTimeout(a, 20);
        }
    );
})();
function detect_old_ie() {
    if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
        var a = new Number(RegExp.$1);
        if (a >= 9) {
            return false;
        } else {
            if (a >= 8) {
                return true;
            } else {
                if (a >= 7) {
                    return true;
                } else {
                    if (a >= 6) {
                        return true;
                    } else {
                        if (a >= 5) {
                            return true;
                        }
                    }
                }
            }
        }
    } else {
        return false;
    }
}
(function (b) {
    b.fn.xon = b.fn.on || b.fn.bind;
    b.fn.xoff = b.fn.off || b.fn.bind;
    function a(ay, aH) {
        this.xzoom = true;
        var F = this;
        var N;
        var aE = {};
        var ae, al, ab, ak, ad, aj, an, S, aG, y, ap, aa, Y;
        var az,
            o,
            Q,
            U,
            T,
            ac,
            p = new Array();
        var G = new Array(),
            aD = 0,
            z = 0;
        var J, R, l, k;
        var ar,
            aC,
            ax,
            av,
            P,
            n,
            aM,
            aK,
            aB,
            aA,
            X,
            V,
            aq,
            am = 0;
        var h, ai;
        var aL,
            C = 0,
            A = 0,
            ah = 0,
            af = 0,
            s = 0,
            r = 0,
            au = 0,
            at = 0,
            I = 0,
            H = 0;
        var E = detect_old_ie(),
            B = /MSIE (\d+\.\d+);/.test(navigator.userAgent),
            Z,
            W;
        var L,
            j = "",
            K,
            w;
        var aJ, f, m, q, g, i, ao, d, t;
        this.adaptive = function () {
            if (m == 0 || q == 0) {
                ay.css("width", "");
                ay.css("height", "");
                m = ay.width();
                q = ay.height();
            }
            aI();
            aJ = b(window).width();
            f = b(window).height();
            g = ay.width();
            i = ay.height();
            var u = false;
            if (m > aJ || q > f) {
                u = true;
            }
            if (g > m) {
                g = m;
            }
            if (i > q) {
                i = q;
            }
            if (u) {
                ay.width("100%");
            } else {
                if (m != 0) {
                    ay.width(m);
                }
            }
            if (ao != "fullscreen") {
                if (aF()) {
                    F.options.position = ao;
                } else {
                    F.options.position = F.options.mposition;
                }
            }
            if (!F.options.lensReverse) {
                d = F.options.adaptiveReverse && F.options.position == F.options.mposition;
            }
        };
        function aw() {
            var aN = document.documentElement;
            var v = (window.pageXOffset || aN.scrollLeft) - (aN.clientLeft || 0);
            var u = (window.pageYOffset || aN.scrollTop) - (aN.clientTop || 0);
            return { left: v, top: u };
        }
        function aF() {
            var u = ay.offset();
            if (F.options.zoomWidth == "auto") {
                ab = g;
            } else {
                ab = F.options.zoomWidth;
            }
            if (F.options.zoomHeight == "auto") {
                ak = i;
            } else {
                ak = F.options.zoomHeight;
            }
            if (F.options.position.substr(0, 1) == "#") {
                aE = b(F.options.position);
            } else {
                aE.length = 0;
            }
            if (aE.length != 0) {
                return true;
            }
            switch (ao) {
                case "lens":
                case "inside":
                    return true;
                    break;
                case "top":
                    aj = u.top;
                    an = u.left;
                    S = aj - i;
                    aG = an;
                    break;
                case "left":
                    aj = u.top;
                    an = u.left;
                    S = aj;
                    aG = an - g;
                    break;
                case "bottom":
                    aj = u.top;
                    an = u.left;
                    S = aj + i;
                    aG = an;
                    break;
                case "right":
                default:
                    aj = u.top;
                    an = u.left;
                    S = aj;
                    aG = an + g;
            }
            if (aG + ab > aJ || aG < 0) {
                return false;
            }
            return true;
        }
        this.xscroll = function (v) {
            aa = v.pageX || v.originalEvent.pageX;
            Y = v.pageY || v.originalEvent.pageY;
            v.preventDefault();
            if (v.xscale) {
                am = v.xscale;
                M(aa, Y);
            } else {
                var aO = -v.originalEvent.detail || v.originalEvent.wheelDelta || v.xdelta;
                var u = aa;
                var aN = Y;
                if (E) {
                    u = Z;
                    aN = W;
                }
                if (aO > 0) {
                    aO = -0.05;
                } else {
                    aO = 0.05;
                }
                am += aO;
                M(u, aN);
            }
        };
        function x() {
            if (F.options.lensShape == "circle" && F.options.position == "lens") {
                ar = aC = Math.max(ar, aC);
                var u = (ar + Math.max(n, P) * 2) / 2;
                l.css({ "-moz-border-radius": u, "-webkit-border-radius": u, "border-radius": u });
            }
        }
        function D(u, aO, aN, v) {
            if (F.options.position == "lens") {
                R.css({ top: -(aO - aj) * aA + aC / 2, left: -(u - an) * aB + ar / 2 });
                if (F.options.bg) {
                    l.css({ "background-image": "url(" + R.attr("src") + ")", "background-repeat": "no-repeat", "background-position": -(u - an) * aB + ar / 2 + "px " + (-(aO - aj) * aA + aC / 2) + "px" });
                    if (aN && v) {
                        l.css({ "background-size": aN + "px " + v + "px" });
                    }
                }
            } else {
                R.css({ top: -av * aA, left: -ax * aB });
            }
        }
        function M(u, aP) {
            if (am < -1) {
                am = -1;
            }
            if (am > 1) {
                am = 1;
            }
            if (X < V) {
                var aO = X - (X - 1) * am;
                var v = ab * aO;
                var aN = v / aq;
            } else {
                var aO = V - (V - 1) * am;
                var aN = ak * aO;
                var v = aN * aq;
            }
            if (t && aL) {
                C = u;
                A = aP;
                ah = v;
                af = aN;
            } else {
                if (!aL) {
                    s = ah = v;
                    r = af = aN;
                }
                aB = v / ae;
                aA = aN / al;
                ar = ab / aB;
                aC = ak / aA;
                x();
                e(u, aP);
                R.width(v);
                R.height(aN);
                l.width(ar);
                l.height(aC);
                l.css({ top: av - n, left: ax - P });
                k.css({ top: -av, left: -ax });
                D(u, aP, v, aN);
            }
        }
        function c() {
            var u = au;
            var aQ = at;
            var v = I;
            var aN = H;
            var aP = s;
            var aO = r;
            u += (C - u) / F.options.smoothLensMove;
            aQ += (A - aQ) / F.options.smoothLensMove;
            v += (C - v) / F.options.smoothZoomMove;
            aN += (A - aN) / F.options.smoothZoomMove;
            aP += (ah - aP) / F.options.smoothScale;
            aO += (af - aO) / F.options.smoothScale;
            aB = aP / ae;
            aA = aO / al;
            ar = ab / aB;
            aC = ak / aA;
            x();
            e(u, aQ);
            R.width(aP);
            R.height(aO);
            l.width(ar);
            l.height(aC);
            l.css({ top: av - n, left: ax - P });
            k.css({ top: -av, left: -ax });
            e(v, aN);
            D(u, aQ, aP, aO);
            au = u;
            at = aQ;
            I = v;
            H = aN;
            s = aP;
            r = aO;
            if (aL) {
                requestAnimFrame(c);
            }
        }
        function e(u, v) {
            u -= an;
            v -= aj;
            ax = u - ar / 2;
            av = v - aC / 2;
            if (F.options.position != "lens") {
                if (ax < 0) {
                    ax = 0;
                }
                if (ax > ae - ar) {
                    ax = ae - ar;
                }
                if (av < 0) {
                    av = 0;
                }
                if (av > al - aC) {
                    av = al - aC;
                }
            }
        }
        function aI() {
            if (typeof az != "undefined") {
                az.remove();
            }
            if (typeof Q != "undefined") {
                Q.remove();
            }
            if (typeof w != "undefined") {
                w.remove();
            }
        }
        function O(u, aN) {
            if (F.options.position == "fullscreen") {
                ae = b(window).width();
                al = b(window).height();
            } else {
                ae = ay.width();
                al = ay.height();
            }
            U.css({ top: al / 2 - U.height() / 2, left: ae / 2 - U.width() / 2 });
            if (F.options.rootOutput || F.options.position == "fullscreen") {
                ad = ay.offset();
            } else {
                ad = ay.position();
            }
            ad.top = Math.round(ad.top);
            ad.left = Math.round(ad.left);
            switch (F.options.position) {
                case "fullscreen":
                    aj = aw().top;
                    an = aw().left;
                    S = 0;
                    aG = 0;
                    break;
                case "inside":
                    aj = ad.top;
                    an = ad.left;
                    S = 0;
                    aG = 0;
                    break;
                case "top":
                    aj = ad.top;
                    an = ad.left;
                    S = aj - al;
                    aG = an;
                    break;
                case "left":
                    aj = ad.top;
                    an = ad.left;
                    S = aj;
                    aG = an - ae;
                    break;
                case "bottom":
                    aj = ad.top;
                    an = ad.left;
                    S = aj + al;
                    aG = an;
                    break;
                case "right":
                default:
                    aj = ad.top;
                    an = ad.left;
                    S = aj;
                    aG = an + ae;
            }
            aj -= az.outerHeight() / 2;
            an -= az.outerWidth() / 2;
            if (F.options.position.substr(0, 1) == "#") {
                aE = b(F.options.position);
            } else {
                aE.length = 0;
            }
            if (aE.length == 0 && F.options.position != "inside" && F.options.position != "fullscreen") {
                if (!F.options.adaptive || !m || !q) {
                    m = ae;
                    q = al;
                }
                if (F.options.zoomWidth == "auto") {
                    ab = ae;
                } else {
                    ab = F.options.zoomWidth;
                }
                if (F.options.zoomHeight == "auto") {
                    ak = al;
                } else {
                    ak = F.options.zoomHeight;
                }
                S += F.options.Yoffset;
                aG += F.options.Xoffset;
                Q.css({ width: ab + "px", height: ak + "px", top: S, left: aG });
                if (F.options.position != "lens") {
                    N.append(Q);
                }
            } else {
                if (F.options.position == "inside" || F.options.position == "fullscreen") {
                    ab = ae;
                    ak = al;
                    Q.css({ width: ab + "px", height: ak + "px" });
                    az.append(Q);
                } else {
                    ab = aE.width();
                    ak = aE.height();
                    if (F.options.rootOutput) {
                        S = aE.offset().top;
                        aG = aE.offset().left;
                        N.append(Q);
                    } else {
                        S = aE.position().top;
                        aG = aE.position().left;
                        aE.parent().append(Q);
                    }
                    S += (aE.outerHeight() - ak - Q.outerHeight()) / 2;
                    aG += (aE.outerWidth() - ab - Q.outerWidth()) / 2;
                    Q.css({ width: ab + "px", height: ak + "px", top: S, left: aG });
                }
            }
            if (F.options.title && j != "") {
                if (F.options.position == "inside" || F.options.position == "lens" || F.options.position == "fullscreen") {
                    y = S;
                    ap = aG;
                    az.append(w);
                } else {
                    y = S + (Q.outerHeight() - ak) / 2;
                    ap = aG + (Q.outerWidth() - ab) / 2;
                    N.append(w);
                }
                w.css({ width: ab + "px", height: ak + "px", top: y, left: ap });
            }
            az.css({ width: ae + "px", height: al + "px", top: aj, left: an });
            o.css({ width: ae + "px", height: al + "px" });
            if (F.options.tint && F.options.position != "inside" && F.options.position != "fullscreen") {
                o.css("background-color", F.options.tint);
            } else {
                if (E) {
                    o.css({ "background-image": "url(" + ay.attr("src") + ")", "background-color": "#fff" });
                }
            }
            J = new Image();
            var v = "";
            if (B) {
                v = "?r=" + new Date().getTime();
            }
            J.src = ay.attr("xoriginal") + v;
            R = b(J);
            R.css("position", "absolute");
            J = new Image();
            J.src = ay.attr("src");
            k = b(J);
            k.css("position", "absolute");
            k.width(ae);
            switch (F.options.position) {
                case "fullscreen":
                case "inside":
                    Q.append(R);
                    break;
                case "lens":
                    l.append(R);
                    if (F.options.bg) {
                        R.css({ display: "none" });
                    }
                    break;
                default:
                    Q.append(R);
                    l.append(k);
            }
        }
        this.openzoom = function (u) {
            aa = u.pageX;
            Y = u.pageY;
            if (F.options.adaptive) {
                F.adaptive();
            }
            am = F.options.defaultScale;
            aL = false;
            az = b("<div></div>");
            if (F.options.sourceClass != "") {
                az.addClass(F.options.sourceClass);
            }
            az.css("position", "absolute");
            U = b("<div></div>");
            if (F.options.loadingClass != "") {
                U.addClass(F.options.loadingClass);
            }
            U.css("position", "absolute");
            o = b('<div style="position: absolute; top: 0; left: 0;"></div>');
            az.append(U);
            Q = b("<div></div>");
            if (F.options.zoomClass != "" && F.options.position != "fullscreen") {
                Q.addClass(F.options.zoomClass);
            }
            Q.css({ position: "absolute", overflow: "hidden", opacity: 1 });
            if (F.options.title && j != "") {
                w = b("<div></div>");
                K = b("<div></div>");
                w.css({ position: "absolute", opacity: 1 });
                if (F.options.titleClass) {
                    K.addClass(F.options.titleClass);
                }
                K.html("<span>" + j + "</span>");
                w.append(K);
                if (F.options.fadeIn) {
                    w.css({ opacity: 0 });
                }
            }
            l = b("<div></div>");
            if (F.options.lensClass != "") {
                l.addClass(F.options.lensClass);
            }
            l.css({ position: "absolute", overflow: "hidden" });
            if (F.options.lens) {
                lenstint = b("<div></div>");
                lenstint.css({ position: "absolute", background: F.options.lens, opacity: F.options.lensOpacity, width: "100%", height: "100%", top: 0, left: 0, "z-index": 9999 });
                l.append(lenstint);
            }
            if (F.options.position != "inside" && F.options.position != "fullscreen") {
                if (F.options.tint || E) {
                    az.append(o);
                }
                if (F.options.fadeIn) {
                    o.css({ opacity: 0 });
                    l.css({ opacity: 0 });
                    Q.css({ opacity: 0 });
                }
                N.append(az);
            } else {
                if (F.options.fadeIn) {
                    Q.css({ opacity: 0 });
                }
                N.append(az);
            }
            F.eventmove(az);
            F.eventleave(az);
            O(aa, Y);
            switch (F.options.position) {
                case "inside":
                    S -= (Q.outerHeight() - Q.height()) / 2;
                    aG -= (Q.outerWidth() - Q.width()) / 2;
                    break;
                case "top":
                    S -= Q.outerHeight() - Q.height();
                    aG -= (Q.outerWidth() - Q.width()) / 2;
                    break;
                case "left":
                    S -= (Q.outerHeight() - Q.height()) / 2;
                    aG -= Q.outerWidth() - Q.width();
                    break;
                case "bottom":
                    aG -= (Q.outerWidth() - Q.width()) / 2;
                    break;
                case "right":
                    S -= (Q.outerHeight() - Q.height()) / 2;
            }
            Q.css({ top: S, left: aG });
            R.xon("load", function () {
                U.remove();
                if (F.options.scroll) {
                    F.eventscroll(az);
                }
                if (F.options.position != "inside" && F.options.position != "fullscreen") {
                    az.append(l);
                    if (F.options.fadeIn) {
                        o.fadeTo(300, F.options.tintOpacity);
                        l.fadeTo(300, 1);
                        Q.fadeTo(300, 1);
                    } else {
                        o.css({ opacity: F.options.tintOpacity });
                        l.css({ opacity: 1 });
                        Q.css({ opacity: 1 });
                    }
                } else {
                    if (F.options.fadeIn) {
                        Q.fadeTo(300, 1);
                    } else {
                        Q.css({ opacity: 1 });
                    }
                }
                if (F.options.title && j != "") {
                    if (F.options.fadeIn) {
                        w.fadeTo(300, 1);
                    } else {
                        w.css({ opacity: 1 });
                    }
                }
                h = R.width();
                ai = R.height();
                if (F.options.adaptive) {
                    if (ae < m || al < q) {
                        k.width(ae);
                        k.height(al);
                        h = (ae / m) * h;
                        ai = (al / q) * ai;
                        R.width(h);
                        R.height(ai);
                    }
                }
                s = ah = h;
                r = af = ai;
                aq = h / ai;
                X = h / ab;
                V = ai / ak;
                var aN,
                    aO = ["padding-", "border-"];
                n = P = 0;
                for (var v = 0; v < aO.length; v++) {
                    aN = parseFloat(l.css(aO[v] + "top-width"));
                    n += aN !== aN ? 0 : aN;
                    aN = parseFloat(l.css(aO[v] + "bottom-width"));
                    n += aN !== aN ? 0 : aN;
                    aN = parseFloat(l.css(aO[v] + "left-width"));
                    P += aN !== aN ? 0 : aN;
                    aN = parseFloat(l.css(aO[v] + "right-width"));
                    P += aN !== aN ? 0 : aN;
                }
                n /= 2;
                P /= 2;
                I = au = C = aa;
                H = at = A = Y;
                M(aa, Y);
                if (t && !F.options.bg) {
                    aL = true;
                    requestAnimFrame(c);
                }
                F.eventclick(az);
            });
        };
        this.movezoom = function (v) {
            aa = v.pageX;
            Y = v.pageY;
            if (E) {
                Z = aa;
                W = Y;
            }
            var u = aa - an;
            var aN = Y - aj;
            if (d) {
                v.pageX -= (u - ae / 2) * 2;
                v.pageY -= (aN - al / 2) * 2;
            }
            if (u < 0 || u > ae || aN < 0 || aN > al) {
                az.trigger("mouseleave");
            }
            if (t && !F.options.bg) {
                C = v.pageX;
                A = v.pageY;
            } else {
                x();
                e(v.pageX, v.pageY);
                l.css({ top: av - n, left: ax - P });
                k.css({ top: -av, left: -ax });
                D(v.pageX, v.pageY, 0, 0);
            }
        };
        this.eventdefault = function () {
            F.eventopen = function (u) {
                u.xon("mouseenter", F.openzoom);
            };
            F.eventleave = function (u) {
                u.xon("mouseleave", F.closezoom);
            };
            F.eventmove = function (u) {
                u.xon("mousemove", F.movezoom);
            };
            F.eventscroll = function (u) {
                u.xon("mousewheel DOMMouseScroll", F.xscroll);
            };
            F.eventclick = function (u) {
                u.xon("click", function (v) {
                    ay.trigger("click");
                });
            };
        };
        this.eventunbind = function () {
            ay.xoff("mouseenter");
            F.eventopen = function (u) {};
            F.eventleave = function (u) {};
            F.eventmove = function (u) {};
            F.eventscroll = function (u) {};
            F.eventclick = function (u) {};
        };
        this.init = function (u) {
            F.options = b.extend({}, b.fn.xzoom.defaults, u);
            if (F.options.rootOutput) {
                N = b("body");
            } else {
                N = ay.parent();
            }
            ao = F.options.position;
            d = F.options.lensReverse && F.options.position == "inside";
            if (F.options.smoothZoomMove < 0) {
                F.options.smoothZoomMove = 0;
            }
            if (F.options.smoothLensMove < 0) {
                F.options.smoothLensMove = 0;
            }
            if (F.options.smoothScale < 0) {
                F.options.smoothScale = 0;
            }
            t = F.options.smoothZoomMove && F.options.smoothLensMove && F.options.smoothScale;
            if (F.options.adaptive) {
                b(window).xon("load", function () {
                    m = ay.width();
                    q = ay.height();
                    F.adaptive();
                    b(window).resize(F.adaptive);
                });
            }
            F.eventdefault();
            F.eventopen(ay);
        };
        this.destroy = function () {
            F.eventunbind();
            delete F;
        };
        this.closezoom = function () {
            aL = false;
            if (F.options.fadeOut) {
                if (F.options.title && j != "") {
                    w.fadeOut(299);
                }
                if (F.options.position != "inside" || F.options.position != "fullscreen") {
                    Q.fadeOut(299);
                    az.fadeOut(300, function () {
                        aI();
                    });
                } else {
                    az.fadeOut(300, function () {
                        aI();
                    });
                }
            } else {
                aI();
            }
        };
        this.gallery = function () {
            var aN = new Array();
            var v,
                u = 0;
            for (v = z; v < G.length; v++) {
                aN[u] = G[v];
                u++;
            }
            for (v = 0; v < z; v++) {
                aN[u] = G[v];
                u++;
            }
            return { index: z, ogallery: G, cgallery: aN };
        };
        function ag(u) {
            var aN = u.attr("title");
            var v = u.attr("xtitle");
            if (v) {
                return v;
            } else {
                if (aN) {
                    return aN;
                } else {
                    return "";
                }
            }
        }
        this.xappend = function (u) {
            var v = u.parent();
            G[aD] = v.attr("href");
            v.data("xindex", aD);
            if (aD == 0 && F.options.activeClass) {
                L = u;
                L.addClass(F.options.activeClass);
            }
            if (aD == 0 && F.options.title) {
                j = ag(u);
            }
            aD++;
            function aN(aP) {
                aI();
                aP.preventDefault();
                if (F.options.activeClass) {
                    L.removeClass(F.options.activeClass);
                    L = u;
                    L.addClass(F.options.activeClass);
                }
                z = b(this).data("xindex");
                if (F.options.fadeTrans) {
                    ac = new Image();
                    ac.src = ay.attr("src");
                    T = b(ac);
                    T.css({ position: "absolute", top: ay.offset().top, left: ay.offset().left, width: ay.width(), height: ay.height() });
                    b(document.body).append(T);
                    T.fadeOut(200, function () {
                        T.remove();
                    });
                }
                var aQ = v.attr("href");
                var aO = u.attr("xpreview") || u.attr("src");
                j = ag(u);
                if (u.attr("title")) {
                    ay.attr("title", u.attr("title"));
                }
                ay.attr("xoriginal", aQ);
                ay.removeAttr("style");
                ay.attr("src", aO);
                if (F.options.adaptive) {
                    m = ay.width();
                    q = ay.height();
                }
            }
            if (F.options.hover) {
                v.xon("mouseenter", v, aN);
            }
            v.xon("click", v, aN);
        };
        this.init(aH);
    }
    b.fn.xzoom = function (e) {
        var c;
        var d;
        if (this.selector) {
            var g = this.selector.split(",");
            for (var f in g) {
                g[f] = b.trim(g[f]);
            }
            this.each(function (h) {
                if (g.length == 1) {
                    if (h == 0) {
                        c = b(this);
                        if (typeof c.data("xzoom") !== "undefined") {
                            return c.data("xzoom");
                        }
                        c.x = new a(c, e);
                    } else {
                        if (typeof c.x !== "undefined") {
                            d = b(this);
                            c.x.xappend(d);
                        }
                    }
                } else {
                    if (b(this).is(g[0]) && h == 0) {
                        c = b(this);
                        if (typeof c.data("xzoom") !== "undefined") {
                            return c.data("xzoom");
                        }
                        c.x = new a(c, e);
                    } else {
                        if (typeof c.x !== "undefined" && !b(this).is(g[0])) {
                            d = b(this);
                            c.x.xappend(d);
                        }
                    }
                }
            });
        } else {
            this.each(function (h) {
                if (h == 0) {
                    c = b(this);
                    if (typeof c.data("xzoom") !== "undefined") {
                        return c.data("xzoom");
                    }
                    c.x = new a(c, e);
                } else {
                    if (typeof c.x !== "undefined") {
                        d = b(this);
                        c.x.xappend(d);
                    }
                }
            });
        }
        if (typeof c === "undefined") {
            return false;
        }
        c.data("xzoom", c.x);
        b(c).trigger("xzoom_ready");
        return c.x;
    };
    b.fn.xzoom.defaults = {
        position: "right",
        mposition: "inside",
        rootOutput: true,
        Xoffset: 0,
        Yoffset: 0,
        fadeIn: true,
        fadeTrans: true,
        fadeOut: false,
        smoothZoomMove: 3,
        smoothLensMove: 1,
        smoothScale: 6,
        defaultScale: 0,
        scroll: true,
        tint: false,
        tintOpacity: 0.5,
        lens: false,
        lensOpacity: 0.5,
        lensShape: "box",
        zoomWidth: "auto",
        zoomHeight: "auto",
        sourceClass: "xzoom-source",
        loadingClass: "xzoom-loading",
        lensClass: "xzoom-lens",
        zoomClass: "xzoom-preview",
        activeClass: "xactive",
        hover: false,
        adaptive: true,
        lensReverse: false,
        adaptiveReverse: false,
        title: false,
        titleClass: "xzoom-caption",
        bg: false,
    };
})(jQuery);
