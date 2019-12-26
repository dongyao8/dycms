@extends('index.common.top')
@section('title', '用户中心')
@section('content')
<div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
            @include('index.common.homeleft')
              <div class="col-lg-9">
              <form class="card" action="{{ url('/home/mima') }}" method="post">
              @csrf
                  <div class="card-body">
                    <h3 class="card-title">修改密码</h3>
                    @include('index.common.error')
                    @include('index.common.success')
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label class="form-label">旧密码</label>
                          <input type="password" class="form-control" placeholder="旧密码" name="password" value="">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label class="form-label">新密码</label>
                          <input type="password" class="form-control" placeholder="新密码" name="password2" value="">
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">修改密码</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection    