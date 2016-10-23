function cPixLib(canvas, numberOfColors, randomMode) {
	this.numberOfColors = numberOfColors || 2;
	var ctx = canvas.getContext("2d");
	this.colorPalette = [];
	var color = false,
	    randomMode = randomMode || false;
	    

	for(var i = 0; i < this.numberOfColors; i++) {
		var pxl = ctx.createImageData(1,1);
		if(i == 0) {
			pxl.data[0] = 255;
			pxl.data[1] = 255;
			pxl.data[2] = 255;
			pxl.data[3] = 255;
		} else if(i == 1) {
			pxl.data[0] = 0;
			pxl.data[1] = 0;
			pxl.data[2] = 0;
			pxl.data[3] = 255;
		} else {
			pxl.data[0] = Math.random() * 255;
			pxl.data[1] = Math.random() * 255;
			pxl.data[2] = Math.random() * 255;
			pxl.data[3] = 255;
			color = true;
		}
		this.colorPalette.push(pxl);
	}

	this.pixelOff = function(x, y) {
		ctx.putImageData(this.colorPalette[0], x, y);
	}

	this.pixelOn = function(x, y) {
		ctx.putImageData(this.colorPalette[1], x, y);
	}

	this.pixelColor = function(x, y, c) {
		ctx.putImageData(this.colorPalette[c], x, y);
	}

	this.pixelTest = function(x, y) {
		var id = ctx.getImageData(x, y, 1, 1);
		return [id.data[0], id.data[1], id.data[2]]; /* rgb */
		/* id.data[3] is alpha */
	}

	this.pixelChange = function(x, y) {
		if(this.pixelTest(x, y)[0] == 255 && this.pixelTest(x, y)[1] == 255 && this.pixelTest(x, y)[2] == 255) {
			if(color) {
				if(!randomMode && window.iter) {
					this.pixelColor(x, y, iter % (this.numberOfColors - 1) + 1);
				} else {
					this.pixelColor(x, y, Math.ceil(Math.random() * (this.numberOfColors - 2)) + 1);
				}
			} else {
				this.pixelOn(x, y);
			}
		} else {
			this.pixelOff(x, y);
		}
	}
}
