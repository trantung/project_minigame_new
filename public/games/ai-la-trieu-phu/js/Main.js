var canvas;
var stage;
var contentManager;
var backGround1;
var backGround2;
var startButton;
var textQuestion;
var textAnswer = new Array(4);
var imageQuestion;
var imageAnswer = new Array(4);
var imageAnswerHover;
var score;
var level;
var checkMouseHover = true;
var gameContent;
var helpContent;
var endGameNow;
var imageWinner;
var quanns = new Array(6);
quanns[0] = 1;
var loaded = false;
var phuongAn = new Array(4);
var imageTimeCountdownHover;
var imageSoundOn;
var imageSoundOff;
var timeText;
var time;
var isPlaying = false;
var interval;
var newGame;
var manifest;
var audioPath;
var preloadText;
var preloadBackground;
var isSoundOn = true;
var playingSound;
var imageCrossLine = new Array(3);
var imageChoosenAnswer;
var imageCorrectAnswer;
var backgroundSound;
var backgroundSoundOn = true;
var continuedButton;
var gold = 0;
var getOver_Button;
var request = false;
var gameOver_Container;
var annoucement;
var otherQuestion = '';
var can_GetOver;

function init() {
    if (login) layDiem(gameid);
    createjs.Sound.setVolume(0.5);
    loadQuestion(1, quanns);
    loadOtherQuestion(1);
    /*$.ajax({
        type: "POST",
        url: "/api-service/gold.php",
        data: {
            type: 0
        },
        success: function (msg) {
            msg = parseInt(msg);
            console.log(msg);
            if (msg > 0) gold = msg;
        }
    });*/
    score = 0;
    level = 1;
    preloadText = new createjs.Text('Loading...0%', '28pt Arial', '#FFF');
    preloadText.textAlign = "center";
    preloadText.textBaseLine = "bottom";
    preloadText.x = 400;
    preloadText.y = 420;
    preloadBackground = new createjs.Bitmap("img/preloadBackground.png");
    canvas = document.getElementById('game');
    stage = new createjs.Stage(canvas);
    stage.addChild(preloadBackground, preloadText);
    stage.update();
    stage.enableMouseOver();
    stage.mouseEventsEnable = true;
    createjs.Ticker.setFPS(60);
    createjs.Ticker.addListener(stage);
    contentManager = new ContentManager();
    contentManager.setDownloadCompleted(getSounds);
    contentManager.StartDownload();
}

