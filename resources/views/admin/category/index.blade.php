@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">文章分类 <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-rounded btn-fw float-right">添加分类</a></h4>
                    <p class="card-description"> 文章分类</p>
                    @include('admin.common.error')
                    @include('admin.common.success')
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th> 序号 </th>
                          <th> 分类名称 </th>
                          <th> 操作 </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categorys as $category)
                        <tr>
                          <td>{{$category->id}}</td>
                          <td> {{$category->c_title}} </td>
                          <td> 
                              <div class="btn-group" role="group" aria-label="First group">
                              <a href="{{ url('admin/category') }}/{{$category->id}}/edit" class="btn btn-primary">编辑</a>
                              <form method="POST" action="{{ url('admin/category') }}/{{$category->id}}" aria-label="Register">
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
                    {{$categorys->links()}}
                  </div>
                </div>
              </div>

              
            </div>
          </div>
          <!-- content-wrapper ends -->
      @endsection 