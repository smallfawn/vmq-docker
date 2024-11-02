<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

$contents = file_get_contents('.env');
 
// 将文件内容按行分割成数组
$lines = explode("\n", $contents);
 
// 遍历每一行
foreach ($lines as $line) {
    // 忽略空行和注释行
    if (empty($line) || strpos($line, '#') === 0) {
        continue;
    }
     
    // 解析键值对
    list($key, $value) = explode('=', $line, 2);
     
    // 去除键和值两端的空格
    $key = trim($key);
    $value = trim($value);
     
    // 将变量设置为环境变量
    putenv("$key=$value");
}

namespace think;

// 加载基础文件
require __DIR__ . '/../thinkphp/base.php';

// 支持事先使用静态方法设置Request对象和Config对象



// 执行应用并响应
Container::get('app')->run()->send();


