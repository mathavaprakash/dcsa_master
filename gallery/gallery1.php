<html><head><title>DCSA Photo Gallery
</title>
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css1/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body>
<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Back</a> To Home Page</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Layouts</a>
								<ul>
									<li><a href="generic.html">Generic</a></li>
									<li><a href="contact.html">Contact</a></li>
									<li><a href="elements.html">Elements</a></li>
									<li>
										<a href="#">Submenu</a>
										<ul>
											<li><a href="#">Option One</a></li>
											<li><a href="#">Option Two</a></li>
											<li><a href="#">Option Three</a></li>
											<li><a href="#">Option Four</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="#" class="button">Sign Up</a></li>
						</ul>
					</nav>
				</header>
                <section id="main" class="container 75%">
					<header>
						<h2>DCSA Photo Gallery</h2>
						<p><b>Note: (Supported image format: .jpeg, .jpg, .png, .gif)</b></p>
					</header>
         <div class="box">
       <form action="gallery1.php" method="post" enctype="multipart/form-data">
           
			Select Photo (one or multiple):
            <input type="file" name="files[]" id="files[]" multiple onClick="changetextbox()" accept=".jpg,.png,.jpeg,.gif"/><br /><br />
            <input type="text"  id="folder" name="folder" placeholder="Album Name" disabled="disabled"><br />
            <input type="text"  id="des" name="des" placeholder="Album description"><br />
            <script type="text/javascript">
				function changetextbox()
					{
   						 if (document.getElementById("files[]").checked === 'true')
						  {
       					 document.getElementById("folder").disabled=true;
   					 	  } else {
      				     document.getElementById("folder").disabled=false;
   						         }
					}
			</script>
            <center>
            <input type="submit" value="Create Gallery" id="selectedButton"/>
             <a href="load_oper.php"><input type="button" value="View Albums" id="selectedButton"/></a></center>
       </form>
		</div>
				</section>

			

		</div>

		<!-- Scripts -->
			<script src="js1/jquery.min.js"></script>
			<script src="js1/jquery.dropotron.min.js"></script>
			<script src="js1/jquery.scrollgress.min.js"></script>
			<script src="js1/skel.min.js"></script>
			<script src="js1/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="js1/main.js"></script>
   
</form>
</body>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
$folder="";
$dirpath="";
$dirpath1="";
$des="";
$folder =mysql_real_escape_string( $_POST['folder']);
$des=mysql_real_escape_string($_POST['des']);
$dirPath = 'albums/'.$folder.'/';
$result = mkdir($dirPath);
$dirpath1 = $dirPath.'/thumbs/';
$result = mkdir($dirpath1);
    $j = 0; //Variable for indexing uploaded image
    $wmax = 900;
    $hmax = 600;

    for ($i = 0; $i < count($_FILES['files']['name']); $i++) { //loop to get individual element from the array
        $target_path = $dirPath; //Declaring Path for uploaded images
        $target = $dirpath1;
        $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
        $ext = explode('.', basename($_FILES['files']['name'][$i])); //explode file name from dot(.)
        $file_extension = end($ext); //store extensions in the variable

        $target_path = $target_path.$i.".".$ext[count($ext) - 1];
        $target = $target.$i.".".$ext[count($ext) - 1];
        //echo 'targerpath=='.$target_path.'target=='.$target."ext name".end($ext);
        //set the target path with a new name of image
        $j = $j + 1; //increment the number of uploaded images according to the files in array
        //echo 'i val=='.$i;
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
                print '<script>alert("please try again!");</script>';
                ').<span id="error">please try again!.</span><br/><br/>';
            }
//        } else { //if file size and file type was incorrect.
//            echo $j.
//            ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
//        }
    }
    mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database");
$path=$folder;
$img=0;
$attachement[]=array (100);
for ($i = 0; $i < count($_FILES['files']['name']); $i++) { //multiple images storing the database
        $attachement[$i]=$i;
}
$arr=implode(',',$attachement);

//$imgs = explode('*', $img);
mysql_query("INSERT INTO folder(folder,img,des) VALUES ('$path','".implode(',',$attachement)."','$des')");
//echo"Your File Successfully Uploaded";
}

// ----------------------- RESIZE FUNCTION -----------------------
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
</body>
</html>