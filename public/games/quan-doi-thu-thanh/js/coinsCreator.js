
CoinsCreator = function(container){
    this.view = new createjs.Container;
    this.container= container;
    this.leftLimit = 100;
    this.rightLimit = 860;
    
    this.topLimit = 100;
    this.bottomLimit = 540;

    
   
}
CoinsCreator.prototype.start = function(){
    
     game.coinTween = TweenMax.delayedCall(game.settings.coin.timer, addCoin);
    
}




function addCoin(container){
   
    var _x = randRange(100,  860);
    var _y = randRange(100, 540);
 
    var randomCellIndex = randRange(0, game._coinPositionsArray.length-1)
    var bg = new createjs.Sprite(coin_spriteSheet);
    bg.regX=100/2;
    bg.regY=100/2;
    bg.x= game._coinPositionsArray[randomCellIndex].x+40;
    bg.y= game._coinPositionsArray[randomCellIndex].y+40;
    bg.alpha=0;
    bg.scaleX=bg.scaleY = 0.05;
    game.gamePage.coinsContainer.addChild(bg);
    
  bg.timerTween=TweenMax.to(bg, 0.2, {delay:2, onComplete:coinTimerFinished, onCompleteParams:[bg]});
   
    TweenMax.to(bg, 0.5, {alpha:1, scaleX:0.7, scaleY:0.7, ease:Elastic.easeOut, onComplete:coinAddClickEvent, onCompleteParams:[bg]});
    
    
}


function coinTimerFinished(bg){
    
    TweenMax.killTweensOf(bg);
    bg.removeEventListener("click", coinClickhandler)
    
    TweenMax.to(bg, 0.5, {alpha:0, scaleX:0.01, scaleY:0.01, ease:Back.easeInOut, onComplete:function(){
            bg.stop();
            bg.parent.removeChild(bg);
            bg=null;
            game.coinTween = TweenMax.delayedCall(game.settings.coin.timer, addCoin);
            
            
    }, onCompleteParams:[bg]});
    
}



function coinAddClickEvent(bg){
    
  
   bg.addEventListener("click", coinClickhandler)
   bg.play();
  
  // setTimeout()
    
}


function coinClickhandler(e){
    
    
    var coin= e.currentTarget;
     TweenMax.killTweensOf(coin); 
    TweenMax.to(coin, 0.2, {alpha:0.1, scaleX:0.05, scaleY:0.05, onComplete:function(){game.gamePage.view.removeChild(coin)}});
    game.coinTween = TweenMax.delayedCall(game.settings.coin.timer, addCoin);
    updatePriceTF(game.settings.coin.price);
    
    new PopUpText(game.gamePage.coinsContainer, "50gold", coin.x, coin.y);
}

CoinsCreator.prototype.addHandler = function(e){
   
    
}
