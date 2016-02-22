function clearDisplayObject(mc) {
    while (mc.getNumChildren() > 0) {
        mc.removeChildAt(0);
    }
}


function disableTouch(mc){
    mc.mouseChildren=false;
    mc.mouseEnabled=false;
    
    
}




function randRange(min, max) {
    var randomNum = Math.floor(Math.random() * (max - min + 1)) + min;
    return randomNum;
}

function secondsToHms(secs) {
    var sec_num = parseInt(secs, 10); // don't forget the second parm
    var hours = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours < 10) {
        hours = "0" + hours;
    }
    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    var time = minutes + ':' + seconds;
    return time;
}

function getWidth(x1, y1, x2, y2)
{
    var _width = Math.sqrt((x1 - x2) * (x1 - x2) + (y1 - y2) * (y1 - y2));

    return _width
}



function getAngle(x1, y1, x2, y2)
{
    var dx = x2 - x1;
    var dy = y2 - y1;
    return Math.atan2(dy, dx);
}


function alignToCenter(img) {

    img.regX = img.image.width / 2;
    img.regY = img.image.height / 2;


} 