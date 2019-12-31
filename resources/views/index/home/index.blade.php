@extends('index.common.top')
@section('title', '用户中心')
@section('content')
<div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
            @include('index.common.homeleft')
              <div class="col-lg-9">
              <form class="card" action="{{ url('/note') }}" method="post">
              @csrf
                  <div class="card-body">
                    <h3 class="card-title">个人中心</h3>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="form-label">积分值</label>
                          <input type="text" class="form-control" disabled="" placeholder="积分值" value="{{ Auth::user()->integral }}">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="form-label">现金余额</label>
                          <input type="text" class="form-control" disabled="" placeholder="现金余额" value="{{ Auth::user()->amount }}">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                          <label class="form-label">用户名</label>
                          <input type="text" class="form-control" placeholder="Username" value="{{ Auth::user()->name }}" disabled="">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                          <label class="form-label">邮件地址</label>
                          <input type="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}" disabled="">
                        </div>
                      </div>
                      <!-- <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                          <label class="form-label">First Name</label>
                          <input type="text" class="form-control" placeholder="Company" value="Chet">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                          <label class="form-label">Last Name</label>
                          <input type="text" class="form-control" placeholder="Last Name" value="Faker">
                        </div>
                      </div> -->
                      <div class="col-md-12">
                        <div class="form-group mb-0">
                          <label class="form-label">随心笔记[仅自己可见]</label>
                          @include('index.common.error')
                          @include('index.common.success')
                          <textarea rows="5" class="form-control" name="notes" placeholder="请输入笔记内容……(此内容不会被其他用户看到)" value="Mike"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">保存笔记</button>
                  </div>
                </form>

                <div class="card">
                  <ul class="list-group card-list-group">

                  @foreach ($note as $notes)
                  <li class="list-group-item py-5">
                      <div class="media">
                        <div class="media-object avatar avatar-md mr-4" style="background-image: url({{asset('uploads')}}/{{ Auth::user()->avatar }})"></div>
                        <div class="media-body">
                          <div class="media-heading">
                            <small class="float-right text-muted">{{ $notes->created_at }}</small>
                            <h5>{{ Auth::user()->name }}</h5>
                          </div>
                          <div>{{ $notes->notes }}</div>
                        </div>
                      </div>
                    </li>
                  @endforeach
                    

                    
                  </ul>

                </div>
                {{$note->links()}}
              </div>
            </div>
          </div>
        </div>
@endsection    