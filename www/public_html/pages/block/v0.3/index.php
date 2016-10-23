<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<!-- Hey, you're looking at the source code! -->
<html>
<head>
	<title>BLiu1's Website - Block Adventures</title>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/pages/pages.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="license" type="text/html" href="http://opensource.org/licenses/MIT" />
<?php /*include_once(WWWROOT . '/ga.inc'); */?>
</head>
<body>
	<!--<a href="https://github.com/BLiu1/block" id="github_ribbon"><img style="position: absolute; top: 0; right: 0; border: 0; z-index: 9001;" src="https://github-camo.global.ssl.fastly.net/52760788cde945287fbb584134c4cbc2bc36f904/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f77686974655f6666666666662e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_white_ffffff.png"></a>
	<h1>Block Adventures</h1>-->
	<div id="meter"></div>
	<canvas id="canvas"></canvas>
	<button id="previous">Previous Level</button>
	<button id="next">Next Level</button>
	<button id="import">Import</button>
	<script src="fpsmeter.min.js"></script>
	<script src="init.js"></script>
	<script src="levels.js"></script>
	<script src="classes.js"></script>
	<script src="main.js"></script>
	<script src="ui.js"></script>
	<?php /*include_once(WWWROOT . '/stats.inc');*/ ?>
</body>
</html>
