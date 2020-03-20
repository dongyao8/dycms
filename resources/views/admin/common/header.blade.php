<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title',$sys_info->web_title)---后台管理</title>
<!-- plugins:css -->
<link rel="stylesheet" href="{{asset('static/admin')}}/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="{{asset('static/admin')}}/assets/vendors/iconfonts/ionicons/css/ionicons.css">
<link rel="stylesheet" href="{{asset('static/admin')}}/assets/vendors/iconfonts/typicons/src/font/typicons.css">
<link rel="stylesheet" href="{{asset('static/admin')}}/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="{{asset('static/admin')}}/assets/vendors/css/vendor.bundle.base.css">
<!-- 手机适应 -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('static/admin')}}/assets/vendors/css/vendor.bundle.addons.css">
<!-- endinject -->
<!-- plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{asset('static/admin')}}/assets/css/shared/style.css">
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="{{asset('static/admin')}}/assets/css/demo_1/style.css">
<!-- End Layout styles -->
<link rel="shortcut icon" href="{{asset('static/admin')}}/assets/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  @include('admin.common.top')
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
	<!-- partial:partials/_sidebar.html -->
	@include('admin.common.menu')
	<!-- partial -->
	<div class="main-panel">
    @yield('content')
	  <!-- partial:partials/_footer.html -->
	  @include('admin.common.footer')
	  <!-- partial -->
	</div>
	<!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('static/admin')}}/assets/vendors/js/vendor.bundle.base.js"></script>
<script src="{{asset('static/admin')}}/assets/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('static/admin')}}/assets/js/shared/off-canvas.js"></script>
<script src="{{asset('static/admin')}}/assets/js/shared/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('static/admin')}}/assets/js/demo_1/dashboard.js"></script>
<!-- End custom js for this page-->
</body>
</html>