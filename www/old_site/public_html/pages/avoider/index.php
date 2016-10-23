<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<!-- Hey, you're looking at the source code! Don't cheat! -->
<html>
<head>
	<title>BLiu1's Website - Avoider Game</title>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/pages/pages.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="license" type="text/html" href="http://opensource.org/licenses/MIT" />
	<style></style>
<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>
<body>
	<a href="https://github.com/BLiu1/avoider" id="github_ribbon"><img style="position: absolute; top: 0; right: 0; border: 0; z-index: 9001;" src="https://github-camo.global.ssl.fastly.net/52760788cde945287fbb584134c4cbc2bc36f904/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f77686974655f6666666666662e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_white_ffffff.png"></a>
	<div id="overlay1" class="overlay">
		<h1>Avoider</h1>
		<button id="start" class="button-link">Start</button>
		<button id="help1" class="button-link help">Help</button>
		<div><noscript>JavaScript needs to be enabled to play this game.</noscript></div>
	</div>
	<div id="overlay2" class="overlay">
		<h1>Select a difficulty level</h1>
		<button id="b1" class="button-link">Novice</button>
		<button id="b2" class="button-link">Easy</button>
		<button id="b3" class="button-link">Normal</button>
		<button id="b4" class="button-link">Medium</button>
		<button id="b5" class="button-link">Hard</button>
		<button id="b6" class="button-link">Challenging</button>
		<button id="b7" class="button-link">Expert</button>
		<button class="button-link" id="showMore">Show More</button>
	</div>
	<div id="overlay3" class="overlay">
		<h1>Choose a color</h1>
		<button id="c1"></button>
		<button id="c2"></button>
		<button id="c3"></button>
		<button id="c4"></button>
		<button id="c5"></button>
		<button id="c6"></button>
		<button id="c7"></button>
	</div>
	<div id="content">
		<div id="pointsdiv">Score:<p id="points">0</p></div>
		<div id="livesdiv">Lives:<p id="lives">5</p></div>
		<table id="mainTable"></table>
		<div id="message">Use the left and right arrow keys to move.</div>
		<div id="help2" class="help button-link">Help</div>
		<a href="/pages/" id="back">Back</a>
	</div>
	<?php include_once(WWWROOT . '/stats.inc'); ?>
	<script src="script-min.js"></script>
		<!-- AddThis Smart Layers BEGIN -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52c236665e0d4dec"></script>
	<script type="text/javascript">
	addthis.layers({
		'theme' : 'transparent',
		'share' : {
		'position' : 'left',
		'numPreferredServices' : 5
		}
	});
	</script>
	<!-- AddThis Smart Layers END -->
</body>
</html>