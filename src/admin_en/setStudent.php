<?php
/**
 * Created by IntelliJ IDEA.
 * User: leiquan
 * Date: 15/10/25
 * Time: 下午9:04
 */

$type = $_POST['type'];
$uname = $_POST['uname'];
$pic = $_POST['pic'];
$email = $_POST['email'];
$year = $_POST['year'];
$description = $_POST['description'];


$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab_en", $con);

mysql_query("set names 'utf8' ");


$result = mysql_query("INSERT INTO student (type, year, pic,uname,email,description) VALUES ('$type', '$year', '$pic','$uname','$email', '$description')");


if ($result == false) {
    echo "数据库查询失败";
} else {
    echo 0;
}

?>