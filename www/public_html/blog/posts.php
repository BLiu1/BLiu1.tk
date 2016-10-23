<?php
global $posts;
$posts = array(
	//declaring objects
	new StdClass(), /* Post 1 */
	new StdClass(), /* Post 2 */
	new StdClass(), /* Post 3 */
	new StdClass(), /* Post 4 */
	new StdClass(), /* Post 5 */
	new StdClass(), /* Post 6 */
	new StdClass(), /* Post 7 */
	new StdClass(), /* Post 8 */
	new StdClass(), /* Post 9 */
	new StdClass(), /* Post 10 */
	new StdClass(), /* Post 11 */
	new StdClass()  /* Post 12 */
);

//filling objects
$posts[0]->title = 'First Post';
$posts[0]->metadesc = 'This is the first post of my blog.';
$posts[0]->metakeys = 'first, post, blog, website, HTML, CSS, JS, PHP';
$posts[0]->date_posted = 'November 1, 2013';
$posts[0]->edited = true;
$posts[0]->tags = array('Website','Blog','HTML','CSS','JS','PHP');
$posts[0]->content = '
<section>
	<p>So... I&apos;ve decided to write a blog.</p>
	<p>In this blog, I will reveal the underworkings of my website for anyone interested in coding a website <em>(i.e. not with Google Sites or a website creator with templates and stuff)</em>. </p>
</section>
<section>
	<h3>Intro to Websites in General (for non-Webdevs)</h3>
	<p>For those of you who don&apos;t know, webpages are made with a "language" called HTML, which stands for HyperText Markup Language. It&apos;s basically a way to "mark up" plain text, making it Hyper Text! HTML defines the words, links, pictures, tables of a webpage. Once you become familiar with HTML, the source of a webpage will make more sense.</p>
	<p>You can make websites with a plain text editor. Computers come with text editors like Notepad or TextEdit although it is helpful to have a editor designed for programming like Notepad++ or TextMate.</p>
	<p>HTML is almost always used in conjunction with a different language called CSS (which means Cascading Style Sheets). CSS basically controls how things look on the webpage.</p>
	<p>Sometimes you might even encounter a third language on a webpage, JavaScript, that can change stuff on the page temporarily and do other advanced stuff.</p>
</section>
<section>
	<h3>PHP: Hypertext Preprocessor</h3>
	<p>As you can probably tell, this blog runs on PHP ... so does the rest of my website; I&apos;ll explain that in a later post. PHP is a scripting language like JavaScript; however PHP is server side while JavaScript is client side.</p>
	<p>Visit these sites for more info:</p>
	<ul>
		<li><a href="http://w3schools.com/">W3C Schools</a></li>
		<li><a href="http://css-tricks.com">CSS Tricks</a></li>
		<li><a href="http://javascript.info">JavaScript Tutorial</a></li>
		<li><a href="http://javascriptkit.com">JavaScript Kit</a></li>
		<li><a href="http://codecademy.com">Codecademy</a></li>
		<li><a href="http://php.net">PHP.net</a></li>
		<li><a href="http://www.tutorialspoint.com/">Programming Tutorials</a></li>
	</ul>
</section>
';

$posts[1]->title = 'How It Works: Blog v1.1';
$posts[1]->metadesc = 'This post explains how my blog currently works.';
$posts[1]->metakeys = 'how, it, works, blog, PHP';
$posts[1]->date_posted = 'December 3, 2013';
$posts[1]->edited = true;
$posts[1]->tags = array('How It Works','Website','Blog','PHP');
$posts[1]->content = '
<section class="language-php">
	<p>I&apos;m busy, but here is the source to my blog.</p>
	<pre><code>
&lt;?php
	if (isset($_GET["page"]) && is_numeric($_GET["page"])){
		$page = $_GET["page"];
	} else {
		$page = "0";
	}
	switch($page){
		case "0": $title = "Index"; break;
		case "1": $title = "First Post"; break;
		case "2": $title = "How It Works: Blog v1.1"; break;
		case "3": $title = "Escape From Isolation 2.1"; break;
		case "4": $title = "Server Side & Client Side Includes"; break;
		case "5": $title = "All Pages PHP"; break;
		default:  $title = "Index";
	}
?&gt;

