<?php

// 连接数据库
$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("yang_lab", $con);

//防止乱码的3句话
mysql_query("set names 'utf8' ");
mysql_query("set character_set_client=utf8");
mysql_query("set character_set_results=utf8");



$result_year_article = mysql_query("SELECT year FROM article");
$array_year_article=array();
while ($row_year_article = mysql_fetch_array($result_year_article)) {
    array_push($array_year_article,$row_year_article['year']);
}
// 从大到小排序
$array_year_article=array_unique($array_year_article);
rsort($array_year_article);


$result_year_zhuanli = mysql_query("SELECT year FROM zhuanli");
$array_year_zhuanli=array();
while ($row_year_zhuanli = mysql_fetch_array($result_year_zhuanli)) {
    array_push($array_year_zhuanli,$row_year_zhuanli['year']);
}

// 从大到小排序
$array_year_zhuanli=array_unique($array_year_zhuanli);
rsort($array_year_zhuanli);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>研究成果 | 山东大学杨剑教授课题组</title>
    <link href="css/index.css" rel="stylesheet">
    <link href="css/direction.css" rel="stylesheet">
    <link href="css/result.css" rel="stylesheet">
</head>
<body>

<div class="header">
    <div class="header-content">
        <div class="header-logo">
            <a href="#"><img src="img/logo.png"></a>
        </div>
        <div class="header-title">
            <div class="header-title-top">山东大学杨剑教授课题组</div>
            <div class="header-title-middle">Professor Yang's group, Shandong University</div>
            <div class="header-title-bottom">
                <div class="nav-item"><a href="index.php">首页</a></div>
                <div class="nav-item"><a href="direction.php">研究方向</a></div>
                <div class="nav-item active"><a href="result.php">研究成果</a></div>
                <div class="nav-item"><a href="news.php">组内新闻</a></div>
                <div class="nav-item"><a href="member.php">组内成员</a></div>
                <div class="nav-item"><a href="link.php">友情链接</a></div>
                <div class="nav-item"><a href="contact.php">联系我们</a></div>
            </div>
        </div>
        <div class="header-english">
            <a href="#">English</a>
        </div>
    </div>
</div>

<div class="main">
    <div class="mian-left" id="mian-left">

        <div class="menu-drop">
            <div class="menu-drop-top">
                <div class="title"><a href="#article">文章</a></div>
                <div class="right"></div>
            </div>
            <div class="menu-drop-content">

                <?php
                for ($i=0;$i<sizeof($array_year_article);$i++) {
                    echo "<div class='menu-item'><a href='#article".$array_year_article[$i]."'>".$array_year_article[$i]."年</a></div>";
                }
                ?>

            </div>
        </div>

        <div class="menu-drop">
            <div class="menu-drop-top">
                <div class="title"><a href="#zhuanli">专利</a></div>
                <div class="right"></div>
            </div>
            <div class="menu-drop-content">
                <?php
                for ($i=0;$i<sizeof($array_year_zhuanli);$i++) {
                    echo "<div class='menu-item'><a href='#zhuanli".$array_year_zhuanli[$i]."'>".$array_year_zhuanli[$i]."年</a></div>";
                }
                ?>
            </div>
        </div>






    </div>
    <div class="mian-right" id="mian-right">

