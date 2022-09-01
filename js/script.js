// ScrollReveal().reveal('.aboutImage', { delay: 500 });
// ScrollReveal().reveal('.aboutPara', { delay: 1300 });
let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');



formBtn.addEventListener('click', () =>{
    loginForm.classList.add('active');
});


formClose.addEventListener('click', () =>{
    loginForm.classList.remove('active');
});

var card =document.getElementById("cardi");
function openRegister(){
    card.style.transform = "rotateY(-180deg)";
}

function openLogin(){
    card.style.transform = "rotateY(0deg)";
}
//Javacript for responsive navigation menu
const menuBtn = document.querySelector(".menu-btn");
const navigation = document.querySelector(".navigation");

menuBtn.addEventListener("click", () => {
    menuBtn.classList.toggle("active");
    navigation.classList.toggle("active");
});




