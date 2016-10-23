<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>BLiu1's Website - Overmouse</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="/pages/pages.css" />
	<meta name="description" content="A useless mouseover game." />
	<meta name="keywords" content="mouse, over, overmouse, mouseover" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="license" type="text/html" href="http://creativecommons.org/licenses/by/3.0/" />
	<style>
		#content{
			-webkit-transform: translate3d(0,0,0);
			   -moz-transform: translate3d(0,0,0);
			    -ms-transform: translate3d(0,0,0);
			     -o-transform: translate3d(0,0,0);
			        transform: translate3d(0,0,0);
		}
		
		#one, #two, #three, #four, #five, #six, #seven, #eight, #nine, #ten, #elevenA, #elevenB, #twelveB {
			box-shadow: 0 0 20px #222222;
			width: 0;
			height: 0;
			border-radius: 20px;
			padding: 20px;
			overflow: hidden;
			transition: width 1.5s, height 1.5s;
			-webkit-transition: width 1.5s, height 1.5s; /* Safari */
		}
		
		#twelveB {
			border-radius: 20px;
			padding: 2px;
			transition:  width 1.5s, height 1.5s, padding 1.5s;
			-webkit-transition:  width 1.5s, height 1.5s, padding 1.5s;
		}
		
		#twelveA, #orange, #yellow, #green, #blue, #purple {
			width: 0;
			height: 0;
			border-radius: 20px;
			padding: 10px;
			overflow: hidden;
			transition: width 1.5s, height 1.5s;
			-webkit-transition: width 1.5s, height 1.5s; /* Safari */
		}
		
		#one { margin: 20px auto; box-shadow: 0 0 20px #000000, 0 0 20px #000000, 0 0 20px #000000}
		
		#one:hover {
			width: 760px;
			height: 600px;
		}
		
		#two { float: right;}
		
		#two:hover {
			width: 720px;
			height: 560px;
		}
		
		#three {float: left;}
		
		#three:hover {
			width: 680px;
			height: 520px;
		}
		
		#four {float: right;}
		
		#four:hover {
			width: 640px;
			height: 480px;
		}
		
		#five {float: left;}
		
		#five:hover {
			width: 600px;
			height: 440px;
		}
		
		#six {float: right;}
		
		#six:hover {
			width: 560px;
			height: 400px;
		}
		
		#seven {float: left;}
		
		#seven:hover {
			width: 520px;
			height: 360px;
		}
		
		#eight {float: right;}
		
		#eight:hover {
			width: 480px;
			height: 320px;
		}
		
		#nine {float: left;}
		
		#nine:hover {
			width: 440px;
			height: 280px;
		}
		
		#ten {float: right;}
		
		#ten:hover {
			width: 400px;
			height: 240px;
		}
		
		#elevenA {}
		
		#elevenA:hover {
			width: 360px;
			height: 200px;
		}
		
		#twelveA {float: right; background-color: #FF0000}
		
		#twelveA:hover {
			width: 340px;
			height: 180px;
		}
		
		#orange {float: left; background-color: orange}
		
		#orange:hover {
			width: 320px;
			height: 160px;
		}
		
		#yellow {float: left; background-color: yellow}
		
		#yellow:hover {
			width: 300px;
			height: 140px;
		}
		
		#green {float: left; background-color: green}
		
		#green:hover {
			width: 280px;
			height: 120px;
		}
		
		#blue {float: left; background-color: blue}
		
		#blue:hover {
			width: 260px;
			height: 100px;
		}
		
		#purple {float: left; background-color: purple; text-align: center}
		
		#purple:hover {
			width: 240px;
			height: 80px;
		}
		
		#rainbow {color: white;}
		
		#elevenB {float: right}
		
		#elevenB:hover {
			width: 360px;
			height: 160px;
		}
		
		#twelveB {float: left; background-color: #000000;}
		
		#twelveB:hover {
			width: 320px;
			height: 120px;
			padding: 20px;
		}
		
		
		@keyframes colorful {
		0%   {background:#FF0000; left:0px;   box-shadow: 0 0 80px #FF0000;}
		12.5%{background:#FFFF00; left:30px;  box-shadow: 0 0 80px #FFFF00;}
		25%  {background:#00FF00; left:60px;  box-shadow: 0 0 80px #00FF00;}
		37.5%{background:#00FFA9; left:90px;  box-shadow: 0 0 80px #00FFA9;}
		50%  {background:#00FFFF; left:120px; box-shadow: 0 0 80px #00FFFF;}
		62.5%{background:#00A9FF; left:150px; box-shadow: 0 0 80px #00A9FF;}
		75%  {background:#0000FF; left:180px; box-shadow: 0 0 80px #0000FF;}
		87.5%{background:#FF00FF; left:210px; box-shadow: 0 0 80px #FF00FF;}
		100% {background:#FF0000; left:240px; box-shadow: 0 0 80px #FF0000;}
		}
		
		@-webkit-keyframes colorful { /* Safari and Chrome */
		0%   {background:#FF0000; left:0px;   box-shadow: 0 0 80px #FF0000;}
		12.5%{background:#FFFF00; left:30px;  box-shadow: 0 0 80px #FFFF00;}
		25%  {background:#00FF00; left:60px;  box-shadow: 0 0 80px #00FF00;}
		37.5%{background:#00FFA9; left:90px;  box-shadow: 0 0 80px #00FFA9;}
		50%  {background:#00FFFF; left:120px; box-shadow: 0 0 80px #00FFFF;}
		62.5%{background:#00A9FF; left:150px; box-shadow: 0 0 80px #00A9FF;}
		75%  {background:#0000FF; left:180px; box-shadow: 0 0 80px #0000FF;}
		87.5%{background:#FF00FF; left:210px; box-shadow: 0 0 80px #FF00FF;}
		100% {background:#FF0000; left:240px; box-shadow: 0 0 80px #FF0000;}
		}
		
		#thing {
			margin-top: 0;
			float: left;
			overflow: hidden;
			position: relative;
			width: 0;
			height: 0;
			background-color: #FFFFFF;
			box-shadow: 0 0 40px #FFFFFF;
			border-radius: 40px;
			padding: 0;
			transition: margin-top 1s linear, padding 1s linear, background-color 1s linear, box-shadow 1s linear;
			-webkit-transition: margin-top 1s linear, padding 1s linear, background-color 1s linear, box-shadow 1s linear;
		}
		
		#twelveB:hover > #thing {
			margin-top: 20px;
			padding: 40px;
			background-color: #FF0000;
			box-shadow: 0 0 80px #FF0000;
			transition-delay: 3s;
			
			animation-name: colorful;
			animation-duration: 3s;
			animation-timing-function: linear;
			animation-delay: 4s;
			animation-iteration-count: infinite;
			animation-direction: alternate;
			animation-play-state: running;
			/* Safari and Chrome: */
			-webkit-animation-name: colorful;
			-webkit-animation-duration: 3s;
			-webkit-animation-timing-function: linear;
			-webkit-animation-delay: 4s;
			-webkit-animation-iteration-count: infinite;
			-webkit-animation-direction: alternate;
			-webkit-animation-play-state: running;
		}
		
	</style>
<?php include_once(WWWROOT . '/ga.inc'); ?>
</head>

<body>

<div id="content">
	<h1>Overmouse</h1>
	<div id="one">
		<div id="two">
			<div id="three">
				<div id="four">
					<div id="five">
						<div id="six">
							<div id="seven">
								<div id="eight">
									<div id="nine">
										<div id="ten">
											<div id="elevenA">
												<div id="twelveA">
													<div id="orange">
														<div id="yellow">
															<div id="green">
																<div id="blue">
																	<div id="purple">
																		<h2 id="rainbow">Rainbow</h2>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="elevenB">
												<div id="twelveB">
													<div id="thing"></div>
												</div>
											</div>
											<p>This was made with CSS3 and a lot of divs!</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<p>A rather boring and useless mouseover game.</p>
	<br><div id="back"><a href="/pages/">Back</a></div>
</div>
<?php include_once(WWWROOT . '/stats.inc'); ?>
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
