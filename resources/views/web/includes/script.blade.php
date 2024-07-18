<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Libs JS -->
<script src="{{URL::to('/public')}}/web_assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Theme JS -->
<script src="{{URL::to('/public')}}/web_assets/js/theme.min.js"></script>
<script src="{{URL::to('/public')}}/web_assets/libs/slick-carousel/slick/slick.min.js"></script>
<script src="{{URL::to('/public')}}/web_assets/js/slider.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   // User Profile JS functions Start

   $(document).ready(function() {
      $('#myTable').DataTable();
   });
</script>
<script>
   function verifyFileType() {

      var file_type_is_valid;
      var file_extension_not_allowed;

      if (window.location.pathname.includes('/ar') || window.location.pathname.startsWith('/ar/')) {

         file_type_is_valid = 'يمكنك رفع الملف الان';
         file_extension_not_allowed = 'نوع الملف او الحجم غير مناسب !';
      } else {
         file_type_is_valid = 'File type is valid.';
         file_extension_not_allowed = 'File extension or size not allowed !';
      }


      const div_1 = document.getElementById("div_1");
      const div_2 = document.getElementById("div_2");

      var fileInput = document.getElementById('file-input');
      var file = fileInput.files[0];
      if (file) {
         var fileType = file.type;
         var fileSize = file.size;
         if ((fileType === 'application/pdf' || fileType === 'image/png' || fileType === 'image/jpg' || fileType === 'image/jpeg') && fileSize <= 3 * 1024 * 1024) {
            // Valid file type
            document.getElementById('success_message').textContent = file_type_is_valid;
            div_1.style.display = "block";
         } else {
            // Invalid file type
            document.getElementById('error_message').textContent = file_extension_not_allowed;
            div_2.style.display = "block";
            div_1.style.display = "none";
            // Reset the file input
            fileInput.value = null;
         }
      } else {
         // No file selected
         document.getElementById('message').textContent = "No file selected.";
      }
   }

   function closeWelcomeMessage() {
      
      var welcomeMsgDiv = document.querySelector('.MobileWelcomeMSG');
      var WebsiteWelcomeMSG = document.querySelector('.WebsiteWelcomeMSG');
      welcomeMsgDiv.style.display = 'none';
      WebsiteWelcomeMSG.style.display = 'none';

      var xhr = new XMLHttpRequest();
      xhr.open('GET', "{{route('cancelWelcomeMsg', [$region])}}", true);
      xhr.setRequestHeader('Content-Type', 'application/json');
      // xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
      xhr.onreadystatechange = function() {
         if (xhr.readyState === 4 && xhr.status === 200) {
            sessionStorage.setItem('welcomeMessageShown', 'true');
         }
      };
      xhr.send();
   
   // Check if the welcome message should be hidden
   if (sessionStorage.getItem('welcomeMessageShown')) {
      document.getElementById('welcomeMessageDiv').style.display = 'none';
   }

}

//Remove/Hide Stripe on click and Margin MwebSlider to top //

/*
const MWebPopUPMSG = document.querySelector('.MWebPopUPMSG');
var MwebSlider = document.querySelector('.MwebSlider');

   document.addEventListener('click', function(event) {
      if (!MWebPopUPMSG.contains(event.target)) {
         MWebPopUPMSG.style.display = 'none';
         MwebSlider.style.marginTop = '4rem';
         MwebSlider.style.setProperty('margin-top', '4rem', 'important');
      }
   });
*/
  
   window.onload = function() {
      var url = window.location.href;
      var claimCashbackMenuItem = document.querySelector('a[href*="claimCashback"]').parentNode;

      if (url.includes('claimCashback')) {
         claimCashbackMenuItem.classList.add('active');
         claimCashbackMenuItem.classList.add('first-order');
         claimCashbackMenuItem.focus();
      } else {
         claimCashbackMenuItem.classList.remove('active');
         claimCashbackMenuItem.classList.remove('first-order');
      }
   };

   // User Profile JS functions End
</script>

<script type="text/javascript">
   $(document).on('keyup', '.main-search', function() {
      var val = $(this).val();
      if (val != '') {
         $('.main-search-result').html("<img src='{{URL::to('/public/loader-gif.gif')}}' height='25px'/>");
         $.get("{{URL::to('/'.app()->getLocale().'/search')}}/" + val, function(data) {
            $('.main-search-result').html(data);
         });
      } else {
         $('.main-search-result').html("");
      }
   });

   $(document).on('keyup', '.mob-main-search', function() {
      var val = $(this).val();
      if (val != '') {
         $('.mob-main-search-result').html("<img src='{{URL::to('/public/loader-gif.gif')}}' height='25px'/>");
         $.get("{{URL::to('/'.app()->getLocale().'/search')}}/" + val, function(data) {
            $('.nav-tray').css({
               overflow: 'visible'
            });
            $('.mob-main-search-result').html(data);
         });
      } else {
         $('.mob-main-search-result').html("");
         $('.nav-tray').css({
            overflow: 'hidden'
         });
      }
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