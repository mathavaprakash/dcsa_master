<!DOCTYPE HTML>
<html>
	<head>
		<title>Student Attendance</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css"/>
	    <script src="../lib/jquery/jquery-1.3.2.min.js" type="text/javascript"></script>
	    <script type="text/javascript" src="../javascripts/attendance.js"></script>  
        <script type="text/javascript">
<!--
/*function callshow(str)
{
	
	showcourse(str);
	showUser(str);
}*/
-->
<!--
function showUser(str) 
{
  
	if (str == "") 
	{
		document.getElementById("txtHint").innerHTML = "";
		return;
	} 
	else 
	{
		if (window.XMLHttpRequest) 
		{
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} 
		else 
		{
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				document.getElementById("txtHint").innerHTML =
				xmlhttp.responseText;
			}
		};

		xmlhttp.open("GET","getuser.php?q="+str,true);
		xmlhttp.send();
	}
}
-->
function showcourse(str) {
if (str == "") {
document.getElementById("txtHint1").innerHTML = "";
return;
} else {
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else {
// code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
{
document.getElementById("txtHint1").innerHTML =
xmlhttp.responseText;
}
};

xmlhttp.open("GET","getcourse.php?q="+str,true);
xmlhttp.send();
}
}
//-->
/*<!--
function Myfun1()
{
var ret = document.getElementsByTagName("title");
alert("Document Title : " + ret[0].text );
var year=document.getElementById("year");
alert("YEAR IS:"+year.value());
}
//-->*/
</script>

               
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Home</a></h1>
					
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>Student Attendance </h2>
						
					</header>
					
				</section>
				<section class="container 40%">
                <div class="big">
				    
				    <form action="attendancetake.php"  method="post">
				     
                    Date:<input type="date" class="small" name="date" required  id="date"/><br/>
                    <label for="group">Class:</label><select name="group" onchange="showUser(this.value)" class="dropotron">
                         <option value="MCA I-year">MCA I-year</option>
                         <option value="MCA II-year">MCA II-year</option>
                         <option value="MCA III-year">MCA III-year</option>
                         <option value="MSc-IT I-year">MSc-IT I-year</option>
                         <option value="MSc-IT II-year">MSc-IT II-year</option>
                         </select>
                    <br/>
                    <label id="txtHint" class="dropotron"><b>select your class</b></label>
                    <label id="txtHint1" class="dropotron"><b>select your class..</b></label>
                    Maximum
                    hours:<select name="hours" class="dropotron">
                          <option>1</option>
                          <option>2</option>
                          </select>
                    <input type="submit" value="submit"/>
				    </form>
                    
				</section>
				<!-- Footer -->
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


				</div>
</body>
</html>
