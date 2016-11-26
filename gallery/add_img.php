<html><head><title>DCSA Photo Gallery
</title>
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css1/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
                <script type="text/javascript">
function shvalue(str)
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
                        xmlhttp.open("Get","add_img_val.php?q="+str,true);
                        xmlhttp.send();
                    }
            }
                </script>
</head>
<body>
<div id="page-wrapper">
			<!-- Header -->
				<header id="header">
					<h1><a href="load_oper.php">Back</a> To show the albums</h1>
					<nav id="nav">
						<ul>
							
						</ul>
					</nav>
				</header>
</div>
                <section id="main" class="container 75%">
                    <div>
					<header>
						<center><b><h2>Insert photos</h2>
						<p><b>Note: (Supported image format: .jpeg, .jpg, .png, .gif)</b></p></b></center>
					</header>
                    </div>
         <div class="box">
    	       <form action="add_img.php" method="POST" enctype="multipart/form-data">
                   <label><b>Select the Album Name</b></label>

            <select id="secombo" name="secombo" onchange="shvalue(this.value)">
<?php
//insert coding here to start

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
                    <div id="txtHint"><b></b></div>
          <b>Select Photo (one or multiple):</b>
            <input type="file" id="files[]" name="files[]" onClick="changetextbox()" multiple accept="image/x-png, image/gif, image/jpeg" /><br /><br />
            <center>
            <input type="submit" value="Add Image" id="ins" name="ins" formaction="add_img.php"/>
            </center>
            <a href="load_oper.php">Back to View Albums</a>
            
            <script src="js/jquery.min.js"></script>
			<script src="js/jquery.dropotron.min.js"></script>
			<script src="js/jquery.scrollgress.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="js/main.js"></script>
               </body>
                </form>
         </div>
        
            
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
   
 $namez1 = $_POST['secombo'];
 $folder = mysql_real_escape_string($namez1);
 $dirPath = 'albums/'.$folder.'/';
 $dirpath1 = $dirPath.'/thumbs/';
 $j = 2; //Variable for indexing uploaded image
    $wmax = 900;
    $hmax = 600;
//database values
 $res=mysql_query("select * from folder where folder='$folder'");
$temp[]=array (100);
while($row=mysql_fetch_array($res))
{
    $mystr=$row['img'];
    //echo "mystr value:".$mystr;
	$myArray = explode(',', $mystr);
	for($j=0;$j<count($myArray);$j++)
	{
       // echo "<option value='".$myArray[$j]."'>".$myArray[$j]."</option>";
            $temp=max($myArray);
          
          //  $test= implode(',',$temp);
	}
        

}
        $temp=$temp+1;
        //echo "max value:".$temp;
    for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
        $x=$i+$temp;//loop to get individual element from the array
        $target_path = $dirPath; //Declaring Path for uploaded images
        $target = $dirpath1;
        $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
        $ext = explode('.', basename($_FILES['files']['name'][$i])); //explode file name from dot(.)
        $file_extension = end($ext); //store extensions in the variable

        $target_path = $target_path.$x.".".$ext[count($ext) - 1];
        
        $target = $target.$x.".".$ext[count($ext) - 1];
        //echo 'targetpath=='.$target_path.'target=='.$target."ext name".end($ext);
        //set the target path with a new name of image
        $j = $j + 1; //increment the number of uploaded images according to the files in array
       
       // echo 'x val=='.$x;
//        if (($_FILES["file"]["size"][$i] < 100000000000) //Approx. 100kb files can be uploaded.
//            && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_path)) { //if file moved to uploads folder
                imgResize($target_path, $target, $wmax, $hmax, end($ext));
                copy($target,$target_path);
                //echo $j.
                print '<script>alert("successfull added the images");</script>';
                ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else { //if file was not moved.
                //echo $j.
                print '<script>alert("please try again");</script>';
                ').<span id="error">please try again!.</span><br/><br/>';
            }
//        } else {
//            echo $j.
//            ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
//        }
$res=mysql_query("select * from folder where folder='$folder'");
$t[]=array (100);
while($row=mysql_fetch_array($res))
{
    $mystr=$row['img'];
}
            $a=$mystr.','.$x;
        //echo "test value:".$a;
    
mysql_query("UPDATE `folder` SET `img`='$a' WHERE folder='$folder'");
//echo "updated Successfully";
    }
    
$path=$folder;
$img="";
}

//----------------------- RESIZE FUNCTION -----------------------
// Function for resizing any jpg, gif, or png image files
function imgResize($target, $newcopy, $w, $h, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    $scale_ratio = $w_orig / $h_orig;
    if (($w / $h) > $scale_ratio) {
           $w = $h * $scale_ratio;
    } else {
           $h = $w / $scale_ratio;
    }
    $img = "";
    $ext = strtolower($ext);
    if ($ext == "gif"){
    $img = imagecreatefromgif($target);
    } else if($ext =="png"){
    $img = imagecreatefrompng($target);
    } else {
    $img = imagecreatefromjpeg($target);
    }
    $tci = imagecreatetruecolor($w, $h);
    // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    if ($ext == "gif"){
        imagegif($tci, $newcopy);
    } else if($ext =="png"){
        imagepng($tci, $newcopy);
    } else {
        imagejpeg($tci, $newcopy, 84);
    }
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
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>
                   

                </html>