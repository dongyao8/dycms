<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    //数据接口
    public function datalist(Request $request)
    {
        $canshu = $request->all();
        $data = new Article();
        $data = $data->orderBy('id', 'desc');
        if (isset($canshu['title']) && !empty($canshu['title'])) {
            $data = $data->where('title', 'like', "%" . $canshu['title'] . "%");
        }
        $data = $data->paginate(10);
        foreach ($data as $d) {
            $d->imgurl =  url('/') . Storage::url($d->imgurl);
            $d->class =  $d->category->c_title;
        }
        $cate['status'] = 0;
        $cate['msg'] = 'success';
        $cate['data']['items'] = $data->toarray()['data'];
        $cate['data']['total'] = $data->toarray()['total'];
        return $cate;
    }

    //首页
    public function body()
    {
        $body[] = [
            'type' => 'crud',
            'headerToolbar' => [
                ["reload"],
                $this->addnav()

            ],
            'syncLocation' => false,
            'name' => 'duelist',
            'api' => $this->admin_url.'/handdle/article/datalist',
            'filter' => [
                'title' => '搜索内容',
                "mode" => "horizontal",
                'body' => [
                    'type' => 'input-text',
                    'name' => 'keywords',
                    'label' => '文章标题',
                    'placeholder' => '文章标题'
                ]
            ],
            'columns' => array(
                [
                    'name' => 'id',
                    'label' => 'ID',
                ], [
                    'name' => 'title',
                    'label' => '标题',
                    'copyable' => true
                ], [
                    'name' => 'class',
                    'label' => '所属分类'
                ], [
                    'name' => 'views',
                    'label' => '阅读量'
                ], [
                    'type' => 'image',
                    'name' => 'imgurl',
                    'label' => '封面图',
                    'thumbRatio' => '1:1',
                    'enlargeAble' => true

                ], [
                    'label' => '是否推荐',
                    'name' => 'ishot',
                    "type" => "status",
                    "classNameExpr" => "<%= data.ishot == 1 ? 'text-danger leading-relaxed' : '' %>",
                    "map" => [
                        "0" => "fa fa-tag",
                        "1" => 'fa fa-star'
                    ],
                    "labelMap" => [
                        "0" => '未推荐',
                        "1" => '热门推荐',
                    ]

                ], [
                    'type' => 'operation',
                    'label' => '操作',
                    'buttons' => [
                         $this->edit(), //修改
                         $this->delete() //删除
                    ]
                ]
            ),
            'footerToolbar' => [
                'pagination',
                'statistics'
            ],
        ];

        $data = [
            'type' => 'page',
            'title' => '文章资讯',
            'body' => $body,
        ];
        return $data;
    }
    // 获取分类列表信息
    public function getCat()
    {
        // 查询分类列表
        return $cat = Category::orderBy('id', 'desc')->select('id as value', 'c_title as label')->get();
    }
    // 增加分类
    public function addnav()
    {

        //新增文章按钮
        return [
            'label' => '新增文章',
            'type' => 'button',
            'actionType' => 'dialog',
            "level" => "primary",
            'dialog' => [
                'title' => '新增文章',
                'size' => 'lg',
                'body' => [
                    'type' => 'form',
                    'api' => $this->admin_url.'/handdle/article/adds',
                    'body' => array(
                        [
                            'type' => 'input-image',
                            'name' => 'imgurl',
                            'label' => '封面图',
                            'required' => true,
                            "receiver" =>  route('admin.upfile') . "?path=article_cover",
                        ], [
                            'type' => 'input-text',
                            'name' => 'title',
                            'required' => true,
                            'label' => '文章标题'
                        ],
                        [
                            'type' => 'select',
                            'name' => 'category_id',
                            'required' => true,
                            'label' => '所属分类',
                            'options' => $this->getCat()->toArray()
                        ],
                        [
                            'type' => 'input-rich-text',
                            "receiver" =>  route('admin.attachment') . "?path=article_content",
                            'name' => 'content',
                            'required' => true,
                            'label' => '文章内容'
                        ],
                        [
                            'type' => 'switch',
                            'name' => 'ishot',
                            'required' => true,
                            'label' => '是否推荐',
                            'onText' => '热门推荐',
                            'offText' => '未推荐',
                            'trueValue' => '1',
                            'falseValue' => '0',
                            'value' => 0,
                            'desc' => '推荐内容将展示在首页突出位置'
                        ]
                    )
                ]
            ]
        ];
    }

    // 新增逻辑
    public function adds(Request $request)
    {
        $article = new Article();
        // 继续写入
        $article->user_id = 0; //默认0，后续可能会用到用户投稿功能
        $article->title = $request->input('title');
        $article->imgurl = $request->input('imgurl');
        $article->category_id = $request->input('category_id');
        $article->content = $request->input('content');
        $article->ishot = $request->input('ishot');
        $article->save();
        return $this->apiReturn(0);
    }

    // 修改数据
    public function edit()
    {
        //新增分类按钮
        return [
            'label' => '修改文章',
            'type' => 'button',
            'actionType' => 'dialog',
            "level" => "primary",
            'dialog' => [
                'title' => '修改文章',
                'size' => 'lg',
                'body' => [
                    'type' => 'form',
                    'api' => $this->admin_url.'/handdle/article/update',
                    'body' => array(
                        [
                            'type' => 'hidden',
                            'name' => 'id'
                        ],
                        [
                            'type' => 'input-image',
                            'name' => 'imgurl',
                            'label' => '封面图',
                            'required' => true,
                            "receiver" =>  route('admin.upfile') . "?path=article_cover",
                        ], [
                            'type' => 'input-text',
                            'name' => 'title',
                            'required' => true,
                            'label' => '文章标题'
                        ],
                        [
                            'type' => 'select',
                            'name' => 'category_id',
                            'required' => true,
                            'label' => '所属分类',
                            'options' => $this->getCat()->toArray()
                        ],
                        [
                            'type' => 'input-rich-text',
                            "receiver" =>  route('admin.attachment') . "?path=article_content",
                            'name' => 'content',
                            'required' => true,
                            'label' => '文章内容'
                        ],
                        [
                            'type' => 'switch',
                            'name' => 'ishot',
                            'required' => true,
                            'label' => '是否推荐',
                            'onText' => '热门推荐',
                            'offText' => '未推荐',
                            'trueValue' => '1',
                            'falseValue' => '0',
                            'value' => 0,
                            'desc' => '推荐内容将展示在首页突出位置'
                        ]
                    )
                ]
            ]
        ];
    }
    // 更新逻辑
    public function update(Request $request)
    {
        $article = Article::find($request->input('id'));
        if(!$article){
            return $this->apiReturn(100, '参数错误', []);
        }
        // 继续写入
        $article->title = $request->input('title');
        $article->category_id = $request->input('category_id');
        $article->content = $request->input('content');
        $article->ishot = $request->input('ishot');
        if($request->input('imgurl')){
            $coverimg = str_replace(url('/') . '/storage/', "", $request->input('imgurl'));
            if($coverimg != $article->imgurl){
                $article->imgurl = $request->input('imgurl');
            }
        }
        $article->save();
        return $this->apiReturn(0);
    }


    // 删除数据
    public function delete()
    {
        //新增分类按钮
        return [
            'label' => '删除文章',
            'type' => 'button',
            'actionType' => 'ajax',
            "level" => "danger",
            "confirmText"=> "确定要删除该文章吗",
            "api"=> $this->admin_url.'/handdle/article/deletedata'.'?id=${id}',
        ];
    }
    // 删除逻辑
    public function deletedata(Request $request){
        $article = Article::find($request->input('id'));
        if($article){
            $article->delete();
            return $this->apiReturn(0, '已删除', []);
        }else{
            return $this->apiReturn(100, '参数错误', []);
        }
         
    }
}
