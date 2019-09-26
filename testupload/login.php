<?php require_once('Connections/connect.php'); //数据库连接文件
  session_start();//开启session
            mysql_select_db("upload", $testupload);    //选择数据库
?>
<?php
      if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
} }






  /**
    *登录
    */
  $username=$_POST['username'];
  $password=$_POST['password'];

        $us=sprintf("SELECT username, password FROM `admin` WHERE username=%s AND password=%s",
    GetSQLValueString($username, "text"), GetSQLValueString($password, "text"));

        $use = mysql_query($us, $testupload) or die(mysql_error());

        $users = mysql_num_rows($use);

        $sql="select * from admin";
         $rs=mysql_query($sql);
    while($row=mysql_fetch_assoc($rs)){

       
      if($users){
     
                $_SESSION['IDD']=$row['ID'];
                $_SESSION['userss']=$row['username'];
                $_SESSION['login']=2;
    
                header("location:index.php");                
            }else
            {
                  header('location:index.html');  
            }
    
}




    /**
    *注销
    */
    function logout()
    {
      $username = $_SESSION['userss'];
      $_SESSION=array();
      if(isset($_COOKIE[session_name()]))
            {
                setCookie(session_name(), '', time()-3600, '/');
            }
           
            $_SESSION['IDD']=null;
                $_SESSION['userss']=null;
                $_SESSION['login']=null;
            //消除cookie
             header("location:index.html");
    }
    $l = $_GET['l']; 
    if($l == 1){
      logout();
    }


    

?>