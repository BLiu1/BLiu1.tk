<!DOCTYPE html>
<!-- Hey, you're looking at the source code! -->
<html>
<head>
	<title>BLiu1's Website - Block Adventures Level Editor</title>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/pages/pages.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="license" type="text/html" href="http://opensource.org/licenses/MIT" />
	<style id="style"></style>
</head>
<body>
	<h3>Block Adventures Level Editor</h3>
	<table id="map"></table>
	<div>
		<button id="import">Import</button>
		<button id="export">Export</button>
	</div>
	<textarea id="text" rows="32" cols="79"></textarea>
	<div id="info">
		<table>
			<thead>
				<tr>
					<th>Key</th><th>Tile</th>
				</tr>
			</thead>
			<tbody>
				<tr id="t1"><td>1</td><td>Empty</td></tr>
				<tr id="t2"><td>2</td><td>Wall</td></tr>
				<tr id="t3"><td>3</td><td>Spawn</td></tr>
				<tr id="t4"><td>4</td><td>Goal</td></tr>
				<tr id="t5"><td>5</td><td>Lava</td></tr>
				<tr id="tg"><td>g</td><td>Grid</td></tr>
			</tbody>
		</table>
	</div>
	<script src="script.js"></script>
</body>
</html>
