﻿
<script>
			var login = false;
			console.log('Bạn chưa đăng nhập');
			</script><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ai là triệu phú</title>
	<style type="text/css">
		body{
			margin: 0px;
			padding: 0px;
		}
	</style>
	<link rel='canonical' href='http://choinhanh.vn/tri-tue/ai-la-trieu-phu'/>
	<script src="js/Easeljs.js"></script>
	<script src="js/Tweenjs.js"></script>
	<script src="js/ContentManager.js"></script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/HelpContainer.js"></script>
	<script src="js/endGameNow.js"></script>
	<script src="js/Preloadjs.js"></script>
	<script src="js/Soundjs.js"></script>
	<script src="js/soundsContent.js"></script>
	<script src="js/SoundController.js"></script>
	<script src="js/gameOver_Container.js"></script>
	<script src="js/Main.js"></script>
	<script src="js/howler.js"></script>
	<script>
	var scoreArray = new Array(10);
	for(var i = 0; i < 10; i++)
		scoreArray[i] = new Array(2);
	var message="";
		function clickIE() {
			if (document.all) {(message);
				return false;
			}
		}
		function clickNS(e) {
		if (document.layers||(document.getElementById&&!document.all)) {
			if (e.which==2||e.which==3) {
				(message);return false;
				}
			}
		}
		if (document.layers) {
			document.captureEvents(Event.MOUSEDOWN);
			document.onmousedown=clickNS;
		}else{
			document.onmouseup=clickNS;
			document.oncontextmenu=clickIE;
			document.onselectstart=clickIE;
		}
		document.oncontextmenu = new Function("return false;");
	</script>
	<!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
</head>
<body style="background:black;text-align: center;" onload="init();">
	<canvas id="game" width="800" height="480" class="canvas">
	</canvas>
<?php require '../menu.php'; ?>
</body>
</html>