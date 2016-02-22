<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
     <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">

    <title>Ngưu ma vương</title>
	
	<script type="text/javascript" src="./lib/soundjs.min.js"></script>
    <script type="text/javascript" src="cdn.js"></script>
	<script type="text/javascript" src="./BraveBull.js"></script>
	<script>
		window.addEventListener ("touchmove", function (event) { event.preventDefault (); }, false);
		if (typeof window.devicePixelRatio != 'undefined' && window.devicePixelRatio > 2) {
			var meta = document.getElementById ("viewport");
			meta.setAttribute ('content', 'width=device-width, initial-scale=' + (2 / window.devicePixelRatio) + ', user-scalable=no');
		}

        var height;
        isIOS=function(){return navigator.userAgent.toLowerCase().match(/(ipad|iphone|ipod)/g)?!0:!1};

        if(isIOS() == true)
        {
            window.onload = resize;
            window.onresize = resize;
            resize();
        }  

        function resize()
        {
            if(window.innerHeight < window.innerWidth)
            {
                height = window.innerHeight;
                document.getElementById('openfl-content').style.height = height + "px";
            }
            else
            {
                document.getElementById('openfl-content').style.height = "100%";
            }
            setTimeout(function()
            {
                window.scrollTo(0, 1);
            }, 40);
        }
	</script>
	
	<style>
        html,body{margin:0; padding:0; width:100%; height:100%; overflow:hidden; position:fixed; top:0px;}
        #openfl-content{width:100%; height:100%; position:fixed; top:0px;}

		
		@font-face {
			font-family: 'Arial';
			font-weight: normal;
			font-style: normal;
		}
    </style>
    <link rel='canonical' href='http://choinhanh.vn/tri-tue/nguu-ma-vuong'>
</head>
<body>
	<div id="openfl-content"></div>
	<script type="text/javascript">
		lime.embed ("openfl-content", 1280, 720, "FFFFFF");

        function createLogo(data)
        {
            if (data.image) 
            {
                logo = document.createElement('img');
                logo.src = data.image;
                if (logo.addEventListener) 
                {
                    logo.addEventListener('click', data.action);
                    logo.addEventListener('touchend', data.action);
                } 
                else if(logo.attachEvent) 
                {
                    logo.attachEvent('click', data.action);
                    logo.attachEvent('touchend', data.action);
                } 
                return logo; 
            }
            return null;
        }

        function createMoreGames(data)
        {
            var mgButton = document.createElement('a');    
            mgButton.href = "javascript:void(0);";
            mgButton.onclick = data.action;
            mgButton.ontouchend = data.action;
            return mgButton;
        }
	</script>
	<?php require '../menu.php'; ?>
</body>
</html>