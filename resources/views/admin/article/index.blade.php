@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">文章内容 <a href="{{ url('admin/article/create') }}" class="btn btn-primary btn-rounded btn-fw float-right">添加文章</a></h4>
                    <p class="card-description"> 文章分类</p>
                    @include('admin.common.error')
                    @include('admin.common.success')
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th> 序号 </th>
                          <th> 文章标题 </th>
                          <th> 所属分类 </th>
                          <th> 是否推荐 </th>
                          <th> 发布时间 </th>
                          <th> 操作 </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($articles as $article)
                        <tr>
                          <td>{{$article->id}}</td>
                          <td> {{$article->title}} </td>
                          <td> {{$article->category->c_title}} </td>
                          <td> 
                          @if($article->is_hot)
                          <span class="badge badge-danger">推荐</span>
                          @else
                          <span class="badge badge-info">普通</span>
                          @endif
                           </td>
                          <td> {{$article->created_at}} </td>
                          <td> 
                              <div class="btn-group" role="group" aria-label="First group">
                              <a href="{{ url('admin/article') }}/{{$article->id}}/edit" class="btn btn-primary">编辑</a>
                              <form method="POST" action="{{ url('admin/article') }}/{{$article->id}}" aria-label="Register">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-dark">删除</button>
                              </form>
                            </div> 
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              {{$articles->links()}}
              
            </div>
          </div>
          <!-- content-wrapper ends -->
      @endsection 