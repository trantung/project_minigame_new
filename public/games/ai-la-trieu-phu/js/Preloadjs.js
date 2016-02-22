/**
 * PreloadJS
 * Visit http://createjs.com/ for documentation, updates and examples.
 *
 * Copyright (c) 2011 gskinner.com, inc.
 *
 * Distributed under the terms of the MIT license.
 * http://www.opensource.org/licenses/mit-license.html
 *
 * This notice shall be included in all copies or substantial portions of the Software.
 **/
(function() {
    var c = this.createjs = this.createjs || {}, c = c.PreloadJS = c.PreloadJS || {};
    c.version = "0.3.1";
    c.buildDate = "Thu, 09 May 2013 22:04:32 GMT"
})();
this.createjs = this.createjs || {};
(function() {
    var c = function() {
        this.initialize()
    }, a = c.prototype;
    c.initialize = function(d) {
        d.addEventListener = a.addEventListener;
        d.removeEventListener = a.removeEventListener;
        d.removeAllEventListeners = a.removeAllEventListeners;
        d.hasEventListener = a.hasEventListener;
        d.dispatchEvent = a.dispatchEvent
    };
    a._listeners = null;
    a.initialize = function() {};
    a.addEventListener = function(d, b) {
        var e = this._listeners;
        e ? this.removeEventListener(d, b) : e = this._listeners = {};
        var a = e[d];
        a || (a = e[d] = []);
        a.push(b);
        return b
    };
    a.removeEventListener =
        function(d, b) {
            var e = this._listeners;
            if (e) {
                var a = e[d];
                if (a)
                    for (var f = 0, c = a.length; f < c; f++)
                        if (a[f] == b) {
                            c == 1 ? delete e[d] : a.splice(f, 1);
                            break
                        }
            }
    };
    a.removeAllEventListeners = function(d) {
        d ? this._listeners && delete this._listeners[d] : this._listeners = null
    };
    a.dispatchEvent = function(d, b) {
        var e = false,
            a = this._listeners;
        if (d && a) {
            typeof d == "string" && (d = {
                type: d
            });
            a = a[d.type];
            if (!a) return e;
            d.target = b || this;
            for (var a = a.slice(), f = 0, c = a.length; f < c; f++) var h = a[f],
            e = h.handleEvent ? e || h.handleEvent(d) : e || h(d)
        }
        return !!e
    };
    a.hasEventListener = function(d) {
        var b = this._listeners;
        return !(!b || !b[d])
    };
    a.toString = function() {
        return "[EventDispatcher]"
    };
    createjs.EventDispatcher = c
})();
this.createjs = this.createjs || {};
(function() {
    var c = function() {
        this.init()
    };
    c.prototype = {};
    var a = c.prototype;
    c.FILE_PATTERN = /^(?:(\w+:)\/{2}(\w+(?:\.\w+)*\/?))?([/.]*?(?:[^?]+)?\/)?((?:[^/?]+)\.(\w+))(?:\?(\S+)?)?$/;
    a.loaded = false;
    a.canceled = false;
    a.progress = 0;
    a._item = null;
    a._basePath = null;
    a.onProgress = null;
    a.onLoadStart = null;
    a.onComplete = null;
    a.onError = null;
    a.addEventListener = null;
    a.removeEventListener = null;
    a.removeAllEventListeners = null;
    a.dispatchEvent = null;
    a.hasEventListener = null;
    a._listeners = null;
    createjs.EventDispatcher.initialize(a);
    a.getItem = function() {
        return this._item
    };
    a.init = function() {};
    a.load = function() {};
    a.close = function() {};
    a._sendLoadStart = function() {
        this._isCanceled() || (this.onLoadStart && this.onLoadStart({
            target: this
        }), this.dispatchEvent("loadStart"), this.dispatchEvent("loadstart"))
    };
    a._sendProgress = function(d) {
        if (!this._isCanceled()) {
            var b = null;
            if (typeof d == "number") this.progress = d, b = {
                loaded: this.progress,
                total: 1
            };
            else if (b = d, this.progress = d.loaded / d.total, isNaN(this.progress) || this.progress == Infinity) this.progress =
                0;
            b.target = this;
            b.type = "progress";
            b.progress = this.progress;
            this.onProgress && this.onProgress(b);
            this.dispatchEvent(b)
        }
    };
    a._sendComplete = function() {
        this._isCanceled() || (this.onComplete && this.onComplete({
            target: this
        }), this.dispatchEvent("complete"))
    };
    a._sendError = function(d) {
        if (!this._isCanceled()) d == null && (d = {}), d.target = this, d.type = "error", this.onError && this.onError(d), this.dispatchEvent(d)
    };
    a._isCanceled = function() {
        return window.createjs == null || this.canceled ? true : false
    };
    a._parseURI = function(d) {
        return !d ?
            null : d.match(c.FILE_PATTERN)
    };
    a._formatQueryString = function(d, b) {
        if (d == null) throw Error("You must specify data.");
        var e = [],
            a;
        for (a in d) e.push(a + "=" + escape(d[a]));
        b && (e = e.concat(b));
        return e.join("&")
    };
    a.buildPath = function(a, b, e) {
        if (b != null) {
            var j = this._parseURI(a);
            if (j[1] == null || j[1] == "") a = b + a
        }
        if (e == null) return a;
        b = [];
        j = a.indexOf("?");
        if (j != -1) var f = a.slice(j + 1),
        b = b.concat(f.split("&"));
        return j != -1 ? a.slice(0, j) + "?" + this._formatQueryString(e, b) : a + "?" + this._formatQueryString(e, b)
    };
    a.toString = function() {
        return "[PreloadJS AbstractLoader]"
    };
    createjs.AbstractLoader = c
})();
this.createjs = this.createjs || {};
(function() {
    var c = function(b, e) {
        this.init(b, e)
    }, a = c.prototype = new createjs.AbstractLoader;
    c.LOAD_TIMEOUT = 8E3;
    c.BINARY = "binary";
    c.CSS = "css";
    c.IMAGE = "image";
    c.JAVASCRIPT = "javascript";
    c.JSON = "json";
    c.JSONP = "jsonp";
    c.SOUND = "sound";
    c.SVG = "svg";
    c.TEXT = "text";
    c.XML = "xml";
    c.POST = "POST";
    c.GET = "GET";
    a.useXHR = true;
    a.stopOnError = false;
    a.maintainScriptOrder = true;
    a.next = null;
    a.onFileLoad = null;
    a.onFileProgress = null;
    a._typeCallbacks = null;
    a._extensionCallbacks = null;
    a._loadStartWasDispatched = false;
    a._maxConnections =
        1;
    a._currentlyLoadingScript = null;
    a._currentLoads = null;
    a._loadQueue = null;
    a._loadQueueBackup = null;
    a._loadItemsById = null;
    a._loadItemsBySrc = null;
    a._loadedResults = null;
    a._loadedRawResults = null;
    a._numItems = 0;
    a._numItemsLoaded = 0;
    a._scriptOrder = null;
    a._loadedScripts = null;
    a.init = function(b, e) {
        this._numItems = this._numItemsLoaded = 0;
        this._loadStartWasDispatched = this._paused = false;
        this._currentLoads = [];
        this._loadQueue = [];
        this._loadQueueBackup = [];
        this._scriptOrder = [];
        this._loadedScripts = [];
        this._loadItemsById = {};
        this._loadItemsBySrc = {};
        this._loadedResults = {};
        this._loadedRawResults = {};
        this._typeCallbacks = {};
        this._extensionCallbacks = {};
        this._basePath = e;
        this.setUseXHR(b)
    };
    a.setUseXHR = function(b) {
        return this.useXHR = b != false && window.XMLHttpRequest != null
    };
    a.removeAll = function() {
        this.remove()
    };
    a.remove = function(b) {
        var e = null;
        b && !(b instanceof Array) ? e = [b] : b && (e = b);
        b = false;
        if (e) {
            for (; e.length;) {
                for (var a = e.pop(), d = this.getResult(a), c = this._loadQueue.length - 1; c >= 0; c--)
                    if (h = this._loadQueue[c].getItem(), h.id == a ||
                        h.src == a) {
                        this._loadQueue.splice(c, 1)[0].cancel();
                        break
                    }
                for (c = this._loadQueueBackup.length - 1; c >= 0; c--)
                    if (h = this._loadQueueBackup[c].getItem(), h.id == a || h.src == a) {
                        this._loadQueueBackup.splice(c, 1)[0].cancel();
                        break
                    }
                if (d) delete this._loadItemsById[d.id], delete this._loadItemsBySrc[d.src], this._disposeItem(d);
                else
                    for (var c = this._currentLoads.length - 1; c >= 0; c--) {
                        var h = this._currentLoads[c].getItem();
                        if (h.id == a || h.src == a) {
                            this._currentLoads.splice(c, 1)[0].cancel();
                            b = true;
                            break
                        }
                    }
            }
            b && this._loadNext()
        } else {
            this.close();
            for (a in this._loadItemsById) this._disposeItem(this._loadItemsById[a]);
            this.init(this.useXHR)
        }
    };
    a.reset = function() {
        this.close();
        for (var b in this._loadItemsById) this._disposeItem(this._loadItemsById[b]);
        b = [];
        for (i = 0, l = this._loadQueueBackup.length; i < l; i++) b.push(this._loadQueueBackup[i].getItem());
        this.loadManifest(b, false)
    };
    c.isBinary = function(b) {
        switch (b) {
            case createjs.LoadQueue.IMAGE:
            case createjs.LoadQueue.BINARY:
                return true;
            default:
                return false
        }
    };
    a.installPlugin = function(b) {
        if (!(b == null || b.getPreloadHandlers ==
            null)) {
            b = b.getPreloadHandlers();
            if (b.types != null)
                for (var a = 0, d = b.types.length; a < d; a++) this._typeCallbacks[b.types[a]] = b.callback;
            if (b.extensions != null)
                for (a = 0, d = b.extensions.length; a < d; a++) this._extensionCallbacks[b.extensions[a]] = b.callback
        }
    };
    a.setMaxConnections = function(b) {
        this._maxConnections = b;
        !this._paused && this._loadQueue.length > 0 && this._loadNext()
    };
    a.loadFile = function(b, a, d) {
        b == null ? this._sendError({
            text: "PRELOAD_NO_FILE"
        }) : (this._addItem(b, d), a !== false ? this.setPaused(false) : this.setPaused(true))
    };
    a.loadManifest = function(b, a, d) {
        var c = null;
        if (b instanceof Array) {
            if (b.length == 0) {
                this._sendError({
                    text: "PRELOAD_MANIFEST_EMPTY"
                });
                return
            }
            c = b
        } else {
            if (b == null) {
                this._sendError({
                    text: "PRELOAD_MANIFEST_NULL"
                });
                return
            }
            c = [b]
        }
        for (var b = 0, o = c.length; b < o; b++) this._addItem(c[b], d);
        a !== false ? this.setPaused(false) : this.setPaused(true)
    };
    a.load = function() {
        this.setPaused(false)
    };
    a.getItem = function(b) {
        return this._loadItemsById[b] || this._loadItemsBySrc[b]
    };
    a.getResult = function(b, a) {
        var d = this._loadItemsById[b] ||
            this._loadItemsBySrc[b];
        if (d == null) return null;
        d = d.id;
        return a && this._loadedRawResults[d] ? this._loadedRawResults[d] : this._loadedResults[d]
    };
    a.setPaused = function(b) {
        (this._paused = b) || this._loadNext()
    };
    a.close = function() {
        for (; this._currentLoads.length;) this._currentLoads.pop().cancel();
        this._scriptOrder.length = 0;
        this._loadedScripts.length = 0;
        this.loadStartWasDispatched = false
    };
    a._addItem = function(b, a) {
        var d = this._createLoadItem(b);
        if (d != null) {
            var c = this._createLoader(d, a);
            c != null && (this._loadQueue.push(c),
                this._loadQueueBackup.push(c), this._numItems++, this._updateProgress(), this.maintainScriptOrder && d.type == createjs.LoadQueue.JAVASCRIPT && c instanceof createjs.XHRLoader && (this._scriptOrder.push(d), this._loadedScripts.push(null)))
        }
    };
    a._createLoadItem = function(b) {
        var a = null;
        switch (typeof b) {
            case "string":
                a = {
                    src: b
                };
                break;
            case "object":
                a = window.HTMLAudioElement && b instanceof HTMLAudioElement ? {
                    tag: b,
                    src: a.tag.src,
                    type: createjs.LoadQueue.SOUND
                } : b
        }
        b = this._parseURI(a.src);
        if (b != null) a.ext = b[5];
        if (a.type == null) a.type =
            this._getTypeByExtension(a.ext);
        if (a.type == createjs.LoadQueue.JSON && a.callback != null) a.type = createjs.LoadQueue.JSONP;
        if (a.type == createjs.LoadQueue.JSONP && a.callback == null) throw Error("callback is required for loading JSONP requests.");
        if (a.tag == null) a.tag = this._createTag(a.type);
        if (a.id == null || a.id == "") a.id = a.src;
        if (b = this._typeCallbacks[a.type] || this._extensionCallbacks[a.ext]) {
            b = b(a.src, a.type, a.id, a.data);
            if (b === false) return null;
            else if (b !== true) {
                if (b.src != null) a.src = b.src;
                if (b.id != null) a.id =
                    b.id;
                if (b.tag != null && b.tag.load instanceof Function) a.tag = b.tag;
                if (b.completeHandler != null) a.completeHandler = b.completeHandler
            }
            if (b.type) a.type = b.type;
            b = this._parseURI(a.src);
            if (b != null && b[5] != null) a.ext = b[5].toLowerCase()
        }
        this._loadItemsById[a.id] = a;
        return this._loadItemsBySrc[a.src] = a
    };
    a._createLoader = function(b, a) {
        var d = this.useXHR;
        switch (b.type) {
            case createjs.LoadQueue.JSON:
            case createjs.LoadQueue.XML:
            case createjs.LoadQueue.TEXT:
                d = true;
                break;
            case createjs.LoadQueue.SOUND:
            case createjs.LoadQueue.JSONP:
                d =
                    false
        }
        if (a == null) a = this._basePath;
        return d ? new createjs.XHRLoader(b, a) : new createjs.TagLoader(b, a)
    };
    a._loadNext = function() {
        if (!this._paused) {
            if (!this._loadStartWasDispatched) this._sendLoadStart(), this._loadStartWasDispatched = true;
            if (this._numItems == this._numItemsLoaded) this.loaded = true, this._sendComplete(), this.next && this.next.load && this.next.load();
            for (var a = 0, d = this._loadQueue.length; a < d; a++) {
                if (this._currentLoads.length >= this._maxConnections) break;
                var c = this._loadQueue[a];
                if (this.maintainScriptOrder &&
                    c instanceof createjs.TagLoader && c.getItem().type == createjs.LoadQueue.JAVASCRIPT) {
                    if (this._currentlyLoadingScript) continue;
                    this._currentlyLoadingScript = true
                }
                this._loadQueue.splice(a, 1);
                a--;
                d--;
                this._loadItem(c)
            }
        }
    };
    a._loadItem = function(a) {
        a.addEventListener("progress", createjs.proxy(this._handleProgress, this));
        a.addEventListener("complete", createjs.proxy(this._handleFileComplete, this));
        a.addEventListener("error", createjs.proxy(this._handleFileError, this));
        this._currentLoads.push(a);
        this._sendFileStart(a.getItem());
        a.load()
    };
    a._handleFileError = function(a) {
        var d = a.target;
        this._numItemsLoaded++;
        this._updateProgress();
        a = {
            item: d.getItem()
        };
        this._sendError(a);
        this.stopOnError || (this._removeLoadItem(d), this._loadNext())
    };
    a._handleFileComplete = function(a) {
        var a = a.target,
            d = a.getItem();
        this._loadedResults[d.id] = a.getResult();
        a instanceof createjs.XHRLoader && (this._loadedRawResults[d.id] = a.getResult(true));
        this._removeLoadItem(a);
        if (this.maintainScriptOrder && d.type == createjs.LoadQueue.JAVASCRIPT)
            if (a instanceof createjs.TagLoader) this._currentlyLoadingScript =
                false;
            else {
                this._loadedScripts[this._scriptOrder.indexOf(d)] = d;
                this._checkScriptLoadOrder(a);
                return
            }
        this._processFinishedLoad(d, a)
    };
    a._processFinishedLoad = function(a, d) {
        this._numItemsLoaded++;
        this._updateProgress();
        this._sendFileComplete(a, d);
        this._loadNext()
    };
    a._checkScriptLoadOrder = function() {
        for (var a = this._loadedScripts.length, d = 0; d < a; d++) {
            var c = this._loadedScripts[d];
            if (c === null) break;
            c !== true && (this._processFinishedLoad(c), this._loadedScripts[d] = true, d--, a--)
        }
    };
    a._removeLoadItem = function(a) {
        for (var d =
            this._currentLoads.length, c = 0; c < d; c++)
            if (this._currentLoads[c] == a) {
                this._currentLoads.splice(c, 1);
                break
            }
    };
    a._handleProgress = function(a) {
        a = a.target;
        this._sendFileProgress(a.getItem(), a.progress);
        this._updateProgress()
    };
    a._updateProgress = function() {
        var a = this._numItemsLoaded / this._numItems,
            d = this._numItems - this._numItemsLoaded;
        if (d > 0) {
            for (var c = 0, f = 0, o = this._currentLoads.length; f < o; f++) c += this._currentLoads[f].progress;
            a += c / d * (d / this._numItems)
        }
        this._sendProgress(a)
    };
    a._disposeItem = function(a) {
        delete this._loadedResults[a.id];
        delete this._loadedRawResults[a.id];
        delete this._loadItemsById[a.id];
        delete this._loadItemsBySrc[a.src]
    };
    a._createTag = function(a) {
        var d = null;
        switch (a) {
            case createjs.LoadQueue.IMAGE:
                return document.createElement("img");
            case createjs.LoadQueue.SOUND:
                return d = document.createElement("audio"), d.autoplay = false, d;
            case createjs.LoadQueue.JSONP:
            case createjs.LoadQueue.JAVASCRIPT:
                return d = document.createElement("script"), d.type = "text/javascript", d;
            case createjs.LoadQueue.CSS:
                return d = this.useXHR ? document.createElement("style") :
                    document.createElement("link"), d.rel = "stylesheet", d.type = "text/css", d;
            case createjs.LoadQueue.SVG:
                return this.useXHR ? d = document.createElement("svg") : (d = document.createElement("object"), d.type = "image/svg+xml"), d
        }
        return null
    };
    a._getTypeByExtension = function(a) {
        switch (a.toLowerCase()) {
            case "jpeg":
            case "jpg":
            case "gif":
            case "png":
            case "webp":
            case "bmp":
                return createjs.LoadQueue.IMAGE;
            case "ogg":
            case "mp3":
            case "wav":
                return createjs.LoadQueue.SOUND;
            case "json":
                return createjs.LoadQueue.JSON;
            case "xml":
                return createjs.LoadQueue.XML;
            case "css":
                return createjs.LoadQueue.CSS;
            case "js":
                return createjs.LoadQueue.JAVASCRIPT;
            case "svg":
                return createjs.LoadQueue.SVG;
            default:
                return createjs.LoadQueue.TEXT
        }
    };
    a._sendFileProgress = function(a, d) {
        if (this._isCanceled()) this._cleanUp();
        else {
            var c = {
                target: this,
                type: "fileprogress",
                progress: d,
                loaded: d,
                total: 1,
                item: a
            };
            this.onFileProgress && this.onFileProgress(c);
            this.dispatchEvent(c)
        }
    };
    a._sendFileComplete = function(a, d) {
        if (!this._isCanceled()) {
            var c = {
                target: this,
                type: "fileload",
                loader: d,
                item: a,
                result: this._loadedResults[a.id],
                rawResult: this._loadedRawResults[a.id]
            };
            a.completeHandler && a.completeHandler(c);
            this.onFileLoad && this.onFileLoad(c);
            this.dispatchEvent(c)
        }
    };
    a._sendFileStart = function(a) {
        this.dispatchEvent({
            target: this,
            type: "filestart",
            item: a
        })
    };
    a.toString = function() {
        return "[PreloadJS LoadQueue]"
    };
    c.proxy = function(a, d) {
        return function() {
            return a.apply(d, arguments)
        }
    };
    createjs.LoadQueue = c;
    if (!createjs.proxy) createjs.proxy = function(a, d) {
        var c = Array.prototype.slice.call(arguments, 2);
        return function() {
            return a.apply(d,
                Array.prototype.slice.call(arguments, 0).concat(c))
        }
    };
    var d = function() {};
    d.init = function() {
        var a = navigator.userAgent;
        d.isFirefox = a.indexOf("Firefox") > -1;
        d.isOpera = window.opera != null;
        d.isChrome = a.indexOf("Chrome") > -1;
        d.isIOS = a.indexOf("iPod") > -1 || a.indexOf("iPhone") > -1 || a.indexOf("iPad") > -1
    };
    d.init();
    createjs.LoadQueue.BrowserDetect = d;
    if (!Array.prototype.indexOf) Array.prototype.indexOf = function(a) {
        if (this == null) throw new TypeError;
        var d = Object(this),
            c = d.length >>> 0;
        if (c === 0) return -1;
        var f = 0;
        arguments.length >
            1 && (f = Number(arguments[1]), f != f ? f = 0 : f != 0 && f != Infinity && f != -Infinity && (f = (f > 0 || -1) * Math.floor(Math.abs(f))));
        if (f >= c) return -1;
        for (f = f >= 0 ? f : Math.max(c - Math.abs(f), 0); f < c; f++)
            if (f in d && d[f] === a) return f;
        return -1
    }
})();
this.createjs = this.createjs || {};
(function() {
    var c = function(a, b) {
        this.init(a, b)
    }, a = c.prototype = new createjs.AbstractLoader;
    a._loadTimeout = null;
    a._tagCompleteProxy = null;
    a._isAudio = false;
    a._tag = null;
    a._jsonResult = null;
    a.init = function(a, b) {
        this._item = a;
        this._basePath = b;
        this._tag = a.tag;
        this._isAudio = window.HTMLAudioElement && a.tag instanceof HTMLAudioElement;
        this._tagCompleteProxy = createjs.proxy(this._handleLoad, this)
    };
    a.getResult = function() {
        return this._item.type == createjs.LoadQueue.JSONP ? this._jsonResult : this._tag
    };
    a.cancel = function() {
        this.canceled =
            true;
        this._clean();
        this.getItem()
    };
    a.load = function() {
        var a = this._item,
            b = this._tag;
        clearTimeout(this._loadTimeout);
        this._loadTimeout = setTimeout(createjs.proxy(this._handleTimeout, this), createjs.LoadQueue.LOAD_TIMEOUT);
        if (this._isAudio) b.src = null, b.preload = "auto";
        b.onerror = createjs.proxy(this._handleError, this);
        this._isAudio ? (b.onstalled = createjs.proxy(this._handleStalled, this), b.addEventListener("canplaythrough", this._tagCompleteProxy, false)) : (b.onload = createjs.proxy(this._handleLoad, this), b.onreadystatechange =
            createjs.proxy(this._handleReadyStateChange, this));
        var c = this.buildPath(a.src, this._basePath, a.values);
        switch (a.type) {
            case createjs.LoadQueue.CSS:
                b.href = c;
                break;
            case createjs.LoadQueue.SVG:
                b.data = c;
                break;
            default:
                b.src = c
        }
        if (a.type == createjs.LoadQueue.JSONP) {
            if (a.callback == null) throw Error("callback is required for loading JSONP requests.");
            if (window[a.callback] != null) throw Error('JSONP callback "' + a.callback + '" already exists on window. You need to specify a different callback. Or re-name the current one.');
            window[a.callback] = createjs.proxy(this._handleJSONPLoad, this)
        }
        if (a.type == createjs.LoadQueue.SVG || a.type == createjs.LoadQueue.JSONP || a.type == createjs.LoadQueue.JSON || a.type == createjs.LoadQueue.JAVASCRIPT || a.type == createjs.LoadQueue.CSS) this._startTagVisibility = b.style.visibility, b.style.visibility = "hidden", (document.body || document.getElementsByTagName("body")[0]).appendChild(b);
        b.load != null && b.load()
    };
    a._handleJSONPLoad = function(a) {
        this._jsonResult = a
    };
    a._handleTimeout = function() {
        this._clean();
        this._sendError({
            reason: "PRELOAD_TIMEOUT"
        })
    };
    a._handleStalled = function() {};
    a._handleError = function() {
        this._clean();
        this._sendError()
    };
    a._handleReadyStateChange = function() {
        clearTimeout(this._loadTimeout);
        var a = this.getItem().tag;
        (a.readyState == "loaded" || a.readyState == "complete") && this._handleLoad()
    };
    a._handleLoad = function() {
        if (!this._isCanceled()) {
            var a = this.getItem(),
                b = a.tag;
            if (!(this.loaded || this.isAudio && b.readyState !== 4)) {
                this.loaded = true;
                switch (a.type) {
                    case createjs.LoadQueue.SVG:
                    case createjs.LoadQueue.JSONP:
                        b.style.visibility = this._startTagVisibility, (document.body || document.getElementsByTagName("body")[0]).removeChild(b)
                }
                this._clean();
                this._sendComplete()
            }
        }
    };
    a._clean = function() {
        clearTimeout(this._loadTimeout);
        var a = this.getItem().tag;
        a.onload = null;
        a.removeEventListener && a.removeEventListener("canplaythrough", this._tagCompleteProxy, false);
        a.onstalled = null;
        a.onprogress = null;
        a.onerror = null;
        a.parentNode && a.parentNode.removeChild(a);
        a = this.getItem();
        a.type == createjs.LoadQueue.JSONP && (window[a.callback] = null)
    };
    a.toString = function() {
        return "[PreloadJS TagLoader]"
    };
    createjs.TagLoader = c
})();
this.createjs = this.createjs || {};
(function() {
    var c = function(a, b) {
        this.init(a, b)
    }, a = c.prototype = new createjs.AbstractLoader;
    a._request = null;
    a._loadTimeout = null;
    a._xhrLevel = 1;
    a._response = null;
    a._rawResponse = null;
    a.init = function(a, b) {
        this._item = a;
        this._basePath = b;
        this._createXHR(a)
    };
    a.getResult = function(a) {
        return a && this._rawResponse ? this._rawResponse : this._response
    };
    a.cancel = function() {
        this.canceled = true;
        this._clean();
        this._request.abort()
    };
    a.load = function() {
        if (this._request == null) this._handleError();
        else {
            this._request.onloadstart =
                createjs.proxy(this._handleLoadStart, this);
            this._request.onprogress = createjs.proxy(this._handleProgress, this);
            this._request.onabort = createjs.proxy(this._handleAbort, this);
            this._request.onerror = createjs.proxy(this._handleError, this);
            this._request.ontimeout = createjs.proxy(this._handleTimeout, this);
            if (this._xhrLevel == 1) this._loadTimeout = setTimeout(createjs.proxy(this._handleTimeout, this), createjs.LoadQueue.LOAD_TIMEOUT);
            this._request.onload = createjs.proxy(this._handleLoad, this);
            this._request.onreadystatechange =
                createjs.proxy(this._handleReadyStateChange, this);
            try {
                !this._item.values || this._item.method == createjs.LoadQueue.GET ? this._request.send() : this._item.method == createjs.LoadQueue.POST && this._request.send(this._formatQueryString(this._item.values))
            } catch (a) {
                this._sendError({
                    source: a
                })
            }
        }
    };
    a.getAllResponseHeaders = function() {
        return this._request.getAllResponseHeaders instanceof Function ? this._request.getAllResponseHeaders() : null
    };
    a.getResponseHeader = function(a) {
        return this._request.getResponseHeader instanceof
        Function ? this._request.getResponseHeader(a) : null
    };
    a._handleProgress = function(a) {
        a.loaded > 0 && a.total == 0 || this._sendProgress({
            loaded: a.loaded,
            total: a.total
        })
    };
    a._handleLoadStart = function() {
        clearTimeout(this._loadTimeout);
        this._sendLoadStart()
    };
    a._handleAbort = function() {
        this._clean();
        this._sendError()
    };
    a._handleError = function() {
        this._clean();
        this._sendError()
    };
    a._handleReadyStateChange = function() {
        this._request.readyState == 4 && this._handleLoad()
    };
    a._handleLoad = function() {
        if (!this.loaded) this.loaded = true,
        this._checkError() ? (this._response = this._getResponse(), this._clean(), this._generateTag() && this._sendComplete()) : this._handleError()
    };
    a._handleTimeout = function() {
        this._clean();
        this._sendError({
            reason: "PRELOAD_TIMEOUT"
        })
    };
    a._checkError = function() {
        switch (parseInt(this._request.status)) {
            case 404:
            case 0:
                return false
        }
        return true
    };
    a._getResponse = function() {
        if (this._response != null) return this._response;
        if (this._request.response != null) return this._request.response;
        try {
            if (this._request.responseText != null) return this._request.responseText
        } catch (a) {}
        try {
            if (this._request.responseXML !=
                null) return this._request.responseXML
        } catch (b) {}
        return null
    };
    a._createXHR = function(a) {
        var b = document.createElement("a");
        b.href = this.buildPath(a.src, this._basePath);
        var c = document.createElement("a");
        c.href = location.href;
        b = b.hostname != "" && (b.port != c.port || b.protocol != c.protocol || b.hostname != c.hostname);
        c = null;
        if (b && window.XDomainRequest) c = new XDomainRequest;
        else if (window.XMLHttpRequest) c = new XMLHttpRequest;
        else try {
            c = new ActiveXObject("Msxml2.XMLHTTP.6.0")
        } catch (j) {
            try {
                c = new ActiveXObject("Msxml2.XMLHTTP.3.0")
            } catch (f) {
                try {
                    c =
                        new ActiveXObject("Msxml2.XMLHTTP")
                } catch (o) {
                    return false
                }
            }
        }
        a.type == createjs.LoadQueue.TEXT && c.overrideMimeType && c.overrideMimeType("text/plain; charset=x-user-defined");
        this._xhrLevel = typeof c.responseType === "string" ? 2 : 1;
        var h = null,
            h = a.method == createjs.LoadQueue.GET ? this.buildPath(a.src, this._basePath, a.values) : this.buildPath(a.src, this._basePath);
        c.open(a.method || createjs.LoadQueue.GET, h, true);
        b && c instanceof XMLHttpRequest && this._xhrLevel == 1 && c.setRequestHeader("Origin", location.origin);
        a.values &&
            a.method == createjs.LoadQueue.POST && c.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        if (createjs.LoadQueue.isBinary(a.type)) c.responseType = "arraybuffer";
        this._request = c;
        return true
    };
    a._clean = function() {
        clearTimeout(this._loadTimeout);
        var a = this._request;
        a.onloadstart = null;
        a.onprogress = null;
        a.onabort = null;
        a.onerror = null;
        a.onload = null;
        a.ontimeout = null;
        a.onloadend = null;
        a.onreadystatechange = null
    };
    a._generateTag = function() {
        var a = this._item.tag;
        switch (this._item.type) {
            case createjs.LoadQueue.IMAGE:
                return a.onload =
                    createjs.proxy(this._handleTagReady, this), a.src = this.buildPath(this._item.src, this._basePath, this._item.values), this._rawResponse = this._response, this._response = a, false;
            case createjs.LoadQueue.JAVASCRIPT:
                a = document.createElement("script");
                this._rawResponse = a.text = this._response;
                this._response = a;
                break;
            case createjs.LoadQueue.CSS:
                document.getElementsByTagName("head")[0].appendChild(a);
                if (a.styleSheet) a.styleSheet.cssText = this._response;
                else {
                    var b = document.createTextNode(this._response);
                    a.appendChild(b)
                }
                this._rawResponse =
                    this._response;
                this._response = a;
                break;
            case createjs.LoadQueue.XML:
                this._response = b = this._parseXML(this._response, "text/xml");
                break;
            case createjs.LoadQueue.SVG:
                b = this._parseXML(this._response, "image/svg+xml");
                this._rawResponse = this._response;
                b.documentElement != null ? (a.appendChild(b.documentElement), this._response = a) : this._response = b;
                break;
            case createjs.LoadQueue.JSON:
                a = {};
                try {
                    a = JSON.parse(this._response)
                } catch (c) {
                    a = c
                }
                this._rawResponse = this._response;
                this._response = a
        }
        return true
    };
    a._parseXML = function(a,
        b) {
        var c = null;
        window.DOMParser ? c = (new DOMParser).parseFromString(a, b) : (c = new ActiveXObject("Microsoft.XMLDOM"), c.async = false, c.loadXML(a));
        return c
    };
    a._handleTagReady = function() {
        this._sendComplete()
    };
    a.toString = function() {
        return "[PreloadJS XHRLoader]"
    };
    createjs.XHRLoader = c
})();
typeof JSON !== "object" && (JSON = {});
(function() {
    function c(a) {
        return a < 10 ? "0" + a : a
    }

    function a(a) {
        e.lastIndex = 0;
        return e.test(a) ? '"' + a.replace(e, function(a) {
            var b = o[a];
            return typeof b === "string" ? b : "\\u" + ("0000" + a.charCodeAt(0).toString(16)).slice(-4)
        }) + '"' : '"' + a + '"'
    }

    function d(b, c) {
        var e, n, m, p, q = j,
            k, g = c[b];
        g && typeof g === "object" && typeof g.toJSON === "function" && (g = g.toJSON(b));
        typeof h === "function" && (g = h.call(c, b, g));
        switch (typeof g) {
            case "string":
                return a(g);
            case "number":
                return isFinite(g) ? String(g) : "null";
            case "boolean":
            case "null":
                return String(g);
            case "object":
                if (!g) return "null";
                j += f;
                k = [];
                if (Object.prototype.toString.apply(g) === "[object Array]") {
                    p = g.length;
                    for (e = 0; e < p; e += 1) k[e] = d(e, g) || "null";
                    m = k.length === 0 ? "[]" : j ? "[\n" + j + k.join(",\n" + j) + "\n" + q + "]" : "[" + k.join(",") + "]";
                    j = q;
                    return m
                }
                if (h && typeof h === "object") {
                    p = h.length;
                    for (e = 0; e < p; e += 1) typeof h[e] === "string" && (n = h[e], (m = d(n, g)) && k.push(a(n) + (j ? ": " : ":") + m))
                } else
                    for (n in g) Object.prototype.hasOwnProperty.call(g, n) && (m = d(n, g)) && k.push(a(n) + (j ? ": " : ":") + m);
                m = k.length === 0 ? "{}" : j ? "{\n" + j + k.join(",\n" +
                    j) + "\n" + q + "}" : "{" + k.join(",") + "}";
                j = q;
                return m
        }
    }
    if (typeof Date.prototype.toJSON !== "function") Date.prototype.toJSON = function() {
        return isFinite(this.valueOf()) ? this.getUTCFullYear() + "-" + c(this.getUTCMonth() + 1) + "-" + c(this.getUTCDate()) + "T" + c(this.getUTCHours()) + ":" + c(this.getUTCMinutes()) + ":" + c(this.getUTCSeconds()) + "Z" : null
    }, String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON = function() {
        return this.valueOf()
    };
    var b = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
        e = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
        j, f, o = {
            "\u0008": "\\b",
            "\t": "\\t",
            "\n": "\\n",
            "\u000c": "\\f",
            "\r": "\\r",
            '"': '\\"',
            "\\": "\\\\"
        }, h;
    if (typeof JSON.stringify !== "function") JSON.stringify = function(a, b, c) {
        var e;
        f = j = "";
        if (typeof c === "number")
            for (e = 0; e < c; e += 1) f += " ";
        else typeof c === "string" && (f = c); if ((h = b) && typeof b !== "function" && (typeof b !== "object" || typeof b.length !== "number")) throw Error("JSON.stringify");
        return d("", {
            "": a
        })
    };
    if (typeof JSON.parse !== "function") JSON.parse = function(a, c) {
        function d(a, b) {
            var e, f, g = a[b];
            if (g && typeof g === "object")
                for (e in g) Object.prototype.hasOwnProperty.call(g, e) && (f = d(g, e), f !== void 0 ? g[e] = f : delete g[e]);
            return c.call(a, b, g)
        }
        var e, a = String(a);
        b.lastIndex = 0;
        b.test(a) && (a = a.replace(b, function(a) {
            return "\\u" + ("0000" + a.charCodeAt(0).toString(16)).slice(-4)
        }));
        if (/^[\],:{}\s]*$/.test(a.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,
            "]").replace(/(?:^|:|,)(?:\s*\[)+/g, ""))) return e = eval("(" + a + ")"), typeof c === "function" ? d({
            "": e
        }, "") : e;
        throw new SyntaxError("JSON.parse");
    }
})();