function setupGame() {
    stage.removeAllChildren();
    endGameNow = new endGameNow();
    gameOver_Container = new gameOver_Container();
    imageChoosenAnswer = new createjs.Bitmap(contentManager.imageChoosenAnswer);
    imageCorrectAnswer = new createjs.Bitmap(contentManager.imageCorrectAnswer);
    backGround1 = new createjs.Bitmap(contentManager.imageBackground1);
    backGround2 = new createjs.Bitmap(contentManager.imageBackground2);
    startButton = new createjs.Bitmap(contentManager.imageStart);
    gameContent = new createjs.Container();
    helpContent = new HelpContainer(contentManager.imageHelp[0], contentManager.imageHelp[1], contentManager.imageHelp[2], contentManager.imageHelp[3], contentManager.imageHelpHover, contentManager.helpPerson[0], contentManager.helpPerson[1], contentManager.helpPerson[2], contentManager.helpPerson[3], contentManager.helpPerson[4], contentManager.helpPerson[5], contentManager.helpPersonHover, contentManager.helpDisable);
    imageWinner = new createjs.Bitmap(contentManager.imageWinner);
    timeText = new createjs.Text('', 'Bold 28px Arial', '#54E0E1');
    phuongAn[0] = new createjs.Bitmap(contentManager.phuongAnA);
    phuongAn[1] = new createjs.Bitmap(contentManager.phuongAnB);
    phuongAn[2] = new createjs.Bitmap(contentManager.phuongAnC);
    phuongAn[3] = new createjs.Bitmap(contentManager.phuongAnD);
    imageSoundOn = new createjs.Bitmap(contentManager.imageSoundOn);
    imageSoundOff = new createjs.Bitmap(contentManager.imageSoundOff);
    imageSoundOn.regX = imageSoundOn.image.width / 2;
    imageSoundOn.regY = imageSoundOn.image.height / 2;
    imageSoundOff.regX = imageSoundOn.image.width / 2;
    imageSoundOff.regY = imageSoundOn.image.height / 2;
    imageSoundOn.x = imageSoundOff.x = 34;
    imageSoundOn.y = imageSoundOff.y = 34;
    imageSoundOff.alpha = 0;
    imageSoundOn.addEventListener("click", changeSoundSituation);
    imageSoundOff.addEventListener("click", changeSoundSituation);
    imageSoundOn.addEventListener("mouseover", function (e) {
        e.target.scaleX = 1.05;
        e.target.scaleY = 1.05;
    });
    imageSoundOn.addEventListener("mouseout", function (e) {
        e.target.scaleX = 1;
        e.target.scaleY = 1;
    });
    imageSoundOff.addEventListener("mouseover", function (e) {
        e.target.scaleX = 1.05;
        e.target.scaleY = 1.05;
    });
    imageSoundOff.addEventListener("mouseout", function (e) {
        e.target.scaleX = 1;
        e.target.scaleY = 1;
    });
    backgroundSound = createjs.Sound.play("moc1");
    backgroundSound.setVolume(0);
    readyGame();
}

function readyGame() {
    soundStartGame();
    helpContent.y = -118;
    helpContent.configure();
    score = 0;
    level = 1;
    can_GetOver = true;
    startButton.alpha = 1;
    startButton.regX = 66;
    startButton.regY = 19;
    startButton.x = 400;
    startButton.y = 430;
    imageChoosenAnswer.alpha = 0;
    imageChoosenAnswer.regX = 160.5;
    imageChoosenAnswer.regY = 26;
    imageCorrectAnswer.alpha = 0;
    imageCorrectAnswer.regX = 160.5;
    imageCorrectAnswer.regY = 26;
    helpContent.alpha = 1;
    gameContent.alpha = 0;
    stage.addChild(backGround1, startButton, gameContent, helpContent, imageSoundOn, imageSoundOff);
    stage.update();
    startButton.addEventListener("mouseover", function (e) {
        e.target.scaleX = 1.05;
        e.target.scaleY = 1.05;
    });
    startButton.addEventListener("mouseout", function (e) {
        e.target.scaleX = 1;
        e.target.scaleY = 1;
    });
    annoucement = new createjs.Text("Đang load câu hỏi,bạn vui lòng chờ trong giây lát", "18pt Arial", "#FFF");
    annoucement.textAlign = "center";
    annoucement.x = 400;
    annoucement.y = 450;
    annoucement.alpha = 0;
    stage.addChild(annoucement);
    startButton.addEventListener("click", function () {
        startButton.removeAllEventListeners();
        startButton.scaleY = 1;
        startButton.scaleX = 1;
        if (loaded) startGame();
        else {
            request = true;
            console.log("Đang load câu hỏi, vui lòng chờ trong giây lát");
            createjs.Tween.get(annoucement).to({
                alpha: 1
            }, 100).wait(2000).call(function () {
                createjs.Tween.get(this).to({
                    alpha: 0
                }, 500);
            })
        }
    });
}

function startGame() {
    createjs.Sound.stop();
    soundStarted();
    createjs.Tween.get(startButton).to({
        alpha: 0
    }, 750).call(function () {
        inGame();
    });
}

