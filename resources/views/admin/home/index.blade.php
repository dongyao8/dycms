@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
		<!-- Page Title Header Starts-->
		<!-- Page Title Header Ends-->
		<div class="row">
		  <div class="col-md-12 grid-margin">
			<div class="card">
			  <div class="card-body">
			  @include('admin.common.error')
              @include('admin.common.success')
				<div class="row">
				  <div class="col-lg-3 col-md-6">
					<div class="d-flex">
					  <div class="wrapper">
						<h3 class="mb-0 font-weight-semibold">{{$num['user']}}</h3>
						<h5 class="mb-0 font-weight-medium text-primary">注册用户</h5>
						<!-- <p class="mb-0 text-muted">新增用户</p> -->
					  </div>
					  <div class="wrapper my-auto ml-auto ml-lg-4">
						<canvas height="50" width="100" id="stats-line-graph-1"></canvas>
					  </div>
					</div>
				  </div>
				  <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
					<div class="d-flex">
					  <div class="wrapper">
						<h3 class="mb-0 font-weight-semibold">{{$num['article']}}</h3>
						<h5 class="mb-0 font-weight-medium text-primary">文章数量</h5>
						<!-- <p class="mb-0 text-muted">+138.97(+0.54%)</p> -->
					  </div>
					  <div class="wrapper my-auto ml-auto ml-lg-4">
						<canvas height="50" width="100" id="stats-line-graph-2"></canvas>
					  </div>
					</div>
				  </div>
				  <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
					<div class="d-flex">
					  <div class="wrapper">
						<h3 class="mb-0 font-weight-semibold">{{$num['comment']}}</h3>
						<h5 class="mb-0 font-weight-medium text-primary">评论数量</h5>
						<!-- <p class="mb-0 text-muted">+57.62(+0.76%)</p> -->
					  </div>
					  <div class="wrapper my-auto ml-auto ml-lg-4">
						<canvas height="50" width="100" id="stats-line-graph-3"></canvas>
					  </div>
					</div>
				  </div>
				  <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
					<div class="d-flex">
					  <div class="wrapper">
						<h3 class="mb-0 font-weight-semibold">{{$num['jifen']}}</h3>
						<h5 class="mb-0 font-weight-medium text-primary">发放积分</h5>
						<!-- <p class="mb-0 text-muted">+138.97(+0.54%)</p> -->
					  </div>
					  <div class="wrapper my-auto ml-auto ml-lg-4">
						<canvas height="50" width="100" id="stats-line-graph-4"></canvas>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
    </div>
    
    
		<div class="row">
		  <div class="col-md-4 grid-margin stretch-card">
			<div class="card">
			  <div class="card-body">
				<h4 class="card-title mb-0">最新文章</h4>
				@foreach($new_article as $article)
				<div class="d-flex py-2 border-bottom">
				  <div class="wrapper">
					<small class="text-muted">{{ $article->created_at }}</small>
					<p class="font-weight-semibold text-gray mb-0">{{ $article->title }}</p>
				  </div>
				  <small class="text-muted ml-auto">阅读:{{ $article->views }}</small>
				</div>
				@endforeach
				<a class="d-block mt-5" href="{{ url('admin/article') }}">查看所有</a>
			  </div>
			</div>
		  </div>
		  <div class="col-md-4 grid-margin stretch-card">
			<div class="card">
			  <div class="card-body">
				<div class="d-flex justify-content-between pb-3">
				  <h4 class="card-title mb-0">最新用户</h4>
				  <!-- <p class="mb-0 text-muted">20 finished, 5 remaining</p> -->
				</div>
				<ul class="timeline">
				@foreach($new_user as $user)
				  <li class="timeline-item">
					<p class="timeline-content"> <img class="img-xs rounded-circle" src="{{ asset('uploads') }}/{{ $user->avatar }}" alt="profile image"> | {{ $user->name }}</p>
					<!-- <p class="event-time">{{ $user->name }}</p> -->
				  </li>
				  @endforeach
				</ul>
				<a class="d-block mt-3" href="{{ url('admin/user') }}">查看所有</a>
			  </div>
			</div>
		  </div>
		  <div class="col-md-4 grid-margin stretch-card">
			<div class="card">
			  <div class="card-body">
				<h4 class="card-title mb-0">最新评论</h4>
				@foreach($new_comment as $comment)
				<div class="d-flex py-2 border-bottom">
				  <div class="wrapper">
					<small class="text-muted">{{ $comment->created_at }}</small>
					<p class="text-gray mb-0">{{ $comment->c_content }}</p>
				  </div>
				  <small class="text-muted ml-auto">标题:{{ $comment->article->title }}</small>
				</div>
				@endforeach
				<a class="d-block mt-3" href="{{ url('admin/comment') }}">查看所有</a>
			  </div>
			</div>
		  </div>
		</div>
		<div class="alert alert-primary">当前版本：V 1.1.2 ；点此查看： <a target="_blank" href="https://gitee.com/dongyao/dycms/blob/master/UPDATE.md" class="alert-link">最新版本</a> </div>
	  </div>
      <!-- content-wrapper ends -->
      @endsection 