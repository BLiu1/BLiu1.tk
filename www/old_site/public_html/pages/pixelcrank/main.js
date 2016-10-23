setTimeout(function() {

	window.gui = new dat.GUI({load:{
	  "preset": "Default",
	  "closed": false,
	  "remembered": {
		"Default": {
		  "0": {
		  	"colorVariance": Crank.colorVariance,
		    "speed": Crank.speed,
		    "pixelSize": Crank.pixelSize
		  }
		},
		"Relaxed": {
		  "0": {
		    "colorVariance": 2.6,
		    "speed": 0.5,
		    "pixelSize": 5
		  }
		},
		"Frantic": {
		  "0": {
		    "colorVariance": 7,
		    "speed": 4,
		    "pixelSize": 1
		  }
		}
	  },
	  "folders": {}
	}
	});

	gui.remember(Crank);

	var fSettings = gui.addFolder('Settings');
	var fColors = gui.addFolder('Colors');

	Crank.updateIterations = function() {
		Crank.iterations = Math.pow(16, Crank.speed) - 1;
	};
	Crank.updateIterations();
	Crank.changeColors = function() {
		window.cp = new cPixLib(getEl("canvas"), 128, true);
		cp.numberOfColors = Math.round(Math.pow(2, Crank.colorVariance), 0);
        for(var col = 0, lCol = cp.numberOfColors; col < lCol; col++) {
    		Crank.colorPalette["color" + col.toString()] = [];
    		Crank.colorPalette["color" + col.toString()][0] = cp.colorPalette[col].data[0];
    		Crank.colorPalette["color" + col.toString()][1] = cp.colorPalette[col].data[1];
    		Crank.colorPalette["color" + col.toString()][2] = cp.colorPalette[col].data[2];
    		Crank.colorPalette["color" + col.toString()][3] = 1;
    	}
        for(var ctr in fColors.__controllers) {
            fColors.__controllers[ctr].updateDisplay();
        }
	};
	Crank.changeColors();

	gui.add(Crank, 'changeColors');
	var ctrColors = fSettings.add(Crank, 'colorVariance', 1, 7).step(0.1);
	var ctrSpeed  = fSettings.add(Crank, 'speed', 0, 4).step(0.1);
	var ctrSize   = fSettings.add(Crank, 'pixelSize', 0, 7).step(0.2);

	for(var col = 0, lCol = cp.numberOfColors; col < lCol; col++) {
		var temp = fColors.addColor(Crank.colorPalette, 'color' + col.toString());
		temp.onChange(function() {
			for(var col = 0, lCol = cp.numberOfColors; col < lCol; col++) {
				cp.colorPalette[col].data[0] = Crank.colorPalette["color" + col.toString()][0];
				cp.colorPalette[col].data[1] = Crank.colorPalette["color" + col.toString()][1];
				cp.colorPalette[col].data[2] = Crank.colorPalette["color" + col.toString()][2];
			}
		})
	}

	fSettings.open();

	ctrColors.onChange(function(){cp.numberOfColors = Math.round(Math.pow(2, Crank.colorVariance), 0)});
	ctrSpeed.onChange(Crank.updateIterations);
	ctrSize.onChange(Crank.updateIterations);
}, 0);

function update() {
	for(var c = 0; c < Crank.iterations; c++) {
		cp.pixelOnColor(
			Math.floor(Math.random() * width),
			Math.floor(Math.random() * height)
		);
	};

	// on pixelSize change
	if(Crank.pixelRatio != Math.pow(2, Crank.pixelSize)){
		resizeCanvas();
	}
}

addEvent(getEl("start"), "click", function(e) {
	getEl("splash").style.display = "none";
	animloop();
});



function animloop(){
	requestAnimationFrame(animloop);
	update();
};
