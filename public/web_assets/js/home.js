var host = $("meta[name='home_url']").attr("content"); 
var lazyload = 0;

$(document).ready(function(){
	'use strict'

	//Get Categories
	$.get(host+'/home/getcategories', function(data){

		$('#hcategory-slider').html(data);

		$('#hcategory-slider').slick({
	          infinite: !0,
	          slidesToShow: 6,
	          slidesToScroll: 1,
	          autoplay: !0,
	          dots: !1,
	          arrows: !0,
	          prevArrow:
	            '<span class="slick-prev"><i class="feather-icon icon-chevron-left"></i></span>',
	          nextArrow:
	            '<span class="slick-next"><i class="feather-icon icon-chevron-right"></i></span>',
	          responsive: [
	            {
	              breakpoint: 1400,
	              settings: { slidesToShow: 4, slidesToScroll: 4 },
	            },
	            {
	              breakpoint: 820,
	              settings: { slidesToShow: 4, slidesToScroll: 1 },
	            },
	            {
	              breakpoint: 480,
	              settings: { slidesToShow: 4, slidesToScroll: 1 },
	            },
	          ]
		});
	});

	

	//Get Online Stores
	$.get(host+'/home/getOnlineStores', function(data){

		$('#slider-second').html(data);

		  $('#slider-second').slick({
		          infinite: !0,
		          slidesToShow: 5,
		          slidesToScroll: 1,
		          autoplay: !0,
		          dots: !1,
		          arrows: !0,
		          speed: 1e3,
		          loop: !0,
		          adaptiveHeight: !0,
		          responsive: [
		            {
		              breakpoint: 1400,
		              settings: { slidesToShow: 4, slidesToScroll: 4 },
		            },
		            {
		              breakpoint: 990,
		              settings: { slidesToShow: 3, slidesToScroll: 1 },
		            },
		            {
		              breakpoint: 480,
		              settings: { slidesToShow: 2, slidesToScroll: 1 },
		            },
		          ],
		          prevArrow:
		            '<span class="slick-prev"><i class="feather-icon icon-chevron-left"></i></span>',
		          nextArrow:
		            '<span class="slick-next"><i class="feather-icon icon-chevron-right"></i></span>',
		          appendArrows: "#slider-second-arrows",
		    });
	});

});

$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if(lazyload == 0 && scroll > 500){


		//Get Retail Stores
		$.get(host+'/home/getRetailStores', function(data){

			$('#slider-third').html(data);

			  $('#slider-third').slick({
			          infinite: !0,
			          slidesToShow: 5,
			          slidesToScroll: 1,
			          autoplay: !0,
			          dots: !1,
			          arrows: !0,
			          speed: 1e3,
			          loop: !0,
			          adaptiveHeight: !0,
			          responsive: [
			            {
			              breakpoint: 1400,
			              settings: { slidesToShow: 4, slidesToScroll: 4 },
			            },
			            {
			              breakpoint: 990,
			              settings: { slidesToShow: 3, slidesToScroll: 1 },
			            },
			            {
			              breakpoint: 480,
			              settings: { slidesToShow: 2, slidesToScroll: 1 },
			            },
			          ],
			          prevArrow:
			            '<span class="slick-prev"><i class="feather-icon icon-chevron-left"></i></span>',
			          nextArrow:
			            '<span class="slick-next"><i class="feather-icon icon-chevron-right"></i></span>',
			          appendArrows: "#slider-third-arrows",
			    });
		});



		//Get Retail Stores
		$.get(host+'/home/getAllStores', function(data){

			$('#allstores-section').html(data);

		});

    	lazyload = 1;
    }
});