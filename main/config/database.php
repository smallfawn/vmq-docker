<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
$file_path = "/vmq/set.conf";
$contents = file_get_contents($file_path);
 
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




return [
    // 数据库类型
    'type'            => 'mysql',
     // 服务器地址
     'hostname'        => getenv('DB_HOST')?: '127.0.0.1',
     // 数据库名
     'database'        => getenv('DB_NAME')?: 'vmq',
     // 用户名
     'username'        => getenv('DB_USER')?: 'root',
     // 密码
     'password'        => getenv('DB_PASSWORD')?: 'root',
     // 端口
     'hostport'        => getenv('DB_PORT')?: '3306',
     //... 其他配置
    // 连接dsn
    'dsn'             => '',
    // 数据库连接参数
    'params'          => [],
    // 数据库编码默认采用utf8
    'charset'         => 'utf8',
    // 数据库表前缀
    'prefix'          => '',
    // 数据库调试模式
    'debug'           => true,
    // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'deploy'          => 0,
    // 数据库读写是否分离 主从式有效
    'rw_separate'     => false,
    // 读写分离后 主服务器数量
    'master_num'      => 1,
    // 指定从服务器序号
    'slave_no'        => '',
    // 自动读取主库数据
    'read_master'     => false,
    // 是否严格检查字段是否存在
    'fields_strict'   => true,
    // 数据集返回类型
    'resultset_type'  => 'array',
    // 自动写入时间戳字段
    'auto_timestamp'  => false,
    // 时间字段取出后的默认时间格式
    'datetime_format' => 'Y-m-d H:i:s',
    // 是否需要进行SQL性能分析
    'sql_explain'     => false,
    // Builder类
    'builder'         => '',
    // Query类
    'query'           => '\\think\\db\\Query',
    // 是否需要断线重连
    'break_reconnect' => false,
    // 断线标识字符串
    'break_match_str' => [],
];


