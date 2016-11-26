<?php
        
            mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");
            $qcount=0;
            $mark=0;
            $qid="";
            $cor_answer="";
				$max_ques=$ques_count+$tot_ques;
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
            $_SESSION['test_id']=$test_id;
            $_SESSION['mark']=$mark;
			date_default_timezone_set('Asia/Kolkata');
			
			$fnsh_time = time();
             mysql_query("update test SET marks=$mark,end_time='$fnsh_time' WHERE test_id =$xyz");
			print '<script>alert("test finished Successfully")</script>';
    
            print '<script>window.location.assign("test_answer.php");</script>';
        
    ?>