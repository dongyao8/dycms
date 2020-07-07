<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="description" content="{{ $sys_info->web_desc }}">
    <script src="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <link rel="icon" href="{{asset('static/index')}}/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('static/index')}}/favicon.ico" />
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>@yield('title',$sys_info->web_title)---{{ $sys_info->web_desc }}</title>
    <script src="{{asset('static/index')}}/assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: "{{asset('static/index')}}"
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
    <script src="{{asset('static/index')}}/assets/js/dashboard.js"></script>
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
  <style>
.card-header {
    min-height: 0;
}
body {
    /* background:url(https://cn.bing.com/th?id=OHR.SurfSeason_ZH-CN9212464908_1920x1080.jpg); */
    font-weight: 500;
}
</style>
  <body class="">
    <div class="page">
      <div class="flex-fill">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="{{ url('/') }}">
                <img src="{{asset('uploads')}}/{{ $sys_info->web_logo }}" class="header-brand-img" alt="tabler logo">
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <!-- <div class="nav-item d-none d-md-flex">
                  <a href="https://github.com/tabler/tabler" class="btn btn-sm btn-outline-primary" target="_blank">广告按钮</a>
                </div> -->
                <!-- 消息通知 -->
                <!-- <div class="dropdown d-none d-md-flex">
                  <a class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-bell"></i>
                    <span class="nav-unread"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url({{asset('static/index')}}/demo/faces/male/41.jpg)"></span>
                      <div>
                        <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                        <div class="small text-muted">10 minutes ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url({{asset('static/index')}}/demo/faces/female/1.jpg)"></span>
                      <div>
                        <strong>Alice</strong> started new task: Tabler UI design.
                        <div class="small text-muted">1 hour ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url({{asset('static/index')}}/demo/faces/female/18.jpg)"></span>
                      <div>
                        <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                        <div class="small text-muted">2 hours ago</div>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-center">Mark all as read</a>
                  </div>
                </div> -->
                
                @if (Route::has('login'))
                    @auth
                    <div class="dropdown">
                        <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                            <!-- 随机头像 -->
                            <span class="avatar" style="background-image: url({{asset('uploads')}}/{{ Auth::user()->avatar }})"></span>
                            <span class="ml-2 d-none d-lg-block">
                            <span class="text-default">{{ Auth::user()->name }}</span>
                            <small class="text-black d-block mt-1">欢迎使用</small>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ url('/home') }}">
                            <i class="dropdown-icon fe fe-user"></i> 个人中心
                            </a>
                            <!-- <a class="dropdown-item" href="#">
                            <i class="dropdown-icon fe fe-settings"></i> 设置
                            </a> -->
                            <!-- <a class="dropdown-item" href="#">
                            <span class="float-right"><span class="badge badge-primary">6</span></span>
                            <i class="dropdown-icon fe fe-mail"></i> Inbox
                            </a> -->
                            <a class="dropdown-item" href="#">
                            <i class="dropdown-icon fe fe-send"></i> 我的消息
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                            <i class="dropdown-icon fe fe-help-circle"></i> 帮助中心
                            </a>
                            <a class="dropdown-item" href="{{ url('gout') }}">
                            <i class="dropdown-icon fe fe-log-out"></i> 退出登录
                            </a>
                        </div>
                        </div>
                    @else
                        <div class="dropdown">
                        <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                            <!-- 随机头像 -->
                            <span class="avatar" style="background-image: url({{asset('uploads')}}/head_img/user.png)"></span>
                            <span class="ml-2 d-none d-lg-block">
                            <span class="text-default">游客用户</span>
                            <small class="text-default d-block mt-1">欢迎使用</small>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('login') }}">
                            <i class="dropdown-icon fe fe-user"></i> 登录
                            </a>
                            <a class="dropdown-item" href="{{ route('reg') }}">
                            <i class="dropdown-icon fe fe-send"></i> 注册
                            </a>
                        </div>
                        </div>
                    @endauth
            @endif
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        @include('index.common.menu')
        <div class="my-3 my-md-5">
            @yield('content')
        </div>
      </div>
      
      @include('index.common.footer')
    </div>
  </body>
</html>