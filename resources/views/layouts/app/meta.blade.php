<meta charset="UTF-8">
<!-- For IE -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- For Resposive Device -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title',config('app.name'))</title>

<meta name="token" content="{{ csrf_token() }}">
<!-- for Google -->
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keyword')" />
<meta name="author" content="www.mrsadiq.info | Sadiq Məmmədov" />
<meta name="theme-color" content="#1d1d1d">
<!-- for Facebook -->
<meta property="og:title" content='@yield('title',config('app.name'))'>
<meta property="og:url" content="{{ config('app.url') }}">
<meta property="og:image" content="@yield('image','/app/img/logo-dark.png')" />
<meta property="og:image:width"  content="@yield('imagew','200')">
<meta property="og:image:height" content="@yield('imageh','200')">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:type" content="article" />
<meta property="og:description" content='@yield('description')' />
<meta name="author" content="www.mrsadiq.info | Sadiq Məmmədov">
<meta property="fb:admins" content="100003660630015"/>

<!-- for Twitter -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{ config('app.name') }}" />
<meta name="twitter:description" content="@yield('description')" />
<meta name="twitter:image" content="http://mrsadiq.info/style/images/ogimage.jpg" />
<meta name="twitter:url" content="{{ config('app.name') }}">
<meta name="twitter:domain" content="{{ config('app.name') }}">
<meta name="twitter:creator" content="@mrsadiq">

<!-- for Mobile-->
<meta name="MobileOptimized"  content="width">
<meta name="HandheldFriendly" content="true">
<meta name="format-detection" content="telephone=no">
<meta name="revisit-after"    content="1 days">

<meta name="mobile-web-app-capable"                content="yes">
<meta name="apple-mobile-web-app-capable"          content="yes">
<meta name="apple-touch-fullscreen"                content="yes">

<!-- for Robots -->
<meta name="robots"    content="all">
<meta name="googlebot" content="index, follow, archive">
<meta name="yahoobot"  content="index, follow, archive">
<meta name="alexabot"  content="index, follow, archive">
<meta name="msnbot"    content="index, follow, archive">
<meta name="dmozbot"   content="index, follow, archive">

<meta name="audience"     content="all">
<meta name="distribution" content="global">
<meta name="rating"       content="General">

<meta name="generator" content="http://mrsadiq.info">
<meta name="web_author" content="MrSadiq.info">
<meta name="designer" content="http://mrsadiq.info">

<!-- DNS Prefetch -->
<link rel="dns-prefetch" href="{{ config('app.url') }}">
<link rel="dns-prefetch" href="https://www.youtube.com">
<link rel="dns-prefetch" href="https://www.facebook.com">
<link rel="dns-prefetch" href="https://www.twitter.com">
<link rel="dns-prefetch" href="https://plus.google.com">
<link rel="dns-prefetch" href="https://https://vk.com">
<link rel="dns-prefetch" href="//www.google-analytics.com">

<!-- Favicon -->
<link rel="apple-touch-icon" href="/app/img/logo/favicon.ico" sizes="180x180">
<link rel="icon" type="image/png" href="/app/img/logo/favicon.ico" sizes="32x32">
<link rel="icon" type="image/png" href="/app/img/logo/favicon.ico" sizes="16x16">