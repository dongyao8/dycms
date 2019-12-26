@extends('index.common.top')
@section('title', "申请收录")
@section('content')
<div class="container">
    <form class="forms-sample" method="post" action="">
            <div class="row">
             @csrf
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">申请收录</h3>
                </div>
                @include('admin.common.error')
                    @include('admin.common.success')
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-sm-4 col-md-4">
                      <label class="form-label">
                        申请分类 <span class="form-required">*</span>
                      </label>
                      <select class="custom-select" name="navigation_category_id">
                      @foreach($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                      </select>
                    </div>
                    <div class="form-group col-sm-4 col-md-4">
                      <label class="form-label">
                        网站标题 <span class="form-required">*</span>
                      </label>
                      <input name="title" type="text" class="form-control" value="">
                    </div>
                    <div class="form-group col-sm-4 col-md-4">
                      <label class="form-label">
                        网站url <span class="form-required">*</span>
                      </label>
                      <input name="url" type="text" class="form-control" value="">
                    </div>
                  </div>


                <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"></button>
                1、申请收录前，请确认您已注册本平台，否则不能提交！<br>
                2、申请收录前，请提前将本站添加为贵平台友情链接！<br>
                </div>


                </div>
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">确认申请</button>
                </div>
              </div>


            </div>
            
          </div>
          </form>
      @endsection
      