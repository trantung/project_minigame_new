/*
 * TweenJS
 * Visit http://createjs.com/ for documentation, updates and examples.
 *
 * Copyright (c) 2011 gskinner.com, inc.
 *
 * Distributed under the terms of the MIT license.
 * http://www.opensource.org/licenses/mit-license.html
 *
 * This notice shall be included in all copies or substantial portions of the Software.
 */
this.createjs = this.createjs || {};
(function() {
    var b = function() {
        this.initialize()
    }, a = b.prototype;
    b.initialize = function(d) {
        d.addEventListener = a.addEventListener;
        d.removeEventListener = a.removeEventListener;
        d.removeAllEventListeners = a.removeAllEventListeners;
        d.hasEventListener = a.hasEventListener;
        d.dispatchEvent = a.dispatchEvent
    };
    a._listeners = null;
    a.initialize = function() {};
    a.addEventListener = function(d, a) {
        var c = this._listeners;
        c ? this.removeEventListener(d, a) : c = this._listeners = {};
        var b = c[d];
        b || (b = c[d] = []);
        b.push(a);
        return a
    };
    a.removeEventListener =
        function(d, a) {
            var c = this._listeners;
            if (c) {
                var b = c[d];
                if (b)
                    for (var f = 0, g = b.length; f < g; f++)
                        if (b[f] == a) {
                            1 == g ? delete c[d] : b.splice(f, 1);
                            break
                        }
            }
    };
    a.removeAllEventListeners = function(d) {
        d ? this._listeners && delete this._listeners[d] : this._listeners = null
    };
    a.dispatchEvent = function(d, a) {
        var c = !1,
            b = this._listeners;
        if (d && b) {
            "string" == typeof d && (d = {
                type: d
            });
            d.target = a || this;
            b = b[d.type];
            if (!b) return c;
            for (var b = b.slice(), f = 0, g = b.length; f < g; f++) {
                var j = b[f];
                j instanceof Function ? c = c || j.apply(null, [d]) : j.handleEvent &&
                    (c = c || j.handleEvent(d))
            }
        }
        return !!c
    };
    a.hasEventListener = function(d) {
        var a = this._listeners;
        return !(!a || !a[d])
    };
    a.toString = function() {
        return "[EventDispatcher]"
    };
    createjs.EventDispatcher = b
})();
this.createjs = this.createjs || {};
(function() {
    var b = function(d, a, c) {
        this.initialize(d, a, c)
    }, a = b.prototype;
    b.NONE = 0;
    b.LOOP = 1;
    b.REVERSE = 2;
    b.IGNORE = {};
    b._tweens = [];
    b._plugins = {};
    b.get = function(d, a, c, e) {
        e && b.removeTweens(d);
        return new b(d, a, c)
    };
    b.tick = function(d, a) {
        for (var c = b._tweens.slice(), e = c.length - 1; 0 <= e; e--) {
            var f = c[e];
            a && !f.ignoreGlobalPause || f._paused || f.tick(f._useTicks ? 1 : d)
        }
    };
    createjs.Ticker && createjs.Ticker.addListener(b, !1);
    b.removeTweens = function(d) {
        if (d.tweenjs_count) {
            for (var a = b._tweens, c = a.length - 1; 0 <= c; c--) a[c]._target ==
                d && (a[c]._paused = !0, a.splice(c, 1));
            d.tweenjs_count = 0
        }
    };
    b.hasActiveTweens = function(d) {
        return d ? d.tweenjs_count : b._tweens && b._tweens.length
    };
    b.installPlugin = function(d, a) {
        var c = d.priority;
        null == c && (d.priority = c = 0);
        for (var e = 0, f = a.length, g = b._plugins; e < f; e++) {
            var j = a[e];
            if (g[j]) {
                for (var l = g[j], k = 0, p = l.length; k < p && !(c < l[k].priority); k++);
                g[j].splice(k, 0, d)
            } else g[j] = [d]
        }
    };
    b._register = function(d, a) {
        var c = d._target;
        a ? (c && (c.tweenjs_count = c.tweenjs_count ? c.tweenjs_count + 1 : 1), b._tweens.push(d)) : (c && c.tweenjs_count--,
            c = b._tweens.indexOf(d), -1 != c && b._tweens.splice(c, 1))
    };
    a.addEventListener = null;
    a.removeEventListener = null;
    a.removeAllEventListeners = null;
    a.dispatchEvent = null;
    a.hasEventListener = null;
    a._listeners = null;
    createjs.EventDispatcher.initialize(a);
    a.ignoreGlobalPause = !1;
    a.loop = !1;
    a.duration = 0;
    a.pluginData = null;
    a.onChange = null;
    a.change = null;
    a.target = null;
    a.position = null;
    a._paused = !1;
    a._curQueueProps = null;
    a._initQueueProps = null;
    a._steps = null;
    a._actions = null;
    a._prevPosition = 0;
    a._stepPosition = 0;
    a._prevPos = -1;
    a._target =
        null;
    a._useTicks = !1;
    a.initialize = function(d, a, c) {
        this.target = this._target = d;
        a && (this._useTicks = a.useTicks, this.ignoreGlobalPause = a.ignoreGlobalPause, this.loop = a.loop, this.onChange = a.onChange, a.override && b.removeTweens(d));
        this.pluginData = c || {};
        this._curQueueProps = {};
        this._initQueueProps = {};
        this._steps = [];
        this._actions = [];
        a && a.paused ? this._paused = !0 : b._register(this, !0);
        a && null != a.position && this.setPosition(a.position, b.NONE)
    };
    a.wait = function(a) {
        if (null == a || 0 >= a) return this;
        var b = this._cloneProps(this._curQueueProps);
        return this._addStep({
            d: a,
            p0: b,
            e: this._linearEase,
            p1: b
        })
    };
    a.to = function(a, b, c) {
        if (isNaN(b) || 0 > b) b = 0;
        return this._addStep({
            d: b || 0,
            p0: this._cloneProps(this._curQueueProps),
            e: c,
            p1: this._cloneProps(this._appendQueueProps(a))
        })
    };
    a.call = function(a, b, c) {
        return this._addAction({
            f: a,
            p: b ? b : [this],
            o: c ? c : this._target
        })
    };
    a.set = function(a, b) {
        return this._addAction({
            f: this._set,
            o: this,
            p: [a, b ? b : this._target]
        })
    };
    a.play = function(a) {
        return this.call(a.setPaused, [!1], a)
    };
    a.pause = function(a) {
        a || (a = this);
        return this.call(a.setPaused, [!0], a)
    };
    a.setPosition = function(a, b) {
        0 > a && (a = 0);
        null == b && (b = 1);
        var c = a,
            e = !1;
        c >= this.duration && (this.loop ? c %= this.duration : (c = this.duration, e = !0));
        if (c == this._prevPos) return e;
        var f = this._prevPos;
        this.position = this._prevPos = c;
        this._prevPosition = a;
        if (this._target)
            if (e) this._updateTargetProps(null, 1);
            else
        if (0 < this._steps.length) {
            for (var g = 0, j = this._steps.length; g < j && !(this._steps[g].t > c); g++);
            g = this._steps[g - 1];
            this._updateTargetProps(g, (this._stepPosition = c - g.t) / g.d)
        }
        0 != b && 0 < this._actions.length &&
            (this._useTicks ? this._runActions(c, c) : 1 == b && c < f ? (f != this.duration && this._runActions(f, this.duration), this._runActions(0, c, !0)) : this._runActions(f, c));
        e && this.setPaused(!0);
        this.onChange && this.onChange(this);
        this.dispatchEvent("change");
        return e
    };
    a.tick = function(a) {
        this._paused || this.setPosition(this._prevPosition + a)
    };
    a.setPaused = function(a) {
        this._paused = !! a;
        b._register(this, !a);
        return this
    };
    a.w = a.wait;
    a.t = a.to;
    a.c = a.call;
    a.s = a.set;
    a.toString = function() {
        return "[Tween]"
    };
    a.clone = function() {
        throw "Tween can not be cloned.";
    };
    a._updateTargetProps = function(a, h) {
        var c, e, f, g;
        !a && 1 == h ? c = e = this._curQueueProps : (a.e && (h = a.e(h, 0, 1, 1)), c = a.p0, e = a.p1);
        for (n in this._initQueueProps) {
            if (null == (f = c[n])) c[n] = f = this._initQueueProps[n];
            if (null == (g = e[n])) e[n] = g = f;
            f = f == g || 0 == h || 1 == h || "number" != typeof f ? 1 == h ? g : f : f + (g - f) * h;
            var j = !1;
            if (g = b._plugins[n])
                for (var l = 0, k = g.length; l < k; l++) {
                    var p = g[l].tween(this, n, f, c, e, h, !! a && c == e, !a);
                    p == b.IGNORE ? j = !0 : f = p
                }
            j || (this._target[n] = f)
        }
    };
    a._runActions = function(a, b, c) {
        var e = a,
            f = b,
            g = -1,
            j = this._actions.length,
            l = 1;
        a > b && (e = b, f = a, g = j, j = l = -1);
        for (;
            (g += l) != j;) {
            b = this._actions[g];
            var k = b.t;
            (k == f || k > e && k < f || c && k == a) && b.f.apply(b.o, b.p)
        }
    };
    a._appendQueueProps = function(a) {
        var h, c, e, f, g, j;
        for (j in a) {
            if (void 0 === this._initQueueProps[j]) {
                c = this._target[j];
                if (h = b._plugins[j]) {
                    e = 0;
                    for (f = h.length; e < f; e++) c = h[e].init(this, j, c)
                }
                this._initQueueProps[j] = void 0 === c ? null : c
            } else c = this._curQueueProps[j]; if (h = b._plugins[j]) {
                g = g || {};
                e = 0;
                for (f = h.length; e < f; e++) h[e].step && h[e].step(this, j, c, a[j], g)
            }
            this._curQueueProps[j] = a[j]
        }
        g &&
            this._appendQueueProps(g);
        return this._curQueueProps
    };
    a._cloneProps = function(a) {
        var b = {}, c;
        for (c in a) b[c] = a[c];
        return b
    };
    a._addStep = function(a) {
        0 < a.d && (this._steps.push(a), a.t = this.duration, this.duration += a.d);
        return this
    };
    a._addAction = function(a) {
        a.t = this.duration;
        this._actions.push(a);
        return this
    };
    a._set = function(a, b) {
        for (var c in a) b[c] = a[c]
    };
    createjs.Tween = b
})();
this.createjs = this.createjs || {};
(function() {
    var b = function(a, b, c) {
        this.initialize(a, b, c)
    }, a = b.prototype;
    a.ignoreGlobalPause = !1;
    a.duration = 0;
    a.loop = !1;
    a.onChange = null;
    a.position = null;
    a._paused = !1;
    a._tweens = null;
    a._labels = null;
    a._prevPosition = 0;
    a._prevPos = -1;
    a._useTicks = !1;
    a.initialize = function(a, b, c) {
        this._tweens = [];
        c && (this._useTicks = c.useTicks, this.loop = c.loop, this.ignoreGlobalPause = c.ignoreGlobalPause, this.onChange = c.onChange);
        a && this.addTween.apply(this, a);
        this.setLabels(b);
        c && c.paused ? this._paused = !0 : createjs.Tween._register(this, !0);
        c && null != c.position && this.setPosition(c.position, createjs.Tween.NONE)
    };
    a.addTween = function(a) {
        var b = arguments.length;
        if (1 < b) {
            for (var c = 0; c < b; c++) this.addTween(arguments[c]);
            return arguments[0]
        }
        if (0 == b) return null;
        this.removeTween(a);
        this._tweens.push(a);
        a.setPaused(!0);
        a._paused = !1;
        a._useTicks = this._useTicks;
        a.duration > this.duration && (this.duration = a.duration);
        0 <= this._prevPos && a.setPosition(this._prevPos, createjs.Tween.NONE);
        return a
    };
    a.removeTween = function(a) {
        var b = arguments.length;
        if (1 < b) {
            for (var c = !0, e = 0; e < b; e++) c = c && this.removeTween(arguments[e]);
            return c
        }
        if (0 == b) return !1;
        b = this._tweens.indexOf(a);
        return -1 != b ? (this._tweens.splice(b, 1), a.duration >= this.duration && this.updateDuration(), !0) : !1
    };
    a.addLabel = function(a, b) {
        this._labels[a] = b
    };
    a.setLabels = function(a) {
        this._labels = a ? a : {}
    };
    a.gotoAndPlay = function(a) {
        this.setPaused(!1);
        this._goto(a)
    };
    a.gotoAndStop = function(a) {
        this.setPaused(!0);
        this._goto(a)
    };
    a.setPosition = function(a, b) {
        0 > a && (a = 0);
        var c = this.loop ? a % this.duration : a,
            e = !this.loop && a >= this.duration;
        if (c == this._prevPos) return e;
        this._prevPosition = a;
        this.position = this._prevPos = c;
        for (var f = 0, g = this._tweens.length; f < g; f++)
            if (this._tweens[f].setPosition(c, b), c != this._prevPos) return !1;
        e && this.setPaused(!0);
        this.onChange && this.onChange(this);
        return e
    };
    a.setPaused = function(a) {
        this._paused = !! a;
        createjs.Tween._register(this, !a)
    };
    a.updateDuration = function() {
        for (var a = this.duration = 0, b = this._tweens.length; a < b; a++) tween = this._tweens[a], tween.duration > this.duration && (this.duration = tween.duration)
    };
    a.tick =
        function(a) {
            this.setPosition(this._prevPosition + a)
    };
    a.resolve = function(a) {
        var b = parseFloat(a);
        isNaN(b) && (b = this._labels[a]);
        return b
    };
    a.toString = function() {
        return "[Timeline]"
    };
    a.clone = function() {
        throw "Timeline can not be cloned.";
    };
    a._goto = function(a) {
        a = this.resolve(a);
        null != a && this.setPosition(a)
    };
    createjs.Timeline = b
})();
this.createjs = this.createjs || {};
(function() {
    var b = function() {
        throw "Ease cannot be instantiated.";
    };
    b.linear = function(a) {
        return a
    };
    b.none = b.linear;
    b.get = function(a) {
        -1 > a && (a = -1);
        1 < a && (a = 1);
        return function(b) {
            return 0 == a ? b : 0 > a ? b * (b * -a + 1 + a) : b * ((2 - b) * a + (1 - a))
        }
    };
    b.getPowIn = function(a) {
        return function(b) {
            return Math.pow(b, a)
        }
    };
    b.getPowOut = function(a) {
        return function(b) {
            return 1 - Math.pow(1 - b, a)
        }
    };
    b.getPowInOut = function(a) {
        return function(b) {
            return 1 > (b *= 2) ? 0.5 * Math.pow(b, a) : 1 - 0.5 * Math.abs(Math.pow(2 - b, a))
        }
    };
    b.quadIn = b.getPowIn(2);
    b.quadOut =
        b.getPowOut(2);
    b.quadInOut = b.getPowInOut(2);
    b.cubicIn = b.getPowIn(3);
    b.cubicOut = b.getPowOut(3);
    b.cubicInOut = b.getPowInOut(3);
    b.quartIn = b.getPowIn(4);
    b.quartOut = b.getPowOut(4);
    b.quartInOut = b.getPowInOut(4);
    b.quintIn = b.getPowIn(5);
    b.quintOut = b.getPowOut(5);
    b.quintInOut = b.getPowInOut(5);
    b.sineIn = function(a) {
        return 1 - Math.cos(a * Math.PI / 2)
    };
    b.sineOut = function(a) {
        return Math.sin(a * Math.PI / 2)
    };
    b.sineInOut = function(a) {
        return -0.5 * (Math.cos(Math.PI * a) - 1)
    };
    b.getBackIn = function(a) {
        return function(b) {
            return b *
                b * ((a + 1) * b - a)
        }
    };
    b.backIn = b.getBackIn(1.7);
    b.getBackOut = function(a) {
        return function(b) {
            return --b * b * ((a + 1) * b + a) + 1
        }
    };
    b.backOut = b.getBackOut(1.7);
    b.getBackInOut = function(a) {
        a *= 1.525;
        return function(b) {
            return 1 > (b *= 2) ? 0.5 * b * b * ((a + 1) * b - a) : 0.5 * ((b -= 2) * b * ((a + 1) * b + a) + 2)
        }
    };
    b.backInOut = b.getBackInOut(1.7);
    b.circIn = function(a) {
        return -(Math.sqrt(1 - a * a) - 1)
    };
    b.circOut = function(a) {
        return Math.sqrt(1 - --a * a)
    };
    b.circInOut = function(a) {
        return 1 > (a *= 2) ? -0.5 * (Math.sqrt(1 - a * a) - 1) : 0.5 * (Math.sqrt(1 - (a -= 2) * a) + 1)
    };
    b.bounceIn =
        function(a) {
            return 1 - b.bounceOut(1 - a)
    };
    b.bounceOut = function(a) {
        return a < 1 / 2.75 ? 7.5625 * a * a : a < 2 / 2.75 ? 7.5625 * (a -= 1.5 / 2.75) * a + 0.75 : a < 2.5 / 2.75 ? 7.5625 * (a -= 2.25 / 2.75) * a + 0.9375 : 7.5625 * (a -= 2.625 / 2.75) * a + 0.984375
    };
    b.bounceInOut = function(a) {
        return 0.5 > a ? 0.5 * b.bounceIn(2 * a) : 0.5 * b.bounceOut(2 * a - 1) + 0.5
    };
    b.getElasticIn = function(a, b) {
        var h = 2 * Math.PI;
        return function(c) {
            if (0 == c || 1 == c) return c;
            var e = b / h * Math.asin(1 / a);
            return -(a * Math.pow(2, 10 * (c -= 1)) * Math.sin((c - e) * h / b))
        }
    };
    b.elasticIn = b.getElasticIn(1, 0.3);
    b.getElasticOut =
        function(a, b) {
            var h = 2 * Math.PI;
            return function(c) {
                if (0 == c || 1 == c) return c;
                var e = b / h * Math.asin(1 / a);
                return a * Math.pow(2, -10 * c) * Math.sin((c - e) * h / b) + 1
            }
    };
    b.elasticOut = b.getElasticOut(1, 0.3);
    b.getElasticInOut = function(a, b) {
        var h = 2 * Math.PI;
        return function(c) {
            var e = b / h * Math.asin(1 / a);
            return 1 > (c *= 2) ? -0.5 * a * Math.pow(2, 10 * (c -= 1)) * Math.sin((c - e) * h / b) : 0.5 * a * Math.pow(2, -10 * (c -= 1)) * Math.sin((c - e) * h / b) + 1
        }
    };
    b.elasticInOut = b.getElasticInOut(1, 0.3 * 1.5);
    createjs.Ease = b
})();
this.createjs = this.createjs || {};
(function() {
    var b = function() {
        throw "MotionGuidePlugin cannot be instantiated.";
    };
    b.priority = 0;
    b.install = function() {
        createjs.Tween.installPlugin(b, ["guide", "x", "y", "rotation"]);
        return createjs.Tween.IGNORE
    };
    b.init = function(a, b, h) {
        a = a.target;
        a.hasOwnProperty("x") || (a.x = 0);
        a.hasOwnProperty("y") || (a.y = 0);
        a.hasOwnProperty("rotation") || (a.rotation = 0);
        return "guide" == b ? null : h
    };
    b.step = function(a, d, h, c, e) {
        if ("guide" != d) return c;
        var f;
        c.hasOwnProperty("path") || (c.path = []);
        a = c.path;
        c.hasOwnProperty("end") || (c.end =
            1);
        c.hasOwnProperty("start") || (c.start = h && h.hasOwnProperty("end") && h.path === a ? h.end : 0);
        if (c.hasOwnProperty("_segments") && c._length) return c;
        h = a.length;
        if (6 <= h && 0 == (h - 2) % 4) {
            c._segments = [];
            c._length = 0;
            for (d = 2; d < h; d += 4) {
                for (var g = a[d - 2], j = a[d - 1], l = a[d + 0], k = a[d + 1], p = a[d + 2], x = a[d + 3], v = g, w = j, s, m, r = 0, t = [], u = 1; 10 >= u; u++) {
                    m = u / 10;
                    var q = 1 - m;
                    s = q * q * g + 2 * q * m * l + m * m * p;
                    m = q * q * j + 2 * q * m * k + m * m * x;
                    r += t[t.push(Math.sqrt((f = s - v) * f + (f = m - w) * f)) - 1];
                    v = s;
                    w = m
                }
                c._segments.push(r);
                c._segments.push(t);
                c._length += r
            }
        } else throw "invalid 'path' data, please see documentation for valid paths";
        f = c.orient;
        c.orient = !1;
        b.calc(c, c.end, e);
        c.orient = f;
        return c
    };
    b.tween = function(a, d, h, c, e, f, g) {
        e = e.guide;
        if (void 0 == e || e === c.guide) return h;
        e.lastRatio != f && (b.calc(e, (e.end - e.start) * (g ? e.end : f) + e.start, a.target), e.orient && (a.target.rotation += c.rotation || 0), e.lastRatio = f);
        return !e.orient && "rotation" == d ? h : a.target[d]
    };
    b.calc = function(a, d, h) {
        void 0 == a._segments && b.validate(a);
        void 0 == h && (h = {
            x: 0,
            y: 0,
            rotation: 0
        });
        var c = a._segments,
            e = a.path,
            f = a._length * d,
            g = c.length - 2;
        for (d = 0; f > c[d] && d < g;) f -= c[d], d += 2;
        for (var c =
            c[d + 1], j = 0, g = c.length - 1; f > c[j] && j < g;) f -= c[j], j++;
        f = j / ++g + f / (g * c[j]);
        d = 2 * d + 2;
        g = 1 - f;
        h.x = g * g * e[d - 2] + 2 * g * f * e[d + 0] + f * f * e[d + 2];
        h.y = g * g * e[d - 1] + 2 * g * f * e[d + 1] + f * f * e[d + 3];
        a.orient && (h.rotation = 57.2957795 * Math.atan2((e[d + 1] - e[d - 1]) * g + (e[d + 3] - e[d + 1]) * f, (e[d + 0] - e[d - 2]) * g + (e[d + 2] - e[d + 0]) * f));
        return h
    };
    createjs.MotionGuidePlugin = b
})();
(function() {
    var b = this.createjs = this.createjs || {}, b = b.TweenJS = b.TweenJS || {};
    b.version = "0.4.0";
    b.buildDate = "Tue, 12 Feb 2013 21:09:02 GMT"
})();