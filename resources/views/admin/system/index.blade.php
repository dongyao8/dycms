@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">基本信息配置</h4>
                    @include('admin.common.error')
                    @include('admin.common.success')
                        <form class="forms-sample" method="post" action="" enctype="multipart/form-data" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">网站名称</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="网站名称" name="web_title" value="{{ $sys->web_title }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">网站描述</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="网站描述" name="web_desc" value="{{ $sys->web_desc }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">网站域名地址</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="网站域名地址" name="web_url" value="{{ $sys->web_url }}">
                            </div>
                            <div class="form-group">
                              <label for="exampleTextarea1">统计代码[若不需要，可填写：无]</label>
                              <textarea class="form-control" id="exampleTextarea1" rows="2" name="tongji">{{ $sys->tongji }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">网站logo图</label><br>
                                <img src="{{ asset('uploads') }}/{{ $sys->web_logo }}" alt="image" style="max-height:80px">
                                <input type="file" class="form-control" id="exampleInputPassword1" placeholder="网站logo图" name="web_logo" value="{{ $sys->web_logo }}">
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