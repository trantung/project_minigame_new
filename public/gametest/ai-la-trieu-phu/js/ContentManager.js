function ContentManager() {
    var ondownloadcompleted;
    var NUM_ELEMENTS_TO_DOWNLOAD = 69;

    this.setDownloadCompleted = function(callbackMethod) {
        ondownloadcompleted = callbackMethod;
    };

    this.imageBackground1 = new Image();
    this.imageBackground2 = new Image();
    this.imageQuestion = new Image();
    this.imageAnswer = new Image();
    this.imageHelp = new Image();
    this.imageStart = new Image();
    this.imageAnswerHover = new Image();
    this.imageChoosenAnswer = new Image();
    this.imageCorrectAnswer = new Image();
    this.imageHelp = new Array(4);
    this.imageHelpHover = new Image();
    this.imageGameOver = new Image();
    this.help_1 = new Image();
    this.imageSec = new Image();
    this.imageWinner = new Image();
    this.helpPerson = new Array(6);
    this.helpPersonHover = new Image();
    this.timeCountdownHover = new Image();
    this.helpDisable = new Image();
    this.imageSoundOn = new Image();
    this.imageSoundOff = new Image();
    this.crossLine = new Image();
    this.whereAreYou = new Array(15);
    this.whereAreYou2 = new Array(15);
    this.whereAreYouHover = new Image();
    this.continuedButton = new Image();
    this.phuongAnA = new Image();
    this.phuongAnB = new Image();
    this.phuongAnC = new Image();
    this.phuongAnD = new Image();
    this.getOver_Button = new Image();
    this.imageTick = new Image();
    this.imageX = new Image();
    this.imageSaveScore = new Image();

    var numImagesLoaded = 0;

    this.StartDownload = function() {
        SetDownloadParameters(this.help_1, "img/help_1.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageSec, "img/imageSec.jpg", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageGameOver, "img/GameOver.png", handleImageLoad, handleImageError);
        //SetDownloadParameters(this.imageBackground1,"img/background1_bk.png",handleImageLoad,handleImageError);
        SetDownloadParameters(this.imageBackground1, "img/background1.jpg", handleImageLoad, handleImageError);
        //SetDownloadParameters(this.imageBackground2,"img/background2_bk.png",handleImageLoad,handleImageError);
        SetDownloadParameters(this.imageBackground2, "img/backqround2.jpg", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageQuestion, "img/Question.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageStart, "img/buttonStart.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageAnswer, "img/buttonAnswer.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageAnswerHover, "img/buttonAnswerHover.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageHelpHover, "img/helpButtonHover.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageWinner, "img/imageWinner.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.helpPersonHover, "img/helpPersonHover.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.timeCountdownHover, "img/imageTimeCountdownHover.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.helpDisable, "img/helpDisable.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageSoundOn, "img/soundOn.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageSoundOff, "img/soundOff.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageChoosenAnswer, "img/imageChoosenAnswer.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageCorrectAnswer, "img/imageCorrectAnswer.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.crossLine, "img/crossLine.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.whereAreYouHover, "img/whereAreYouHover.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.continuedButton, "img/continuedButton.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.phuongAnA, "img/a.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.phuongAnB, "img/b.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.phuongAnC, "img/c.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.phuongAnD, "img/d.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageTick, "img/tick.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageX, "img/x.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.getOver_Button, "img/getOver_Button.png", handleImageLoad, handleImageError);
        SetDownloadParameters(this.imageSaveScore, "img/savescore.png", handleImageLoad, handleImageError);

        for (var i = 0; i < 4; i++) {
            this.imageHelp[i] = new Image();
            SetDownloadParameters(this.imageHelp[i], "img/helpButton" + (i + 1) + ".png", handleImageLoad, handleImageError);
        }

        for (var i = 0; i < 6; i++) {
            this.helpPerson[i] = new Image();
            SetDownloadParameters(this.helpPerson[i], "img/helpPerson" + (i + 1) + ".png", handleImageLoad, handleImageError);
        }

        for (var i = 0; i < 15; i++) {
            this.whereAreYou[i] = new Image();
            SetDownloadParameters(this.whereAreYou[i], "img/" + (i + 1) + ".png", handleImageLoad, handleImageError);
            this.whereAreYou2[i] = new Image();
            SetDownloadParameters(this.whereAreYou2[i], "img/" + (i + 1) + "x.png", handleImageLoad, handleImageError);
        }
    }

    function SetDownloadParameters(imgElement, url, loadedHandler, errorHandler) {
        imgElement.src = url;
        imgElement.onload = loadedHandler;
        imgElement.onerror = errorHandler;
    }

    function handleImageLoad(e) {
        numImagesLoaded++;
        preloadText.text = "Loadding... " + Math.round((1 + numImagesLoaded) * 100 / 126) + "%";
        stage.update();
        if (numImagesLoaded == NUM_ELEMENTS_TO_DOWNLOAD) {
            numImagesLoaded = 0;
            ondownloadcompleted();
        }
    }

    function handleImageError(e) {
        console.log("Error Loading Image : " + e.target.src);
        alert("Có lỗi trong việc tải ảnh" + e.target.src);
    }
}