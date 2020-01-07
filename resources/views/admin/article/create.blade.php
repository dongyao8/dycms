@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">添加文章</h4>
                    @include('admin.common.error')
                    @include('admin.common.success')
                        <form class="forms-sample" method="post" action="{{ url('admin/article') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">文章标题</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入文章标题" name="title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">封面图片</label>
                                <input type="file" class="form-control" id="exampleInputEmail1" placeholder="封面图片" name="imgurl">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">文章分类</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->c_title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea1">文章正文</label>
                                <textarea class="form-control" id="exampleTextarea1" name="content" rows="2"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">热门推荐</label>
                                <select class="form-control" name="is_hot">
                                    <option value="0">普通</option>
                                    <option value="1">推荐</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">提交</button>
                            <a href="{{ url('admin/article') }}" class="btn btn-dark">返回</a>
                            </form>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- 引入富文本编辑器 -->
          <link rel="stylesheet" href="{{asset('static/editor')}}/themes/default/default.css"/>
          <script charset="utf-8" src="{{asset('static/editor')}}/kindeditor-all.js"></script>
            <!-- 初始化KindEditor编辑器 -->
            <script type="text/javascript">
                var editor;
                KindEditor.ready(function (K) {
                    editor = K.create('textarea[name="content"]', {
                        //否允许浏览服务器已上传文件,默认是false
                        allowFileManager: true,
                        allowFlashUpload: false,
                        allowMediaUpload:false,
                        allowFileUpload: false,
                        allowFileManager: false,
                    });
                });
            </script>
      @endsection 