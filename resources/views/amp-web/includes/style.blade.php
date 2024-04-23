<link rel="stylesheet" href="{{URL::to('/public')}}/web_assets/libs/slick-carousel/slick/slick.css"/>
<link rel="stylesheet"  href="{{URL::to('/public')}}/web_assets/libs/slick-carousel/slick/slick-theme.css"/>
<link rel="shortcut icon" type="image/x-icon" href="{{URL::to('/public')}}/web_assets/images/logo/dcm-logo-r.png" />
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins'>
@if ( app()->getLocale() == 'ar' )
	<link rel="stylesheet" href="{{URL::to('/public')}}/web_assets/css/theme-ar.min_amp.css" />
@else
	<link rel="stylesheet" href="{{URL::to('/public')}}/web_assets/css/theme.min_amp.css" />
@endif
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-script" src="https://cdn.ampproject.org/v0/amp-script-0.1.js"></script>
 <meta
    name="amp-script-src"
    content="sha384-YsM3ypHm0ggSSir6kuKl064hq6E0K_7esi9NeIOxfVqkKLgshY0dYBTdEBvB5UYx"
  >
<style amp-custom>
	.navbar .dropdown .dropdown-toggle:after {
		content: ">";
		font-weight: 700;
	}
	.hero-slider .slick-dots {
	    display: none;
	}
	.nav-link {
		color: #000;
	}
	.mt-85{
		margin-top: 85px;
	}
<?php
	$style_link = app()->getLocale() == 'ar' ? '/web_assets/css/style-ar.css' : '/web_assets/css/style.css'; 
	$css_links = [
		URL::to('/public'.$style_link),
	];

	foreach ($css_links as $key => $value) {
		$css = file_get_contents($value);
		// Remove comments
		 $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
		 // Remove spaces before and after selectors, braces, and colons
		 $css = preg_replace('/\s*([{}|:;,])\s+/', '$1', $css);
		 // Remove remaining spaces and line breaks
		 $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    ', '!important'), '',$css);

		echo $css;

		echo " ";
	}

?>
</style>
<style amp-boilerplate>
  body {
    -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
    -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
    -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
    animation: -amp-start 8s steps(1, end) 0s 1 normal both;
  }
  @-webkit-keyframes -amp-start {
    from {
      visibility: hidden;
    }
    to {
      visibility: visible;
    }
  }
  @-moz-keyframes -amp-start {
    from {
      visibility: hidden;
    }
    to {
      visibility: visible;
    }
  }
  @-ms-keyframes -amp-start {
    from {
      visibility: hidden;
    }
    to {
      visibility: visible;
    }
  }
  @-o-keyframes -amp-start {
    from {
      visibility: hidden;
    }
    to {
      visibility: visible;
    }
  }
  @keyframes -amp-start {
    from {
      visibility: hidden;
    }
    to {
      visibility: visible;
    }
  }
</style>
<noscript>
	<style amp-boilerplate>
        body {
          -webkit-animation: none;
          -moz-animation: none;
          -ms-animation: none;
          animation: none;
        }
     </style>
 </noscript>