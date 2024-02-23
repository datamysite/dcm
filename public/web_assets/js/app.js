$(document).ready(function() {
    $('#loading').css({display: 'none'});
    
    $(window).scroll(function() {
        if ($(document).scrollTop() > 70) {
            $('.navbar').addClass('navbar-shadow');
        }
        else {
            $('.navbar').removeClass('navbar-shadow');
        }
    });

    $('.dropdown-item').click(function(){
      $(".mob-nav .dropdown-menu").removeClass('show');
      $(this).siblings(".dropdown-menu").toggleClass('show');
    });

    $(document).on('click', '.mobile-nav-button', function(){
      $('.tray-item').css({display: 'none'});
      var option = $(this).data('option');
      if(option == 'search'){
        if($(this).hasClass('active')){
          $(this).removeClass("active");
          $('.nav-tray').css({height: '0px'});
          $('.tray-search').css({display: 'none'});
        }else{
          $('.tray-search').css({display: 'block'});
          $('.nav-tray').css({height: '60px'});
          $(".mobile-nav-button").removeClass("active");
          $(this).addClass('active');
        }
      }else if(option == 'emirates'){
        if($(this).hasClass('active')){
          $(this).removeClass("active");
          $('.nav-tray').css({height: '0px'});
          $('.tray-emirates').css({display: 'none'});
        }else{
          $('.tray-emirates').css({display: 'flex'});
          $('.nav-tray').css({height: '60px'});
          $(".mobile-nav-button").removeClass("active");
          $(this).addClass('active');
        }
      }
    });



    //Create Account
    $(document).on('submit', "#create_user_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#create_user_form")[0]);
      $('.errors').css({display: 'none'});
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function(data) {
        if (data.success == 'success') {
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          setTimeout(function(){
            location.reload();
          }, 700);
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      }).fail(function(e){
        for (const [key, value] of Object.entries(e.responseJSON.errors)) {
            $('.'+key+'_error').css({display: 'flex'}).html(value);
        }
      });

      event.preventDefault();
    });



    //Login Account
    $(document).on('submit', "#login_user_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#login_user_form")[0]);
      $('.errors').css({display: 'none'});
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function(data) {
        if (data.success == 'success') {
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          setTimeout(function(){
            location.reload();
          }, 700);
        } else {
          $('.password_error_l').css({display: 'flex'}).html(data.message);
        }
      }).fail(function(e){
        for (const [key, value] of Object.entries(e.responseJSON.errors)) {
            $('.'+key+'_error_l').css({display: 'flex'}).html(value);
        }
      });

      event.preventDefault();
    });




    //Cashback
    $(document).on('submit', "#cashback_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#cashback_form")[0]);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function(data) {
        if (data.success == 'success') {
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          setTimeout(function(){
            location.reload();
          }, 700);
        }
      }).fail(function(e){
        console.log(e);
      });

      event.preventDefault();
    });



    //Settings
    $(document).on('submit', "#settings_update_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#settings_update_form")[0]);
      $('.errors').css({display: 'none'});
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function(data) {
        if (data.success == 'success') {
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          setTimeout(function(){
            location.reload();
          }, 700);
        }else{
          for (const [key, value] of Object.entries(data.message)) {
              $('.'+key+'_error').css({display: 'flex'}).html(value);
          }
        }
      }).fail(function(e){
        for (const [key, value] of Object.entries(e.responseJSON.errors)) {
            $('.'+key+'_error').css({display: 'flex'}).html(value);
        }
      });

      event.preventDefault();
    });
});