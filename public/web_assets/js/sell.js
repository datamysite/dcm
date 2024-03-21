$(document).ready(function() {


    $(".phoneMask").inputmask({"mask": "+\\971999999999"});

    //Sell With DCM
    $(document).on('submit', "#lead_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#lead_form")[0]);
      $('.errors').css({display: 'none'});
      $('.lead-loader').css({display: 'flex'});
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
        } else {
          Toast.fire({
            icon: 'warning',
            title: data.message
          });
        }
        $('.lead-loader').css({display: 'none'});

        setTimeout(function(){
            location.reload();
          }, 1000);

      }).fail(function(e){
        $('.lead-loader').css({display: 'none'});
        for (const [key, value] of Object.entries(e.responseJSON.errors)) {
            $('.'+key+'_error').css({display: 'flex'}).html(value);
        }
      });

      event.preventDefault();
    });

});