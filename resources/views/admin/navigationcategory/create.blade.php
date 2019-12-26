@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">导航分类添加</h4>
                    @include('admin.common.error')
                    @include('admin.common.success')
                        <form class="forms-sample" method="post" action="{{ url('admin/daohang') }}">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">分类名称</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">排序值</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="sort" value="0" name="sort" value="{{ old('sort') }}">
                            </div>
                            <button type="submit" class="btn btn-success mr-2">提交</button>
                            <a href="{{ url('admin/daohang') }}" class="btn btn-dark">返回</a>
                            </form>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
          <!-- content-wrapper ends -->
      @endsection 