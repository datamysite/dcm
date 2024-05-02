const host = document.getElementById('home_url').value;

const btn = document.getElementsByClassName('navbar-toggler')[0];
const closebtn = document.getElementsByClassName('menu-close')[0];
const navbar = document.getElementsByClassName("offcanvas-start")[0];

const navbar_tray = document.getElementsByClassName("nav-tray")[0];
const navbar_tray_search = document.getElementsByClassName("tray-search")[0];
const navbar_tray_emirates = document.getElementsByClassName("tray-emirates")[0];

btn.addEventListener('click', () => {
   navbar.classList.toggle("show");
});

closebtn.addEventListener('click', () => {
   navbar.classList.remove("show");
});

const signinbtn = document.getElementsByClassName('signInModal')[0];
signinbtn.addEventListener('click', () => {
   signInModalOpen();
});

function signInModalOpen(){
   const modal = document.getElementById("userModal");
   modal.style.display = "block";
}


const search_btn = document.getElementById('search_tray_btn');
search_btn.addEventListener('click', () => {
   navbar_tray_emirates.classList.remove("active");
   if(navbar_tray.classList.contains('active') && navbar_tray_search.classList.contains('active') == false){
      navbar_tray.classList.remove("active");
   }
   navbar_tray.classList.toggle("active");
   navbar_tray_search.classList.toggle("active");
});

const emirates_btn = document.getElementById('emirates_tray_btn');
emirates_btn.addEventListener('click', () => {
   navbar_tray_search.classList.remove("active");
   if(navbar_tray.classList.contains('active') && navbar_tray_emirates.classList.contains('active') == false){
      navbar_tray.classList.remove("active");
   }
   navbar_tray.classList.toggle("active");
   navbar_tray_emirates.classList.toggle("active");
});

const signin_btn = document.getElementById('signIn');
const signup_btn = document.getElementById('signUp');
const modal_container = document.getElementById('modal_container');
signup_btn.addEventListener('click', () => {
   signin_btn.classList.remove('active');
   signup_btn.classList.add('active');
   modal_container.style.transform = "translateX(-51%)";
});
signin_btn.addEventListener('click', () => {
   signup_btn.classList.remove('active');
   signin_btn.classList.add('active');
   modal_container.style.transform = "translateX(0%)";
});


const navbar_tray_search_field = document.getElementById('navbar_tray_search_field');
const navbar_tray_search_result = document.getElementById('navbar_tray_search_result');
navbar_tray_search_field.addEventListener('keyup', () => {
   var t = navbar_tray_search_field.value;
   var loader = navbar_tray_search_field.getAttribute('data-loader');
    if (t == "") {
      navbar_tray_search_result.innerHTML = '';
      navbar_tray.style.overflow = 'hidden';
    } else {
      navbar_tray_search_result.innerHTML = "<amp-img src='"+loader+"' layout='fixed' width='100px' height='25px'></amp-img>";
      navbar_tray.style.overflow = 'visible';
      
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
             navbar_tray_search_result.innerHTML =  xhttp.responseText;
          }
      };
      xhttp.open("GET", host+"/search/"+t+"?m=1", true);
      xhttp.send();
    }
});

const form = document.getElementById('create_user_form');
form.addEventListener('submit', (event) => {
    event.preventDefault();
   
   var data = new FormData(form);
   for (var [key, value] of data) {
       console.log(key, value)
   }
});