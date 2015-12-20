<?php

session_start();

header("Content-Type: text/html;charset=utf-8");

//判断是否存在session，是则可以登陆，否，则检查数据库
if ($_SESSION["admin"] != "63a9f0ea7bb98050796b649e85481845") {
    echo "<script>";
    echo "alert('没有SESSION,请重新登录！');";
    echo "window.location.href='/admin/index.php'";
    echo "</script>";
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <link href="../css/bootstrap.css" rel="stylesheet">
    <script src="../js/lib/jquery.js"></script>
    <script src="../js/lib/bootstrap.js"></script>
    <script src="../js/LeiquanLibrary.js"></script>



    <title>课题组后台英文版管理系统</title>
    <style>
        * {
            margin: 0 auto;
            font-family: "微软雅黑", "宋体", Arial;
        }

        html,body {
            background-color: #EDEDEF;
            height: 100%;
            margin: 0; padding: 0;
        }

        #head {
            width: 100%;
            height: 100px;
            line-height: 100px;
            font-size: 20px;
            background-color: #25ae5f;
            float: left;
        }

        #headContent {
            width: 1000px;
            height: 100px;
            background-color: #25ae5f;
            color: #FFF;
        }

        #head-left {
            width: 800px;
            height: 100px;
            background-color: #25ae5f;
            color: #FFF;
            float: left;
        }

        #head-right {
            width: 200px;
            height: 100px;
            background-color: #25ae5f;
            color: #FFF;
            float: left;
            text-align: right;
        }

        #head-left a {
            background-color: #25ae5f;
            color: #FFF;
        }

        #head-right a {
            background-color: #25ae5f;
            color: red;
        }

        #wrap {
            width: 100%;
            height: 100%;
        }

        #left {
            float: left;
            width: 250px;
            height: 100%;
            background: #ddd;
            margin-left: -100%;
            overflow-x: hidden;
            overflow-y: auto;
        }

        #main {
            float: left;
            width: 100%;
            height: 100%;
        }

        #right {
            margin-left: 250px;
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
        }

        #menu{
            width: 250px;
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        #menu li{
            list-style: none;
            width: 250px;
            height: 40px;
            line-height: 40px;

        }

        #menu li a{
            display: block;
            width: 250px;
            height: 40px;
            padding-left: 25px;
            padding-right: 25px;
            box-sizing: border-box;
            text-decoration: none;
            color: #0000FF;
        }

        #menu li a:hover{
            display: block;
            width: 250px;
            height: 40px;
            background-color: gray;
        }

        #menu li a .active{
            display: block;
            width: 250px;
            height: 40px;
            background-color: #CCC;
        }

    </style>
</head>
<body>

<div id="head">
    <div id="headContent">
        <div id="head-left">课题组后台英文版管理系统</div>
        <div id="head-right"><a href="javascript:safeLogout()">安全退出</a></div>
    </div>
</div>


<div id="wrap">
    <div id="main">
        <div id="right">
            欢迎来到课题组内部管理系统!
        </div>
    </div>
    <div id="left">
        <ul id="menu">
            <li><a href="javascript:void(0);" id="first">首页展示修改</a></li>
            <li><a href="javascript:void(0);" id="direction">研究方向修改</a></li>
            <li><a href="javascript:void(0);" id="result">添加研究成果</a></li>
            <li><a href="javascript:void(0);" id="del-result">删除研究成果</a></li>
            <li><a href="javascript:void(0);" id="student">添加学生</a></li>
            <li><a href="javascript:void(0);" id="del-student">删除学生</a></li>
            <li><a href="javascript:void(0);" id="teacher">导师修改</a></li>
            <li><a href="javascript:void(0);" id="news">添加新闻</a></li>
            <li><a href="javascript:void(0);" id="del-news">删除新闻</a></li>
        </ul>
    </div>
</div>


<script>
    window.onload=function () {
        var wrap=document.getElementById("wrap");
        wrap.style.height=document.body.clientHeight-100+"px";
    }
    window.onresize=function () {
        window.location.reload();
    }
    var menu=document.getElementById("menu");
    menu.addEventListener("click",function(e){

        if (e.target.id == "first")
        {
            $("#right").load('first.php');
            //e.target.className="active";
        }
        else if (e.target.id == "direction")
        {
            $("#right").load('direction.php');
        }
        else if (e.target.id == "result")
        {
            $("#right").load('result.php');
        }
        else if (e.target.id == "student")
        {
            $("#right").load('member.php');
        }else if (e.target.id == "del-student")
        {
            $("#right").load('delStudent.php');
        } else if (e.target.id == "teacher")
        {
            $("#right").load('teacher.php');
        }else if (e.target.id == "news")
        {
            $("#right").load('news.php');
        }
        else if (e.target.id == "del-result")
        {
            $("#right").load('delResult.php');
        }else if (e.target.id == "del-news")
        {
            $("#right").load('delNews.php');
        }



    },false);
    function safeLogout() {
        window.location = "admin/logout.php";
        window.opener = null;
        window.open('', '_self');
        window.close();
    }

</script>
</body>
</html>
