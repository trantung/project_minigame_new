function APIGet()
{
	var SpilData = {
            id: '576742227280293258' // You receive this value from Spil Games
        };
	GameAPI.loadAPI(function (apiInstance)
	{
		apiInstance.Branding.displaySplashScreen(continueGame);

		var splashScreenData = apiInstance.Branding.getSplashScreen();
		// if (splashScreenData.show ) 
		// {
		// 	document.getElementById("begin_page").onclick =splashScreenData.action;
		//  }

		var logoData = apiInstance.Branding.getLogo();
		if (logoData.image) 
		{
			// Creates a DOM element and uses the values returned by the call
			var begin_logo = document.createElement('img');
			begin_logo.src = logoData.image;
			begin_logo.setAttribute("id", "begin_logo");
			if (begin_logo.addEventListener)
			{
				begin_logo.addEventListener('click', logoData.action);
				begin_logo.addEventListener('touchend', logoData.action);
			} else if (begin_logo.attachEvent) {
				begin_logo.attachEvent('click', logoData.action);
				begin_logo.attachEvent('touchend', logoData.action);
			}
			begin_logo.style.zindex = 1000;
		   // begin_logo.classList.add('spilgames-branding-image');  
		   document.getElementById("begin_page").appendChild(begin_logo);
		//	 document.body.appendChild(begin_logo);
				var first_logo = document.createElement('img');
			first_logo.src = logoData.image;
			first_logo.setAttribute("id", "first_logo");
			if (first_logo.addEventListener)
			{
				first_logo.addEventListener('click', logoData.action);
				first_logo.addEventListener('touchend', logoData.action);
			} else if (first_logo.attachEvent) {
				first_logo.attachEvent('click', logoData.action);
				first_logo.attachEvent('touchend', logoData.action);
			}
			first_logo.style.zindex=1000;
		   // first_logo.classList.add('spilgames-branding-image');  
		    document.getElementById("first_page").appendChild(first_logo);
			// document.body.appendChild(first_logo);

	var qiehuan_logo = document.createElement('img');
			qiehuan_logo.src = logoData.image;
			qiehuan_logo.setAttribute("id", "qiehuan_logo");
			if (qiehuan_logo.addEventListener)
			{
				qiehuan_logo.addEventListener('click', logoData.action);
				qiehuan_logo.addEventListener('touchend', logoData.action);
			} else if (qiehuan_logo.attachEvent) {
				qiehuan_logo.attachEvent('click', logoData.action);
				qiehuan_logo.attachEvent('touchend', logoData.action);
			}
			qiehuan_logo.style.zindex=1000;
		   // qiehuan_logo.classList.add('spilgames-branding-image');  
		    document.getElementById("qiehuan_page").appendChild(qiehuan_logo);
			// document.body.appendChild(first_logo);


			 	var second_logo = document.createElement('img');
			second_logo.src = logoData.image;
			second_logo.setAttribute("id", "second_logo");
			if (second_logo.addEventListener)
			{
				second_logo.addEventListener('click', logoData.action);
				second_logo.addEventListener('touchend', logoData.action);
			} else if (second_logo.attachEvent) {
				second_logo.attachEvent('click', logoData.action);
				second_logo.attachEvent('touchend', logoData.action);
			}
			second_logo.style.zindex=1000;
		   // second_logo.classList.add('spilgames-branding-image');  
			 document.getElementById("second_page").appendChild(second_logo);
			 	var third_logo = document.createElement('img');
			third_logo.src = logoData.image;
			third_logo.setAttribute("id", "third_logo");
			if (third_logo.addEventListener)
			{
				third_logo.addEventListener('click', logoData.action);
				third_logo.addEventListener('touchend', logoData.action);
			} else if (third_logo.attachEvent) {
				third_logo.attachEvent('click', logoData.action);
				third_logo.attachEvent('touchend', logoData.action);
			}
			third_logo.style.zindex=1000;
		   // third_logo.classList.add('spilgames-branding-image');  
			document.getElementById("third_page").appendChild(third_logo);

	
		}

	var buttonProperties = apiInstance.Branding.getLink('more_games');
	var MG1 = document.createElement('img');
    // assign the outgoing click     
	MG1.src="images//more1.png";
    MG1.onclick = buttonProperties.action;
  //  eval("addYourSite").onclick=buttonProperties.action;
    MG1.ontouchend = buttonProperties.action;
    MG1.setAttribute("id", "more1");

  //  MG1.classList.add('little_scale');  //放大
	MG1.style.zindex=8;
    // Adds the element to the document
   document.getElementById("first_page").appendChild(MG1);
MG1.addEventListener("mouseover",function(){eval(this.id).src="images/"+this.id+"1.png";})//鼠标移过图像改变
MG1.addEventListener("mouseout",function(){	eval(this.id).src="images/"+this.id+".png";})//鼠标移过图像改变
	var MG2 = document.createElement('img');
    // assign the outgoing click     
	MG2.src="images//more2.png";
    MG2.onclick = buttonProperties.action;
    MG2.ontouchend = buttonProperties.action;
    MG2.setAttribute("id", "more2");
MG2.addEventListener("mouseover",function(){eval(this.id).src="images/"+this.id+"1.png";})//鼠标移过图像改变
MG2.addEventListener("mouseout",function(){	eval(this.id).src="images/"+this.id+".png";})//鼠标移过图像改变
  //  MG2.classList.add('little_scale');  //放大
	MG2.style.zindex=8;
    // Adds the element to the document
   document.getElementById("second_page").appendChild(MG2);

   	var MG3 = document.createElement('img');
    // assign the outgoing click     
	MG3.src="images//more3.png";
    MG3.onclick = buttonProperties.action;
    MG3.ontouchend = buttonProperties.action;
    MG3.setAttribute("id", "more3");
MG3.addEventListener("mouseover",function(){eval(this.id).src="images/"+this.id+"1.png";})//鼠标移过图像改变
MG3.addEventListener("mouseout",function(){	eval(this.id).src="images/"+this.id+".png";})//鼠标移过图像改变
//    MG3.classList.add('little_scale');  //放大
	MG3.style.zindex=8;
    // Adds the element to the document
   document.getElementById("third_page").appendChild(MG3);
	},SpilData);
}

  function continueGame(){
            // display game menu
			

			initialize();
        };

