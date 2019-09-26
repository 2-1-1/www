<?php require_once('Connections/connect.php');
session_start();
header("content-type:text/html;charset=gb2312");
	header("Content-Type:text/html;charset=utf8"); 
	header("Access-Control-Allow-Origin: *"); //解决跨域
	header('Access-Control-Allow-Methods:POST');// 响应类型  
    mysql_select_db("upload", $testupload); //选择数据库
    mysql_query("SET NAMES utf8");//解决中文乱码问题
            $exx=explode(".", $_FILES["file"]["name"]);
       $extension = end( $exx);// 获取文件后缀名

      
        
     


	if ($_FILES["file"]["error"] > 0)  
	  {  
	  echo "错误: " . $_FILES["file"]["error"] . "<br />";  
	  }
	  /*//限制上传文件类型及大小
	  elseif (!(($_FILES["file"]["type"]=="image/jpeg" || $_FILES["file"]["type"]=="image/png") && $_FILES["file"]["size"]<1024000)) {
	    	echo "该文件不能被上传！";
	    }*/ 
	       /*//判断文件是否存在
        elseif(file_exists($filename))
        {
            echo "该文件已存在！";
        }*/  
	else  
	  {  
	$uid = $_SESSION['IDD'];//用户ID
	date_default_timezone_set("PRC");//设置时区
	$date=date('Ymdhis');//获取时间戳
	 $titles = $_POST['titles'];//获取输入标题
	 $author = $_SESSION['userss'];//获取当前登录用户名
    $info = $date;	//获取前文时间戳赋值给info方便插入info字段
	 $confname = "$date";//获取前文时间戳
    $files='http://localhost/uploadtest/upload/'. $confname .'.'. $extension;  //获取上传文件地址：网址+文件名（时间戳+扩展名）
    $filesname=$confname .'.'. $extension;//获取文件名（时间戳重命名后的文件名）
	  
	//插入数据到数据库 
	$strsql = "insert into upload (uid,titles,files,filesname,info,author) values('$uid','$titles','$files','$filesname','$info','$author')";
 
			$result = @mysql_query($strsql);
	    
	  
 //执行上传操作，设置utf8防止乱码，并指定上传目录为upload
	     move_uploaded_file($_FILES["file"]["tmp_name"],iconv("UTF-8", "gb2312", "upload/".$confname .'.'. $extension));


header("location:index.php");
}	     