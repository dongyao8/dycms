@extends('index.common.top')
@section('title', '每日一文---'.$sys_info->web_title)
@section('content')
<div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 order-lg-1 mb-4">
                <a href="{{ url('daily') }}" class="btn btn-block btn-primary mb-6">
                  <i class="fe fe-repeat mr-2"></i>随机换一篇
                </a>
                <!-- Components -->
                <div class="list-group list-group-transparent mb-0">
                  <a class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-user"></i></span>作者：{{ $article['data']['author']}}</a>
                  <a class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-feather"></i></span>{{ $article['data']['title']}}</a>
                </div>
              </div>
              <div class="col-lg-9">
                <div class="card">
                  <div class="card-body">
                    <div class="text-wrap p-lg-6">
                      <h2 class="mt-0 mb-4">{{ $article['data']['title']}}</h2>
                      {!! $article['data']['content'] !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>
@endsection 