<?php
/**
 * Created by IntelliJ IDEA.
 * User: leiquan
 * Date: 15/10/18
 * Time: 下午8:24
 */

error_reporting(E_ALL || ~E_NOTICE); //显示除去 E_NOTICE 之外的所有错误信息

if ($_GET['type']) {
    $type=$_GET['type'];
} else {
    $type='1';
}

$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab", $con);
mysql_query("set names 'utf8' ");

if($type==1)
{
    $result = mysql_query("SELECT  *  FROM article ORDER BY year ");
}
else
{
    $result = mysql_query("SELECT  *  FROM zhuanli  ORDER BY year ");
}

$arr = array();

while ($row = mysql_fetch_array($result))
{
array_push($arr,$row);
}

echo json_encode($arr);

?>