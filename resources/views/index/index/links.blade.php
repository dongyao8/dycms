@extends('index.common.top')
@section('title', "友情链接")
@section('content')
<div class="container">
            <div class="row">
              

                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">友情链接</h3>
                    <div class="card-options">
                        <a href="{{ url('/') }}" class="btn btn-primary btn-sm">回首页</a>
                    </div>
                </div>
                <div class="card-body">
                    @foreach($links as $link)
                        <a target="_blank" href="{{ $link->url }}" class="btn btn-secondary">{{ $link->title }}</a>
                    @endforeach
                </div>
                </div>


            </div>
          </div>
      @endsection
      