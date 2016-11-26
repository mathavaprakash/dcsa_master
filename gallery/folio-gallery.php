<?php 
// error_reporting (E_ALL ^ E_NOTICE);
// photo gallery settings
$mainFolder    = 'albums';   // folder where your albums are located - relative to root
$albumsPerPage = '12';       // number of albums per page
$itemsPerPage  = '12';       // number of images per page    
$thumb_width   = '150';      // width of thumbnails
//$thumb_height  = '85';       // height of thumbnails
$extensions    = array(".jpg",".png",".gif",".JPG",".PNG",".GIF"); // allowed extensions in photo gallery

// create thumbnails from images
function make_thumb($folder,$src,$dest,$thumb_width) {
  

	$source_image = imagecreatefromjpeg($folder.'/'.$src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	$thumb_height = floor($height*($thumb_width/$width));
	
	$virtual_image = imagecreatetruecolor($thumb_width,$thumb_height);
	
	imagecopyresampled($virtual_image,$source_image,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
	
	imagejpeg($virtual_image,$dest,100);
	
}

// display pagination
function print_pagination($numPages,$urlVars,$currentPage) {
        
   if ($numPages > 1) {
      
	   echo 'Page '. $currentPage .' of '. $numPages;
	   echo '&nbsp;&nbsp;&nbsp;';
   
       if ($currentPage > 1) {
	       $prevPage = $currentPage - 1;
	       echo '<a href="?'. $urlVars .'p='. $prevPage.'">&laquo;&laquo;</a> ';
	   }	   
	   
	   for( $e=0; $e < $numPages; $e++ ) {
           $p = $e + 1;
       
	       if ($p == $currentPage) {	    
		       $class = 'current-paginate';
	       } else {
	           $class = 'paginate';
	       } 
	       

		       echo '<a class="'. $class .'" href="?'. $urlVars .'p='. $p .'">'. $p .'</a>';
		  	  
	   }
	   
	   if ($currentPage != $numPages) {
           $nextPage = $currentPage + 1;	
		   echo ' <a href="?'. $urlVars .'p='. $nextPage.'">&raquo;&raquo;</a>';
	   }	  	 
   
   }

}
?>
<!--text effected add this place -->

<!--<center><div id="text"></div></center>-->
<?php


if (!isset($_GET['album'])) {
   

    // display list of albums
    $folders = scandir($mainFolder, 0);
	$ignore  = array('.', '..', 'thumbs');
		  
	$albums = array();
	$captions = array();
	$random_pics = array();
	  
    foreach($folders as $album) {
         
	    if(!in_array($album, $ignore)) {    
			 
		   array_push( $albums, $album );
			 
		   $caption = substr($album,0,20);
		   array_push( $captions, $caption );
			 
		   $rand_dirs = glob($mainFolder.'/'.$album.'/thumbs/*.*', GLOB_NOSORT);
           $rand_pic  = $rand_dirs[array_rand($rand_dirs)];
		   array_push( $random_pics, $rand_pic );
		  
		 }
              
		  
	 }

  
     if( count($albums) == 0 ) {
  
        echo 'There are currently no albums.';     
  
     } else {
  
		$numPages = ceil( count($albums) / $albumsPerPage );

        if(isset($_GET['p'])) {
      
	        $currentPage = $_GET['p'];
                
            if($currentPage > $numPages) {
               $currentPage = $numPages;
            }

         } else {
            $currentPage=1;
         } 
 
         $start = ( $currentPage * $albumsPerPage ) - $albumsPerPage;
	  
	     echo '<div class="titlebar">
                 <div class="float-left"><span class="title">Photo Gallery</span> - Albums</div>
			     <div class="float-right">'.count($albums).' albums</div>
              </div>';
	  
         echo '<div class="clear"></div>';
	  	  			 
	     for( $i=$start; $i<$start + $albumsPerPage; $i++ ) {
	  
	        if( isset($albums[$i]) ) {
                    ?>
<script>
function showText(text){
    document.getElementById("text").innerHTML=text;
   
}
function hide(){
    document.getElementById("text").innerHTML="";
}
</script>
<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database");
$query="select * from folder where folder='$albums[$i]'";
$res=mysql_query($query);
$date1="";
while ($row=mysql_fetch_array($res))
{
    $date1=$row['des'];
    
}
//echo "date id:".$date1;
?>


                

			 
			    <div class="thumb-album shadow" onMouseOver="showText('<?php echo $date1; ?>')" onMouseOut="hide();" >
                               <!--<div onMouseOver="showText('<?php echo $date1; ?>')" onMouseOut="hide();"></div>-->
				        <?php
						echo '<div class="thumb-wrapper">
						   <a href="'.$_SERVER['PHP_SELF'].'?album='. urlencode($albums[$i]) .'">
			                 <img src="'. $random_pics[$i] .'" width="'.$thumb_width.'" alt="" title="'.$date1.'" id="text"/>
						   </a>	
					    </div>
						
						<div class="p5"></div>
					    
						<a href="'.$_SERVER['PHP_SELF'].'?album='. urlencode($albums[$i]) .'">
						<span class="caption">'. $captions[$i] .'</span>
						</a>
                                               
		            
					  </div>';
                                               
                                               
                            ?>
                                
                               <!-- <div id="text"></div>-->

<?php

                           
                            
				  
		     }		  	  

	      }
	  
	      echo '<div class="clear"></div>';
              
             
  
          echo '<div align="center" class="paginate-wrapper">';
        	 
                 $urlVars = "";
                 print_pagination($numPages,$urlVars,$currentPage);
  
          echo '</div>';	   
   
     }
   

} else {

     // display photos in album
     $src_folder = $mainFolder.'/'.$_GET['album'];
     $src_files  = scandir($src_folder);

     $files = array();
     foreach($src_files as $file) {
        
		$ext = strrchr($file, '.');
        if(in_array($ext, $extensions)) {
          
		   array_push( $files, $file );
		  
		   
		   if (!is_dir($src_folder.'/thumbs')) {
              mkdir($src_folder.'/thumbs');
              chmod($src_folder.'/thumbs', 0777);
              //chown($src_folder.'/thumbs', 'apache'); 
           }
		   
		   $thumb = $src_folder.'/thumbs/'.$file;
           if (!file_exists($thumb)) {
              make_thumb($src_folder,$file,$thumb,$thumb_width);
        
          
		   }
        
		 }
      
	  }
          mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database");
 $f=$_GET['album'];
 $query="select * from folder where folder='$f'";
$res=mysql_query($query);
$date2="";
while ($row=mysql_fetch_array($res))
{
    $date2=$row['des'];

}
 echo '<center><b><label>'.$date2.'</label></b></center>';

   if ( count($files) == 0 ) {

      echo 'There are no photos in this album!';
   
   } else {
   
      $numPages = ceil( count($files) / $itemsPerPage );

      if(isset($_GET['p'])) {
      
	     $currentPage = $_GET['p'];
         if($currentPage > $numPages) {
            $currentPage = $numPages;
         }

      } else {
         $currentPage=1;
      } 

   $start = ( $currentPage * $itemsPerPage ) - $itemsPerPage;
  
   echo '<div class="titlebar">
           <div class="float-left"><span class="title">'. $_GET['album'] .'</span> - <a href="'.$_SERVER['PHP_SELF'].'">View All Albums</a></div>
           <div class="float-right">'.count($files).' images</div>
         </div>';	  
   echo '<div class="clear"></div>';
   


   for( $i=$start; $i<$start + $itemsPerPage; $i++ ) {
		  
		  if( isset($files[$i]) && is_file( $src_folder .'/'. $files[$i] ) ) { 
	   
	        echo '<div class="thumb shadow">
	                <div class="thumb-wrapper">
					<a href="'. $src_folder .'/'. $files[$i] .'" class="albumpix" rel="albumpix">
				      <img src="'. $src_folder .'/thumbs/'. $files[$i] .'" width="'.$thumb_width.'" alt=""/>
				    </a>
					</div>  
			      </div>';
         
      
	      } else {
		  
		    if( isset($files[$i]) ) {
			  echo $files[$i];
		    }
		   
		  }
     
    }
	   

     echo '<div class="clear"></div>';
  
     echo '<div align="center" class="paginate-wrapper">';
        	 
        $urlVars = "album=".urlencode($_GET['album'])."&amp;";
        print_pagination($numPages,$urlVars,$currentPage);
  
     echo '</div>';
	 
	 
   } // end else	 

}
?>