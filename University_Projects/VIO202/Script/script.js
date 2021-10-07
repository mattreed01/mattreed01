let i = 0;
let muteBool = 0;

let cover = document.getElementById("coverPage");
let p1 = document.getElementById("page1");
let p2 = document.getElementById("page2");
let p3 = document.getElementById("page3");
let audio = document.getElementById("song");
let nxt = document.getElementById("nxtPage");
let prv = document.getElementById("prvPage");
let btn = document.getElementById("start");
let hobby = document.getElementById("hobbies");
let hobbyDesc = document.getElementById("desc");

let t1L = document.getElementById("T1Link");
let t3L = document.getElementById("T3Link");
let rat = document.getElementById("rat");
let pla = document.getElementById("pla");

let mute = document.getElementById("mute");

mute.addEventListener("click", () => {
    if(muteBool === 0)
    {
        audio.volume = 0;
        muteBool = 1;
    }
    else
    {
        audio.volume = 1;
        muteBool = 0;
    }
});

pla.addEventListener("click", () => {
    window.open("./Forms/plagiarismform.pdf");
});

rat.addEventListener("click", () => {
    window.open("./Forms/Rationale.pdf");
});

t1L.addEventListener("click", () => {
    p1.className = "turnLeft";
        p3.style.visibility = "visible";

        setTimeout(() => {
            p1.style.visibility = "hidden";
            p1.className = " ";

            clearTimeout();
        }, 4000);

    i = 2;
});

/*t3L.addEventListener("click", () => {
    p1.className = "turnLeft";

        setTimeout(() => {
            p1.style.visibility = "hidden";
            p1.className = " ";

            clearTimeout();
        }, 4000);
        
    p2.className = "turnLeft";
    
    setTimeout(() => {
        p2.style.visibility = "hidden";
        p2.className = " ";

        clearTimeout();
    }, 4000);

    i = 3;
});*/

nxt.style.visibility = "hidden";
prv.style.visibility = "hidden";

btn.addEventListener("click", () => {
    mute.style.visibility = "visible";
    audio.play();
    i = 1;
    cover.className = "turnLeft";
    setTimeout(() => {
        cover.className = " ";
        cover.style.visibility = "hidden";
        nxt.style.visibility = "visible";
        prv.style.visibility = "visible";
        p1.style.visibility = "visible";
        clearTimeout();
    }, 4000);
});

nxt.addEventListener("click", () => {
    if (i === 1)
    {
        p1.className = "turnLeft";
        p3.style.visibility = "visible";

        setTimeout(() => {
            p1.style.visibility = "hidden";
            p1.className = " ";

            clearTimeout();
        }, 4000);

        i++;
    } 
    else if (i === 2)
    {
        p2.className = "turnLeft";

        setTimeout(() => {
            p2.style.visibility = "hidden";
            p2.className = " ";

            clearTimeout();
        }, 4000);

        i++;
    } 
    else if (i === 3)
    {
        p3.style.zIndex = 10;
        
        p3.className = "turnLeft";
        
        p1.style.visibility = "visible";
        p2.style.visibility = "visible";

        setTimeout(() => {
            p3.style.visibility = "hidden";
            p3.className = " ";
            p3.style.zIndex = -20;

            clearTimeout();
        }, 4000);

        i = 1;
    }
});

prv.addEventListener("click", () => {
    if (i === 1)
    {
        p3.style.visibility = "visible";
        p3.style.zIndex = 10;
        p3.className = "turnRight";

        setTimeout(() => {
            p3.className = " ";
            p1.style.visibility = "hidden";
            clearTimeout();
        }, 4000);

        i = 3;
    } 
    else if (i === 2)
    {
        p3.style.zIndex = -20;
        p1.style.visibility = "visible";
        p1.className = "turnRight";

        setTimeout(() => {
            p1.className = " ";
            p1.style.visibility = "visible";
            clearTimeout();
        }, 4000);

        i--;
    } 
    else if (i === 3)
    {
        p3.style.zIndex = -20;
        p2.style.visibility = "visible";
        p2.className = "turnRight";

        setTimeout(() => {
            p2.className = " ";
            clearTimeout();
        }, 4000);

        i--;
    }
});