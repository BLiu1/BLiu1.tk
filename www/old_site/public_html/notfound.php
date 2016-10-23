<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<html  lang="en">
<head>
	<meta charset="utf-8" />
	<title>BLiu1's Website - 404 Not Found</title>
	<meta name="description" content="The website of Brian Liu, a work in progress." />
	<meta name="keywords" content="BLiu1, Brian Liu" />
	<meta name="viewport" content="user-scalable=yes,initial-scale=1" /> 
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="license" type="text/html" href="http://creativecommons.org/licenses/by/3.0/" />
	<link rel="stylesheet" type="text/css" href="/main.css" />
	<style>
		#not_found{color: red;}
	</style>
<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>

<body>
<header>
	<h1>BLiu1's <span>Site</span></h1>
	<?php include_once(WWWROOT . '/menu.php'); ?>
</header>

<section>
	<h2 id="not_found"><img src="/images/404.png" alt="404" /> Page&nbsp;Not&nbsp;Found</h2>
	<p>I'm sorry, but there is no page on this website with that web address.</p>
	<p>Check if you mistyped the address, or try looking on the pages navigation tab.</p>
</section>

<?php include_once(WWWROOT . '/footer.inc'); include_once(WWWROOT . '/stats.inc'); ?>
</body>
</html>	