function createImageBitmap() {
    imageAnswerHover = new createjs.Bitmap(contentManager.imageAnswerHover);
    imageAnswerHover.fixed = false;
    for (var i = 0; i < 4; i++) {
        imageAnswer[i] = new createjs.Bitmap(contentManager.imageAnswer);
        imageAnswer[i].value = i;
        imageAnswer[i].regX = 160.5;
        imageAnswer[i].regY = 26;
    }
    imageAnswer[0].x = imageAnswer[2].x = 200;
    imageAnswer[1].x = imageAnswer[3].x = 600;
    imageAnswer[0].y = imageAnswer[1].y = 386;
    imageAnswer[2].y = imageAnswer[3].y = 446;
    imageAnswerHover.regX = 160.5;
    imageAnswerHover.regY = 26;
    imageAnswerHover.x = -200;
    imageAnswerHover.alpha = 1;
    imageTimeCountdownHover = new createjs.Bitmap(contentManager.timeCountdownHover);
    imageTimeCountdownHover.regX = 50;
    imageTimeCountdownHover.regY = 50;
    imageTimeCountdownHover.x = 400;
    imageTimeCountdownHover.y = 415;
    timeText.regX = timeText.getMeasuredWidth() / 2;
    timeText.x = 400;
    timeText.y = 395;
    timeText.alpha = 1;
    phuongAn[0].x = phuongAn[2].x = 60;
    phuongAn[0].y = phuongAn[1].y = 372;
    phuongAn[2].y = phuongAn[3].y = 432;
    phuongAn[1].x = phuongAn[3].x = 460;
    imageCrossLine[0] = new createjs.Bitmap(contentManager.crossLine);
    imageCrossLine[0].y = 294;
    imageCrossLine[1] = new createjs.Bitmap(contentManager.crossLine);
    imageCrossLine[1].y = 384;
    imageCrossLine[2] = new createjs.Bitmap(contentManager.crossLine);
    imageCrossLine[2].y = 444;
    imageQuestion = new createjs.Bitmap(contentManager.imageQuestion);
    imageQuestion.regX = 307;
    imageQuestion.x = 400;
    imageQuestion.y = 250;
    gameContent.addChild(backGround2, imageCrossLine[0], imageCrossLine[1], imageCrossLine[2], imageQuestion);
    gameContent.addChild(imageAnswer[0], imageAnswer[1], imageAnswer[2], imageAnswer[3]);
    gameContent.addChild(imageAnswerHover, imageTimeCountdownHover, timeText, imageChoosenAnswer, imageCorrectAnswer);
    gameContent.addChild(phuongAn[0], phuongAn[1], phuongAn[2], phuongAn[3]);
}

function inGame() {
    backgroundSoundOn = true;
    playBackgroundSound();
    helpContent.refresh();
    isPlaying = true;
    time = 30;
    timeText.text = time;
    if (level == 5 || level == 10) 
    {
        endGameNow.initialize(quanns[5]);
        loadQuestion(level / 5 + 1, quanns);
        otherQuestion = '';
        loadOtherQuestion(Math.floor(level / 5 + 1));
    } else {
        if (level < 15) endGameNow.initialize(quanns[level % 5]);
        else {
            endGameNow.initialize(quanns[5]);
        }
    }
    endGameNow.alpha = 0;
    createImageBitmap();
    imageChoosenAnswer.alpha = 0;
    imageCorrectAnswer.alpha = 0;
    stage.addChild(endGameNow);
    stage.update();
    createjs.Tween.get(helpContent).wait(1250).to({
        y: 0
    }, 1000);
    createjs.Tween.get(gameContent).wait(1250).to({
        alpha: 1
    }, 1000).call(function () {
        if (level < 15) soundNewQuestion(level);
        else {
            window.setTimeout(function () {
                soundNewQuestion(level);
            }, 1300);
        }
        helpContent.enableButton();
    });
    if (level % 5 == 0 && level != 15) {
        window.setTimeout(function () {
            soundImportant();
        }, 8000);
    }
    createjs.Tween.get(endGameNow).wait(2250).to({
        alpha: 1
    }, 500).call(function () {
        endGameNow.playAnimations();
        for (var i = 0; i < 4; i++) {
            imageAnswer[i].addEventListener("click", getAnswer);
            imageAnswer[i].addEventListener("mouseover", chooseAnswer);
            imageAnswer[i].addEventListener("mouseout", removeAllDecoration);
        }
        timeCountdown();
    });
}

