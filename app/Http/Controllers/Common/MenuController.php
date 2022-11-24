<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $root_path;
    public function __construct()
    {
        error_reporting(0);
        $this->root_path = parse_url(url('/'))['path'].'/'.env('ADMIN_PREFIX', 'admin').'/';
    }
    //后台主菜单逻辑
    public function index()
    {
        $data['status'] = 0;
        $data['msg'] = 'success';

        $data['data']['pages']=$this->menuData();
        return $data;

    }

    public function menuData(){
//        先获取需要展示的分类
        $menus_main = Menu::where('isshow',1)->orderBy('sort','desc')->get()->toArray();
        return $this->getMenu($menus_main,0,'children',1,$this->root_path);
    }

    /**
     * 递归获取菜单数据
     */
    public function getMenu($menus_main,$parent_id=0,$sub='children',$level=1,$rootpath){
        $data = array();
        foreach($menus_main as $key=>$val){
            // menu菜单仅最高管理员（admin ID=1使用，其余用户无权限）
            if($val['url'] == 'menu'){
                if(session('aid') != 1){
                    continue;
                }
            }
            if($val['parent_id']==$parent_id){
                $val['level']=$level;
                unset($menus_main[$key]);
                $val[$sub]=$this->getMenu($menus_main,$val['id'],$sub,$level+1,$rootpath);
                $val['schemaApi'] = $rootpath.'handdle/'.$val['url'].'/body';
                if($val['ismenu'] == 1){
                    unset($val['schemaApi']);
                    unset($val['parent_id']);
                }
                unset($val['updated_at']);
                unset($val['created_at']);
                $val['url'] = $rootpath.'main/'.$val['url'];
                //外部跳转链接
                // if($val['islink']){
                //     unset($val['schemaApi']);
                //     unset($val['url']);
                //     $val['blank'] = false;
                //     $val['link'] = route('admin.login');
                // }
                $data[] = $val;
            }
        }
        return $data;
    }
}
