var signupForm = document.getElementById("signup");
var loginForm = document.getElementById("login");

var signupbutton = document.getElementById("subtn");
var loginbutton = document.getElementById("libtn");

signupbutton.addEventListener("click", () => {
    signupForm.className = "formsheet moveout";
    loginForm.className = "formsheet movein";
    
    setTimeout(()=>{
        signupForm.className = "formsheet outview";
        loginForm.className = "formsheet";
        clearTimeout();
    }, 3000);
});

loginbutton.addEventListener("click", () => {
    signupForm.className = "formsheet movein";
    loginForm.className = "formsheet moveout";
    
    setTimeout(()=>{
        signupForm.className = "formsheet";
        loginForm.className = "formsheet outview";
        clearTimeout();
    }, 3000);
});