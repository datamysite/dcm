const blog_toggle_btn = document.getElementById("blogTogglebtn");
const blog_toggle_tray = document.getElementById("retailerBlogs");
blog_toggle_btn.addEventListener('click', () => {
   blog_toggle_tray.classList.toggle("active");
});