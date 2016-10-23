/** Main */

(function() {
	entities = [
		new Player(0.2, 0.2, 4, 20, "cyan"),
		new Player(3, 0.5, 4, 14, "yellow"),
		new Player(0.5, 2, 4, 30, "magenta"),
		new fatPlayer("blue"),
		new tallPlayer("lime"),
		new smallPlayer("red")
	];
	entities[entities.length - 1].focus();
})();

function startLevel(l) { // l can be "next", "prev", or a number
	if(l === "next"){
		if(levels[currentLevel + 1]) {
			l = currentLevel + 1;
		} else {
			l = 0;
		}
	} else if(l === "prev") {
		if(levels[currentLevel - 1]) {
			l = currentLevel - 1;
		} else {
			l = levels.length - 1;
		}
	}
	currentLevel = l;
	for(var e = 0, l = entities.length; e < l; e++) {
		entities[e].revert();
		entities[e].unfocus();
	}
	entities[entities.length - 1].focus();
	render();
}

function restartLevel() {
	startLevel(currentLevel);
}

function checkValid(str) { // checks for valid characters
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

function importLevel() {
	var arr = [], lvlCode = prompt("Paste the code below.");
	if(checkValid(lvlCode)) {
		arr = JSON.parse(lvlCode);
		levels.push(arr);
	}
	startLevel(levels.length - 1);
}

function intersects(a, b) { // AABB
	//     a.right > b.left      a.left < b.right            a.bottom > b.top        a.top < b.bottom
	if((a.x + a.width) > b.x && a.x < (b.x + b.width) && (a.y + a.height) > b.y && a.y < (b.y + b.height)) {
		return true;
	} else {
		return false;
	}
}

function collisionDir(e, b) { // gives side of e that e collided b
	if((e.prevY + e.height) <= b.y) {
		return "bottom";
	} else if((e.prevX + e.width) <= b.x) {
		return "right";
	} else if(e.prevX >= (b.x + b.width)) {
		return "left";
	} else if(e.prevY >= (b.y + b.height)) {
		return "top";
	} else {
		return "none";
	}
}

function resolveCollision(e, b) { // between entity and box
	switch(collisionDir(e, b)){
		case "bottom":
			// use current x but shift y up
			e.posY(b.y - e.height);
			e.freezeVel("y");
			e.ground();
			break;
		case "right":
			// use current y but shift x left
			e.posX(b.x - e.width);
			e.freezeVel("x");
			break;
		case "left":
			// use current y but shift x right
			e.posX(b.x + b.width);
			e.freezeVel("x");
			break;
		case "top":
			// use current x but shift y down
			e.posY(b.y + b.height);
			e.freezeVel("y");
			break;
		default:
			// shouldn't get here
			e.posX(e.prevX);
			e.posY(e.prevY);
	}
}

// main function
function update() {
	// FPS meter
	meter.tickStart();

	// check for restart
	if(keys[82]) {
		restartLevel();
	}

	// for all entities
	for(var e = 0, l = entities.length; e < l; e++) {
		var entity = entities[e];

		if(entity.isAlive()){
			// track previous positions
			entity.prev();

			// check keys
			entity.control();

			// environment physics
			entity.physics();

			// move entities
			entity.move();

			// restrain entity to canvas
			if(entity.x >= width - entity.width) {
				entity.posX(width - entity.width);
			} else if(entity.x <= 0) {
				entity.posX(0);
			}
			if(entity.y > height) {
				// entity.posY(height - entity.height);
				entity.die();
			}

			// handle collision of boxes in ~ 1-block radius
			entity.collideWithBox();
		}
	}
	render();

	meter.tick();
}

// actual drawing
function render() {
	// check to see if any entity has moved
	var moved = false;
	for(var e = 0, l = entities.length; e < l; e++) {
		if(entities[e].checkMoved()) {
			moved = true;
			e = l;
		}
	}

	if(moved) {
		// clear
		ctx.clearRect(0,0,width,height);

		// draw level
		for(var x = 0; x < tileWidth; x++) {
			for(var y = 0; y < tileHeight; y++) {
				if(cell(currentLevel, x, y)) {
					ctx.fillStyle = COLORS[cell(currentLevel, x, y)];
					if(cell(currentLevel, x, y) == 4 && cell(currentLevel, x, y - 1) !== 4){
						// if current cell is lava BUT is not bordered on by lava on top
						ctx.fillRect(tile(x), tile(y + (1 - LIQUID_LEVEL)), tile(1), tile(LIQUID_LEVEL));
					} else {
						ctx.fillRect(tile(x), tile(y), tile(1), tile(1));
					}
				}
			}
		}

		// draw all entities
		for(var e = 0, l = entities.length; e < l; e++) {
			entities[e].draw();
		}
	}
}

(function() {
	startLevel(0);
})();
(function animloop(){
	requestAnimationFrame(animloop);
	update();
})();