&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
	&lt;title&gt;BLiu1&apos;s Blog - &lt;?php echo($title); ?&gt;&lt;/title&gt;
	&lt;meta name="description" content="My Weblog" /&gt;
	&lt;meta name="keywords" content="BLiu1, blog" /&gt;
	&lt;meta name="viewport" content="user-scalable = yes, initial-scale = 1" /&gt;
	&lt;meta charset="utf-8" /&gt;
	&lt;link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" /&gt;
	&lt;link rel="stylesheet" type="text/css" href="/blog/blog.css" /&gt;
&lt;/head&gt;
&lt;body&gt;
	&lt;header class="container"&gt;
		&lt;h1&gt;BLiu1&apos;s Blog&lt;/h1&gt;
	&lt;/header&gt;
	&lt;div id="to_top"&gt;&lt;a href="#"&gt;^&lt;/a&gt;&lt;/div&gt;

&lt;?php
	if ($title == "Index"){
?&gt;
	&lt;article&gt;
		&lt;h2&gt;Home&lt;/h2&gt;
		&lt;p&gt;Blog Posts:&lt;/p&gt;
		&lt;ul id="post_list"&gt;
			&lt;li&gt;&lt;a href="/blog/index.php?page=5"&gt;All Pages PHP&lt;/a&gt;&lt;/li&gt;
			&lt;li&gt;&lt;a href="/blog/index.php?page=4"&gt;Server Side & Client Side Includes&lt;/a&gt;&lt;/li&gt;
			&lt;li&gt;&lt;a href="/blog/index.php?page=3"&gt;Escape From Isolation 2.1&lt;/a&gt;&lt;/li&gt;
			&lt;li&gt;&lt;a href="/blog/index.php?page=2"&gt;How It Works: Blog v1.1&lt;/a&gt;&lt;/li&gt;
			&lt;li&gt;&lt;a href="/blog/index.php?page=1"&gt;First Post&lt;/a&gt;&lt;/li&gt;
		&lt;/ul&gt;
		&lt;p&gt;This is a very plain and infrequently updated blog.&lt;/p&gt;
	&lt;/article&gt;
	&lt;div id="backlink" class="container"&gt;&lt;a href="/"&gt;Back&lt;/a&gt;&lt;/div&gt;

&lt;?php } else {
include($page.".php");
echo &apos;	&lt;div id="backlink" class="container"&gt;&lt;a href="/blog/index.php"&gt;Back&lt;/a&gt;&lt;/div&gt; &apos;;
}
?&gt;

&lt;!-- Tracker --&gt;
&lt;div id="eXdiv"&gt;
&lt;div id="eXTReMe"&gt;&lt;a href="http://extremetracking.com/open?login=bliu1"&gt;
&lt;img src="http://t1.extreme-dm.com/i.gif" style="border: 0;"
height="38" width="41" id="EXim" alt="eXTReMe Tracker" /&gt;&lt;/a&gt;
&lt;script type="text/javascript"&gt;&lt;!--
EXref="";top.document.referrer?EXref=top.document.referrer:EXref=document.referrer;//--&gt;
&lt;/script&gt;&lt;script type="text/javascript"&gt;&lt;!--
var EXlogin=&apos;bliu1&apos; // Login
var EXvsrv=&apos;s9&apos; // VServer
EXs=screen;EXw=EXs.width;navigator.appName!="Netscape"?
EXb=EXs.colorDepth:EXb=EXs.pixelDepth;EXsrc="src";
navigator.javaEnabled()==1?EXjv="y":EXjv="n";
EXd=document;EXw?"":EXw="na";EXb?"":EXb="na";
EXref?EXref=EXref:EXref=EXd.referrer;
EXd.write("&lt;img "+EXsrc+"=http://e0.extreme-dm.com",
"/"+EXvsrv+".g?login="+EXlogin+"&amp;",
"jv="+EXjv+"&amp;j=y&amp;srw="+EXw+"&amp;srb="+EXb+"&amp;",
"l="+escape(EXref)+" height=1 width=1&gt;");//--&gt;
&lt;/script&gt;&lt;noscript&gt;&lt;div id="neXTReMe"&gt;&lt;img height="1" width="1" alt=""
src="http://e0.extreme-dm.com/s9.g?login=bliu1&amp;j=n&amp;jv=n" /&gt;
&lt;/div&gt;&lt;/noscript&gt;&lt;/div&gt;
&lt;/div&gt;

	&lt;script src="/blog/prism.js"&gt;&lt;/script&gt;
	&lt;script src="/blog/masonry.pkgd.min.js"&gt;&lt;/script&gt;
	&lt;script&gt;/*&lt;!--*/
	/*To_top script*/var t=document.getElementById(&apos;to_top&apos;);setInterval(function(){var s=(window.pageYOffset!==undefined)?window.pageYOffset:(document.documentElement||document.body.parentNode||document.body).scrollTop;if(s&lt;300){t.className=&apos;up&apos;}else{t.className=&apos;&apos;};},100)
	/*Masonry Initialization*/
	var container = document.getElementById(&apos;post_list&apos;);
	var msnry = new Masonry( container, {
		columnWidth: 1,
		gutter: 10,
		itemSelector: &apos;li&apos;
	});
	/*--&gt;*/
	&lt;/script&gt;