function timeCountdown() {
    interval = window.setInterval(function () {
        if (time >= 0) {
            if (isPlaying) {
                time--;
                imageTimeCountdownHover.alpha = 1;
                createjs.Tween.get(imageTimeCountdownHover).to({
                    alpha: 0
                }, 1000);
                if (time < 0) timeText.text = 0;
                else {
                    timeText.text = time;
                }
                timeText.regX = timeText.getMeasuredWidth() / 2;
                stage.update();
            }
        } else {
            backgroundSoundOn = false;
            imageCorrectAnswer.x = imageAnswer[endGameNow.correctAnswer.charCodeAt(0) - 65].x;
            imageCorrectAnswer.y = imageAnswer[endGameNow.correctAnswer.charCodeAt(0) - 65].y;
            imageCorrectAnswer.alpha = 1;
            for (var i = 0; i < 4; i++) imageAnswer[i].removeAllEventListeners();
            helpContent.disableButton();
            time = 30;
            isPlaying = false;
            soundTimeOut();
            window.setTimeout(function () {
                soundYouLoser();
            }, 500);
            window.setTimeout(function () {
                gameOver();
            }, 8000);
        }
    }, 1000);
}

function getAnswer(evt) {
    imageCorrectAnswer.x = imageAnswer[endGameNow.correctAnswer.charCodeAt(0) - 65].x;
    imageCorrectAnswer.y = imageAnswer[endGameNow.correctAnswer.charCodeAt(0) - 65].y;
    backgroundSoundOn = false;
    helpContent.disableButton();
    var temp_Time;
    for (var i = 0; i < 4; i++) imageAnswer[i].removeAllEventListeners();
    isPlaying = false;
    temp_Time = soundMyAnswerIs(evt.target.value, endGameNow.correctAnswer.charCodeAt(0) - 65);
    if (!imageAnswerHover.fixed) {
        imageChoosenAnswer.x = evt.target.x;
        imageChoosenAnswer.y = evt.target.y;
        imageChoosenAnswer.alpha = 1;
        imageAnswerHover.x = evt.target.x;
        imageAnswerHover.y = evt.target.y;
        imageAnswerHover.fixed = true;
        window.setTimeout(function () {
            imageCorrectAnswer.alpha = 1;
            if (endGameNow.checkingAnswer(evt.target.value)) {
                window.clearInterval(interval);
                if (level < 15) {
                    if (level == 14) window.setTimeout(function () {
                        soundGetOverThe14th();
                    }, 2500);
                    level++;
                    imageAnswerHover.fixed = true;
                    imageAnswerHover.x = evt.target.x;
                    helpContent.helpButtonHover.change = 1;
                    helpContent.helpButtonHover.x = -60;
                    createjs.Tween.get(endGameNow).wait(2000).to({
                        alpha: 0
                    }, 300).call(function () {
                        helpContent.helpButtonHover.fixed = false;
                        endGameNow.removeAllChildren();
                        inGame();
                    });
                } else {
                    soundCongratulation();
                    we_Are_The_Champion();
                }
            } else {
                soundYouLoser();
                window.setTimeout(function () {
                    gameOver();
                }, 8000);
            }
        }, temp_Time);
    }
}

function chooseAnswer(evt) {
    var i = evt.target.value;
    if (checkMouseHover && imageAnswerHover.fixed == false) {
        imageAnswerHover.x = evt.target.x;
        imageAnswerHover.y = evt.target.y;
        stage.update();
    }
    checkMouseHover = false;
}

