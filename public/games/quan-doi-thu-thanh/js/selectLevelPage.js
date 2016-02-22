var _0x6d76 = ["prevPageTitle", "initDone", "view", "createView", "selectLevelPage", "complete", "removeEventListener", "HeroWeaponsLoaded", "removeChild", "prototype", "selectLevelPage_bg", "getResult", "addChild", "createRoad", "Container", "press", "upgrades_units_press", "normal", "upgrades_units_normal", "notification", "upgradeNotification", "visible", "regX", "width", "image", "regY", "height", "x", "y", "scaleX", "scaleY", "mousedown", "currentTarget", "addEventListener", "pressup", "loadManifest", "upgrades_weapons_press", "upgrades_weapons_normal", "openLevels", "gameData", "mainMenuPage", "back_press", "back_normal", "click", "mainMenu", "pages", "PagesManager", "openPage", "currentLevel", "openLevelNum", "level", "selectLevelArray", "currentLevel_img", "gotoAndStop", "centerX", "centerY", "id", "root", "openLevel", "push", "alreadyLoadedLevels", "gamePage", "indexOf"];
SelectLevelPage = function(_0x4359x1) {
    this[_0x6d76[0]] = _0x4359x1;
    this[_0x6d76[1]] = false;
    this[_0x6d76[2]] = new createjs.Container();
    this[_0x6d76[3]](_0x4359x1);
    game[_0x6d76[4]] = this;
};

function updateHeroLoaded() 
{
    preload[_0x6d76[6]](_0x6d76[5], updateHeroLoaded);
    game[_0x6d76[7]] = true;
    if (preloader2Page) {
        stage[_0x6d76[8]](preloader2Page)
    };
    addUpdateHeroPage();

}

