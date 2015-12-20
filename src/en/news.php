<?php

$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab", $con);

mysql_query("set names 'utf8' ");


$result_news = mysql_query("SELECT * FROM news WHERE type!=3 ORDER BY time DESC");
$result_activity = mysql_query("SELECT * FROM news WHERE type=3 ORDER BY time DESC");




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>组内新闻 | 山东大学杨剑教授课题组</title>
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/news.css" rel="stylesheet">
    <script src="../js/lib/jquery.js"></script>
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
                <div class="nav-item"><a href="direction.php">研究方向</a></div>
                <div class="nav-item"><a href="result.php">研究成果</a></div>
                <div class="nav-item  active"><a href="news.php">组内新闻</a></div>
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
    <div class="mian-left">

        <div class="main-left-title">
            <div class="main-left-title-text"><a name="top">课题组新闻</a></div>
            <div class="main-left-title-more">
<!--                <img src="img/more.png">-->
            </div>
        </div>

<?php
        while ($row_news = mysql_fetch_array($result_news)) {
            echo "<div class='main-left-item'>";
            echo "<div class='main-left-item-left'>";
            echo "<div class='main-left-item-left-month'>".substr($row_news[2],0,4).".".substr($row_news[2],5,2)."</div>";
            echo "<div class='main-left-item-left-date'>".substr($row_news[2],8,10)."</div>";
            echo "</div>";

            if ($row_news[1]==1){
                echo "<div class='main-left-item-right'><a href='newsdetail.php?id=" .$row_news[0]."'>".$row_news[3]."</a></div>";
            } else if($row_news[1]==2){
                echo "<div class='main-left-item-right'><a href='".$row_news[4]."'>".$row_news[3]."</a></div>";
            }

            echo "</div>";

        }
?>





    </div>



    <div class="mian-right">


        <div class="main-right-title">
            <div class="main-right-title-text">成员动态</div>
            <div class="main-right-title-more">
<!--                <img src="img/more.png">-->
            </div>
        </div>

        <?php
        while ($row_activity = mysql_fetch_array($result_activity)) {
            echo "<div class='main-left-item'>";
            echo "<div class='main-left-item-left'>";
            echo "<div class='main-left-item-left-month'>".substr($row_activity[2],0,4).".".substr($row_activity[2],5,2)."</div>";
            echo "<div class='main-left-item-left-date'>".substr($row_activity[2],8,10)."</div>";
            echo "</div>";
            echo "<div class='main-left-item-right'>".$row_activity[3]."</div>";
            echo "</div>";
        }
        ?>


    </div>

    <div class="to-top-wrap">
    <div class="up-to-top"id="up-to-top"  style="display:none;background-color: gray;opacity: 0.5;width: 100px;height: 100px;float: right;position: fixed;bottom: 0px;margin-left: 1000px;"><a href="#top" style="display: block;width: 100px;height: 100px;text-align: center;line-height: 100px;" onclick="javascript:this.parentNode.style.display='none';">Top</a></div>
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

<script>
    var mtop=document.getElementById('up-to-top');
    //alert(mtop);
    window.addEventListener("mousewheel",function (event){

        var allHeight = $(document).height();
        var sclTop=$(window).scrollTop();

        var e = window.event || event; // old IE support
        var delta = e.wheelDelta || -e.detail;

        if(delta>0){
            if(allHeight-sclTop-$(window).height()>250){
                mtop.style.display='block';
            }else{
                mtop.style.display='none';
            }
        }else if(delta<0){

            if(allHeight-sclTop-$(window).height()>250){
                mtop.style.display='block';
            }else{
                mtop.style.display='none';
            }
        }

    },false);

</script>

</body>
</html>