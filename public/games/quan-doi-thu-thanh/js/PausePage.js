PausePage = function() {
    this.view = new createjs.Container;
    pauseGame();
    this.createView();
}



PausePage.prototype.createView = function() {

    var bg = new createjs.Shape(new createjs.Graphics().beginFill("#000000").drawRect(0, 0, 960, 640));
    bg.alpha = 0.1
    this.view.addChild(bg);
    bg.addEventListener("click", function() {
    });


    var windowContainer = new createjs.Container;
    var window = new createjs.Bitmap(preload.getResult('pausePage_bg'));
    window.regX = window.image.width / 2;
    window.regY = window.image.height / 2;
    windowContainer.addChild(window)

    windowContainer.y = 960;
    windowContainer.x = 960 / 2;
    this.view.addChild(windowContainer);

    var restart_btn = new createjs.Container();
    restart_btn.root = this;
    restart_btn.name = "restart";
    restart_btn.press = new createjs.Bitmap(preload.getResult('btn_replay_press'));
    restart_btn.normal = new createjs.Bitmap(preload.getResult('btn_replay_normal'));
    restart_btn.addChild(restart_btn.normal);
    restart_btn.addChild(restart_btn.press);
    restart_btn.press.visible = false;
    restart_btn.x = 85;
    restart_btn.y = 0;
    windowContainer.addChild(restart_btn);

    restart_btn.addEventListener("mousedown", this.BtnPress);


    var mainMenu_btn = new createjs.Container();
    mainMenu_btn.root = this;
    mainMenu_btn.name = "mainMenu";
    mainMenu_btn.press = new createjs.Bitmap(preload.getResult('btn_menu_press'));
    mainMenu_btn.normal = new createjs.Bitmap(preload.getResult('btn_menu_normal'));
    mainMenu_btn.addChild(mainMenu_btn.normal);
    mainMenu_btn.addChild(mainMenu_btn.press);
    mainMenu_btn.press.visible = false;
    mainMenu_btn.x = -196;
    mainMenu_btn.y = 0;
    windowContainer.addChild(mainMenu_btn);
    mainMenu_btn.addEventListener("mousedown", this.BtnPress);


    var resume_btn = new createjs.Container();
    resume_btn.root = this;
    resume_btn.name = "resume";
    resume_btn.press = new createjs.Bitmap(preload.getResult('btn_play_press'));
    resume_btn.normal = new createjs.Bitmap(preload.getResult('btn_play_normal'));
    resume_btn.addChild(resume_btn.normal);
    resume_btn.addChild(resume_btn.press);
    resume_btn.press.visible = false;
    resume_btn.x = -67;
    resume_btn.y = -12;
    resume_btn.addEventListener("mousedown", this.BtnPress);
    windowContainer.addChild(resume_btn);



    TweenLite.to(bg, 0.2, {alpha: 0.4})
    TweenLite.to(windowContainer, 0.35, {y: 320, delay: 0.2})

    // this.view.addEventListener("click", pausePage_resumeGame)
    // stage.addChild(pausePage);
}

function pausePage_resumeGame() {


}


PausePage.prototype.BtnPress = function(e) {

    var btn = e.currentTarget;
    btn.normal.visible = false;
    btn.press.visible = true;
    btn.addEventListener("pressup", btn.root.upBtnUp);
}


PausePage.prototype.upBtnUp = function(e) {
    var btn = e.currentTarget;
    btn.normal.visible = true;
    btn.press.visible = false;


    switch (btn.name) {

        case "resume":
       //     console.log("name= " + btn.name);
            stage.removeChild(game.pausePage.view);
            resumePage();
            break;

        case "restart":
            createjs.Ticker.setFPS(30);
            game.PagesManager.openPage(game.PagesManager.pages.gamePage)
            break;

        case "mainMenu":
            createjs.Ticker.setFPS(30);
            stage.removeChild(game.pausePage);
            var mainMenu = new MainMenuPage();
            stage.addChild(mainMenu.view);
            break;
    }

}
