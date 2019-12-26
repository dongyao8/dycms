@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">友情链接</h4>
                    @include('admin.common.error')
                    @include('admin.common.success')
                        <form class="forms-sample" method="post" action="{{ url('admin/link') }}">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">链接名称</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter linkname" name="title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">链接地址</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="linkurl" name="url" value="{{ old('url') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">排序值</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="linkurl" value="0" name="sort" value="{{ old('sort') }}">
                            </div>
                            <button type="submit" class="btn btn-success mr-2">提交</button>
                            <a href="{{ url('admin/link') }}" class="btn btn-dark">返回</a>
                            </form>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
          <!-- content-wrapper ends -->
      @endsection 