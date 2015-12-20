<?php
/**
 * Created by IntelliJ IDEA.
 * User: leiquan
 * Date: 15/10/25
 * Time: 下午9:04
 */




$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab_en", $con);

mysql_query("set names 'utf8' ");

// 清空表名

$result=mysql_query("SELECT * from teacher");


if ($result == false) {
    echo "数据库查询失败";
} else {


    while($row = mysql_fetch_array($result))
    {
        echo "{key:".$row['mkey'] . ",value:" . $row['mvalue']."},";
    }



}

?>