// JavaScript Document
window.onresize=function()
{
	resize();
	}
function resize()
{
	
	windowHeight=document.documentElement.clientHeight;
	windowWidth=document.documentElement.clientWidth;
	if(windowWidth>windowHeight/800*1280)
	{
		background.style.width=windowHeight/800*1280+'px';
		background.style.height=windowHeight+'px';
	}
	else
	{
		background.style.width=windowWidth+'px';
		background.style.height=windowWidth/1280*800+'px';		
	}
}

var first_page=document.getElementById('first_page');
var second_page=document.getElementById('second_page');

var playMusic=document.createElement('audio');
var iPad;
var samPad;
var chromeOnAndroid;//在安卓手机的chrome浏览器上不自动播放音乐
//初始化函数：
var imageName=[];
var imageNum=[], loadedimages=0;//预加载图片
function preloadimages(imageName){

    var imageName=(typeof imageName!="object")? [imageName] : imageName;
    function imageloadpost(){
        loadedimages++;
	
        if (loadedimages==imageName.length){
           console.log("图片已经加载完成");
		
        }
    }
    for (var i=0; i<imageName.length; i++){
        imageNum[i]=new Image();
        imageNum[i].src="images/"+imageName[i]+".png";
    //    if (imageNum[i].complete) { // 如果图片已经存在于浏览器缓存，直接调用回调函数  
      //      return; // 直接返回，不用再处理onload事件  
    //    }  
        imageNum[i].onload=function(){
            imageloadpost();
        }
        imageNum[i].onerror=function(){
        imageloadpost();
        }
    }
}
var winkBegin,mouthBegin;//用于控制眨眼和微笑
function initialize()
{
	
//	document.ondragstart=function (){return false;};//本句与拖动API冲突，需要拖动就不能加这个语句
	var musicButton=document.getElementById("music"); 
	musicButton.style.display="none";
	var sUserAgent = navigator.userAgent.toLowerCase();
	if(sUserAgent.indexOf("ipad")>0)//检测是否ipad
		iPad=true;
	if(sUserAgent.indexOf("samsung")>0 || sUserAgent.indexOf("p5100")>0 )//检测是否samsung
		samPad=true;
	if(sUserAgent.indexOf("chrome")>0 && sUserAgent.indexOf("linux")>0 )//检测是否移动设备的chrome浏览器
		chromeOnAndroid=true;
	resize();
	var beginPage=document.getElementById("begin_page");

//	var progNum=document.getElementById("progNum");


	beginPage.style.display="block";
	//progNum.style.fontSize=parseInt(background.style.height)/22+"pt";
	
	var setPro=setInterval(progBar,80);
    //var progressBar=document.getElementById("progress_bar");
    progValue=0;
	var b=0,i=0; 
	function progBar()
	{  

		if(b==0)
		{
			i=3;
			b=1;
		}
		
		if(progValue>=100)
		{
			clearInterval(setPro);
			playMusic.src="audio/bgmusic.wav";
			playMusic.loop=true;

			if(iPad==true||samPad==true || chromeOnAndroid==true )//如果是苹果的平板，则音乐不会自动播放，直接设置为关
			{
				musicButton.src='images/yinyueguan.png';
				judgeMusic=false;
				playMusic.pause();
			}
			else
			{
				musicButton.src='images/yinyuekai.png';
				judgeMusic=true;
window.onfocus=function(){	playMusic.play(); };

			}

			musicButton.style.display="block";
			document.getElementById("start").style.display="block";
		}
		if(progValue<100)
		{
           
			progValue+=i;
			document.getElementById("progBar").style.left=(-100+progValue)+"%";
		}
	}
//	preloadimages(imageName);//预加载重复显示的图片
	var setMusicPlay=setInterval(musicPlayOn,1000);

	setInterval("setButtonCanClick()",2700);//2秒后才可以再次点击
	eyeNum=1;zuiNum=1;
	winkBegin=setInterval( "winkStart();",3000);//3秒眨一次眼
	mouthBegin=setInterval("mouthOpenStart();",4000);//4秒开合一次嘴
}

