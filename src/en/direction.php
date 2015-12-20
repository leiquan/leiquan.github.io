<?php

$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("yang_lab", $con);
mysql_query("set names 'utf8'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>研究方向 | 山东大学杨剑教授课题组</title>
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/direction.css" rel="stylesheet">
</head>
<body>

<div class="header">
    <div class="header-content">
        <div class="header-logo">
            <a href="#"><img src="../img/logo.png"></a>
        </div>
        <div class="header-title">
            <div class="header-title-top">山东大学杨剑教授课题组</div>
            <div class="header-title-middle">Professor Yang's group, Shandong University</div>
            <div class="header-title-bottom">
                <div class="nav-item"><a href="index.php">首页</a></div>
                <div class="nav-item active"><a href="direction.php">研究方向</a></div>
                <div class="nav-item"><a href="result.php">研究成果</a></div>
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
    <div class="mian-left" id="main-left">

        <div class="menu-title"><a href="#introduce">方向概述</a></div>

        <div class="menu-drop">
            <div class="menu-drop-top">
                <div class="title"><a href="#cailiao">纳米能源材料</a></div>
                <div class="right" id="drop1">

                </div>
            </div>
            <div class="menu-drop-content">
                <div class="menu-item"><a href="#li_li_zi">锂离子电池</a></div>
                <div class="menu-item"><a href="#na_li_zi">钠离子电池</a></div>
                <div class="menu-item"><a href="#shui_xi_li_zi">水系离子电池</a></div>
                <div class="menu-item"><a href="#li_li_zi_kong_qi">锂离子空气电池</a></div>
            </div>
        </div>

        <div class="menu-drop">
            <div class="menu-drop-top">
                <div class="title"> <a href="#jinshu">纳米贵金属</a></div>
                <div class="right" id="drop2"></div>
            </div>
            <div class="menu-drop-content">
                <div class="menu-item"><a href="#dian_cui_hua">贵金属纳米材料的电催化</a></div>
                <div class="menu-item"><a href="#guang_cui_hua">贵金属纳米材料的光催化</a></div>
            </div>
        </div>






    </div>
    <div class="mian-right" id="main-right">

        <div class="direction-introduce">
            <div class="direction-introduce-title"><a name="introduce">方向概述</a></div>
            <div class="direction-introduce-content">
                <div class="direction-card-content-wrap">
                <?php
                $result = mysql_query("SELECT * FROM direction WHERE section ='fang_xiang_gai_shu'  ");
                while ($row = mysql_fetch_array($result)) {
                    print_r($row[2]);
                }
                ?>
                </div>
            </div>
        </div>


        <div class="direction-card">
            <div class="direction-card-title"><a name="cailiao">纳米能源材料</a></div>
            <div class="direction-card-content">
                <div class="direction-card-content-title"><a name="li_li_zi">锂离子电池</a></div>
                <div class="direction-card-content-wrap">
                <?php
                $result = mysql_query("SELECT * FROM direction WHERE section ='li_li_zi'  ");
                while ($row = mysql_fetch_array($result)) {
                    print_r($row[2]);
                }
                ?>
                </div>

                <div class="direction-card-content-title"><a name="na_li_zi">钠离子电池</a></div>
                <div class="direction-card-content-wrap">
                <?php
                $result = mysql_query("SELECT * FROM direction WHERE section ='na_li_zi'  ");
                while ($row = mysql_fetch_array($result)) {
                    print_r($row[2]);
                }
                ?>
                </div>

                <div class="direction-card-content-title"><a name="shui_xi_li_zi">水系离子电池</a></div>
                <div class="direction-card-content-wrap">
                <?php
                $result = mysql_query("SELECT * FROM direction WHERE section ='shui_xi_li_zi'  ");
                while ($row = mysql_fetch_array($result)) {
                    print_r($row[2]);
                }
                ?>
                </div>

                <div class="direction-card-content-title"><a name="li_li_zi_kong_qi">锂离子空气电池</a></div>
                <div class="direction-card-content-wrap">
                <?php
                $result = mysql_query("SELECT * FROM direction WHERE section ='li_li_zi_kong_qi'  ");
                while ($row = mysql_fetch_array($result)) {
                    print_r($row[2]);
                }
                ?>
                </div>
            </div>
        </div>

        <div class="direction-introduce">
            <div class="direction-card-title"><a name="jinshu">纳米贵金属</a></div>
            <div class="direction-card-content">
                <div class="direction-card-content-title"><a name="dian_cui_hua">贵金属纳米材料的电催化</a></div>
                <div class="direction-card-content-wrap">
                <?php
                $result = mysql_query("SELECT * FROM direction WHERE section ='dian_cui_hua'  ");
                while ($row = mysql_fetch_array($result)) {
                    print_r($row[2]);
                }
                ?>
                </div>
                <div class="direction-card-content-title"><a name="guang_cui_hua">贵金属纳米材料的光催化</a></div>
                <div class="direction-card-content-wrap">
                <?php
                $result = mysql_query("SELECT * FROM direction WHERE section ='guang_cui_hua'  ");
                while ($row = mysql_fetch_array($result)) {
                    print_r($row[2]);
                }
                ?>
                </div>
            </div>
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
<script src="../js/lib/bootstrap.js" type="javascript"></script>
<script>

    $(document).ready(function(){

        $(".menu-drop .right").click(function(){
            $(this).parent().parent().children(".menu-drop-content").fadeToggle();
            $(this).toggleClass("right2");
        });

    });

    var mainLeft =document.getElementById('main-left');
    var mainRight =document.getElementById('main-right');

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