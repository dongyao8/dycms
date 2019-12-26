<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>后台管理</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('static/admin')}}/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('static/admin')}}/assets/vendors/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="{{asset('static/admin')}}/assets/vendors/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="{{asset('static/admin')}}/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('static/admin')}}/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{asset('static/admin')}}/assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('static/admin')}}/assets/css/shared/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('static/admin')}}/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <form action="" method="post">
                @csrf
                  <div class="form-group">
                    <label class="label">用户名</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Username" name="name">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">密码</label>
                    <div class="input-group">
                      <input type="password" class="form-control" placeholder="*********" name="password">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block">登录</button>
                    @include('admin.common.error')
                    @include('admin.common.success')
                  </div>
                </form>
              </div>
              <ul class="auth-footer">
                <li>
                  <a href="#">Conditions</a>
                </li>
                <li>
                  <a href="#">Help</a>
                </li>
                <li>
                  <a href="#">Terms</a>
                </li>
              </ul>
              <p class="footer-text text-center">copyright © 2020 Clark. All rights reserved.</p>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('static/admin')}}/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{asset('static/admin')}}/assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{asset('static/admin')}}/assets/js/shared/off-canvas.js"></script>
    <script src="{{asset('static/admin')}}/assets/js/shared/misc.js"></script>
    <!-- endinject -->
  </body>
</html>