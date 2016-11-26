<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete Page</title>
</head>

<body>

<div class="box" style="margin-left:38%; margin-right:38%; margin-top:5%;">
    	       <form action="img_gallerydemo.php" method="post" enctype="multipart/form-data">
           <!-- <input type="file" name="files[]" multiple/><br /><br />-->
            <input type="text"  id="folder" name="folder" placeholder="Deleted Album Name"><br />
            <center>
            <input type="submit" value="Delete" id="selectedButton"/>
      		</center>
       </form>
		</div>
    </body>
    <?php
     if($_SERVER['REQUEST_METHOD']=='POST')
{
    echo "skdfhlugf";
    $path="";
    $path=mysql_real_escape_string( $_POST['fold']);
    echo "pathname:".$path;



    function deleteDir($dir) {
   // open the directory
   $dhandle = opendir($dir);

   if ($dhandle) {
      // loop through it
      while (false !== ($fname = readdir($dhandle))) {
         // if the element is a directory, and
         // does not start with a '.' or '..'
         // we call deleteDir function recursively
         // passing this element as a parameter
         if (is_dir( "{$dir}/{$fname}" )) {
            if (($fname != '.') && ($fname != '..')) {
               echo "<u>Deleting Files in the Directory</u>: {$dir}/{$fname} <br />";
               deleteDir("$dir/$fname");
            }
         // the element is a file, so we delete it
         } else {
            echo "Deleting File: {$dir}/{$fname} <br />";
            unlink("{$dir}/{$fname}");
         }
      }
      closedir($dhandle);
    }
   // now directory is empty, so we can use
   // the rmdir() function to delete it
   echo "<u>Deleting Directory</u>: {$dir} <br />";
   rmdir($dir);
}

// call deleteDir function and pass to it
// as a parameter a directory name
deleteDir('albums\gri_frnds');
}
        ?>
		</body>
</html>