@extends('index.common.top')
@section('title', '文章中心')
@section('content')
<div class="container">
            <div class="row row-cards">
              
              <div class="col-lg-9">
                <div class="card">
                  <table class="table card-table table-vcenter">
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                      <td><img src="{{asset('uploads')}}/{{$article->imgurl}}" style="max-width:100px" alt="" class="h-8"></td>
                      <td>
                      <a href="{{ url('article/info') }}/{{$article->id}}"><strong>{{$article->title}}</strong></a>
                      </td>
                      <!-- <td class="text-right text-muted d-none d-md-table-cell text-nowrap">阅读{{$article->views}}</td> -->
                      <td class="text-right text-muted d-none d-md-table-cell text-nowrap">{{$article->created_at}}</td>
                      <td class="text-right">
                        阅读:{{$article->views}}
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody></table>
                </div>
                {{ $articles->links() }}
              </div>

              <!-- 右侧分类 -->
              <div class="col-lg-3">
              <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">分类栏目</h4>
                  </div>
                  <table class="table card-table">
                    <tbody><tr>
                      <td width="1"><i class="fa fa-home text-muted"></i></td>
                      <td><a href="{{ url('/article') }}/0">全部文章</a></td>
                    </tr>
                    @foreach($categorys as $category)
                          <tr>
                            <td width="1"><i class="fe fe-send text-muted"></i></td>
                            <td><a href="{{ url('/article') }}/{{$category->id}}">{{ $category->c_title }}</a></td>
                          </tr>
                          @endforeach
                    
                  </tbody></table>
                </div>
            </div>
          </div>
      @endsection