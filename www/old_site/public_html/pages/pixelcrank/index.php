<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>BLiu1's Website - PixelCrank</title>
	<meta name="description" content="A fullscreen pixel scrambler." />
	<meta name="keywords" content="BLiu1, fullscreen, html5, canvas, pixel, crank, scrambler" />
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
			<h1>PixelCrank</h1>
			<p>This is yet another adventure into the unknown world of HTML5 canvases for me. Basically, it pops a bunch of random colored pixels on your screen continuously.</p>
			<p>I picked PixelCrank as the name because it sounds frenzied (as you will soon see) and because my economics teacher invented the slang word "crank" as an example drug. Anyways, hope you enjoy this as much as I enjoyed making it.</p>
			<p>So without further ado...</p>
			<div id="button">
				<button id="start" class="button-link">Let the Fun Begin!</button>
			</div>
			<br><div id="back"><a href="/pages/">Back</a></div>
		</div>
	</section>
	<canvas id="canvas"></canvas>

	<script src="dat.gui.min.js"></script>
	<script src="init.js"></script>
	<script src="cPixLib.js"></script>
	<script src="main.js"></script>
</body>
</html>
