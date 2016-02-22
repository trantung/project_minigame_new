function addBulet(ax, ay, speed, angle, damage) {

    var bullet = new createjs.Shape(new createjs.Graphics().beginFill("#000000").drawCircle(0, 0, 3));

    bullet.damage = damage; // Урон пули
    bullet._speed = []; // Скорость пули

    bullet.x = ax + 39 * Math.cos(angle / 180 * 3.14);
    bullet.y = ay + 39 * Math.sin(angle / 180 * 3.14);

    bullet.startX = bullet.x;
    bullet.startY = bullet.y;

    // console.log("shoot x= " + bullet.x + " shoot y= " + bullet.y);
    //bullet.x=100;  
    //bullet.y=100;  

    bullet._speed.x = speed * Math.cos(angle / 180 * 3.14);
    bullet._speed.y = speed * Math.sin(angle / 180 * 3.14);

    game.gamePage.addChild(bullet);
    game._listOfBullets.push(bullet);
    //game.gamePage.addChild(bullet);            
}

function addRocket(ax, ay, speed, angle, damage, enemyTarget) {

    var bullet = new createjs.Container();
    var bg = new createjs.Bitmap(preload.getResult('rocket_1'));
    bg.regX = bg.image.width / 2;
    bg.regY = bg.image.height / 2;


    bullet.addChild(bg);
    bullet.damage = damage; // Урон пули
    bullet._speed = []; // Скорость пули
    bullet.startX = ax;
    bullet.startY = ay;
    bullet._speed.x = speed * Math.cos(angle / 180 * 3.14);
    bullet._speed.y = speed * Math.sin(angle / 180 * 3.14);
    bullet.speed = speed;
    bullet.id = "laser";
    bullet.x = ax;
    bullet.y = ay;
    bullet.turnRate = 0.7;
    bullet.moveX = bullet.moveY = 0;
    bullet.enemyTarget = enemyTarget;
    game.gamePage.addChild(bullet);
    game._listOfRockets.push(bullet);
    /* 
     game.gamePage.g.moveTo(bullet.startX, bullet.startY);
     
     
     var enemies = game._listOfEnemies;   // Список врагов
     var n = enemies.length; // Количество врагов
     var enemy;  // Текущий враг
     var dist; // Дистанция между текущим врагом и пулей
     
     for (var j = 0; j < n; j++)
     {
     enemy = enemies[j];
     dist = getWidth(ax, ay, enemy.x, enemy.y);
     // Если дистанция между врагом и пулей меньше или равна
     // сумме радиусов юнита и пули, значит они сталкиваются
     
     
     if (dist <=100)
     {
     
     addDamage(enemy, bullet.damage); // Наносим урон врагу
     game.gamePage.g.lineTo(enemy.x, enemy.y);
     break;
     }
     
     
     }
     
     */
}


function updateRockets() {

    for (var i = 0; i < game._listOfRockets.length; i++)
    {
        var bullet = game._listOfRockets[i];

        bullet.distanceX = bullet.enemyTarget.x - bullet.x;
        bullet.distanceY = bullet.enemyTarget.y - bullet.y;

        //get total distance as one number
        bullet.distanceTotal = Math.sqrt(bullet.distanceX * bullet.distanceX + bullet.distanceY * bullet.distanceY);

        //calculate how much to move
        bullet.moveDistanceX = bullet.turnRate * bullet.distanceX / bullet.distanceTotal;
        bullet.moveDistanceY = bullet.turnRate * bullet.distanceY / bullet.distanceTotal;
        //increase current speed
        bullet.moveX += bullet.moveDistanceX;
        bullet.moveY += bullet.moveDistanceY;
        //get total move distance
        bullet.totalmove = Math.sqrt(bullet.moveX * bullet.moveX + bullet.moveY * bullet.moveY);
        //apply easing
        bullet.moveX = bullet.speed * bullet.moveX / bullet.totalmove;
        bullet.moveY = bullet.speed * bullet.moveY / bullet.totalmove;
        //move follower
        bullet.x += bullet.moveX;
        bullet.y += bullet.moveY;
        //rotate follower toward target
        bullet.rotation = 180 * Math.atan2(bullet.moveY, bullet.moveX) / Math.PI;


        if (bullet.enemyTarget) {
            if (bullet.distanceTotal > 400) {
                removeRocket(bullet);
                return;
            } else {
                if (bullet.distanceTotal <= 3.5 * .5 + bullet.enemyTarget._w * .5)
                {
                    addDamage(bullet.enemyTarget, bullet.damage); // Наносим урон врагу
                    removeRocket(bullet);
                    break;
                }
            }
        } else {

            removeRocket(bullet);

        }
    }
}

function updateBullets() {

   for (var i = 0; i < game._listOfBullets.length; i++)
    {
        var bullet = game._listOfBullets[i];
        bullet.x += bullet._speed.x * game._deltaTime;
        bullet.y += bullet._speed.y * game._deltaTime;

        var bulletDistance = getWidth(bullet.x, bullet.y, bullet.startX, bullet.startY);

        if (bulletDistance > game.maxBulletDistance) {
            removeBullet(bullet);
            return;
        } else {
            var enemies = game._listOfEnemies;   // Список врагов
            var n = enemies.length; // Количество врагов
            var enemy;  // Текущий враг
            var dist; // Дистанция между текущим врагом и пулей

            for (var j = 0; j < n; j++)
            {
                enemy = enemies[j];
                dist = getWidth(bullet.x, bullet.y, enemy.x, enemy.y);
                // Если дистанция между врагом и пулей меньше или равна
                // сумме радиусов юнита и пули, значит они сталкиваются

                if (dist <= 3.5 * .5 + enemy._w * .5)
                {
                    addDamage(enemy, bullet.damage); // Наносим урон врагу
                    removeBullet(bullet);
                    break;
                }
            }
        }
    }
}

function removeBullet(bullet)
{
    // Удаляем врага с карты
    // game.gamePage.removeChild(bullet);
    game.gamePage.removeChild(bullet);
    // Удаляем врага из списка обрабатываемых объектов
    for (var i = 0; i < game._listOfBullets.length; i++)
    {
        if (game._listOfBullets[i] == bullet)
        {
            game._listOfBullets[i] = null;
            game._listOfBullets.splice(i, 1);
            break;
        }
    }
}


function removeRocket(bullet)
{
    // Удаляем врага с карты
    // game.gamePage.removeChild(bullet);
    game.gamePage.removeChild(bullet);
    // Удаляем врага из списка обрабатываемых объектов
    for (var i = 0; i < game._listOfRockets.length; i++)
    {
        if (game._listOfRockets[i] == bullet)
        {
            game._listOfRockets[i] = null;
            game._listOfRockets.splice(i, 1);
            break;
        }
    }
}