<!DOCTYPE html>
<html class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSS3图片相册立体阴影效果</title>
<link rel="stylesheet" href="css/reset.css" media="screen" />
<link rel="stylesheet" href="css/lanrenzhijia.css" media="screen" />
<link rel="stylesheet" href="css/css3_3d.css" media="screen" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script>
if (!Modernizr.csstransforms) {
	$(document).ready(function(){
		$(".close").text("Back to top");
	});
}
</script>
</head>
<body>
  
<div id="container">
  <button style="margin-top:50px;"><a href="/class/index.php" class='more'>返回首页</a></button>
  <script>
  $( "button" ).button();
  </script>

  <ul id="grid" class="group">
    <?php
    for($ii=0;$ii<count($mergearr);$ii++){
      $count = $ii+1;
      $mergearr[$ii]['img']?$messk = $mergearr[$ii]['img']:$messk = 'images/moren.jpg';
      echo "
      <li>
        <div class='details'>
          <h3>".$mergearr[$ii]['name']."</h3>
          <a class='more' href='#info".$count."'>查看</a> </div>
        <a class='more' href='#info".$count."'><img src='".$messk."' /></a>
      </li>
      ";
    }
    ?>
  </ul>
  <ul id="information">
    <?php
    for($iii=0;$iii<count($mergearr);$iii++){
      $count = $iii+1;
      echo "
      <li id='info".$count."'>
        <div>
          <h3>".$mergearr[$iii]['name']."的个人信息</h3>
          <p>
            电话：".$mergearr[$iii]['phone']."<br/>
            爱好：".$mergearr[$iii]['aihao']."<br/>
            学校：".$mergearr[$iii]['school']."<br/>
          </p>
          <a href='#' class='close'>x</a> </div>
        <span class='backface'></span>
      </li>
      ";
    }
    ?>
  </ul>
</div>
</body>
</html>