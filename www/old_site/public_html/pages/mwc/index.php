<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>BLiu1's Website - Molecular Weight and Molar Mass Calculator</title>
	<meta name="description" content="This calculates the molecular weight / molar mass of a substance given the formula." />
	<meta name="keywords" content="BLiu1, chemistry, formula, and, molecular, weight, molar, mass, calculator" />
	<meta name="viewport" content="user-scalable = yes, initial-scale = 1" />
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="license" type="text/html" href="http://creativecommons.org/licenses/by/3.0/" />
	<link rel="stylesheet" type="text/css" href="/pages/pages.css" />
	<link rel="stylesheet" type="text/css" href="/button-link.css" />
	<link rel="stylesheet" type="text/css" href="modal.css"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>
<body>
	<div id="content">
		<h1>Molecular Weight and Molar Mass Calculator</h1>
		<a id="toggle_wrap" href="#info">
			<img id="toggle" width="48" height="48" title="More Information" alt="&#9432;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAATlBMVEUAAAAAALsAALsBAbwCArwHB74AALsHB74UFMIBAbsKCr8CAr0BAbsBAbsBAbsBAbsDA7wEBLwCArwCArwGBr4GBr4CArwPD8EAALoAALuUOdniAAAAGHRSTlMA/faUbxrzKwW+El3dzdHpfVKliTtLrwzASpQPAAAB3UlEQVRIx5WW2ZbDIAiGcYnGmn2Zgfd/0Tm1NolC2jP/8aop8gEKAlMTTeicUq4LJjbwRQ/bE15EvX3AvRqjCelpQefS5s5NO2mkZFBJTy0I8gPeavDANLu0PUdKy81QySo6DQQpW/2f8IvIFjwKiQokvtSFyjtCZEhh9ttChwd0/sinmJ8lfTOnAQ7v7E5IxJDG31ct6UI15fpqRI70k3dTpwfSTfYqKUDSdkEiNOm8aZKQlE/hhfJcPd4lELI07i1sPRYe8FmMHu+kNGJl0D/TQBLS3WogooQ0LusaFDIPFMEg99DFVCLfUdb50UDgBssv5JwSQwrQMSQLm8kXeWRIHTjmYZ8U+WxAtRwoZqARu3xoOJICJWXJ5mvFs6QEJCKdQ+hJQOqEtJp8r4TCdRA40jtkIxQuSIXr80UcictA5AYRknbpLEVoqEI6Qv5BAakB6GsP+XI+NDElWlsbZKKIGNYayaadSiSViQyZdq+QXrSm9DC8u9sGe01lcpspDMKlQR8wRZuBqUAa2xz0wrI0Ha2yCHpNv0VetqE9m3ERxrCuy8ir5vxdu5el5nKgFFRcSPbTyOI8yt4PRUlulsbuPdLgPw/2ul5T+/HpUEmb5vPjpEDij5N/P3/+AOnJlRydWl2QAAAAAElFTkSuQmCC" />
		</a>
		<section class="modal--show" id="info" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
			<div class="modal-inner">
				<header id="modal-label"><h2>Info and Usage</h2></header>
				<div class="modal-content">
					<h3>Information</h3>
					<p>Also known as molar mass, the formula weight of a substance is the sum of atomic weights of the atoms in a chemical formula. If the chemical formula represents a molecule, it is called the molecular weight. This is useful for molar mass calculation because one mole of a substance is equal to the formula weight in grams.</p>
					<h3>Usage</h3>
					<p>Enter the chemical formula of the substance below. Use a period for the dot in hydrates (like CoCl2.6H2O for cobalt(II) chloride hexahydrate). Parentheses are allowed (as in Al2(SO4)3 for aluminum sulfate). Note: This calculator does not check for the validity of the chemical formula.</p>
					<p>The atomic weights were obtained from <a href="http://www.chem.qmul.ac.uk/iupac/AtWt/">this website (IUPAC atomic weights)</a> and my AP Chemistry textbook (<a href="http://www.amazon.com/Chemistry-The-Central-Science-Edition/dp/0131937197">Chemistry: The Central Science; AP Edition</a> (Tenth Edition) authored by Brown, LeMay, and Bursten and published by Pearson Prentice Hall).</p>
				</div>
				<footer></footer>
			</div>
			<a href="#!" class="modal-close" title="Close this modal" data-close="Close"
				data-dismiss="modal">?</a>
		</section>
		<table>
			<tbody>
				<tr id="input_row">
					<td><label for="formula">Chemical Formula: </label></td>
					<td><input name="formula" id="formula" type="text" value=""/></td>
					<td><button type="submit" id="submit" class="button-link">Calculate</button></td>
				</tr>
				<tr id="atoms_row">
					<td><label for="atoms_result">Number of Atoms</label></td>
					<td><textarea name="atoms_result" id="atoms_result"></textarea></td>
				</tr>
				<tr id="weight_row">
					<td><label for="weight_result">Formula / Molecular Weight</label></td>
					<td><input type="text" name="weight_result" id="weight_result"></input></td>
				</tr>
				<tr id="source_row">
					<td><label for="source">Atomic Weights Source</label></td>
					<td><input name="source" id="source" type="text" value="Web"/></td>
					<td><button id="swap" class="button-link">Swap Sources</button></td>
				</tr>
			</tbody>
		</table>
		<br><div id="back"><a href="/pages/">Back</a></div>
	</div>
	<script src="bignumber.min.js"></script>
	<script src="modal.js"></script>
	<script src="script.js"></script>
	<?php include_once(WWWROOT . "/stats.inc"); ?>
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
