function addStoneBall(mousePosX, mousePosY) {

   
    if (game.gamePage.activePower.cake.loading == false) {
        game.gamePage.activePower.cake.arc = 0;
        game.gamePage.activePower.cake.startAngle = 90;
        game.gamePage.activePower.cake.reloadTime = getCatapultData("reloadTime");

/*
console.log("_______catapult________")
console.log("reloadTime = "+ getCatapultData("reloadTime"));
console.log("damage = "+ getCatapultData("damage"));
console.log("radius = "+ getCatapultData("radius"));
console.log("_______________________")
*/


        game.gamePage.activePower.cake.startDraw();
        var stoneBall = new createjs.Bitmap(preload.getResult('stoneBall'));

        game.gamePage.enemyContainer.addChild(stoneBall);
        stoneBall.regX = stoneBall.image.width / 2;
        stoneBall.regY = stoneBall.image.height / 2;
        stoneBall.scaleX = stoneBall.scaleY = 0.5;

        stoneBall.x = randRange(30, 930);
        stoneBall.y = 680;
        stoneBall._targetX = mousePosX;
        stoneBall._targetY = mousePosY;

        // TweenMax.to(stoneBall, 0.5, {bezier:[{x:mousePosX, y:mousePosY}, {x:mousePosX/2+10, y:mousePosY/2+10}], orientToBezier:true});

        TweenMax.delayedCall(0.1, function() {
            stoneBall.addEventListener("tick", animateMissile)
        })
    }
}

function animateMissile(e)
{

    e.currentTarget.x = (e.currentTarget.x - ((e.currentTarget.x - e.currentTarget._targetX) * 0.2));
    e.currentTarget.y = (e.currentTarget.y - ((e.currentTarget.y - e.currentTarget._targetY) * 0.4));
    e.currentTarget.scaleX = (e.currentTarget.scaleX - ((e.currentTarget.scaleX - 0.2) * 0.1));
    e.currentTarget.scaleY = (e.currentTarget.scaleY - ((e.currentTarget.scaleY - 0.2) * 0.1));
    //  e.currentTarget.rotation = ((Math.atan2((e.currentTarget.y - e.currentTarget._targetY), (e.currentTarget.x - e.currentTarget._targetX)) * 180) / Math.PI);
    if ((((Math.abs((e.currentTarget.x - e.currentTarget._targetX)) < 10)) && ((Math.abs((e.currentTarget.y - e.currentTarget._targetY)) < 10))))
    {
        var dust = new createjs.Sprite(dust_spriteSheet)
        game.gamePage.enemyContainer.addChild(dust);
        dust.play();
        dust.regX = 80;
        dust.regY = 93;

        dust.x = e.currentTarget.x;
        dust.y = e.currentTarget.y;

        addCatapuldDamage(e.currentTarget._targetX, e.currentTarget._targetY);
        e.currentTarget.removeEventListener("tick", animateMissile)
        game.gamePage.enemyContainer.removeChild(e.currentTarget);



        dust.addEventListener("animationend", function() {
            dust.gotoAndStop(26);
            TweenMax.to(dust, 1.3, {alpha: 0, onComplete: function() {
                    game.gamePage.enemyContainer.removeChild(dust);

                }})
        });
     }
    ;
}


function addCatapuldDamage(_x, _y) {

    var catapultRadius =  getCatapultData("radius");
  
    for (var i = 0; i < game._listOfEnemies.length; i++)
    {
        var enemy = game._listOfEnemies[i];
        if (getWidth(enemy.x, enemy.y, _x, _y) < catapultRadius) {
            addDamage(enemy, getCatapultData("damage"));
        }
    }
}