&lt;/body&gt;
&lt;/html&gt;
	</code></pre>
	<p>It&apos;s very simple.</p>
	<p>Using the <a href="http://php.net/get"><code>$_GET</code></a> superglobal, it assigns the title of the page and includes the numbered file with the article. If the page &quot;number&quot; is not a number or a nonexistent page, it displays the index/homepage.</p>
</section>';

$posts[2]->title = 'Escape From Isolation 2.1';
$posts[2]->metadesc = 'This post announces the release of Escape From Isolation 2.1.';
$posts[2]->metakeys = 'escape, from, isolation, 2.1, game';
$posts[2]->date_posted = 'January 1, 2014';
$posts[2]->edited = true;
$posts[2]->tags = array('Announcement','EFI2','Game');
$posts[2]->content = '
<section>
	<p>Happy New Year! And happy belated release day.</p>
	<p>I have finally finished making a computer game that many of you know about. For those of you who don&apos;t know, Escape from Isolation 2.1 is a text adventure game based on my friend&apos;s game. Text adventure games are adventure games without graphics where one makes choices based on the information given.</p>
	<p>This program was written in Batch and converted to exe, so Mac, Linux, etc. users will need something that can run exe&apos;s.</p>
	<p>If you are still confused, read the description. <a href="http://bliu1.tk/pages/efi2.php">Description and Download Link for EFI 1.4 and EFI 2</a></p>
	<p>On another note, when I was away on a Christmas week vacation, my web host removed my whole website and I had to re-upload everything! Contact me if anything looks weird.</p>
</section>';

$posts[3]->title = 'Server Side &amp; Client Side Includes';
$posts[3]->metadesc = 'This post differentiates between server side & client side includes.';
$posts[3]->metakeys = 'includes, php, js, javascript';
$posts[3]->date_posted = 'January 11, 2014';
$posts[3]->edited = false;
$posts[3]->tags = array('Website','HTML','JS','PHP');
$posts[3]->content = '
<section>
	<p>Oftentimes we need something similar to appear in many webpages. Some examples would be a quote-of-the-day or a navigational menu or anything else that needs to be consistent over many webpages. A solution to this is includes. There are many ways to include a separate text or HTML file in a webpage.</p>
</section>
<section class="language-php">
	<h3>PHP Includes</h3>
	<p>PHP has an <code>include()</code> function. It tells the server to insert HTML, PHP script, or plain text into a webpage before it reaches the client (web browser). You would use it like this.</p>
	<pre><code>&lt;?php
	include(&apos;file.php&apos;);
?&gt;</code></pre>
	<p>You can use PHP extensions and extension <code class="language-none">.inc</code> for includes. This is the kind of include I use in my webpages because you can do scripting in PHP as well.</p>
</section>
<section>
	<h3>SHTML Includes</h3>
	<p class="language-none">Files with a special extension, usually <code>.shtml</code>, <code>.stm</code>, or <code>.shtm</code>, can be used for server side includes. The way you would include something with these is this:</p>
	<pre class="language-php"><code>&lt;!--#include virtual="../file.txt" --&gt;</code></pre>
