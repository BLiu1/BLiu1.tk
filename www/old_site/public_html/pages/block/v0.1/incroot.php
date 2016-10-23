<?php
/* "include" root
 * 
 * Usage:
 * include_once(WWWROOT . '/ga.inc');
 */
function defroot(){
	$_rootdir = "htdocs";

	$abspath = dirname(__FILE__);
	$wwwroot = substr($abspath, 0, (strpos($abspath, $_rootdir) + strlen($_rootdir)));
	define('WWWROOT', $wwwroot);

	unset($_rootdir, $abspath, $wwwroot);
}
defroot();
?>
