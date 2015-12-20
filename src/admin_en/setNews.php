<?php
/**
 * Created by IntelliJ IDEA.
 * User: leiquan
 * Date: 15/10/25
 * Time: 下午9:04
 */

$type = $_POST['type'];
$time = $_POST['time'];
$description = $_POST['description'];
$content = $_POST['content'];
$editor = $_POST['editor'];


$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab_en", $con);

mysql_query("set names 'utf8' ");


$result = mysql_query("INSERT INTO news (type, time, description,content,editor) VALUES ('$type', '$time', '$description','$content', '$editor')");


if ($result == false) {
    echo "数据库查询失败";
} else {
    echo 0;
}

?>