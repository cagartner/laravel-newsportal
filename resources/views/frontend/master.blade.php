@inject('settings', 'App\Http\Controllers\HomeController')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="{{$settings->getsettings()->description}}">
<?php
	$keywords_str = '';
	$keywords = $settings->getsettings()->keywords;
	$keywords = explode(' ', $keywords);
	foreach ($keywords as $key => $value) {
		$keywords_str .= $value . ',';
	}

	$url = $_SERVER['REQUEST_URI'];
	$tokens = explode('/', $url);
	$news = $tokens[1];
?>
@if ($news != 'story')
	<meta name="keywords" content="{{$keywords_str}}">
@else
	@yield('meta_keywords')
@endif
<meta name="author" content="INNOFLAME INFORMATION TECHNOLOGY">

<title>{{$settings->getsettings()->name}}</title>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/{{$settings->getsettings()->favicon}}" type="image/x-icon">
    @if(Lang::getLocale() == 'ar')
        <link href="{{ asset('assets/frontend/css/custom-rtl.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
    @endif
@yield('header-content')
</head>
<body>


<!-- wrapper start -->
<div class="wrapper"> 
@include('frontend.regions.header')
@yield('content')
</div>
@include('frontend.regions.footer')
@yield('footer-scripts')
</body>
</html>