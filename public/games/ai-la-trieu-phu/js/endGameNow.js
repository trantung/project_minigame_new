// trợ giúp trong game
(function(window){
	var thys;
	function endGameNow(){
		this.questionText;
		this.answerText;
		this.correctAnswer;
		this.qAnda = new Array();
		this.question;
	}

	endGameNow.prototype = new createjs.Container();

	endGameNow.prototype.Container_initialize = endGameNow.prototype.initialize();
	// hàm khởi tạo ban đầu
	endGameNow.prototype.initialize = function(string){
		thys = this;
		this.questionText = new createjs.Text('','18px Arial','#DDD');

		this.answerText = new Array(4);
		this.answerText[0] = new createjs.Text('','18px Arial','#DDD');
		this.answerText[1] = new createjs.Text('','18px Arial','#DDD');
		this.answerText[2] = new createjs.Text('','18px Arial','#DDD');
		this.answerText[3] = new createjs.Text('','18px Arial','#DDD');

		this.setQuestion(string);

		thys.addChild(thys.questionText,thys.answerText[0],thys.answerText[1],thys.answerText[2],thys.answerText[3]);
	}

	endGameNow.prototype.splitString = function(string){
		//console.log(string);
		var array = string.split("|");
		return array;
	}

	endGameNow.prototype.checkingAnswer = function(answer){
		answer+=65;

		if(String.fromCharCode(answer)==thys.correctAnswer)
			return true;
		else
			return false;
	}

	endGameNow.prototype.playAnimations = function(){
		createjs.Tween.get(thys.questionText).to({scaleX: 1}, 500);
		createjs.Tween.get(thys.answerText[0]).to({scaleX:1}, 500);
		createjs.Tween.get(thys.answerText[1]).to({scaleX:1}, 500);
		createjs.Tween.get(thys.answerText[2]).to({scaleX:1}, 500);
		createjs.Tween.get(thys.answerText[3]).to({scaleX:1}, 500);
	}

	endGameNow.prototype.setQuestion = function(string){
		this.resetText();
		thys.question = string;

		thys.qAnda = thys.splitString(thys.question);

		thys.questionText.text = (((thys.qAnda[0].replace("\\","")).replace("\\","")).replace("\\","")).replace("\\","");
		thys.answerText[0].text = thys.qAnda[1];
		thys.answerText[1].text = thys.qAnda[2];
		thys.answerText[2].text = thys.qAnda[3];
		thys.answerText[3].text = thys.qAnda[4];
		thys.correctAnswer = thys.qAnda[5];

		this.questionText.textAlign = 'center';
		this.questionText.lineWidth = 510;
		this.questionText.textBaseLine = 'top';
		thys.questionText.x = 400;
		thys.questionText.y = 275;
		thys.questionText.scaleX = 0;
		thys.answerText[0].y = thys.answerText[1].y =  375;
		thys.answerText[2].y = thys.answerText[3].y =  435;
		thys.answerText[0].x = thys.answerText[2].x =  90;
		thys.answerText[1].x = thys.answerText[3].x =  490;
		thys.answerText[0].scaleX = 0;
		thys.answerText[1].scaleX = 0;
		thys.answerText[2].scaleX = 0;
		thys.answerText[3].scaleX = 0;

	}

	endGameNow.prototype.resetText = function(){
		this.questionText.text = '';
		this.answerText[0].text = '';
		this.answerText[1].text = '';
		this.answerText[2].text = '';
		this.answerText[3].text = '';
	}

	window.endGameNow = endGameNow;
}(window));