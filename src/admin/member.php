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


//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
//
//
//        echo "<div class='alert alert-warning alert-dismissible' role='alert' style='width:80%;'>
//    ";
//        echo "<button type='button' class='close' data-dismiss='alert'>
//        ";
//        echo "<span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span>";
//        echo "
//    </button>";
//        echo "<strong>提示：</strong>文章发布成功！<a href='http://www.leiquan.me' ' class=' alert-link'>点击这里返回首页</a>";
//        echo "
//</div>";
//
//
//
//}
?>


<style>

    #preImg {
        cursor: pointer;
    }
    #container{
        width: 90%;
    }
</style>


<div id="container">
    <div class="form-group">

        <div style="width:100%;height:150px; margin-top:20px;margin-bottom:10px;float:left;">
            <div style="width:150px; height:150px;float:left;border-radius:10px;background-size:150px 150px;">
                <img id="preImg" src="../img/addimg.png" width="150" height="150"/>
                <input id="thisFile" type="file" name="file"
                       style="width:150px; height:150px;z-index:100; position:relative;top:-150px;opacity:0.0;"/>
            </div>
        </div>

        <div class="input-group" style="margin-top:10px;margin-bottom: 30px">
            <span class="input-group-addon btn btn-info" id="uploadImg" style="background-color: #31b0d5">上传图片并返回URL</span>
            <input class="form-control" type="text"  id="urlText" value="未上传图片，没有生成url!">
            <span class="input-group-addon btn-primary" id="clone" style="background-color: #3071a9">复制URL</span>
        </div>


    </div>

<form action="first.php" method="post" enctype="multipart/form-data">

    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">请选择学生类型</span>
        <select class="form-control" name="kind" id="type">
            <option value="1">在读博士</option>
            <option value="2">已毕业博士</option>
            <option value="3">在读硕士</option>
            <option value="4">已毕业硕士</option>
        </select>
    </div>

    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">年级</span>
        <input type="text" class="form-control" name="img1" id="year">
    </div>
    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">头像URL</span>
        <input type="text" class="form-control" name="img2" id="pic">
    </div>
    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">姓名</span>
        <input type="text" class="form-control" name="img3" id="username">
    </div>
    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">邮箱</span>
        <input type="text" class="form-control" name="img3" id="email">
    </div>
    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">简介</span>
        <input type="text" class="form-control" name="img3" id="description">
    </div>



    <input name="submit" type="button" class="btn btn-info btn-lg"
           style="margin-top:20px; margin-bottom:20px; width:100%" value="增加一个学生" id="submit"/>

</form>

</div>
<script>



    //图像预览，传入两个参数，文件选择器，和展示图像的img容器
    function viewPic(fileElement, imgElement) {
        //通过file.size可以取得图片大小
        var reader = new FileReader();
        reader.onload = function (evt) {
            imgElement.src = evt.target.result;
        }
        reader.readAsDataURL(fileElement.files[0]);
    }



        var thisFile = document.getElementById('thisFile');
        var preImg = document.getElementById('preImg');
        thisFile.onchange = function () {
            viewPic(thisFile, preImg);
        }

        $('#uploadImg').click(
            function () {
                if (thisFile.value != "") {
                    var oAjax = null;
                    if (window.XMLHttpRequest) {
                        oAjax = new XMLHttpRequest();
                    } else {
                        oAjax = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    var oMyForm = new FormData();
                    oMyForm.append("file", thisFile.files[0]);
                    oAjax.open("POST", "image.php", true);
                    //oAjax.setRequestHeader("Content-Type", "multipart/form-data");//这一句是后来加上的啊啊啊
                    oAjax.send(oMyForm);
                    oAjax.onreadystatechange = function () {
                        if (oAjax.status == 200 || oAjax.status == 0) {//200为成功，0为本地请求成功
                            //alert(oAjax.responseText);
                            $('#urlText').val(oAjax.responseText);
                        }
                    }
                } else {
                    alert("为选择图片");
                }
            }
        );

        $('#clone').click(
            function (){
                if (window.clipboardData) {
                    window.clipboardData.setData("Text", $('#urlText').val());
                }else{
                    window.prompt("非IE浏览器请使用Ctrl+C复制", $('#urlText').val());
                }
            }
        );



    var kind = document.getElementById('kind');

    var ajax = new ClassAJAXTool();

    var type = document.getElementById('type');
    var year = document.getElementById('year');
    var pic = document.getElementById('pic');
    var uname = document.getElementById('username');
    var email = document.getElementById('email');
    var description = document.getElementById('description');






    var submit=document.getElementById("submit");

    submit.addEventListener("click",function () {

            ajax.post('http://219.218.125.248/admin/setStudent.php','type='+type.value+'&year='+year.value+'&pic='+pic.value+'&uname='+uname.value+"&email="+email.value+"&description="+description.value, function (res) {
                alert(res);
            });




    },false);

</script>