</section>
<section class="language-javascript">
	<h3>JavaScript Client Side Includes</h3>
	<p>A simple way to include HTML is to convert it to a string and inject it with JavaScript into the <abbr title="Document Object Model">DOM</abbr>.</p>
	<p>Your HTML could have an element for the JavaScript to inject into.</p>
	<pre class="language-php"><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
	&lt;meta charset="UTF-8"&gt;
	&lt;title&gt;JS Includes&lt;/title&gt;
	&lt;script src="include.js"&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;
	&lt;h1&gt;JS Includes&lt;/h1&gt;
	&lt;div id="content"&gt;&lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
	<p>The JavaScript for it could look like this.</p>
	<pre><code>var txt = "&lt;h1&gt;Lorem Ipsum&lt;/h1&gt;";
txt = "&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&lt;/p&gt;";
txt += "&lt;p&gt;Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&lt;/p&gt;";
txt += "&lt;p&gt;Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. &lt;/p&gt;";
txt += "&lt;p&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;";
txt += "&lt;a href=&apos;http://lipsum.com&apos;&gt;Lorem Ipsum Generator&lt;/a&gt;";
document.getElementbyId("content").innerHTML = txt;</code></pre>
	<p>You could also append stuff to the body like this.</p>
	<pre><code>var moreText = "&lt;div&gt;Another Div&lt;/div&gt;";
document.body.innerHTML += moreText;</code></pre>
</section>
';

$posts[4]->title = 'All Pages PHP';
$posts[4]->metadesc = 'This post reveals the .htaccess directive for turning all HTML pages into PHP scripts.';
$posts[4]->metakeys = 'website, htaccess, .htaccess, php';
$posts[4]->date_posted = 'January 12, 2014';
$posts[4]->edited = false;
$posts[4]->tags = array('Website','PHP','.htaccess');
$posts[4]->content = '
<section>
	<p>Today, I&apos;m going to reveal a big secret (that I mentioned in my first post). All of my website runs on PHP. I am going to show how you can do this too.</p>
	<p>Before we get started, you need an Apache web server and access to a file called ".htaccess" (no the dot is not a typo).</p>
	<p>.htaccess files affect the directory they are placed in and all sub-directories.</p>
	<p>Some sites do not allow use of .htaccess files, since depending on what they are doing, they can slow down a server overloaded with domains if they are all using .htaccess files. I can&apos;t stress this enough: You need to make sure you are allowed to use .htaccess before you actually use it. Some things that .htaccess can do can compromise a server configuration that has been specifically setup by the admin, so don&apos;t get in trouble.</p>
	<p>Read more about .htaccess here: <a href="http://www.javascriptkit.com/howto/htaccess.shtml">http://www.javascriptkit.com/howto/htaccess.shtml</a></p>
	<p>OK. Once you have a(n) ".htaccess" file on your server, you should keep anything that is there and type <code class="language-blank">RewriteBase /</code> at the top if it&apos;s not there. The following two lines will tell the server to parse HTMLs as PHP!</p>
	<pre class="language-blank"><code>RemoveHandler .html .htm
AddType application/x-httpd-php .php .html</code></pre>
	<p>I hope this helps all who use JavaScript includes and want a PHP solution. ;)</p>
</section>
';

$posts[5]->title = 'Happy Summer Break!';
$posts[5]->metadesc = 'This post explains the short hiatus that I had.';
$posts[5]->metakeys = 'announcement';
$posts[5]->date_posted = 'June 9, 2014';
$posts[5]->edited = false;
$posts[5]->tags = array('Announcement');
$posts[5]->content = '
<section>
	<p>School has just finished and this is the first week of summer break! I have not posted in a while or worked on my website a lot because school got really busy towards the end of the semester.</p>
	<p>I will still be pretty busy through the summer, but stay tuned for a post on my new blog system. By the way, the new blog system is still experimental and parts such as the tags don&apos;t work yet.</p>
</section>
';

