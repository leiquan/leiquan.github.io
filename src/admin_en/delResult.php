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


<style>

    #container{
        width: 90%;
    }

</style>


<div id="container">

    <div class="input-group" style="margin-top:10px;">
        <span class="input-group-addon">请选择要删除的研究成果</span>
        <select class="form-control" id="type">
            <option value="1">文章</option>
            <option value="2">专利</option>
        </select>
    </div>

    <div id="list-container">


    </div>

    <input name="submit" type="button" class="btn btn-info" style="margin-top:20px; margin-bottom:20px;" value="删除选中" id="del"/>


</div>
<script>
    var type=document.getElementById('type');
    var listContainer=document.getElementById('list-container');
    var ajax=new ClassAJAXTool();
    var getList=function(id){
        listContainer.innerHTML='';
        ajax.get("getResultByType.php?type="+id, function(res){
            var json=JSON.parse(res);
            console.log(JSON.parse(res));
            for (var i=0;i<json.length;i++) {
                var div=document.createElement("div");
                div.className='input-group result-item';
                div.id=json[i].id;
                div.style.marginTop='10px';
                div.innerHTML="<span class='input-group-addon'><input class='my-del' type='checkbox'value='"+json[i].id+"' ></span>";
                div.innerHTML+="<span class='input-group-addon'>年份:</span>";
                div.innerHTML+="<input type='text' class='form-control' value='"+json[i].year+"'>";
                div.innerHTML+="<span class='input-group-addon'>摘要:</span>";
                div.innerHTML+="<input type='text' class='form-control' value='"+json[i].description+"'>";
                div.innerHTML+="<span class='input-group-addon'>链接:</span>";
                div.innerHTML+="<input type='text' class='form-control' value='"+json[i].pdf_url+"'>";
                div.innerHTML+="<span class='input-group-addon btn-danger' style='cursor: pointer' title='"+json[i].id+"' onclick='delStudent("+json[i].id+")'>删除</span>";
                listContainer.appendChild(div);
            }
        });
    }
    type.onchange=function(){
        getList(type.value);
    }
    getList(1);

    var delStudent=function (id) {
        ajax.get("delResultByTypeId.php?type="+type.value+"&id="+id, function (res){
            if (res ==0){
                var item = document.getElementById(id);
                listContainer.removeChild(item);
            }else{
                alert("删除失败,请重试或联系网站管理员.");
            }
        });
    }

    var del=document.getElementById('del');
    del.onclick=function (){
        var dellist=document.getElementsByClassName('my-del');
        for (var i=0;i<dellist.length;i++) {
            if (dellist[i].checked == true) {
                console.log(dellist[i].value);
                delStudent(dellist[i].value);
//                if (i == dellist.length-1) {
//                    alert('已经删除完了,可以刷新了');
//                }
            }
        }
    }



</script>

