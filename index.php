<?php
if(isset($_GET['messs'])){
  if($_GET['messs'] == 'sceess'){
    echo "<script>alert('添加成功！')</script>";
  }
  if($_GET['messs'] == 'chonfu'){
    echo "<script>alert('同学你的名字已经存在哦！不能再次添加。')</script>";
  }
}
?>
<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>小幸运</title>

<link rel="stylesheet" href="css/style.css">

<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<script src="js/jquery.min.js"></script>

</head>
<body>

<div class="cotn_principal">
  <div class="cont_centrar">
    <div class="cont_login">
      <div class="cont_info_log_sign_up">
        <div class="col_md_login">
          <div class="cont_ba_opcitiy">
            <h2>查询</h2>
            <p>查找好朋友.</p>
            <button class="btn_login" onClick="cambiar_login()">查询</button>
          </div>
        </div>
        <div class="col_md_sign_up">
          <div class="cont_ba_opcitiy">
            <h2>录入</h2>
            <p>录入自己的信息让更多人看到你.</p>
            <button class="btn_sign_up" onClick="cambiar_sign_up()">录入</button>
          </div>
        </div>
      </div>
      <div class="cont_back_info">
        <div class="cont_img_back_grey"> <img src="po.jpg" alt="" /> </div>
      </div>
      <div class="cont_forms" >
        <div class="cont_img_back_"> <img src="po.jpg" alt="" /> </div>
        <form action="action/action.php?a=search" method="post">
        <div class="cont_form_login">
          <a href="#" onClick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
          <h2>查询</h2>
          <input id="name1" type="text" placeholder="姓名" style="height:10px;margin-top:5px;" name="name" onblur = "CheckUserName('name1')"/>
          <input type="text" placeholder="电话" style="height:10px;margin-top:5px;" name="phone"/>
          <input type="text" placeholder="地址" style="height:10px;margin-top:5px;" name="adris"/>
          <input type="text" placeholder="爱好" style="height:10px;margin-top:5px;" name="aihao"/>
          <input type="text" placeholder="学校" style="height:10px;margin-top:5px;" name="school"/>
          <!-- <button class="btn_login" onClick="cambiar_login()" type="submit">查询</button> -->
          <button class="btn_login">查询</button>
        </div>
        </form>
        <form action="action/action.php?a=inputt" method="post" enctype="multipart/form-data">
        <div class="cont_form_sign_up">
          <a href="#" onClick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
          <h2>录入</h2>
          <input id="name2" type="text" placeholder="姓名" style="height:10px;margin-top:5px;" name="name" onblur = "CheckUserName('name2')"/>
          <input type="text" placeholder="电话" style="height:10px;margin-top:5px;" name="phone"/>
          <input type="text" placeholder="地址" style="height:10px;margin-top:5px;" name="adris"/>
          <input type="text" placeholder="爱好" style="height:10px;margin-top:5px;" name="aihao"/>
          <input type="text" placeholder="学校" style="height:10px;margin-top:5px;" name="school"/>
          <input type="file" name="file" onchange="PreviewImage(this,'imgHeadPhoto','divPreview');" size="20" style="margin-top: 0px;"/>
          <!-- <input type="password" placeholder="Confirm Password" /> -->
          <!-- <button class="btn_sign_up" onClick="cambiar_sign_up()">提交</button> -->
          <button class="btn_sign_up">提交</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    //js本地图片预览，兼容ie[6-9]、火狐、Chrome17+、Opera11+、Maxthon3
    function PreviewImage(fileObj, imgPreviewId, divPreviewId) {
        var allowExtention = ".jpg,.bmp,.gif,.png"; //允许上传文件的后缀名document.getElementById("hfAllowPicSuffix").value;
        var extention = fileObj.value.substring(fileObj.value.lastIndexOf(".") + 1).toLowerCase();
        var browserVersion = window.navigator.userAgent.toUpperCase();
        if (allowExtention.indexOf(extention) > -1) {
            if (fileObj.files) {//HTML5实现预览，兼容chrome、火狐7+等
                if (window.FileReader) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById(imgPreviewId).setAttribute("src", e.target.result);
                    }
                    reader.readAsDataURL(fileObj.files[0]);
                } else if (browserVersion.indexOf("SAFARI") > -1) {
                    alert("不支持Safari6.0以下浏览器的图片预览!");
                }
            } else if (browserVersion.indexOf("MSIE") > -1) {
                if (browserVersion.indexOf("MSIE 6") > -1) {//ie6
                    document.getElementById(imgPreviewId).setAttribute("src", fileObj.value);
                } else {//ie[7-9]
                    fileObj.select();
                    if (browserVersion.indexOf("MSIE 9") > -1)
                        fileObj.blur(); //不加上document.selection.createRange().text在ie9会拒绝访问
                    var newPreview = document.getElementById(divPreviewId + "New");
                    if (newPreview == null) {
                        newPreview = document.createElement("div");
                        newPreview.setAttribute("id", divPreviewId + "New");
                        newPreview.style.width = document.getElementById(imgPreviewId).width + "px";
                        newPreview.style.height = document.getElementById(imgPreviewId).height + "px";
                        newPreview.style.border = "solid 1px #d2e2e2";
                    }
                    newPreview.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='" + document.selection.createRange().text + "')";
                    var tempDivPreview = document.getElementById(divPreviewId);
                    tempDivPreview.parentNode.insertBefore(newPreview, tempDivPreview);
                    tempDivPreview.style.display = "none";
                }
            } else if (browserVersion.indexOf("FIREFOX") > -1) {//firefox
                var firefoxVersion = parseFloat(browserVersion.toLowerCase().match(/firefox\/([\d.]+)/)[1]);
                if (firefoxVersion < 7) {//firefox7以下版本
                    document.getElementById(imgPreviewId).setAttribute("src", fileObj.files[0].getAsDataURL());
                } else {//firefox7.0+                    
                    document.getElementById(imgPreviewId).setAttribute("src", window.URL.createObjectURL(fileObj.files[0]));
                }
            } else {
                document.getElementById(imgPreviewId).setAttribute("src", fileObj.value);
            }
        } else {
            alert("仅支持" + allowExtention + "为后缀名的文件!");
            fileObj.value = ""; //清空选中文件
            if (browserVersion.indexOf("MSIE") > -1) {
                fileObj.select();
                document.selection.clear();
            }
            fileObj.outerHTML = fileObj.outerHTML;
        }
        return fileObj.value;    //返回路径
    }
</script>
<script src="js/index.js"></script>

</body>
</html>

