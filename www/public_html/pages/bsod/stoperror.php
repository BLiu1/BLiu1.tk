<?php require_once("incroot.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>BLiu1's Website - Blue Screen of Death</title>
	<meta charset="utf-8" />
	<meta name="description" content="A fake blue screen to prank people with." />
	<meta name="keywords" content="fake, blue, screen, of, death, bsod, stop, error, blue, screen, windows, 7, fullscreen, full-screen, f11" />
	<link rel="shortcut icon" href="../pictures/favicon.ico" type="image/x-icon" />
	<link rel="license" type="text/html" href="http://creativecommons.org/licenses/by/3.0/" />
	<style>
		html {
			background-color: #0000AA;
			color: #FFFFFF;
			overflow: hidden;
			/*No Select*/
			  -webkit-touch-callout: none;
			  -webkit-user-select: none;
			  -khtml-user-select: none;
			  -moz-user-select: moz-none;
			  -ms-user-select: none;
			  user-select: none;
			/*Cursor Hider*/
			  cursor: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNgYAIAAAUAA4xC8REAAAAASUVORK5CYII='),
			  none !important;
		}
		#text {
			font-family: Lucida Console, Consolas, monospace;
			font-size: 1.2em;
			transform:scale(1.2,1); /* W3C */
			  -webkit-transform:scale(1.2,1); /* Safari and Chrome */
			  -moz-transform:scale(1.2,1); /* Firefox */
			  -ms-transform:scale(1.2,1); /* IE 9 */
			  -o-transform:scale(1.2,1); /* Opera */
			width: 83%; /*to counter stretching*/
			height: 100%;
			position: absolute; /*to position it correctly*/
			left: 8.333%;
			top: 0.5em;
		}
		#lock {
			
		}
	</style>
	<?php include_once(WWWROOT . '/ga.inc');?>
</head>

<body>
<div id="text">
<?php if (!isset($_GET['funny'])) { ?>
A problem has been detected and Windows has been shut down to prevent damage to your computer.<br>
<br>
DRIVER_IRQL_NOT_LESS_OR_EQUAL<br>
<br>
If this is the first time you've seen this Stop error screen, restart your computer. If this screen appears again, follow these steps:<br>
<br>
Check to be sure any new hardware or software is properly installed. If this is a new installation, ask your hardware or software manufacturer for any Windows updates you might need.<br>
<br>
If problems continue, disable or remove any newly installed hardware or software. Disable BIOS memory options such as caching or shadowing. If you need to use Safe Mode to remove or disable components, restart your computer, press F8 to select Advanced Startup Options, and then select Safe Mode.<br>
<br>
Technical information:<br>
<br>
*** STOP: 0x00000050 (0xFD3094C2, 0x00000001, 0xFBFE7617, 0x00000000)<br>
<br>
<br>
*** SPCMDCON.SYS - Address FBFE7617 base at FBFE5000, DateStamp 3d6dd67c<br>
<br>
Beginning dump of physical memory<br>
Physical memory dump complete.<br>
Contact your system administrator or technical support group for further<br>
assistance.<br>
<br>
<?php ;} else {?>
A problem has been detected and Windows (lol) has been shut down to prevent damage to your computer.<br>
<br>
THE FOLLOWING FILES ARE MISSING/CORRUPT:<br>
REASON_TO_USE_WINDOWS.SYS<br>
LOL_WINDOWS.SYS<br>
ROFL_WINDOWS_VISTA.SYS<br>
<br>
THE FOLLOWING FILES HAVE PERFORMED AN ILLEGAL OPERATION:<br>
WINDOWSXP.EXE<br>
<br>
This is definitely not the first time you've seen this error screen, but what can you do?<br>
Might as well restart your computer. If this problem persists (it probably will), follow these steps:<br>
<br>
Walk/ride/fly/swim to the nearest Apple Store.<br>
Talk to a clerk about the Mac OS X Operating System.<br>
Pay him/her one hundred twenty-nine US dollars ($129).<br>
Bring the box home and pop the CD into your Optical Drive.<br>
<br>
Or, if you think Apple sucks, try checking your piece of cr@p BIOS to see if you have not already disabled everything, and fix it. Once again, Windows will provide you with no support. If by chance you have no idea what the heck you are doing (yeah right) press F8, and just boot into Safe Mode, even though half the time it is unavailable due to the "incredible reliability" of Windows Operating Systems.<br>
<br>
Technical Information:<br>
<br>
*** STOP: 0xUSING00x33 (x00xWIND0Wx5, 0PxER4T1ng, x5Y5z0T3Ms0x, 0x5T0xuPIDx)<br>
<br>
*** REASON_TO_USE_WINDOWS - Bad Idea, xW731xe,rj00<br>
             \system32\systemfilezz\REASON_TO_USE_WINDOWS.SYS<br>
<br>
<br>
beginning to dump physical memory in order to hide evidence<br>
physical dump complete - lol. dump.<br>
<br>
Contact one of your many IT Technicians or your Administrator (like he really knows anything) for further gri - i mean assistance<br>
<br>
<?php ;} ?>
</div>
</body>
</html>
