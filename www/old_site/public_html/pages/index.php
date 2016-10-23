<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>BLiu1's Website - Pages</title>
	<meta charset="utf-8" />
	<meta name="description" content="The website of Brian Liu, a work in progress." />
	<meta name="keywords" content="BLiu1, Brian Liu" />
	<meta name="viewport" content="user-scalable = yes, initial-scale = 1" /> 
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="license" type="text/html" href="http://creativecommons.org/licenses/by/3.0/" />
	<link rel="stylesheet" type="text/css" href="/main.css" />
<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>

<body>
<header>
	<h1>BLiu1's <span>Site</span></h1>
	<!--Navigation Menu-->
<?php include_once(WWWROOT . '/menu.php'); ?>
	<!--End Navigation Menu-->
</header>

<section>
	<h3>Pages of Stuff</h3>
	<p>These are all things I made:</p>
	<ul>
<?php pages("../");?>
	</ul>
</section>


<?php include_once(WWWROOT . '/footer.inc'); include_once(WWWROOT . '/stats.inc'); ?>
</body>
</html>