function helpMeNow(type) {
    switch (type) {
    case 0:
        if (helpContent.helpButton[2].active) {
            if (level > 10) {
                var randon = Math.random() * 100;
                if (random > 50) {
                    helpContent.helpResult_1(endGameNow.correctAnswer);
                } else {
                    random = 65 + Math.floor(Math.random() * 4);
                    var stringRandom = String.fromCharCode(random);
                    while (true) {
                        if (stringRandom != endGameNow.correctAnswer) {
                            helpContent.helpResult_1(stringRandom);
                            break;
                        }
                    }
                }
            } else {
                helpContent.helpResult_1(endGameNow.correctAnswer);
            }
        } else {
            if (level < 11) {
                helpContent.helpResult_1(endGameNow.correctAnswer);
            } else {
                var random = Math.round(Math.random() * 100);
                if (random > 45) helpResult_1(endGameNow.correctAnswer);
                else {
                    var temp = endGameNow.correctAnswer.charCodeAt(0);
                    for (var i = 0; i < 4; i++)
                        if (endGameNow.answerText[i].alpha == 1 && temp != i) helpResult_1(String.fromCharCode(65 + i));
                }
            }
        }
        break;
    case 1:
        var randomArray = new Array(4);
        var percent = new Array(3);
        var sum = 0;
        var random = Math.floor(Math.random() * 100);
        var wang = true;
        if (helpContent.helpButton[2].active) {
            if (level > 10) {
                wang = false;
            } else {
                if (level < 6) {
                    wang = true;
                } else {
                    wang = false;
                    if (random > 50) wang = true;
                }
            } if (wang) {
                for (var x = 0; x < 3; x++) {
                    randomArray[x] = 50 + Math.floor(Math.random() * 100);
                    sum += randomArray[x];
                }
                for (var x = 0; x < 3; x++) {
                    percent[x] = randomArray[x] / sum;
                }
                randomArray[3] = 60 + Math.round(Math.random() * 10);
                randomArray[0] = Math.round((100 - randomArray[3]) * percent[0]);
                randomArray[1] = Math.round((100 - randomArray[3]) * percent[1]);
                randomArray[2] = Math.round((100 - randomArray[3]) * percent[2]);
                var du = 100 - randomArray[0] - randomArray[1] - randomArray[2] - randomArray[3];
                if (endGameNow.correctAnswer.charCodeAt(0) - 65 != 3) {
                    var temp = randomArray[endGameNow.correctAnswer.charCodeAt(0) - 65];
                    randomArray[endGameNow.correctAnswer.charCodeAt(0) - 65] = randomArray[3] + du;
                    randomArray[3] = temp;
                }
            } else {
                for (var x = 0; x < 4; x++) {
                    randomArray[x] = 20 + Math.floor(Math.random() * 5);
                    sum += randomArray[x];
                }
                var x = Math.floor(Math.random() * 4);
                randomArray[x] += (100 - sum);
            }
            helpContent.helpResult_2(randomArray);
        } else {
            var random;
            var x, y;
            x = 4;
            var randomArray = new Array(4);
            for (var i = 0; i < 4; i++) {
                randomArray[i] = 0;
                if (endGameNow.answerText[i].alpha == 1) {
                    if (x == 4) x = i;
                    else {
                        y = i;
                    }
                }
            }
            if (level < 11) {
                random = Math.round(Math.random() * 10 + 80);
                randomArray[x] = random;
                randomArray[y] = 100 - random;
                if (x != endGameNow.correctAnswer.charCodeAt(0) - 65) {
                    var temp = randomArray[x];
                    randomArray[x] = randomArray[y];
                    randomArray[y] = temp;
                }
            } else {
                if (Math.round(Math.random() * 100) > 50) {
                    random = Math.round(Math.random() * 10 + 80);
                    randomArray[x] = random;
                    randomArray[y] = 100 - random;
                    if (x != endGameNow.correctAnswer.charCodeAt(0) - 65) {
                        var temp = randomArray[x];
                        randomArray[x] = randomArray[y];
                        randomArray[y] = temp;
                    }
                } else {
                    random = Math.round(Math.random() * 10 + 45);
                    randomArray[x] = random;
                    randomArray[y] = 100 - random;
                }
            }
            helpContent.helpResult_2(randomArray);
        }
        break;
    case 2:
        var wang = endGameNow.correctAnswer.charCodeAt(0) - 65;
        var random1;
        var random2;
        var randomCounter = 0;
        while (true) {
            random1 = Math.floor(Math.random() * 4);
            if (random1 != wang) break;
        }
        while (true) {
            random2 = Math.floor(Math.random() * 4);
            if (random2 != wang && random2 != random1) break;
        }
        var temp_Time = 0;
        window.setTimeout(function () {
            temp_Time = soundRemove2Answers(random1, random2);
            createjs.Tween.get(endGameNow.answerText[random1]).to({
                alpha: 0
            });
            createjs.Tween.get(endGameNow.answerText[random2]).to({
                alpha: 0
            });
            isPlaying = true;
        }, 2900);
        imageAnswer[random1].removeEventListener("click", getAnswer);
        imageAnswer[random1].removeEventListener("mouseover", chooseAnswer);
        imageAnswer[random1].removeEventListener("mouseout", removeAllDecoration);
        imageAnswer[random2].removeEventListener("click", getAnswer);
        imageAnswer[random2].removeEventListener("mouseover", chooseAnswer);
        imageAnswer[random2].removeEventListener("mouseout", removeAllDecoration);
        helpContent.helpButtonHover.fixed = false;
        helpContent.refresh();
        break;
    case 3:
        createjs.Tween.get(endGameNow).to({
            alpha: 0
        }, 500).call(function () {
            endGameNow.setQuestion(otherQuestion);
            endGameNow.playAnimations();
            endGameNow.alpha = 0;
        });
        createjs.Tween.get(endGameNow).wait(600).to({
            alpha: 1
        }, 300).call(function () {
            isPlaying = true;
        });
        for (var i = 0; i < 4; i++) {
            createjs.Tween.get(endGameNow.answerText[i]).to({
                alpha: 1
            }, 300);
            imageAnswer[i].addEventListener("click", getAnswer);
            imageAnswer[i].addEventListener("mouseover", chooseAnswer);
            imageAnswer[i].addEventListener("mouseout", removeAllDecoration);
        }
        helpContent.helpButtonHover.fixed = false;
        helpContent.refresh();
        break;
    default:
        break;
    }
}

function removeAllDecoration(evt) {
    var i = evt.target.value;
    if (!checkMouseHover) {
        if (!imageAnswerHover.fixed) {
            imageAnswerHover.x = -350;
            stage.update();
        }
    }
    checkMouseHover = true;
}

function changeSoundSituation() {
    if (isSoundOn) {
        imageSoundOff.alpha = 1;
        imageSoundOn.alpha = 0;
        isSoundOn = false;
        createjs.Sound.setMute(true);
    } else {
        isSoundOn = true;
        imageSoundOff.alpha = 0;
        imageSoundOn.alpha = 1;
        createjs.Sound.setMute(false);
    }
}

function we_Are_The_Champion() {
    lionelMessi(2000);
    level = 16;
    window.setTimeout(function () {
        soundBestPlayer();
    }, 5000);
    gameOver();
}

function gameOver() {
    stage.addChild(gameOver_Container);
    window.clearInterval(interval);
    imageAnswerHover.x = -350;
    gameOver_Container.configure();
    createjs.Tween.get(gameOver_Container).wait(300).to({
        alpha: 1
    }, 1000);
}

function playBackgroundSound() {
    if (backgroundSoundOn) {
        if (level < 6) backgroundSound = createjs.Sound.play("moc1");
        else if (level > 10) backgroundSound = createjs.Sound.play("moc3");
        else backgroundSound = createjs.Sound.play("moc2");
        backgroundSound.setVolume(1);
        backgroundSound.addEventListener("complete", playBackgroundSound);
    }
}

