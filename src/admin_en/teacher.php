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


$con = mysql_connect("localhost", "root", "yanglab");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("yang_lab_en", $con);

mysql_query("set names 'utf8' ");

// 清空表名

$result=mysql_query("SELECT * from teacher");

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


    <div id="teacher-introduce-container">


        <?php

        while($row = mysql_fetch_array($result))
        {

            if ($row['mkey']!=="导师头像"){
                echo "<div class='input-group' style='margin-top:10px;'>";
                echo "<span class='input-group-addon'>字段名:</span>";
                echo "<input type='text' class='form-control my-key' value='".$row['mkey']."'>";
                echo "<span class='input-group-addon'>内容:</span>";
                echo "<input type='text' class='form-control my-value' value='".$row['mvalue']."'>";
                echo "<span class='input-group-addon btn-danger'>删除</span>";
                echo "</div>";
            }else{
                echo "<div class='input-group' style='margin-top:10px;'>";
                echo "<span class='input-group-addon'>字段名（不可修改和删除）:</span>";
                echo "<input type='text' class='form-control my-key' value='".$row['mkey']."' disabled>";
                echo "<span class='input-group-addon'>图像URL:</span>";
                echo "<input type='text' class='form-control my-value' value='".$row['mvalue']."'>";
                echo "</div>";
            }

        }

        ?>










    </div>




    <input name="submit" type="button" class="btn btn-info" style="margin-top:20px; margin-bottom:20px;" value="增加字段" id="add"/>

    <input name="submit" type="button" class="btn btn-primary" style="margin-top:20px; margin-bottom:20px;" value="发布更新" id="submit"/>

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
            function () {
                if (window.clipboardData) {
                    window.clipboardData.setData("Text", $('#urlText').val());
                }else{
                    window.prompt("非IE浏览器请使用Ctrl+C复制", $('#urlText').val());
                }
            }
        );


    var ajax = new ClassAJAXTool();


    var container = document.getElementById("teacher-introduce-container");
    container.addEventListener("click", function (e) {

        if (e.target.className == 'input-group-addon btn-danger') {
            container.removeChild(e.target.parentNode);
        }

    }, false);

    var add=document.getElementById("add");
    add.addEventListener('click', function () {
        var ele=document.createElement("DIV");
        ele.className='input-group';
        ele.style.marginTop='10px';

        ele.innerHTML="<span class='input-group-addon'>字段名:</span>";
        ele.innerHTML+="<input type='text' class='form-control my-key'>";
        ele.innerHTML+="<span class='input-group-addon'>内容:</span>";
        ele.innerHTML+="<input type='text' class='form-control my-value'>";
        ele.innerHTML+="<span class='input-group-addon btn-danger'>删除</span>";

        container.appendChild(ele);


    });

    var submit=document.getElementById('submit');
    submit.onclick =function () {
        var keys=document.getElementsByClassName('my-key');
        var keysArr=[];
        for (var i=0;i<keys.length;i++) {
            keysArr.push(keys[i].value);
        }

        var values=document.getElementsByClassName('my-value');
        var valuesArr=[];
        for (var i=0;i<values.length;i++) {
            valuesArr.push(values[i].value);
        }

        console.log(keysArr);
        console.log(valuesArr);

//        ajax.get('getTeacher.php',function (res) {
//            console.log(res);
//        });

        ajax.post("setTeacher.php", "key="+keysArr.join(',')+"&value="+valuesArr.join(','), function (res) {
            alert(res);
        });

    }




</script>

