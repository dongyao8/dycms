@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{ $navigation->title }}|编辑</h4>
                    @include('admin.common.error')
                    @include('admin.common.success')
                        <form class="forms-sample" method="post" action="{{ url('admin/navigation') }}/{{ $navigation->id }}">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">网站标题</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title" name="title" value="{{ $navigation->title }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">网站地址</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter url" name="url" value="{{ $navigation->url }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">所属分类</label>
                                <select class="form-control" name="navigation_category_id">
                                    @foreach($categorys as $category)
                                    @if($category->id == $navigation->navigation_category_id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">排序值</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="sort" name="sort" value="{{ $navigation->sort }}">
                            </div>
                            <button type="submit" class="btn btn-success mr-2">修改</button>
                            <a href="{{ url('admin/navigation') }}" class="btn btn-dark">返回</a>
                            </form>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
          <!-- content-wrapper ends -->
      @endsection 