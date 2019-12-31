@extends('index.common.top')
@section('title',$sys_info->web_title)
@section('content')
          <div class="container">
                <!-- 搜索框 -->
            <div>
                <div class="card">
                    <div class="card-header">
                      <!-- 天气预报插件 -->
                      <iframe allowtransparency="true" frameborder="0" width="317" height="28" scrolling="no" src="//tianqi.eastday.com/plugin/widget_v1.html?sc=3&z=1&t=1&v=0&d=1&bd=0&k=000000&f=808080&q=1&a=1&c=54511&w=317&h=28&align=left"></iframe>
                    </div>
                    <form action="http://www.baidu.com/s" method="get" target="_blank" id="ss">
                    <div class="card-body">
                      
                        <div class="input-group col-lg-8 col-md-10 m-auto">
                            <input type="text" name="word" baiduSug="2" class="form-control" id="tt" placeholder="安全搜索，一键直达">
                            
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="submit">搜索</button>
                            </span>
                        </div>
                        <div class="card-body text-center ss_con">
                          <div class="custom-controls-stacked">
                            <label class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="ss_type" name="ss_type" value="1" checked="checked">
                              <span class="custom-control-label ss_type">百度</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="ss_type" name="ss_type" value="2">
                              <span class="custom-control-label ss_type">搜狗</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="ss_type" name="ss_type" value="3">
                                <span class="custom-control-label ss_type">360</span>
                              </label>
                            <label class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="ss_type" name="ss_type" value="4">
                              <span class="custom-control-label ss_type">必应</span>
                            </label>
                          </div>
                        </div>
                        
                        

                    </div>
                </form>
                </div>
            </div>
            <!-- END搜索框 -->

            <div class="row row-cards row-deck">
              <div class="col-12">

                <div class="card">
                  <div class="table-responsive">

                  <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                      <tbody>
                        <tr>
                          @foreach($majors as $key=>$major)
                          @if($key<=5)
                          <td style="text-align:center">
                              <a href="{{ $major->url}}" target="_blank"> <div class="avatar d-block;center-block" style="background-image: url({{ asset('uploads') }}/{{$major->imgurl}})"></div>
                              <div>{{ $major->title}}</div></a>
                          </td>
                          @endif
                          @endforeach
                        </tr>
                        <tr>
                          @foreach($majors as $key=>$major)
                          @if($key>5 && $key<='11')
                          <td style="text-align:center">
                          <a href="{{ $major->url}}" target="_blank"> <div class="avatar d-block;center-block" style="background-image: url({{ asset('uploads') }}/{{$major->imgurl}})"></div>
                              <div>{{ $major->title}}</div></a>
                          </td>
                          @endif
                          @endforeach
                        </tr>
                        <tr>
                          @foreach($majors as $key=>$major)
                          @if($key>11)
                          <td style="text-align:center">
                          <a href="{{ $major->url}}" target="_blank"> <div class="avatar d-block;center-block" style="background-image: url({{ asset('uploads') }}/{{$major->imgurl}})"></div>
                              <div>{{ $major->title}}</div></a>
                          </td>
                          @endif
                          @endforeach
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
                
                <div class="col-lg-3" id="remen" style="display:block">
                <!-- 广告位预留 -->
                <div class="card">
                      <img src="{{ asset('assets') }}/ad.jpg">
                </div>
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">精选推荐</h4>
                      </div>
                      <table class="table card-table">
                        <tbody>
                        @foreach($main_article as $ma)
                         <tr>
                          <td width="1"><i class="fe fe-thumbs-up text-muted"></i></td>
                          <td> <a target="_blank" href="{{ url('article/info') }}/{{$ma->id}}">{{ $ma->title}}</a></td>
                          <!-- <td class="text-right"><span class="text-muted">[阅读:{{ $ma->views }}]</span></td> -->
                        </tr>
                        @endforeach
                      </tbody></table>
                    </div>

                    <div class="card">
                            <div class="card-header">
                              <h4 class="card-title">热门点击</h4>
                            </div>
                            <table class="table card-table">
                              <tbody>
                              @foreach($hot_article as $ha)
                              <tr>
                                <td width="1"><i class="fa fa-h-square text-muted"></i></td>
                                <td><a href="{{ url('article/info') }}/{{$ha->id}}">{{ $ha->title}}</a></td>
                              <!-- <td class="text-right"><span class="text-muted">[阅读:{{ $ha->views }}]</span></td> -->
                              </tr>@endforeach
                            </tbody>
                            </table>
                          </div>
                </div>
                
                <div class="col-lg-9">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <tbody>
                      @foreach($navigations as $navigation)
                        <tr>
                          <td><span class="text-success"><a style="color:green" href="{{ url('/urls') }}/{{ $navigation->id }}">[{{$navigation->name}}]</a></span></td>
                            
                          @foreach(\App\Model\NavigationCategory::find($navigation->id)->navigation->where('status',1)->take(6) as $url)
                          <td><a target="_blank" href="{{$url->url}}" class="text-primary">{{$url->title}}</a></td>
                          @endforeach
                          <td><a target="_blank" href="{{ url('/urls') }}/{{ $navigation->id }}" class="text-success">更多...</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                </div>
              </div>


              </div> 
          </div>

<!-- 手机设备，隐藏热门榜单 -->
<script>
    if(window.screen.width < 700){
        document.getElementById('remen').style.display = 'none';
    }
  </script>
<!-- 百度联想搜索 -->
<script charset="gbk" src="http://www.baidu.com/js/opensug.js"></script>
<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<!-- 搜索方式 -->
<script type="text/javascript">
    $("input:radio[name='ss_type']").change(function (){
    var ss = $(this).val();
    if(ss==1){ //百度
        $('#ss').attr('action','http://wwww.baidu.com/s');
        $('#tt').attr('name','word');
    }
    else if(ss==2){ //搜狗
        $('#ss').attr('action','http://www.sogou.com/web');
        $('#tt').attr('name','query');
    }
    else if(ss==3){ //360
        $('#ss').attr('action','https://www.so.com/s');
        $('#tt').attr('name','q');
    }
    else if(ss==4){ //必应
        $('#ss').attr('action','https://cn.bing.com/search');
        $('#tt').attr('name','q');
    }
    });
</script>
@endsection