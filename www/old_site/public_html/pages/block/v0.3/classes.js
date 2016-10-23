/** Classes */

var entities = [];

Object.prototype.inherits = function(parent) {
	this.prototype = Object.create(parent.prototype);
	this.prototype.constructor = this;
}

/*function extend(out) {
	// http://youmightnotneedjquery.com/
	out = out || {};
	for(var i = 1; i < arguments.length; i++) {
		if(!arguments[i]) {
			continue;
		}
		for(var key in arguments[i]) {
			if(arguments[i].hasOwnProperty(key)) {
				out[key] = arguments[i][key];
			}
		}
	}
	return out;
}*/

/** General Classes ****************************************/

function Entity(w, h, s, c) {
	this.isPlayer = function() {return false;};
	this.isEnemy = function() {return false;};
	this.x = 0;
	this.y = -1;
	this.width = tile(w);
	this.height = tile(h);
	this.prevX = 0;
	this.prevY = 0;
	this.dead = false;

	var maxSpeed = s,
	    velX = 0,
	    velY = 0,
	    grounded = false,
	    color = c;

	this.position = function(a, b) {
		this.x = tile(a);
		this.y = tile(b);
	}
	this.posX = function(value) {this.x = value;}
	this.posY = function(value) {this.y = value;}
	this.prev = function() {
		this.prevX = this.x;
		this.prevY = this.y;
	}
	this.checkMoved = function() {
		if(this.prevX == this.x && this.prevY == this.y) {
			return false;
		} else {
			return true;
		}
	}
	this.move = function() {
		this.x += velX;
		this.y += velY;
	}
	this.freezeVel = function(d) {
		if(d !== "y") {velX = 0};
		if(d !== "x") {velY = 0};
	}
	this.revert = function() {
		grounded = false;
		this.freezeVel();
		this.dead = false;
		for(var a = 0, lw = tileWidth; a < lw; a++) {
			for(var b = 0, lh = tileHeight; b < lh; b++) {
				if(cell(currentLevel, a, b) == 2) {
					this.position(a, b + 1 - h);
					a = lw;
					b = lh;
				}
			}
		}
	}
	this.ground = function() {
		grounded = true;
	}
	this.onGround = function() {
		return grounded;
	}
	this.die = function () {
		grounded = false;
		this.freezeVel();
		this.position(-1 * tileWidth, -1 * tileHeight);
		this.dead = true;
	}
	this.isAlive = function () {
		return !this.dead;
	}
	this.go = function(direction) {
		switch (direction) {
			case "right":
				if(velX < maxSpeed) {
					velX += ACCEL;
				}
				break;
			case "left":
				if(velX > -maxSpeed) {
					velX -= ACCEL;
				}
				break;
			case "neither":
				// apply friction
				velX *= (1 - FRICTION);
				// stop player if moving slow enough
				if(Math.abs(velX) < 0.001){
					this.freezeVel("x");
				}
				break;
			default: return;
		}
	}
	this.jump = function(j) {
		grounded = false;
		velY = -j;
	}
	this.physics = function() {
		// apply gravity
		velY += GRAVITY;

		// grounded
		if(grounded){
			this.freezeVel("y");
		}
		grounded = false;
	}
	this.collideWithBox = function() {
		var box = {}, currX = this.x, currY = this.y, currCell;
		for(var pass = 0; pass < 2; pass++) { // check in two passes to avoid killing player on landing on edge of lava lake
			for(var i = -1, lw = pixel(this.width) + 3; i < lw; i++) {
				for(var j = -1, lh = pixel(this.height) + 3; j < lh; j++) {
					box = {
						x: tile(pixel(currX) - 1 + i),
						y: tile(pixel(currY) - 1 + j),
						width: tile(1),
						height: tile(1)
					}

					currCell = cell(currentLevel, pixel(box.x), pixel(box.y));

					switch(pass) {
						case 0:
							if(!(!currCell || currCell == 2 || currCell == 4) && intersects(this, box)) {
								if(currCell == 3) {
									startLevel("next");
									return;
								}
								resolveCollision(this, box);
							}
							break;
						case 1:
							if(currCell == 4 && cell(currentLevel, pixel(box.x), pixel(box.y) - 1) !== 4) { // if liquid, lower height
								box.y += tile(1 - LIQUID_LEVEL);
								box.height = tile(LIQUID_LEVEL);
							}

							if((currCell == 4) && intersects(this, box)) {
								this.die();
								return;
							}
							break;
						default: break;
					}
				}
			}
		}
	}
	this.draw = function() {
		ctx.fillStyle = color;
		ctx.fillRect(Math.round(this.x, 0), Math.round(this.y, 0), (this.width < 0.05 ? 1 : this.width), (this.height < 0.05 ? 1 : this.height));
	}
}



