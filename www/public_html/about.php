<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
<!-- If you are reading this, you are awesome!
	Note: I wrote some of these credits when I was 14 (in 9th grade) and
	      most of these when I still used a Lenovo Windows 7.

			*****More Credits*****

	Codecademy - for teaching me HTML & CSS, Javascript, and PHP
	Notepad++ - for being an awesome editor; you should get it
	Atom - for being a better editor; if you don't have Windows, get this
	H. Twins - for making such a brilliant website (HTwins.net) and for making BFDI
	Yahoo! Mail - for providing the email I use
	X-Icon Editor - for an online favicon maker and editor
	Tiny PNG - for PNG compression
	W3Schools and Stack Overflow - for answering most of my web-dev and programming questions

				Obvious Ones (not worth reading)

	the USA - for existing
	Apple - for making the overpriced laptop I work on
	Microsoft - for making Windows, although I hear that Linux is better
	Linux Mint - for being there when Windows refuses to boot
	Lenovo - for making the laptop I previously used
	Best Buy - for selling the laptop I previously used
	Google - for making the search engine and browser I use

				Others

	My (anonymous) friend - for making a batch text adventure that inspired me to make my own
	SC Virtual School - for giving me the idea of my username, domain name, and (sometimes) nickname: BLiu1


	Did I forget any?
-->

	<title>BLiu1's Website - About</title>
	<meta name="description" content="The website of Brian Liu, a work in progress." />
	<meta name="keywords" content="BLiu1, Brian Liu" />
	<meta name="viewport" content="user-scalable=yes,initial-scale=1" />
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="license" type="text/html" href="http://creativecommons.org/licenses/by/3.0/" />
	<link rel="stylesheet" type="text/css" href="/main.css" />
	<style>.strike {text-decoration: line-through;}</style>
<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>

<body>
<header>
	<h1>BLiu1's <span>Site</span></h1>
	<?php include_once(WWWROOT . '/menu.php'); ?>
</header>

<section>
	<h2>About My Website and Me</h2>
	<p>"Hello World!" and welcome to BLiu1's website.</p>
	<p>There is not much on this website currently because it is a work in progress.</p>
	<p>This will be a website where I will put any interesting things I make that are computer related.</p>
	<p>I started this website when I was in 9th grade. I am currently a <!-- rising- -->senior in high school.</p>
	<h2>Credits</h2>
	<p>I owe this website to the following <em>free</em> services: </p>
	    <ul>
	        <li><a href="http://www.000webhost.com/" class="strike">000WebHost</a> for the fast hosting</li>
	        <li><a href="http://www.dot.tk/en/index.html">Dot.tk</a> for the short domain name</li>
	        <li><a href="http://flamingtext.com/">Flaming Text</a> for the fancy logos</li>
		<li><a href="https://x10hosting.com/">x10Hosting</a> for the fast hosting</li>
	        <li><a href="http://www.google.com/fonts/">Google Web Fonts</a> for excellent web fonts</li>
	        <li>My friend Michael for telling me about the first three services. Visit his website <a href="http://michaelxing.tk/" target="_blank">here.</a></li>
	        <li>See page source for more credits</li>
	    </ul>
</section>

<?php include_once(WWWROOT . '/footer.inc'); include_once(WWWROOT . '/stats.inc'); ?>
</body>
</html>
