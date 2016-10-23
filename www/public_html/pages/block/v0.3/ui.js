/** User Interface */

addEvent(document.body, "keydown", function(e) {
	keys[e.keyCode] = true;
	if(e.keyCode == 32 || e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40) {
		e.preventDefault();
	}
});

addEvent(document.body, "keyup", function(e) {
	keys[e.keyCode] = false;
});

addEvent(getEl("previous"), "click", function(e) {
	startLevel("prev");
});

addEvent(getEl("next"), "click", function(e) {
	startLevel("next");
});

addEvent(getEl("import"), "click", function(e) {
	importLevel();
});
