/*=============================Intro Animation================================*/
var inst = document.getElementById("instruction");
var head = document.getElementById("top");
var foot = document.getElementById("bottom");
var bod = document.getElementById("left");
var vid = document.getElementById("right");
var audio = document.getElementById("song");
audio.volume = 0;

document.addEventListener("click", start);

function start()
{
    inst.style.visibility = "hidden";
    inst.style.zIndex = "-99999999999999999999999";
    
    head.className = "introActive";
    foot.className = "introActive";
    bod.className = "introActive";
    audio.play();

    var timer = setTimeout(endIntro, 5000);
    var audioTimer = setTimeout(playSongFullVolume, 5000);
    var interval = setInterval(increaseVolume, 1000);

    function increaseVolume()
    {
        audio.volume += 0.2;
    }

    function playSongFullVolume()
    {
        clearInterval(interval);
        clearTimeout(audioTimer);
    }

    function endIntro()
    {
        head.className = " ";
        foot.className = " ";
        bod.className = " ";
        document.removeEventListener("click", start);
        clearTimeout(timer);
    }
}
/*=============================Intro Animation================================*/

/*==================================Sound=====================================*/
var isPlaying = true;

document.addEventListener("keydown", mute);

function mute(event)
{
    var keycode = event.keyCode;

    if (keycode == "32")
    {
        if (isPlaying)
        {
            audio.volume = 0;
            isPlaying = false;
        } else
        {
            audio.volume = 1;
            isPlaying = true;
        }
    }
}
/*==================================Sound=====================================*/

/*===============================TransitionTo=================================*/

var button = document.getElementById("btnToVideo");

button.addEventListener("click", changeScreen);

function changeScreen()
{
    head.className = "transition";
    foot.className = "transition";
    bod.className = "transition";

    var decreaseVolume = setInterval(function () {
        audio.volume -= 0.2;
    }, 1000);

    var minVolume = setTimeout(function () {
        audio.volume = 0;
        clearInterval(decreaseVolume);
        clearTimeout(minVolume);
    }, 5000);

    var transitionToTimer = setTimeout(stopTransitionTo, 5000);

    function stopTransitionTo()
    {
        head.className = "introActive";
        foot.className = "introActive";
        bod.className = "introActive";
        bod.style.visibility = "hidden";
        vid.style.visibility = "visible";
        clearTimeout(transitionToTimer);

        setTimeout(function () {
            head.className = " ";
            foot.className = " ";
            bod.className = " ";
            vid.play();
            clearTimeout();
        }, 5000);
    }

    var backHome = setTimeout(toHome, 69500);

    function toHome()
    {
        head.className = "transition";
        foot.className = "transition";
        bod.className = "transition";

        setTimeout(function () {
            head.className = "introActive";
            foot.className = "introActive";
            bod.className = "introActive";
            vid.style.visibility = "hidden";
            bod.style.visibility = "visible";

            vid.pause();
            vid.currentTime = 0;
            clearTimeout(backHome);

            setTimeout(function () {
                head.className = " ";
                foot.className = " ";
                bod.className = " ";
                clearTimeout();
            }, 5000);

            var ivol = setInterval(function () {
                audio.volume += 0.2;
            }, 1000);

            var fulvol = setTimeout(function () {
                audio.volume = 1;
                clearInterval(ivol);
                clearTimeout(fulvol);
            }, 5000);
        }, 5000);
    }
}


/*===============================TransitionTo=================================*/

var flag = document.getElementById("flag");

var rat = document.getElementById("rationale");

rat.addEventListener("click", () => {
    window.open("Rationale.pdf");
});

var plag = document.getElementById("plagform");

plag.addEventListener("click", () => {
    window.open("plagiarismform.pdf");
});

rat.onmouseover = () => {
    flag.innerHTML = "Rationale";
    flag.style.visibility = "visible";
}

rat.onmouseout = () => {
    flag.innerHTML = "";
    flag.style.visibility = "hidden";
}

plag.onmouseover = () => {
    flag.innerHTML = "Plagiarism Form";
    flag.style.visibility = "visible";
}

plag.onmouseout = () => {
    flag.innerHTML = "";
    flag.style.visibility = "hidden";
}
