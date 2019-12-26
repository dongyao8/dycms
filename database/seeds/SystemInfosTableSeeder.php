<?php

use Illuminate\Database\Seeder;

class SystemInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_infos')->truncate();
        DB::table('system_infos')->insert([
            'web_title' => '我的网站',
            'web_desc' => '免费开源的网址导航内容网站',
            'web_url' => 'http://www.dongyao.ren',
            'web_logo'    => 'sys_img/tabler.svg',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
    }
}
