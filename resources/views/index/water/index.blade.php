@extends('index.common.top')
@section('title', '用户中心')
@section('content')
<div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
            @include('index.common.homeleft')
              <div class="col-lg-9">
              <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">积分流水日志</h4>
                  </div>
                  <table class="table card-table">
                     <tr>
                          <th class="text-center w-1"><i class="icon-people"></i></th>
                          <th>操作说明</th>
                          <th>影响积分</th>
                          <th>影响余额</th>
                          <th>类别</th>
                          <th>发生时间</th>
                        </tr>
                    <tbody>
                    @foreach($datas as $data)
                    <tr>
                      <td width="1"><i class="fa fa-diamond text-muted"></i></td>
                      <td>{{ $data->content }}</td>
                      <td>{{ $data->integral }}</td>
                      <td>{{ $data->amount }}</td>
                      <td>
                      @switch($data->type)
                        @case(1)
                            <span class="tag tag-red">支出</span>
                            @break

                        @case(2)
                            <span class="tag tag-green">收入</span>
                            @break

                        @default
                        <span class="tag tag-gray">未知</span>
                    @endswitch</td>
                      <td>{{ $data->created_at }}</td>
                    </tr>
                    @endforeach
                  </tbody></table>
                  
                </div>
                {{ $datas->links() }}
              </div>
            </div>
          </div>
        </div>
@endsection    