$posts[6]->title = 'Sitemap and New Menu System';
$posts[6]->metadesc = 'This post explains the sitemap and new menu system.';
$posts[6]->metakeys = 'website, php';
$posts[6]->date_posted = 'August 9, 2014';
$posts[6]->edited = true;
$posts[6]->tags = array('Website', 'Blog', 'PHP', 'XML');
$posts[6]->content = '
<section class="language-php">
	<p>You may have noticed that the menu, list on "/pages/", and the sitemap contain similar items. Being the "lazy developer" I am, I have decided to create a system in which I would only have to update a single file to keep the links in these three places updated.</p>
	<p>Using XML as my "database", I created an editable tree of links around my website, a.k.a. a sitemap. I used the SimpleXML <abbr title="eXtensible Markup Language">XML</abbr> Parser in native PHP to access and parse the XML and a few functions to arrange it into HTML and echo it. I used XML because I felt experimental and also to avoid the hassles of <abbr title="Structured Query Language">SQL</abbr> databases. Here&apos;s the XML source.</p>
	<pre><code>&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;sitemap name=""&gt;
	&lt;dir name="pages"&gt;
		&lt;dir name="efi2" title="Escape from Isolation 2"&gt;
			&lt;page&gt;index.php&lt;/page&gt;
		&lt;/dir&gt;
		&lt;dir name="avoider" title="Avoider Game"&gt;
			&lt;page&gt;index.php&lt;/page&gt;
		&lt;/dir&gt;
		&lt;dir name="edit" title="Text Edit"&gt;
			&lt;page&gt;index.php&lt;/page&gt;
		&lt;/dir&gt;
		&lt;dir name="bsod" title="Fake Blue Screen"&gt;
			&lt;page&gt;index.php&lt;/page&gt;
			&lt;page&gt;stoperror.php&lt;/page&gt;
		&lt;/dir&gt;
		&lt;dir name="overmouse" title="Overmouse"&gt;
			&lt;page&gt;index.php&lt;/page&gt;
		&lt;/dir&gt;
		&lt;dir name="nothing" title="Invisible Nothing"&gt;
			&lt;page&gt;index.php&lt;/page&gt;
		&lt;/dir&gt;
		&lt;page&gt;index.php&lt;/page&gt;
	&lt;/dir&gt;
	&lt;dir name="blog"&gt;
		&lt;page&gt;index.php&lt;/page&gt;
		&lt;page&gt;viewpost.php?id=1&lt;/page&gt;
		&lt;page&gt;viewpost.php?id=2&lt;/page&gt;
		&lt;page&gt;viewpost.php?id=3&lt;/page&gt;
		&lt;page&gt;viewpost.php?id=4&lt;/page&gt;
		&lt;page&gt;viewpost.php?id=5&lt;/page&gt;
		&lt;page&gt;viewpost.php?id=6&lt;/page&gt;
		&lt;page&gt;viewpost.php?id=7&lt;/page&gt;
		&lt;page&gt;tags.php&lt;/page&gt;
	&lt;/dir&gt;
	&lt;page&gt;index.php&lt;/page&gt;
	&lt;page&gt;about.php&lt;/page&gt;
	&lt;page&gt;contact.php&lt;/page&gt;
	&lt;page&gt;license.php&lt;/page&gt;
	&lt;page&gt;sitemap.php&lt;/page&gt;
&lt;/sitemap&gt;</code></pre>
	<p>Notice the difference between the directory name and the title (which is the name of the link in pages).</p>
	<p>In the <code class="language-blank">sitemap.php</code> file, the following PHP arranges and echoes the sitemap.</p>
	<pre><code>&lt;?php
