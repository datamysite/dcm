const filter_btn = document.getElementById("offcanvasCategorybtn");
const filter_close_btn = document.getElementById("filter_btn_close");
const filter_tray = document.getElementById("offcanvasCategory");

filter_btn.addEventListener('click', () => {
   filter_tray.classList.toggle("show");
});
filter_close_btn.addEventListener('click', () => {
   filter_tray.classList.toggle("show");
});