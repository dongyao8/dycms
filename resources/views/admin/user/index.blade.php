@extends('admin.common.header')
@section('title', '后台管理')
@section('content')
<div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">用户列表</h4>
                    @include('admin.common.error')
                    @include('admin.common.success')
                    <p class="card-description"> 用户信息明细</p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> id </th>
                          <th> 用户名 </th>
                          <th> 邮箱 </th>
                          <th> 积分 </th>
                          <th> 余额 </th>
                          <th> 注册时间 </th>
                          <th> 操作 </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($users as $user)
                        <tr>
                          <td class="py-1">{{ $user->id }}</td>
                          <td> <img src="{{asset('uploads')}}/{{ $user->avatar }}" alt="image"> | {{ $user->name }} </td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->integral }}</td>
                          <td>{{ $user->amount }}</td>
                          <td> {{ $user->created_at }} </td>
                          <td> 
                            @if($user->active != 1)
                            <a href="{{ url('admin/user/operate') }}/{{ $user->id }}/{{ $user->active }}" class="btn btn-primary">开启</a>
                            @else
                            <a href="{{ url('admin/user/operate') }}/{{ $user->id }}/{{ $user->active }}" class="btn btn-danger">冻结</a>
                            @endif
                           </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    <hr>
                    {{ $users->links() }}
                  </div>
                </div>
              </div>

              
            </div>
          </div>
          <!-- content-wrapper ends -->
      @endsection 