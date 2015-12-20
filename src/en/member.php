<?php

// 连接数据库
$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("yang_lab", $con);

//防止乱码的3句话
mysql_query("set names 'utf8' ");



// 初步,按照type区分开
$result_type = mysql_query("SELECT type FROM student");
$array_type=array();
while ($row_type = mysql_fetch_array($result_type)) {
    array_push($array_type,$row_type['type']);
}
// 从大到小排序
$array_type=array_unique($array_type);
sort($array_type);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>组内成员 | 山东大学杨剑教授课题组</title>
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/direction.css" rel="stylesheet">
    <link href="../css/teacher.css" rel="stylesheet">
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
                <div class="nav-item"><a href="news.php">组内新闻</a></div>
                <div class="nav-item  active"><a href="member.php">组内成员</a></div>
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

        <div class="menu-title"><a href="#teacher">导师</a></div>

        <?php
            for ($i=0;$i<sizeof($array_type);$i++) {

                if ($array_type[$i] === '1') {
                    echo "<div class='menu-drop'>";
                    echo "<div class='menu-drop-top'>";
                    echo "<div class='title'><a href='#1'>在读博士</a></div>";
                    echo "<div class='right'></div>";
                    echo "</div>";
                    echo "<div class='menu-drop-content'>";
                    // 再次循环
                    //再次,按照year区分开
                    $result_year= mysql_query("SELECT year FROM student WHERE  type=1 ");
                    $array_year=array();
                    while ($row_year = mysql_fetch_array($result_year)) {
                        array_push($array_year,$row_year['year']);
                    }
                    // 从大到小排序
                    $array_year=array_unique($array_year);
                    rsort($array_year);
                    for ($j=0;$j<sizeof($array_year);$j++) {
                        echo "<div class='menu-item'><a href='#year".$array_year[$j]."'>".$array_year[$j]."级</a></div>";
                    }
                    //闭合标签
                    echo "</div>";
                    echo "</div>";
                    // 闭合标签
                } else  if ($array_type[$i] === '2') {
                    echo "<div class='menu-drop'>";
                    echo "<div class='menu-drop-top'>";
                    echo "<div class='title'><a href='#2'>毕业博士</a></div>";
                    echo "<div class='right'></div>";
                    echo "</div>";
                    echo "<div class='menu-drop-content'>";
                    // 再次循环
                    //再次,按照year区分开
                    $result_year= mysql_query("SELECT year FROM student WHERE  type=2 ");
                    $array_year=array();
                    while ($row_year = mysql_fetch_array($result_year)) {
                        array_push($array_year,$row_year['year']);
                    }
                    // 从大到小排序
                    $array_year=array_unique($array_year);
                    rsort($array_year);
                    for ($j=0;$j<sizeof($array_year);$j++) {
                        echo "<div class='menu-item'><a href='#year".$array_year[$j]."'>".$array_year[$j]."级</a></div>";
                    }
                    //闭合标签
                    echo "</div>";
                    echo "</div>";
                    // 闭合标签
                } else if ($array_type[$i] === '3') {
                    echo "<div class='menu-drop'>";
                    echo "<div class='menu-drop-top'>";
                    echo "<div class='title'><a href='#3'>在读硕士</a></div>";
                    echo "<div class='right'></div>";
                    echo "</div>";
                    echo "<div class='menu-drop-content'>";
                    // 再次循环
                    //再次,按照year区分开
                    $result_year= mysql_query("SELECT year FROM student WHERE  type=3 ");
                    $array_year=array();
                    while ($row_year = mysql_fetch_array($result_year)) {
                        array_push($array_year,$row_year['year']);
                    }
                    // 从大到小排序
                    $array_year=array_unique($array_year);
                    rsort($array_year);
                    for ($j=0;$j<sizeof($array_year);$j++) {
                        echo "<div class='menu-item'><a href='#year".$array_year[$j]."'>".$array_year[$j]."级</a></div>";
                    }
                    //闭合标签
                    echo "</div>";
                    echo "</div>";
                    // 闭合标签
                }else if ($array_type[$i] === '4') {
                    echo "<div class='menu-drop'>";
                    echo "<div class='menu-drop-top'>";
                    echo "<div class='title'><a href='#4'>毕业硕士</a></div>";
                    echo "<div class='right'></div>";
                    echo "</div>";
                    echo "<div class='menu-drop-content'>";
                    // 再次循环
                    //再次,按照year区分开
                    $result_year= mysql_query("SELECT year FROM student WHERE  type=4 ");
                    $array_year=array();
                    while ($row_year = mysql_fetch_array($result_year)) {
                        array_push($array_year,$row_year['year']);
                    }
                    // 从大到小排序
                    $array_year=array_unique($array_year);
                    rsort($array_year);
                    for ($j=0;$j<sizeof($array_year);$j++) {
                        echo "<div class='menu-item'><a href='#year".$array_year[$j]."'>".$array_year[$j]."级</a></div>";
                    }
                    //闭合标签
                    echo "</div>";
                    echo "</div>";
                    // 闭合标签
                }

            }
        ?>









    </div>
    <div class="mian-right" id="main-right">

        <div class="teacher">
            <div class="title">导师</div>
            <div class="content">
                <div class="item-wrap">

                    <?php

                    $result=mysql_query("SELECT * from teacher");

                    if ($result == false) {
                        echo "数据库查询失败";
                    } else {

                        while($row = mysql_fetch_array($result))
                        {
                            if ($row['mkey']!=="导师头像"){
                                echo "<div class='item'>";
                                echo "<div class='header'>".$row['mkey'] . "</div>";
                                echo "<div class='content'>" . $row['mvalue']."</div>";
                                echo "</div>";
                            }else{
                                $imgsrc=$row['mvalue'];
                            }

                        }



                    }

                    ?>













                </div>
                <img src="<?php echo $imgsrc;?>" class="person">

            </div>
        </div>


        <div class="student">



            <?php


            for ($m=0;$m<sizeof($array_type);$m++) {

                if ($array_type[$m] === '1') {
                    echo "<div class='title'><a name='1'>在读博士</a></div>";
                    //再次,按照year区分开
                    $result_year= mysql_query("SELECT year FROM student WHERE  type=1 ");
                    $array_year=array();
                    while ($row_year = mysql_fetch_array($result_year)) {
                        array_push($array_year,$row_year['year']);
                    }
                    // 从大到小排序
                    $array_year=array_unique($array_year);
                    rsort($array_year);
                    for ($n=0;$n<sizeof($array_year);$n++) {
                        echo "<div class='time'><a name='year".$array_year[$n]."'>".$array_year[$n]."</a></div>";
                        echo "<div class='content'>";
                        $result_item= mysql_query("SELECT * FROM student WHERE  type=1 AND year='$array_year[$n]' ");
                        while ($row_item = mysql_fetch_array($result_item)) {
                            echo "<div class='item' title='".$row_item[6]."' >";
                            echo "<img src='".$row_item[3]."'>";
                            echo "<div class='name'>".$row_item[4]."</div>";
                            echo "<div class='email' title='".$row_item[5]."'>".$row_item[5]."</div>";
                            echo "</div>";
                        }
                        //闭合标签
                        echo "</div>";
                        // 闭合标签
                    }
                } else if ($array_type[$m] === '2') {
                    echo "<div class='title'><a name='2'>毕业博士</a></div>";
                    //再次,按照year区分开
                    $result_year= mysql_query("SELECT year FROM student WHERE  type=2 ");
                    $array_year=array();
                    while ($row_year = mysql_fetch_array($result_year)) {
                        array_push($array_year,$row_year['year']);
                    }
                    // 从大到小排序
                    $array_year=array_unique($array_year);
                    rsort($array_year);
                    for ($n=0;$n<sizeof($array_year);$n++) {
                        echo "<div class='time'><a name='year".$array_year[$n]."'>".$array_year[$n]."</a></div>";
                        echo "<div class='content'>";
                        $result_item= mysql_query("SELECT * FROM student WHERE  type=2 AND year='$array_year[$n]' ");
                        while ($row_item = mysql_fetch_array($result_item)) {
                            echo "<div class='item' title='".$row_item[6]."' >";
                            echo "<img src='".$row_item[3]."'>";
                            echo "<div class='name'>".$row_item[4]."</div>";
                            echo "<div class='email' title='".$row_item[5]."'>".$row_item[5]."</div>";
                            echo "</div>";
                        }
                        //闭合标签
                        echo "</div>";
                        // 闭合标签
                    }
                } else if ($array_type[$m] === '3') {
                    echo "<div class='title'><a name='3'>在读硕士</a></div>";
                    //再次,按照year区分开
                    $result_year= mysql_query("SELECT year FROM student WHERE  type=3 ");
                    $array_year=array();
                    while ($row_year = mysql_fetch_array($result_year)) {
                        array_push($array_year,$row_year['year']);
                    }
                    // 从大到小排序
                    $array_year=array_unique($array_year);
                    rsort($array_year);
                    for ($n=0;$n<sizeof($array_year);$n++) {
                        echo "<div class='time'><a name='year".$array_year[$n]."'>".$array_year[$n]."</a></div>";
                        echo "<div class='content'>";
                        $result_item= mysql_query("SELECT * FROM student WHERE  type=3 AND year='$array_year[$n]' ");
                        while ($row_item = mysql_fetch_array($result_item)) {
                            echo "<div class='item' title='".$row_item[6]."' >";
                            echo "<img src='".$row_item[3]."'>";
                            echo "<div class='name'>".$row_item[4]."</div>";
                            echo "<div class='email' title='".$row_item[5]."'>".$row_item[5]."</div>";
                            echo "</div>";
                        }
                        //闭合标签
                        echo "</div>";
                        // 闭合标签
                    }
                }else if ($array_type[$m] === '4') {
                    echo "<div class='title'><a name='4'>毕业硕士</a></div>";
                    //再次,按照year区分开
                    $result_year= mysql_query("SELECT year FROM student WHERE  type=4 ");
                    $array_year=array();
                    while ($row_year = mysql_fetch_array($result_year)) {
                        array_push($array_year,$row_year['year']);
                    }
                    // 从大到小排序
                    $array_year=array_unique($array_year);
                    rsort($array_year);
                    for ($n=0;$n<sizeof($array_year);$n++) {
                        echo "<div class='time'><a name='year".$array_year[$n]."'>".$array_year[$n]."</a></div>";
                        echo "<div class='content'>";
                        $result_item= mysql_query("SELECT * FROM student WHERE  type=4 AND year='$array_year[$n]' ");
                        while ($row_item = mysql_fetch_array($result_item)) {
                            echo "<div class='item' title='".$row_item[6]."' >";
                            echo "<img src='".$row_item[3]."'>";
                            echo "<div class='name'>".$row_item[4]."</div>";
                            echo "<div class='email' title='".$row_item[5]."'>".$row_item[5]."</div>";
                            echo "</div>";
                        }
                        //闭合标签
                        echo "</div>";
                        // 闭合标签
                    }
                }


            }

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
<script src="../js/lib/bootstrap.js" type="javascript"></script>
<script>

    $(document).ready(function(){

        $(".menu-drop .right").click(function(){
            $(this).parent().parent().children(".menu-drop-content").fadeToggle();
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