<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
<!--
    Hello Internet HAcKErS & SLaCKErS
    Scroll All The Way Down
-->
	<title>BLiu1's Website - Home</title>
	<meta name="description" content="The website of Brian Liu, a work in progress." />
	<meta name="keywords" content="BLiu1, Brian Liu" />
	<meta name="viewport" content="user-scalable=yes,initial-scale=1" />
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="license" type="text/html" href="http://creativecommons.org/licenses/by/3.0/" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css">
	<link rel="stylesheet" href="/main.css" />
<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>

<body>
<header id="title-bar">
	<div id="header-content">
		<div id="logo-anim"></div>
		<h1>BLiu1&rsquo;s <span>Site</span></h1>
		<?php include_once(WWWROOT . '/menu.php'); ?>
	</div>
</header>

<section class="content">
	<h2>Home</h2>
	<p>"Hello World!" and welcome to my personal website.</p>
	<p>Before anything else, I know that this front page looks horrendous, but please understand I made this when I was just starting to learn HTML, when I was 14 years old. That being said, feel free to explore the website using the pages navigation tab.</p>
	<p>My old website can be found <a href="https://sites.google.com/site/myschoolresourcepage/">here.</a> It is basically a website of interesting links.</p>
	<p>I wanted to put more on it, but instead, I learned how to use HTML and CSS and created this website. See more on the "About" page.</p>
	<!--[if lte IE 9]>
		<div style="color:lime;background-color:black" color="lime" backgroundColor="black">Please consider getting <a href="http://browsehappy.com/?locale=en" style="color:aqua;" color="aqua">a more up-to-date browser</a> for the best experience of this website.</div>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
	<![endif]-->
	<h2>News from My Blog</h2>
<?php
	include_once(WWWROOT . '/blog/posts.php');
	$POSTS_TO_DISPLAY = 3;
	$number_of_posts = count($posts);

	for($post_number = $number_of_posts - 1; $post_number >= $number_of_posts - $POSTS_TO_DISPLAY; $post_number--) {
		$current_post = $posts[$post_number];
		$paragraphs = array();
		preg_match('/<p>.*<\/p>/i', $current_post->content, $paragraphs);

		echo "\t" . '<div class="blogpost-preview">' . "\n";
		echo "\t\t" . '<h3>' . $current_post->title . '</h3>' . "\n";
		echo "\t\t\t" . $paragraphs[0] . "\n";
		echo "\t\t\t" . '<a href="/blog/viewpost.php?id=' . $post_number . '">Read More <i class="material-icons">arrow_forward</i></a>'  . "\n";
		echo "\t" . '</div>' . "\n";
	}
?>
</section>

<?php include_once(WWWROOT . '/footer.inc'); include_once(WWWROOT . '/stats.inc'); ?>
	<a href="/lol.php">
		<!--Go to lol.php-->&nbsp;
	</a>
</body>
</html>
