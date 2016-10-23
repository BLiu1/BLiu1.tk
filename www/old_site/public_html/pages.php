<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8" />
        <title>...Redirecting...</title>
        <meta http-equiv="refresh" content="5;URL=/pages/">
		<style>
			h1{
				text-align: center;
				font-size: 3em;
				font-family: Verdana, Arial, sans-serif;
			}
		</style>
<?php include_once(WWWROOT . '/ga.inc'); ?>
    </head>
    <body onLoad="redirect()">
        <h1>......... Redirecting .........</h1>
        <script>
            (function() {setTimeout(function(){window.location.replace("/pages/")}, 5000);})();
        </script>
    </body>
</html>