var buttonCanClick=false;//按钮点击太快会影响动画过程与处理（去掉已经加载的类），因此设置按钮等1秒后才能再点击
function setButtonCanClick()
{
	buttonCanClick=true;
}
var musicButton=document.getElementById("music"); 
var playMusic;
var judgeMusic=true;
function controlMusic()//...................................................控制音乐
{
	if(buttonCanClick==true)
	{ 
		buttonCanClick=false;
		if(judgeMusic==true)
		{
			document.getElementById('music').src='images/yinyueguan.png';
			judgeMusic=false;
			playMusic.pause();		   
		}
		else
		{
			document.getElementById('music').src='images/yinyuekai.png';
			judgeMusic=true;
			playMusic.play();
		}
	}
	else
	{
		console.log("点击太快!");
	}
}
var pause=0;
var musicCount=0;
function musicPlayOn()
{

var temp=true;	
	window.onfocus=function()
	{//window.alert("musicPlayOn  "+playMusic+"  "+judgeMusic);
		eyeNum=1;zuiNum=1;
		winkBegin=setInterval( "winkStart();",3500);//3秒眨一次眼
		mouthBegin=setInterval("mouthOpenStart();",4500);//4秒开合一次嘴
		musicCount=1;
		if(judgeMusic==true)
			playMusic.play();

	}
	window.onblur=function()
	{

	//	window.alert("musicNotPlayOn  "+playMusic+"  "+judgeMusic);
		clearInterval(winkBegin);//停止眨眼,防止在获得焦点时眼睛眨过不停
		clearInterval(mouthBegin);//停止微笑
		musicCount=2;
		playMusic.pause();
	}
}
window.addEventListener("pageshow", function(evt){//功能实现：初始进入页面后如果页面位于前面则播放音乐
	    	playMusic.play();
        }, false);
window.addEventListener("pagehide", function(evt){//功能实现：在IOS的safari下，如果失去焦点则停止播放音乐
    clearInterval(winkBegin);//停止眨眼
	clearInterval(mouthBegin);//停止微笑
	musicCount=2;
	playMusic.pause();

       }, false);
window.onfocus=function()
{
	musicCount=1;
	if(judgeMusic==true)
		playMusic.play();

	}
window.onblur=function()
{
	clearInterval(winkBegin);//停止眨眼
	clearInterval(mouthBegin);//停止微笑
	musicCount=2;
	playMusic.pause();
}
var playCount=0;
var firstCall=0;

function pauseGame()
	{
        // Insert here the logic to pause your game
		pause=1;
		playMusic.pause();
  //      console.log('ad requested, you should pause your game');
    }

function resumeGame()
{
    // Insert here the logic to resume your game
		//广告后还处于焦点，再播放音乐
		pause=0;
		window.onfocus=function()
		{
			if(judgeMusic==true)
				playMusic.play();
		}
		window.onblur=function()
		{
			playMusic.pause();
		}
    console.log('ad displayed, you can now resume your game');
}
function playGame()
{

	document.getElementById("first_page").style.display="none";
	eval("qiehuan_page").style.display="block";
	setTimeout("startPlayGame()",2500);		
}
function startPlayGame()
{

	eval("qiehuan_page").style.display="none";
	document.getElementById('second_page').style.display="block";//隐藏第一页，显示第二页

}
function mouseOver(buttonId){	eval(buttonId).src="images/"+buttonId+"1.png";}//鼠标移过图像改变
function mouseOut(buttonId) {	eval(buttonId).src="images/"+buttonId+".png";}
var changeEye,changeZui;eyeNum=1;zuiNum=1;
function startGame()
{
	eval("begin_page").style.display="none";
	document.getElementById("first_page").style.display="block";
}

