<?php
/**
 * Created by IntelliJ IDEA.
 * User: leiquan
 * Date: 15/10/25
 * Time: 下午9:04
 */

$section= $_POST['section'];

$content = $_POST['content'];


$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab", $con);

mysql_query("set names 'utf8'");


$result = mysql_query("UPDATE direction SET content = '$content' WHERE section='$section'");


if ($result == false) {
    echo "数据库查询失败";
} else {
    echo $result;
}

?>