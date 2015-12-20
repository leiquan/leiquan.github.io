<?php

$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("yang_lab", $con);
mysql_query("set names 'utf8'");

$result_jianjie_img1 = mysql_query("SELECT  *  FROM first_jianjie WHERE key_name = 'img1' ");
$row_jianjie_img1 = mysql_fetch_array($result_jianjie_img1);

$result_jianjie_img2 = mysql_query("SELECT  *  FROM first_jianjie WHERE key_name = 'img2' ");
$row_jianjie_img2 = mysql_fetch_array($result_jianjie_img2);

$result_jianjie_img3 = mysql_query("SELECT  *  FROM first_jianjie WHERE key_name = 'img3' ");
$row_jianjie_img3 = mysql_fetch_array($result_jianjie_img3);

$result_jianjie_content = mysql_query("SELECT  *  FROM first_jianjie WHERE key_name = 'content' ");
$row_jianjie_content = mysql_fetch_array($result_jianjie_content);

$result_yiqi_img1 = mysql_query("SELECT  *  FROM first_yiqi WHERE key_name = 'img1' ");
$row_yiqi_img1 = mysql_fetch_array($result_yiqi_img1);

$result_yiqi_img2 = mysql_query("SELECT  *  FROM first_yiqi WHERE key_name = 'img2' ");
$row_yiqi_img2 = mysql_fetch_array($result_yiqi_img2);

$result_yiqi_img3 = mysql_query("SELECT  *  FROM first_yiqi WHERE key_name = 'img3' ");
$row_yiqi_img3 = mysql_fetch_array($result_yiqi_img3);

$result_yiqi_content = mysql_query("SELECT  *  FROM first_yiqi WHERE key_name = 'content' ");
$row_yiqi_content = mysql_fetch_array($result_yiqi_content);

$result_news = mysql_query("SELECT * FROM news WHERE type!=3 ORDER BY time DESC LIMIT 10");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页 | 山东大学杨剑教授课题组</title>
    <link href="../css/index.css" rel="stylesheet">
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
                <div class="nav-item active"><a href="index.php">首页</a></div>
                <div class="nav-item"><a href="direction.php">研究方向</a></div>
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
    <div class="mian-left">

        <div class="card">
            <div class="card-img">

                <div id="iSlider-wrapper" style="width: 660px;height: 350px;overflow: hidden;">
                </div>

            </div>
            <div class="card-title">
                <div class="card-title-text">课题组简介</div>
                <div class="card-title-more">
                    <a href="direction.php">
                        <img src="../img/more.png">
                    </a>
                </div>
            </div>
            <div class="card-detail">
                <?php echo $row_jianjie_content[2]; ?>
            </div>
        </div>

        <div class="card">
            <div class="card-img">
                <div id="iSlider-wrapper-2" style="width: 660px;height: 350px;overflow: hidden;">
                </div>
            </div>
            <div class="card-title">
                <div class="card-title-text">仪器资源</div>
                <div class="card-title-more">
<!--                    <a href="#">-->
<!--                        <img src="img/more.png">-->
<!--                    </a>-->
                </div>
            </div>
            <div class="card-detail">
                <?php echo $row_yiqi_content[2]; ?>
            </div>
        </div>


    </div>
    <div class="mian-right">
        <div class="main-right-title">
            <div class="main-right-title-text">新闻动态</div>
            <div class="main-right-title-more">
                <a href="news.php">
                    <img src="../img/more.png">
                </a>
            </div>
        </div>

        
        <?php
            while ($row_news=mysql_fetch_array($result_news)) {
                echo "<div class='main-right-item'>";
                echo "<div class='main-right-item-left'>";
                echo  "<div class='main-right-item-left-month'>".substr($row_news[2],0,4).".".substr($row_news[2],5,2)."</div>";
                echo "<div class='main-right-item-left-date'>".substr($row_news[2],8,10)."</div>";
                echo "</div>";


                if ($row_news[1]==1){
                    echo "<div class='main-right-item-right'><a href='newsdetail.php?id=" .$row_news['id']."'>".$row_news['description']."</a></div>";
                } else if($row_news[1]==2){
                    echo "<div class='main-right-item-right'><a href='".$row_news[4]."'>".$row_news['description']."</a></div>";
                }


                echo "</div>";
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

<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script src="../js/iSlider.min.js"></script>
<script src="../js/iSlider.animate.min.js"></script>
<script src="../js/iSlider.plugin.dot.js"></script>
<script src="../js/iSlider.plugin.button.js"></script>
<script>
    var data = [
        {content: "<?php echo $row_jianjie_img1[2]; ?>"},
        {content: "<?php echo $row_jianjie_img2[2]; ?>"},
        {content: "<?php echo $row_jianjie_img3[2]; ?>"}
    ];
    var islider = new iSlider({
        dom: document.getElementById("iSlider-wrapper"),
        data: data,
        isVertical: false,
        isLooping: true,
        isDebug: true,
        isAutoplay: true,
        animateType: 'rotate',
        plugins:['dot']
    });


    var data2 = [
        {content: "<?php echo $row_yiqi_img1[2]; ?>"},
        {content: "<?php echo $row_yiqi_img2[2]; ?>"},
        {content: "<?php echo $row_yiqi_img3[2]; ?>"}
    ];
    var islider2= new iSlider({
        dom: document.getElementById("iSlider-wrapper-2"),
        data: data2,
        isLooping: true,
        isAutoplay: true,
        animateType: 'rotate',
        plugins:['dot']
    });
</script>

</body>
</html>