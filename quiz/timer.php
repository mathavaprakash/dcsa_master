<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa")or die("cannot connect to database");
$query = mysql_query("select * from quiz where test_id=160211");
$exit=mysql_num_rows($query);
if($exit>0)
{
	while($row=mysql_fetch_assoc($query))
	{
		$duration=$row['duration'];
        }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <script language ="javascript" >
        var tim;
      
        var min =<?php echo $duration ?>;
        var sec = 60;
        var f = new Date();
        function f1() {
            f2();
            document.getElementById("starttime").innerHTML = "Your started your Exam at " + f.getHours() + ":" + f.getMinutes();


        }
        function f2() {
            if (parseInt(sec) > 0) {
                sec = parseInt(sec) - 1;
                document.getElementById("showtime").innerHTML = "Your Left Time  is :"+min+" Minutes ," + sec+" Seconds";
                tim = setTimeout("f2()", 1000);
            }
            else {
                if (parseInt(sec) == 0) {
                    min = parseInt(min) - 1;
                    if (parseInt(min) == 0) {
                        clearTimeout(tim);
                        //alert("time out");
                       location.href = "index.html";
                    }
                    else {
                        sec = 60;
                        document.getElementById("showtime").innerHTML = "Your Left Time  is :" + min + " Minutes ," + sec + " Seconds";
                        tim = setTimeout("f2()", 1000);
                    }
                }

            }
        }
    </script>
</head>
<body onload="f1()" >
    <form id="form1" runat="server">
        
    <div>
      <table width="100%" align="center">
        <tr>
          <td colspan="2">
            <h2>This is head part for showing timer and all other details</h2>
          </td>
        </tr>
        <tr>
          <td>
            <div id="starttime"></div>

            <div id="endtime"></div>

            <div id="showtime"></div>
          </td>
        </tr>
        <tr>
          <td>
          </td>
        </tr>
      </table>
    </div>
       
    </form>
</body>
</html>
