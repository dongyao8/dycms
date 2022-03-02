<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}} - 后台管理</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <link rel="stylesheet" href="{{$dycms_static}}amis/{{env('ADMIN_THEME', 'sdk')}}.css" />
    <!-- Tailwind -->
    <link href="https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/tailwindcss/2.0.3/tailwind.min.css" rel="stylesheet">
    <style>

        .font-family-karla {
            font-family: karla;
        }
    </style>
</head>
<body class="bg-white font-family-karla h-screen">

<div class="w-full flex flex-wrap">

    <!-- Login Section -->
    <div class="w-full md:w-1/2 flex flex-col">

        <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
            <a class="bg-black text-white font-bold text-xl p-4">{{env('APP_NAME')}}</a>
        </div>

        <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
            <p class="text-center text-3xl">登录后台</p>
            <div id="loginform" class="app-wrapper"></div>

            <div class="text-center pt-12 pb-12">
                <p class="text-gray-500">Copyright © 2019-{{date('Y')}}<a target="_blank" href="https://www.dongyao.ren/" class="underline font-semibold"> Clark</a>. All rights reserved.</p>
            </div>
        </div>

    </div>

    <!-- Image Section -->
    <div class="w-1/2 shadow-2xl">
        <img class="object-cover w-full h-screen hidden md:block" src="{{$days['images']}}">
    </div>
</div>



<script src="{{$dycms_static}}/amis/sdk.js"></script>
<script type="text/javascript">
    (function() {
        let amis = amisRequire('amis/embed');
        // 通过替换下面这个配置来生成不同页面
        let amisJSON = {
            type: 'page',
            // title: '表单页面',
            body: {
                "type": "form",
                "title": "请输入用户名密码进行登录",
                "body": [{
                    "label": "用户名",
                    "type": "input-text",
                    "name": "username",
                    "required": true,
                    "placeholder": "请输入您的用户名",
                    "validations": {
                        "isPhoneNumber": true
                    }
                },
                    {
                        "type": "input-password",
                        "label": "密码",
                        "name": "password",
                        "required": true,
                        "placeholder": "请输入您的登录密码"
                    }
                ],
                "submitText": "登录",
                "autoFocus": true,
                "persistData": true,
                "clearPersistDataAfterSubmit": true,
                "redirect": "{{ route('admin.home',['home']) }}",
                "api": {
                    "method": "post",
                    "url": "{{ route('admin.login.check') }}",
                    "dataType": "form-data"
                },
                "messages": {
                    "fetchFailed": "初始化失败",
                    "saveSuccess": "登录成功",
                    "saveFailed": "登录失败",
                    "fetchSuccess": "登录成功",
                    "validateFailed": "登录失败"
                }
            }
        };
        let amisScoped = amis.embed('#loginform', amisJSON);
        amisScoped.updateProps({
            theme: "{{env('ADMIN_THEME', 'sdk')}}"
        });
    })();
</script>
</body>
</html>
