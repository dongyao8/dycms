@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">网址导航 <a href="{{ url('admin/navigation/create') }}" class="btn btn-primary btn-rounded btn-fw float-right">添加网址</a></h4>
                    <!-- <p class="card-description"> 文章分类</p> -->
                    @include('admin.common.error')
                    @include('admin.common.success')
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th> 序号 </th>
                          <th> 网站名称 </th>
                          <th> 所属分类 </th>
                          <th> 排序 </th>
                          <th> 操作 </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($navigations as $navigation)
                        <tr>
                          <td>{{$navigation->id}}</td>
                          <td> {{$navigation->title}} </td>
                          <td> {{$navigation->navigation_category->name}} </td>
                          <td> {{$navigation->sort}} </td>
                          <td> 
                              <div class="btn-group" role="group" aria-label="First group">
                              <a href="{{ url('admin/navigation') }}/{{$navigation->id}}/edit" class="btn btn-primary">编辑</a>
                              <form method="POST" action="{{ url('admin/navigation') }}/{{$navigation->id}}" aria-label="Register">
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
              {{$navigations->links()}}

              
            </div>
          </div>
          <!-- content-wrapper ends -->
      @endsection 