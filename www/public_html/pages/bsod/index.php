<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>BLiu1's Website - BSOD</title>
	<meta charset="utf-8" />
	<meta name="description" content="A fake blue screen to prank people with." />
	<meta name="keywords" content="fake, blue, screen, of, death, bsod, stop, error, blue, screen, windows, 7, fullscreen, full, screen, full-screen, f11, online" />
	<link rel="shortcut icon" href="/pictures/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/pages/pages.css" />
	<link rel="stylesheet" type="text/css" href="/button-link.css" />
	<link rel="license" type="text/html" href="http://creativecommons.org/licenses/by/3.0/" />
	<style>.bsod{width:calc(50% - 5.5em);}.left{float:left;}.right{float:right;}#clear{clear:both;}</style>
<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>

<body>

<div id="content">
	<h1>Fake Blue Screen of Death (Windows 7)</h1>
	<p>Use this fake blue screen to prank family, friends, or co-workers. Remember to fullscreen (F11) your browser after you click a button.</p>
	<p>The first button is a regular blue screen of death and the second one is filled with humor. Choose your prank wisely.</p>
	<p><em id="warning">Warning:</em> This fake blue screen will fit to any screen size, hide the cursor, and hide the scroll bar.</p>
	<small>Note: Cursor hiding works in Chrome and Firefox, but does not work in Internet Explorer 10.</small>
	<br>
	<a href="stoperror.php" class="button-link bsod left">Normal Fake BSoD</a>
	<a href="stoperror.php?funny" class="button-link bsod right">Funny BSoD</a>
	<br>
	<p id="clear">The normal blue screen is based on various examples from Google Images. The funny one is derived from <a href="http://revolutionized55.deviantart.com/art/BSOD-48406606">revolutionized55's BSOD</a> on deviantART</p>
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
