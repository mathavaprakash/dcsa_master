<!DOCTYPE HTML>
<html>
	<head>
		<title>Data Entry Operator</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
               <?php
                        
                    session_start();
                    if($_SESSION['guruname']){
                    }
                    else
                    {
                        
                        header("location:index.html");
                    }
                 $guruname=$_SESSION['guruname']; 
                    
            mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("dcsa") or die("cannot connect database");
             $query="SELECT * FROM mas_students WHERE guruname=$guruname";
            $exist=  mysql_num_rows($query);
            $temp="0"; 
            $table_fname="";
             $table_lname="";
              $table_guruname="";
           
            $table_studentkey="";
            echo "<table border='1' style='border-collapse:collapse'>";
            echo"<th>Student key</th>";
echo"$guruname";
           
 if($exist>0)
{
   while($row=  mysql_fetch_assoc($query))
{
                  
  $table_studentkey=$row['Student_Key'];
 echo"<tr><td>$table_studentkey</td></tr>";
                     
         
                      
}
}
       
echo "</table>";             
                      
                                ?>