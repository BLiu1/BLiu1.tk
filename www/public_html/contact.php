<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>BLiu1's Website - Contact</title>
	<meta name="description" content="The website of Brian Liu, a work in progress." />
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
	<h2>Contact</h2>
	<p>Contact me using this email: <a href="mailto:support@bliu1.comxa.com">support@bliu1.comxa.com</a></p>
	<p>Feel free to comment below if you don't want to email me.</p>
	<br>
	    <!-- begin Disqus -->
		<div id="disqus_thread"></div>
		<script type="text/javascript">
		/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		var disqus_shortname  = 'bliu1', // required
		    disqus_identifier = 'contact',
			disqus_title      = 'Contact',
			disqus_url        = 'http://bliu1.tk/contact.html';
		/* * * DON'T EDIT BELOW THIS LINE * * */
		(function() {
		var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
	    <!-- end Disqus -->
	

</section>

<?php include_once(WWWROOT . '/footer.inc'); include_once(WWWROOT . '/stats.inc'); ?>
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