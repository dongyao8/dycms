@extends('index.common.header')
@section('title', '注册账号')

@section('content')
<div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <a href="{{ url('/') }}"><img src="{{asset('uploads')}}/{{ $sys_info->web_logo }}" class="h-6" alt=""></a>
              </div>
              <form class="card" action="" method="post">
              @csrf
                <div class="card-body p-6">
                  <div class="card-title">注册新的账号</div>
                  @include('index.common.error')
                  <div class="form-group">
                    <label class="form-label">用户名</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ old('name') }}">
                  </div>
                  <div class="form-group">
                    <label class="form-label">邮箱</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ old('email') }}">
                  </div>
                  <div class="form-group">
                    <label class="form-label">密码</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}">
                  </div>
                  <div class="form-group">
                    <label class="form-label">重复密码</label>
                    <input type="password" class="form-control" placeholder="confirmation" name="password_confirmation">
                  </div>
                  <!-- <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" />
                      <span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
                    </label>
                  </div> -->
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">注册账号</button>
                  </div>
                </div>
              </form>
              <div class="text-center text-muted">
                已经有注册的账号? <a href="{{ route('login') }}">登录</a>
              </div>
            </div>
          </div>
@endsection    