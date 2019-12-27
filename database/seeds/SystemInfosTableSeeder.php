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
            'web_title' => 'DYCMS内容导航',
            'web_desc' => '内容导航平台第一站',
            'web_url' => 'http://www.dongyao.ren',
            'web_logo'    => 'sys_img/logo.png',
            'tongji'    => '<script type="text/javascript" src="https://s11.cnzz.com/z_stat.php?id=1257015062&web_id=1257015062"></script>',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
    }
}
