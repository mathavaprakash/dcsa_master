<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<?php
              /*   session_start();
                function encryptor($action,$string)
                {

                    $output=false;
                    $encrypt_method="AES-256-CBC";
                    $secret_key='madhava';
                    $secret_iv='maddy94';
                    $key=hash('sha512',$secret_key);
                    $iv=substr(hash('sha512',$secret_iv),0,16);
                    if($action=='encrypt')
                    {
                            $output=openssl_encrypt($string,$encrypt_method,$key,0,$iv);
                            $output=base64_encode($output);

                    }
                    else if($action=='decrypt')
                    {
                            $output=openssl_decrypt(base64_decode($string),$encrypt_method,$key,0,$iv);
                    }

                    return $output;
              }
                    if($_SESSION['user_id']){
                    }
                    else
                    {
                        header("location:index.html");
                    }
                    $user_id=  encryptor('decrypt',$_SESSION['user_id']);
                    $test_id=encryptor('decrypt',$_SESSION['id']);
                   // $user_id=  $_SESSION['regno'];
                    $_SESSION['regno']=$user_id;
                    //$encrp=$_SESSION['encr'];
                    mysql_connect("localhost", "root", "") or die(mysql_error());
                    mysql_select_db("dcsa") or die("cannot connect database");
                    $query=  mysql_query("select * from mas_staff");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_fname="";
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_userid=$row['Staff_Key'];
                            if($user_id==$table_userid)
                            {
                                $temp=1;
                                $table_fname=$row['First_Name'];
                                break;
                            }
                        }
                        if($temp==0)
                        {
                             header("location:index.html");
                        }
                    }

                    $query=  mysql_query("select * from quiz");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_qid="";
                    $title="";
                    $duration="";
					$tot_ques="";
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_qid=$row['test_id'];
                            if($test_id==$table_qid)
                            {
                                $temp=1;
                                $title=$row['title'];
                                $duration=$row['duration'];
								$tot_ques=$row['total_questions'];
								$ques_count=($test_id*100)+1;
                                break;
                            }
                        }
                        if($temp==0)
                        {
                             header("location:index.html");
                        }
                    }*/


                ?>
	</head>

	<body>
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a href="index.html"><img src="../images/dcsa-logo.png" height="50" /></a>
					<nav id="nav">
						<ul>
							
										
											<li><a href="table_demo1.php">Insert Timetable</a></li>
											<li><a href="table_edit.php">Edit & Delete</a></li>
                                           
						</ul>
					</nav>
				</header>
			</div>
			<!-- Banner -->


			<!-- Main -->
                    <section id="main" class="container">

                    <div class="row">
						<div class="12u">
							<section id="cta">
							<!-- Form -->

									<h2>View TimeTable</h2>
                            <form method="POST" action="table_view1.php" >


                                                    	<div class="row uniform 50%">
                                                            <div class="12u 12u(mobilep)">
                                                            <select id="class" name="class">
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
                                                             
                                                            <ul class="actions">
                                                                <li><input type="submit" value="View" id="view" name="view"/></li>
                                                                

                                                            </ul>
                                                             </div>
                                

                            </form>
       
                                                            
							</section>
							</div>
							</div>
							</section>
		<section id="main" class="container 100%">
			<div class="row">
                <div class="12u">
					<section class="box">
						<div class="table-wrapper">
							<table class="alt">
						
							
		<?php

       /* include_once "../assets/db/dbdcsa.php";
        if($_SERVER['REQUEST_METHOD']=="POST")
        {

        $class = $_POST['class'];
        $Tclass = mysql_real_escape_string($class);
        $sem = $_POST['sem'];
        $Tsem = mysql_real_escape_string($sem);
        

                                 //session_start();
            

            $query=  mysql_query("SELECT * FROM `timetable` WHERE class='$Tclass' and sem='$Tsem'");
	    $exist=  mysql_num_rows($query);
            $temp="0";
            $tableClass="";
            $tableSem="";
            $tableDay="";
            $table1="";
            $table2="";
            $table3="";
            $table4="";
            $table5="";
            $table6="";


            if($exist>0)
            {
                echo '<div class="row"><div class="8u">
                    <div class="table-wrapper">
                        <table  >
						
                            <tr>
                                
                                <td width="80px">Days</td>
                                <td width="80px">Hour-1</td>
                                <td width="80px">Hour-2</td>
                                <td width="80px">Hour-3</td>
                                <td width="80px">Hour-4</td>
                                <td width="80px">Hour-5</td>
                                <td width="80px">Hour-6</td>

                            </tr>';
                while($row=  mysql_fetch_assoc($query))
                {


                        $temp=1;
                        $tableClass=$row['class'];
                        $tableSem=$row['sem'];
                        $tableDay=$row['day'];
                        $table1=$row['1'];
                        $table2=$row['2'];
                        $table3=$row['3'];
                        $table4=$row['4'];
                        $table5=$row['5'];
                        $table6=$row['6'];


                

                if(isset ($_POST['view']))
                {
                     
                    echo '
                            
                            <tr>
                            
                                <td width="50px">'.$tableDay.'</td>
                                <td width="50px">'.$table1.'</td>
                                <td width="50px">'.$table2.'</td>
                                <td width="50px">'.$table3.'</td>
                                <td width="50px">'.$table4.'</td>
                                <td width="50px">'.$table5.'</td>
                                <td width="50px">'.$table6.'</td>
                            </tr>
                            ';
                }

                }
				echo '
				
				 </table>
						</div>
					</section>
                            </div></div></section>';
                
            }
        }*/
                   ?>
						</div>
					</div>
					</section>


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
/*if(isset($_POST['update']))
                        {


        //$Tday = mysql_real_escape_string($day);
	$box11 = mysql_real_escape_string($_POST['box1']);
        $box12=mysql_real_escape_string($_POST['box2']);
	$box13 = mysql_real_escape_string($_POST['box3']);
       	$box14=mysql_real_escape_string($_POST['box4']);
        $box15=mysql_real_escape_string($_POST['box5']);
        $box16=mysql_real_escape_string($_POST['box6']);
        echo "values:".$box11;

}
?>
                        <?php
                        if(isset($_POST['Delete']))
                        {
                           mysql_query("DELETE FROM `timetable` WHERE class='$Tclass' and sem='$Tsem' and day='$Tday'" );
                            print '<script>alert("Timetable Deleted successfully");</script>';

                        }*/
                        ?>
	</body>
</html>