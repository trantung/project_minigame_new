/*game.pikeMan_radius = 118;
 game.pikeMan_damage = 0.3;
 game.pikeMan_speed = 0.5;
 
 game.archer_damage = 0.07;
 game.archer_radius = 118;
 game.archer_speed = 0.5;
 
 //Knight Data
 game.knight_damage = 0.15;
 game.knight_radius = 118
 game.knight_speed = 0.5
 
 game.catapult_damage = 0.3;
 game.catapult_radius = 120;
 game.catapult_reloadTime = 10;
 
 game.pitfal_damage = 0.09;
 game.pitfal_radius = 45;
 game.pitfal_reloadTime = 10;
 */

game.settings = {
    heroes: {
        pikeMan: [1, 1.1, 118], //reloadTime Damage Radius
        archer: [1, 0.7, 118],
        knight: [1, 1.7, 118],
        catapult: [11, 8, 120],
        pitfall: [5, 1.5, 45],
    },
    
    prices: {
        pikeMan: 100, //reloadTime Damage Radius
        archer: 150,
        knight: 250,
    },
    
    upgradePrices:{
        pikeMan: [500, 500, 500, 500, 500, 500, 500, 500, 500, 500, 500], //reloadTime Damage Radius
        archer: [600, 600, 600, 600, 600, 600, 600, 600, 600, 600, 600],
        knight: [750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750],
        catapult: [900, 900, 900, 900, 900, 900, 900, 900, 900, 900, 900],
        pitfall: [900, 900, 900, 900, 900, 900, 900, 900, 900, 900, 900],
    },
    
    coin: {
            price: 20,
            timer: 10
        }
};


function getSavedData() {

    game.localString = "towerDefense_1.5.5"

    game.stats = [];

    game.stats.firstStart = parseInt(localStorage.getItem(game.localString + "firstStart"));

    game.stats.gameMoney = parseInt(localStorage.getItem(game.localString + "money"));
    game.stats.levelsOpen = parseInt(localStorage.getItem(game.localString + "levelsOpen"));

    //PikeMan Data
    game.stats.pikeMan_damage = parseFloat(localStorage.getItem(game.localString + "pikeMan_damage"));
    game.stats.pikeMan_radius = parseFloat(localStorage.getItem(game.localString + "pikeMan_radius"));
    game.stats.pikeMan_speed = parseFloat(localStorage.getItem(game.localString + "pikeMan_speed"));

    //Archer Data
    game.stats.archer_damage = parseFloat(localStorage.getItem(game.localString + "archer_damage"));
    game.stats.archer_radius = parseFloat(localStorage.getItem(game.localString + "archer_radius"));
    game.stats.archer_speed = parseFloat(localStorage.getItem(game.localString + "archer_speed"));

    //Knight Data
    game.stats.knight_damage = parseFloat(localStorage.getItem(game.localString + "knight_damage"));
    game.stats.knight_radius = parseFloat(localStorage.getItem(game.localString + "knight_radius"));
    game.stats.knight_speed = parseFloat(localStorage.getItem(game.localString + "knight_speed"));

    //Catapult Data
    game.stats.catapult_damage = parseFloat(localStorage.getItem(game.localString + "catapult_damage"));
    game.stats.catapult_radius = parseFloat(localStorage.getItem(game.localString + "catapult_radius"));
    game.stats.catapult_reloadTime = parseFloat(localStorage.getItem(game.localString + "catapult_speed"));

    //PitFal Data
    game.stats.pitfal_damage = parseFloat(localStorage.getItem(game.localString + "pitfal_damage"));
    game.stats.pitfal_radius = parseFloat(localStorage.getItem(game.localString + "pitfal_radius"));
    game.stats.pitfal_reloadTime = parseFloat(localStorage.getItem(game.localString + "pitfal_speed"));

    if (isNaN(game.stats.firstStart)) {

        localStorage.setItem(game.localString + "firstStart", 1);

        game.stats.pikeMan_radius = game.pikeMan_radius;
        game.stats.pikeMan_damage = game.pikeMan_damage;
        game.stats.pikeMan_speed = game.pikeMan_speed;

        game.stats.archer_damage = game.archer_damage;
        game.stats.archer_radius = game.archer_radius;
        game.stats.archer_speed = game.archer_speed;

        //Knight Data
        game.stats.knight_damage = game.knight_damage;
        game.stats.knight_radius = game.knight_radius
        game.stats.knight_speed = game.knight_speed

        game.stats.catapult_damage = game.catapult_damage;
        game.stats.catapult_radius = game.catapult_radius;
        game.stats.catapult_reloadTime = game.catapult_reloadTime;

        game.stats.pitfal_damage = game.pitfal_damage;
        game.stats.pitfal_radius = game.pitfal_radius;
        game.stats.pitfal_reloadTime = game.pitfal_reloadTime;

        saveData();
    }
}

