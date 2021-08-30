<div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="row">
              @foreach($links as $link)
                <div class="col-6 col-md-3">
                  <ul class="list-unstyled mb-0">
                    <li><a target="_blank" href="{{ $link->url }}">{{ $link->title }}</a></li>
                  </ul>
                </div>
                @endforeach
                <div class="col-6 col-md-3">
                  <ul class="list-unstyled mb-0">
                    <li><a href="{{ url('/links') }}">更多……</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
            {{ $sys_info->web_desc }}
            </div>
          </div>
        </div>
      </div>
<footer class="footer">
        <div class="container">
          <div class="row align-items-center flex-row-reverse">
            <div class="col-auto ml-lg-auto">
              <div class="row align-items-center">
                <div class="col-auto">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="{{ url('/shoulu') }}">申请收录</a></li>
                    <li class="list-inline-item"><a target="_blank" href="https://gitee.com/dongyao/dycms/blob/master/LICENSE">使用协议</a></li>
                    <!-- 统计代码 -->
                    <li class="list-inline-item"><a target="_blank" href="https://beian.miit.gov.cn/#/Integrated/index">备案号：{{env('APP_BEIAN')}}</a></li>
                    <!-- 统计代码 -->
                    <!-- 统计代码 -->
                    <li class="list-inline-item">{!! $sys_info->tongji !!}</li>
                    <!-- 统计代码 -->
                  </ul>
                </div>
                <div class="col-auto">
                  <!-- <a href="https://www.dongyao.ren" class="btn btn-outline-primary btn-sm">版权所有</a> -->
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2019 <a href="https://www.dongyao.ren">clark</a>. Design by <a href="https://github.com/dongyao8/dycms" target="_blank">DYCMS</a> All rights reserved.
            </div>
          </div>
        </div>
      </footer>
      