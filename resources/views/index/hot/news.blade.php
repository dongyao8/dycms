@extends('index.common.top')
@section('title', '热点关注')
@section('content')
<div class="container">
<div class="card">
<div class="card-header">
                    <a class="pull-right" style="color:green">更新时间：{{ date('Y-m-d H:i:s',$news_data['update_at']) }}</a>
                  </div>
    <table class="table card-table table-vcenter">
    <tbody>
    @foreach($news_data['hot_search_list'] as $key=>$val)
    
        <tr>
            <td>
            <a target="_blank" href="{{$val['news']}}">{{$val['rank']}}、{{$val['key']}}</a>
            </td>
            
            <!-- <td class="text-right text-muted d-none d-md-table-cell text-nowrap">38 offers</td> -->
            <td class="text-right"  style="color:red">{{$val['icon']}}</td>
            <td class="text-right text-muted d-none d-md-table-cell text-nowrap">{{$val['hot']}}</td>
            </td>
        </tr>
    
    @endforeach
    </tbody></table>
</div>

          </div>
      @endsection