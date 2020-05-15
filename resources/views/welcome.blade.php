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
                        <div class="input-group-prepend">
                            <button type="button" id="anniu" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-paw text-muted"></i> 百度</button>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                              <a class="dropdown-item" onclick="sousuo(1)"><i class="fa fa-paw text-muted"></i> 百度</a>
                              <a class="dropdown-item" onclick="sousuo(2)"><i class="fa fa fa-scribd text-muted"></i> 搜狗</a>
                              <a class="dropdown-item" onclick="sousuo(3)"><i class="fa fa-eercast text-muted"></i> 360</a>
                              <a class="dropdown-item" onclick="sousuo(4)"><i class="fa fa-send-o text-muted"></i> 必应</a>
                            </div>
                          </div>
                            <input type="text" name="word" baiduSug="2" class="form-control" id="tt" placeholder="安全搜索，一键直达">
                            
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="submit">搜索</button>
                            </span>
                        </div>

                        <!-- 热门工具(待后续各项工具功能上线后开放) -->
                        <!-- <div class="card-body text-center ss_con">
                                    <div class="tags">
                                    <div class="tag tag-primary">热门工具<span class="tag-addon"><i class="fe fe-activity"></i></span></div>
                                      <span class="tag">One</span>
                                      <span class="tag">Two</span>
                                      <span class="tag">Three</span>
                                      <span class="tag">Four</span>
                                      <span class="tag">Five</span>
                                      <span class="tag">Six</span>
                                      <span class="tag">Seven</span>
                                      <span class="tag">Eight</span>
                                      <span class="tag">Nine</span>
                                      <span class="tag">Ten</span>
                                    </div>
                        </div> -->
                        <!-- 工具预留 -->
                        
                    </div>
                </form>
                </div>
            </div>
            <!-- END搜索框 -->

            <div class="row row-cards row-deck">

            <!-- 用户自定义网址预留Start -->
              <div class="col-12">

                <div class="card">
                  <div class="table-responsive">

                  <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                      <tbody>
                        <tr>
                          @foreach($majors as $key=>$major)
                          @if($key<=5)
                          <td style="text-align:center">
                              <a rel="nofollow"  href="{{ $major->url}}" target="_blank"> <div class="avatar d-block;center-block" style="background-image: url({{ asset('uploads') }}/{{$major->imgurl}})"></div>
                              <div>{{ $major->title}}</div></a>
                          </td>
                          @endif
                          @endforeach
                        </tr>
                        <tr>
                          @foreach($majors as $key=>$major)
                          @if($key>5 && $key<='11')
                          <td style="text-align:center">
                          <a rel="nofollow"  href="{{ $major->url}}" target="_blank"> <div class="avatar d-block;center-block" style="background-image: url({{ asset('uploads') }}/{{$major->imgurl}})"></div>
                              <div>{{ $major->title}}</div></a>
                          </td>
                          @endif
                          @endforeach
                        </tr>
                        <tr>
                          @foreach($majors as $key=>$major)
                          @if($key>11)
                          <td style="text-align:center">
                          <a rel="nofollow"  href="{{ $major->url}}" target="_blank"> <div class="avatar d-block;center-block" style="background-image: url({{ asset('uploads') }}/{{$major->imgurl}})"></div>
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
              <!-- 用户自定义网址预留END -->
                
                <div class="col-lg-3" id="remen" style="display:block">
                <!-- 广告位功能后续将扩展到管理后台控制 -->
                <div class="card">
                      <img src="http://cdn.dongyao.ren/ad.png">
                </div>
                <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">热门关注</h4><span class="text-muted">test</span>
                      </div>
                      <table class="table card-table">
                        <tbody>
                        @foreach($news_data as $key=>$news)
                         <tr>
                          <td width="1"><small>{{ $key+1 }}</small></td>
                          <td> <a style="font-size:12px" target="_blank"  href="http://wwww.baidu.com/s?word={{ $news['key'] }}">{{ Str::limit($news['key'],23,'…') }}</a></td>
                          <td class="text-muted"><small><span class="text-danger">{{ $news['icon'] }}</span></small></td>
                      
                        </tr>
                        @endforeach
                      </tbody></table>
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
                          <td> <a style="font-size:12px" target="_blank" href="{{ url('article/info') }}/{{$ma->id}}">{{ Str::limit($ma->title,22,'…') }}</a></td>
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
                                <td><a  style="font-size:12px"  href="{{ url('article/info') }}/{{$ha->id}}">{{ Str::limit($ha->title,22,'…')}}</a></td>
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
                          <td><a rel="nofollow"  target="_blank" href="{{$url->url}}" class="text-primary">{{$url->title}}</a></td>
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
    function sousuo(ss){
    if(ss==1){ //百度
        $('#ss').attr('action','http://wwww.baidu.com/s');
        $('#tt').attr('name','word');
        $('#anniu').text('百度');
    }
    else if(ss==2){ //搜狗
        $('#ss').attr('action','http://www.sogou.com/web');
        $('#tt').attr('name','query');
        $('#anniu').text('搜狗');
    }
    else if(ss==3){ //360
        $('#ss').attr('action','https://www.so.com/s');
        $('#tt').attr('name','q');
        $('#anniu').text('360');
    }
    else if(ss==4){ //必应
        $('#ss').attr('action','https://cn.bing.com/search');
        $('#tt').attr('name','q');
        $('#anniu').text('必应');
    }
    };
</script>
@endsection