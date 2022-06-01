<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\NavigationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NavigationController extends Controller
{
    //数据接口
    public function datalist(Request $request)
    {
        $canshu = $request->all();
        $data = new Navigation();
        $data = $data->orderBy('sort', 'desc');
        if (isset($canshu['keywords']) && !empty($canshu['keywords'])) {
            $data = $data->where('title', 'like', "%" . $canshu['keywords'] . "%");
        }
        $data = $data->with('category');
        $data = $data->paginate(10);
        foreach ($data as $d) {
            $d->cover =  url('/') . Storage::url($d->cover);
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
            'api' => url('admin/handdle/navigation/datalist'),
            'filter' => [
                'title' => '搜索内容',
                "mode" => "horizontal",
                'body' => [
                    'type' => 'input-text',
                    'name' => 'keywords',
                    'label' => '网站名称',
                    'placeholder' => '网站名称'
                ]
            ],
            'columns' => array(
                [
                    'name' => 'id',
                    'label' => 'ID',
                ], [
                    'name' => 'title',
                    'label' => '网站名称',
                    'copyable' => true
                ], [
                    'type' => 'image',
                    'name' => 'cover',
                    'label' => '封面图',
                    'thumbRatio' => '1:1',
                    'enlargeAble' => true

                ], [
                    'name' => 'category.title',
                    'label' => '所属分类'
                ], [
                    'label' => '排序值[数字越大越靠前]',
                    'name' => 'sort'

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
            'title' => '网址分类',
            'body' => $body,
        ];
        return $data;
    }
    // 获取分类列表信息
    public function getCat()
    {
        // 查询分类列表
       return $cat = NavigationCategory::orderBy('sort', 'desc')->select('id as value', 'title as label')->get();
    }

    // 增加分类
    public function addnav()
    {

        //新增分类按钮
        return [
            'label' => '新增网站',
            'type' => 'button',
            'actionType' => 'dialog',
            "level" => "primary",
            'dialog' => [
                'title' => '新增网站',
                'body' => [
                    'type' => 'form',
                    'api' => url('admin/handdle/navigation/adds'),
                    'body' => array(
                        [
                            'type' => 'input-image',
                            'name' => 'cover',
                            'label' => '封面图',
                            'required' => true,
                            "receiver" =>  route('admin.upfile') . "?path=site_icon",
                        ], [
                            'type' => 'input-text',
                            'name' => 'title',
                            'required' => true,
                            'label' => '网站名称'
                        ], [
                            'type' => 'input-text',
                            'name' => 'url',
                            'required' => true,
                            'label' => '网站地址'
                        ],
                        [
                            'type' => 'select',
                            'name' => 'navigation_category_id',
                            'required' => true,
                            'label' => '所属分类',
                            'options' => $this->getCat()->toArray()
                        ],
                        [
                            'type' => 'input-number',
                            'name' => 'sort',
                            'required' => true,
                            'value' => 0,
                            'label' => '排序值',
                            'desc' => '【数字越大，排序越靠前】'
                        ]
                    )
                ]
            ]
        ];
    }

    // 新增逻辑
    public function adds(Request $request)
    {
        $device = new Navigation();
        $title = $device->where('title', $request->input('title'))->first();
        if ($title) {
            return $this->apiReturn(100, '该分类已存在', []);
        }
        // 继续写入
        $device->title = $request->input('title');
        $device->cover = $request->input('cover');
        $device->url = $request->input('url');
        $device->navigation_category_id = $request->input('navigation_category_id');
        $device->sort = $request->input('sort');
        $device->save();
        return $this->apiReturn(0);
    }

    // 修改数据
    public function edit()
    {
        //新增分类按钮
        return [
            'label' => '修改数据',
            'type' => 'button',
            'actionType' => 'dialog',
            "level" => "primary",
            'dialog' => [
                'title' => '修改数据',
                'body' => [
                    'type' => 'form',
                    'api' => url('admin/handdle/navigation/update'),
                    'body' => array(
                        [
                            'type' => 'hidden',
                            'name' => 'id'
                        ],
                        [
                            'type' => 'input-image',
                            'name' => 'cover',
                            'label' => '封面图',
                            "receiver" =>  route('admin.upfile') . "?path=site_icon",
                        ],
                        [
                            'type' => 'input-text',
                            'name' => 'title',
                            'required' => true,
                            'label' => '分类名称'
                        ], [
                            'type' => 'input-text',
                            'name' => 'url',
                            'required' => true,
                            'label' => '网站地址'
                        ],
                        [
                            'type' => 'select',
                            'name' => 'navigation_category_id',
                            'required' => true,
                            'label' => '所属分类',
                            'options' => $this->getCat()->toArray()
                        ],
                        [
                            'type' => 'input-number',
                            'name' => 'sort',
                            'required' => true,
                            'value' => 0,
                            'label' => '排序值',
                            'desc' => '【数字越大，排序越靠前】'
                        ]
                    )
                ]
            ]
        ];
    }
    // 更新逻辑
    public function update(Request $request)
    {
        $device = Navigation::find($request->input('id'));
        if(!$device){
            return $this->apiReturn(100, '参数错误', []);
        }
        // 继续写入
        $device->title = $request->input('title');
        $device->url = $request->input('url');
        $device->navigation_category_id = $request->input('navigation_category_id');
        $device->sort = $request->input('sort');
        if($request->input('cover')){
            $coverimg = str_replace(url('/') . '/storage/', "", $request->input('cover'));
            if($coverimg != $device->cover){
                $device->cover = $request->input('cover');
            }
        }
        $device->save();
        return $this->apiReturn(0);
    }

    // 删除数据
    public function delete()
    {
        return [];
    }
}