$sitemap = simplexml_load_file(&apos;./custom-sitemap.xml&apos;);
function print_sitemap($sitemap) {
	$output = "";
	$output .= print_dirs($sitemap, $sitemap);
	$output .= print_pages($sitemap, $sitemap);
	echo $output;
}
function print_dirs($sitemap, $parent){
	$output = "";
	foreach($parent-&gt;dir as $dir) {
		$path = find_path($parent);
		$output .= &apos;&lt;li&gt;&lt;a href="/&apos; . $path . $dir[&apos;name&apos;] . &apos;/"&gt;&apos; . $dir[&apos;name&apos;] . &apos;/&lt;/a&gt;&lt;ul&gt;&apos;;
		$output .= print_dirs($sitemap, $dir);
		$output .= print_pages($sitemap, $dir);
		$output .= &apos;&lt;/ul&gt;&lt;/li&gt;&apos;;
	}
	return $output;
}
function print_pages($sitemap, $dir){
	$output = "";
	foreach($dir-&gt;page as $page) {
		if(((string) $page !== &apos;index.html&apos;) && ((string) $page !== &apos;index.php&apos;)) {
			$path = find_path($dir);
			$output .= &apos;&lt;li&gt;&lt;a href="/&apos; . $path . $page . &apos;"&gt;&apos; . $page . &apos;&lt;/a&gt;&lt;/li&gt;&apos;;
		}
	}
	return $output;
}
function find_path($parent) {
	$path=&apos;&apos;;
	while((string)$parent[&apos;name&apos;]) {
		$path = (string)$parent[&apos;name&apos;] . &apos;/&apos; . $path;
		$xpath = $parent-&gt;xpath("parent::*");
		$parent = $xpath[0];
	}
	return $path;
}
/* I realized much later that instead of using a recursive function and a whole bunch of other functions, I could&apos;ve just used a while loop. *facepalm* */
/* However, the functions have more semantic meaning. */
/* Actually, I think using functions was the better way to do it. */
?&gt;</code></pre>
	<p>Later on in the HTML, I have the function call as follows. <code>&lt;?php print_sitemap($sitemap); ?&gt;</code></p>
	<p>Interesting Fact: The <code>print_dirs</code> function is the first recursive function I have ever written! It took some thinking to wrap my brain around the problem of directories and sub-directories and come up with that.</p>
	<p>Lastly, here is the source to the (included) <code>menu.php</code>.</p>
	<pre><code>&lt;?php
function pages($path = "./") {
	$sitemap = simplexml_load_file($path . &apos;custom-sitemap.xml&apos;);
	foreach($sitemap-&gt;dir[0]-&gt;dir as $page) {
		echo &apos;		&lt;li&gt;&lt;a href="/pages/&apos; . $page[&apos;name&apos;] . &apos;/"&gt;&apos; . $page[&apos;title&apos;] . &apos;&lt;/a&gt;&lt;/li&gt;&apos; . "\n";
	}
}
?&gt;
&lt;!-- Navigation Menu --&gt;
&lt;nav&gt;
	&lt;ul&gt;
	&lt;li&gt;&lt;a href="/"&gt;Home&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href="/about.php"&gt;About&lt;/a&gt;&lt;/li&gt;
	&lt;li id="pages" class=""&gt;&lt;a href="/pages/"&gt;Pages&lt;/a&gt;
		&lt;ul&gt;
&lt;?php
if (file_exists("./custom-sitemap.xml")) {
    pages();
} elseif (file_exists("../custom-sitemap.xml")) {
    pages("../");
}
?&gt;
		&lt;/ul&gt;
	&lt;/li&gt;
	&lt;li&gt;&lt;a href="/blog/"&gt;Blog&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href="/contact.php"&gt;Contact&lt;/a&gt;&lt;/li&gt;
	&lt;/ul&gt;
&lt;/nav&gt;
&lt;script&gt;/* Nav JS */c=document.getElementById("pages");c.firstElementChild.href="javascript:void(0);";c.onclick=function(){""===c.className?c.className="drop":c.className=""};&lt;/script&gt;
&lt;!-- End Navigation Menu --&gt;</code></pre>
	<p>The <code>pages</code> function echoes the contents of the pages directory. The <code>$path</code> parameter is a workaround due to the fact that the menu is included from webpages at the root and the <code class="language-blank">index.php</code> file on the <code class="language-blank">pages</code> directory.</p>
</section>
';

$posts[7]->title = 'Molecular Weight and Molar Mass Calculator';
$posts[7]->metadesc = 'This post announces the release of the molecular weight / molar mass calculator.';
$posts[7]->metakeys = 'announcement, mwc, js, how, it, works';
$posts[7]->date_posted = 'November 24, 2014';
$posts[7]->edited = false;
$posts[7]->tags = array('Announcement', 'MWC', 'JS', 'How It Works');
$posts[7]->content = '
<section>
	<p>I have officially released the molecular weight/ molar mass calculator that I have been working on for the past few weeks. Type in a chemical formula and out comes the sum of the individual atomic weights of the atoms. You can try it now <a href="/pages/mwc/">right here</a>.</p>
	<p>It also works for polyatomic ions that require parentheses and hydrates with dots in the formula. It works without any rounding errors (which took a while to put in) and it even displays the number of each atom in the chemical formula.</p>
	<p>The basic process the program goes through is this: first, it checks to make sure that the chemical formula does not contain any random characters like !@#$%^&*; next it check to make sure the formula contains only real elements (for example Xi is not an element symbol but it looks like one); then it counts the number of each atom; finally it finds the sum of the atomic weights of the atoms.</p>
	<p>If you have a suggestion or a complaint please contact me and I will do what I can.</p>
