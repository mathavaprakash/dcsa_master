<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>checklogin</title>
</head>
<?php
 session_start();
 $username=mysql_real_escape_string($_POST['uname']);
 $password=mysql_real_escape_string($_POST['pswd']);
 
 mysql_connect("localhost","root","")or die(mysql_error());
 mysql_select_db("mydb1")or die("cannot connect to database");
 $sql=mysql_query("select * from user where uname='$username'");
 $exists=mysql_num_rows($sql);
 $tuser="";
 $tpswd="";
 if($exists>0)
 {
	 while($row=mysql_fetch_assoc($sql))
	 {
		 $tuser=$row['uname'];
		 $tpswd=$row['pswd'];
	 }
	 if(($username==$tuser)&&($password==$tpswd))
	 {
		 if($password==$tpswd)
		 {
			 $_SESSION['user']=$username;
			 header("location: home.php");
		 }
	 }
	 else
	 {
		 print '<script>alert("incorrect password");</script>';
		 print '<script>window.location.assign("login.php");</script>';
	 }
 }
 else
 {
	 print '<script>alert("incorrect username");</script>';
     print '<script>window.location.assign("login.php");</script>'; 
 }
 ?>
<body>
</body>
</html>