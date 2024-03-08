$(document).ready(function () {
  "use strict"

  $('.hero-slider').slick({
        infinite: !0,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: !0,
        dots: !0,
        arrows: !1,
    });


    $('.category-slider').slick({
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