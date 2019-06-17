<?php
header("content-type:text/html;charset=utf-8");	
$name=$_POST['name'];
$phone=$_POST['phone'];
$adris=$_POST['adris'];
$aihao=$_POST['aihao'];
$school=$_POST['school'];
#连接数据库
$link = mysqli_connect('localhost','root','123')or die("连接数据库失败");
mysqli_select_db($link,'class');
mysqli_set_charset($link,'utf8');
// $sql = 'select * from 表名';
$ac=$_GET['a'];
if($ac == 'search'){
	#对数据库进行查询操作
	#如果是全空将是查询全部的同学信息
	#判断是否所有字段全部为空
	if ($name == '' && $phone == '' && $adris == '' && $aihao == '' && $school == '') {
		$serchsql = 'select * from student';
		$sss = mysqli_query($link,$serchsql);
		$rows = mysqli_num_rows($sss);
		if($rows != 0){
			for($i=0; $i<$rows; $i++){
                $row = mysqli_fetch_assoc($sss);
                $mergearr[] = $row;
            }
			include('show.php');
		}else{
			header("location:../jsbackfround/error.php?mes=nonee");
			die;
		}
	}else{
		$name != '' ?$name="%$name%":$name='';
		$phone != '' ?$phone="%$phone%":$phone='';
		$adris != '' ?$adris="%$adris%":$adris='';
		$aihao != '' ?$aihao="%$aihao%":$aihao='';
		$school != '' ?$school="%$school%":$school='';
		$search = "select * from student where name like '$name' or phone like '$phone' or adris like '$adris' or aihao like '$aihao'or school like '$school'";
		$sss = mysqli_query($link,$search);
		$rows = mysqli_num_rows($sss);
		if($rows != 0){
			for($i=0; $i<$rows; $i++){
                $row = mysqli_fetch_assoc($sss);
                $mergearr[] = $row;
            }
			include('show.php');
		}else{
			header("location:../jsbackfround/error.php?mes=nonee");
			die;
		}
	}
	die;
}
if($ac == "inputt"){
	if(($_FILES["file"]['name']) != ''){
		// var_dump($_FILES["file"]['name']);
		// die;
		//array(5) { ["name"]=> string(17) "56e79ea2e1418.jpg" ["type"]=> string(10) "image/jpeg" ["tmp_name"]=> string(43) "C:\Users\asus\AppData\Local\Temp\phpD07.tmp" ["error"]=> int(0) ["size"]=> int(454445) } 
		//1.限制文件的类型，防止注入php或其他文件，提升安全
		//2.限制文件的大小，减少内存压力
		//3.防止文件名重复，提升用户体验
		    //方法一：  修改文件名    一般为:时间戳+随机数+用户名
		    // 方法二:建文件夹
		    
		//4.保存文件

		//判断上传的文件是否出错,是的话，返回错误
		if($_FILES["file"]["error"])
		{
		    // echo $_FILES["file"]["error"];
		    header("location:../jsbackfround/error.php?mes=imgfile");
			die;
		}else{
		    //没有出错
		    //加限制条件
		    //判断上传文件类型为png或jpg且大小不超过1024000B
		    if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg")&&$_FILES["file"]["size"]<1024000)
		    {
		            //防止文件名重复
		            $filename ="./upimg/".time().$_FILES["file"]["name"];
		            //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
		            $filename =iconv("UTF-8","gb2312",$filename);
		             //检查文件或目录是否存在
		            if(file_exists($filename))
		            {
		                // echo"该文件已存在";
		                header("location:../jsbackfround/error.php?mes=imgfile");
						die;
		            }else{
		                //保存文件,   move_uploaded_file 将上传的文件移动到新位置  
		                move_uploaded_file($_FILES["file"]["tmp_name"],$filename);//将临时地址移动到指定地址    
		            	include("imgcchange.php");
		            	$imgurl = imagecropper($filename,290,200);
						#如果没有输入姓名将返回错误页面
						if ($name == '') {
							header("location:../jsbackfround/error.php?mes=nulll");
							die;
						}
						#检查是否有重复的同学姓名重复录入
						$checksql = "select * from student where name='$name'";
						$semess = mysqli_query($link,$checksql);
						$rows = mysqli_num_rows($semess);
						if($rows){
							header("Location:/index.php?messs=chonfu");
							die;
						}

						#进行同学信息的录入操作
						$sql = "INSERT INTO student(name,phone,adris,aihao,school,img) VALUES ('$name','$phone','$adris','$aihao','$school','$imgurl')";
						mysqli_query($link,$sql)or die('添加数据出错：'.mysql_error());
						header("Location:/index.php?messs=sceess");
		            }        
		    }else{
		        // echo"文件类型不对";
			    header("location:../jsbackfround/error.php?mes=imgfile");
				die;
		    }
		}
	}else{
		#如果没有输入姓名将返回错误页面
		if ($name == '') {
			header("location:../jsbackfround/error.php?mes=nulll");
			die;
		}
		#检查是否有重复的同学姓名重复录入
		$checksql = "select * from student where name='$name'";
		$semess = mysqli_query($link,$checksql);
		$rows = mysqli_num_rows($semess);
		if($rows){
			header("Location:/index.php?messs=chonfu");
			die;
		}

		#进行同学信息的录入操作
		$sql = "INSERT INTO student(name,phone,adris,aihao,school) VALUES ('$name','$phone','$adris','$aihao','$school')";
		mysqli_query($link,$sql)or die('添加数据出错：'.mysql_error());
		header("Location:/index.php?messs=sceess");
	}
}
mysqli_close($link);
?>
