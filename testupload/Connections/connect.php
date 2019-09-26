<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_testupload  = "localhost";
$database_testupload   = "upload";
$username_testupload   = "root";
$password_testupload   = "";
$testupload  = mysql_pconnect($hostname_testupload , $username_testupload, $password_testupload ) or trigger_error(mysql_error(),E_USER_ERROR); 
?>