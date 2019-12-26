<div class="col-lg-3">
                <div class="card card-profile">
                  <div class="card-header" style="background-image: url({{asset('static/index')}}/demo/photos/eberhard-grossgasteiger-311213-500.jpg);"></div>
                  <div class="card-body text-center">
                    <img class="card-profile-img" src="{{asset('uploads')}}/{{ Auth::user()->avatar }}">
                    <h3 class="mb-3">{{ Auth::user()->name }}</h3>
                    <p class="mb-4">
                    一个人即使已登上顶峰，也仍要自强不息
                    </p>
                    <button class="btn btn-outline-primary btn-sm">
                      <span class="fa fa-card"></span> 打卡签到
                    </button>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">功能列表</h3>
                  </div>
                  <div class="card-body">
                    <!-- 这里放个人目录 -->
                    <div>
                      <div class="list-group list-group-transparent mb-0">
                        <a href="{{ url('/home') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                          <span class="icon mr-3"><i class="fe fe-inbox"></i></span>用户首页
                        </a>
                        <a href="{{ url('/home') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                          <span class="icon mr-3"><i class="fe fe-send"></i></span>信息中心
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                          <span class="icon mr-3"><i class="fe fe-star"></i></span>邀请好友
                        </a>
                        <a href="{{ url('/home/mima') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                          <span class="icon mr-3"><i class="fe fe-file"></i></span>安全中心
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                          <span class="icon mr-3"><i class="fe fe-tag"></i></span>个人信息
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                          <span class="icon mr-3"><i class="fe fe-trash-2"></i></span>退出登录
                        </a>
                      </div>
                      <div class="mt-6">
                        <a href="#" class="btn btn-info btn-block">积分商城</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>