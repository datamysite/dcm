<link rel="stylesheet" href="{{URL::to('/public')}}/web_assets/libs/slick-carousel/slick/slick.css"/>
<link rel="stylesheet"  href="{{URL::to('/public')}}/web_assets/libs/slick-carousel/slick/slick-theme.css"/>
<link rel="shortcut icon" type="image/x-icon" href="{{URL::to('/public')}}/web_assets/images/logo/dcm-logo-r.png" />
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins'>
@if ( app()->getLocale() == 'ar' )
	<link rel="stylesheet" href="{{URL::to('/public')}}/web_assets/css/theme-ar.min.css" />
@else
	<link rel="stylesheet" href="{{URL::to('/public')}}/web_assets/css/theme.min.css" />
@endif
<script async src="https://cdn.ampproject.org/v0.js"></script>
<!-- <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script> -->
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