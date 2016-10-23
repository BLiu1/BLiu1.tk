/** Main */

var player = new Player(1, 1, 4, 10, "red");

function startLevel(l) {
	currentLevel = l;
	player.revert();
	for(var x = 0; x < tileWidth; x++) {
		for(var y = 0; y < tileHeight; y++) {
			if(cell(l, x, y) == 2) {
				player.position(x, y);
			}
		}
	}
}

function restartLevel() {
	startLevel(currentLevel);
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

function importLevel() {
	var arr = [], lvlCode = prompt("Paste the code below.");
	if(checkValid(lvlCode)) {
		arr = JSON.parse(lvlCode);
		levels.push(arr);
	}
	startLevel(levels.length - 1);
}

function intersects(a, b) { // AABB
	if((a.x + a.width) > b.x && a.x < (b.x + b.width) && (a.y + a.height) > b.y && a.y < (b.y + b.height)) {
		return true;
	} else {
		return false;
	}
}

function collisionDir(a, b) { // gives side of a that a collided b
	if((a.prevY + a.height) <= b.y) {
		return "bottom";
	} else if((a.prevX + a.width) <= b.x) {
		return "right";
	} else if(a.prevX >= (b.x + b.width)) {
		return "left";
	} else if(a.prevY >= (b.y + b.height)) {
		return "top";
	} else {
		return "none";
	}
}

function resolveCollision(p, b) { // between player and box
	switch(collisionDir(p, b)){
		case "bottom":
			// use current x but shift y up
			p.y -= p.y + p.height - b.y;
			p.freezeVel("y");
			p.ground();
			break;
		case "right":
			// use current y but shift x left
			p.x -= p.x + p.width - b.x;
			p.freezeVel("x");
			break;
		case "left":
			// use current y but shift x right
			p.x += b.x + b.width - p.x;
			p.freezeVel("x");
			break;
		case "top":
			// use current x but shift y down
			p.y += b.y + b.height - p.y;
			p.freezeVel("y");
			break;
		default:
			// shouldn't get here
			p.x = p.prevX;
			p.y = p.prevY;
	}
}

// render / main
function render() {
	// FPS meter
	meter.tickStart();

	// track previous positions
	player.prev();

	// check keys
	player.control();

	// environment physics
	player.physics();

	// move player
	player.move();

	// handle collision
	var box = {}, currX = player.x, currY = player.y, currCell;
	for(var i = -1; i < (pixel(player.width) + 3); i++) {
		for(var j = -1; j < (pixel(player.height) + 3); j++) {
			var box = {
				x: tile(Math.floor(pixel(currX) - 1) + i),
				y: tile(Math.floor(pixel(currY) - 1) + j),
				width: tile(1),
				height: tile(1)
			}

			currCell = cell(currentLevel, pixel(box.x), pixel(box.y));

			if(!(!currCell || currCell == 2) && intersects(player, box)) {
				resolveCollision(player, box);
				if(currCell == 3) {
					if(levels[currentLevel + 1]) {
						startLevel(currentLevel + 1);
					} else {
						startLevel(0);
					}
				}
			}
		}
	}

	// restrain player to canvas
	if(player.x >= width - player.width) {
		player.x = width - player.width;
	} else if(player.x <= 0) {
		player.x = 0;
	}
	if(player.y >= height - player.height) {
		// player.y = height - player.height;
		player.die();
	}

	/********************* Actual Drawing Begins Here *********************/
	// check to see if player position moved
	if(player.checkMoved()) {
		// clear
		ctx.clearRect(0,0,width,height);

		// draw level
		for(var x = 0; x < tileWidth; x++) {
			for(var y = 0; y < tileHeight; y++) {
				if(cell(currentLevel, x, y)){
					ctx.fillStyle = COLORS[cell(currentLevel, x, y)];
					ctx.fillRect(tile(x), tile(y), tile(1), tile(1));
				}
			}
		}

		// draw player
		player.draw();
	}

	meter.tick();
}

addEvent(document.body, "keydown", function(e) {
	keys[e.keyCode] = true;
	if(e.keyCode == 32 || e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40) {
		e.preventDefault();
	}
});

addEvent(document.body, "keyup", function(e) {
	keys[e.keyCode] = false;
});


startLevel(0);
(function animloop(){
	requestAnimationFrame(animloop);
	render();
})();
