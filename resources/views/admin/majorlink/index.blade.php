@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">推荐网址 <a href="{{ url('admin/majorlink/create') }}" class="btn btn-primary btn-rounded btn-fw float-right">添加链接</a></h4>
                    <p class="card-description"> 将会附带LOGO图展示</p>
                    @include('admin.common.error')
                    @include('admin.common.success')
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th> 序号 </th>
                          <th> LOGO </th>
                          <th> 文章标题 </th>
                          <th> 排序 </th>
                          <th> 操作 </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($links as $link)
                        <tr>
                          <td>{{$link->id}}</td>
                          <td> <img class="img-xs rounded-circle" src="{{ asset('uploads') }}/{{$link->imgurl}}"> </td>
                          <td> {{$link->title}} </td>
                          <td> {{$link->sort}} </td>
                          <td> 
                              <div class="btn-group" role="group" aria-label="First group">
                              <a href="{{ url('admin/majorlink') }}/{{$link->id}}/edit" class="btn btn-primary">编辑</a>
                              <form method="POST" action="{{ url('admin/majorlink') }}/{{$link->id}}" aria-label="Register">
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
              {{$links->links()}}
              
            </div>
          </div>
          <!-- content-wrapper ends -->
      @endsection 