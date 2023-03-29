<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavigationCategory;
use Illuminate\Http\Request;

class NavController extends Controller
{
    //数据接口
    public function datalist(Request $request)
    {
        $canshu = $request->all();
        $data = new NavigationCategory();
        $data = $data->orderBy('sort', 'desc');
        if (isset($canshu['keywords']) && !empty($canshu['keywords'])) {
            $data = $data->where('title', 'like', "%" . $canshu['keywords'] . "%");
        }
        $data = $data->where('parent_id',0);
        $data = $data->withCount('navigation');
        $data = $data->paginate(10);
        $datas = $this->getMenu($data);
        $cate['status'] = 0;
        $cate['msg'] = 'success';
        $cate['data']['items'] = $datas->toarray()['data'];
        $cate['data']['total'] = $data->toarray()['total'];
        return $cate;
    }
    //树形菜单
	public function getMenu($menus_main)
	{
		foreach ($menus_main as $menu) {
            $menu->children = $menu->recursiveChildren();
            $menu->label = $menu->title;
            $menu->value = $menu->id;
        }
		return $menus_main;
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
            'api' => $this->admin_url.'/handdle/nav/datalist',
            'filter' => [
                'title' => '搜索内容',
                "mode" => "horizontal",
                'body' => [
                    'type' => 'input-text',
                    'name' => 'keywords',
                    'label' => '分类名称',
                    'placeholder' => '分类名称'
                ]
            ],
            'columns' => array(
                [
                    'name' => 'id',
                    'label' => 'ID',
                ],
                [
                    'name' => 'title',
                    'label' => '分类名称',
                    'copyable' => true
                ], [
                    'name' => 'navigation_count',
                    'label' => '网址数量'
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

    // 增加分类
    public function addnav()
    {
        //新增分类按钮
        return [
            'label' => '新增导航分类',
            'type' => 'button',
            'actionType' => 'dialog',
            "level" => "primary",
            'dialog' => [
                'title' => '新增分类',
                'body' => [
                    'type' => 'form',
                    'api' => $this->admin_url.'/handdle/nav/adds',
                    'body' => array(
                        [
							'type' => 'tree-select',
							'name' => 'parent_id',
							'required' => true,
							'label' => '菜单级别',
							'searchable' => true,
							'options' => $this->getCat()
						],
                        [
                            'type' => 'input-text',
                            'name' => 'title',
                            'required' => true,
                            'label' => '分类名称'
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
    // 菜单级别
	public function getCat()
	{
		$datalist =NavigationCategory::orderBy('sort', 'desc')->get();
        $data = $this->getMenu($datalist);
		$father[] = [
			'id' => 0,
			'label' => '顶级菜单',
			'value' => 0,
			'icon' => 'fa fa-arrow-up'
		];
		$data = array_merge($father, $data->toArray());
		return $data;
	}
    // 新增逻辑
    public function adds(Request $request)
    {
        $device = new NavigationCategory();
        $title = $device->where('title', $request->input('title'))->first();
        if ($title) {
            return $this->apiReturn(100, '该分类已存在', []);
        }
        // 继续写入
        $device->parent_id = $request->input('parent_id');
        $device->title = $request->input('title');
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
                    'api' => $this->admin_url.'/handdle/nav/update',
                    'body' => array(
                        [
                            'type' => 'hidden',
                            'name' => 'id'
                        ],
                        [
							'type' => 'tree-select',
							'name' => 'parent_id',
							'required' => true,
							'label' => '菜单级别',
							'searchable' => true,
							'options' => $this->getCat()
						],
                        [
                            'type' => 'input-text',
                            'name' => 'title',
                            'required' => true,
                            'label' => '分类名称'
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
        $device = new NavigationCategory();
        $title = $device->where('title', $request->input('title'))->first();
        if ($title) {
            if ($title->id != $request->input('id')) {
                return $this->apiReturn(100, '该分类已存在', []);
            }
        }
        // 继续写入
        $device = NavigationCategory::find($request->input('id'));
        $device->parent_id = $request->input('parent_id');
        $device->title = $request->input('title');
        $device->sort = $request->input('sort');

        $device->save();
        return $this->apiReturn(0);
    }

    // 删除数据
    public function delete()
    {
        //新增分类按钮
        return [
            'label' => '删除分类',
            'type' => 'button',
            'actionType' => 'ajax',
            "level" => "danger",
            "confirmText"=> "确定要删除该分类吗",
            "api"=> $this->admin_url.'/handdle/nav/deletedata'.'?id=${id}',
        ];
    }
    // 删除逻辑
    public function deletedata(Request $request){
        $navigation = NavigationCategory::withCount('navigation')->find($request->input('id'));
        if($navigation){
            if($navigation->navigation_count > 0){
                return $this->apiReturn(100, '该分类下存在正在使用的网址，请删除所有网址后再删除分类', []);
            }else{
                $navigation->delete();
                return $this->apiReturn(0, '已删除', []);
            }
        }else{
            return $this->apiReturn(100, '参数错误', []);
        }
         
    }
}