</section>
';

$posts[8]->title = 'Platform Game Coming Soon';
$posts[8]->metadesc = 'This post announces the development of the new platformer, Block Adventures.';
$posts[8]->metakeys = 'announcement, block, adventures, game, js, html5';
$posts[8]->date_posted = 'April 25, 2015';
$posts[8]->edited = true;
$posts[8]->tags = array('Announcement', 'Block Adventures', 'Game', 'JS', 'HTML5');
$posts[8]->content = '
<section>
	<p>In the midst of studying for the ACT, SAT Subject Tests, and AP Exams, I have started putting together a rudimentary platform game. Michael Xing&apos;s valiant efforts of making his Sticktopia game have inspired me to finally start this project.</p>
	<p>Speaking about "The Quest for Sticktopia", the game is more of a button masher than a platformer-shooter. I would like to make a proper platformer-shooter (more powerful upgrades and less button mashing).</p>
	<p>That&apos;s all for today; back to studying for me. Stay tuned for the release. In the meantime, <a href="/pages/block/v0.0/">here&apos;s a demo</a>. In addition, <a href="/pages/block/">here is the working directory</a>.</p>
</section>
';

$posts[9]->title = 'New Website Host';
$posts[9]->metadesc = 'This post announces the change of web host.';
$posts[9]->metakeys = 'announcement, website, hosting';
$posts[9]->date_posted = 'November 27, 2015';
$posts[9]->edited = true;
$posts[9]->tags = array('Announcement', 'Website', 'Hosting');
$posts[9]->content = '
<section>
	<p>After 000webhost deleted my website on August 23 and again on September 22, and was hacked in October, my website stayed offline for weeks because I haven&apos;t bothered to maintain my website. I decided it was time to search for a new web host. (Warning: technical rant incoming)</p>
	<p>The main things I look for in a web host are that it must be free, it must run PHP, it must be an Apache server (.htaccess), it should not force ads, it should support parked domains, and it should park my "bliu1.tk" domain on it. During this first half of Thanksgiving Break (Nov 25 - 27) I have found only one host that met all of the above criteria.</p>
	<p>But before I reveal the one I finally settled on, I must say that I tried three other webhosts yesterday without success: 000Free.us, FileHostingHero, and Subdomain Hosting. 000Free would not let me park my ".tk" address on its subdomain. I could not upload a single file to FileHostingHero because it did not provide a domain name for uploading files. Subdomain Hosting also refused to serve my ".tk" address. Signing up for each of these and figuring out how to use the FTP in each instance occupied the majority of my time yesterday.</p>
	<p>Only today did I finally find one that worked, but it was a bit confusing to set up. That would be x10Hosting. It was one I had used in the past, but I had never bothered to look further into it. The FTP uploading was straightforward but the htaccess kept interfering with how the files were delivered. I ended up cutting out the GZip part, the all pages PHP code, and the caching rules. One more thing I would like to add is that the uploads don&apos;t immediately take effect (unlike 000webhost). After each change of the .htaccess file and each file upload, I had to wait about 30 seconds to a minute before the changes took place on the server. Just be aware out there if you&apos;re looking for a free webhost.</p>
</section>
';

