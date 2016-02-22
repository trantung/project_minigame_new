
PagesManager = function() {

    this.pages = new Object();
    this.pages.gamePage = "gamePage"; //QR code from link
    this.pages.gameOver = "gameOver"; //QR code from text
    this.pages.mainMenu = "mainMenu"; //QR code from phone number
    this.pages.selectLevelPage = "selectLevelPage"; //QR code from phone number
    this.pages.upgradesPage = "upgradesPage"; //QR code from phone number
    this.currentPage;

}


PagesManager.prototype.openPage = function(pageName, mcForRemove) {

var prevPageTitle;

    if (this.currentPage)
    {
        if (stage.contains(this.currentPage.view))
        {
            prevPageTitle = this.currentPage.title;
            stage.removeChild(this.currentPage.view)
        }
    }



    switch (pageName)
    {
        case this.pages.gamePage:
            this.currentPage = new GamePage();
            break
            
        case this.pages.mainMenu:
            this.currentPage = new MainMenuPage();
            break
            
        case this.pages.selectLevelPage:
            this.currentPage = new SelectLevelPage(prevPageTitle);
            break
            
        case this.pages.upgradesPage:
            this.currentPage = new SelectLevelPage();
            break

        case this.pages.upgradesPage:
            this.currentPage = new RulesPage();
            break

    }

    stage.addChild(this.currentPage.view)

}
