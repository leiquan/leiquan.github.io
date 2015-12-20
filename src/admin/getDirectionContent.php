<?php
/**
 * Created by IntelliJ IDEA.
 * User: leiquan
 * Date: 15/10/18
 * Time: 下午8:24
 */

error_reporting(E_ALL || ~E_NOTICE); //显示除去 E_NOTICE 之外的所有错误信息

if ($_GET['section']) {
    $section=$_GET['section'];
} else {
    $section='introduce';
}

$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab", $con);
mysql_query("set names 'utf8' ");
$result = mysql_query("SELECT  *  FROM direction WHERE section = '$section' ");
$row = mysql_fetch_array($result);


echo $row['content'];

?>