(function (window) {
    var thys;

    function HelpContainer(img1, img2, img3, img4, img5, img7, img8, img9, img10, img11, img12, img13) {
        this.helpButtonHover;
        this.helpButton = new Array(4);
        this.helpOptions;
        this.helpPerson = new Array(6);
        this.helpPersonHover;
        this.helpButtonDisable = new Array(4);
        this.advice;
        this.advices = new Array(4);
        this.whereAreYou = new Array(15);
        this.whereAreYou2 = new Array(15);
        this.whereAreYouHover;
        this.suggestion = '';
        this.OK_Button;
        this.cancel_Button;
        this.are_U_Sure;
        this.money_Container;
        this.initialize(img1, img2, img3, img4, img5, img7, img8, img9, img10, img11, img12, img13);
    }
    HelpContainer.prototype = new createjs.Container();
    HelpContainer.prototype.Container_initialize = HelpContainer.prototype.initialize();
    HelpContainer.prototype.initialize = function (img1, img2, img3, img4, img5, img7, img8, img9, img10, img11, img12, img13) {
        thys = this;
        this.helpButton[0] = new createjs.Bitmap(img1);
        this.helpButton[1] = new createjs.Bitmap(img2);
        this.helpButton[2] = new createjs.Bitmap(img3);
        this.helpButton[3] = new createjs.Bitmap(img4);
        this.helpButtonHover = new createjs.Bitmap(img5);
        this.helpOptions = new createjs.Bitmap(window.contentManager.help_1);
        this.helpPerson[0] = new createjs.Bitmap(img7);
        this.helpPerson[1] = new createjs.Bitmap(img8);
        this.helpPerson[2] = new createjs.Bitmap(img9);
        this.helpPerson[3] = new createjs.Bitmap(img10);
        this.helpPerson[4] = new createjs.Bitmap(img11);
        this.helpPerson[5] = new createjs.Bitmap(img12);
        this.helpPersonHover = new createjs.Bitmap(img13);
        this.helpButtonDisable[0] = new createjs.Bitmap(window.contentManager.helpDisable);
        this.helpButtonDisable[1] = new createjs.Bitmap(window.contentManager.helpDisable);
        this.helpButtonDisable[2] = new createjs.Bitmap(window.contentManager.helpDisable);
        this.helpButtonDisable[3] = new createjs.Bitmap(window.contentManager.helpDisable);
        this.advice = new createjs.Text('', '18pt Arial', '#EEE');
        for (var i = 0; i < 4; i++) this.advices[i] = new createjs.Text('', '18px Arial', '#EEE');
        for (var i = 0; i < 15; i++) {
            this.whereAreYou[i] = new createjs.Bitmap(window.contentManager.whereAreYou[i]);
            this.whereAreYou2[i] = new createjs.Bitmap(window.contentManager.whereAreYou2[i]);
            this.whereAreYou2[i].alpha = 0;
            this.whereAreYou[i].regX = this.whereAreYou2[i].regX = 53;
            this.whereAreYou[i].y = this.whereAreYou2[i].y = 15 + 17 * (i % 5);
            if (i < 5) {
                this.whereAreYou[i].x = this.whereAreYou2[i].x = 153;
            } else {
                if (i > 9) this.whereAreYou[i].x = this.whereAreYou2[i].x = 453;
                else {
                    this.whereAreYou[i].x = this.whereAreYou2[i].x = 303;
                }
            }
        }
        this.whereAreYouHover = new createjs.Bitmap(window.contentManager.whereAreYouHover);
        this.whereAreYouHover.regX = 56;
        this.whereAreYouHover.x = 153;
        this.whereAreYouHover.y = 10.5;
        this.OK_Button = new createjs.Bitmap(contentManager.imageTick);
        this.cancel_Button = new createjs.Bitmap(contentManager.imageX);
        this.are_U_Sure = new createjs.Text('Bạn chắn chắn muốn sử dụng sự trợ giúp này?', '14pt Arial', '#FFF');
        this.money_Container = new createjs.Container();
        this.configure();
        //this.addChild(this.helpOptions, this.helpButton[0], this.helpButton[1], this.helpButton[2], this.helpButton[3], this.helpButtonHover);
        this.addChild(this.helpOptions, this.helpButton[0], this.helpButton[1], this.helpButton[2], this.helpButtonHover);
        for (var i = 0; i < 15; i++) this.addChild(this.whereAreYou[i]);
        for (var i = 0; i < 15; i++) this.addChild(this.whereAreYou2[i]);
        this.addChild(this.whereAreYouHover, this.helpPerson[0], this.helpPerson[1], this.helpPerson[2], this.helpPerson[3], this.helpPerson[4], this.helpPerson[5], this.helpPersonHover, this.helpButtonDisable[0], this.helpButtonDisable[1], this.helpButtonDisable[2], this.helpButtonDisable[3], this.advice, this.advices[0], this.advices[1], this.advices[2], this.advices[3]);
        this.addChild(this.money_Container);
    }
    HelpContainer.prototype.configure = function () {
        this.helpButtonHover.x = -60;
        this.helpButtonHover.y = 10;
        this.helpButtonHover.fixed = false;
        this.helpOptions.x = 400;
        this.helpOptions.y = 0;
        this.helpOptions.regX = 307.5;
        this.helpPersonHover.x = -50;
        this.helpPerson.y = 70;
        this.helpPersonHover.alpha = 0;
        this.helpPersonHover.fixed = false;
        for (var i = 0; i < 4; i++) {
            this.helpButton[i].value = i;
            this.helpButtonDisable[i].alpha = 0;
            this.helpButton[i].active = true;
            this.advices[i].alpha = 0;
        }
        this.advices[0].x = this.advices[2].x = 185;
        this.advices[0].y = this.advices[1].y = 35;
        this.advices[1].x = this.advices[3].x = 345;
        this.advices[2].y = this.advices[3].y = 70;
        this.advices[0].text = "A: ";
        this.advices[1].text = "B: ";
        this.advices[2].text = "C: ";
        this.advices[3].text = "D: ";
        this.helpButtonDisable[0].y = this.helpButtonDisable[1].y = this.helpButton[0].y = this.helpButton[1].y = 10;
        this.helpButtonDisable[0].x = this.helpButtonDisable[2].x = this.helpButton[0].x = this.helpButton[2].x = 550;
        this.helpButtonDisable[2].y = this.helpButtonDisable[3].y = this.helpButton[2].y = this.helpButton[3].y = 55;
        this.helpButtonDisable[1].x = this.helpButtonDisable[3].x = this.helpButton[1].x = this.helpButton[3].x = 630;
        for (var i = 0; i < 6; i++) {
            this.helpPerson[i].value = i;
            this.helpPerson[i].y = 34;
            this.helpPerson[i].x = 120 + 65 * i;
            this.helpPerson[i].alpha = 0;
            this.helpPerson[i].addEventListener("mouseover", this.highLightPerson);
            this.helpPerson[i].addEventListener("mouseout", this.normalPerson);
            this.helpPerson[i].addEventListener("click", this.lieThemNow);
        }
        this.advice.alpha = 0;
        this.OK_Button.regX = this.OK_Button.image.width / 2;
        this.OK_Button.regY = this.OK_Button.image.height / 2;
        this.OK_Button.x = 580;
        this.OK_Button.y = 50;
        this.cancel_Button.regX = this.cancel_Button.image.width / 2;
        this.cancel_Button.regY = this.cancel_Button.image.height / 2;
        this.cancel_Button.x = 660;
        this.cancel_Button.y = 50;
        this.are_U_Sure.lineWidth = 420;
        this.are_U_Sure.x = 120;
        this.are_U_Sure.y = 30;
        this.money_Container.alpha = 0;
        this.money_Container.addChild(this.OK_Button, this.cancel_Button, this.are_U_Sure);
    }
    HelpContainer.prototype.getHelp = function (active, value, x) {
        //if (!thys.helpButtonHover.fixed && active && gold >= 200) 
        if (!thys.helpButtonHover.fixed && active) 
        {
            isPlaying = false;
            thys.helpButton[value].active = false;
            thys.helpButtonHover.x = x;
            thys.helpButtonHover.fixed = true;
            switch (value) {
            case 0:
                for (var i = 0; i < 6; i++) {
                    createjs.Tween.get(thys.helpPerson[i]).to({
                        alpha: 1
                    }, 300);
                }
                helpMeNow(0);
                break;
            case 1:
                soundHelpOptions(1);
                helpMeNow(1);
                break;
            case 2:
                soundHelpOptions(2);
                helpMeNow(2);
                break;
            case 3:
                helpMeNow(3);
                break;
            default:
                break;
            }
            thys.helpButtonDisable[value].alpha = 1;
            thys.helpButton[value].removeEventListener("mouseover", thys.highLightStat);
            thys.helpButton[value].removeEventListener("mouseout", thys.normalStat);
            thys.helpButton[value].removeEventListener("click", thys.areUSure);
            /*$.ajax({
                type: 'POST',
                url: '/api-service/gold.php',
                data: {
                    type: 2,
                    value: 200
                },
                success: function (msg) {
                    if (parseInt(msg) == 1) {
                        console.log('Giao dịch thành công');
                        gold -= 200;
                    } else {
                        console.log('Giao dịch thất bại');
                    }
                }
            });*/
        } else {
            thys.refresh();
            if (gold < 200) console.log('Bạn không đủ tiền để có thể sử dụng sự trợ giúp');
        }
    }
    HelpContainer.prototype.highLightStat = function (evt) {
        if (!thys.helpButtonHover.fixed && evt.target.active) {
            thys.helpButtonHover.x = evt.target.x;
            thys.helpButtonHover.y = evt.target.y;
        }
    }
    HelpContainer.prototype.normalStat = function (evt) {
        if (!thys.helpButtonHover.fixed) thys.helpButtonHover.x = -60;
    }
    HelpContainer.prototype.refresh = function () {
        for (var i = 0; i < 15; i++) {
            if (i < level - 1) {
                this.whereAreYou2[i].alpha = 1;
                this.whereAreYou[i].alpha = 0;
            } else {
                this.whereAreYou[i].alpha = 1;
            }
        }
        thys.whereAreYouHover.alpha = 1;
        createjs.Tween.get(this.whereAreYouHover).to({
            x: this.whereAreYou[window.level - 1].x,
            y: this.whereAreYou[window.level - 1].y - 4.5
        }, 500);
        for (var x = 0; x < 6; x++) {
            createjs.Tween.get(thys.helpPerson[x]).to({
                alpha: 0
            }, 300).call(function () {
                thys.helpPerson[x].x = 120 + 65 * x;
            });
        }
        for (var x = 0; x < 4; x++) {
            createjs.Tween.get(thys.advices[x]).to({
                alpha: 0
            }, 300);
            if (!thys.helpButton[x].active) thys.helpButtonDisable[x].alpha = 1;
        }
        thys.helpButtonHover.alpha = 1;
        this.helpPersonHover.alpha = 0;
        createjs.Tween.get(thys.advice).to({
            alpha: 0
        }, 300);
    }
    HelpContainer.prototype.lieThemNow = function (evt) {
        if (!thys.helpPersonHover.fixed) {
            switch (evt.target.value) {
            case 0:
                thys.advice.text = 'Naruto khuyên bạn nên chọn đáp án ' + thys.suggestion;
                break;
            case 1:
                thys.advice.text = 'Doraemon khuyên bạn nên chọn đáp án ' + thys.suggestion;
                break;
            case 2:
                thys.advice.text = 'Songoku gia khuyên bạn nên chọn đáp án ' + thys.suggestion;
                break;
            case 3:
                thys.advice.text = 'Iron man khuyên bạn nên chọn đáp án ' + thys.suggestion;
                break;
            case 4:
                thys.advice.text = 'Pikachu khuyên bạn nên chọn đáp án ' + thys.suggestion;
                break;
            case 5:
                thys.advice.text = 'Conan khuyên bạn nên chọn đáp án ' + thys.suggestion;
                break;
            default:
                break;
            }
            soundHelpOptions(0);
            evt.target.x += 2;
            evt.target.y += 2;
            thys.helpPersonHover.x = evt.target.x;
            thys.helpPersonHover.y = evt.target.y;
            thys.helpPersonHover.alpha = 0;
            thys.helpPersonHover.fixed = true;
            for (var i = 0; i < 6; i++) thys.helpPerson[i].alpha = 0;
            evt.target.alpha = 1;
            createjs.Tween.get(evt.target).to({
                x: 120
            }, 500);
            createjs.Tween.get(thys.advice).wait(1200).to({
                alpha: 1
            }, 500);
            thys.helpButtonHover.fixed = false;
            isPlaying = true;
        }
    }
    HelpContainer.prototype.highLightPerson = function (evt) {
        if (!thys.helpPersonHover.fixed) {
            thys.helpPersonHover.x = evt.target.x;
            thys.helpPersonHover.y = evt.target.y;
            evt.target.x -= 2;
            evt.target.y -= 2;
            thys.helpPersonHover.alpha = 1;
        }
    }
    HelpContainer.prototype.normalPerson = function (evt) {
        if (!thys.helpPersonHover.fixed) {
            thys.helpPersonHover.alpha = 0;
            evt.target.x += 2;
            evt.target.y += 2;
        }
    }
    HelpContainer.prototype.helpResult_1 = function (result) {
        this.refresh();
        thys.whereAreYouHover.alpha = 0;
        for (var i = 0; i < 15; i++) {
            this.whereAreYou[i].alpha = 0;
            this.whereAreYou2[i].alpha = 0;
        }
        thys.suggestion = result;
        thys.advice.x = 350;
        thys.advice.y = 30;
        thys.advice.lineWidth = 300;
        thys.advice.textAlign = 'center';
        thys.advice.textBaseLine = 'top';
        thys.helpPersonHover.alpha = 0;
    }
    HelpContainer.prototype.helpResult_2 = function (result) {
        this.refresh();
        thys.whereAreYouHover.alpha = 0;
        for (var i = 0; i < 15; i++) {
            this.whereAreYou[i].alpha = 0;
            this.whereAreYou2[i].alpha = 0;
        }
        for (var i = 0; i < 4; i++) {
            thys.advices[i].textBaseLine = 'bottom';
            thys.advices[i].text = thys.advices[i].text + result[i] + " %";
            createjs.Tween.get(thys.advices[i]).wait(5500).to({
                alpha: 1
            }, 300);
        }
        thys.helpButtonHover.fixed = false;
        window.setTimeout(function () {
            isPlaying = true;
        }, 5500);
    }
    HelpContainer.prototype.disableButton = function () {
        for (var i = 0; i < 4; i++) {
            thys.helpButton[i].removeEventListener("mouseover", thys.highLightStat);
            thys.helpButton[i].removeEventListener("mouseout", thys.normalStat);
            thys.helpButton[i].removeEventListener("click", thys.areUSure);
        }
    }
    HelpContainer.prototype.enableButton = function () {
        for (var i = 0; i < 4; i++) {
            thys.helpButton[i].addEventListener("mouseover", thys.highLightStat);
            thys.helpButton[i].addEventListener("mouseout", thys.normalStat);
            thys.helpButton[i].addEventListener("click", thys.areUSure);
        }
    }
    HelpContainer.prototype.areUSure = function (e) {
        var value = e.target.value;
        var active = e.target.active;
        var x = e.target.x;
        thys.helpButtonHover.alpha = 0;
        for (var i = 0; i < 15; i++) {
            thys.whereAreYou[i].alpha = 0;
            thys.whereAreYou2[i].alpha = 0;
        }
        for (var i = 0; i < 4; i++) {
            thys.advices[i].alpha = 0;
            thys.helpButton[i].alpha = 0;
            thys.helpButtonDisable[i].alpha = 0;
        }
        for (var i = 0; i < 6; i++) thys.helpPerson[i].alpha = 0;
        thys.whereAreYouHover.alpha = 0;
        thys.advice.alpha = 0;
        thys.money_Container.alpha = 1;
        thys.OK_Button.addEventListener('mouseover', function (e) {
            e.target.scaleX = 1.05;
            e.target.scaleY = 1.05;
        });
        thys.OK_Button.addEventListener('mouseout', function (e) {
            e.target.scaleX = 1;
            e.target.scaleY = 1;
        });
        thys.cancel_Button.addEventListener('mouseover', function (e) {
            e.target.scaleX = 1.05;
            e.target.scaleY = 1.05;
        });
        thys.cancel_Button.addEventListener('mouseout', function (e) {
            e.target.scaleX = 1;
            e.target.scaleY = 1;
        });
        thys.OK_Button.addEventListener('click', function () {
            thys.OK_Button.removeAllEventListeners();
            thys.cancel_Button.removeAllEventListeners();
            for (var i = 0; i < 4; i++) thys.helpButton[i].alpha = 1;
            thys.getHelp(active, value, x);
            thys.money_Container.alpha = 0;
        });
        thys.cancel_Button.addEventListener('click', function () {
            thys.OK_Button.removeAllEventListeners();
            thys.cancel_Button.removeAllEventListeners();
            thys.refresh();
            for (var i = 0; i < 4; i++) thys.helpButton[i].alpha = 1;
            thys.money_Container.alpha = 0;
        });
    }
    window.HelpContainer = HelpContainer;
}(window));