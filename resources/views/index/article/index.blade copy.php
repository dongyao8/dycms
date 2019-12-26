@extends('index.common.top')
@section('title', '文章中心')
@section('content')
          <div class="container">
            <div class="page-header">
            
            <div class="row row-cards row-deck">
            @foreach($articles as $article)
            <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <a href="{{ url('article/info') }}/{{$article->id}}" class="mb-3">
                    <img src="{{asset('uploads')}}/{{$article->imgurl}}" alt="封面图片" class="rounded" style="max-height: 250px">
                  </a>
                  <div class="d-flex align-items-center px-2">
                    <div class="avatar avatar-md mr-3" style="background-image: url(http://img.qqzhi.com/uploads/2019-01-12/151251461.jpg)"></div>
                    <div>
                      <div><a href="{{ url('article/info') }}/{{$article->id}}" style="color:black">{{$article->title}}</a></div>
                      <small class="d-block text-muted">{{$article->created_at}}</small>
                    </div>
                    <div class="ml-auto text-muted">
                      <a href="javascript:void(0)" class="icon"><i class="fe fe-eye mr-1"></i> {{$article->views}}</a>
                      <!-- <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i> 42</a> -->
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
      @endsection