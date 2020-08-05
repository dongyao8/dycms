@extends('index.common.top')
@section('title', '用户中心')
@section('content')
<div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
            @include('index.common.homeleft')
              <div class="col-lg-9">
              <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">邀请好友</h3>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                        <div class="alert alert-icon alert-primary" role="alert">
                          <i class="fe fe-bell mr-2" aria-hidden="true"></i> 复制下方邀请链接，邀请好友注册，将会获得积分奖励！ 
                        </div>
                          <input type="text" class="form-control" placeholder="邀请链接" value="{{ url('reg') }}/{{ Auth::user()->id }}">
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  
                  <div class="card-footer">
                  

                  <span class="tag tag-dark">共计邀请：{{ count($friends) }}位好友<span class="tag-addon tag-danger">下方仅显示最新邀请的10位好友信息</span>
</span><br><br>


                  @foreach($friends as $friend)
                      <span class="tag">
                        <span class="tag-avatar avatar" style="background-image: url({{ config('avatar.url')}}/{{ md5($friend->name) }}?size={{ config('avatar.size')}}&d={{ config('avatar.d')}})"></span>
                        {{ $friend->name }}
                      </span>
                      @endforeach
                </div>
                </div>

              </div>
            </div>
          </div>
        </div>
@endsection    