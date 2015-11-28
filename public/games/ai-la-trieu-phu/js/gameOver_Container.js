(function (window) {
    var thys;

    function gameOver_Container() {
        this.background_Img;
        this.getOver_Button;
        this.continued_Button;
        this.sec_Img;
        this.getOver_Text;
        this.level_Text;
        this.congratulated_Text;
        this.thongbao;
        this.saveScore_Button;
        this.initialize();
    }
    gameOver_Container.prototype = new createjs.Container();
    gameOver_Container.prototype.Container_initialize = gameOver_Container.prototype.initialize();
    gameOver_Container.prototype.initialize = function () {
        thys = this;
        this.background_Img = new createjs.Bitmap(contentManager.imageGameOver);
        this.sec_Img = new createjs.Bitmap(contentManager.imageSec);
        this.getOver_Button = new createjs.Bitmap(contentManager.getOver_Button);
        this.continued_Button = new createjs.Bitmap(contentManager.continuedButton);
        this.saveScore_Button = new createjs.Bitmap(contentManager.imageSaveScore);
        this.getOver_Text = new createjs.Text("Dùng 200 Xu để qua câu hỏi này.", "18pt Arial", "#FFF");
        this.level_Text = new createjs.Text("" + (level - 1), "14pt Arial", "#6E6C68");
        this.congratulated_Text = new createjs.Text("", "14pt Arial", "#6E6C68");
        thys.thongbao = new createjs.Text("", "18pt Arial", "#FFF");
        this.configure();
        //this.addChild(this.background_Img, this.sec_Img, this.getOver_Text, this.getOver_Button, this.continued_Button, this.level_Text, this.congratulated_Text, this.thongbao, this.saveScore_Button);
        this.addChild(this.background_Img, this.sec_Img, this.continued_Button, this.level_Text, this.congratulated_Text, this.thongbao);
    }
    gameOver_Container.prototype.configure = function () {
        this.alpha = 0;
        this.getOver_Button.removeAllEventListeners();
        this.continued_Button.removeAllEventListeners();
        this.saveScore_Button.removeAllEventListeners();
        this.sec_Img.regX = this.sec_Img.image.width / 2;
        this.sec_Img.regY = this.sec_Img.image.height / 2;
        this.sec_Img.x = 400;
        this.sec_Img.y = 240;
        this.getOver_Button.sourceRect = new createjs.Rectangle(0, 0, 134, 45);
        this.getOver_Button.name = "getover";
        this.getOver_Button.x = 620;
        this.getOver_Button.y = 65;
        this.getOver_Button.regX = this.getOver_Button.image.width / 2;
        this.getOver_Button.regY = this.getOver_Button.image.height / 2;
        this.getOver_Button.addEventListener('mouseover', function () {
            thys.getOver_Button.sourceRect = new createjs.Rectangle(134, 0, 134, 45);
        });
        this.getOver_Button.addEventListener('mouseout', function () {
            thys.getOver_Button.sourceRect = new createjs.Rectangle(0, 0, 134, 45);
        });
        this.getOver_Button.addEventListener('click', this.clickAction);
        this.continued_Button.canClick = true;
        this.continued_Button.name = "continue";
        this.continued_Button.regX = this.continued_Button.image.width / 2;;
        this.continued_Button.regY = this.continued_Button.image.height / 2;;
        this.continued_Button.x = 400;
        this.continued_Button.y = 430;
        this.continued_Button.addEventListener('mouseover', function (e) {
            e.target.scaleX = 1.05;
            e.target.scaleY = 1.05;
        });
        this.continued_Button.addEventListener('mouseout', function (e) {
            e.target.scaleX = 1;
            e.target.scaleY = 1;
        });
        this.continued_Button.addEventListener('click', this.clickAction);
        this.getOver_Text.Align = "left";
        this.getOver_Text.y = 50;
        this.getOver_Text.x = 120;
        this.level_Text.x = 520;
        this.level_Text.y = 250;
        this.level_Text.text = level - 1;
        this.congratulated_Text.x = 520;
        this.congratulated_Text.y = 275;
        switch (level - 1) {
        case 0:
            this.congratulated_Text.text = "0 Điểm";
            break;
        case 1:
            this.congratulated_Text.text = "100.000 Điểm";
            break;
        case 2:
            this.congratulated_Text.text = "200.000 Điểm";
            break;
        case 3:
            this.congratulated_Text.text = "300.000 Điểm";
            break;
        case 4:
            this.congratulated_Text.text = "400.000 Điểm";
            break;
        case 5:
            this.congratulated_Text.text = "500.000 Điểm";
            break;
        case 6:
            this.congratulated_Text.text = "1.000.000 Điểm";
            break;
        case 7:
            this.congratulated_Text.text = "2.000.000 Điểm";
            break;
        case 8:
            this.congratulated_Text.text = "3.600.000 Điểm";
            break;
        case 9:
            this.congratulated_Text.text = "6.000.000 Điểm";
            break;
        case 10:
            this.congratulated_Text.text = "9.000.000 Điểm";
            break;
        case 11:
            this.congratulated_Text.text = "25.000.000 Điểm";
            break;
        case 12:
            this.congratulated_Text.text = "35.000.000 Điểm";
            break;
        case 13:
            this.congratulated_Text.text = "50.000.000 Điểm";
            break;
        case 14:
            this.congratulated_Text.text = "80.000.000 Điểm";
            break;
        case 15:
            this.congratulated_Text.text = "120.000.000 Điểm";
            break;
        default:
            break;
        }
        this.thongbao.textAlign = 'center';
        this.thongbao.x = 400;
        this.thongbao.y = 100;
        this.thongbao.alpha = 0;

        this.saveScore_Button.regX = this.saveScore_Button.image.width/2;
        this.saveScore_Button.regY = this.saveScore_Button.image.height/2;
        this.saveScore_Button.x = 480;
        this.saveScore_Button.y = 430;

        this.saveScore_Button.addEventListener('mouseover',function(e){
        	e.target.scaleX = 1.05;
        	e.target.scaleY = 1.05;
        });

        this.saveScore_Button.addEventListener('mouseout',function(e){
        	e.target.scaleX = 1;
        	e.target.scaleY = 1;
        });

        this.saveScore_Button.addEventListener('click',function(e){
        	e.target.scaleX = 1;
        	e.target.scaleY = 1;
        	thys.saveScore_Button.removeAllEventListeners();
        	if (login) {
                var temp = 0;
                switch (level - 1) {
                case 0:
                    temp = 0;
                    break;
                case 1:
                    temp = 100;
                    break;
                case 2:
                    temp = 200;
                    break;
                case 3:
                    temp = 300;
                    break;
                case 4:
                    temp = 400;
                    break;
                case 5:
                    temp = 500;
                    break;
                case 6:
                    temp = 1000;
                    break;
                case 7:
                    temp = 2000;
                    break;
                case 8:
                    temp = 3600;
                    break;
                case 9:
                    temp = 6000;
                    break;
                case 10:
                    temp = 9000;
                    break;
                case 11:
                    temp = 25000;
                    break;
                case 12:
                    temp = 35000;
                    break;
                case 13:
                    temp = 50000;
                    break;
                case 14:
                    temp = 80000;
                    break;
                case 15:
                    temp = 120000;
                    break;
                default:
                    break;
                }
                guiDiem(temp, gameid);
            } else {
                console.log("Bạn chưa đăng nhập nên không thể up điểm");
            }
        });
    }
    gameOver_Container.prototype.clickAction = function (e) {
        e.target.removeAllEventListeners();
        if (e.target.name == "getover") {
            e.target.sourceRect = new createjs.Rectangle(0, 0, 134, 45);
            if (login && can_GetOver) {
                thys.continued_Button.removeAllEventListeners();
                if (gold >= 200 && level < 10) {
                    $.ajax({
                        type: "POST",
                        url: "/api-service/gold.php",
                        data: {
                            type: 2,
                            value: 200
                        },
                        success: function (msg) {
                            if (parseInt(msg) == 1) {
                                can_GetOver = false;
                                console.log('Giao dịch thành công');
                                gold -= 200;
                                console.log(gold);
                                level++;
                                helpContent.refresh();
                                helpContent.enableButton();
                                time = 30;
                                timeText.text = time;
                                imageCorrectAnswer.alpha = 0;
                                imageChoosenAnswer.alpha = 0;
                                endGameNow.removeAllChildren();
                                createjs.Tween.get(thys).to({
                                    alpha: 0
                                }, 1000).call(function () {
                                    if (level == 5 || level == 10) {
                                        endGameNow.initialize(quanns[5]);
                                        loadQuestion(level / 5 + 1, quanns);
                                    } else {
                                        if (level < 15) endGameNow.initialize(quanns[level % 5]);
                                        else {
                                            endGameNow.initialize(quanns[5]);
                                        }
                                    }
                                    endGameNow.playAnimations();
                                    for (var i = 0; i < 4; i++) {
                                        imageAnswer[i].addEventListener("click", getAnswer);
                                        imageAnswer[i].addEventListener("mouseover", chooseAnswer);
                                        imageAnswer[i].addEventListener("mouseout", removeAllDecoration);
                                    }
                                    isPlaying = true;
                                    imageAnswerHover.fixed = false;
                                    imageAnswerHover.alpha = 1;
                                    timeCountdown();
                                    stage.removeChild(thys);
                                });
                                backgroundSoundOn = true;
                                playBackgroundSound();
                            } else {
                                console.log('Giao dịch thất bại');
                                thys.continued_Button.addEventListener('mouseover', function (e) {
                                    e.target.scaleX = 1.1;
                                    e.target.scaleY = 1.1;
                                });
                                thys.continued_Button.addEventListener('mouseout', function (e) {
                                    e.target.scaleX = 1;
                                    e.target.scaleY = 1;
                                });
                                thys.continued_Button.addEventListener('click', thys.clickAction);
                            }
                        }
                    });
                } else {
                    thys.continued_Button.addEventListener('mouseover', function (e) {
                        e.target.scaleX = 1.1;
                        e.target.scaleY = 1.1;
                    });
                    thys.continued_Button.addEventListener('mouseout', function (e) {
                        e.target.scaleX = 1;
                        e.target.scaleY = 1;
                    });
                    thys.continued_Button.addEventListener('click', thys.clickAction);
                    if (gold < 200) alert('Bạn không đủ gold để vượt qua câu hỏi này');
                    else {
                        alert('Rất tiếc câu hỏi này không hỗ trợ sự trợ giúp mà bạn lựa chọn');
                    }
                }
            } else {
                if (!login) console.log('Chưa đăng nhập nên không làm gì');
                else {
                    console.log('Bạn đã vượt qua câu hỏi ở lần trước');
                    thys.thongbao.text = "Bạn đã vượt qua câu hỏi ở lần trước";
                    thys.thongbao.alpha = 1;
                    createjs.Tween.get(thys.thongbao).wait(2000).to({
                        alpha: 0
                    }, 500);
                }
            }
        } else {
            thys.getOver_Button.removeAllEventListeners();
            e.target.scaleY = 1;
            e.target.scaleX = 1;
            endGameNow.removeAllChildren();
            helpContent.y = -118;
            gameContent.removeAllChildren();
            createjs.Tween.get(thys).to({
                alpha: 0
            }, 1000);
            createjs.Tween.get(endGameNow).to({
                alpha: 0
            }, 1000).call(function () {
                stage.removeChild(thys);
                createjs.Sound.stop();
                request = false;
                loaded = false;
                loadQuestion(1, quanns);
                readyGame();
            });
        }
    }
    window.gameOver_Container = gameOver_Container;
}(window));