eyeNum=0;zuiNum=0;
function winkStart()
{
	var	 startWink=setInterval(function()
	{
		eyeNum++;
		if(eyeNum>=4)
			{
				clearInterval(startWink);//只眨一次
				eyeNum=1;
			}
		if(document.getElementById("second_page").style.display=="block")
			eval("second_page_yanjing").src="images/renwuyanjing"+eyeNum+".png";
		if(document.getElementById("third_page").style.display=="block")
			eval("third_page_yanjing").src="images/renwuyanjing"+eyeNum+".png";
		if((document.getElementById("third_page").style.display=="block")   && (document.getElementById("large_show").style.display=="block"))
		eval("large_third_page_yanjing").src="images/renwuyanjing"+eyeNum+".png";

		if(document.getElementById("first_page").style.display=="block")
			eval("first_page_yanjing").src="images/kaichangyanjing"+eyeNum+".png";
		if(document.getElementById("qiehuan_page").style.display=="block")
			eval("qiehuan_yanjing").src="images/qiehuanyanjing"+eyeNum+".png";
	},100); 
}
function mouthOpenStart () {var startOpenMouth=setInterval(function(){
	zuiNum++;
	if(zuiNum==3)
	{
		clearInterval(startOpenMouth);
		zuiNum=1;
	}
	if(document.getElementById("first_page").style.display=="block")
		eval("first_page_zuiba").src="images/kaichangzuiba"+zuiNum+".png";

	if(document.getElementById("second_page").style.display=="block")
		eval("second_page_zuiba").src="images/renwuzuiba"+zuiNum+".png";
	if(document.getElementById("third_page").style.display=="block")
		eval("third_page_zuiba").src="images/renwuzuiba"+zuiNum+".png";

	if((document.getElementById("third_page").style.display=="block")   && (document.getElementById("large_show").style.display=="block"))
		eval("large_third_page_zuiba").src="images/renwuzuiba"+zuiNum+".png";

	if(document.getElementById("qiehuan_page").style.display=="block")
		eval("qiehuan_zuiba").src="images/qiehuanzuiba"+zuiNum+".png";
//	if(document.getElementById("third_page").style.display=="block")
	//	eval("third_page_zuiba").src="images/huanzhuangzuiba"+zuiNum+".png";
},200);}
layerNum=1;
function clickReset()
{	
	var allOn=document.getElementsByClassName("on");

	for(var i=0;i<allOn.length;i++)
	{
		eval(allOn[i]).style.display="none";
		eval(allOn[i].id).src="";
	}
	var  allDrag=document.getElementsByClassName("dragme");
	for(var i=0;i<allDrag.length;i++)
	{
		console.log(allDrag[i]+"  "+allDrag.length);
		//allDrag[i]="";
		eval(allDrag[i]).src="";
		eval(allDrag[i].id+"close").style.display="none";
		eval(allDrag[i].id).style.display="none";
	}
	layerNum=1;
	layerArray.length=0;
	console.log("layerArray.length  "+layerArray.length);

eval("girl_on").style.display="block";
eval("girl_on").src="images/renwu.png";

// eval("neiyi1_on").style.display="block";
// eval("neiyi1_on").src="images/neiyi1.png";
// eval("neiyi2_on").style.display="block";
// eval("neiyi2_on").src="images/neiyi2.png";
	var allShow=document.getElementsByClassName("show");
	for(var i=1;i<allShow.length;i++)
	{
		console.log(allShow.length+"  "+allShow[i].id);
		eval(allShow[i].id).style.display="none";
		eval(allShow[i].id).src="";
	}
	eval("third_bg").style.display="block";
eval("third_bg").src="images/beijing.jpg";
eval("girl_show").style.display="block";
eval("girl_show").src="images/renwu.png";
eval("third_page_yanjing").style.display="block";
eval("third_page_zuiba").style.display="block";
eval("third_page_yanjing").src="images/renwuyanjing1.png";
eval("third_page_zuiba").src="images/renwuzuiba1.png";
eval("toufa_on").style.display="block";
eval("toufa_on").src="images/toufa1_on.png";

eval("toufa_show").style.display="block";
eval("toufa_show").src="images/toufa1_on.png"
// eval("neiyi1_show").style.display="block";
// eval("neiyi1_show").src="images/neiyi1.png";
// eval("neiyi2_show").style.display="block";
// eval("neiyi2_show").src="images/neiyi2.png";
eval("girl_show_gebo").style.display="block";
eval("girl_show_gebo").src="images/gebo.png";

}
var yanhua;
var countyanhua=0;
function happyNewYear()
{
countyanhua++;
if(countyanhua>=12)
	clearInterval(yanhua);
	new fireworks();
}
var photoSoundAlwary; photoSoundCount=0;
function clickShow()
{
	var allShow=document.getElementsByClassName("show");
	for(i=2;i<allShow.length;i++)
	{
		eval("large_"+allShow[i].id).style.display=eval(allShow[i].id).style.display;
		if(eval(allShow[i].id).src!="")
			eval("large_"+allShow[i].id).src=eval(allShow[i].id).src;
	}
	eval("qiehuan_page").style.zIndex=100;

	eval("qiehuan_page").style.display="block";
	/*
	var allKuang=document.getElementsByClassName("xuankuang");//隐藏已经打开的选框
	for(var i=0;i<allKuang.length;i++)
	{
		eval(allKuang[i].id+"kuang").style.display="none";
	}
	eval("beijing3").style.display="block";*/
	eval("third_bg").style.display="block";
	eval("third_bg").src="images/zhanshibeijing.jpg";
	photoSoundCount=0;
	setTimeout( function()
	{
		photoSoundAlwary=setInterval( function(){photoSoundCount++;if(photoSoundCount>6) clearInterval(photoSoundAlwary);eval("photoSound").play();},1000);
		document.getElementById('first_page').style.display="none";
		document.getElementById('second_page').style.display="none";
		eval("qiehuan_page").style.display="none";
		yanhua=setInterval(happyNewYear,2000);
		document.getElementById('third_page').style.display="block";
		setTimeout( function()
	{
		eval("large_show").style.display="block";
		eval("large_xiangkuang_show").style.display="block";
		
	},10000);
	},2000);
	
//	var sUserAgent = navigator.userAgent.toLowerCase();


	
//	console.log((sUserAgent.indexOf("android")>0 || (sUserAgent.indexOf("ipad")>0) && sUserAgent.indexOf("chrome")>0 ));
//	if(sUserAgent.indexOf("firefox")>0 ||sUserAgent.indexOf("android")>0 || (sUserAgent.indexOf("ipad")>0 && sUserAgent.indexOf("crios")>0 ) || (sUserAgent.indexOf("ipad")>0 && sUserAgent.indexOf("ucbrowser")>0 ) || (sUserAgent.indexOf("linux")>0 && sUserAgent.indexOf("chrome")>0 ))//安卓下无法打印 ipad下 chrome浏览器无法打印,在firefox中多按几次打印按钮后，有些对象不显示
//		document.getElementById("print").style.display="none";
//	else
//		document.getElementById("print").style.display="block";
	var score = 5000 + Math.floor(Math.random() * 5000)
	console.log("luudiem" + score)
}
function clickReplay()
{
	clearInterval(yanhua);
	clearInterval(photoSoundAlwary);
	try
	{
		GameAPI.GameBreak.request(pauseGame, resumeGame);
	}
	catch (error)	{	}
	
	document.getElementById('first_page').style.display="block";
	document.getElementById('second_page').style.display="none";
	document.getElementById('third_page').style.display="none";
	eval("large_show").style.display="none";
 clickReset();

// eval("neiyi1_on").style.display="block";
// eval("neiyi1_on").src="images/neiyi1.png";
// eval("neiyi2_on").style.display="block";
// eval("neiyi2_on").src="images/neiyi2.png";
// eval("neiyi1_show").style.display="block";
// eval("neiyi1_show").src="images/neiyi1.png"
// eval("neiyi2_show").style.display="block";
// eval("neiyi2_show").src="images/neiyi2.png";

}

