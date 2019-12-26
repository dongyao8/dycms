@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">收录网址审核 </h4>
                    <!-- <p class="card-description"> 文章分类</p> -->
                    @include('admin.common.error')
                    @include('admin.common.success')
                    <table class="table text-center" style="word-break:break-all; word-wrap:break-all;">
                      <thead>
                        <tr>
                          <th> 序号 </th>
                          <th> 网站名称 </th>
                          <th> 所属分类 </th>
                          <th> 申请网址 </th>
                          <th> 申请用户 </th>
                          <th> 操作 </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($navigations as $navigation)
                        <tr>
                          <td>{{$navigation->id}}</td>
                          <td> {{$navigation->title}} </td>
                          <td> {{$navigation->navigation_category->name}} </td>
                          <td> {{$navigation->url}} </td>
                          <td> {{$navigation->user->name}} </td>
                          
                          <td> 
                              <div class="btn-group" role="group" aria-label="First group">
                              <a href="{{ url('admin/shoulu/inurl') }}/{{$navigation->id}}" class="btn btn-primary">通过</a>
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