function loadGameData() {

    game.currentVersion = "towerDefense_1.8.5"

    var value = localStorage.getItem(game.currentVersion);

    if (value) {
        game.gameData = JSON.parse(value);
    } else {
        clearGameData();
    }
}

function saveGameData() {
    localStorage.setItem(game.currentVersion, JSON.stringify(game.gameData));
}


function clearGameData() {

  

    game.gameData = {
        upgrade: {
            pikeMan: [1, 1, 1],
            archer: [1, 1, 1],
            knight: [1, 1, 1],
            catapult: [1, 1, 1],
            pitfall: [1, 1, 1]
        },
        currentLevel: 1,
        openLevels: 1,
        maxLevels: 9,
        money: 0,
        scores: 0,
        kills: 0,
    };
}


function saveData() {

    game.stats.gameMoney = localStorage.setItem(game.localString + "money", game.stats.gameMoney);

    //PikeMan Data


    localStorage.setItem(game.localString + "pikeMan_damage", game.stats.pikeMan_damage);
    localStorage.setItem(game.localString + "pikeMan_radius", game.stats.pikeMan_radius);
    localStorage.setItem(game.localString + "pikeMan_speed", game.stats.pikeMan_speed);

    //Archer Data
    localStorage.setItem(game.localString + "archer_damage", game.stats.archer_damage);
    localStorage.setItem(game.localString + "archer_radius", game.stats.archer_radius);
    localStorage.setItem(game.localString + "archer_speed", game.stats.archer_speed);

    //Knight Data
    localStorage.setItem(game.localString + "knight_damage", game.stats.knight_damage);
    localStorage.setItem(game.localString + "knight_radius", game.stats.knight_radius);
    localStorage.setItem(game.localString + "knight_speed", game.stats.knight_speed);

    //Catapult Data
    localStorage.setItem(game.localString + "catapult_damage", game.stats.catapult_damage);
    localStorage.setItem(game.localString + "catapult_radius", game.stats.catapult_radius);
    localStorage.setItem(game.localString + "catapult_speed", game.stats.catapult_reloadTime);

    //PitFal Data
    localStorage.setItem(game.localString + "pitfal_damage", game.stats.pitfal_damage);
    localStorage.setItem(game.localString + "pitfal_radius", game.stats.pitfal_radius);
    localStorage.setItem(game.localString + "pitfal_speed", game.stats.pitfal_reloadTime);
}

function getBestScore() {

    var value

    switch (game.mode) {
        case "time":
            value = parseInt(localStorage.getItem("architectSam_bestScore_time"));
            break;
        case "moves":
            value = parseInt(localStorage.getItem("architectSam_bestScore_moves"));
            break;
        case "free":
            value = parseInt(localStorage.getItem("architectSam_bestScore_free"));
            break;
    }

    if (isNaN(value)) {
        value = 0;
    }
    return value;
}

function setBestScore(score) {

    switch (game.mode) {
        case "time":
            localStorage.setItem("architectSam_bestScore_time", score);
            break;
        case "moves":
            localStorage.setItem("architectSam_bestScore_moves", score);
            break;
        case "free":
            localStorage.setItem("architectSam_bestScore_free", score);
            break;
    }

}


