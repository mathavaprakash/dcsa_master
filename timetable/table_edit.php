<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="../images/logo.png" />
             
		<link rel="stylesheet" href="../assets/css/main.css" />
		            
       </head>
        <script type="text/javascript">
function showvalue(str,st)
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

                        xmlhttp.open("Get","getval.php?q="+str+"|"+st,true);

                        xmlhttp.send();
                    }
            }





</script>
         
	<body>
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="index.html"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							
										
											<li><a href="table_demo1.php">Insert Timetable</a></li>
											<li><a href="table_view.php">View Table</a></li>
                                          
										
									
							
						</ul>
					</nav>
				</header>
			</div>
			<!-- Banner -->


			<!-- Main -->
			<section id="main" class="container">
                    <div class="row">
						<div class="12u">					<!-- Form -->
                            <section id="cta">
							
                              
							<!-- Form -->

									<h2>Create TimeTable</h2>
                            <form method="POST" action="table_edit.php" >


                                                    	<div class="row uniform 50%">
                                                            <div class="12u 12u(mobilep)">
                                                            <select id="class" name="class" >
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
                                                            <select id="day" name="day" >
                                                                <option>select day</option>
                                                                <option>Monday</option>
                                                                <option>Tuesday</option>
                                                                <option>Wednesday</option>
                                                                <option>Thurday</option>
                                                                <option>Friday</option>

                                                            </select>
                                                            </div>
							 </div>
							<div class="row uniform 50%">
							   <div class="12u">
							      	<input type="submit" value="Edit" id="edit" name="edit"  />
                                                                <input type="submit" value="Delete" id="Delete" name="Delete"/>

							</div></div>
                                                             
                                </form>
        
                            
    <?php
                                                                       
        
            $tableclass="";
            $tablesem="";
            $tableday="";
        if(isset ($_POST['edit']))
        {
        $class = $_POST['class'];
        $Tclass = mysql_real_escape_string($class);
        $sem = $_POST['sem'];
        $Tsem = mysql_real_escape_string($sem);
        $day = $_POST['day'];
        $Tday=mysql_real_escape_string($day);
                                       
                                        
                                 //session_start();
            $query=  mysql_query("SELECT `Batch`,`sem`,`day`,`1`, `2`, `3`, `4`, `5`, `6` FROM `timetable` WHERE Batch='$Tclass' and sem='$Tsem' and day='$Tday'");
	    $exist=  mysql_num_rows($query);
            $temp="0";
            $table1="";
            $table2="";
            $table3="";
            $table4="";
            $table5="";
            $table6="";
            
            

            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {


                        $temp=1;
                        $tableclass=$row['Batch'];
                        $tablesem=$row['sem'];
                        $tableday=$row['day'];
                        $table[1]=$row['1'];
                        $table[2]=$row['2'];
                        $table[3]=$row['3'];
                        $table[4]=$row['4'];
                        $table[5]=$row['5'];
                        $table[6]=$row['6'];
						

                }
            echo '<form method="post" action="table_edit.php" >
	    <div class="row uniform 50%">
              <div class="12u 12u(mobilep)">
                <input type="text" id="boxcls"   name="boxcls"  value='.$tableclass.' readonly="readonly" >
              </div>
              <div class="6u 12u(mobilep)">
               <input type="text" id="boxsem"   name="boxsem" value='.$tablesem.' readonly="readonly" >
              </div>
              <div class="6u 12u(mobilep)">
               <input type="text" id="boxday"  name="boxday" value='.$tableday.' readonly="readonly" onfocus="">
	      </div>';
   
for($i=1;$i<7;$i++)
{
 $res=mysql_query("select * from study_group where Batch='$Tclass'");
    $temp="box".$i;
    ?>
       <div class="6u 12u(mobilep)" >
	<select name="<?php echo "$temp";?>">
	<option value="<?php echo "$table[$i]";?>"><?php echo "$table[$i]";?></option>
	<?php
	while($row=mysql_fetch_array($res))
	{
		$temp_subject=$row['short_sub'];
		?>
			<option value="<?php echo "$temp_subject";?>"><?php echo "$temp_subject";?></option>
		<?php
        }
	?>
	</select>
	</div>
	
	<?php
}
?>
 <div class="row uniform 50%">
   <div class="12u">
   <input type="submit" value="update" id="update" name="update"/>
</div></div>
<?php
            }
        }
?>
                                                              

	</section>
	</div>
        </div>
	</section>

                                    <!-- footer start here-->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; GRI-DCSA. All rights reserved.</li>
					</ul>
				</footer>
                </section>
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
if(isset($_POST['update']))
                        {
                         
 
        //$Tday = mysql_real_escape_string($day);
    $boxcls=mysql_real_escape_string($_POST['boxcls']);
    $boxsem=mysql_real_escape_string($_POST['boxsem']);
    $boxday=mysql_real_escape_string($_POST['boxday']);
	$box11 = mysql_real_escape_string($_POST['box1']);
        $box12=mysql_real_escape_string($_POST['box2']);
	$box13 = mysql_real_escape_string($_POST['box3']);
       	$box14=mysql_real_escape_string($_POST['box4']);
        $box15=mysql_real_escape_string($_POST['box5']);
        $box16=mysql_real_escape_string($_POST['box6']);
       

         mysql_query("UPDATE `timetable` SET `1`='$box11',`2`='$box12',`3`='$box13',`4`='$box14',`5`='$box15',`6`='$box16' WHERE Batch='$boxcls' and sem='$boxsem' and day='$boxday'" );
         print '<script>alert("Timetable updated successfully");</script>';
}
?>
                        <?php
                        if(isset($_POST['Delete']))
                        {
                             $class = $_POST['class'];
        $Tclass = mysql_real_escape_string($class);
        $sem = $_POST['sem'];
        $Tsem = mysql_real_escape_string($sem);
        $day = $_POST['day'];
        $Tday=mysql_real_escape_string($day);
                           mysql_query("DELETE FROM `timetable` WHERE Batch='$Tclass' and sem='$Tsem' and day='$Tday'" );
                            print '<script>alert("Timetable Deleted successfully");</script>';

                        }
                        ?>
	</body>
</html>