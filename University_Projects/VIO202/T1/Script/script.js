let doors = document.getElementById("doors");
let black = document.getElementById("black");
let bg = document.getElementById("bg");
let cloud = document.getElementById("cloud");

let bg2 = document.getElementById("bg2");
let hs = document.getElementById("hotspots");
let germ = document.getElementById("germ");
let text = document.getElementById("chalk");

let p3 = document.getElementById("bg3");
let p3pen = document.getElementById("pencil");

let p4 = document.getElementById("bg4");

let p5 = document.getElementById("bg5");
let p5Students = document.getElementById("p5Students");
let p5Door = document.getElementById("p5Door");

let p6 = document.getElementById("bg6");

let p7 = document.getElementById("bg7");
let p7Lbc = document.getElementById("lbc");
let p7Lbo = document.getElementById("lbo");
let p7S1 = document.getElementById("s1");
let p7S2 = document.getElementById("s2");
let p7S3 = document.getElementById("s3");
let p7S4 = document.getElementById("s4");

let p10 = document.getElementById("bg10");
let p11 = document.getElementById("bg11");

doors.addEventListener("click", () => {
	doors.style.visibility = "hidden";
        black.className = "scale";
	setTimeout(()=>{
		black.style.visibility = "hidden";
                black.className = " ";
		cloud.style.visibility = "hidden";
		bg.style.visibility = "hidden";
                

		bg2.style.visibility = "visible";
		hs.style.visibility = "visible";
		text.style.visibility = "visible";
	}, 2000);
});



hs.addEventListener("click", () => {
	germ.style.visibility = "visible";
        germ.className = "moveGerm";
    
        setTimeout(() => {
            germ.className = "scale";
        },3000);

	setTimeout(()=>{
		hs.style.visibility = "hidden";
		germ.style.visibility = "hidden";
		bg2.style.visibility = "hidden";
		text.style.visibility = "hidden";

		p3.style.visibility = "visible";
		p3pen.style.visibility = "visible";
	}, 5000);
});

p3.addEventListener("click", () => {
	p3pen.style.visibility = "hidden";
	p3.style.visibility = "hidden";

	p4.style.visibility = "visible";
});

p4.addEventListener("click", () => {
	p4.style.visibility = "hidden";

	p5.style.visibility = "visible";
	p5Students.style.visibility = "visible";
	p5Door.style.visibility = "visible";
});

p5Door.addEventListener("click", () => {
	p5Door.style.visibility = "hidden";

	setTimeout(() => {
		p5Students.style.visibility = "hidden";
	}, 1000);

	setTimeout(() => {
		p5.style.visibility = "hidden";
		p6.style.visibility = "visible";
	}, 1500);
});

p6.addEventListener("click", () => {
	p6.style.visibility = "hidden";
	p7.style.visibility = "visible";
	p7Lbc.style.visibility = "visible";
});

p7Lbc.addEventListener("click", () => {
	p7Lbc.style.visibility = "hidden";
	p7Lbo.style.visibility = "visible";
	p7S1.style.visibility = "visible";
});

p7S1.addEventListener("click", () => {
	p7S1.style.visibility = "hidden";
	p7S2.style.visibility = "visible";
});

p7S2.addEventListener("click", () => {
	p7S2.style.visibility = "hidden";
	p7S3.style.visibility = "visible";
});

p7S3.addEventListener("click", () => {
	p7S3.style.visibility = "hidden";
	p7S4.style.visibility = "visible";
});

p7S4.addEventListener("click", () => {
    p7S4.style.visibility = "hidden";
    p10.style.visibility = "visible";
});

p10.addEventListener("click", () => {
    p10.style.visibility = "hidden";
    p11.style.visibility = "visible";
});