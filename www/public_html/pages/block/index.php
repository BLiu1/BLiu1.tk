<?php require_once("incroot.php");
function listlinks() {
	$sitemap = simplexml_load_file('../../custom-sitemap.xml');
	foreach ($sitemap->dir[0]->dir as $currdir) {
		if($currdir["name"] == "block") {
			foreach($currdir->dir as $page) {
				echo "\t\t" . '<a href="' . $page['name'] . '/"><li>' . "\n";
				echo "\t\t\t" . '<img src="thumbnails/' . $page['name'] . '.png" alt="" />' . "\n";
				echo "\t\t\t" . '<div class="caption">' . $page['title'] . '</div>' . "\n";
				echo "\t\t" . '</li></a>' . "\n";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>BLiu1's Website - Block Adventures Splash</title>
	<meta charset="utf-8" />
	<meta name="description" content="A fake blue screen to prank people with." />
	<meta name="keywords" content="block, adventures, js, javascript, html5, web, game, platformer, shooter" />
	<link rel="shortcut icon" href="/pictures/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/pages/pages.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="license" type="text/html" href="http://creativecommons.org/licenses/by/3.0/" />
<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>

<body>

<div id="content">
	<h1>Block Adventures</h1>
	<h3>A Webgame</h3>
	<p>This is a small-scale platformer-shooter that I am making. In fact, this is the first HTML5 game that I have made.</p>
	<p>Click the links below to play and learn more.</p>
	<ul id="links">
<?php listlinks();?>

	</ul>
	<br><div id="back"><a href="/pages/">Back</a></div>
</div>
<?php include_once(WWWROOT . '/stats.inc'); ?>
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