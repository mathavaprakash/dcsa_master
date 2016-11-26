<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>DCSA Albums</title>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css1/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<meta name="description" content="Learn how to recreate the preloader from Cantina Negrar. Tutorial for a passionate front-end web developers by Petr Tichy.">

	<!--iOS -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	<style type="text/css">
	.back-link a {
		color: #4ca340;
		text-decoration: none; 
		border-bottom: 1px #4ca340 solid;
	}
	.back-link a:hover,
	.back-link a:focus {
		color: #408536; 
		text-decoration: none;
		border-bottom: 1px #408536 solid;
	}
	h1 {
		height: 100%;
		/* The html and body elements cannot have any padding or margin. */
		margin: 0;
		font-size: 14px;
		font-family: 'Open Sans', sans-serif;
		font-size: 32px;
		margin-bottom: 3px;
	}
	.entry-header {
		text-align: left;
		margin: 0 auto 50px auto;
		width: 80%;
        max-width: 978px;
		position: relative;
		z-index: 10001;
	}
	#demo-content {
		padding-top: 100px;
	}
	</style>
</head>
<body class="demo">
<div id="page-wrapper">
			<!-- Header -->
				<header id="header">
					
					<nav id="nav">
						<ul>
                                                         
							
							
							<li><a href="../admin/admin_home.php" class="button">Back</a></li>
						</ul>
					</nav>
				</header>
</div>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

	<!-- Demo content -->			
	<div id="demo-content">

		<header class="entry-header">

			<nav class="back-link">
				<span class="nav-previous"><a href="gallery1.php" rel="prev"><span class="meta-nav">&larr;</span> Back to creating albums</a></span
			></nav><!-- .nav-single -->
			<h1 class="entry-title">
            </h1>
		</header>
		<div id="loader-wrapper">
			<div id="loader"></div>

			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
		</div>
    <?php
   /* if (isset($_GET['album'])) {
	  echo $_GET['album'];
	} else {
	  echo '';
	}*/
  ?>
<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.dropotron.min.js"></script>
			<script src="js/jquery.scrollgress.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="js/main.js"></script>
<!-- start gallery header -->
<link rel="stylesheet" type="text/css" href="folio-gallery.css" />
<script type="text/javascript" src="js1/jquery-1.9.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="colorbox/colorbox.css" />
<!--<link rel="stylesheet" type="text/css" href="fancybox/fancybox.css" />-->
<script type="text/javascript" src="colorbox/jquery.colorbox-min.js"></script>
<!--<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.1.min.js"></script>-->
<script type="text/javascript">
$(document).ready(function() {

	// colorbox settings
	$(".albumpix").colorbox({rel:'albumpix'});

	// fancy box settings
	/*
	$("a.albumpix").fancybox({
		'autoScale	'		: true,
		'hideOnOverlayClick': true,
		'hideOnContentClick': true
	});
	*/
});
</script>
<script type="text/javascript">
$(document).ready(function() {

	// colorbox settings
	$(".albumpix").colorbox({rel:'albumpix'});

	// fancy box settings
	/*
	$("a.albumpix").fancybox({
		'autoScale	'		: true,
		'hideOnOverlayClick': true,
		'hideOnContentClick': true
	});
	*/
       $('#deleteCombo').hide();
	$('#delete').click(function() {
            $('#deleteCombo').show();
	});
        $('#del').hide();
          $('#deleteCombo').click(function(){
            $('#del').show();
          });
        $('#delete1').hide();
        $('#deleteCombo').click(function(){
            $('#delete1').show();
        });
        $('#delete').hide();
        $('#insert').hide();
        $('#oper').click(function(){
            $('#delete').show();
            $('#insert').show();
            $('#oper').hide();
        });
});
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

                        xmlhttp.open("Get","getimg_val.php?q="+str,true);

                        xmlhttp.send();
                    }
            }
function delvalue(str,st)
{
    if(str=="")
        {
            document.getElementById("txtH").innerHTML="";
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
                                    document.getElementById("txtH").innerHTML=xmlhttp.responseText;

                                }
                        };

                        xmlhttp.open("Get","del_img.php?x="+str+"|"+st,true);
                        xmlhttp.send();
                    }
            }

</script>
<!-- end gallery header -->
<body>

<div align="center" style="font-size:13px;font-weight:bold;">
    <b><h1 style="font-size:30px; margin-top:3%;">DCSA PHOTO ALBUMS</h1></b>
</div>
<p>&nbsp;</p>
<div class="gallery">
<input type="button" id="oper" value="operations"/>
<input type="button" value="Delete" name="delete" id="delete" onclick=""/>
<a href="add_img.php"><input type="button" value="Insert_Photos" id="insert"/></a>
<br /><br />
 <form action="load_oper.php" method="POST" enctype="multipart/form-data">
<select id="deleteCombo" name="deleteCombo" onchange="showvalue(deleteCombo.value)">
<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database");
$query="select * from folder";
$res=mysql_query($query);
while ($row=mysql_fetch_array($res))
{
    echo "<option value='".$row['folder']."'>".$row['folder']."</option>";
}
?>
</select>
     <input type="submit" value="Delete Album" id="del" name="del" onclick="deleteDir($dir)"/>
     <div id="txtHint"><b></b></div>
     <div id="txtH"><b></b></div>
     <?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
$namez = $_POST['deleteCombo'];
$name = mysql_real_escape_string($namez);
mysql_query("DELETE FROM `dcsa`.`folder` WHERE  folder='$name'");
//echo "Deleted Successfully";
print '<script>alert("Deleted successfully");</script>';
function deleteDir($dir) {
   $dhandle = opendir($dir);
   if ($dhandle) {
      while (false !== ($fname = readdir($dhandle))) {
         if (is_dir( "{$dir}/{$fname}" )) {
            if (($fname != '.') && ($fname != '..')) {
               //echo "<u>Deleting Files in the Directory</u>: {$dir}/{$fname} <br />";
               deleteDir("$dir/$fname");
            }
         } else {
            //echo "Deleting File: {$dir}/{$fname} <br />";
            unlink("{$dir}/{$fname}");
         }
      }
      closedir($dhandle);
    }
   //echo "<u>Deleting Directory</u>: {$dir} <br />";
   rmdir($dir);
}
deleteDir('albums/'.$name);

}
?>

</form>
<br/><br/>
<div class="gallery">
  <?php include "folio-gallery.php"; ?>
</div>
</div>
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
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer> 
	<!-- /Demo content -->

	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="js/main.js"></script>-->

</body>
</html>
