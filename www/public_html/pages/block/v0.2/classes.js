/** Classes */

Object.prototype.inherits = function(parent) {
	this.prototype = Object.create(parent.prototype);
	this.prototype.constructor = this;
}

function extend(out) {
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
}



function Entity(w, h, s, c) {
	this.x = 0;
	this.y = 0;
	this.width = tile(w);
	this.height = tile(h);
	this.prevX = 0;
	this.prevY = 0;
	this.maxSpeed = s;
	this.velX = 0;
	this.velY = 0;
	this.color = c;

	this.position = function(a, b) {
		this.x = tile(a);
		this.y = tile(b);
	}
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
		this.x += this.velX;
		this.y += this.velY;
	}
	this.freezeVel = function(d) {
		if(d !== "y") {this.velX = 0};
		if(d !== "x") {this.velY = 0};
	}
	this.draw = function() {
		ctx.fillStyle = this.color;
		ctx.fillRect(this.x, this.y, this.width, this.height);
	}
}



function Player(w, h, s, j, c) {
	this.inherits(Entity);
	Entity.call(this, w, h, s, c);
	this.jumpSpeed = j;
	this.grounded = false;

	this.control = function() {
		if(keys[38] || keys[32] || keys[87]) { // up or space
			if(this.onGround()) {
				this.jump();
			}
		}
		if(keys[16] && debug) { // debug flying mode
			this.jump();
		}
		if(keys[39] || keys[68]) { // go right
			if(this.velX < this.maxSpeed) {
				this.velX += ACCEL;
			}
		}
		if(keys[37] || keys[65]) { // go left
			if(this.velX > -this.maxSpeed) {
				this.velX -= ACCEL;
			}
		}
		if(!keys[37] && !keys[39] && !keys[68] && !keys[65]) { // neither right nor left
			// apply friction
			this.velX *= (1 - FRICTION);
			// stop player if moving slow enough
			if (Math.abs(this.velX) < 1e-2){
				this.freezeVel("x");
			}
		}
		if(keys[82]) {
			restartLevel();
		}
	}
	this.revert = function() {
		this.grounded = false;
		this.freezeVel();
	}
	this.ground = function() {
		this.grounded = true;
	}
	this.onGround = function() {
		return this.grounded;
	}
	this.jump = function() {
		this.grounded = false;
		this.velY = -this.jumpSpeed;
	}
	this.physics = function() {
		// apply gravity
		this.velY += GRAVITY;

		// grounded
		if(this.onGround()){
			this.freezeVel("y");
		}
		this.grounded = false;
	}
	this.die = function() {
		this.revert();
		for(var x = 0; x < tileWidth; x++) {
			for(var y = 0; y < tileHeight; y++) {
				if(cell(currentLevel, x, y) == 2) {
					this.position(x, y);
				}
			}
		}
	}
}