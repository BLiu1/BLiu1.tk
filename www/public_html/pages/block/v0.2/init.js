/** Initiation */
// requestAnimationFrame polyfill from http://www.paulirish.com/2011/requestanimationframe-for-smart-animating/ and http://my.opera.com/emoller/blog/2011/12/20/requestanimationframe-for-smart-er-animating
(function(){var lastTime=0;var vendors=["webkit","moz","ms","o"];for(var x=0;x<vendors.length&&!window.requestAnimationFrame;++x){window.requestAnimationFrame=window[vendors[x]+"RequestAnimationFrame"];window.cancelAnimationFrame=window[vendors[x]+"CancelAnimationFrame"]||window[vendors[x]+"CancelRequestAnimationFrame"]}if(!window.requestAnimationFrame)window.requestAnimationFrame=function(callback,element){var currTime=(new Date).getTime();var timeToCall=Math.max(0,16-(currTime-lastTime));var id=window.setTimeout(function(){callback(currTime+timeToCall)},timeToCall);lastTime=currTime+timeToCall;return id};if(!window.cancelAnimationFrame)window.cancelAnimationFrame=function(id){clearTimeout(id)}})();

// general helper functions
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

/******************************************/

// FPS meter
var meter = new FPSMeter(getEl("meter"), {theme: 'dark', smoothing: 1, graph: 1, history: 20});

// constants
const TILE = 20,
      ACCEL = 1,
      FRICTION = 0.8,
      GRAVITY = 0.5,
      COLORS = [
        "#000000", // background black
        "#444444", // medium gray
        "#222222", // dark gray - player spawn point
        "#2196f3" // blue - exit
      ];

// global variables
var tileWidth = pixel(width),
    tileHeight = pixel(height),
    keys = [],
    currentLevel = 1,
    debug = true;

// more helper functions
function tile(t) {
    return t * TILE;
}
function pixel(p) {
    return Math.floor(p / TILE);
}
function cell(l, x, y) {
    return levels[l][x + (y * tileWidth)];
}
function tcell(l, i) {
    var result = [
        Math.floor(levels[l] / tileWidth),
        levels[l] % tileWidth
    ];
    return result;
}