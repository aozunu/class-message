<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>提示：</title>

<link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="all">
	<center style="padding-top:230px;">
		<h1 style="color:red;">
			<?php
				function tiao(){
					header("refresh:3;url=/index.php");
					print('<br/>正在加载，请稍等...<br>三秒后自动跳转。');
				}
				if ($_GET['mes'] == 'nulll') {
					echo "你的名字不能为空！！！";
					tiao();
				}
				if ($_GET['mes'] == 'bucunz') {
					echo "你访问的页面不存在！！！";
					tiao();
				}
				if ($_GET['mes'] == 'nonee') {
					echo "没有找到任何数据！！！";
					tiao();
				}
				if ($_GET['mes'] == 'imgfile') {
					echo "图片上传失败！！！";
					tiao();
				}
			?>
		</h1>
	</center>
	<div class="star">
	</div>
</div>

<script src='js/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