var nowNum=1;
var allNum=0;
var hiddenThePage;//需要隐藏的页面
var rightInPage;//需要清除类的页面

function clearleftInClass()
{
	
	var allPageEle=document.getElementsByClassName("left_in_dis");
	for(i=0;i<allPageEle.length;i++)
	{
		allPageEle[i].className=allPageEle[i].className.replace(" left_in_dis","");
	//	console.log(allPageEle.length+" []  "+allPageEle[i].id+"  []  "+allPageEle[i].className);
	}
 allPageEle=document.getElementsByClassName("left_in_dis");
	for(i=0;i<allPageEle.length;i++)
	{
		allPageEle[i].className=allPageEle[i].className.replace(" left_in_dis","");
	}
	allPageEle=document.getElementsByClassName("left_in_dis");
	for(i=0;i<allPageEle.length;i++)
	{
		allPageEle[i].className=allPageEle[i].className.replace(" left_in_dis","");
	}
	allPageEle=document.getElementsByClassName("left_in_dis");
	for(i=0;i<allPageEle.length;i++)
	{
		allPageEle[i].className=allPageEle[i].className.replace(" left_in_dis","");
	}
	allPageEle=document.getElementsByClassName("left_in_dis");
	for(i=0;i<allPageEle.length;i++)
	{
		allPageEle[i].className=allPageEle[i].className.replace(" left_in_dis","");
	}
	allPageEle=document.getElementsByClassName("left_in_dis");
	for(i=0;i<allPageEle.length;i++)
	{
		allPageEle[i].className=allPageEle[i].className.replace(" left_in_dis","");
	}
	allPageEle=document.getElementsByClassName("left_in_dis");
	for(i=0;i<allPageEle.length;i++)
	{
		allPageEle[i].className=allPageEle[i].className.replace(" left_in_dis","");
	}
}


function hiddenObject(aa)//移动到最左边后隐藏并且去掉 从左边移出的类
{
	eval(aa).style.display="none";
	var nowDisplayEle=document.getElementsByClassName(aa.id);//列举正在显示的类中的元素
	for(var i=0;i<nowDisplayEle.length;i++)
	{
		nowDisplayEle[i].className=nowDisplayEle[i].className.toString().replace(" Right_Out","");
	}
	
}
function clearUpIn(aa)//去掉 从右边进入的类
{
	
	var nowDisplayEle=document.getElementsByClassName(aa.id);//列举正在显示的类中的元素
	for(var i=0;i<nowDisplayEle.length;i++)
	{
		nowDisplayEle[i].className=nowDisplayEle[i].className.toString().replace(" Up_In","");
	}
	
}


