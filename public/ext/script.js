
const host = "https://dealsandcouponsmena.com/";
const homeSection = document.getElementById('homeSection');
const couponSection = document.getElementById('couponSection');
const curr_url = document.getElementById('curr_url').value;

fetchHomeRetailers(curr_url);

document.getElementById("mainSearch").addEventListener("keyup", function(){
    findRetailers(this.value);
});


async function findRetailers(val) {
    homeSection.innerHTML = '<img class="loader" src="'+host+'public/ext-loader.gif">';
    couponSection.innerHTML = '<img class="loader" src="'+host+'public/ext-loader.gif">';
    if(val != '' && val != ' '){
        const res=await fetch (host+"api/ext/home/findRetailer/"+val);
        const record=await res.json();
        var brandHTML = "<div class='row'>";
        var couponHTML = "<div class='row'>";

        for(var k in record['brands']) {
           brandHTML += "<div class='col-4'><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' target='_blank'><div class='brand-img'><p>Upto: <span>"+record['brands'][k]['discount_upto']+"%</span> Off</p><img src='"+host+"public/storage/retailers/"+record['brands'][k]['logo']+"'/></div></a></div>"
        
            for(var j in record['brands'][k]['coupons']) {
           couponHTML += "<div class='col-12'><div class='brand-img'><p>Flat: <span>"+record['brands'][k]['coupons'][j]['discount']+"<font>%</font></span> Off</p><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' target='_blank'><img src='"+host+"public/storage/retailers/"+record['brands'][k]['logo']+"'/></a> <h4>"+record['brands'][k]['coupons'][j]['heading']+"</h4><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' class='show-coupon-btn button has-code' target='_blank'><span class='is-code'>DCM</span><span class='is-code-text'><em>Show Coupon</em></span></a></div></div>"
            }
        }
        brandHTML += "</div>"
        homeSection.innerHTML = brandHTML;


        couponHTML += "</div>"
        couponSection.innerHTML = couponHTML;
    }else{
        fetchHomeRetailers("chrome");
    }

}

async function fetchHomeRetailers(url) {
    var para = "";
    if(url != 'chrome' && url != "dealsandcouponsmena.com"){
        para = "/"+url;
    }

    const res=await fetch (host+"api/ext/home/getRetailers/9"+para);
    const record=await res.json();
    var brandHTML = "<div class='row'>";
    var couponHTML = "<div class='row'>";

    for(var k in record['brands']) {
       brandHTML += "<div class='col-4'><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' target='_blank'><div class='brand-img'><p>Upto: <span>"+record['brands'][k]['discount_upto']+"%</span> Off</p><img src='"+host+"public/storage/retailers/"+record['brands'][k]['logo']+"'/></div></a></div>"
    
        for(var j in record['brands'][k]['coupons']) {
           couponHTML += "<div class='col-12'><div class='brand-img'><p>Flat: <span>"+record['brands'][k]['coupons'][j]['discount']+"<font>%</font></span> Off</p><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' target='_blank'><img src='"+host+"public/storage/retailers/"+record['brands'][k]['logo']+"'/></a> <h4>"+record['brands'][k]['coupons'][j]['heading']+"</h4><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' class='show-coupon-btn button has-code' target='_blank'><span class='is-code'>DCM</span><span class='is-code-text'><em>Show Coupon</em></span></a></div></div>"
        }
    }
    brandHTML += "</div>"
    homeSection.innerHTML = brandHTML;


    couponHTML += "</div>"
    couponSection.innerHTML = couponHTML;
    
}


document.getElementById("brandTab").addEventListener("click", function(){
   
  if (this.classList.contains("active")) {
  } else {
    this.classList.add('active');
    document.getElementById('couponTab').classList.remove('active');
    document.getElementById('brands').classList.add('active');
    document.getElementById('coupons').classList.remove('active');
  }
});
document.getElementById("couponTab").addEventListener("click", function(){
   
  if (this.classList.contains("active")) {
  } else {
    this.classList.add('active');
    document.getElementById('brandTab').classList.remove('active');
    document.getElementById('coupons').classList.add('active');
    document.getElementById('brands').classList.remove('active');
  }
});
