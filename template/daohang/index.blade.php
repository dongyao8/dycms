<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="viggo" />
    <title>DYCMS - 内容导航第一站，人人都是生活的导航者</title>
    <meta name="keywords" content="网址导航">
    <meta name="description" content="DYCMS -  内容导航第一站，人人都是生活的导航者">
    <link rel="shortcut icon" href="{{url('/static/dycms/')}}/images/favicon.ico">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="{{url('/static/daohang/')}}//assets/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="{{url('/static/daohang/')}}//assets/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/static/daohang/')}}//assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{url('/static/daohang/')}}//assets/css/xenon-core.css">
    <link rel="stylesheet" href="{{url('/static/daohang/')}}//assets/css/xenon-components.css">
    <link rel="stylesheet" href="{{url('/static/daohang/')}}//assets/css/xenon-skins.css">
    <link rel="stylesheet" href="{{url('/static/daohang/')}}//assets/css/nav.css">
    <script src="{{url('/static/daohang/')}}/assets/js/jquery-1.11.1.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="page-body">
    <!-- skin-white -->
    <div class="page-container">
        <div class="sidebar-menu toggle-others fixed">
            <div class="sidebar-menu-inner">
                <header class="logo-env">
                    <!-- logo -->
                    <div class="logo">
                        <a href="{{url('/')}}" class="logo-expanded">
                            <img src="{{url('/static/dycms/')}}/images/logo2.png" width="100%" alt="" />
                        </a>
                        <a href="index.html" class="logo-collapsed">
                            <img src="{{url('/static/dycms/')}}/images/favicon.ico" width="40" alt="" />
                        </a>
                    </div>
                    <div class="mobile-menu-toggle visible-xs">
                        <a href="#" data-toggle="user-info-menu">
                            <i class="linecons-cog"></i>
                        </a>
                        <a href="#" data-toggle="mobile-menu">
                            <i class="fa-bars"></i>
                        </a>
                    </div>
                </header>
                <ul id="main-menu" class="main-menu">
                    @foreach($navs as $nav)
                    <li>

                        @if(count($nav->children) > 0)
                        <a>
                            <!-- <i class="linecons-star"></i> -->
                            <span class="title">{{$nav->title}}</span>
                        </a>
                        <ul>
                            <li>
                                <a href="#{{$nav->id}}" class="smooth">
                                    <span class="title">{{$nav->title}}</span>
                                </a>
                            </li>
                            @foreach($nav->children as $nc)
                            <li>
                                <a href="#{{$nc->id}}" class="smooth">
                                    <span class="title">{{$nc->title}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <a href="#{{$nav->id}}" class="smooth">
                            <!-- <i class="linecons-star"></i> -->
                            <span class="title">{{$nav->title}}</span>
                        </a>
                        @endif
                    </li>
                    @endforeach

                    <!-- <li>
                        <a href="#UED团队" class="smooth">
                            <i class="linecons-user"></i>
                            <span class="title">UED团队</span>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a href="about.html">
                            <i class="linecons-heart"></i>
                            <span class="tooltip-blue">关于本站</span>
                            <span class="label label-Primary pull-right hidden-collapsed">♥︎</span>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
        <div class="main-content">
            <nav class="navbar user-info-navbar" role="navigation">
                <!-- User Info, Notifications and Menu Bar -->
                <!-- Left links for user info navbar -->
                <ul class="user-info-menu left-links list-inline list-unstyled">
                    <li class="hidden-sm hidden-xs">
                        <a href="#" data-toggle="sidebar">
                            <i class="fa-bars"></i>
                        </a>
                    </li>
                    <!-- <li class="dropdown hover-line language-switcher">
                        <a href="../cn/index.html" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{url('/static/daohang/')}}/assets/images/flags/flag-cn.png" alt="flag-cn" /> Chinese
                        </a>
                        <ul class="dropdown-menu languages">
                            <li>
                                <a href="../en/index.html">
                                    <img src="{{url('/static/daohang/')}}/assets/images/flags/flag-us.png" alt="flag-us" /> English
                                </a>
                            </li>
                            <li class="active">
                                <a href="../cn/index.html">
                                    <img src="{{url('/static/daohang/')}}/assets/images/flags/flag-cn.png" alt="flag-cn" /> Chinese
                                </a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
                <ul class="user-info-menu right-links list-inline list-unstyled">
                    <li class="hidden-sm hidden-xs">
                        <a href="https://github.com/dongyao8/dycms" target="_blank">
                            <i class="fa-github"></i> GitHub
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- 常用推荐 -->

            @foreach($navs as $n)
            <h4 class="text-gray"><i class="linecons-tag" style="margin-right: 7px;" id="{{$n->id}}"></i>{{$n->title}}</h4>
            <div class="row">
                @foreach($n->navigation as $site)
                <div class="col-sm-3">
                    <div class="xe-widget xe-conversations box2 label-info" onclick="window.open('{{$site->url}}', '_blank')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{$site->title}}">
                        <div class="xe-comment-entry">
                            <a class="xe-user-img">
                                @if($site->cover=="default.jpg" || $site->cover=="")
                                <img data-src="{{$main->siteurl($site->url)}}/favicon.ico" loading="lazy" class="lozad img-circle" width="40">
                                @else
                                <img data-src="{{url('/')}}{{Storage::url($site->cover)}}" loading="lazy" class="lozad img-circle" width="40">
                                @endif
                            </a>
                            <div class="xe-comment">
                                <a href="#" class="xe-user-name overflowClip_1">
                                    <strong>{{$site->title}}</strong>
                                </a>
                                <p class="overflowClip_2">{{$site->desc}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
            
            
            <!-- Main Footer -->
            <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
            <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
            <!-- Or class "fixed" to  always fix the footer to the end of page -->
            <footer class="main-footer sticky footer-type-1">
                <div class="footer-inner">
                    <!-- Add your copyright text here -->
                    <div class="footer-text">
                        &copy; DYCMS
                        <a href="../cn/about.html"><strong>强力驱动</strong></a> 前端design by <a href="https://www.viggoz.com" target="_blank"><strong>Viggo</strong></a>
                        <!--  - Purchase for only <strong>23$</strong> -->
                    </div>
                    <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                    <div class="go-up">
                        <a href="#" rel="go-top">
                            <i class="fa-angle-up"></i>
                        </a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- 锚点平滑移动 -->
    <script type="text/javascript">
        $(document).ready(function() {
            //img lazy loaded
            const observer = lozad();
            observer.observe();

            $(document).on('click', '.has-sub', function() {
                var _this = $(this)
                if (!$(this).hasClass('expanded')) {
                    setTimeout(function() {
                        _this.find('ul').attr("style", "")
                    }, 300);

                } else {
                    $('.has-sub ul').each(function(id, ele) {
                        var _that = $(this)
                        if (_this.find('ul')[0] != ele) {
                            setTimeout(function() {
                                _that.attr("style", "")
                            }, 300);
                        }
                    })
                }
            })
            $('.user-info-menu .hidden-sm').click(function() {
                if ($('.sidebar-menu').hasClass('collapsed')) {
                    $('.has-sub.expanded > ul').attr("style", "")
                } else {
                    $('.has-sub.expanded > ul').show()
                }
            })
            $("#main-menu li ul li").click(function() {
                $(this).siblings('li').removeClass('active'); // 删除其他兄弟元素的样式
                $(this).addClass('active'); // 添加当前元素的样式
            });
            $("a.smooth").click(function(ev) {
                ev.preventDefault();

                public_vars.$mainMenu.add(public_vars.$sidebarProfile).toggleClass('mobile-is-visible');
                ps_destroy();
                $("html, body").animate({
                    scrollTop: $($(this).attr("href")).offset().top - 30
                }, {
                    duration: 500,
                    easing: "swing"
                });
            });
            return false;
        });

        var href = "";
        var pos = 0;
        $("a.smooth").click(function(e) {
            $("#main-menu li").each(function() {
                $(this).removeClass("active");
            });
            $(this).parent("li").addClass("active");
            e.preventDefault();
            href = $(this).attr("href");
            pos = $(href).position().top - 30;
        });
    </script>
    <!-- Bottom Scripts -->
    <script src="{{url('/static/daohang/')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{url('/static/daohang/')}}/assets/js/TweenMax.min.js"></script>
    <script src="{{url('/static/daohang/')}}/assets/js/resizeable.js"></script>
    <script src="{{url('/static/daohang/')}}/assets/js/joinable.js"></script>
    <script src="{{url('/static/daohang/')}}/assets/js/xenon-api.js"></script>
    <script src="{{url('/static/daohang/')}}/assets/js/xenon-toggles.js"></script>
    <!-- JavaScripts initializations and stuff -->
    <script src="{{url('/static/daohang/')}}/assets/js/xenon-custom.js"></script>
    <script src="{{url('/static/daohang/')}}/assets/js/lozad.js"></script>
</body>

</html>