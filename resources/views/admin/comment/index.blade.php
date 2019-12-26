@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">评论列表</h4>
                    @include('admin.common.error')
                    @include('admin.common.success')
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th> 序号 </th>
                          <th> 评论内容 </th>
                          <th> 所属文章</th>
                          <th> 操作 </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($comments as $comment)
                        <tr>
                          <td>{{$comment->id}}</td>
                          <td> {{$comment->c_content}} </td>
                          <td><a href="{{ url('article/info') }}/{{$comment->article_id}}">《{{$comment->article->title}}》</a></td>
                          <td> 
                              <div class="btn-group" role="group" aria-label="First group">
                              <a href="{{ url('admin/comment/delete') }}/{{$comment->id}}" class="btn btn-primary">删除</a>
                            </div> 
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
          <!-- content-wrapper ends -->
      @endsection 