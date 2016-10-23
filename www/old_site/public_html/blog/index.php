<?php require("incroot.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>BLiu1's Blog - Index</title>
	<meta name="description" content="My Weblog" />
	<meta name="keywords" content="BLiu1, blog" />
	<meta name="viewport" content="user-scalable = yes, initial-scale = 1" />
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/blog/blog.css" />
<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>
<body id="top">
	<header class="container">
		<h1>BLiu1's Blog</h1>
	</header>

	<div id="to_top"><a href="#top" data-scroll="" ><i class="material-icons">arrow_upward</i></a></div>

	<div class="container">
		<div id="home"><h2>Home</h2></div>
		<h3>Blog Posts:</h3>
		<ul id="post_list">
<?php
include_once(WWWROOT . '/blog/posts.php');
for ($i = count($posts); $i > 0; $i--) {
	$paragraphs = array();
	preg_match('/<p>.*<\/p>/i', $posts[$i - 1]->content, $paragraphs);
	$first_paragraph = substr($paragraphs[0], 3, -4);

	echo "\t\t\t" . '<li>' . "\n";
	echo "\t\t\t\t" . '<a href="/blog/viewpost.php?id=' . $i . '" title="' . $posts[$i - 1]->metadesc . '">' . $posts[$i - 1]->title . '</a>' . "\n";
	echo "\t\t\t\t" . '<p class="pteaser">' . $first_paragraph . '</p>' . "\n";
	echo "\t\t\t" . '</li>' . "\n";
}
?>

		</ul>
		<p>This is a very plain and infrequently updated blog.</p>
	</div>
	<div id="backlink" class="container"><a href="/">Back</a></div>

<!-- Tracker -->
<?php include_once(WWWROOT . '/stats.inc'); ?>

	<script src="/blog/prism.js"></script>
	<script>/*<!--*/
	/*To_top script*/
	var t=document.getElementById('to_top');setInterval(function(){var s=(window.pageYOffset!==undefined)?window.pageYOffset:(document.documentElement||document.body.parentNode||document.body).scrollTop;if(s<300){t.className='up'}else{t.className=''};},100)
	/*-->*/
	</script>
	<!-- AddThis Smart Layers BEGIN -->
	<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
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
	<script src="/blog/smoothscroll.js"></script>

</body>
</html>
