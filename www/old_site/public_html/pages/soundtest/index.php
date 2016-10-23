<!DOCTYPE html>
<html>
<head>
	<title>Sound Test</title>
	<style>p#notes{font-size: 3em;}</style>
</head>
<body>

<h1>Arbitrary Eighth Note Patterns</h1>
<p id="notes"></p>

<script>
var notes = document.getElementById("notes"),
    snap = new Audio("snap.wav"),
    clap = new Audio("clap.wav"),
    bool = false;
const RATIO = 0.6931471805599453,
      TIME = 300;

(function play(chance){
	if(bool){
		clap.currentTime = 0;
		clap.play();
		bool = false;
	} else {bool = true;}
	
	if(Math.random() < chance){
		snap.currentTime = 0;
		snap.play();
		notes.innerHTML += "&#x1d160; ";
		setTimeout(function(){play(1 -RATIO)}, TIME);
	} else {
		notes.innerHTML += "&#x1d13e; ";
		setTimeout(function(){play(RATIO)}, TIME);
	}
})();
</script>
</body>
</html>