$posts[10]->title = 'Poetry Project';
$posts[10]->metadesc = 'This post showcases an English poetry project.';
$posts[10]->metakeys = 'school';
$posts[10]->date_posted = 'December 11, 2015';
$posts[10]->edited = true;
$posts[10]->tags = array('School');
$posts[10]->content = '
<section>
	<p>I recently did a project for AP English class using Google Slides. I&apos;m rather proud of how nicely the theme turned out. You can see it below (in the blog post).</p>
	<p>I liked the color palette for the "Spearmint" theme, so I tweaked its slide design to appear similar to the "Material Design" theme. The changes were pretty simple from a design standpoint. Just (in View>Master) make all the backgrounds dark gray, move the accent color strip up to the top as a header, and adjust the text colors accordingly. I also put a drop shadow image under the accent color strip for the layered effect. The images are animated like a lightbox you would see on a website. Here&apos;s the embedded slideshow.</p>
	<iframe src="https://docs.google.com/presentation/d/1mV0Jh5UsWDaAaTQLZ0kOrVtLAomOUKyky1uD9o1CeXc/embed?start=false&loop=false&delayms=15000" frameborder="0" width="480" height="389" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
</section>
';

$posts[11]->title = 'Pixel Toys';
$posts[11]->metadesc = 'This post highlights the recently created pixelated canvas simulations.';
$posts[11]->metakeys = 'pixeltracer, pixelcrank, game, js, html5, ti-basic';
$posts[11]->date_posted = 'January 24, 2016';
$posts[11]->edited = true;
$posts[11]->tags = array('PixelTracer', 'PixelCrank', 'Game', 'JS', 'HTML5', 'TI-Basic');
$posts[11]->content = '
<section>
	<p>Pixels for the win! TI-Basic programs meet HTML5 Canvases in the ultimate old school meets new school combo. Check out <a href="/pages/pixeltracer/">The Pixel Tracer</a> and <a href="/pages/pixelcrank/">PixelCrank</a> now.</p>
</section>
<section>
	<h3>The Pixel Tracer/Toy</h3>
	<p>What started as a 3 line TI-84 Basic program has now ballooned into a full scale, full 16-bit color, scalable webtoy. Originally, there was <code class="language-blank">prgmBOUNCE</code> that was put together in the boredom of ninth and tenth grade math classes. See below.</p>
	<pre class="language-blank"><code>PROGRAM:BOUNCE
:For(X,1,99999)
:Pxl-Change(abs(abs(remainder(X,124)-62)-62),abs(abs(remainder(X,188)-94)-94))
:End</code></pre>
	<p>I know that line 2 is probably an unnecessary one-liner, but memory is limited and variables are expensive in TI-Basic. Besides, <code class="language-blank">BOUNCE2</code> and <code class="language-blank">BOUNCE3</code>, two variations of the original, had it even longer. The Pixel Tracer (previously named The Pixel Toy) is based on <code class="language-blank">BOUNCE3</code> below.</p>
	<pre class="language-blank"><code>PROGRAM:BOUNCE3
:For(X,0,99999)
:Pxl-Change(abs(abs(remainder(X,124)-62)-62),round(abs(abs(remainder(round(.99*X,0),188)-94)-94),0))
:End</code></pre>
	<p>For comparison, the two main functions in The Pixel Tracer are below.</p>
	<pre class="language-javascript"><code>function backAndForth(x, k) {
	return Math.round(Math.abs(Math.abs(((Math.round(x)) % (2*k)) - k) - k));
}

function update() {
	// FPS meter
	meter.tickStart();
	for (var y = 0; y < speed; y++) {
		cp.pixelChange(
			backAndForth(0.99 * iter, width),
			backAndForth(iter++, height)
		);
	};
	meter.tick();
}</code></pre>
	<p>In JS, the modulus operator was used instead of a remainder function. As you can see, in the port, I left much of the code condensed in the backAndForth function; that&apos;s just how I code. Also, if you plot out the graph of backAndForth on a Cartesian plane, you will find the basis of the bounce, a triangle wave.</p>
	<p>In the JS port, I also decided to increase the screen resolution by two in each direction for a different effect.</p>
</section>
<section>
	<h3>PixelCrank</h3>
	<p>The second pixel plaything took less effort than the first, but I had to tweak the <code class="language-blank">cPixLib</code> library in the process. Making random pixels pop on a canvas is not particularly tricky with a library, so I took it to the next level with <code class="language-blank">dat.GUI</code>.</p>
	<p>The handy tool called <code class="language-blank">dat.GUI</code> is basically a settings menu you see in the top right that allows specific variables to be changed in real time. Yesterday, I got really bored with it, so I made the sliders logarithmically scaled, added two presets, and made the colors editable. The last feature took the longest to implement&mdash;2 days.</p>
</section>
';

?>
