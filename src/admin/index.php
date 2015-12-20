<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>中文版后台管理系统</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <script src="../js/lib/jquery.js"></script>
    <script src="../js/lib/bootstrap.js"></script>

</head>

<?php
function login($admin,$password)
{

    $con = mysql_connect("localhost", "root", "yanglab");
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("yang_lab", $con);

    $result = mysql_query("SELECT * FROM admin");

    while ($row = mysql_fetch_array($result)) {

        if ($admin === $row['admin'] && $password === $row['password']) {
            return true;
        } else {
            return false;
        }

    }

    mysql_close($con);

}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $admin = test_input($_POST["admin"]);
    $password = test_input($_POST["password"]);

   if ( login($admin, $password)) {
       $_SESSION['admin']=md5($admin);
       //echo $_SESSION['admin'];
       Header("HTTP/1.1 303 See Other"); //这条语句可以不写
       Header("Location: /admin/main.php");
   } else {
       echo "失败么么哒";
   }

}

?>

<body>



<div class="alert alert-success" role="alert">中文版后台管理系统------（<a href="../admin_en/index.php">切换到英文版</a>）</div>



<div class="container" style="width:400px; margin-top:100px;">


    <form action="index.php" method="post">

        <div class="input-group">
            <span class="input-group-addon">管理员账号：</span>
            <input type="text" class="form-control" name="admin">
        </div>

        <div class="input-group" style="margin-top:10px">
            <span class="input-group-addon">管理员密码：</span>
            <input type="password" class="form-control" name="password">
        </div>



        <div class="input-group" style="margin-top:30px; width:200px; margin-left:100px;">
            <input type="submit"  class="btn btn-info" style="width:100%" value="登陆系统" />
        </div>

    </form>




</div>








</body>
</html>
