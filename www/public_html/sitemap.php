<?php require_once("incroot.php"); ?>
<?php
$sitemap = simplexml_load_file( WWWROOT . '/custom-sitemap.xml');
function print_sitemap($sitemap) {
	$output = "";
	$output .= print_dirs($sitemap, $sitemap);
	$output .= print_pages($sitemap, $sitemap);
	echo $output;
}
function print_dirs($sitemap, $parent){
	$output = "";
	foreach($parent->dir as $dir) {
		$path = find_path($parent);
		$output .= '<li><a href="/' . $path . $dir['name'] . '/">' . $dir['name'] . '/</a><ul>';
		$output .= print_dirs($sitemap, $dir);
		$output .= print_pages($sitemap, $dir);
		$output .= '</ul></li>';
	}
	return $output;
}
function print_pages($sitemap, $dir){
	$output = "";
	foreach($dir->page as $page) {
		if(((string) $page !== 'index.html') && ((string) $page !== 'index.php')) {
			$path = find_path($dir);
			$output .= '<li><a href="/' . $path . $page . '">' . $page . '</a></li>';
		}
	}
	return $output;
}
function find_path($parent) {
	$path='';
	while((string)$parent['name']) {
		$path = (string)$parent['name'] . '/' . $path;
		$xpath = $parent->xpath("parent::*");
		$parent = $xpath[0];
	}
	return $path;
}
/* I realized much later that instead of using a recursive function and a whole bunch of other functions, I could've just used a while loop. *facepalm* */
/* However, the functions have more semantic meaning. */
/* Actually, I think using functions was the better way to do it. */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>BLiu1's Website - Sitemap</title>
	<meta name="description" content="The sitemap for BLiu1's website." />
	<meta name="keywords" content="BLiu1, Brian Liu" />
	<meta name="viewport" content="user-scalable=yes,initial-scale=1" /> 
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="license" type="text/html" href="http://creativecommons.org/licenses/by/3.0/" />
	<link rel="stylesheet" type="text/css" href="/main.css" />
<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>

<body>
<header>
	<h1>BLiu1's <span>Site</span></h1>
	<?php include_once(WWWROOT . '/menu.php'); ?>
</header>

<section>
	<h2>Search</h2>
	<p>Search here if you are lazy</p>
<script>
  (function() {
    var cx = '005499994828883923136:4v1lxkiirnu';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
	<h2>Sitemap</h2>
	<ul>
<?php print_sitemap($sitemap); ?>

	</ul>
</section>

<?php include_once(WWWROOT . '/footer.inc'); include_once(WWWROOT . '/stats.inc'); ?>
</body>
</html>