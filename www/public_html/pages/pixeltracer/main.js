var iter = 0;
window.speed = 2;
var cp = new cPixLib(getEl("canvas"), 12, false);
var gui = new dat.GUI();
gui.add(cp, 'numberOfColors').min(2).max(12).step(1);
gui.add(window, 'speed').min(0).step(1);

function backAndForth(x, k) {
	return Math.round(Math.abs(Math.abs(((Math.round(x)) % (2*k)) - k) - k));
}

function update() {
	// FPS meter
	meter.tickStart();
	for (var y = 0; y < speed; y++) {
		cp.pixelChange(
			backAndForth(0.99 * iter, width),
			backAndForth(iter++, height)
		);
	};
	meter.tick();
}

addEvent(getEl("start"), "click", function(e) {
	getEl("splash").style.display = "none";
	ctx.fillStyle = "#FFF";
	ctx.fillRect(0,0,width,height);
	animloop();
});



function animloop(){
	requestAnimationFrame(animloop);
	update();
};