function selectBtn(displayID)
{
	eval("rotateSound").play();
	
	if(buttonCanClick==true)//如果点击太快就不处理
	{ 
		buttonCanClick=false;
		if(eval(displayID+"kuang").style.display=="block")//如果点击的物品框已经显示，则不处理
		return;
	//先找出是哪一个框正在显示
	
		var nowDisplayClass;
		var allKuang=document.getElementsByClassName("xuankuang");
	
		for(var i=0;i<allKuang.length;i++)
		{
			eval(allKuang[i].id).src="images/"+allKuang[i].id+"_xia.png";
			if(eval(allKuang[i].id+"kuang").style.display =="block")
			{
				nowDisplayClass=allKuang[i].id+"kuang";//查找到正在显示的框
				break;
			}
		}
		eval(displayID).src="images/"+displayID+".png";
	//	eval(nowDisplayClass).style.display ="none";
		var nowDisplayEle=document.getElementsByClassName(nowDisplayClass);//列举正在显示的类中的元素
		for(var i=0;i<nowDisplayEle.length;i++)
		{
			if(!(nowDisplayEle[i].className.toString().indexOf(" Right_Out") >0))//如果本元素的类型中没有向右移出则增加相应的类型
				nowDisplayEle[i].className=nowDisplayEle[i].className+" Right_Out";
		}

		setTimeout("hiddenObject("+nowDisplayClass+")", 1000);//对移出的框进行隐藏

		setTimeout( function(){
		eval(displayID+"kuang").style.display="block";//显示已经选择的框
		var nextDisplayEle=document.getElementsByClassName(displayID+"kuang");//列举下一个显示的类中的元素
		
		for(var i=0;i<nextDisplayEle.length;i++)
		{
			if(!(nextDisplayEle[i].className.indexOf(" Up_In") >=0))//如果本元素的类型中没有向下移进则增加相应的类型
				nextDisplayEle[i].className=nextDisplayEle[i].className+" Up_In";
		}
		},1000);
	
	setTimeout("clearUpIn("+displayID+"kuang)", 2000);//对移进的框进行去除类

	}
	else
	{
		console.log("点击太快");
	}


}
function selectShiwu(shiwuID)
{
	winkStart();
	mouthOpenStart();
	eval("clickSound").play();
	shiwu=shiwuID.substring(0,shiwuID.length-1);
	if(shiwu=="lianyi") 
	{
		
		eval("lianyi_on").style.display="block";
		eval("shangyi_show").style.display="none";
		// eval("neiyi1_show").style.display="none";//隐藏内衣
		// eval("neiyi2_show").style.display="none";
		eval("qunzi_show").style.display="none";
		eval("lianyi_show").style.display="block";
		eval("lianyi_on").src="images/"+shiwuID+"_on.png";
		setTimeout(function()
		{
			eval("shangyi_on").style.display="none";
			// eval("neiyi1_on").style.display="none";//隐藏内衣
			// eval("neiyi2_on").style.display="none";
			eval("qunzi_on").style.display="none";
		},200);
	
	}
	if(shiwu=="shangyi"  ) 
	{
		eval("shangyi_on").style.display="block";
		eval("shangyi_show").style.display="block";
		eval("qunzi_show").style.display="block";
		eval("lianyi_show").style.display="none";
		setTimeout(function()	{		eval("lianyi_on").style.display="none";		
	//	eval("neiyi1_on").style.display="none";eval("neiyi1_show").style.display="none";
		},200);//延迟隐藏内衣

	//	if(	eval("qunzi_on").style.display=="none")
	//	{
		//	eval("neiyi2_on").style.display="block";
		//	eval("neiyi2_show").style.display="block";
	//	}
	//	else
	//	{
		//	setTimeout(function()	{		
			//	eval("neiyi2_on").style.display="none";},200);//延迟隐藏内衣
		//	eval("neiyi2_show").style.display="none";
	//	}

	}

	if( shiwu=="qunzi" ) 
	{
	//	eval("neiyi1_on").style.display="block";
	//	if(	eval("shangyi_on").style.display=="none")
	//	{
		//	eval("neiyi1_on").style.display="block";
		//	eval("neiyi1_show").style.display="block";
	//	}
	//	else
	//	{
	//			setTimeout(function()	{		
	//				eval("neiyi1_on").style.display="none";},200);//延迟隐藏内衣
	//		eval("neiyi1_show").style.display="none";
	//	}
		eval("qunzi_on").style.display="block";
		eval("shangyi_show").style.display="block";
		eval("qunzi_show").style.display="block";
	//	setTimeout(function()	{			eval("neiyi2_on").style.display="none";},200);//延迟隐藏内衣
	//	eval("neiyi2_show").style.display="none";
		setTimeout(function()	{				eval("lianyi_on").style.display="none";},200);//延迟隐藏
	
	
		eval("lianyi_show").style.display="none";
	}
	console.log(shiwuID+"  "+shiwu+"_on");
	eval(shiwu+"_on").style.display="block";
	eval(shiwu+"_show").style.display="block";
	eval(shiwu+"_on").src="images/"+shiwuID+"_on.png";
	eval(shiwu+"_show").src="images/"+shiwuID+"_on.png";
	if(shiwu!="toufa")
		layerAddEle(shiwuID);

}