function layDiem(gameid) {
    $.ajax({
        type: "POST",
        url: "php/getScore.php",
        data: {
            gameid: gameid
        },
        success: function (msg) {
            console.log(msg);
        }
    })
}

function loadQuestion(level, array) {
    var current;
    if (level < 4 && level > 0) 
    {
    			/*var temp = "0|1|5*Hồ Xuân Hương được tôn vinh là gì?|Bà chúa thơ Hán|Bà chúa thơ Nhật|Bà chúa thơ Việt|Bà chúa thơ Nôm|D* Trong Microsoft Word, để định dạng chữ đậm ta sử dụng tổ hợp phím tắt nào?|Ctrl + U|Ctrl + I|Ctrl + B|Ctrl + D|C*Loại tàu vũ trụ gì có thể hạ cánh xuống mặt đất như một chiếc máy bay và có thể sử dụng lại nhiều lần?|Tàu con trâu|Tàu con trai|Tàu con thoi|Tàu con mèo|C*Người ta thường so sánh \"Quê hương là chùm ... ngọt\"?|Nho|Khế|Quả|Hoa|B*Loại xe nào sau đây có thể dùng để chở nhiều hàng hoá?|Xe đạp|Xe lu|Xe tăng|Xe tải|D";
                if (temp.charAt(0) == "0") 
                {
                    current = temp.split('*');
                    for (var x = 1; x < 6; x++) {
                        array[x] = current[x];
                    }
                    if (request) startGame();
                    else {
                        loaded = true;
                    }
                } 
                else {
                    alert("Không thể kết nối tới cơ sở dữ liệu, nhấn F5 để refresh lại trang");
                }*/
        $.ajax({
            type: 'POST',
            data: {
                level: level,
                ln: 5
            },
            url: 'php/getQuestion.php',
            success: function (data) 
            {
                var temp = data;
                if (temp.charAt(0) == "0") {
                    current = temp.split('*');
                    for (var x = 1; x < 6; x++) {
                        array[x] = current[x];
                    }
                    if (request) startGame();
                    else {
                        loaded = true;
                    }
                } 
                else {
                    alert("Không thể kết nối tới cơ sở dữ liệu, nhấn F5 để refresh lại trang");
                }
            }
        });
    }
}

function loadOtherQuestion(level) {
    if (level < 4 && level > 0) {
        $.ajax({
            url: 'php/getQuestion.php',
            type: 'POST',
            data: {
                level: level,
                ln: 1
            },
            success: function (msg) {
                otherQuestion = msg;
            }
        });
    }
}

function guiDiem(score, gameid) {
    console.log('Điểm: ' + score);
    $.ajax({
        type: "POST",
        url: "/api-service/highscore.php",
        data: {
            data: score,
            gameid: gameid
        },
        success: function (msg) {
            if (parseInt(msg) == 1) console.log('Gửi điểm thành công');
            else console.log('Gửi điểm thất bại');
        }
    });
}

function guiDiem_nsq(score, username) {
    $.ajax({
        type: "POST",
        url: "php/highscore.php",
        data: {
            score: score,
            username: username,
            gameid: gameid
        },
        success: function (msg) {
            if (msg == 1) console.log('Gửi điểm thành công');
            else console.log('Gửi điểm thất bại');
        }
    });
}

function lionelMessi(ronaldo) {
    if (ronaldo > 2000) ronaldo = 0;
    else {
        /*$.ajax({
            type: 'POST',
            url: '/api-service/gold.php',
            data: {
                type: 1,
                value: ronaldo
            },
            success: function (msg) {
                if (parseInt(msg) == 1) {
                    console.log('Giao dịch thành công');
                    gold += 2000;
                } else console.log('Giao dịch thất bại');
            }
        });*/
    }
}