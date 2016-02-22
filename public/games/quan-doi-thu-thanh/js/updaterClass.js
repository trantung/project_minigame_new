

UpdaterComponent = function(currentValue, maxValue, price, title, buyFunction, weaponType, type){
    
    this.view = new createjs.Container();
    this.buyFunction=buyFunction;
    this.price=price;
    this.itemSize = 19; 
    this.currentValue=currentValue;
    this.maxValue=maxValue;
    this.create(this.currentValue, maxValue, price, title);
    this.type =type;
    this.weaponType= weaponType;
    this.maximumReach
   
}

UpdaterComponent.prototype.upBtnPress = function(e){
   
    var btn = e.currentTarget;
    btn.normal_btn.visible=false;
    btn.addEventListener("pressup", btn.root.upBtnUp);
    
}

UpdaterComponent.prototype.upBtnUp = function(e){
   
    
    var btn = e.currentTarget;
     if(btn.active){
    btn.normal_btn.visible=true;
    
    var buy_item = new createjs.Bitmap(preload.getResult('yellow_element'));   
    btn.root.indicator.addChild(buy_item);
    
    buy_item.x=btn.root.itemSize*btn.root.currentValue;
    btn.root.currentValue+=1;
      
    btn.root.buyFunction(btn.root.price, btn.root.weaponType, btn.root.type);
     }
 }


UpdaterComponent.prototype.update = function(money){
    
   this.btnUp.active = true;
    
    if(money<this.price){
        this.btnUp.deactive_btn.visible=true;
        this.btnUp.active =false;
    }
    
     if(this.maximumReach!=true && this.currentValue>=this.maxValue ){
      
      this.maximumReach=true;
        this.btnUp.deactive_btn.visible=true;
        this.btnUp.active = false;
        this.btnUp.visible=false;
        this.price_tf.visible=false;
        this.coins.visible=false;
        this.addMaxText();
        
    }
    
   
    
    
    
}

UpdaterComponent.prototype.addMaxText = function(){
    
    var maxText = new createjs.Bitmap(preload.getResult('max_text'));
    this.view.addChild(maxText);
    alignToCenter(maxText);
    maxText.x = 106;
    maxText.y = 117;
  //  maxText.y = 55
    ;
    this.coins = maxText;
    
}




UpdaterComponent.prototype.create = function(currentValue, maxValue, price, title) {
       
    var btnUp = new createjs.Container();
    btnUp.active=true;
    btnUp.root = this;
    btnUp.press_btn = new createjs.Bitmap(preload.getResult('up_press'));
    btnUp.normal_btn = new createjs.Bitmap(preload.getResult('up_normal'));
    btnUp.deactive_btn = new createjs.Bitmap(preload.getResult('btn_up_red_normal'));   
 btnUp.scaleX=btnUp.scaleY=0.8;
 
    
    btnUp.addChild(btnUp.press_btn);
    btnUp.addChild(btnUp.normal_btn);
    btnUp.addChild(btnUp.deactive_btn);
    btnUp.deactive_btn.visible=false;
    this.view.addChild(btnUp);
    btnUp.x=13; btnUp.y=100;
    
    btnUp.addEventListener("mousedown", this.upBtnPress)
    this.btnUp=btnUp;
    ///coins
    
    var coins = new createjs.Bitmap(preload.getResult('coins'));
    this.view.addChild(coins);
    coins.x = 165;
    coins.y = 105;
    this.coins = coins;
    
    var indicator = new createjs.Container();
    this.indicator=indicator;
    indicator.x=13;  indicator.y=30;
    
    
    for(var i=0; i<10; i++){
    
        var item;
       
        if(i<=currentValue-1){
           item = new createjs.Bitmap(preload.getResult('yellow_element'));   
        }
        
        if(i>currentValue-1 && i<=maxValue-1){
           item = new createjs.Bitmap(preload.getResult('gray_element'));   
        }
        
         if(i>maxValue-1){
           item = new createjs.Bitmap(preload.getResult('red_element'));   
        }
        
        item.x=i*this.itemSize;
        indicator.addChild(item);
        
    }
    
   this.view.addChild(indicator);
    
   
   //Create Price
   var price_tf = new createjs.BitmapText(String(price), digits_1_spriteSheet) //new createjs.Text(String(price), "bold 35px Arial", "#FBF2CA");
    price_tf.scaleX=price_tf.scaleY=0.7;
    price_tf.x = 92.5;
   price_tf.y = 80;
   price_tf.textBaseline = "alphabetic";
   this.price_tf=price_tf;
   this.view.addChild(price_tf);
   
    /*
   var title_tf =  new createjs.Text(title, "24px Arial", "#FBF2CA");
   title_tf.textAlign = "center";
   title_tf.x=19*11/2+2;
   title_tf.y=-10;
   this.view.addChild(title_tf); 
    */
    
}