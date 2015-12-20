<?php
/**
 * Created by IntelliJ IDEA.
 * User: leiquan
 * Date: 15/10/18
 * Time: 下午8:24
 */

error_reporting(E_ALL || ~E_NOTICE); //显示除去 E_NOTICE 之外的所有错误信息


$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab", $con);
mysql_query("set names 'utf8' ");



//$result_img1 = mysql_query("SELECT  *  FROM first_jianjie WHERE key_name = 'img1' ");
//$row_img1 = mysql_fetch_array($result_img1);
//
//$result_img2 = mysql_query("SELECT  *  FROM first_jianjie WHERE key_name = 'img2' ");
//$row_img2 = mysql_fetch_array($result_img2);
//
//$result_img3 = mysql_query("SELECT  *  FROM first_jianjie WHERE key_name = 'img3' ");
//$row_img3 = mysql_fetch_array($result_img3);

$result_content = mysql_query("SELECT  *  FROM first_jianjie WHERE key_name = 'content' ");
$row_content = mysql_fetch_array($result_content);



//echo "{";
//echo "img1:'".$row_img1[2]."',";
//echo "img2:'".$row_img2[2]."',";
//echo "img3:'".$row_img3[2]."',";
//echo "content:'".$row_content[2]."'";
//echo "}";

echo $row_content[2];



?>