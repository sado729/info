<meta charset="UTF-8">
<!-- For IE -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- For Resposive Device -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>@yield('title',config('app.name'))</title>
<!-- for Google -->
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keyword')" />
<meta name="author" content="www.mrsadiq.info | Sadiq Məmmədov" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- for Facebook -->
<meta property="og:title" content='@yield('title',config('app.name'))'>
<meta property="og:url" content="http://mrsadiq.info/">
<meta property="og:image" content="" />
<meta property="og:image:width"  content="200">
<meta property="og:image:height" content="200">
<meta property="og:site_name" content="azerisiq">
<meta property="og:type" content="article" />
<meta property="og:description" content='@yield('description')' />
<meta name="author" content="www.mrsadiq.info | Sadiq Məmmədov">
<meta property="fb:admins" content="100003660630015"/>


<!-- for Twitter -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="Azerisiq" />
<meta name="twitter:description" content="@yield('description')" />
<meta name="twitter:image" content="http://mrsadiq.info/style/images/ogimage.jpg" />
<meta name="twitter:url" content="azerisiq">
<meta name="twitter:domain" content="azerisiq">
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
<meta name="robots"    content="noodp, noydir, noindex, nofollow, noarchive">
<meta name="googlebot" content="noodp, noydir, noindex, nofollow, noarchive">
<meta name="yahoobot"  content="noodp, noydir, noindex, nofollow, noarchive">
<meta name="alexabot"  content="noodp, noydir, noindex, nofollow, noarchive">
<meta name="msnbot"    content="noodp, noydir, noindex, nofollow, noarchive">
<meta name="dmozbot"   content="noodp, noydir, noindex, nofollow, noarchive">

<meta name="audience"     content="all">
<meta name="distribution" content="global">
<meta name="rating"       content="General">

<meta name="generator" content="http://mrsadiq.info">
<meta name="web_author" content="MrSadiq.info">
<meta name="designer" content="http://mrsadiq.info">

<!-- DNS Prefetch -->
<link rel="dns-prefetch" href="">
<link rel="dns-prefetch" href="https://www.youtube.com">
<link rel="dns-prefetch" href="https://www.facebook.com">
<link rel="dns-prefetch" href="https://www.twitter.com">
<link rel="dns-prefetch" href="https://plus.google.com">
<link rel="dns-prefetch" href="https://https://vk.com">
<link rel="dns-prefetch" href="//www.google-analytics.com">