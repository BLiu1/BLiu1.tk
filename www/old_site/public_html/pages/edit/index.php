<?php require_once("incroot.php");

/* write message to file */
if (isset($_POST['message'])) {
	if (get_magic_quotes_gpc()){
		$postm = stripslashes($_POST['message']);
	} else { /* never with my hosting */
		$postm = $_POST['message'];
	}
	$sterilized = str_replace(array('&', '<', '>', '"', "'", '/', '?', '`'), array('&#x26;', '&#x3c;' , '&#x3e;', '&#x22;', '&#x27;', '&#x2F;', '&#x3f;', '&#x60;'), $postm); /* I thought the problem was multi-line fclose() and fread() */
	if($writeHandle = fopen('message.txt', 'w')){
		fwrite($writeHandle, $sterilized);
		fclose($writeHandle);
		$updated=true;
	} else {
		$updated=false;
	}
} else {
	$updated=false;
}

/* read message from file */
if($readHandle = fopen('message.txt', 'r')){
	if (filesize('message.txt') !== 0){
		$message = fread($readHandle,filesize('message.txt'));
	} else {
		$message = fread($readHandle,1);
	}
	fclose($readHandle);
}

/* write IP to file */

if($ipWrite = fopen('ip.txt', 'w')) {
	if ($updated){
		$ip = (string)$_SERVER['REMOTE_ADDR'];
		fwrite($ipWrite, ($ip . ", "));
		fclose($ipWrite);
	}
}

/* read IPs from file */
if($ipRead = fopen('ip.txt', 'r')){
	$ipFile = substr(fread($ipRead, (filesize('ip.txt') || 1024)), 0, -2);
	fclose($ipRead);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--- The last editors of the text had IP addresses of:
		
		<?php echo($ipFile);?>
		
		Note: This feature is experimental for now.
	-->
	<title>BLiu1's Website - Text Edit</title>
	<meta name="description" content="Feel free to edit the text and submit. Everyone will see the changes!" />
	<meta name="keywords" content="BLiu1, edit, the, text" />
	<meta name="viewport" content="user-scalable = yes, initial-scale = 1" /> 
	<link rel="stylesheet" type="text/css" href="/pages/pages.css"/>
	<link rel="stylesheet" type="text/css" href="/button-link.css"/>
	<link rel="stylesheet" type="text/css" href="/pages/edit/style.css"/>
<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>
<body>
	<form action="./" method="post">
	<div id="content">
		<h1>Text Edit</h1>
		<div id="description">
			<p>Feel free to edit the text and submit. Everyone will see the changes!</p>
		</div>
		<div id="link">
			<button type="submit" id="submit" class="button-link">Submit</button>
			<?php
				if($updated === true){echo '<div id="updated"> Text has been Updated!</div>';}
			?>
		</div>
		<br><div id="back"><a href="/pages/">Back</a></div>
	</div>
	<div id="textarea">
	<textarea id="message" name="message"><?php echo $message;?></textarea>
	</div>
	</form>
	<?php include_once(WWWROOT . '/stats.inc');?>
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
