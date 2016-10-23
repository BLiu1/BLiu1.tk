<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>BLiu1's Website - The Pixel Tracer</title>
	<meta name="description" content="A plaything for pixels on canvases." />
	<meta name="keywords" content="BLiu1, html5, canvas, pixel, tracer" />
	<meta name="viewport" content="user-scalable = yes, initial-scale = 1" />
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="license" type="text/html" href="http://creativecommons.org/licenses/by/3.0/" />
	<link rel="stylesheet" type="text/css" href="/pages/pages.css" />
	<link rel="stylesheet" type="text/css" href="/button-link.css" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>
<body>
	<section id="splash" class="overlay">
		<div class="overlay-content">
			<h1>The Pixel Tracer</h1>
			<p>After messing around on a TI-84 calculator for long enough, any computer nerd can find the drawing functions and create a program that uses them. However, such a simple platform is limited by memory and speed constraints that hinder program performance greatly.</p>
			<p>The mechanical marvel you are about to witness is the result of countless hours of work spent on developing a library of pixel-pushing algorithms and porting TI-Basic programs into the much more complex language of JavaScript.</p>
			<p>I now present to you: <em>The Pixel Tracer!</em></p>
			<div id="button">
				<button id="start" class="button-link">Start the Simulation!</button>
			</div>
			<br><div id="back"><a href="/pages/">Back</a></div>
		</div>
	</section>

	<div id="meter"></div>
	<canvas id="canvas"></canvas>

	<script src="fpsmeter.min.js"></script>
	<script src="dat.gui.min.js"></script>
	<script src="init.js"></script>
	<script src="cPixLib.js"></script>
	<script src="main.js"></script>
	<?php include_once(WWWROOT . "/stats.inc"); ?>
	<!-- AddThis Smart Layers BEGIN -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52c236665e0d4dec"></script>
	<script type="text/javascript">
	addthis.layers({
		'theme' : 'transparent',
		'share' : {
		'position' : 'left',
		'numPreferredServices' : 5
		},  
		'whatsnext' : {}  
	});
	</script>
	<!-- AddThis Smart Layers END -->
</body>
</html>
