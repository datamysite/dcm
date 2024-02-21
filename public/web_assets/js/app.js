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
            window.location.href = window.location.href;
          }, 1000);
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
            window.location.href = window.location.href;
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
});