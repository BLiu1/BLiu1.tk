// GENERAL CANVAS SETUP

// requestAnimationFrame polyfill from http://www.paulirish.com/2011/requestanimationframe-for-smart-animating/ and http://my.opera.com/emoller/blog/2011/12/20/requestanimationframe-for-smart-er-animating
(function(){var lastTime=0;var vendors=["webkit","moz","ms","o"];for(var x=0;x<vendors.length&&!window.requestAnimationFrame;++x){window.requestAnimationFrame=window[vendors[x]+"RequestAnimationFrame"];window.cancelAnimationFrame=window[vendors[x]+"CancelAnimationFrame"]||window[vendors[x]+"CancelRequestAnimationFrame"]}if(!window.requestAnimationFrame)window.requestAnimationFrame=function(callback,element){var currTime=(new Date).getTime();var timeToCall=Math.max(0,16-(currTime-lastTime));var id=window.setTimeout(function(){callback(currTime+timeToCall)},timeToCall);lastTime=currTime+timeToCall;return id};if(!window.cancelAnimationFrame)window.cancelAnimationFrame=function(id){clearTimeout(id)}})();

// helper functions
var getEl = function(el) {return document.getElementById(el);},
    addEvent = function(obj, evt, fnc) { // https://gist.github.com/eduardocereto/955642
    	if (obj.addEventListener) {
    		obj.addEventListener(evt, fnc, false);
    		return true;
    	} else if (obj.attachEvent) {
    		return obj.attachEvent('on' + evt, fnc);
    	} else {
    		evt = 'on'+evt;
    		if(typeof obj[evt] === 'function'){
    			fnc = (function(f1,f2){
    				return function(){
    					f1.apply(this,arguments);
    					f2.apply(this,arguments);
    				}
    			})(obj[evt], fnc);
    		}
    		obj[evt] = fnc;
    		return true;
    	}
    	return false;
    }; 

var canvas = getEl('canvas'),
    ctx    = canvas.getContext('2d'),
    width  = canvas.width  = 800,
    height = canvas.height = 600;
