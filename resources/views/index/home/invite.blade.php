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
                    <h3 class="card-title">邀请好友</h3>
                    @include('index.common.error')
                    @include('index.common.success')
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label class="form-label">邀请链接</label>
                          <input type="text" class="form-control" placeholder="邀请链接" value="{{ url('reg') }}/{{ Auth::user()->id }}">
                        </div>
                        <div class="alert alert-icon alert-primary" role="alert">
                          <i class="fe fe-bell mr-2" aria-hidden="true"></i> 复制上方邀请链接，邀请好友注册，将会获得积分奖励！ 
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection    