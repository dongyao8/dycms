<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
	public function __construct()
	{
		// 菜单设计仅最高管理员可用
		Controller::__construct();
		if (session('aid') != 1) {
			abort(404, '无权限');
		}
	}
	//后台菜单管理
	//数据接口
	public function datalist()
	{
		$menus_main = Menu::orderBy('sort', 'desc')->get()->toArray();
		$data = $this->getMenu($menus_main);
		$cate['status'] = 0;
		$cate['msg'] = 'success';
		$cate['data']['items'] = $data;
		return $cate;
	}
	//树形菜单
	public function getMenu($menus_main, $parent_id = 0, $sub = 'children', $level = 1)
	{
		// $menus_main = Menu::orderBy('sort', 'desc')->get()->toArray();
		$data = array();
		foreach ($menus_main as $key => $val) {
			$val['value'] = $val['id'];
			if ($parent_id == $val['parent_id']) {
				$val['level'] = $level;
				unset($menus_main[$key]);
				$val[$sub] = $this->getMenu($menus_main, $val['id'], $sub, $level + 1);
				$data[] = $val;
			}
		}
		return $data;
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
			'api' => $this->admin_url . '/handdle/menu/datalist',
			'quickSaveApi' => $this->admin_url . '/handdle/menu/edit',
			'columns' => array(
				[
					'name' => 'id',
					'label' => 'ID',
				], [
					'name' => 'icon',
					'type' => 'icon',
					'label' => '图标',
					'vendor' => '',
					'icon' => '$icon',
					'quickEdit' => true
				],
				[
					'name' => 'label',
					'label' => '菜单名称',
					'quickEdit' => true
				], [
					'type' => 'switch',
					'name' => 'isshow',
					'label' => '菜单开关',
					'quickEdit' => [
						'mode' => 'inline',
						'type' => 'switch',
						"trueValue" => 1,
						"falseValue" => 0
					]
				], [
					'label' => '菜单路径',
					'name' => 'url',
					'quickEdit' => true

				], [
					'label' => '排序值[数字越大越靠前]',
					'name' => 'sort',
					'quickEdit' => [
						'mode' => 'inline'
					]

				],
				[
					'type' => 'operation',
					'label' => '操作',
					'buttons' => [
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
			'title' => '后台菜单管理',
			'body' => $body,
		];
		return $data;
	}

	// 增加分类
	public function addnav()
	{
		//新增分类按钮
		return [
			'label' => '新增菜单',
			'type' => 'button',
			'actionType' => 'dialog',
			"level" => "primary",
			'dialog' => [
				'title' => '新增菜单',
				'body' => [
					'type' => 'form',
					'api' => $this->admin_url . '/handdle/menu/adds',
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
							'name' => 'label',
							'required' => true,
							'label' => '菜单名称'
						],
						[
							'type' => 'input-text',
							'name' => 'url',
							'required' => true,
							'label' => '菜单路径',
							'hiddenOn' => 'this.parent_id == 0'
						],
						[
							'type' => 'input-text',
							'name' => 'icon',
							'required' => true,
							'value' => 'fa fa-envelope',
							'label' => 'Fontawesome图标'
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
		$datalist = $this->datalist();
		$father[] = [
			'id' => 0,
			'label' => '顶级菜单',
			'value' => 0,
			'icon' => 'fa fa-arrow-up'
		];
		$data = $datalist['data']['items'];
		$data = array_merge($father, $data);
		return $data;
	}
	// 新增逻辑
	public function adds(Request $request)
	{
		$data = $request->all();
		// 路径url不能重复，添加前判断,顶级菜单url路径为空，无需判断
		if ($data['parent_id'] > 0) {
			// 子菜单
			$check_url = Menu::where('url', $data['url'])->first();
			if ($check_url) {
				return $this->apiReturn(300, '菜单路径重复');
			}
		}
		// 无重复，继续添加
		$menu = new Menu();
		$menu->parent_id = $data['parent_id'];
		$menu->isshow = 0; //新添加菜单默认不显示
		$menu->label = $data['label'];
		$menu->icon = $data['icon'];
		$menu->ismenu = 0; //默认为零，暂无作用
		$menu->sort = $data['sort'];
		if ($data['parent_id'] > 0) {
			// 子菜单
			$menu->url = $data['url'];
		} else {
			// 顶级菜单url路径为空
			$menu->url = "";
		}
		$menu->save();
		return $this->apiReturn(0);
	}

	// 修改数据
	public function edit(Request $request)
	{
		error_reporting(0);
		$data = $request->all();
		$edit = $data['rowsDiff'];
		if(count($edit) <=0){
			return $this->apiReturn(300,'未修改数据');
		}
		foreach($edit as $key => $val){
			$item = Menu::find($val['id']);
			if(!$item){
				return $this->apiReturn(400,'参数错误');
			}
			if($item->parent_id > 0){
				// 子菜单，需要校验路径唯一性
				if(isset($val['url']) || strlen($val['url']) > 0){
					$check_url = Menu::where('url', $val['url'])->first();
					if ($check_url) {
						return $this->apiReturn(300, '菜单路径重复');
					}
				}
			}else{
				//顶级菜单
				unset($val['url']);
			}
			foreach($val as $k=>$v){
				if($k != 'id'){
					$item->$k = $v;
				}
			}
			$item->save();
		}
		return $this->apiReturn(0);
	}

	// 菜单数据
	public function menudata($parent_id = 0, $sub = 'children', $level = 1, $rootpath)
	{
		$menus_main = Menu::orderBy('sort', 'desc')->get()->toArray();
		$data = array();
		foreach ($menus_main as $key => $val) {
			if ($val['parent_id'] == $parent_id) {
				$val['level'] = $level;
				unset($menus_main[$key]);
				$val[$sub] = $this->getMenu($menus_main, $val['id'], $sub, $level + 1, $rootpath);
				$data[] = $val;
			}
		}
		return $data;
	}

	// 删除数据
	public function delete()
	{
		//新增分类按钮
		return [
			'label' => '删除',
			'type' => 'button',
			'actionType' => 'ajax',
			"level" => "danger",
			"confirmText" => "确定要删除该菜单吗",
			"api" => $this->admin_url . '/handdle/menu/deletedata' . '?id=${id}',
		];
	}

	// 删除逻辑
	public function deletedata(Request $request)
	{
		$item = Menu::find($request->input('id'));
		if ($item) {
			// 判断是否有子目录
			$son = Menu::where('parent_id', $request->id)->count();
			if ($son > 0) {
				return $this->apiReturn(100, '该菜单还有子菜单，无法删除，请先删除子菜单', []);
			} else {
				$item->delete();
				return $this->apiReturn(0, '已删除', []);
			}
		} else {
			return $this->apiReturn(100, '参数错误', []);
		}
	}
}
