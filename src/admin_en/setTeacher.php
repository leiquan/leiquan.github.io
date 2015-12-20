<?php
/**
 * Created by IntelliJ IDEA.
 * User: leiquan
 * Date: 15/10/25
 * Time: 下午9:04
 */

$key = $_POST['key'];
$value = $_POST['value'];

$key_array=explode(",",$key);
$value_array=explode(",",$value);



$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab_en", $con);

mysql_query("set names 'utf8' ");

// 清空表名

mysql_query("delete from teacher");

for($i=0;$i<sizeof($key_array);$i++){
    $result = mysql_query("INSERT INTO teacher (mkey, mvalue) VALUES ('$key_array[$i]', '$value_array[$i]')");
}

if ($result == false) {
    echo "数据库查询失败";
} else {
    echo 0;
}

?>