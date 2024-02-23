<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Libs JS -->
<script src="{{URL::to('/public')}}/web_assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{URL::to('/public')}}/web_assets/libs/simplebar/dist/simplebar.min.js"></script>
<!-- Theme JS -->
<script src="{{URL::to('/public')}}/web_assets/js/theme.min.js"></script>
<script src="{{URL::to('/public')}}/web_assets/js/vendors/jquery.min.js"></script>
<script src="{{URL::to('/public')}}/web_assets/js/vendors/countdown.js"></script>
<script src="{{URL::to('/public')}}/web_assets/libs/slick-carousel/slick/slick.min.js"></script>
<script src="{{URL::to('/public')}}/web_assets/js/vendors/slick-slider.js"></script>
<script src="{{URL::to('/public')}}/web_assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="{{URL::to('/public')}}/web_assets/js/vendors/tns-slider.js"></script>
<script src="{{URL::to('/public')}}/web_assets/js/vendors/zoom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

    $(document).on('keyup', '.main-search', function(){
      $('.main-search-result').html("<img src='{{URL::to('/public/loader-gif.gif')}}' height='25px'/>");
      var val = $(this).val();
      $.get("{{URL::to('/search')}}/"+val, function(data){
         $('.main-search-result').html(data);
      });
    });


  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000
  });
</script>
<script src="{{URL::to('/public')}}/web_assets/js/app.js"></script>
<script>
  const signUpButton = document.getElementsByClassName("signUp")[0];
  const signInButton = document.getElementsByClassName("signIn")[0];
  const signUpCon = document.getElementsByClassName("sign-up-modal_container")[0];
  const signUpButton2 = document.getElementsByClassName("signUp")[1];
  const signInButton2 = document.getElementsByClassName("signIn")[1];
  const modal_container = document.getElementById("modal_container");

  signUpButton.addEventListener("click", () => {
     modal_container.classList.add("right-panel-active");
     signInButton.classList.remove('act');
     signUpButton.classList.add('act');
     signUpCon.style.zIndex = "999";

  });

  signInButton.addEventListener("click", () => {
     modal_container.classList.remove("right-panel-active");
     signUpButton.classList.remove('act');
     signInButton.classList.add('act');
     signUpCon.style.zIndex = "1";
  });

  signUpButton2.addEventListener("click", () => {
     modal_container.classList.add("right-panel-active");
  });

  signInButton2.addEventListener("click", () => {
     modal_container.classList.remove("right-panel-active");
  });

  window.addEventListener("load", function() {
     setTimeout(function() {
        //new bootstrap.Modal(document.getElementById("modal-subscribe")).show();
     }, 1000);
  });
</script>