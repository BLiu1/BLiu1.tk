// FPS meter
var meter = new FPSMeter(getEl("meter"), {theme: 'dark', smoothing: 1, graph: 1, history: 20});

// constants
const TILE = 20,
      ACCEL = 1,
      FRICTION = 0.8,
      GRAVITY = 0.5,
      COLORS = [
      	"#000000", // background black
      	"#444444", // dark gray
      	"#222222", // light gray - player spawn point
      	"#2196f3" // blue - exit
      ];

var tileWidth = pixel(width),
    tileHeight = pixel(height),
    player = {
    	x: 0,
    	y: 0,
    	prevX: 0,
    	prevY: 0,
    	width: tile(1),
    	height: tile(1),
    	maxSpeed: 4,
    	jumpSpeed: 10,
    	velX: 0,
    	velY: 0,
    	jumping: false,
    	grounded: false
	},
	keys = [],
	currentLevel = 1;

// helper functions
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

function startLevel(l) {
	currentLevel = l;
	player.velX = 0;
	player.velY = 0;
	player.jumping = false;
	player.grounded = false;
	for(var x = 0; x < tileWidth; x++) {
		for(var y = 0; y < tileHeight; y++) {
			if(cell(l, x, y) == 2) {
				player.x = tile(x);
				player.y = tile(y);
			}
		}
	}
}

function restartLevel() {
	startLevel(currentLevel);	
}

function intersects(a, b) { // AABB
	var A = {
	    	left: a.x,
	    	right: a.x + a.width,
	    	top: a.y,
	    	bottom: a.y + a.height,
	    	width: a.width,
	    	height: a.height
	    },
	    B = {
	    	left: b.x,
	    	right: b.x + b.width,
	    	top: b.y,
	    	bottom: b.y + b.height,
	    	width: b.width,
	    	height: b.height
	    };

	if(A.right > B.left && A.left < B.right && A.bottom > B.top && A.top < B.bottom) {
		return true;
	} else {
		return false;
	}
}

function collisionDir(a, b) { // gives side of a that a collided b
	var A = { // previous player positions
	    	left: a.prevX,
	    	right: a.prevX + a.width,
	    	top: a.prevY,
	    	bottom: a.prevY + a.height,
	    	width: a.width,
	    	height: a.height
	    },
	    B = { // background box
	    	left: b.x,
	    	right: b.x + b.width,
	    	top: b.y,
	    	bottom: b.y + b.height,
	    	width: b.width,
	    	height: b.height
	    },
	    colDir = "";

	if(A.bottom <= B.top) {
		colDir = "bottom";
	} else if(A.right <= B.left) {
		colDir = "right";
	} else if(A.left >= B.right) {
		colDir = "left";
	} else if(A.top >= B.bottom) {
		colDir = "top";
	} else {
		colDir = "none";
	}

	return colDir;
}

function resolveCollision(a, b) {
	var A = {
	    	left: a.x,
	    	right: a.x + a.width,
	    	top: a.y,
	    	bottom: a.y + a.height,
	    	width: a.width,
	    	height: a.height
	    },
	    B = {
	    	left: b.x,
	    	right: b.x + b.width,
	    	top: b.y,
	    	bottom: b.y + b.height,
	    	width: b.width,
	    	height: b.height
	    },
	    colDir = collisionDir(a, b);

	switch(colDir){
		case "bottom":
			// use current x but shift y up
			a.y -= A.bottom - B.top;
			player.velY = 0;
			player.jumping = false;
			player.grounded = true;
			break;
		case "right":
			// use current y but shift x left
			a.x -= A.right - B.left;
			player.velX = 0;
			break;
		case "left":
			// use current y but shift x right
			a.x += B.right - A.left;
			player.velX = 0;
			break;
		case "top":
			// use current x but shift y down
			a.y += B.bottom - A.top;
			player.velY = 0;
			break;
		default:
			// shouldn't get here
			a.x = a.prevX;
			a.y = a.prevY;
	}
}

// render / main
function render() {
	meter.tickStart();

	// track previous positions
	player.prevX = player.x;
	player.prevY = player.y;

	// check keys
	if(keys[38] || keys[32] || keys[87]) { // up or space
		if(!player.jumping && player.grounded) {
			player.jumping = true;
			player.grounded = false;
			player.velY = -player.jumpSpeed;
		}
	}
	if(keys[39] || keys[68]) { // go right
		if(player.velX < player.maxSpeed) {
			player.velX += ACCEL;
		}
	}
	if(keys[37] || keys[65]) { // go left
		if(player.velX > -player.maxSpeed) {
			player.velX -= ACCEL;
		}
	}
	if(!keys[37] && !keys[39] && !keys[68] && !keys[65]) { // neither right nor left
		// apply friction
		player.velX *= (1 - FRICTION);
		// stop player if moving slow enough
		if (Math.abs(player.velX) < 1e-2){
			player.velX = 0;
		}
	}
	if(keys[82]) {
		restartLevel();
	}

	// apply gravity
	player.velY += GRAVITY;

	// grounded
	if(player.grounded){
		player.velY = 0;
	}
	player.grounded = false;
	
	// move player
	player.x += player.velX;
	player.y += player.velY;

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
		restartLevel();
	}

	/********************* Actual Drawing Begins Here *********************/
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
	ctx.fillStyle = "red";
	ctx.fillRect(player.x, player.y, player.width, player.height);

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
