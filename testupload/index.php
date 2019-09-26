<?php require_once('Connections/connect.php'); 
 session_start();
      mysql_select_db("upload");         
?>
<?php
mysql_query("set character set 'utf8'");//读库
mysql_query("set names 'utf8'");//写库

$sql="select * from upload";                     //查询数据表upload
    $rs=mysql_query($sql);



?>

<head>

    <meta charset="UTF-8">
    
    <title>文件上传下载demo</title>
    
</head>

<body>


          
            <ul>
                <li>
                    <a>
                        欢迎您：<?php echo $_SESSION['userss']; ?>
                    </a>
                    </li>
                    
                        
                        <li>
                            <form method="post" action="login.php?l=1">
                                <button type="submit">
                                     注销
                                </button>
                            </form>
                        </li>
            </ul>



    <!--文件列表-->

                    列表<a href="upload.html">上传</a>
                        <ul>
                            <li>
                                文件列表  日期 上传者 操作
                      </li>
                            <?php
    while($row=mysql_fetch_assoc($rs)){
      ?>
                                <li>
                                    <a href=""><?php echo $row['filesname'];?></a>
                                    <a href=""><?php echo $row['info'];?></a>
                                    <a href=""><?php echo $row['author'];?></a>
                                    <a href="download.php?dir=./upload/&name=<?php echo $row['filesname'];?>">下载</a>
                                </li>
                           

                        </ul>                          
    <!--文件列表-->








</body>
<?php
    }
  ?>