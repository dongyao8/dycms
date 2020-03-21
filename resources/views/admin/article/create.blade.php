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
                                <label for="exampleInputEmail1">热门推荐</label>
                                <select class="form-control" name="is_hot">
                                    <option value="0">普通</option>
                                    <option value="1">推荐</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">文章正文</label>
                                <textarea class="form-control" id="content" name="content" rows="2"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">提交</button>
                            <a href="{{ url('admin/article') }}" class="btn btn-dark">返回</a>
                            </form>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
          <!-- 富文本编辑器 -->
            <script src="{{asset('static/editor')}}/tinymce/js/tinymce/tinymce.min.js"></script>
            <script>
            tinymce.init({
                selector: '#content',
                language:'zh_CN',//注意大小写
                images_upload_url: "{{ url('admin/upload/img')}}",
                images_upload_base_path: "{{ url('/') }}/uploads/",
                height: 300,
                toolbar_items_size: 'small',
                plugins: 'preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template code codesample table charmap hr nonbreaking anchor advlist lists wordcount imagetools textpattern help emoticons autosave autoresize',
                toolbar: 'code undo redo restoredraft | pastetext | forecolor backcolor bold italic underline strikethrough link anchor | alignleft aligncenter alignright alignjustify outdent indent | \
                styleselect fontselect fontsizeselect | bullist numlist | blockquote subscript superscript removeformat | \
                table image media charmap emoticons hr preview | fullscreen',
                height: 650, //编辑器高度
                min_height: 400,
                toolbar_mode : 'wrap',
                fontsize_formats: '12px 14px 16px 18px 24px 36px 48px 56px 72px',
                font_formats: '微软雅黑=Microsoft YaHei,Helvetica Neue,PingFang SC,sans-serif;苹果苹方=PingFang SC,Microsoft YaHei,sans-serif;宋体=simsun,serif;仿宋体=FangSong,serif;黑体=SimHei,sans-serif;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;',
            });
            </script>
      @endsection 