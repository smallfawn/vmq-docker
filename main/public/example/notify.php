<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$file_path = "/vmq/key.conf";
$vmq_key_value = null;
$content = file_get_contents($file_path);
$lines = explode("\n", $content);
foreach ($lines as $line) {
    $trimmedLine = trim($line);
    if (strpos($trimmedLine, 'VMQ_KEY=') === 0) {
        $vmq_key_value = substr($trimmedLine, strlen('VMQ_KEY='));
        break;
    }
}

$key = $vmq_key_value;
$payId = $_GET['payId'];//商户订单号
$param = $_GET['param'];//创建订单的时候传入的参数
$type = $_GET['type'];//支付方式 ：微信支付为1 支付宝支付为2
$price = $_GET['price'];//订单金额
$reallyPrice = $_GET['reallyPrice'];//实际支付金额
$sign = $_GET['sign'];//校验签名，计算方式 = md5(payId + param + type + price + reallyPrice + 通讯密钥)
//开始校验签名
$_sign =  md5($payId . $param . $type . $price . $reallyPrice . $key);
if ($_sign != $sign) {
    echo "error_sign";//sign校验不通过
    exit();
}

echo "success";


//继续业务流程
//echo "商户订单号：".$payId ."<br>自定义参数：". $param ."<br>支付方式：". $type ."<br>订单金额：". $price ."<br>实际支付金额：". $reallyPrice;


?>