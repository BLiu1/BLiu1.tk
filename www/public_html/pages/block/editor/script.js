function getEl(el) {return document.getElementById(el);}
function addEvent(t,n,e){return t.addEventListener?(t.addEventListener(n,e,!1),!0):t.attachEvent?t.attachEvent("on"+n,e):(n="on"+n,"function"==typeof t[n]&&(e=function(t,n){return function(){t.apply(this,arguments),n.apply(this,arguments)}}(t[n],e)),t[n]=e,!0)}/*https://gist.github.com/eduardocereto/955642*/

var color = 0,
    colors = ["#000000", "#444444", "#222222", "#2196f3", "#f44336"],
    click = false;

(function(){
	var table = "";
	for(var i = 0; i < 30; i++) {
		table += "<tr>";
		for(var j = 0; j < 40; j++) {
			table += '<td id="' + i.toString() + '-' + j.toString() + '" class=""></td>';
		}
		table += "</tr>";
	}
	getEl("map").innerHTML += table;

    // begin extremely roundabout and processor intensive hack
	for(var i = 0; i < 30; i++) {
		for(var j = 0; j < 40; j++) {
			addDrawEvent(i, j);
		}
	}
	function addDrawEvent(i, j) {
		var cell = i.toString() + '-' + j.toString();
		addEvent(getEl(cell), "mousedown", function() {
			draw(cell);
		});
		addEvent(getEl(cell), "mouseover", function() {
			if(click) {
				draw(cell);
			}
		});
	}
	function draw(el) {
		getEl(el).style.backgroundColor = colors[color];
	}
    // end hack
}());

addEvent(document.body, "mousedown", function(e) {
	click = true;
});
addEvent(document.body, "mouseup", function(e) {
	click = false;
});

addEvent(document.body, "keydown", function(e) {
	if(e.keyCode == 71) {
		if(getEl("style").innerHTML == "td{border:1px rgba(255,255,255,0.1) solid;}") {
			getEl("style").innerHTML = "td{border:1px transparent solid;}";
		} else {
			getEl("style").innerHTML = "td{border:1px rgba(255,255,255,0.1) solid;}";
		}
	}
    if(e.keyCode > 48 && e.keyCode < 59) {
        color = e.keyCode  - 49;
    }
	/*switch(e.keyCode) {
		case 49: color = 0; return; // "1" key
		case 50: color = 1; return; // "2" key
		case 51: color = 2; return; // "3" key
		case 52: color = 3; return; // "4" key
        case 53: color = 4; return; // "5" key
		default: return;
	}*/
});

addEvent(getEl("import"), "click", function() {
	var arr = [], lvlCode = prompt("Paste the code below.");
	if(checkValid(lvlCode)) {
		var x = 0;
		arr = JSON.parse(lvlCode);
		for(var i = 0; i < 30; i++) {
			for (var j = 0; j < 40; j++) {
				getEl(i.toString() + '-' + j.toString()).style.backgroundColor = colors[arr[x]];
				x++;
			}
		}
	}

	function checkValid (str) { // checks for valid characters
		var str = str.toString();
		if(str == "") return 0;
		var validChars = "0123456789,[]" ;
		for(var i = 0; i <= str.length - 1; i++) {
			if(validChars.indexOf(str.charAt(i)) == -1) {
				var character = str.charAt(i);
				alert("Not allowed: " + character);
				return 0;
			}
		}
		return 1;
	}
});

addEvent(getEl("export"), "click", function() {
	var arr = [], check = [0, 0];
	for(var i = 0; i < 30; i++) {
		for (var j = 0; j < 40; j++) {
			var n = 0;
			switch(getEl(i.toString() + '-' + j.toString()).style.backgroundColor){
				case hex2rgb(colors[0]): n = 0; break;
				case hex2rgb(colors[1]): n = 1; break;
				case hex2rgb(colors[2]): n = 2; check[0] += 1; break;
				case hex2rgb(colors[3]): n = 3; check[1] += 1; break;
                case hex2rgb(colors[4]): n = 4; break;
				default: n = 0;
			}
			arr.push(n);
		}
	}
	if(check[0] != 1) {
		alert("There must be one (and only one) entrance. (3)");
	} else if(check[1] == 0) {
		alert("There must be at least one exit point. (4)");
	} else {
		getEl("text").value = "[" + arr + "]";
	}

	function hex2rgb(hex) { // http://stackoverflow.com/a/5624139/2438757
		var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
		return result ? "rgb(" + parseInt(result[1], 16) + ", " + parseInt(result[2], 16) + ", " + parseInt(result[3], 16) + ")" : null;
	}
});

window.onbeforeunload = function(){
    return "Please make sure your work is saved by exporting your level.";
};
