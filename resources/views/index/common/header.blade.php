<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="description" content="{{ $sys_info->web_desc }}">
    <meta name="keywords" content="网站导航,绿色安全,内容导航,开源无弹窗">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{asset('static/index')}}/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('static/index')}}/favicon.ico" />
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>@yield('title',$sys_info->web_title)---{{ $sys_info->web_desc }}</title>
    <script src="{{asset('static/index')}}/assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?99ad7b257ee6f3dc4cba600abd1700ff";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
    <!-- Dashboard Core -->
    <link href="{{asset('static/index')}}/assets/css/dashboard.css" rel="stylesheet" />
    <!-- <script src="{{asset('static/index')}}/assets/js/dashboard.js"></script> -->
    <!-- c3.js Charts Plugin -->
    <!-- <link href="{{asset('static/index')}}/assets/plugins/charts-c3/plugin.css" rel="stylesheet" /> -->
    <!-- <script src="{{asset('static/index')}}/assets/plugins/charts-c3/plugin.js"></script> -->
    <!-- Google Maps Plugin -->
    <!-- <link href="{{asset('static/index')}}/assets/plugins/maps-google/plugin.css" rel="stylesheet" /> -->
    <!-- <script src="{{asset('static/index')}}/assets/plugins/maps-google/plugin.js"></script> -->
    <!-- Input Mask Plugin -->
    <!-- <script src="{{asset('static/index')}}/assets/plugins/input-mask/plugin.js"></script> -->
    <!-- Datatables Plugin -->
    <!-- <script src="{{asset('static/index')}}/assets/plugins/datatables/plugin.js"></script> -->
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
            @yield('content')
        </div>
        </div>
      </div>
    </div>
    @include('index.common.footer')
  </body>
</html>