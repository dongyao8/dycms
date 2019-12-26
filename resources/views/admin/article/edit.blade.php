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
                    <h4 class="card-title">修改文章 | {{ $article->title }}</h4>
                    @include('admin.common.error')
                    @include('admin.common.success')
                        <form class="forms-sample" method="post" action="{{ url('admin/article') }}/{{ $article->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">文章标题</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入文章标题" name="title" value="{{ $article->title }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">封面图片 | <img class="img-md" src="{{ asset('uploads') }}/{{ $article->imgurl }}" alt="封面图片"></label>
                                <input type="file" class="form-control" id="exampleInputEmail1" placeholder="封面图片" name="imgurl">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">文章分类</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categorys as $category)
                                      @if($category->id == $article->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->c_title }}</option>
                                      @else
                                        <option value="{{ $category->id }}">{{ $category->c_title }}</option>
                                      
                                      @endif
                                     
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea1">文章正文</label>
                                <textarea class="form-control" id="exampleTextarea1" name="content" rows="2">{{ $article->content }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">热门推荐</label>
                                <select class="form-control" name="is_hot">
                                     @if($article->is_hot == 1)
                                        <option value="1" selected>推荐</option>
                                        <option value="0">普通</option>
                                      @else
                                        <option value="0">普通</option>
                                        <option value="1">推荐</option>
                                      @endif
                                    
                                    
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">修改</button>
                            <a href="{{ url('admin/article') }}" class="btn btn-dark">返回</a>
                            </form>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
          <!-- content-wrapper ends -->
      @endsection 