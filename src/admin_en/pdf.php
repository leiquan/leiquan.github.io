<?php

$filename = "file";//post名非文件名

date_default_timezone_set("Asia/Shanghai");

$time = date("Ymd");
$time2 = date("His");


$files = $_FILES[$filename];

$name = $time . '-' . $time2 . '.pdf';

$temp = $files['tmp_name'];


$new = $_SERVER['DOCUMENT_ROOT'] . "/upload/pdf/".$name ;

copy($temp, $new); //拷贝到新目录
unlink($temp); //删除旧目录下的文件


$url =  "http://219.218.125.248/upload/pdf/".$name ;;


if (!empty($url)) {
    echo $url;
} else {
    echo "出现错误，请重试！";
}


?>

