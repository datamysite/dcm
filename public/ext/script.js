
var host = $("meta[name='host_name']").attr("content");
const enhomeSection = document.getElementById('en-homeSection');
const encouponSection = document.getElementById('en-couponSection');
const arhomeSection = document.getElementById('ar-homeSection');
const arcouponSection = document.getElementById('ar-couponSection');
const curr_url = document.getElementById('curr_url').value;

fetchHomeRetailers_en(curr_url);
fetchHomeRetailers_ar(curr_url);

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
           brandHTML += "<div class='col-4'><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' target='_blank'><div class='brand-img'><p>Upto: <span>"+record['brands'][k]['discount_upto']+"%</span> Off</p><img src='https://dealsandcouponsmena.ae/public/storage/retailers/"+record['brands'][k]['logo']+"'/></div></a></div>"
        
            for(var j in record['brands'][k]['coupons']) {
           couponHTML += "<div class='col-12'><div class='brand-img'><p>Flat: <span>"+record['brands'][k]['coupons'][j]['discount']+"<font>%</font></span> Off</p><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' target='_blank'><img src='https://dealsandcouponsmena.ae/public/storage/retailers/"+record['brands'][k]['logo']+"'/></a> <h4>"+record['brands'][k]['coupons'][j]['heading']+"</h4><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' class='show-coupon-btn button has-code' target='_blank'><span class='is-code'>DCM</span><span class='is-code-text'><em>Show Coupon</em></span></a></div></div>"
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

async function fetchHomeRetailers_en(url) {
    var para = "";
    if(url != 'chrome' && url != "dealsandcouponsmena.com"){
        para = "/"+url;
    }

    const res=await fetch (host+"api/ext/home/getRetailers/9"+para);
    const record=await res.json();
    var brandHTML = "<div class='row'>";
    var couponHTML = "<div class='row'>";

    for(var k in record['brands']) {
       brandHTML += "<div class='col-4'><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' target='_blank'><div class='brand-img'><p>Upto: <span>"+record['brands'][k]['discount_upto']+"%</span> Off</p><img src='https://dealsandcouponsmena.ae/public/storage/retailers/"+record['brands'][k]['logo']+"'/></div></a></div>"
    
        for(var j in record['brands'][k]['coupons']) {
           couponHTML += "<div class='col-12'><div class='brand-img'><p>Flat: <span>"+record['brands'][k]['coupons'][j]['discount']+"<font>%</font></span> Off</p><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' target='_blank'><img src='https://dealsandcouponsmena.ae/public/storage/retailers/"+record['brands'][k]['logo']+"'/></a> <h4>"+record['brands'][k]['coupons'][j]['heading']+"</h4><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' class='show-coupon-btn button has-code' target='_blank'><span class='is-code'>DCM</span><span class='is-code-text'><em>Show Coupon</em></span></a></div></div>"
        }
    }
    brandHTML += "</div>"
    enhomeSection.innerHTML = brandHTML;


    couponHTML += "</div>"
    encouponSection.innerHTML = couponHTML;
    
}

async function fetchHomeRetailers_ar(url) {
    var para = "";
    if(url != 'chrome' && url != "dealsandcouponsmena.com"){
        para = "/"+url;
    }

    const res=await fetch (host+"api/ext/home/getRetailers/9"+para);
    const record=await res.json();
    var brandHTML = "<div class='row'>";
    var couponHTML = "<div class='row'>";

    for(var k in record['brands']) {
       brandHTML += "<div class='col-4'><a href='"+host+"ar/dubai/store/"+record['brands'][k]['slug']+"' target='_blank'><div class='brand-img'><p>Upto: <span>"+record['brands'][k]['discount_upto']+"%</span> Off</p><img src='https://dealsandcouponsmena.ae/public/storage/retailers/ar/"+record['brands'][k]['ar_logo']+"'/></div></a></div>"
    
        for(var j in record['brands'][k]['coupons']) {
           couponHTML += "<div class='col-12'><div class='brand-img'><p>تخفيض: <span>"+record['brands'][k]['coupons'][j]['discount']+"<font>%</font></span></p><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' target='_blank'><img src='https://dealsandcouponsmena.ae/public/storage/retailers/ar/"+record['brands'][k]['ar_logo']+"'/></a> <h4>"+record['brands'][k]['coupons'][j]['heading_ar']+"</h4><a href='"+host+"en/dubai/store/"+record['brands'][k]['slug']+"' class='show-coupon-btn button has-code' target='_blank'><span class='is-code'>DCM</span><span class='is-code-text'><em>أظهر القسيمة</em></span></a></div></div>"
        }
    }
    brandHTML += "</div>"
    arhomeSection.innerHTML = brandHTML;


    couponHTML += "</div>"
    arcouponSection.innerHTML = couponHTML;
    
}


document.getElementById("en-brandTab").addEventListener("click", function(){
   
  if (this.classList.contains("active")) {
  } else {
    this.classList.add('active');
    document.getElementById('en-couponTab').classList.remove('active');
    document.getElementById('en-brands').classList.add('active');
    document.getElementById('en-coupons').classList.remove('active');
  }
});
document.getElementById("en-couponTab").addEventListener("click", function(){
   
  if (this.classList.contains("active")) {
  } else {
    this.classList.add('active');
    document.getElementById('en-brandTab').classList.remove('active');
    document.getElementById('en-coupons').classList.add('active');
    document.getElementById('en-brands').classList.remove('active');
  }
});

document.getElementById("ar-brandTab").addEventListener("click", function(){
   
  if (this.classList.contains("active")) {
  } else {
    this.classList.add('active');
    document.getElementById('ar-couponTab').classList.remove('active');
    document.getElementById('ar-brands').classList.add('active');
    document.getElementById('ar-coupons').classList.remove('active');
  }
});
document.getElementById("ar-couponTab").addEventListener("click", function(){
   
  if (this.classList.contains("active")) {
  } else {
    this.classList.add('active');
    document.getElementById('ar-brandTab').classList.remove('active');
    document.getElementById('ar-coupons').classList.add('active');
    document.getElementById('ar-brands').classList.remove('active');
  }
});