<!--        <a class="media" href="my.pdf"></a>-->

        <div class="result-card">
            <div class=title><a name="article">文章</a></div>

            <?php




            for ($i=0;$i<sizeof($array_year_article);$i++) {
                // 根据年份循环查询数据库并且战士内容
                $result_item_article = mysql_query("SELECT * FROM article WHERE year='$array_year_article[$i]'");

                echo "<div class='time'><a name='article".$array_year_article[$i]."'>".$array_year_article[$i]."</a></div>";
                echo "<div class='content'>";

                while ($row_item_article = mysql_fetch_array($result_item_article)) {
                  echo "<div class='item'>";
                    echo "<a href='".$row_item_article['pdf_url']."'>";
                     echo   $row_item_article['description'];
                    echo "</a>";
                    echo "</div>";

                   // print_r($row_item);
                }

                echo "</div>";
            }



            ?>





        </div>

        <div class="result-card">
            <div class=title><a name="zhuanli">专利</a></div>

            <?php



            for ($i=0;$i<sizeof($array_year_zhuanli);$i++) {
                // 根据年份循环查询数据库并且战士内容
                $result_item_zhuanli = mysql_query("SELECT * FROM zhuanli WHERE year='$array_year_zhuanli[$i]'");

                echo "<div class='time'><a name='zhuanli".$array_year_zhuanli[$i]."'>".$array_year_zhuanli[$i]."</a></div>";
                echo "<div class='content'>";

                while ($row_item_zhuanli = mysql_fetch_array($result_item_zhuanli)) {
                    echo "<div class='item'>";
                    echo "<a href='".$row_item_zhuanli['pdf_url']."'>";
                    echo   $row_item_zhuanli['description'];
                    echo "</a>";
                    echo "</div>";

                    // print_r($row_item);
                }

                echo "</div>";
            }



            mysql_close($con);
            ?>

        </div>

    </div>
</div>

<div class="footer">
    <div class="footer-content">
        <div class="footer-content-left">
            <div class="footer-content-title">相关链接</div>
            <div class="footer-content-item"><a href="http://www.sdu.edu.cn">山东大学</a></div>
            <div class="footer-content-item"><a href="http://www.cas.cn">中国科学院</a></div>
            <div class="footer-content-item"><a href="http://www.chemnew.sdu.edu.cn">山东大学化学与化工学院</a></div>
            <div class="footer-content-item"><a href="http://www.ustc.edu.cn">中国科学技术大学</a></div>
        </div>
        <div class="footer-content-right">
            <div class="footer-content-title">联系方式</div>
            <div class="footer-content-item">工作单位&nbsp;&nbsp;&nbsp;&nbsp;无机化学研究所</div>
            <div class="footer-content-item">电话&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0531-88364489</div>
            <div class="footer-content-item">传真&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0531-88364489</div>
            <div class="footer-content-item">E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;yangjian@sdu.edu.cn</div>
        </div>
    </div>
</div>

<div class="bottom">All rights reserved &copy; Yang group.</div>

<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script src="js/lib/bootstrap.js" type="javascript"></script>
<script src="js/pdf.js"></script>
<script>

    $(document).ready(function(){
        $(".menu-drop .right").click(function(){
            $(this).parent().parent().children(".menu-drop-content").fadeToggle();
            $(this).toggleClass("right2");
        });
            //$('a.media').media({width:700, height:1000});
    });

    var mainLeft =document.getElementById('mian-left');
    var mainRight =document.getElementById('mian-right');

    window.addEventListener("mousewheel",function (event){

        var allHeight = $(document).height();
        var sclTop=$(window).scrollTop();

        var e = window.event || event; // old IE support
        var delta = e.wheelDelta || -e.detail;

        if(delta>0){
            if ($(window).scrollTop()<160){
                mainLeft.style.position="relative";
                mainLeft.style.top="0px";
            }else{


                if ((allHeight-sclTop-mainLeft.offsetHeight)>300) {
                    mainLeft.style.position="relative";
                    mainLeft.style.top=$(window).scrollTop()-160+"px";
                }else{

                }

            }
        }else if(delta<0){

            if ($(window).scrollTop()>160){

                if ((allHeight-sclTop-mainLeft.offsetHeight)>300) {

                    mainLeft.style.position="relative";
                    mainLeft.style.top=$(window).scrollTop()-160+"px";

                }else{
                    console.log("到底了");
                }

            }else{
                mainLeft.style.position="relative";
                mainLeft.style.top="0px";
            }
        }



    },false);

</script>

</body>
</html>