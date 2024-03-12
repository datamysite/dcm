var host = $("meta[name='home_url']").attr("content"); 

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

    $(document).on('click','.grap_deal_close_btn', function(){
      $('#ShowCouponModal').modal('hide');
    });

    $('.dropdown-item').click(function(){
      $(".mob-nav .dropdown-menu").removeClass('show');
      $(this).siblings(".dropdown-menu").toggleClass('show');
    });

    $(document).on('focusout', '.mob-main-search', function(){
        setTimeout(function(){         
          $('.mobile-nav-button').removeClass("active");
          $('.nav-tray').css({height: '0px'});
          $('.tray-search').css({display: 'none'});
        }, 500);
    });

    $(document).on('click', '.mobile-nav-button', function(){
      $('.tray-item').css({display: 'none'});
      var option = $(this).data('option');
      if(option == 'search'){
        if($(this).hasClass('active')){
      console.log(option);
          $(this).removeClass("active");
          $('.nav-tray').css({height: '0px'});
          $('.tray-search').css({display: 'none'});
        }else{
          $('.tray-search').css({display: 'block'});
          $('.nav-tray').css({height: '60px'});
          $(".mobile-nav-button").removeClass("active");
          $(this).addClass('active');
          $('.mob-main-search').focus();
        }
      }else if(option == 'emirates'){
        if($(this).hasClass('active')){
          $(this).removeClass("active");
          $('.nav-tray').css({height: '0px'});
          $('.tray-emirates').css({display: 'none'});
        }else{
          $('.tray-emirates').css({display: 'flex'});
          $('.nav-tray').css({height: '65px'});
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

    //Forgot Password
    $(document).on('submit', "#forgotPasswordForm", function(event) {
      var form = $(this);
      var formData = new FormData($("#forgotPasswordForm")[0]);
      $('.errors').css({display: 'none'});
      $('.btn-content').html($('.sub-btn').html());
      $('.sub-btn').html('<img src="../public/loader.gif" style="width:14px; margin:0 25px;">').prop("disabled", true);;
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
          $('.sub-btn').html($('.btn-content').html()).prop("disabled", false);;
          $('.email_error_f').css({display: 'flex'}).html(data.message);
        }
      }).fail(function(e){
        $('.sub-btn').html($('.btn-content').html()).prop("disabled", false);;
        for (const [key, value] of Object.entries(e.responseJSON.errors)) {
            $('.'+key+'_error_f').css({display: 'flex'}).html(value);
        }
      });

      event.preventDefault();
    });


    //Forgot Password
    $(document).on('submit', "#resetPasswordForm", function(event) {
      var form = $(this);
      var formData = new FormData($("#resetPasswordForm")[0]);
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
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          setTimeout(function(){
            window.location.href = host;
          }, 700);
      }).fail(function(e){
        console.log(e);
        for (const [key, value] of Object.entries(e.responseJSON.errors)) {
            $('.'+key+'_error').css({display: 'flex'}).html(value+"<br>");
        }
      });

      event.preventDefault();
    });

});