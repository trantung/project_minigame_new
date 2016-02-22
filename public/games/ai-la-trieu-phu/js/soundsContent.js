function getSounds() 
{
	
    console.log("Load sound process");
    
    var NUM_OF_SOUNDS = 57;
    var counter = 0;
    audioPath = 'audio/';
    manifest = [{
        id: "ab_2",
        src: audioPath + "ab_2.mp3"
    }, {
        id: "ac_1",
        src: audioPath + "ac_1.mp3"
    }, {
        id: "ad_1",
        src: audioPath + "ad_1.mp3"
    }, {
        id: "ansA_loseB",
        src: audioPath + "ansA_loseB.mp3"
    }, {
        id: "ansA_loseC",
        src: audioPath + "ansA_loseC.mp3"
    }, {
        id: "ansA_loseD",
        src: audioPath + "ansA_loseD.mp3"
    }, {
        id: "ansA_trueA",
        src: audioPath + "ansA_trueA.mp3"
    }, {
        id: "ansB_loseA",
        src: audioPath + "ansB_loseA.mp3"
    }, {
        id: "ansB_loseC",
        src: audioPath + "ansB_loseC.mp3"
    }, {
        id: "ansB_loseD",
        src: audioPath + "ansB_loseD.mp3"
    }, {
        id: "ansB_trueB",
        src: audioPath + "ansB_trueB.mp3"
    }, {
        id: "ansC_loseA",
        src: audioPath + "ansC_loseA.mp3"
    }, {
        id: "ansC_loseB",
        src: audioPath + "ansC_loseB.mp3"
    }, {
        id: "ansC_loseD",
        src: audioPath + "ansC_loseD.mp3"
    }, {
        id: "ansC_trueC",
        src: audioPath + "ansC_trueC.mp3"
    }, {
        id: "ansD_loseA",
        src: audioPath + "ansD_loseA.mp3"
    }, {
        id: "ansD_loseB",
        src: audioPath + "ansD_loseB.mp3"
    }, {
        id: "ansD_loseC",
        src: audioPath + "ansD_loseC.mp3"
    }, {
        id: "ansD_trueD",
        src: audioPath + "ansD_trueD.mp3"
    }, {
        id: "bc_1",
        src: audioPath + "bc_1.mp3"
    }, {
        id: "bd_1",
        src: audioPath + "bd_1.mp3"
    }, {
        id: "best_player",
        src: audioPath + "best_player.mp3"
    }, {
        id: "bye",
        src: audioPath + "bye.mp3"
    }, {
        id: "call",
        src: audioPath + "call.mp3"
    }, {
        id: "cd_2",
        src: audioPath + "cd_2.mp3"
    }, {
        id: "cheer",
        src: audioPath + "cheer.mp3"
    }, {
        id: "for_qplay",
        src: audioPath + "for_qplay.mp3"
    }, {
        id: "gofind",
        src: audioPath + "gofind.mp3"
    }, {
        id: "gofind1",
        src: audioPath + "gofind1.mp3"
    }, {
        id: "important",
        src: audioPath + "important.mp3"
    }, {
        id: "khan_gia",
        src: audioPath + "khan_gia.mp3"
    }, {
        id: "luatchoi",
        src: audioPath + "luatchoi.mp3"
    }, {
        id: "moc1",
        src: audioPath + "moc1.mp3"
    }, {
        id: "moc2",
        src: audioPath + "moc2.mp3"
    }, {
        id: "moc3",
        src: audioPath + "moc3.mp3"
    }, {
        id: "out_of_time",
        src: audioPath + "out_of_time.mp3"
    }, {
        id: "pass14",
        src: audioPath + "pass14.mp3"
    }, {
        id: "ques01",
        src: audioPath + "ques01.mp3"
    }, {
        id: "ques02",
        src: audioPath + "ques02.mp3"
    }, {
        id: "ques03",
        src: audioPath + "ques03.mp3"
    }, {
        id: "ques04",
        src: audioPath + "ques04.mp3"
    }, {
        id: "ques05",
        src: audioPath + "ques05.mp3"
    }, {
        id: "ques06",
        src: audioPath + "ques06.mp3"
    }, {
        id: "ques07",
        src: audioPath + "ques07.mp3"
    }, {
        id: "ques08",
        src: audioPath + "ques08.mp3"
    }, {
        id: "ques09",
        src: audioPath + "ques09.mp3"
    }, {
        id: "ques10",
        src: audioPath + "ques10.mp3"
    }, {
        id: "ques11",
        src: audioPath + "ques11.mp3"
    }, {
        id: "ques12",
        src: audioPath + "ques12.mp3"
    }, {
        id: "ques13",
        src: audioPath + "ques13.mp3"
    }, {
        id: "ques14",
        src: audioPath + "ques14.mp3"
    }, {
        id: "ques15",
        src: audioPath + "ques15.mp3"
    }, {
        id: "ready",
        src: audioPath + "ready.mp3"
    }, {
        id: "sound5050",
        src: audioPath + "sound5050.mp3"
    }, {
        id: "start",
        src: audioPath + "start.mp3"
    }, {
        id: "DungChoi",
        src: audioPath + "DungChoi.mp3"
    }, {
        id: "ThuaCuoc",
        src: audioPath + "ThuaCuoc.mp3"
    }];

	h_ab_2 = new Howl({urls: ["audio/ab_2.mp3", "audio/ab_2.ogg"],});
	h_ac_1 = new Howl({urls: ["audio/ac_1.mp3", "audio/ac_1.ogg"],});
	h_ad_1 = new Howl({urls: ["audio/ad_1.mp3", "audio/ad_1.ogg"],});
	h_ansA_loseB = new Howl({urls: ["audio/ansA_loseB.mp3", "audio/ansA_loseB.ogg"],});
	h_ansA_loseC = new Howl({urls: ["audio/ansA_loseC.mp3", "audio/ansA_loseC.ogg"],});
	h_ansA_loseD = new Howl({urls: ["audio/ansA_loseD.mp3", "audio/ansA_loseD.ogg"],});
	h_ansA_trueA = new Howl({urls: ["audio/ansA_trueA.mp3", "audio/ansA_trueA.ogg"],});
    h_ansB_loseA = new Howl({urls: ["audio/ansB_loseA.mp3", "audio/ansB_loseA.ogg"],});
    h_ansB_loseC = new Howl({urls: ["audio/ansB_loseC.mp3", "audio/ansB_loseC.ogg"],});
    h_ansB_loseD = new Howl({urls: ["audio/ansB_loseD.mp3", "audio/ansB_loseD.ogg"],});
    h_ansB_trueB = new Howl({urls: ["audio/ansB_trueB.mp3", "audio/ansB_trueB.ogg"],}); 
    h_ansC_loseA = new Howl({urls: ["audio/ansC_loseA.mp3", "audio/ansC_loseA.ogg"],});
    h_ansC_loseB = new Howl({urls: ["audio/ansC_loseB.mp3", "audio/ansC_loseB.ogg"],});
    h_ansC_loseD = new Howl({urls: ["audio/ansC_loseD.mp3", "audio/ansC_loseD.ogg"],});
    h_ansC_trueC = new Howl({urls: ["audio/ansC_trueC.mp3", "audio/ansC_trueC.ogg"],});
    h_ansD_loseA = new Howl({urls: ["audio/ansD_loseA.mp3", "audio/ansD_loseA.ogg"],});
    h_ansD_loseB = new Howl({urls: ["audio/ansD_loseB.mp3", "audio/ansD_loseB.ogg"],});
    h_ansD_loseC = new Howl({urls: ["audio/ansD_loseC.mp3", "audio/ansD_loseC.ogg"],});
    h_ansD_trueD = new Howl({urls: ["audio/ansD_trueD.mp3", "audio/ansD_trueD.ogg"],});
    h_bc_1 = new Howl({urls: ["audio/bc_1.mp3", "audio/bc_1.ogg"],});
    h_bd_1 = new Howl({urls: ["audio/bd_1.mp3", "audio/bd_1.ogg"],});
    h_bye = new Howl({urls: ["audio/bye.mp3", "audio/bye.ogg"],});
    h_call = new Howl({urls: ["audio/call.mp3", "audio/call.ogg"],});
    h_cd_2 = new Howl({urls: ["audio/cd_2.mp3", "audio/cd_2.ogg"],});
    h_cheer = new Howl({urls: ["audio/cheer.mp3", "audio/cheer.ogg"],});
    h_DungChoi = new Howl({urls: ["audio/DungChoi.mp3", "audio/DungChoi.ogg"],});
    h_for_qplay = new Howl({urls: ["audio/for_qplay.mp3", "audio/for_qplay.ogg"],});
    h_gofind = new Howl({urls: ["audio/gofind.mp3", "audio/gofind.ogg"],});
    h_gofind1 = new Howl({urls: ["audio/gofind1.mp3", "audio/gofind1.ogg"],});
    h_important = new Howl({urls: ["audio/important.mp3", "audio/important.ogg"],});
    h_khan_gia = new Howl({urls: ["audio/khan_gia.mp3", "audio/khan_gia.ogg"],});
    h_luatchoi = new Howl({urls: ["audio/luatchoi.mp3", "audio/luatchoi.ogg"],});
    h_moc1 = new Howl({urls: ["audio/moc1.mp3", "audio/moc1.ogg"],});
    h_moc2 = new Howl({urls: ["audio/moc2.mp3", "audio/moc2.ogg"],});
    h_moc3 = new Howl({urls: ["audio/moc3.mp3", "audio/moc3.ogg"],});
    h_out_of_time = new Howl({urls: ["audio/out_of_time.mp3", "audio/out_of_time.ogg"],});
    h_pass14 = new Howl({urls: ["audio/pass14.mp3", "audio/pass14.ogg"],});
    h_ques01 = new Howl({urls: ["audio/ques01.mp3", "audio/ques01.ogg"],});
    h_ques02 = new Howl({urls: ["audio/ques02.mp3", "audio/ques02.ogg"],});
    h_ques03 = new Howl({urls: ["audio/ques03.mp3", "audio/ques03.ogg"],});
    h_ques04 = new Howl({urls: ["audio/ques04.mp3", "audio/ques04.ogg"],});
    h_ques05 = new Howl({urls: ["audio/ques05.mp3", "audio/ques05.ogg"],});
    h_ques06 = new Howl({urls: ["audio/ques06.mp3", "audio/ques06.ogg"],});
    h_ques07 = new Howl({urls: ["audio/ques07.mp3", "audio/ques07.ogg"],});
    h_ques08 = new Howl({urls: ["audio/ques08.mp3", "audio/ques08.ogg"],});
    h_ques09 = new Howl({urls: ["audio/ques09.mp3", "audio/ques09.ogg"],});
    h_ques10 = new Howl({urls: ["audio/ques10.mp3", "audio/ques10.ogg"],});
    h_ques11 = new Howl({urls: ["audio/ques11.mp3", "audio/ques11.ogg"],});
    h_ques12 = new Howl({urls: ["audio/ques12.mp3", "audio/ques12.ogg"],});
    h_ques13 = new Howl({urls: ["audio/ques13.mp3", "audio/ques13.ogg"],});
    h_ques14 = new Howl({urls: ["audio/ques14.mp3", "audio/ques14.ogg"],});
    h_ques15 = new Howl({urls: ["audio/ques15.mp3", "audio/ques15.ogg"],});
    h_ready = new Howl({urls: ["audio/ready.mp3", "audio/ready.ogg"],});
    h_sound5050 = new Howl({urls: ["audio/sound5050.mp3", "audio/sound5050.ogg"],});
    h_start = new Howl({urls: ["audio/start.mp3", "audio/start.ogg"],});
    h_ThuaCuoc = new Howl({urls: ["audio/ThuaCuoc.mp3", "audio/ThuaCuoc.ogg"],});
    
	setupGame();
	
    /*createjs.Sound.addEventListener("fileload", handleLoad);
    createjs.Sound.alternateExtensions = ["mp3", "ogg"];
    createjs.Sound.registerManifest(manifest);
    console.log("manifest is registered");*/
    

    function handleLoad(event) {
        console.log("loading sound files");
        counter++;
        preloadText.text = "Loading... " + Math.round((counter + 69) * 100 / 126) + "%";
        stage.update();
        if (counter == NUM_OF_SOUNDS) {
            setupGame();
        }
    }
}