var layerArray=new Array();
function layerAddEle(shiwuID)
{
	//console.log("111   layerNum:  "+layerNum+"   []  layerArray.length:  "+layerArray.length);
	shiwu=shiwuID.substring(0,shiwuID.length-1);
//	console.log("shiwuID  "+shiwuID+"  []  shiwuID.style.zIndex   "+  eval(shiwu+"_on").style.zIndex)
	find=0;
	for(i=0;i<layerArray.length;i++)
	{
	//	console.log("222   layerNum:  "+layerNum+"   []  layerArray.length:  "+layerArray.length);
		if((layerArray[i]==shiwu)||((shiwu=="shangyi" || shiwu=="qunzi" ) && (layerArray[i]=="lianyi")) ||((shiwu=="lianyi") && (layerArray[i]=="shangyi"||layerArray[i]=="qunzi")))//第一种，在数组中找到选取的饰物，第二种，选取的上衣或下装，在数组中找到连衣裙，第三种，选取的连衣裙，在数组中找到上衣或下装
		{
			find=1;break;
		}
	
	}
//	console.log("333   layerNum:  "+layerNum+"   []  layerArray.length:  "+layerArray.length);
	if(find==1)//在已经显示的物品中找到需要更换的饰物块
	{
		layerNum=i;
		layerArray[layerNum]=shiwu;	
		document.getElementById("layerimg"+layerNum).src="images/"+shiwuID+".png";
		document.getElementById("layerimg"+layerNum).style.display="block";
		if(shiwu!="toufa")
		document.getElementById("layerimg"+layerNum+"close").style.display="block";
	//	console.log("444   layerNum:  "+layerNum+"   []  layerArray.length:  "+layerArray.length);
	}
	else//在已经显示的物品中没有找到需要更换的饰物块layer层中的元素增加显示一个，相应位置改变
	{
		layerNum=i;
		layerArray[layerNum]=shiwu;	
	document.getElementById("layerimg"+layerNum).src="images/"+shiwuID+".png";
	document.getElementById("layerimg"+layerNum).style.display="block";
	document.getElementById("layerimg"+layerNum+"close").style.display="block";
		
	}

	//	console.log("777   layerNum:  "+layerNum+"   []  layerArray.length:  "+layerArray.length);
	
	//如果数组中有连衣裙和上衣或下装的，需要把后面的清除掉
	for(i=0;i<layerArray.length;i++)
	{
		if(layerArray[i]=="lianyi")
		{
			for (var j = 0; j<layerArray.length; j++)
			 {
			 	if(layerArray[j]=="shangyi" || layerArray[j]=="qunzi")
			 	{
			 		for(k=j;k<layerArray.length;k++)
			 		{
			 			if(layerArray[k+1])
			 			{
			 				layerArray[k]=layerArray[k+1];
			 				document.getElementById("layerimg"+k).src=document.getElementById("layerimg"+(k+1)).src;
			 			}
			 			else
			 			{
			 				layerArray.splice(k);
			 				document.getElementById("layerimg"+k).src="";
			 				document.getElementById("layerimg"+k).style.display="none";
			 				document.getElementById("layerimg"+k+"close").style.display="none";

			 			}
			 		}
			 		break;
			 	}
			}
		}
	}
}
function closeLayerEle(shiwuID)
{
	
	var fangkuan=shiwuID.substring(0,shiwuID.length-5);
	var whichShiwu=eval(fangkuan).src.substring(0,eval(fangkuan).src.length-5);
	whichShiwu=whichShiwu.substring(whichShiwu.indexOf("images")+7);
	console.log(shiwuID+" [] "+fangkuan+" [] "+whichShiwu);
	eval(whichShiwu+"_on").style.display="none";
	eval(whichShiwu+"_show").style.display="none";
/*	if(whichShiwu=="shangyi")
	{
		eval("neiyi1_on").style.display="block";
		eval("neiyi1_show").style.display="block";
	}
	if(whichShiwu=="qunzi")
	{
		eval("neiyi2_on").style.display="block";
		eval("neiyi2_show").style.display="block";
	}
	if(whichShiwu=="lianyi")
	{
		eval("neiyi1_on").style.display="block";
		eval("neiyi2_on").style.display="block";
		eval("neiyi1_show").style.display="block";
		eval("neiyi2_show").style.display="block";
	}
	*/
	var num=parseInt(fangkuan.substring(fangkuan.length-1));//获取显示框的位置，后面的向前移
//	console.log("num "+num +"  [] " +"layerArray.length  " +layerArray.length);
	for(i=num;i<layerArray.length;i++)
	{
		//console.log("aai "+i+"  [] " +"layerimg"+i+" [] layerArray[i+1]  " + layerArray[i]);
		if(layerArray[i+1])
		{
			layerArray[i]=layerArray[i+1];
			document.getElementById("layerimg"+i).src=document.getElementById("layerimg"+(i+1)).src;
		}
	}
	layerArray.splice(i-1);
//	console.log("bbi "+i+"  [] " +"layerimg"+i);
	document.getElementById("layerimg"+(i-1)).src="";
	document.getElementById("layerimg"+(i-1)).style.display="none";
	document.getElementById("layerimg"+(i-1)+"close").style.display="none";
//	console.log(whichShiwu);
}
function clickShifan()
 {
 	eval("shifanpic").style.display="block";
 	eval("closeShifanBut").style.display="block";
  	eval("closeShifanHua").style.display="block";
}
function closeShifan()
{
	eval("shifanpic").style.display="none";
 	eval("closeShifanBut").style.display="none";
  	eval("closeShifanHua").style.display="none";
}

function closeDisplayLayer()
{
	if(eval("layer").style.display!="none")
	{
	eval("layer").style.display="none";
	eval("openAsideLayer").style.display="block";
	eval("closeDisplayLayerBut").style.left="0%";
	}
	else
	{
	eval("layer").style.display="block";
	eval("openAsideLayer").style.display="none";
	eval("closeDisplayLayerBut").style.left="10%";
	}

}	

var tmp=0;//为1 显示连衣裙，为0显示上衣和下衣


