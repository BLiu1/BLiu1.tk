<?php
require("incroot.php");

function set_defaults(){
	global $post;
	$post= new StdClass();
	$post->title = 'Post Not Found';
	$post->metadesc = 'Post not found.';
	$post->metakeys = 'view, post, blog';
	$post->date_posted = 'Noveptembereruary 728, 895263';
	$post->edited = true;
	$post->tags = array('Blog');
	$post->content = '
	<section>
		<p>Hello World! The post requested was not found. Please go <a href="/blog/">here</a> and find the post you are looking for.</p>
	</section>';
}

if (isset($_GET['id'])){
	$post_id = str_replace(array('&', '<', '>', '"', "'", '/', '?', '`', '(', ')', '[', ']', '{', '}'), '', $_GET['id']);
	if (is_numeric($post_id)){
		include('posts.php');
		if ($posts[($post_id - 1)]) {
			$post = $posts[($post_id - 1)];
		} else {
			set_defaults();
		}
	} else {
		set_defaults();
	}
} else {
	set_defaults();
}

function echo_nav(){
	if($posts[($post_id - 2)]){echo '<a class="prevlink" href="/blog/viewpost.php?id=' . ($post_id - 1) . '"><span>&#10140;</span> ' . $posts[($post_id - 2)]->title . '</a>' . "\n";};
	if($posts[($post_id - 0)]){echo '<a class="nextlink" href="/blog/viewpost.php?id=' . ($post_id + 1) . '">' . $posts[($post_id - 0)]->title . ' &#10140;</a>' . "\n";};
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>BLiu1's Blog - <?php echo $post->title; ?></title>
	<meta name="description" content="<?php echo $post->metadesc ?>" />
	<meta name="keywords" content="BLiu1, <?php echo $post->metakeys ?>" />
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

	<section class="container">
		<div id="topnav" class="nav">
			<?php
			if($posts[($post_id - 2)]){echo '<a class="prevlink" href="/blog/viewpost.php?id=' . ($post_id - 1) . '"><span>&#10140;</span> ' . $posts[($post_id - 2)]->title . '</a>' . "\n";};
			if($posts[($post_id - 0)]){echo '<a class="nextlink" href="/blog/viewpost.php?id=' . ($post_id + 1) . '">' . $posts[($post_id - 0)]->title . ' &#10140;</a>' . "\n";};
			?>
		</div>
		<h2><?php echo $post->title; ?></h2>
		<h4 id="date"><?php echo $post->date_posted; if($post->edited){echo '<br><small>Edited</small>';}; ?></h4>
<?php echo $post->content; ?>
		<div id="tags"><h4>Tags:</h4> <?php foreach($post->tags as $tag){echo "<a class='post_tag' href='/blog/tags.php?tag=" . strtolower($tag) . "'>" . $tag . "</a> ";}; ?></div>
		<div id="bottomnav" class="nav">
			<?php
			if($posts[($post_id - 2)]){echo '<a class="prevlink" href="/blog/viewpost.php?id=' . ($post_id - 1) . '"><span>&#10140;</span> ' . $posts[($post_id - 2)]->title . '</a>' . "\n";};
			if($posts[($post_id - 0)]){echo '<a class="nextlink" href="/blog/viewpost.php?id=' . ($post_id + 1) . '">' . $posts[($post_id - 0)]->title . ' &#10140;</a>' . "\n";};
			?>
		</div>
	</section>


	<div id="to_top"><a href="#top" data-scroll="" ><svg width="40" height="30" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg"><g><path fill="none" stroke="#00ff00" stroke-width="3.53553" stroke-linecap="square" d="m10,20l10,-10l10,10"/></g></svg></a></div>

	<div id="comments" class="container">
		<h2>Comments</h2>
		<h3><?php echo("BLiu1's Blog - ".($post->title?$post->title:'Non-Existent Page')) ?></h3>
	<!-- begin Disqus -->
		<div id="disqus_thread"></div>
		<script type="text/javascript">
		/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		var disqus_shortname  = "bliu1", // required
		    disqus_identifier = "<?php echo("blog_post_".($post_id + 0)) ?>",
		    disqus_title      = "<?php echo("BLiu1's Blog - ".($post->title?$post->title:'Non-Existent Page')) ?>",
		    disqus_url        = "<?php echo("http://bliu1.tk/blog/viewpost.php?id=".($post_id + 0)) ?>";
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
		},
		'whatsnext' : {}
	});
	</script>
	<!-- AddThis Smart Layers END -->
</body>
</html>
