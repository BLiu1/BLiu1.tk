<?php
require("incroot.php");
include("posts.php");

 /* If a specific tag was searched for ... */
if (isset($_GET['tag'])){
	$find = true;
	$searched_tag = str_replace(array('&', '<', '>', '"', "'", '/', '?', '`', '(', ')', '[', ']', '{', '}'), '', $_GET['tag']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>BLiu1's Blog - Tags<?php if($find){echo " - Search: " . $searched_tag;}?></title>
	<meta name="description" content="A list of tags or a list of posts with a tag." />
	<meta name="keywords" content="BLiu1, tags<?php if($find){echo ", " . $searched_tag;}?>" />
	<meta name="viewport" content="user-scalable = yes, initial-scale = 1" /> 
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/blog/blog.css" />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47304046-1', 'bliu1.tk');
  ga('send', 'pageview');

</script>
</head>
<body id="top">

	<header class="container">
		<a href="/blog"><h1>BLiu1's Blog</h1></a>
	</header>
	
	<div id="main" class="container">
		<h2><?php echo $find? "Posts with Tag: " . $searched_tag : "All Tags"; ?></h2>
<?php		
if ($find){ /**/
	$posts_with_tag = array();
	for($i = 0; $i < count($posts); $i++) {
		for($j = 0; $j < count($posts[$i]->tags); $j++) { 		
			if($posts[$i - 1]->tags[$j] = $searched_tag){
				$posts_with_tag[$i] = $posts[$i - 1]->title;
			}
		}
	}
	echo '		<div>' . "\n";
	foreach($posts_with_tag as $post){
		echo "\t\t\t\t" . "<div><a href='/blog/viewpost.php?id=" . array_search($post, $posts_with_tag) . "'>" . $post . "</a></div> \n";
	};
	echo '		</div>' . "\n";
/**/
} else {
	$all_tags = array();
	for($i = 0; $i < count($posts); $i++) {
		for($j = 0; $j < count($posts[$i]->tags); $j++) {
			$all_tags[] = $posts[$i]->tags[$j];
		}
	}
	$unique_tags = array_unique($all_tags);
	sort($unique_tags);
	echo '			<div id="tags">' . "\n";
	foreach($unique_tags as $tag){
		echo "\t\t\t\t" . "<a class='post_tag all_tags' href='/blog/tags.php?tag=" . strtolower($tag) . "'>" . ucwords($tag) . "</a> \n";
	};
	echo '			</div>' . "\n";
}
?>

	</div>
	
	<div id="backlink" class="container"><a href="/">Back</a></div>

	<div id="to_top"><a href="#top" data-scroll="" ><!-- Created with SVG-edit - http://svg-edit.googlecode.com/ --><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg"><g><path stroke="#000000" d="m10,35l10,-30c0,0 10,30 10,30c0,0 -20,0 -20,0z" fill="#00ff00"/></g></svg></a></div>
	
	<div id="comments" class="container">
		<h2>Comments</h2>
		<h3><?php echo("BLiu1's Blog - ".($find ? 'Tag: ' . $searched_tag : 'All Tags')) ?></h3>
	<!-- begin Disqus -->
		<div id="disqus_thread"></div>
		<script type="text/javascript">
		/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		var disqus_shortname  = "bliu1", // required
		    disqus_identifier = <?php echo("blog_post_tag" . ($find ? "_" . $searched_tag : 's')) ?>,
		    disqus_title      = <?php echo("BLiu1's Blog - " . ($find ? $searched_tag : 'Tags')) ?>,
		    disqus_url        = <?php echo("http://bliu1.tk/blog/tags.php?id=" . ($post_id + 0)) ?>;
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
	</div>
	
<!-- Tracker -->
<div id="eXdiv">
<div id="eXTReMe"><a href="http://extremetracking.com/open?login=bliu1">
<img src="http://t1.extreme-dm.com/i.gif" style="border: 0;"
height="38" width="41" id="EXim" alt="eXTReMe Tracker" /></a>
<script type="text/javascript"><!--
EXref="";top.document.referrer?EXref=top.document.referrer:EXref=document.referrer;//-->
</script><script type="text/javascript"><!--
var EXlogin='bliu1' // Login
var EXvsrv='s9' // VServer
EXs=screen;EXw=EXs.width;navigator.appName!="Netscape"?
EXb=EXs.colorDepth:EXb=EXs.pixelDepth;EXsrc="src";
navigator.javaEnabled()==1?EXjv="y":EXjv="n";
EXd=document;EXw?"":EXw="na";EXb?"":EXb="na";
EXref?EXref=EXref:EXref=EXd.referrer;
EXd.write("<img "+EXsrc+"=http://e0.extreme-dm.com",
"/"+EXvsrv+".g?login="+EXlogin+"&amp;",
"jv="+EXjv+"&amp;j=y&amp;srw="+EXw+"&amp;srb="+EXb+"&amp;",
"l="+escape(EXref)+" height=1 width=1>");//-->
</script><noscript><div id="neXTReMe"><img height="1" width="1" alt=""
src="http://e0.extreme-dm.com/s9.g?login=bliu1&amp;j=n&amp;jv=n" />
</div></noscript></div>
</div>
<!-- End Tracker -->

	<script src="/blog/prism.js"></script>
	<script src="/blog/smoothscroll.js"></script>
	<script>var t=document.getElementById('to_top');setInterval(function(){var s=(window.pageYOffset!==undefined)?window.pageYOffset:(document.documentElement||document.body.parentNode||document.body).scrollTop;if(s<300){t.className='up'}else{t.className=''};},100)</script>
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
</body>
</html>