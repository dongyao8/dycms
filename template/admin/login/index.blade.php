<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>登录账号</title>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- //Meta tags -->
    <link rel="stylesheet" href="{{config('static.path')}}login/css/style.css" type="text/css" media="all" /><!-- Style-CSS -->
    <link href="{{config('static.path')}}/login/css/font-awesome.css" rel="stylesheet"><!-- font-awesome-icons -->

    <link rel="stylesheet" href="{{config('static.path')}}/amis/{{env('ADMIN_THEME', 'sdk')}}.css" />
    <link rel="stylesheet" href="{{config('static.path')}}/amis/helper.css" />
    <link rel="stylesheet" href="{{config('static.path')}}/amis/iconfont.css" />
</head>
<style>
    .form-36-mian {
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0.85), rgba(255, 255, 255, 0)), url({{$days['images']}});
    }
    .wrapper{
        max-width: 540px;
    }
</style>

<body>
<section class="w3l-form-36">
    <div class="form-36-mian section-gap">
        <div class="wrapper">
            <div class="form-inner-cont">
                <h3>登录账号</h3>
                <div id="root" class="app-wrapper"></div>
            </div>
        </div>
    </div>
</section>
<script src="{{config('static.path')}}/amis/sdk.js"></script>
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
                    "saveSuccess": "保存成功",
                    "saveFailed": "保存失败",
                    "fetchSuccess": "登录成功",
                    "validateFailed": "登录失败"
                }
            }
        };
        let amisScoped = amis.embed('#root', amisJSON);
        amisScoped.updateProps({
            theme: "{{env('ADMIN_THEME', 'sdk')}}"
        });
    })();
</script>
</body>

</html>
