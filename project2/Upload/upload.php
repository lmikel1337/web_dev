<?php

  $target_dir = "uploads/";
  $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = mb_strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  // Check if image file is an actul image or a fake image
  if(isset($_Post["submit"])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check != false){
      echo "File is an image -".$check["mine"].".";
      $uploadOk = 1;
    }
    else{
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if(file_exists($target_file)){
    echo "This file already exists";
    $uploadOk = 0;
  }

  // Check file size
  if($_FILES["fileToUpload"]["size"] > 500000){
    echo "Your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png"
   && $imageFileType != "jpeg" && $imageFileType != "gif"){
     echo "Only JPG, JPEG, PNG and GIF files are allowed.";
     $uploadOk = 0;
   }

   // Check if fileUpload was set to 0 by an error
   if($uploadOk == 0){
     echo "Your file was not uploaded";
   }
   // If everything went ok
   else {
     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
       echo "The file ". basename( $_FILES["fileToUpload"]["name"])."has been uploaded";
     }
     else {
       echo "There was an error uploading your file.";
     }
   }
    
$imagesDirectory = "uploads/";
 
if(is_dir($imagesDirectory))
{
	$opendirectory = opendir($imagesDirectory);
  
    while (($image = readdir($opendirectory)) !== false)
	{
		if(($image == '.') || ($image == '..'))
		{
			continue;
		}
		
		$imgFileType = pathinfo($image,PATHINFO_EXTENSION);
		
		if(($imgFileType == 'jpg') || ($imgFileType == 'png'))
		{
			echo "<img src='uploads/".$image."' width='200'> ";
		}
    }
	
    closedir($opendirectory);
 
}
?>
