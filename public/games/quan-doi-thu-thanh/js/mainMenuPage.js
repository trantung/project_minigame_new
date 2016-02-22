var _0x2625 = ["view", "Container", "createView", "prototype", "title", "mainMenuPage", "sky", "getResult", "addChild", "createClouds", "mainMenu_bg", "x", "y", "animationend", "addEventListener", "play", "to", "click", "openSelectLevelPage", "gamelogo", "scaleX", "scaleY", "image", "height", "width", "more games= ", "log", "googlePlay_btn", "https://play.google.com/store/apps/details?id=com.game.crusaderDefence", "_blank", "open", "focus", "currentTarget", "stop", "delayedCall", "removeChild", "selectLevelPage", "pages", "PagesManager", "openPage", "clouds", "easeNone"];
MainMenuPage = function() {
    this[_0x2625[0]] = new createjs[_0x2625[1]];
    this[_0x2625[2]]();
};
MainMenuPage[_0x2625[3]][_0x2625[2]] = function() {
    this[_0x2625[4]] = _0x2625[5];
    var _0x7017x1 = new createjs.Bitmap(preload[_0x2625[7]](_0x2625[6]));
    this[_0x2625[0]][_0x2625[8]](_0x7017x1);
    this[_0x2625[9]]();
    var _0x7017x2 = new createjs.Bitmap(preload[_0x2625[7]](_0x2625[10]));
    this[_0x2625[0]][_0x2625[8]](_0x7017x2);
    var _0x7017x3 = new createjs.Sprite(playBtn_spriteSheet);
    this[_0x2625[0]][_0x2625[8]](_0x7017x3);
    _0x7017x3[_0x2625[11]] = (960 - 227) / 2;
    _0x7017x3[_0x2625[12]] = 720;
    _0x7017x3[_0x2625[14]](_0x2625[13], playBtnStartAnimation);
    TweenMax[_0x2625[16]](_0x7017x3, 0.3, {
        y: 460,
        delay: 0.5,
        onComplete: function() {
            _0x7017x3[_0x2625[15]]()
        }
    });
    _0x7017x3[_0x2625[14]](_0x2625[17], this[_0x2625[18]]);
    var _0x7017x4 = new createjs.Bitmap(preload[_0x2625[7]](_0x2625[19]));
    alignToCenter(_0x7017x4);
    _0x7017x4[_0x2625[11]] = 960 / 2;
    _0x7017x4[_0x2625[12]] = 230;
    _0x7017x4[_0x2625[20]] = _0x7017x4[_0x2625[21]] = 1.2;
    this[_0x2625[0]][_0x2625[8]](_0x7017x4);
    TweenMax[_0x2625[16]](_0x7017x4, 0.5, {
        scaleX: 0.97,
        scaleY: 0.97
    });
    if (logoData[_0x2625[22]]) {
        this[_0x2625[0]][_0x2625[8]](logo_spil);
        logo_spil[_0x2625[11]] = 0;
        logo_spil[_0x2625[12]] = 640 - logo_image[_0x2625[22]][_0x2625[23]] - 10;
        this[_0x2625[0]][_0x2625[8]](moreGames_btn);
        moreGames_btn[_0x2625[11]] = 960 - moreGames_btn[_0x2625[22]][_0x2625[24]] / 2 * 1.2;
        moreGames_btn[_0x2625[12]] = 640 - moreGames_btn[_0x2625[22]][_0x2625[23]] / 2 - moreGames_btn[_0x2625[22]][_0x2625[24]] / 2 * 0.2;
    };
    console[_0x2625[26]](_0x2625[25] + moreGames_btn[_0x2625[20]]);
    
    // Logo googlePlay
    /*var _0x7017x5 = new createjs.Bitmap(preload[_0x2625[7]](_0x2625[27]));
    alignToCenter(_0x7017x5);
    _0x7017x5[_0x2625[11]] = 960 - _0x7017x5[_0x2625[22]][_0x2625[24]] / 2 * 1.2;
    _0x7017x5[_0x2625[12]] = 640 - moreGames_btn[_0x2625[22]][_0x2625[23]] / 2 - moreGames_btn[_0x2625[22]][_0x2625[24]] / 2 * 0.2 - _0x7017x5[_0x2625[22]][_0x2625[23]] * 1.2;
    this[_0x2625[0]][_0x2625[8]](_0x7017x5);
    _0x7017x5[_0x2625[14]](_0x2625[17], function() 
    {
        var _0x7017x6 = window[_0x2625[30]](_0x2625[28], _0x2625[29]);
        _0x7017x6[_0x2625[31]]();
    });*/
};

function playBtnStartAnimation(_0x7017x8) {
    if (_0x7017x8[_0x2625[32]]) {
        var _0x7017x9 = _0x7017x8[_0x2625[32]];
        _0x7017x9[_0x2625[33]]();
        TweenMax[_0x2625[34]](0.8, function() {
            _0x7017x9[_0x2625[15]]()
        });
    }
}
MainMenuPage[_0x2625[3]][_0x2625[18]] = function() {
    stage[_0x2625[35]](this);
    game[_0x2625[38]][_0x2625[39]](game[_0x2625[38]][_0x2625[37]][_0x2625[36]]);
};
MainMenuPage[_0x2625[3]][_0x2625[9]] = function() {
    var _0x7017xa = new createjs[_0x2625[1]];
    var _0x7017xb = new createjs.Bitmap(preload[_0x2625[7]](_0x2625[40]));
    _0x7017xa[_0x2625[8]](_0x7017xb);
    this[_0x2625[0]][_0x2625[8]](_0x7017xa);
    animateClouds(_0x7017xb);
};

function animateClouds(_0x7017xd) {
    TweenMax[_0x2625[16]](_0x7017xd, 25, {
        x: 960 - _0x7017xd[_0x2625[22]][_0x2625[24]],
        onComplete: function() {
            _0x7017xd[_0x2625[11]] = 0;
            animateClouds(_0x7017xd);
        },
        ease: Linear[_0x2625[41]]
    })
}