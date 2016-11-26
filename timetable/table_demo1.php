<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
			                                                      
	</head>
	<body>
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="index.html"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							
										
											<li><a href="table_edit.php">Edit & Delete</a></li>
											<li><a href="table_view.php">View Table</a></li>
                                           
										
									
							
						</ul>
					</nav>
				</header>
			</div>
			<!-- Header -->
				

			<!-- Banner -->


			<!-- Main -->
                    <section id="main" class="container">

                    <div class="row">
						<div class="12u">
							<section id="cta">
							<!-- Form -->
 <script type="text/javascript">
function showvalue(str)
{
    if(str=="")
        {
            document.getElementById("txtHint").innerHTML="";
            return;
        }
        else
            {
                if(window.XMLHttpRequest)
                    {
                        xmlhttp=new XMLHttpRequest();
                    }
                    else
                        {
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange=function()
                        {
                            if(xmlhttp.readyState == 4 && xmlhttp.status==200)
                                {
                                    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;

                                }
                        };

                        xmlhttp.open("Get","getval2.php?q="+str,true);

                        xmlhttp.send();
                    }
            }



</script>

									<h2>Create TimeTable</h2>
                            <form method="post" action="table_demo1.php" >
                               
						
                                                    	<div class="row uniform 50%">
                                                            <div class="12u 12u(mobilep)">
                                                            <select id="class" name="class" id="class" onchange="showvalue(this.value)">
                                                               
                                                                <?php
                                                                include_once "../assets/db/dbdcsa.php";
                                                                $query=  mysql_query("SELECT * FROM `batch`");
                                                                $exist=  mysql_num_rows($query);
                                                                if($exist>0)
                                                                {
                                                                     echo "<option>select batch</option>";
                                                                    while($row=  mysql_fetch_assoc($query))
                                                                    {
                                                                       
                                                                        echo "<option value='".$row['batch_id']."'>".$row['batch_id']."</option>";
                                                                    }
                                                                }
                                                                ?>
                                                              
                                                            </select>
                                                                 
                                                             </div>
                                                            <div class="12u 12u(mobilep)">
                                                            <select id="sem" name="sem">
                                                                <option>select sem</option>
                                                                <option>I</option>
                                                                <option>II</option>
                                                                <option>III</option>
                                                                <option>IV</option>
                                                                <option>V</option>
                                                                <option>VI</option>
                                                            </select>
                                                            </div>
                                                             <div class="12u 12u(mobilep)">
                                                            <select id="day" name="day">
                                                                <option>select day</option>
                                                                <option>Monday</option>
                                                                <option>Tuesday</option>
                                                                <option>Wednesday</option>
                                                                <option>Thurday</option>
                                                                <option>Friday</option>
                                                                
                                                            </select>
                                                                
                                                            </div>
                                                            
                                                            <div class="row uniform 50%">
                                                            <div class="12u 12u(mobilep)" >

                                                                <div id="txtHint" ></div>

                                                            </div>
							</div>
                                                                                                            
														
                                                        </div>


                                                                                 <div class="row uniform 50%">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" value="Create"/></li>
													<li><input type="reset" class="button alt"value="Reset"/></li>
												</ul>
											</div>
										</div>
								</form>

							</section>
						</div>
					</div>
					</section>


				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>

						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; GRI-DCSA. All rights reserved.</li>
				</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>



<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
		$box11=mysql_real_escape_string($_POST['box1']);
		$box12=mysql_real_escape_string($_POST['box2']);
		$box13=mysql_real_escape_string($_POST['box3']);
		$box14=mysql_real_escape_string($_POST['box4']);
		$box15=mysql_real_escape_string($_POST['box5']);
		$box16=mysql_real_escape_string($_POST['box6']);
		
        $class = $_POST['class'];
        $Tclass = mysql_real_escape_string($class);
        $sem = $_POST['sem'];
        $Tsem = mysql_real_escape_string($sem);
        $day = $_POST['day'];
        $Tday = mysql_real_escape_string($day);
        
           // $temp='box'.$i;

        
        
       
 $query = mysql_query("select * from timetable");
$exist=  mysql_num_rows($query);
$temp=0;
if($exist>0)
{
	while($row=  mysql_fetch_assoc($query))
	{
	$tbatch=$row['Batch'];
        $tday=$row['day'];
        if(($Tclass==$tbatch) && ($Tday==$tday))
            {
            $temp=1;
            }
        }
 if($temp==1)
 {
print '<script>alert("Table already exists in the database")</script>';
print '<script>window.location.assign("table_demo1.php");</script>';
break;
 }
 else
 {
mysql_query("INSERT INTO `timetable`(`batch`, `sem`, `day`, `1`, `2`, `3`, `4`, `5`, `6`) VALUES ('$Tclass','$Tsem','$Tday','$box11','$box12','$box13','$box14','$box15','$box16')");
print '<script>alert("Timetable created successfully..!!");</script>';
 }
}
}
?>
	</body>
</html>