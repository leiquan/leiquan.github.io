<?php


$id=$_GET['id'];

$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab", $con);

mysql_query("set names 'utf8' ");


$result_news = mysql_query("SELECT * FROM news WHERE id='$id'");




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>组内新闻 | 山东大学杨剑教授课题组</title>
    <link href="css/index.css" rel="stylesheet">
    <link href="css/news.css" rel="stylesheet">
    <style>
        .card{
            width: 1000px;
            padding: 30px;
            overflow: hidden;
            padding-bottom: 30px;
        }
        .card-title{
            width: 1000px;
            height: 120px;
            overflow: hidden;
            text-align: center;
        }
        .card-title-text{
            width: 1000px;
            height: 70px;
            line-height: 70px;
            float: left;
        }
        .card-title-time{
            width: 1000px;
            height: 50px;
            line-height: 50px;
            float: left;
        }
        .card-detail{
            width: 1000px;
            height: auto;
            overflow: hidden;
            line-height: 30px;
        }
        .card-editor {
            width: 950px;
            height: 60px;
            line-height: 60px;
            padding-right: 50px;
            text-align: right;
        }
    </style>
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


    <div class="card">

        <?php
        while ($row_news = mysql_fetch_array($result_news)) {
        ?>

        <div class="card-title">
            <div class="card-title-text"><?php echo $row_news['description'];?></div>
            <div class="card-title-time"><?php echo $row_news['time'];?></div>
        </div>
        <div class="card-detail"><?php echo $row_news['content'];?></div>
            <div class="card-editor">编辑人员:<?php echo $row_news['editor'];?></div>

            <?php
            }
            ?>

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

</body>
</html>