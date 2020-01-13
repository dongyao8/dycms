@extends('index.common.header')
@section('title', '登录账号')


@section('content')
<div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <a href="{{ url('/') }}"><img src="{{asset('uploads')}}/{{ $sys_info->web_logo }}" class="h-6" alt=""></a>
              </div>
              <form class="card" action="" method="post">
              @csrf
                <div class="card-body p-6">
                  <div class="card-title">登录账户</div>
                  @include('index.common.error')
                  @include('index.common.success')
                  <div class="form-group">
                    <label class="form-label">用户名</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username" name="name" value="{{ old('name') }}">
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      密码
                      <a href="#" class="float-right small">忘记密码</a>
                    </label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                  <!-- <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"/>
                      <span class="custom-control-label">记住登录</span>
                    </label>
                  </div> -->
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">登录</button>
                  </div>
                </div>
              </form>
              <div class="text-center text-muted">
                还没有注册账号? <a href="{{ route('reg') }}">注册</a>
              </div>
            </div>
@endsection    