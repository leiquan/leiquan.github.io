<?php

session_start();

//判断是否存在session，是则可以登陆，否，则检查数据库
if ($_SESSION["admin"] != "63a9f0ea7bb98050796b649e85481845") {
    echo "<script>";
    echo "alert('没有SESSION,请重新登录！');";
    echo "window.location.href='/admin/index.php'";
    echo "</script>";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $kind = $_POST['kind'];
    $content = $_POST['content'];

    //echo $content;


    $con = mysql_connect("localhost", "root", "yanglab");
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("yang_lab_en", $con);

    $result = mysql_query("UPDATE direction SET content = '$content' WHERE section = '$kind' ");

    if ($result == false) {
        echo "数据库查询失败";
    } else {
        echo "<div class='alert alert-warning alert-dismissible' role='alert' style='width:80%;'>
    ";
        echo "<button type='button' class='close' data-dismiss='alert'>
        ";
        echo "<span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span>";
        echo "
    </button>";
        echo "<strong>提示：</strong>文章发布成功！<a href='http://www.leiquan.me' ' class=' alert-link'>点击这里返回首页</a>";
        echo "
</div>";

    }

}
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
                <img id="preImg" src="../img/addfile.jpg" width="150" height="150"/>
                <input id="thisFile" type="file" name="file"
                       style="width:150px; height:150px;z-index:100; position:relative;top:-150px;opacity:0.0;"/>
            </div>
        </div>

        <div class="input-group" style="margin-top:10px;margin-bottom: 30px">
            <span class="input-group-addon btn btn-info" id="uploadPDF" style="background-color: #31b0d5">上传PDF并返回URL</span>
            <input class="form-control" type="text"  id="urlText" value="未上传文献，没有生成url!">
            <span class="input-group-addon btn-primary" id="clone" style="background-color: #3071a9">复制URL</span>
        </div>


    </div>



<form action="result.php" method="post" enctype="multipart/form-data">


    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">请选择发布类型</span>
        <select class="form-control" id="kind">
            <option value="article">文献</option>
            <option value="zhuanli">专利</option>
        </select>
    </div>

    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">请输入文献年份</span>
        <input class="form-control" type="text" name="year" id="year">
    </div>

    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">请输入文献摘要</span>
        <textarea class="form-control" type="text" name="description" id="description"></textarea>
    </div>

    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">请输入文献链接</span>
        <input class="form-control" type="text" name="pdf_url" id="pdf_url"/>
    </div>


    <input name="submit" type="button" class="btn btn-info btn-lg"
           style="margin-top:20px; margin-bottom:20px; width:100%" value="添加" id="submit"/>

</form>

</div>

<script src="tinymce/tinymce.min.js"></script>
<script>
    function safeLogout() {
        window.location = "admin/logout.php";
        window.opener = null;
        window.open('', '_self');
        window.close();
    }



        var thisFile = document.getElementById('thisFile');
        thisFile.onchange = function () {
            alert('已选择文件');
        }


        $('#uploadPDF').click(
            function () {

                if (thisFile.value != "") {
                    var form = new FormData();
                    form.append("file", thisFile.files[0]);                           // 文件对象
                    var xhr = new XMLHttpRequest();
                    xhr.open("post", 'pdf.php', true);
                    xhr.onload = function (res) {
                        console.log(res);
                        $('#urlText').val(res.currentTarget.responseText);
                    };
                    xhr.send(form);
                }
                else
                {
                    alert("未选择文件");
                }



//                if (thisFile.value != "") {

//                    var oMyForm = new FormData();
//                    oMyForm.append("file", thisFile.files[0]);
//                    console.log(oMyForm);
//                    oAjax.open("POST", "pdf.php", true);
//                    oAjax.setRequestHeader("Content-Type", "multipart/form-data");//这一句是后来加上的啊啊啊
//                    oAjax.send(oMyForm);
//                    oAjax.onreadystatechange = function () {
//                        if (oAjax.status == 200 || oAjax.status == 0) {//200为成功，0为本地请求成功
//                            //alert(oAjax.responseText);
//                            $('#urlText').html(oAjax.responseText);
//                        }
//                    }
//                } else {
//                    alert("未选择图片");
//                }
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

    tinymce.init({
        selector: '#content_text',
        language: 'zh_CN',
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
        ],
    });

    var kind=document.getElementById('kind');
    var year=document.getElementById('year');
    var description=document.getElementById('description');
    var pdf_url=document.getElementById('pdf_url');

    var submit=document.getElementById('submit');
    submit.addEventListener('click', function () {

        if (year.value == '' || description.value == '' || pdf_url.value == '')
        {
            alert("请检查输入!");
        }
        else
        {
            var ajax=new ClassAJAXTool();
            ajax.post('setResult.php','kind='+kind.value+"&year="+year.value+"&description="+description.value+"&pdf_url="+pdf_url.value,function (res){
                alert(res);
            });
        }


    },false);
</script>



