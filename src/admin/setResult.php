<?php
/**
 * Created by IntelliJ IDEA.
 * User: leiquan
 * Date: 15/10/25
 * Time: 下午9:04
 */

$kind = $_POST['kind'];
$year = $_POST['year'];
$description = $_POST['description'];
$pdf_url = $_POST['pdf_url'];


$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab", $con);

mysql_query("set names 'utf8' ");


if ($kind == 'article')
{
    $result = mysql_query("INSERT INTO article (year, description, pdf_url) VALUES ('$year', '$description', '$pdf_url')");
}
else if ($kind == 'zhuanli')
{
    $result = mysql_query("INSERT INTO zhuanli (year, description, pdf_url) VALUES ('$year', '$description', '$pdf_url')");
}




if ($result == false) {
    echo "数据库查询失败";
} else {
    echo 0;
}

?>