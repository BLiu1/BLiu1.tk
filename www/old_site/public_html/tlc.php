<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>BLiu1's Website - LOL Found</title>
	<meta name="description" content="The website of Brian Liu, a work in progress." />
	<meta name="keywords" content="BLiu1, Brian Liu" />
	<meta name="viewport" content="user-scalable=yes,initial-scale=1" /> 
	<link rel="icon" href="http://bliu1.tk/favicon.ico" type="image/x-icon" />
	<link rel="license" type="text/html" href="http://creativecommons.org/licenses/by/3.0/" />
	<link rel="stylesheet" type="text/css" href="http://bliu1.tk/main.css" />
	<style>
		#not_found {color: red;}
		#machine {
			margin: 20px;
			height: 22080px;
			background-color: #666666;
			background-repeat: repeat-y;
			background-position: center top;
			background-image: url('/images/machine.gif');
		}
	</style>
<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>

<body>
<header>
	<h1>BLiu1's <span>Site</span></h1>
	<?php include_once(WWWROOT . '/menu.php'); ?>
</header>

<section>
	<h2 id="not_found"><img src="http://bliu1.tk/images/404.png" alt="404" /> LOL&nbsp;Found</h2>
	<p>I'm sorry, but there is a page on another website with that web address.</p>
	<p>Go to <a href="http://htwins.net">HTwins.net</a>; there's lots of cool stuff there!</p>
	<div id="machine"></div>
	<p>Image Credit to the HTwins.</p>
</section>

<?php include_once(WWWROOT . '/footer.inc'); include_once(WWWROOT . '/stats.inc'); ?>
</body>
</html>