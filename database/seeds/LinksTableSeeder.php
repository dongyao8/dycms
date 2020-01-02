<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('links')->delete();
        
        \DB::table('links')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => '百度',
                'url' => 'http://www.baidu.com',
                'sort' => 0,
                'status' => 1,
                'created_at' => '2019-12-10 20:43:57',
                'updated_at' => '2019-12-10 20:43:57',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => '淘宝网',
                'url' => 'http://www.taobao.com',
                'sort' => 10,
                'status' => 1,
                'created_at' => '2019-12-10 20:46:39',
                'updated_at' => '2019-12-11 11:43:23',
            ),
            2 => 
            array (
                'id' => 4,
                'title' => '作者博客',
                'url' => 'https://www.dongyao.ren/',
                'sort' => 0,
                'status' => 1,
                'created_at' => '2019-12-12 12:36:34',
                'updated_at' => '2019-12-12 12:36:34',
            ),
            3 => 
            array (
                'id' => 5,
                'title' => '网址导航',
                'url' => 'http://hao.dongyao.ren',
                'sort' => 0,
                'status' => 1,
                'created_at' => '2019-12-24 18:39:49',
                'updated_at' => '2019-12-24 18:39:49',
            ),
            4 => 
            array (
                'id' => 6,
                'title' => '开源地址',
                'url' => 'https://github.com/dongyao8/dycms',
                'sort' => 0,
                'status' => 1,
                'created_at' => '2019-12-24 18:41:00',
                'updated_at' => '2019-12-30 11:28:21',
            ),
            5 => 
            array (
                'id' => 7,
                'title' => '阿里云',
                'url' => 'https://www.aliyun.com/minisite/goods?userCode=qotlhkf7',
                'sort' => 0,
                'status' => 1,
                'created_at' => '2019-12-26 17:28:24',
                'updated_at' => '2019-12-26 17:28:24',
            ),
            6 => 
            array (
                'id' => 8,
                'title' => '腾讯云',
                'url' => 'https://cloud.tencent.com/act/cps/redirect?redirect=11530&cps_key=332bbc33cf8fc64bc6523ac941a03580',
                'sort' => 0,
                'status' => 1,
                'created_at' => '2019-12-26 17:31:57',
                'updated_at' => '2019-12-26 17:31:57',
            ),
        ));
        
        
    }
}