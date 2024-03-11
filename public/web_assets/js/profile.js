$(document).ready(function(){

	
    //Email Verification
    $(document).on('submit', "#verify_email_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#verify_email_form")[0]);
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
            icon: 'warning',
            title: data.message
          });
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