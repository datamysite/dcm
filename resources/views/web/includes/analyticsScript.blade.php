<script type="text/javascript">
   

        function gtag_report_allstore(url) {
          var callback = function () {
            if (typeof(url) != 'undefined') {
              window.location = url;
            }
          };
          gtag('event', 'allstore_view', {
            'button_name': 'myBtn',
            'screen_name': 'Home'
          });
          return false;
        }

        function gtag_report_signin(url) {
          var callback = function () {
            if (typeof(url) != 'undefined') {
              window.location = url;
            }
          };
          gtag('event', 'sign_in', {
            'button_name': 'myBtn',
            'screen_name': 'Home'
          });
          return false;
        }

        function gtag_report_signup(url) {
          var callback = function () {
            if (typeof(url) != 'undefined') {
              window.location = url;
            }
          };
          gtag('event', 'sign_up', {
            'button_name': 'myBtn',
            'screen_name': 'Home'
          });
          return false;
        }
</script>