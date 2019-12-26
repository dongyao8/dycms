@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">友情链接 <a href="{{ url('admin/link/create') }}" class="btn btn-primary btn-rounded btn-fw float-right">添加链接</a></h4>
                    <p class="card-description"> 前端页面底部关联网址</p>
                    @include('admin.common.error')
                    @include('admin.common.success')
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th> 序号 </th>
                          <th> 网站名称 </th>
                          <th> 排序 </th>
                          <th> 操作 </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($links as $link)
                        <tr>
                          <td>{{$link->id}}</td>
                          <td> {{$link->title}} </td>
                          <td>{{$link->sort}}</td>
                          <td> 
                              <div class="btn-group" role="group" aria-label="First group">
                              <a href="{{ url('admin/link') }}/{{$link->id}}/edit" class="btn btn-primary">编辑</a>
                              <form method="POST" action="{{ url('admin/link') }}/{{$link->id}}" aria-label="Register">
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
                    {{$links->links()}}
                  </div>
                </div>
              </div>

              
            </div>
          </div>
          <!-- content-wrapper ends -->
      @endsection 