function updateWeaponLoaded() {
    game[_0x6d76[7]] = true;
    preload[_0x6d76[6]](_0x6d76[5], updateWeaponLoaded);
    if (preloader2Page) {
        stage[_0x6d76[8]](preloader2Page)
    };

    addUpdateWeaponPage();
}
SelectLevelPage[_0x6d76[9]][_0x6d76[3]] = function() {
    var _0x4359x4 = new createjs.Bitmap(preload[_0x6d76[11]](_0x6d76[10]));
    this[_0x6d76[2]][_0x6d76[12]](_0x4359x4);
    this[_0x6d76[13]]();
    var _0x4359x5 = new createjs[_0x6d76[14]];
    _0x4359x5[_0x6d76[15]] = new createjs.Bitmap(preload[_0x6d76[11]](_0x6d76[16]));
    _0x4359x5[_0x6d76[17]] = new createjs.Bitmap(preload[_0x6d76[11]](_0x6d76[18]));
    _0x4359x5[_0x6d76[19]] = new createjs.Bitmap(preload[_0x6d76[11]](_0x6d76[20]));
    _0x4359x5[_0x6d76[12]](_0x4359x5[_0x6d76[17]]);
    _0x4359x5[_0x6d76[12]](_0x4359x5[_0x6d76[15]]);
    _0x4359x5[_0x6d76[12]](_0x4359x5[_0x6d76[19]]);
    _0x4359x5[_0x6d76[15]][_0x6d76[21]] = false;
    _0x4359x5[_0x6d76[19]][_0x6d76[22]] = _0x4359x5[_0x6d76[19]][_0x6d76[24]][_0x6d76[23]] / 2;
    _0x4359x5[_0x6d76[19]][_0x6d76[25]] = _0x4359x5[_0x6d76[19]][_0x6d76[24]][_0x6d76[26]] * 1.05;
    _0x4359x5[_0x6d76[19]][_0x6d76[27]] = _0x4359x5[_0x6d76[17]][_0x6d76[24]][_0x6d76[23]];
    _0x4359x5[_0x6d76[19]][_0x6d76[28]] = _0x4359x5[_0x6d76[17]][_0x6d76[24]][_0x6d76[26]];
    this[_0x6d76[2]][_0x6d76[12]](_0x4359x5);
    _0x4359x5[_0x6d76[27]] = 10;
    _0x4359x5[_0x6d76[28]] = 475;
    _0x4359x5[_0x6d76[29]] = _0x4359x5[_0x6d76[30]] = 1.2;
    _0x4359x5[_0x6d76[33]](_0x6d76[31], function(_0x4359x6) {
        var _0x4359x7 = _0x4359x6[_0x6d76[32]];
        _0x4359x7[_0x6d76[17]][_0x6d76[21]] = false;
        _0x4359x7[_0x6d76[15]][_0x6d76[21]] = true;
    });
    _0x4359x5[_0x6d76[33]](_0x6d76[34], function(_0x4359x6) {
        var _0x4359x7 = _0x4359x6[_0x6d76[32]];
        _0x4359x7[_0x6d76[17]][_0x6d76[21]] = true;
        _0x4359x7[_0x6d76[15]][_0x6d76[21]] = false;
        if (game[_0x6d76[7]] == false) {
            addPreloader2Page();
            preload[_0x6d76[33]](_0x6d76[5], updateHeroLoaded);
            preload[_0x6d76[35]](manifest_updateWeapon);
        } else {
            addUpdateHeroPage()
        };
    });
    var _0x4359x8 = new createjs[_0x6d76[14]];
    _0x4359x8[_0x6d76[15]] = new createjs.Bitmap(preload[_0x6d76[11]](_0x6d76[36]));
    _0x4359x8[_0x6d76[17]] = new createjs.Bitmap(preload[_0x6d76[11]](_0x6d76[37]));
    _0x4359x8[_0x6d76[19]] = new createjs.Bitmap(preload[_0x6d76[11]](_0x6d76[20]));
    _0x4359x8[_0x6d76[12]](_0x4359x8[_0x6d76[17]]);
    _0x4359x8[_0x6d76[12]](_0x4359x8[_0x6d76[15]]);
    _0x4359x8[_0x6d76[12]](_0x4359x8[_0x6d76[19]]);
    _0x4359x8[_0x6d76[19]][_0x6d76[22]] = _0x4359x8[_0x6d76[19]][_0x6d76[24]][_0x6d76[23]] / 2;
    _0x4359x8[_0x6d76[19]][_0x6d76[25]] = _0x4359x8[_0x6d76[19]][_0x6d76[24]][_0x6d76[26]] * 1.05;
    _0x4359x8[_0x6d76[19]][_0x6d76[27]] = _0x4359x8[_0x6d76[17]][_0x6d76[24]][_0x6d76[23]];
    _0x4359x8[_0x6d76[19]][_0x6d76[28]] = _0x4359x8[_0x6d76[17]][_0x6d76[24]][_0x6d76[26]];
    _0x4359x8[_0x6d76[15]][_0x6d76[21]] = false;
    _0x4359x8[_0x6d76[29]] = _0x4359x8[_0x6d76[30]] = 1.2;
    this[_0x6d76[2]][_0x6d76[12]](_0x4359x8);
    _0x4359x8[_0x6d76[27]] = 10;
    _0x4359x8[_0x6d76[28]] = 315;
    _0x4359x8[_0x6d76[33]](_0x6d76[31], function(_0x4359x6) {
        var _0x4359x7 = _0x4359x6[_0x6d76[32]];
        _0x4359x7[_0x6d76[17]][_0x6d76[21]] = false;
        _0x4359x7[_0x6d76[15]][_0x6d76[21]] = true;
    });
    _0x4359x8[_0x6d76[33]](_0x6d76[34], function(_0x4359x6) {
        var _0x4359x7 = _0x4359x6[_0x6d76[32]];
        _0x4359x7[_0x6d76[17]][_0x6d76[21]] = true;
        _0x4359x7[_0x6d76[15]][_0x6d76[21]] = false;
        //addPreloader2Page();
        if (game[_0x6d76[7]] == false) {
           addPreloader2Page();
            preload[_0x6d76[33]](_0x6d76[5], updateWeaponLoaded);
            preload[_0x6d76[35]](manifest_updateWeapon);
        } else {
            addUpdateWeaponPage()
        };
    });
    if (game[_0x6d76[39]][_0x6d76[38]] >= 4) {
        _0x4359x8[_0x6d76[21]] = true
    } else {
        _0x4359x8[_0x6d76[21]] = false
    };
    if (this[_0x6d76[0]] == _0x6d76[40]) {
        var _0x4359x9 = new createjs[_0x6d76[14]];
        _0x4359x9[_0x6d76[15]] = new createjs.Bitmap(preload[_0x6d76[11]](_0x6d76[41]));
        _0x4359x9[_0x6d76[17]] = new createjs.Bitmap(preload[_0x6d76[11]](_0x6d76[42]));
        _0x4359x9[_0x6d76[12]](_0x4359x9[_0x6d76[17]]);
        _0x4359x9[_0x6d76[12]](_0x4359x9[_0x6d76[15]]);
        _0x4359x9[_0x6d76[15]][_0x6d76[21]] = false;
        this[_0x6d76[2]][_0x6d76[12]](_0x4359x9);
        _0x4359x9[_0x6d76[29]] = _0x4359x9[_0x6d76[30]] = 0.8;
        _0x4359x9[_0x6d76[27]] = 45;
        _0x4359x9[_0x6d76[28]] = 0;
        _0x4359x9[_0x6d76[33]](_0x6d76[43], function() {
            game[_0x6d76[46]][_0x6d76[47]](game[_0x6d76[46]][_0x6d76[45]][_0x6d76[44]])
        });
    };
    if (game[_0x6d76[39]][_0x6d76[38]] == 4 && game[_0x6d76[48]] == 3) {
        var _0x4359xa = new showImproveWeaponsPopUp();
        this[_0x6d76[2]][_0x6d76[12]](_0x4359xa[_0x6d76[2]]);
    };
};
SelectLevelPage[_0x6d76[9]][_0x6d76[13]] = function(_0x4359xb) {
    var _0x4359xc = new createjs.Container();
    this[_0x6d76[2]][_0x6d76[12]](_0x4359xc);
    game[_0x6d76[48]] = 3;
    game[_0x6d76[49]] = game[_0x6d76[39]][_0x6d76[38]];
    for (var _0x4359xd = 0; _0x4359xd < game[_0x6d76[49]]; _0x4359xd++) {
        var _0x4359xe = new createjs.Bitmap(preload[_0x6d76[11]](_0x6d76[50] + String(_0x4359xd + 1)));
        var _0x4359xf = game[_0x6d76[51]][_0x4359xd];
        _0x4359xe[_0x6d76[27]] = _0x4359xf[_0x6d76[27]];
        _0x4359xe[_0x6d76[28]] = _0x4359xf[_0x6d76[28]];
        _0x4359xc[_0x6d76[12]](_0x4359xe);
        var _0x4359x10;
        if (_0x4359xd == game[_0x6d76[49]] - 1) {
            _0x4359x10 = new createjs.Bitmap(preload[_0x6d76[11]](_0x6d76[52]));
            _0x4359x10[_0x6d76[22]] = 48.8;
            _0x4359x10[_0x6d76[25]] = 100.45;
        } else {
            _0x4359x10 = new createjs.Sprite(flagForLevels_spriteSheet_2);
            _0x4359x10[_0x6d76[22]] = 42.25;
            _0x4359x10[_0x6d76[25]] = 90;
            _0x4359x10[_0x6d76[53]](0);
        };
        _0x4359x10[_0x6d76[27]] = _0x4359xf[_0x6d76[54]];
        _0x4359x10[_0x6d76[28]] = _0x4359xf[_0x6d76[55]];
        _0x4359x10[_0x6d76[56]] = _0x4359xd + 1;
        this[_0x6d76[2]][_0x6d76[12]](_0x4359x10);
        _0x4359x10[_0x6d76[57]] = this;
        _0x4359x10[_0x6d76[33]](_0x6d76[43], function(_0x4359x6) {
            _0x4359x6[_0x6d76[32]][_0x6d76[57]][_0x6d76[58]](_0x4359x6[_0x6d76[32]])
        });
    };

    function _0x4359x11() {
        preload[_0x6d76[6]](_0x6d76[5], _0x4359x11);
        game[_0x6d76[60]][_0x6d76[59]](game[_0x6d76[48]]);
        if (preloader2Page) {
            stage[_0x6d76[8]](preloader2Page)
        };
        stage[_0x6d76[8]](this);
        game[_0x6d76[46]][_0x6d76[47]](game[_0x6d76[46]][_0x6d76[45]][_0x6d76[61]]);
    }
    SelectLevelPage[_0x6d76[9]][_0x6d76[58]] = function(_0x4359xb) {
        game[_0x6d76[48]] = _0x4359xb[_0x6d76[56]];
        if (game[_0x6d76[60]][_0x6d76[62]](game[_0x6d76[48]]) != -1) {
            _0x4359x11();
            return;
        };
        addPreloader2Page();
        preload[_0x6d76[33]](_0x6d76[5], _0x4359x11);
        switch (_0x4359xb[_0x6d76[56]]) {
            case 1:
                preload[_0x6d76[35]](manifest_level_1);
                break;;
            case 2:
                preload[_0x6d76[35]](manifest_level_2);
                break;;
            case 3:
                preload[_0x6d76[35]](manifest_level_3);
                break;;
            case 4:
                preload[_0x6d76[35]](manifest_level_4);
                break;;
            case 5:
                preload[_0x6d76[35]](manifest_level_5);
                break;;
            case 6:
                preload[_0x6d76[35]](manifest_level_6);
                break;;
            case 7:
                preload[_0x6d76[35]](manifest_level_7);
                break;;
            case 8:
                preload[_0x6d76[35]](manifest_level_8);
                break;;
            case 9:
                preload[_0x6d76[35]](manifest_level_9);
                break;;
        };
    };
};