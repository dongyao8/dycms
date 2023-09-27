<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
     //数据接口
     public function datalist(Request $request)
     {
         $canshu = $request->all();
         $data = new Category();
         $data = $data->orderBy('sort', 'desc');
         if (isset($canshu['keywords']) && !empty($canshu['keywords'])) {
             $data = $data->where('c_title', 'like', "%" . $canshu['keywords'] . "%");
         }
         $data = $data->withCount('article');
         $data = $data->paginate(10);
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
             'api' => $this->admin_url.'/handdle/category/datalist',
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
                     'name' => 'c_title',
                     'label' => '分类名称',
                     'copyable' => true
                 ], [
                     'name' => 'article_count',
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
             'title' => '文章分类',
             'body' => $body,
         ];
         return $data;
     }
 
     // 增加分类
     public function addnav()
     {
         //新增分类按钮
         return [
             'label' => '新增文章分类',
             'type' => 'button',
             'actionType' => 'dialog',
             "level" => "primary",
             'dialog' => [
                 'title' => '新增文章分类',
                 'body' => [
                     'type' => 'form',
                     'api' => $this->admin_url.'/handdle/category/adds',
                     'body' => array(
                         [
                             'type' => 'input-text',
                             'name' => 'c_title',
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
     // 新增逻辑
     public function adds(Request $request)
     {
         $device = new Category();
         $title = $device->where('c_title', $request->input('c_title'))->first();
         if ($title) {
             return $this->apiReturn(100, '该分类已存在', []);
         }
         // 继续写入
         $device->c_title = $request->input('c_title');
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
                     'api' => $this->admin_url.'/handdle/category/update',
                     'body' => array(
                         [
                             'type' => 'hidden',
                             'name' => 'id'
                         ],
                         [
                             'type' => 'input-text',
                             'name' => 'c_title',
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
         $device = new Category();
         $title = $device->where('c_title', $request->input('c_title'))->first();
         if ($title) {
             if ($title->id != $request->input('id')) {
                 return $this->apiReturn(100, '该分类已存在', []);
             }
         }
         // 继续写入
         $device = Category::find($request->input('id'));
         $device->c_title = $request->input('c_title');
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
             "api"=> $this->admin_url.'/handdle/category/deletedata'.'?id=${id}',
         ];
     }
     // 删除逻辑
     public function deletedata(Request $request){
         $navigation = Category::withCount('article')->find($request->input('id'));
         if($navigation){
             if($navigation->article_count > 0){
                 return $this->apiReturn(100, '该分类下存在正在使用的文章，请删除所有文章后再删除分类', []);
             }else{
                 $navigation->delete();
                 return $this->apiReturn(0, '已删除', []);
             }
         }else{
             return $this->apiReturn(100, '参数错误', []);
         }
          
     }
}
