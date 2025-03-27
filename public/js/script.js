var loginBtn = document.getElementById('loginBtn');
var registerBtn = document.getElementById('registerBtn');
var loginF = document.getElementById('login');
var registerF = document.getElementById('register');

function login() {
    loginF.style.left ="5px";
    registerF.style.left ="520px";
    loginBtn.className += " white-btn";
    registerBtn.className = "btn";
    loginF.style.opacity = 1;
    registerF.style.opacity = 0;
}

function register() {
    loginF.style.left ="-510px";
    registerF.style.left ="5px";
    loginBtn.className = "btn";
    registerBtn.className += " white-btn";
    loginF.style.opacity = 0;
    registerF.style.opacity = 1;
}

function myMenuFunction(){
    var i = document.getElementById("navMenu");

    if(i.className === 'nav-menu'){
        i.className += ' responsive';
    } else {
        i.className = 'nav-menu';
    }
}