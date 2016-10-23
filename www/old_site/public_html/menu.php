
<?php
function pages($path = "./") {
	$sitemap = simplexml_load_file($path . 'custom-sitemap.xml');
	foreach($sitemap->dir[0]->dir as $page) {
		echo '		<li><a href="/pages/' . $page['name'] . '/">' . $page['title'] . '</a></li>' . "\n";
	}
}
?>
<!-- Navigation Menu -->
<nav>
	<ul>
	<li><a href="/">Home</a></li>
	<li><a href="/about.php">About</a></li>
	<li class="expandable" tabindex="0"><a href="/pages/">Projects <i class="material-icons">&#xE5C5;</i></a>
		<ul>
<?php
if (file_exists("./custom-sitemap.xml")) {
    pages();
} elseif (file_exists("../custom-sitemap.xml")) {
    pages("../");
}
?>
		</ul>
	</li>
	<li><a href="/blog/">Blog</a></li>
	<li><a href="/contact.php">Contact</a></li>
	</ul>
</nav>
<script>
	/* Nav JS */
	var arr = document.querySelectorAll(".expandable");
	for (var i = 0, l = arr.length; i < l; i++) {
		var el = arr[i];
		el.firstElementChild.href = "javascript:void(0);";
		el.onmouseover = function(){
				el.classList.add("drop");
				el.firstElementChild.firstElementChild.innerHTML = "&#xE5C7;";
			};
		el.onmouseout = function(){
				el.classList.remove("drop");
				el.firstElementChild.firstElementChild.innerHTML = "&#xE5C5;";
			};
	}
</script>
<!-- End Navigation Menu -->
