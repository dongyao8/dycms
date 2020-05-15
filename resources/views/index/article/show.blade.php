@extends('index.common.top')
@section('title', "$article->title")
@section('content')
<div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="card card-profile">
                  <div class="card-header" style="background-image: url({{asset('uploads')}}/{{$article->imgurl}});"></div>
                  <div class="card-body text-center">
                    <h3 class="mb-3">{{ $article->title }}</h3>
                    <div class="text-left">
                        {!! $article->content !!}
                    </div>
                    <a href="{{ url('article') }}" class="btn btn-outline-primary btn-sm">
                      <span class="fa fa-car"></span> 返回列表
                    </a>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">文章评论</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{ url('comment') }}" method="post">
                    @csrf
                      <div class="form-group">
                        <label class="form-label">请勿发布与主题无关言论</label>
                        @include('index.common.error')
                          @include('index.common.success')
                            <input type="hidden" name="id" value="{{ encrypt($article->id) }}">
                            <textarea class="form-control" rows="5" placeholder="你有什么想说的吗？" name="c_content"></textarea>
                      </div>
                      <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-block">发布</button>
                      </div>
                    </form>
                  </div>
                  <ul class="list-group card-list-group">
                    @foreach($comments as $comment)
                    <li class="list-group-item py-5">
                      <div class="media">
                        <div class="media-object avatar avatar-md mr-4" style="background-image: url({{ asset('uploads') }}/{{ $comment->user->avatar }})"></div>
                        <div class="media-body">
                          <div class="media-heading">
                            <small class="float-right text-muted">{{ $comment->created_at }}</small>
                            <h5>{{ $comment->user->name }}</h5>
                          </div>
                          <div>
                            {{ $comment->c_content }}
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
                {{ $comments->links() }}
              </div>
              <div class="col-lg-4">

              <div class="card">
                  <div class="card-header">
                    <h2 class="card-title">站长推荐</h2>
                  </div>
                  <table class="table card-table">
                    <tbody>
                    @foreach($main_article as $ma)
                    <tr>
                      <td><a href="{{ url('article/info') }}/{{$ma->id}}">{{ Str::limit($ma->title,22,'…') }}</a></td>
                      <td class="text-right">
                        <span class="badge badge-default">阅读:{{ $ma->views }}</span>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody></table>
                </div>


                <div class="card">
                  <div class="card-header">
                    <h2 class="card-title">热门阅读</h2>
                  </div>
                  <table class="table card-table">
                    <tbody>@foreach($hot_article as $ha)
                    <tr>
                      <td><a href="{{ url('article/info') }}/{{$ha->id}}">{{ Str::limit($ha->title,22,'…') }}</a></td>
                      <td class="text-right">
                        <span class="badge badge-default">阅读:{{ $ha->views }}</span>
                      </td>
                    </tr>
                    @endforeach
                  </tbody></table>
                </div>
              </div>
            </div>
          </div>
      @endsection
      