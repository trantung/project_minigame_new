function getSounds() {
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

    createjs.Sound.addEventListener("fileload", handleLoad);
    createjs.Sound.alternateExtensions = ["mp3", "ogg"];
    createjs.Sound.registerManifest(manifest);
    console.log("manifest is registered");

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