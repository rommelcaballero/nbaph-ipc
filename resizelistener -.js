/*! resizeListener.js | Author: Jens Anders Bakke (http://webfreak.no), 2014 | URL: https://github.com/cfenzo/resizeListener.js | Credits: object-based resize detection based on http://www.backalleycoder.com/2014/04/18/element-queries-from-the-feet-up/ | License: MIT */
(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(factory);
    } else if (typeof exports === 'object') {
        // Node. Does not work with strict CommonJS, but
        // only CommonJS-like enviroments that support module.exports,
        // like Node.
        module.exports = factory();
    } else {
        // Browser globals (root is window)
        root.resizeListener = factory();
    }
}(this, function () {
    // Production steps of ECMA-262, Edition 5, 15.4.4.14
    // Reference: http://es5.github.io/#x15.4.4.14
    if (!Array.prototype.indexOf) {
        Array.prototype.indexOf = function(searchElement, fromIndex) {
            var k;
            if (this == null) {
                throw new TypeError('"this" is null or not defined');
            }

            var O = Object(this);
            var len = O.length >>> 0;
            if (len === 0) {
                return -1;
            }
            var n = +fromIndex || 0;

            if (Math.abs(n) === Infinity) {
                n = 0;
            }
            if (n >= len) {
                return -1;
            }
            k = Math.max(n >= 0 ? n : len - Math.abs(n), 0);
            while (k < len) {
                var kValue;
                if (k in O && O[k] === searchElement) {
                    return k;
                }
                k++;
            }
            return -1;
        };
    }
    // Production steps of ECMA-262, Edition 5, 15.4.4.18
    // Reference: http://es5.github.io/#x15.4.4.18
    if (!Array.prototype.forEach) {
        Array.prototype.forEach = function(callback, thisArg) {
            var T, k;
            if (this == null) {
                throw new TypeError(' this is null or not defined');
            }
            var O = Object(this);
            var len = O.length >>> 0;
            if (typeof callback !== "function") {
                throw new TypeError(callback + ' is not a function');
            }
            if (arguments.length > 1) {
                T = thisArg;
            }
            k = 0;
            while (k < len) {
                var kValue;
                if (k in O) {
                    kValue = O[k];
                    callback.call(T, kValue, k, O);
                }
                k++;
            }
        };
    }

    var attachEvent = document.attachEvent,
        isIE = /*@cc_on!@*/0,
        requestFrame = window.requestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            function(fn){ return window.setTimeout(fn, 20);},
        styles_added = [],
        stylesheet,
        _poller_interval = 250,
        _poller_runner,
        _poller_elements = [],
        object_style = 'display:block;position:absolute;top:0;left:0;width:100%;height:100%;border:none;padding:0;margin:0;opacity:0;z-index:-1000;pointer-events:none;',
        isSVG = function(element){ return (typeof SVGElement !== 'undefined' && (element instanceof SVGElement || !!element.ownerSVGElement) );},
        poll_tagnames = ['img','iframe','picture','audio','video','object','embed'];

    function debounceTrigger(event){
        var el = this;
        if(attachEvent){ // some IE "love", ref http://stackoverflow.com/a/4590231
            if ( !event ) {
                event = window.event;
            }
            el = event.target || event.srcElement;
        }
        if (!el.__trigger__) {
            el.__trigger__ = requestFrame(function(){
                var size = el._lastSize || {width:el.offsetWidth,height:el.offsetHeight};
                el.__eq__.fn.forEach(function(fn){
                    fn.call(el, size, el);
                });
                el.__trigger__ = null;
            });
        }
    }

    // for non-svg
    function attachObject(element,sensorDataAttr){
        element.setAttribute(sensorDataAttr,'true');
        addSensorStyles(sensorDataAttr);
        var obj = document.createElement('object');
        obj.__qe__ = element;
        obj.classid="clsid:25336920-03F9-11CF-8FD0-00AA00686F13";
        obj.type = 'text/html';
        obj.onload = objectLoad;
        if (!isIE) obj.data = 'about:blank';
        element.appendChild(obj);
        if (isIE) obj.data = 'about:blank'; // must add data source after insertion, because IE is a goon
        return obj;
    }
    function objectLoad(){
        var element = this.__qe__,
            doc = element.__eq__.doc = this.contentDocument,
            win = doc.defaultView || doc.parentWindow;

        doc.__qe__ = element;
        win.addEventListener('resize', function(){
            debounceTrigger.call(element);
        });
        element.__eq__.loaded = true;
        debounceTrigger.call(element);
    }
    function addSensorStyles(sensorDataAttr){
        if(!styles_added[sensorDataAttr]){
            var style = '['+sensorDataAttr+']{position: relative;} ['+sensorDataAttr+'] > object{'+object_style+'}';
            if(!stylesheet){
                stylesheet = document.createElement('style');
                stylesheet.type = 'text/css';
                stylesheet.id = 'resize-listener-styles';
                document.getElementsByTagName("head")[0].appendChild(stylesheet);
            }

            if (stylesheet.styleSheet) {
                stylesheet.styleSheet.cssText = style;
            }else {
                stylesheet.appendChild(document.createTextNode(style));
            }
            styles_added[sensorDataAttr] = true;
        }
    }

    // for svg/fallback
    function use_poll(element){// TODO add more tests for elements that needs poll
        return isSVG(element) || poll_tagnames.indexOf(element.tagName.toLowerCase()) > -1 || false;
    }
    function addResizePoller(element){
        if(_poller_elements.indexOf(element) === -1) _poller_elements.push(element);
        if(!_poller_runner) setPollerRunner();
    }
    function removeResizePoller(element){
        var index = _poller_elements.indexOf(element);
        if(index > -1) _poller_elements.splice(index,1);
        if(_poller_elements.length < 1) window.clearInterval(_poller_runner);
    }
    function setPollerRunner(){
        _poller_runner = window.setInterval(function(){
            _poller_elements.forEach(function(element){
                var _lastSize = element._lastSize || {width:0,height:0},
                    _newSize = element.getBoundingClientRect?element.getBoundingClientRect():{width:element.offsetWidth,height:element.offsetHeight};
                if(_newSize.width !== _lastSize.width || _newSize.height !== _lastSize.height){
                    element._lastSize = _newSize;
                    debounceTrigger.call(element);
                }
            });
        },_poller_interval);
    }

    // the add/remove methods
    function addResizeListener(element,fn,force_poll){
        if (!element.__eq__) {
            element.__eq__ = {};
            element.__eq__.fn = [fn];
            if(attachEvent && !force_poll){
                element.attachEvent('onresize', debounceTrigger);
                element.__eq__.ie = true;
            }else if(force_poll || use_poll(element)){
                addResizePoller(element);
                element.__eq__.poller = true;
            }else{
                element.__eq__.object = attachObject(element,'resize-sensor');
            }
        }else{
            element.__eq__.fn.push(fn);
        }
    }
    function removeResizeListener(element,fn){
        if (element.__eq__) {
            if(fn){
                var index = element.__eq__.fn.indexOf(fn);
                if(index > -1) element.__eq__.fn.splice(index,1);
                if(element.__eq__.fn.length > 0) return;
            }
            if(element.__eq__.ie) element.detachEvent('onresize', debounceTrigger);
            if(element.__eq__.object) element.removeChild(element.__eq__.object);
            if(element.__eq__.poller) removeResizePoller(element);
            delete element.__eq__;
        }
    }

    // export!
    return {
        add:addResizeListener,
        remove:removeResizeListener
    };
}));