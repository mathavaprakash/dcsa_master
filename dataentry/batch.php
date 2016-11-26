<html>
<head>
<title>admin page</title>
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script type="text/javascript" src="../assets/js/script.js" ></script>
<link rel="icon" type="image/png" href="../images/logo.png" />

		<!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />

		<!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->

                <script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validate.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validation.functions.js" type="text/javascript"></script>
                <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){
                jQuery("#batch_id").validate({
                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                    message: "Please enter a valid Batch"
                 });
				jQuery("#txtbox1").validate({
					expression:"if(VAL) return true; else return false;",
					message: "please enter Class"
				});
				jQuery("#txtbox2").validate({
					expression:"if(VAL) return true; else return false;",
					message: "please enter Batch"
				});
		});
</script>
<?php
            
                    session_start();
 include_once "../assets/db/dbdcsa.php";
                    if($_SESSION['userid']){
                    }
                    else
                    {
                        header("location:index.php");
                    }
                    $userid=$_SESSION['userid']; 
                    $userid=  encryptor('decrypt',$_SESSION['userid']); 
                    $_SESSION['userid']=encryptor('encrypt',$userid); 

                    
                ?>
                <script type="text/javascript">

                $(document).ready(function(){
    $("#txtbox1").hide();
     $("#txtbox2").hide();

    $("#pbut").hide();
    $("#btn2").click(function(){
        $("#txtbox1").show();
        $("#txtbox2").show();

        $("#pbut").show();
        
    });
     

   
});
</script>

                
</head>
<body >
<div id="page-wrapper">
			<!-- Header -->
              
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="logout.php"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							<li><a href="admin_home.php">Home</a></li>
							<li><a href="../gallery/load_oper.php">Gallery</a></li>
							<li><a href="change_password.php">Change Password</a></li>
							<li><a href="../dataentry/dataentry_profile.php">Data Entry Operator Profile</a></li>



							
								
							<li>
								<a href="#" class="icon fa-angle-down">Attendance</a>
								<ul>
									<li><a href="../attendance/attendancehome.php">Add Attendance</a></li>
									<li><a href="../attendance/attendanceview.php">View Attendance</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">DataEntry</a>
								<ul>
									<li><a href="student_registration.php">Student Registration</a></li>
									<li><a href="staff_registration.php">Staff Registration</a></li>
									<li><a href="course_registration.php">Course Registration</a></li>
									<li><a href="batch.php">Batch Registration</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon fa-angle-down">Calendar</a>
								<ul>
								    <li><a href="calender.php">View Calendar</a></li>
								    <li><a href="cal_event_add.php">Create Events</a></li>
									
									

								</ul>
							</li>
							
							
							








                            <li><a href="logout.php" class="button">Log out</a></li>
						</ul>
					</nav>
				</header>
			</div>

			<!-- Main -->
		<section id="main" class="container">
         <div class="row">
		 <div class="12u">					<!-- Form -->
         <section id="cta">
         <h2> STUDENT DETAILS </h2>
                                   <form name='batch.php' method='post' >
                                   
<div class="row uniform 50%">
<div class="12u 12u(mobilep)">
<select id="class" name="class"> 
<?php
include_once "../assets/db/dbdcsa.php";

/*mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database");*/
$query="select * from batch";
$res=mysql_query($query);
while ($row=mysql_fetch_array($res))
{
?>
<option value="<?php echo $row['class'];?>"><?php echo $row['class']; ?></option>

<!--<select name="class">
<option value="I Mca">I MCA</option>
<option value="II Mca">II Mca</option>
<option value="III MCa">III Mca</option>
<option value="I Msc(It)">I MSC(IT)</option>
<option value="II Msc(It)">II MSC(IT)</option>-->
<?php
}
?>
</select><br>
   <!--<input type="text" id="class" name="class" placeholder="class"><br>-->
   </div></div>
   <div class="row uniform 50%">
   <div class="12u 12u(mobilep)">
   <input type="text" id="batch_id" name="batch_id" placeholder="batch_id"><br>
   </div></div>
   
  <div class="row uniform 50%">
  <div class="12u 12u(mobilep)">
<center><input type="submit" name="btn1" value="Add"/><input type="button" id="btn2" name="btn2" value="Add the new course"/></center>

</div></div>
<div class="row uniform 50%">
   <div class="12u 12u(mobilep)">
   <input type="text"  name="class" id="txtbox1" placeholder="course">
   </div></div>
 <div class="row uniform 50%">
   <div class="12u 12u(mobilep)">
   <input type="text"  name="batch_id" id="txtbox2" placeholder="Batch">
   </div></div>
  
  <div class="row uniform 50%">
  <div class="12u 12u(mobilep)">
<input type="submit" name="btn3" id="pbut" value="Add the class"/>

</div></div>

</form>
</section>
</div>
</div>
</section>
<!-- Footer -->
				<footer id="footer"> 
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>						
					</ul>
					<ul class="copyright">
						<li>&copy; GRI-DCSA. All rights reserved.</li>
						<li>
							<script type="text/javascript" src="http://widget.supercounters.com/hit.js"></script>
							<script type="text/javascript">sc_hit(1214356,147,5);	</script>
							<br>
							<noscript><a href="http://www.supercounters.com">Page visits counter</a></noscript>
						</li>
					</ul>
				</footer>
		</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]>
		<script src="../users/assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>


<?php
if(isset($_POST['btn1']))
{
//$error='false';
//session_start();
$class=mysql_real_escape_string($_POST['class']);
$batch_id=mysql_real_escape_string($_POST['batch_id']);
include_once "../assets/db/dbdcsa.php";
//mysql_connect("localhost","root","")or die(mysql_error());
//mysql_select_db("dcsa")or die("cannot select db");
$query=mysql_query("select * from batch");
$exist=  mysql_num_rows($query);
$std_ky="";
if($exist>0)
{
                while($row=  mysql_fetch_assoc($query))
                {
					$std_ky=$row['batch_id'];
					if($batch_id==$std_ky)
					{
                           print '<script>alert("Batch already exist in the databse")</script>'; 
                           print '<script>window.location.assign("batch.php");</script>';
                           break;
                     }
                      
                  }

mysql_query("Update batch SET batch_id='$batch_id' WHERE class = '$class'");
//echo "new uesr added";
print '<script>alert("successfully")</script>';
print '<script>window.location.assign("batch.php");</script>';

}
}
?>
<?php
if(isset ($_POST['btn3']))
        {
        $error='false';
//session_start();
$class=mysql_real_escape_string($_POST['class']);
$batch_id=mysql_real_escape_string($_POST['batch_id']);

if($error='false')
{
mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("dcsa")or die("cannot select db");
$query=mysql_query("select * from batch");
mysql_query("INSERT INTO batch(class,batch_id)VALUES('$class','$batch_id')");
print '<script>alert("New Class Added Successfully")</script>';
print '<script>window.location.assign("batch.php");</script>';

}
}
?>

</body>
</html>
