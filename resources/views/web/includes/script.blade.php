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
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000
  });
</script>
<script src="{{URL::to('/public')}}/web_assets/js/app.js"></script>
<script>
  const signUpButton = document.getElementById("signUp");
  const signInButton = document.getElementById("signIn");
  const modal_container = document.getElementById("modal_container");

  signUpButton.addEventListener("click", () => {
     modal_container.classList.add("right-panel-active");
  });

  signInButton.addEventListener("click", () => {
     modal_container.classList.remove("right-panel-active");
  });

  window.addEventListener("load", function() {
     setTimeout(function() {
        //new bootstrap.Modal(document.getElementById("modal-subscribe")).show();
     }, 1000);
  });
</script>