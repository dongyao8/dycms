<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 头像配置
    |--------------------------------------------------------------------------
    //  头像类型说明：
    //  404：如果没有与电子邮件哈希关联的图像，则不加载任何图像，而是返回HTTP 404（找不到文件）响应
    //  mp ：（神秘人物）一个人的简单卡通风格的轮廓（不随电子邮件哈希值而变化）
    //  identicon：基于电子邮件哈希的几何图案
    //  monsterid：具有不同颜色，面孔等的生成的“ monster”
    //  wavatar：生成的具有不同特征和背景的面孔
    //  retro:生成的令人敬畏的8位街机风格像素化面孔
    //  robohash：具有不同颜色，面部等的生成的机器人
    //  blank: 透明的PNG图片
    |
    |
    */
    'url' => 'http://sdn.geekzu.org/avatar',   //gravatar服务地址，可替换不同镜像
    'size' => 120,   //头像尺寸
    'd' => 'robohash',  //头像类型

];
