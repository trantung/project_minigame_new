oS.Init({PName:[oPeashooter,oSunFlower,oCherryBomb,oWallNut],ZName:[oZombie,oConeheadZombie],PicArr:["images/interface/background1unsodded2.jpg","images/interface/background1.jpg"],backgroundImage:"images/interface/background1unsodded2.jpg",CanSelectCard:0,LevelName:"关卡 1-4",LargeWaveFlag:{9:$("imgFlag1")},LoadMusic:function(){NewEle("oEmbed","embed","width:0;height:0",{src:"music/Look up at the.mp3"},EDAll)},StartGame:function(){NewImg("sod3row","images/interface/background1.jpg","left:-118px;clip:rect(0,264px,600px,0);z-index:0",EDAll);NewImg("SodRoll_1","images/interface/SodRoll.png","left:122px;top:48px;z-index:1",EDAll);NewImg("SodRollCap_1","images/interface/SodRollCap.png","left:117px;top:131px;z-index:1",EDAll);NewImg("SodRoll_2","images/interface/SodRoll.png","left:122px;top:428px;z-index:1",EDAll);NewImg("SodRollCap_2","images/interface/SodRollCap.png","left:117px;top:511px;z-index:1",EDAll);(function(e,h,b,d,c,g,a,f){e+=15;h+=16;d+=16;$("sod3row").style.clip="rect(0,"+e+"px,600px,0)";SetStyle($("SodRoll_1"),{left:h+"px",width:--b+"px",height:"141px"});SetStyle($("SodRoll_2"),{left:h+"px",width:b+"px",height:"141px"});SetStyle($("SodRollCap_1"),{left:d+"px",width:--c+"px",height:--g+"px",top:++a+"px"});SetStyle($("SodRollCap_2"),{left:d+"px",width:c+"px",height:g+"px",top:++f+"px"});e<990?oSym.addTask(3,arguments.callee,[e,h,b,d,c,g,a,f]):(ClearChild($("SodRoll_1"),$("SodRoll_2"),$("SodRollCap_1"),$("SodRollCap_2")),(function(){ClearChild($("oEmbed"));NewEle("oEmbed","embed","width:0;height:0",{src:"music/UraniwaNi.mp3"},EDAll);SetBlock($("dTop"));oS.InitLawnMower();SetVisible($("dFlagMeter"));PrepareGrowPlants(function(){oP.Monitor();BeginCool();AutoProduceSun(25);oSym.addTask(1500,function(){oP.AddZombiesFlag();SetVisible($("dFlagMeterContent"))},[])})})())})(283,122,68,117,73,71,131,511)}},{ArZ:[oZombie,oZombie,oZombie,oZombie,oZombie,oZombie,oZombie,oConeheadZombie,oConeheadZombie],FlagNum:9,SumToZombie:{1:7,2:9,"default":9},FlagToSumNum:{a1:[3,5,8],a2:[1,2,3,10]},FlagToMonitor:{8:[ShowFinalWave,0]},FlagToEnd:function(){(NewImg("imgSF","images/interface/Shovel.png","left:667px;top:330px;cursor:pointer",EDAll)).onclick=function(){SetHidden(EDAll,$("dFlagMeter"));(SetStyle($("imgSF"),{left:"351px",top:"131px",width:"152px",height:"68px",cursor:"default"})).onclick=null;$("iNewPlantCard").src="images/interface/Shovel.png";innerText($("dNewPlantTitle"),"你获得了铲子！");innerText($("dNewPlantName"),"铲子");innerText($("dNewPlantTooltip"),"你可以使用铲子铲除掉草坪上的植物");$("btnNextLevel").onclick=function(){SelectModal(5)};SetBlock($("dNewPlant"))};NewImg("PointerUD","images/interface/PointerDown.gif","top:295px;left:676px",EDAll)}});