<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
	  <a class="navbar-brand brand-logo" href="{{ url('admin/home') }}">
		<img src="{{asset('static/admin')}}/assets/images/logo.svg" alt="logo" /> </a>
	  <a class="navbar-brand brand-logo-mini" href="index.html">
		<img src="{{asset('static/admin')}}/assets/images/logo-mini.svg" alt="logo" /> </a>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-center">
	  <ul class="navbar-nav">
		<li class="nav-item font-weight-semibold d-none d-lg-block">{{ $sys_info->web_desc }} <a href="#" class="btn btn-info">清理缓存</a></li>
	  </ul>
	  <ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
		  <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
			<img class="img-xs rounded-circle" src="{{asset('static/admin')}}/assets/images/faces/face8.jpg" alt="Profile image"> </a>
		  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
			<div class="dropdown-header text-center">
			  <img class="img-md rounded-circle" src="{{asset('static/admin')}}/assets/images/faces/face8.jpg" alt="Profile image">
			  <p class="mb-1 mt-3 font-weight-semibold">管理员</p>
			  <p class="font-weight-light text-muted mb-0">欢迎访问</p>
			</div>
			<a class="dropdown-item">管理首页<i class="dropdown-item-icon ti-dashboard"></i></a>
			<a class="dropdown-item">信息中心<i class="dropdown-item-icon ti-comment-alt"></i></a>
			<a class="dropdown-item">用户操作<i class="dropdown-item-icon ti-location-arrow"></i></a>
			<a class="dropdown-item">帮助中心<i class="dropdown-item-icon ti-help-alt"></i></a>
			<a class="dropdown-item">退出登录<i class="dropdown-item-icon ti-power-off"></i></a>
		  </div>
		</li>
	  </ul>
	  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
		<span class="mdi mdi-menu"></span>
	  </button>
	</div>
  </nav>