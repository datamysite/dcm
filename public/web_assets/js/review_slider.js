$(document).ready(function () {
  "use strict"

  $('#slider-reviews').slick({
      infinite: !0,
      slidesToShow: 3,
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
          settings: { slidesToShow: 3, slidesToScroll: 3 },
        },
        {
          breakpoint: 990,
          settings: { slidesToShow: 3, slidesToScroll: 1 },
        },
        {
          breakpoint: 480,
          settings: { slidesToShow: 1, slidesToScroll: 1 },
        },
      ],
      prevArrow:
        '<span class="slick-prev"><</span>',
      nextArrow:
        '<span class="slick-next">></span>',
    });


});