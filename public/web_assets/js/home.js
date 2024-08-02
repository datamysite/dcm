var host = $("meta[name='home_url']").attr("content");
var lazyload2 = 0;
$(document).ready(function () {
  "use strict";

    $(".hero-slider").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,autoplay:!0,dots:!0,arrows:!1});
    $("#hcategory-slider").slick({infinite: true, slidesToShow: 6, slidesToScroll: 1, autoplay: true, dots: false, arrows: true, prevArrow: '<span class="slick-prev"><</span>', nextArrow: '<span class="slick-next">></span>', responsive: [{breakpoint: 1400, settings: {slidesToShow: 4, slidesToScroll: 4}}, {breakpoint: 820, settings: {slidesToShow: 4, slidesToScroll: 1}}, {breakpoint: 480, settings: {slidesToShow: 4, slidesToScroll: 1}}]});
    $("#slider-second").slick({infinite: true, slidesToShow: 5, slidesToScroll: 1, autoplay: true, dots: false, arrows: true, speed: 1e3, loop: true, adaptiveHeight: true, responsive: [{breakpoint: 1400, settings: {slidesToShow: 4, slidesToScroll: 4}}, {breakpoint: 990, settings: {slidesToShow: 3, slidesToScroll: 1}}, {breakpoint: 480, settings: {slidesToShow: 2, slidesToScroll: 1}}], prevArrow: '<span class="slick-prev"><</span>', nextArrow: '<span class="slick-next">></span>', appendArrows: "#slider-second-arrows"});
    $("#slider-fourth").slick({infinite: true, slidesToShow: 5, slidesToScroll: 1, autoplay: true, dots: false, arrows: true, speed: 1e3, loop: true, adaptiveHeight: true, responsive: [{breakpoint: 1400, settings: {slidesToShow: 4, slidesToScroll: 4}}, {breakpoint: 990, settings: {slidesToShow: 3, slidesToScroll: 1}}, {breakpoint: 480, settings: {slidesToShow: 2, slidesToScroll: 1}}], prevArrow: '<span class="slick-prev"><</span>', nextArrow: '<span class="slick-next">></span>', appendArrows: "#slider-fourth-arrows"});
  /*$.get(host + "/home/getcategories", function (s) {
    $("#hcategory-slider").html(s);
  });
  $.get(host + "/home/getOnlineStores", function (s) {
    $("#slider-second").html(s);
  });*/
});
$(window).scroll(function (s) {
  let e = $(window).scrollTop();
  if (lazyload2 == 0 && e > 500) {
    console.log(e);
    $.get(host + "/home/getRetailStores", function (s) {
      $("#slider-third").html(s);
      $("#slider-third").slick({infinite: true, slidesToShow: 5, slidesToScroll: 1, autoplay: true, dots: false, arrows: true, speed: 1e3, loop: true, adaptiveHeight: true, responsive: [{breakpoint: 1400, settings: {slidesToShow: 4, slidesToScroll: 4}}, {breakpoint: 990, settings: {slidesToShow: 3, slidesToScroll: 1}}, {breakpoint: 480, settings: {slidesToShow: 2, slidesToScroll: 1}}], prevArrow: '<span class="slick-prev"><</span>', nextArrow: '<span class="slick-next">></span>', appendArrows: "#slider-third-arrows"});
    });
    $.get(host + "/home/getAllStores", function (s) {
      $("#allstores-section").html(s);
    });
    lazyload2 = 1;
  }
});
