
const blog_toggle_btn = document.getElementById("blogTogglebtn");
const blog_toggle_tray = document.getElementById("retailerBlogs");
blog_toggle_btn.addEventListener('click', () => {
   blog_toggle_tray.classList.toggle("active");
});



const close_token_modal = document.getElementById("close_token_modal");
close_token_modal.addEventListener('click', () => {
   token_modal.style.display = 'none';
});

const token_modal = document.getElementById("ShowCouponModal");
const token_modal_block = document.getElementsByClassName("grap_deal_main")[0];
document.querySelectorAll('.showCoupon').forEach( button => {
    button.onclick = function () {
    	var id = button.getAttribute('data-id');
    	var loader = button.getAttribute('data-loader');
    	token_modal_block.innerHTML = '<amp-img src="'+loader+'" layout="fixed" width="60px" height="60px"></amp-img>';
    	token_modal.style.display = 'block';

    	var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		       token_modal_block.innerHTML =  xhttp.responseText;
		    }
		};
		xhttp.open("GET", host+"/coupon/"+id, true);
		xhttp.send();
    }
});

document.querySelectorAll('.showOffer').forEach( button => {
    button.onclick = function () {
    	var id = button.getAttribute('data-id');
    	var loader = button.getAttribute('data-loader');
    	token_modal_block.innerHTML = '<amp-img src="'+loader+'" layout="fixed" width="60px" height="60px"></amp-img>';
    	token_modal.style.display = 'block';
    	token_modal_block.style.marginTop = "33px";
    	var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		       token_modal_block.innerHTML =  xhttp.responseText;
		    }
		};
		xhttp.open("GET", host+"/offers/"+id, true);
		xhttp.send();
    }
});
