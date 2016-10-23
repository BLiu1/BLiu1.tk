
// constants
const TILE = 20;

var tileWidth = pixel(width),
    tileHeight = pixel(height),
    box = [
    	{
    		x: 0,
    		y: 0,
    		prevX: 0,
    		prevY: 0,
    		width: tile(2),
    		height: tile(2)
    	},
    	{
    		x: width / 2,
    		y: height / 2,
    		width: tile(2),
    		height: tile(2)
    	}
	],
	keys = [],
	currentLevel = 0,
	mousePos =  {x:0, y:0},
	message = '';

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

function writeMessage(message) {
	ctx.font = '18px sans';
	ctx.fillStyle = 'black';
	ctx.fillText(message, 10, 25);
}
function getMousePos(evt) {
	var rect = canvas.getBoundingClientRect();
	return {
		x: evt.clientX - rect.left,
		y: evt.clientY - rect.top
	};
}

addEvent(canvas, 'mousemove', function(evt) {
	if(mousePos != getMousePos(evt)){
		mousePos = getMousePos(evt);
	}
	message = 'Mouse position: ' + mousePos.x + ',' + mousePos.y;
});

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

	console.log(colDir);
	message = "Collison direction of mouse-box: " + colDir;
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
			break;
		case "right":
			// use current y but shift x left
			a.x -= A.right - B.left;
			break;
		case "left":
			// use current y but shift x right
			a.x += B.right - A.left;
			break;
		case "top":
			// use current x but shift y down
			a.y += B.bottom - A.top;
			break;
		default:
			// shouldn't get here
			a.x = a.prevX;
			a.y = a.prevY;
	}
}

// render / main
function render() {

	// choose your sizes
	box[0].width = box[0].height = tile(getEl("boxA").value);
	box[1].width = box[1].height = tile(getEl("boxB").value);

	// track previous positions
	box[0].prevX = box[0].x;
	box[0].prevY = box[0].y;

	// the first box follows the cursor
	box[0].x = mousePos.x - box[0].width / 2;
	box[0].y = mousePos.y - box[0].height / 2;

	// the other box is centered on the canvas
	box[1].x = width / 2 - box[1].width / 2;
	box[1].y = height / 2 - box[1].height / 2;

	/******************************************/
	// clear
	ctx.clearRect(0,0,width,height);

	// background box
	ctx.fillStyle = "#222222";
	ctx.fillRect(box[1].x, box[1].y, box[1].width, box[1].height);

	// foreground box
	ctx.fillStyle = "red";
	if(intersects(box[0], box[1])){
		resolveCollision(box[0], box[1]);
		ctx.fillStyle = "lime";
	}
	ctx.fillRect(box[0].x, box[0].y, box[0].width, box[0].height);

	// top box
	ctx.fillStyle = "rgba(0,0,0,0.1)";
	ctx.fillRect(box[1].x - box[0].width / 2, box[1].y - box[0].height / 2, box[1].width + box[0].width, box[1].height + box[0].height);
	
	// mouse position and collision direction message
	writeMessage(message);
}

(function animloop(){
	requestAnimationFrame(animloop);
	render();
})();
