<?php

use Illuminate\Database\Seeder;

class NavigationCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('navigation_categories')->delete();
        
        \DB::table('navigation_categories')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => '购物',
                'sort' => 0,
                'created_at' => '2019-12-13 16:33:44',
                'updated_at' => '2019-12-13 16:33:44',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => '视频',
                'sort' => 0,
                'created_at' => '2019-12-13 16:34:24',
                'updated_at' => '2019-12-13 16:34:24',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => '新闻',
                'sort' => 0,
                'created_at' => '2019-12-13 16:34:29',
                'updated_at' => '2019-12-13 16:34:29',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => '体育',
                'sort' => 0,
                'created_at' => '2019-12-13 16:34:33',
                'updated_at' => '2019-12-13 16:34:33',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => '银行',
                'sort' => 0,
                'created_at' => '2019-12-13 16:34:42',
                'updated_at' => '2019-12-13 16:34:42',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => '生活',
                'sort' => 0,
                'created_at' => '2019-12-13 16:34:51',
                'updated_at' => '2019-12-13 16:34:51',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => '游戏',
                'sort' => 0,
                'created_at' => '2019-12-13 16:34:55',
                'updated_at' => '2019-12-13 16:34:55',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => '社交',
                'sort' => 0,
                'created_at' => '2019-12-13 16:35:03',
                'updated_at' => '2019-12-13 16:35:03',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => '软件',
                'sort' => 0,
                'created_at' => '2019-12-13 16:35:08',
                'updated_at' => '2019-12-13 16:35:08',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => '手机',
                'sort' => 0,
                'created_at' => '2019-12-13 16:35:18',
                'updated_at' => '2019-12-13 16:35:18',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => '汽车',
                'sort' => 0,
                'created_at' => '2019-12-13 16:35:25',
                'updated_at' => '2019-12-13 16:35:25',
            ),
            11 => 
            array (
                'id' => 13,
                'name' => '旅游',
                'sort' => 0,
                'created_at' => '2019-12-13 16:35:32',
                'updated_at' => '2019-12-13 16:35:32',
            ),
            12 => 
            array (
                'id' => 14,
                'name' => '财经',
                'sort' => 0,
                'created_at' => '2019-12-13 16:36:23',
                'updated_at' => '2019-12-13 16:36:23',
            ),
            13 => 
            array (
                'id' => 15,
                'name' => '小说',
                'sort' => 0,
                'created_at' => '2019-12-13 16:36:28',
                'updated_at' => '2019-12-13 16:36:28',
            ),
            14 => 
            array (
                'id' => 16,
                'name' => '音乐',
                'sort' => 0,
                'created_at' => '2019-12-13 16:36:37',
                'updated_at' => '2019-12-13 16:36:37',
            ),
            15 => 
            array (
                'id' => 17,
                'name' => '设计',
                'sort' => 0,
                'created_at' => '2020-01-02 10:50:38',
                'updated_at' => '2020-01-02 10:50:38',
            ),
        ));
        
        
    }
}