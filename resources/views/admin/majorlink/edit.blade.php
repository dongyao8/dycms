@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<!-- 引入富文本编辑器 -->
<script src="https://cdn.bootcss.com/tinymce/4.7.13/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea'
            });
        </script>
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">修改链接 | {{ $majors->title }}</h4>
                    @include('admin.common.error')
                    @include('admin.common.success')
                        <form class="forms-sample" method="post" action="{{ url('admin/majorlink') }}/{{ $majors->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">链接标题</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入链接标题" name="title" value="{{ $majors->title }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">链接地址</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="链接地址" name="url" value="{{ $majors->url }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">封面图片 | <img class="img-md" src="{{ asset('uploads') }}/{{ $majors->imgurl }}" alt="封面图片"></label>
                                <input type="file" class="form-control" id="exampleInputEmail1" placeholder="封面图片" name="imgurl">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">排序值</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="排序值" name="sort" value="{{ $majors->sort }}">
                            </div>
                            <button type="submit" class="btn btn-success mr-2">修改</button>
                            <a href="{{ url('admin/majorlink') }}" class="btn btn-dark">返回</a>
                            </form>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
          <!-- content-wrapper ends -->
      @endsection 