<?php

use Illuminate\Database\Seeder;

class MajorLinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('major_links')->delete();
        
        \DB::table('major_links')->insert(array (
            0 => 
            array (
                'id' => 2,
                'title' => '百度',
                'imgurl' => 'logo_img/20191213/GluTAz35bcczJmjavHo3jy5XxI8K2YCCVrdgBEDa.png',
                'url' => 'http://www.baidu.com',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 18:58:32',
                'updated_at' => '2019-12-13 18:58:32',
            ),
            1 => 
            array (
                'id' => 3,
                'title' => '淘宝',
                'imgurl' => 'logo_img/20191213/LmTcH9KhY0FISBWd9yudJ1iniUgCddmZCLQlfDCs.png',
                'url' => 'http://www.taobao.com',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 18:58:46',
                'updated_at' => '2019-12-13 18:58:46',
            ),
            2 => 
            array (
                'id' => 4,
                'title' => '新浪微博',
                'imgurl' => 'logo_img/20191213/syzKhROfD5P6F38yItRVEwriclvB7Uz7RD90mQgw.png',
                'url' => 'https://weibo.com',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 18:59:29',
                'updated_at' => '2019-12-13 18:59:29',
            ),
            3 => 
            array (
                'id' => 5,
                'title' => '京东商城',
                'imgurl' => 'logo_img/20191213/bgaJcaQhcIoqffnH31fVnuc4mTK9jjcpCaPlP4po.png',
                'url' => 'http://www.dongyao.ren/jd.php',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:00:05',
                'updated_at' => '2019-12-13 19:00:05',
            ),
            4 => 
            array (
                'id' => 6,
                'title' => '携程旅游',
                'imgurl' => 'logo_img/20191213/MVgidjZ5U5tDzQNTC2SLM2LwAaeJSqqeDdR1HxwK.png',
                'url' => 'http://hotels.ctrip.com?AllianceID=11175&sid=555450&ouid=&app=0301C00',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:00:40',
                'updated_at' => '2019-12-13 19:00:40',
            ),
            5 => 
            array (
                'id' => 7,
                'title' => '优酷网',
                'imgurl' => 'logo_img/20191213/fEd4Lps6NhvPuNbpxidBA54fzFbzQcoVLLRZ9SQw.png',
                'url' => 'https://www.youku.com',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:01:04',
                'updated_at' => '2019-12-13 19:01:04',
            ),
            6 => 
            array (
                'id' => 8,
                'title' => '腾讯新闻',
                'imgurl' => 'logo_img/20191213/HqGkG2FAHqMgmz8DaOio3fzTimWpYxxyp4AVwPe6.png',
                'url' => 'https://news.qq.com/',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:01:52',
                'updated_at' => '2019-12-13 19:01:52',
            ),
            7 => 
            array (
                'id' => 9,
                'title' => '唯品会',
                'imgurl' => 'logo_img/20191213/Qb5ovWzoff0gV8uD8uFOg8RidvNhIqhCse8mCajw.png',
                'url' => 'https://t.vip.com/qGb0Eds1LWA',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:39:49',
                'updated_at' => '2019-12-13 19:39:49',
            ),
            8 => 
            array (
                'id' => 10,
                'title' => '智联招聘',
                'imgurl' => 'logo_img/20191213/1jDo6BMLQI1m0SYOt17LpYye6FKGV8TW4xMQZF0m.png',
                'url' => 'https://www.zhaopin.com',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:40:17',
                'updated_at' => '2019-12-13 19:40:17',
            ),
            9 => 
            array (
                'id' => 11,
                'title' => '12306铁路',
                'imgurl' => 'logo_img/20191213/biKGeCR5wil3MqGe21hgM5WtMKRTCTcgH3xfexuG.png',
                'url' => 'https://www.12306.cn',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:43:25',
                'updated_at' => '2019-12-13 19:43:25',
            ),
            10 => 
            array (
                'id' => 12,
                'title' => '天猫超市',
                'imgurl' => 'logo_img/20191213/3G6bI1q6wLpsPCoswpPVdkwmbPO8AoK8SutDy9Gv.png',
                'url' => 'https://s.click.taobao.com/t?e=m%3D2%26s%3DeXF9sr1QGOscQipKwQzePDAVflQIoZeppRe%2F8jaAHci5VBFTL4hn2UdfgXS2ACzlnwuRopoI2iPVmSPsqHnUtSpR8sRS6dFeCPoDpJEjhBVxlp2Qd2s0tWV10D5zBFYEcSpj5qSCmbA%3D',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:43:57',
                'updated_at' => '2019-12-13 19:43:57',
            ),
            11 => 
            array (
                'id' => 13,
                'title' => '58同城',
                'imgurl' => 'logo_img/20191213/dIweHzf1dJlDHQ8xgUVcL24mLJLMSPe9myTnJMEU.png',
                'url' => 'https://58.com',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:44:24',
                'updated_at' => '2019-12-13 19:44:24',
            ),
            12 => 
            array (
                'id' => 14,
                'title' => '聚划算',
                'imgurl' => 'logo_img/20191213/8vCozxybVCmSFpYatFq6AY50dgIIeDds909MebhQ.png',
                'url' => 'https://s.click.taobao.com/t?e=m%3D2%26s%3Dx6i9Yt8FjvQcQipKwQzePCperVdZeJviEViQ0P1Vf2kguMN8XjClAuLnvWLIe7YQp484riHmHBUvuTCexJ5uFBzJRjY8Yc4N4zPKIuwZymiSm5usamS30eo0BcZWWIRYYA%2FDpPH01wK9AmARIwX9K%2BAjBDXvuqoU47FHjfsActnIQu5PdXpojKJn5AyUbPoV',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:44:54',
                'updated_at' => '2019-12-13 19:44:54',
            ),
            13 => 
            array (
                'id' => 15,
                'title' => '飞猪旅行',
                'imgurl' => 'logo_img/20191213/mnZ1HhmDif0UXj1FxYXwZmrOqU1btBarSa5vUH64.png',
                'url' => 'https://s.click.taobao.com/t?e=m%3D2%26s%3DdgfW4OE04EQcQipKwQzePCperVdZeJviEViQ0P1Vf2kguMN8XjClAoRtGrUynetZ4Kufsm6okeMvuTCexJ5uFBzJRjY8Yc4N4zPKIuwZymiSm5usamS30X7uq6sLYIqu0Q7QOybCaQy9AmARIwX9K9E0MBlxnM%2FDnaYpFBIfC%2F2orLd93QuCUMYOae24fhW0',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:45:24',
                'updated_at' => '2019-12-13 19:45:24',
            ),
            14 => 
            array (
                'id' => 16,
                'title' => '网易考拉',
                'imgurl' => 'logo_img/20191213/UjEewGN1V3j0fA3Q9WUFiiTDX74YXUFh5mdyZiGa.jpeg',
                'url' => 'http://163.lu/0LV963',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:46:07',
                'updated_at' => '2019-12-13 19:46:07',
            ),
            15 => 
            array (
                'id' => 17,
                'title' => '哔哩哔哩',
                'imgurl' => 'logo_img/20200102/nZxwMNihUV9PNgSPdrvujncXXReTbgu1HLXJFYar.png',
                'url' => 'https://www.gome.com.cn?cmpid=cps_20604_25079_&sid=20604&wid=25079',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:46:42',
                'updated_at' => '2020-01-02 15:51:09',
            ),
            16 => 
            array (
                'id' => 18,
                'title' => '同程旅游',
                'imgurl' => 'logo_img/20191213/HLBQc9kaCvFcQal9vjVIq0n30HGCCZTbJey0ZPnE.png',
                'url' => 'http://www.ly.com?refid=48050718',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:47:43',
                'updated_at' => '2019-12-13 19:47:43',
            ),
            17 => 
            array (
                'id' => 19,
                'title' => '新华网',
                'imgurl' => 'logo_img/20191213/xboepTnO1mEXlK8mihBBPlsp2uZUtxpBPdSn1es2.png',
                'url' => 'http://www.xinhuanet.com',
                'sort' => 0,
                'views' => 0,
                'created_at' => '2019-12-13 19:48:22',
                'updated_at' => '2019-12-13 19:48:22',
            ),
        ));
        
        
    }
}