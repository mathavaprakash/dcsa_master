<!DOCTYPE HTML>
<html>
	<head>
		<title>Department of Computer Science & Applications</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="../images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<?php            
                    session_start();
					include_once "../assets/db/dbdcsa.php";
					
                
                    if($_SESSION['encregno']){
                    }
                    else
                    {
                        header("location:../index.php");
                    }
					if($_SESSION['new_test']=="yes"){
                    }
                    else
                    {
                        header("location:quiz_home.php");
                    }
                    $user_id=  encryptor('decrypt',$_SESSION['encregno']);
					$_SESSION['encregno']=  encryptor('encrypt',$user_id);
                    $test_id=$_SESSION['tid'];
					$quiz_id=$_SESSION['id'];
                   // $user_id=  $_SESSION['regno'];
                    $_SESSION['regno']=$user_id;
					$_SESSION['mode']="time_up";
                    //$encrp=$_SESSION['encr'];  
                   $_SESSION['enc_id']=encryptor('encrypt',$test_id);
					$enc_id=encryptor('encrypt',$test_id);
                    $query=  mysql_query("select * from mas_students");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_fname="";
					
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_userid=$row['Student_Key'];
                            if($user_id==$table_userid)
                            {
                                $temp=1;
                                $table_fname=$row['First_Name'];
                                break;
                            }
                        }
                        if($temp==0)
                        {
                             header("location:../index.html");
                        }
                    }
                    
                    
                    $query=  mysql_query("select * from quiz");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_qid="";
                    $title="";
                    $duration="";
					$tot_ques=0;
					$max_ques=0;
					$ques_count=0;
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_qid=$row['test_id'];
                            if($quiz_id==$table_qid)
                            {
                                $temp=1;
                                $title=$row['title'];
								$tot_ques=$row['total_questions'];
								//$_SESSION['tot_ques']=$tot_ques;
								$ques_count=$table_qid*100;
								$max_ques=$ques_count+$tot_ques;
                                $duration=$row['duration'];
								
                                break;
                            }
                        }
                        if($temp==0)
                        {
                             header("location:../index.html");
							 // header("location:fun_mark.php");
                        }
                    }
					
					$query=  mysql_query("select * from test");
                    $exist=  mysql_num_rows($query);
                   
                    $table_fname="";
					$t_end_time=0;
					$remain=0;
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            
							$table_test_id=$row['test_id'];
                            if($test_id==$table_test_id )
                            {
								$xyz=$row['test_id'];
								$st_time=$row['start_time'];
								$t_end_time=$row['end_time'];
								$remain=((int)($st_time)+($duration*60))-(int)time();
								$now=(int)time();
                                //$_SESSION['TIMER'] = time($st_time);
                                //$st_time=Date($row['start_time']);
								
                                break;
                            }
                        }
                        
                    } 
                ?>
	</head>
	<script language ="javascript" >
        var tim,min=0,sec=0,hr=0,temp=0;
		
        var dur1 =<?php echo $remain ?>;
		var nowtim =<?php echo $now ?>;
		if(dur1<0) location.href = "auto_submit.php";
		dur=dur1/60;
		//if (dur1>3600){
			hr=Math.floor(dur1/3600);
			temp=dur1-(3600*hr);
			min=Math.floor(temp/60);
			sec=dur1%60;
		//}	
		//else
		//{
		//	min=Math.floor(dur1/60);
		//	sec=dur1%60
		//}
			
        
        var f = new Date();
		
        function f1() {
			
            
            //document.getElementById("starttime").innerHTML = "You started  at " + f.getHours() + ":" + f.getMinutes();
			f2();

        }
        function f2() {
			
                if (parseInt(sec) == 0) {
                    
                    if (parseInt(min) == 0) {
						if (parseInt(hr) == 0) {
							
							clearTimeout(tim);
							//alert("time out");
						   //location.href = "fun_mark.php";
						   //document.getElementById('quiz').submit();
						    document.forms["quiz"].submit();
							//{
								caller();
							//}
						}
						else{
							hr= parseInt(hr) - 1;
							min= 59;
							sec=59;
						}
                    }
                    else {
						min = parseInt(min) - 1;
                        sec = 59;
                        
                    }
                }
				else{
					sec=parseInt(sec) - 1;
				}
						
						var curtime=<?PHP echo time()?>;
						  //if (min<10) min = '0'+min;
						  //if (hr<10) hr = '0'+hr;
						  //if (sec<10) sec = '0'+sec;
						//document.getElementById("showtime").innerHTML = " Time : "+<?PHP echo date("s",time())?>;
						//document.getElementById("starttime").innerHTML = "You started  at " + f.getHours() + ":" + f.getMinutes();
						//document.getElementById("starttime").innerHTML = "You started  at ";
						document.getElementById("endtime").innerHTML = " Time Left : "+hr+" :"+min+" :" + sec;
						
                        tim = setTimeout("f2()", 1000);
        }
		function caller()
		{
			setInterval(submit_now, 1000);
		}
		function submit_now()
		{
			location.href = "test_answer.php";
		}
    </script>
	<body onload="f2()">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" >
					<h1><?PHP echo "You Start at ".date("d - m - Y h : i : s",$st_time) ?></h1>
					
				
					<nav id="nav">
						<ul><li><div id="endtime"></div></li>
						<li><div id="starttime"></div></li></ul>
					</nav>
				</header>
			<!-- Banner -->
			

			<!-- Main -->
                    <section id="main" class="container">
                        <!--<section id="ctaa" class="align-left">-->
						
						<div class="row">
						<div class="12u">
						<section class="box  align-left">
						
                            <form name="quiz" method="post" action="#" id="quiz">
							<div>
   
    </div>
                                <?php
                                    
                                    $query=  mysql_query("select * from questions");
                                    $exist=  mysql_num_rows($query);
                                    $qcount=0;
                                    $qid="";
                                    $question="";
                                    $opt_a="";
                                    $opt_b="";
                                    $opt_c="";
                                    $opt_d="";
                                    if($exist>0)
                                    {
										//$max_ques=$ques_count+$tot_ques;
										for($i=$ques_count+1;$i<=$max_ques;$i++)
										{
											$query=  mysql_query("select * from questions where q_id='$i'");
											$row=  mysql_fetch_array($query);
										
                                        
                                            $qid=$row['q_id'];
											
                                                $qcount+=1;
                                                $question=$row['question'];
                                                $opt_a=$row['a'];
                                                $opt_b=$row['b'];
                                                $opt_c=$row['c'];
                                                $opt_d=$row['d'];

                                                ?>
                                                <br/><h4><?php echo "$qcount";?>) <?php echo "$question";?> </h4>
												
                                                    <div class="row uniform 50%">
														<div class="6u 12u(narrower)">
                                                                    <input type="radio"  id="<?php echo "$qcount"."1";?>"  name="<?php echo "$qid";?>" value="a" >
                                                                    <label for="<?php echo "$qcount"."1";?>">A) <?php echo "$opt_a";?> </label>
                                                            </div>
                                                            <div class="6u 12u(narrower)">
                                                                    <input type="radio"id="<?php echo "$qcount"."2";?>"  name="<?php echo "$qid";?>" value="b" >
                                                                    <label for="<?php echo "$qcount"."2";?>">B) <?php echo "$opt_b";?> </label>
                                                            </div>
                                                            <div class="6u 12u(narrower)">
                                                                    <input type="radio" id="<?php echo "$qcount"."3";?>"  name="<?php echo "$qid";?>" value="c">
                                                                    <label for="<?php echo "$qcount"."3";?>">C) <?php echo "$opt_c";?></label>
                                                            </div>
                                                            <div class="6u 12u(narrower)">
                                                                    <input type="radio" id="<?php echo "$qcount"."4";?>"  name="<?php echo "$qid";?>" value="d">
                                                                    <label for="<?php echo "$qcount"."4";?>">D) <?php echo "$opt_d";?> </label>
                                                            </div>
                                                        
                                                    </div>
                                                <?php    
                                           
                                        }
                                    }
                                ?> 
                                
                                
                                    <div class="row uniform">
                                        <div class="12u ">	
											</br></br>
											<ul class="actions align-center">
													<li><input type="submit" value="Submit"/></li>
													
												</ul>
                                            </div>                         
                                    </div>
                                    
                                                    
				</form>   
                        
                            
                       <!-- </section>-->
							</section>
                            </div>
							</div>
                       </section>    
                        
				
                        
    <?php
	
        if($_SERVER["REQUEST_METHOD"]=="POST" and $_SESSION['new_test']=="yes")
        {
            
            $qcount=0;
            $mark=0;
            $qid="";
            $cor_answer="";
				//$max_ques=$ques_count+$tot_ques;
				
				for($i=$ques_count+1;$i<=$max_ques;$i++)
				{
					$query=  mysql_query("select * from questions where q_id='$i'");
					$row=  mysql_fetch_array($query);
                
                    $qid=$row['q_id'];
					$cor_answer=$row['answer'];
                    
						$values = mysql_real_escape_string($_POST[$i]);
						$qcount+=1;
                        if($cor_answer==$values)
                        {
                            $mark+=1;
							
                             
                        }
                   
                }
            
			
            //$_SESSION['mark']=$mark;
			if($t_end_time>=time())
			{
				$fnsh_time = time();
			}
			else
			{
				$fnsh_time = $t_end_time;
			}
             mysql_query("update test SET marks=$mark,end_time='$fnsh_time' WHERE test_id =$xyz");
			$_SESSION['new_test']="no";
			$_SESSION['mode']="finish";
			//$aaa="test_answer.php?id=".$enc_id."";
			//print '<script>window.location.assign("'.$aaa.'");</script>';
            print '<script>window.location.assign("auto_submit.php");</script>';
		   //header("location:../test_answer.php?id=$enc_id");
			 //print '<script>window.location.assign("quiz_redirect.php");</script>';
        }
    ?>
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
                        
                        
	</body>
</html>