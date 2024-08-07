<link href="{{URL::to('/public')}}/web_assets/libs/slick-carousel/slick/slick.css" rel="stylesheet" />
<link href="{{URL::to('/public')}}/web_assets/libs/slick-carousel/slick/slick-theme.css" rel="stylesheet" />

<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="{{URL::to('/public')}}/web_assets/images/logo/dcm-logo-r.png" />

<!-- Libs CSS -->
<link href="{{URL::to('/public')}}/web_assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet" />
<link href="{{URL::to('/public')}}/web_assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet" />

<!-- Theme CSS -->
@if ( app()->getLocale() == 'ar' )
	<link rel="stylesheet" href="{{URL::to('/public')}}/web_assets/css/theme-ar.min.css" />
@else
	<link rel="stylesheet" href="{{URL::to('/public')}}/web_assets/css/theme.min.css" />
@endif

<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@if ( app()->getLocale() == 'ar' )
<link href="{{URL::to('/public')}}/web_assets/css/style-ar.css" rel="stylesheet" />
@else
<link href="{{URL::to('/public')}}/web_assets/css/style.css" rel="stylesheet" />
@endif
@if ( app()->getLocale() == 'ar' )
<link href="{{URL::to('/public')}}/web_assets/css/user-profile-menu-ar.css" rel="stylesheet" />
@else
<link href="{{URL::to('/public')}}/web_assets/css/user-profile-menu.css" rel="stylesheet" />
@endif
