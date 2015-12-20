<?php
/**
 * Created by IntelliJ IDEA.
 * User: leiquan
 * Date: 15/10/25
 * Time: 下午9:04
 */

$img1 = $_POST['img1'];
$img2 = $_POST['img2'];
$img3 = $_POST['img3'];
$content = $_POST['content'];


$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab_en", $con);

mysql_query("set names 'utf8' ");


$result = mysql_query("UPDATE first_yiqi SET value = '$img1' WHERE key_name='img1'");
$result = mysql_query("UPDATE first_yiqi SET value = '$img2' WHERE key_name='img2'");
$result = mysql_query("UPDATE first_yiqi SET value = '$img3' WHERE key_name='img3'");
$result = mysql_query("UPDATE first_yiqi SET value = '$content' WHERE key_name='content'");


if ($result == false) {
    echo "数据库查询失败";
} else {
    echo $content;
}

?>