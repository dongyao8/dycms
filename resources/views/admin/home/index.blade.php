<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8"/>
    <title>后台管理</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortc
    ut icon" href="{{url('/')}}/static/favicon.ico"/>
    <link rel="bookmark" href="{{url('/')}}/static/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <link rel="stylesheet" href="{{$dycms_static}}amis/{{env('ADMIN_THEME', 'sdk')}}.css"/>
    <link rel="stylesheet" href="{{$dycms_static}}amis/helper.css"/>
    <link rel="stylesheet" href="{{$dycms_static}}amis/iconfont.css"/>
    <!-- 这是默认主题所需的，如果是其他主题则不需要 -->
    <!-- 从 1.1.0 开始 sdk.css 将不支持 IE 11，如果要支持 IE11 请引用这个 css，并把前面那个删了 -->
    <!-- <link rel="stylesheet" href="sdk-ie11.css" /> -->
    <!-- 不过 amis 开发团队几乎没测试过 IE 11 下的效果，所以可能有细节功能用不了，如果发现请报 issue -->
    <style>
        html,
        body,
        .app-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
<div id="root" class="app-wrapper"></div>
<script src="{{$dycms_static}}amis/sdk.js"></script>
<script type="text/javascript">
    (function () {
        let amis = amisRequire('amis/embed');
        const app = {
            type: 'app',
            brandName: 'DYCMS',
            logo: '{{$dycms_static}}images/logo.png',
            header: {
                "type": "grid",
                // "align" : "right",
                "columns": [
                    {
                    },
                    {
                        "body": [

                            {
                                "valign" : "middle",
                                "size": "sm",
                                "className" :"float-right m-l",
                                "level" : "enhance",
                                "label": "退出登录",
                                "type": "button",
                                "icon": "fa fa-sign-out",
                                "actionType": "url",
                                "blank" : false,
                                "url": "{{ route('admin.gout') }}",
                            },
                            {
                                "size": "small",
                                "className" :"float-right mr-5",
                                "type": "avatar",
                                "src" : "{{$dycms_static}}images/admin.png",
                                "icon": "fa fa-user"
                            },

                        ]
                    }
                ]
            }
            ,
            footer: '<div class="p-2 text-center bg-light">Copyright © 2021 clark. All rights reserved.</div>',
            asideBefore: '<div class="p-2 text-center">欢迎访问</div>',
            asideAfter: '<div class="p-2 text-center">Version : {{config("dycms.version")}}</div>',
            api: "{{ route('admin.menu') }}"
        };

        let amisScoped = amis.embed('#root', app);
        amisScoped.updateProps({
            theme: "{{env('ADMIN_THEME', 'sdk')}}"
        });
    })();
</script>
</body>

</html>
