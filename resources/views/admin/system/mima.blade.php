@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">密码修改</h4>
                    @include('admin.common.error')
                    @include('admin.common.success')
                        <form class="forms-sample" method="post" action="">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">旧密码</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password" name="password" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">新密码</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password" name="password2" value="{{ old('url') }}">
                            </div>
                            <button type="submit" class="btn btn-success mr-2">修改</button>
                            </form>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
          <!-- content-wrapper ends -->
      @endsection 