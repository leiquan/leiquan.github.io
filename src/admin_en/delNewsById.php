<?php
/**
 * Created by IntelliJ IDEA.
 * User: leiquan
 * Date: 15/10/18
 * Time: 下午8:24
 */

error_reporting(E_ALL || ~E_NOTICE); //显示除去 E_NOTICE 之外的所有错误信息

$id=$_GET['id'];

$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab_en", $con);
mysql_query("set names 'utf8' ");

$result = mysql_query("DELETE  FROM news WHERE id = '$id' ");

if ($result){
    echo 0;
}
else{
    echo 400;
}

?>