function Player(w, h, s, j, c) {
	this.inherits(Entity);
	Entity.call(this, w, h, s, c);
	this.isPlayer = function() {return true;};

	var jumpSpeed = j,
	    focus = false,
		parentDie = this.die;

	this.focus = function() {
		focus = true;
	}
	this.unfocus = function() {
		focus = false;
	}
	this.control = function() {
		if(focus) {
			if(keys[38] || keys[32] || keys[87]) { // up or space
				if(this.onGround()) {
					this.jump(jumpSpeed);
				}
			}
			if(keys[16] && debug) { // debug flying mode
				this.jump(jumpSpeed);
			}
			if(keys[39] || keys[68]) { // go right
				this.go("right");
			}
			if(keys[37] || keys[65]) { // go left
				this.go("left");
			}
			if(!keys[37] && !keys[39] && !keys[68] && !keys[65]) { // neither right nor left
				this.go("neither");
			}
			if(keys[67]) {
				keys[67] = false;
				this.switch();
			}
		}
	}
	this.switch = function() {
		var playerIndices = [],
		    currPlayerIndex;
		for(var i = 0; i < entities.length; i++) {
			if(entities[i].isPlayer() && entities[i].isAlive()) {
				playerIndices.push(i);
			}
			if(entities[i] === this){
				currPlayerIndex = i;
			}
		}

		this.unfocus();
		this.freezeVel("x");

		if(playerIndices.length > 1) {
			var currPlayerObj = entities.splice(currPlayerIndex, 1);
			entities.unshift(currPlayerObj[0]);

			while (true) {
				var lastEntity = entities[entities.length - 1];
				if (lastEntity.isPlayer() && lastEntity.isAlive()) {
					lastEntity.focus();
					break;
				} else {
					var last = entities.pop();
					entities.unshift(last);
				}
			}

			/*
			var n = playerIndices.indexOf(currPlayerIndex),
			    t = n;
			for(n++; n != t; n++) {
				if(n + 1 > playerIndices.length) { // loop to beginning of array
					n = 0;
				}
				entities[playerIndices[n]].focus();
				return;
			}*/
		}
	}

	this.die = function() {
		this.switch();
		parentDie.call(this);
	}
}

function NPC(w, h, s, c, a, b, m) {
	this.inherits(Entity);
	Entity.call(this, w, h, s, c);

	var initialX = a,
	    initialY = b,
		movementAI = m;

	this.control = function() {
		switch (movementAI.type) {
			case "backAndForth": backAndForth.apply(movementAI.input); break;
			default:

		}

		function backAndForth(input) {
			// add code to 'go' back and forth
		}
	}
}

function Enemy(w, h, s, c, a, b, m) {
	this.inherits(NPC);
	NPC.call(this, w, h, s, c, a, b, m);

	this.isEnemy = function() {return true;};
}

/** Specific Classes ****************************************/

function smallNPC(a, b, c) {
	this.inherits(NPC);
	var movement = {
		type: "backAndForth",
		input: [] // to be continued ...
	};
	NPC.call(this, 1, 1, 4, c, a, b, movement);
}

function smallPlayer(c) {
	this.inherits(Player);
	Player.call(this, 1, 1, 4, 10, c);
}

function tallPlayer(c) {
	this.inherits(Player);
	Player.call(this, 1, 3, 4, 10.7, c);
}

function fatPlayer(c) {
	this.inherits(Player);
	Player.call(this, 2, 2, 4, 9.5, c);
}
