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


<form action="first.php" method="post" enctype="multipart/form-data" class="form-group">

    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">请选择编辑区块</span>
        <select class="form-control" name="kind" id="kind">
            <option value="jianjie">课题组简介</option>
            <option value="yiqi">仪器资源</option>
        </select>
    </div>

    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">图片1地址</span>
        <input type="text" class="form-control" name="img1" id="img1">
        <span class="input-group-addon">预览图片</span>
    </div>
    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">图片2地址</span>
        <input type="text" class="form-control" name="img2" id="img2">
        <span class="input-group-addon">预览图片</span>
    </div>
    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">图片2地址</span>
        <input type="text" class="form-control" name="img3" id="img3">
        <span class="input-group-addon">预览图片</span>
    </div>

    <div class="input-group" style="margin-top:10px; width:100%">
                <textarea id="content_text" class="form-control" rows="10" name="content"></textarea>
    </div>


    <input name="submit" type="button" class="btn btn-info btn-lg"
           style="margin-top:20px; margin-bottom:20px; width:100%" value="发布更新" id="submit"/>

</form>

</div>
<script src="tinymce/tinymce.min.js"></script>
<script>

    tinymce.init({
        selector: '#content_text',
        language: 'zh_CN',
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
        ],
    });


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



    var kind = document.getElementById('kind');

    var ajax = new ClassAJAXTool();

    var contentText = document.getElementById('content_text');
    var img1 = document.getElementById('img1');
    var img2 = document.getElementById('img2');
    var img3 = document.getElementById('img3');


    //alert(contentText.value);

    var getJianjie = function () {

        ajax.get('http://219.218.125.248/admin/getFirstJianjieImg1.php', function (res) {
            img1.value=res;
        });
        ajax.get('http://219.218.125.248/admin/getFirstJianjieImg2.php', function (res) {
            img2.value=res;
        });
        ajax.get('http://219.218.125.248/admin/getFirstJianjieImg3.php', function (res) {
            img3.value=res;
        });
        ajax.get('http://219.218.125.248/admin/getFirstJianjieContent.php', function (res) {
            console.log("反悔的res:"+res);
            tinyMCE.activeEditor.setContent(res);
        });

    }
    getJianjie();

    var getYiqi = function () {
        ajax.get('http://219.218.125.248/admin/getFirstYiqiImg1.php', function (res) {
            img1.value=res;
        });
        ajax.get('http://219.218.125.248/admin/getFirstYiqiImg2.php', function (res) {
            img2.value=res;
        });
        ajax.get('http://219.218.125.248/admin/getFirstYiqiImg3.php', function (res) {
            img3.value=res;
        });
        ajax.get('http://219.218.125.248/admin/getFirstYiqiContent.php', function (res) {
            tinyMCE.activeEditor.setContent(res);
        });
    }

    var kindFlags='jianjie';

    kind.onchange = function () {


        if (this.value == 'jianjie') {
            kindFlags='jianjie';
            getJianjie();
        }
        else
        {
            kindFlags='yiqi';
            getYiqi();
        }

    }


    var submit=document.getElementById("submit");

    submit.addEventListener("click",function () {

        if (kindFlags=='jianjie')
        {
            ajax.post('http://219.218.125.248/admin/setFirstJianjie.php','img1='+img1.value+'&img2='+img2.value+'&img3='+img3.value+'&content='+tinyMCE.activeEditor.getContent(), function (res) {
                alert(res);
            });
        }
        else
        {
            ajax.post('http://219.218.125.248/admin/setFirstYiqi.php','img1='+img1.value+'&img2='+img2.value+'&img3='+img3.value+'&content='+tinyMCE.activeEditor.getContent(), function (res) {
                alert(res);
            });
        }



    },false);

</script>