function hiddenObj()
{
    if(tmp==0)
    {
        eval("shangyi_on").style.display="block";
        eval("qunzi_on").style.display="block";
        eval("shangyi_show").style.display="block";
        eval("qunzi_show").style.display="block";
        eval("lianyi_show").style.display="none";
        eval("lianyi_show").src="";
        eval("lianyi_on").style.display="none";
        tmp=1;
    }
    else
    {
        eval("lianyi_on").style.display="block";
        eval("shangyi_show").style.display="none";
        eval("qunzi_show").style.display="none";
        eval("shangyi_show").src="";
        eval("qunzi_show").src="";
        eval("lianyi_show").style.display="block";
        eval("shangyi_on").style.display="none";
        eval("qunzi_on").style.display="none";

        tmp=0;
    } 
}

//产生烟花效果

var fireworks = function(){
this.size = 20;
this.rise();
}
fireworks.prototype = {
color:function(){
var c = ['0','3','6','9','c','f'];
var t = [c[Math.floor(Math.random()*100)%6],'0','f'];
t.sort(function(){return Math.random()>0.5?-1:1;});
return '#'+t.join('');
},
aheight:function(){
var h = document.documentElement.clientHeight-250;
return Math.abs(Math.floor(Math.random()*h-200))+201;
},
firecracker:function(){
var b = document.createElement('div');
var w = eval("background").offsetWidth;
b.style.position = 'absolute';
b.style.color = this.color();
b.style.bottom = 0;
b.style.left = Math.floor(Math.random()*w)+1+'px';
eval("background").appendChild(b);
return b;
},
rise:function(){
var o = this.firecracker();
var n = this.aheight();
var c = this.color;
var e = this.expl;
var s = this.size;
var k = n;
var m = function(){
o.style.bottom = parseFloat(o.style.bottom)+k*0.1+'px';
k-=k*0.1;
if(k<2){
clearInterval(clear);
e(o,n,s,c);
}
}
o.innerHTML = '.';
if(parseInt(o.style.bottom)<n){
var clear = setInterval(m,20);
}
},
expl:function(o,n,s,c){
var R=n/3,Ri=n/6,Rii=n/9;
var r=0,ri=0,rii=0;
for(var i=0;i<s;i++){
var span = document.createElement('span');
var p = document.createElement('i');
var a = document.createElement('a');
span.style.position = 'absolute';
span.style.fontSize = n/10+'px';
span.style.left = 0;
span.style.top = 0;
span.style.zindex="1000";
span.innerHTML = '*';
p.style.position = 'absolute';
p.style.left = 0;
p.style.top = 0;
p.innerHTML = '*';
p.style.zindex="1000";
a.style.position = 'absolute';
a.style.left = 0;
a.style.top = 0;
a.innerHTML = '*';
a.style.zindex="1000";
o.appendChild(span);
o.appendChild(p);
o.appendChild(a);
}
function spr(){
r += R*0.1;
ri+= Ri*0.06;
rii+= Rii*0.06;
sp = o.getElementsByTagName('span');
p = o.getElementsByTagName('i');
a = o.getElementsByTagName('a');
for(var i=0; i<sp.length;i++){
sp[i].style.color = c();
p[i].style.color = c();
a[i].style.color = c();
sp[i].style.left=r*Math.cos(360/s*i)+'px';
sp[i].style.top=r*Math.sin(360/s*i)+'px';
sp[i].style.zIndex="1000";
sp[i].style.fontSize=parseFloat(sp[i].style.fontSize)*0.96+'px';
p[i].style.left=ri*Math.cos(360/s*i)+'px';
p[i].style.top=ri*Math.sin(360/s*i)+'px';
p[i].style.fontSize=parseFloat(sp[i].style.fontSize)*0.96+'px';
p[i].style.zIndex="1000";
a[i].style.left=rii*Math.cos(360/s*i)+'px';
a[i].style.top=rii*Math.sin(360/s*i)+'px';
a[i].style.fontSize=parseFloat(sp[i].style.fontSize)*0.96+'px';
a[i].style.zIndex="1000";
}
R-=R*0.1;
if(R<2){
o.innerHTML = '';
o.parentNode.removeChild(o);
clearInterval(clearI);
}
}
var clearI = setInterval(spr,20);
}
}

function selectNextPage(PageId)
{
	var shiwuType=PageId.substring(0,PageId.length-3);
	var direct=PageId.substring(PageId.length-3);
	
	if(direct=="you")
	{
		var allShiwuPage=document.getElementsByClassName(shiwuType+2+"page");
		for(var i=0;i<allShiwuPage.length;i++)
			allShiwuPage[i].style.display="block";
		var allShiwuPage=document.getElementsByClassName(shiwuType+1+"page");
		for(var i=0;i<allShiwuPage.length;i++)
			allShiwuPage[i].style.display="none";
	}
if(direct=="zuo")
	{
		var allShiwuPage=document.getElementsByClassName(shiwuType+1+"page");
		for(var i=0;i<allShiwuPage.length;i++)
			allShiwuPage[i].style.display="block";
		var allShiwuPage=document.getElementsByClassName(shiwuType+2+"page");
		for(var i=0;i<allShiwuPage.length;i++)
			allShiwuPage[i].style.display="none";
	}
}
function clickTips()
{
	eval("tips_page").style.display="block";
	document.getElementById("second_page").style.display="none";
}
function closeTips()
{
	eval("tips_page").style.display="none";
	document.getElementById("second_page").style.display="block";
}