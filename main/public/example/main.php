<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$file_path = "/vmq/set.conf";
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
$host = "../createOrder";

$sign = md5($_GET['payId'].$_GET['param'].$_GET['type'].$_GET['price'].$key);
$p = "payId=".$_GET['payId'].'&param='.$_GET['param'].'&type='.$_GET['type']."&price=".$_GET['price'].'&sign='.$sign.'&isHtml=1';

echo "<script>window.location.href = '".$host."?".$p."'</script>";

