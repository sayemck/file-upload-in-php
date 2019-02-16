<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>File Upload</title>
</head>

<body style="background-color:#CCC">
<?php require_once 'includes/header.php'; ?>

<div style="background-color:#99F" align="center">

<form action="" method="post" enctype="multipart/form-data">
<hr/>
<marquee> <h4>Upload only Important Business Data</h4> </marquee>

<table>
	<tr>
    <td>&nbsp;</td>
    <td><b>Select File to upload:</b></td>
        
    </tr>
    <tr>
    	<td>&nbsp;</td>
        <td><input type="file" name="fileToUpload"></td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
        <td><input type="submit" value="Upload File" name="submit"></td>
    </tr>
    	<tr><td>Sent File: <?php echo $_FILES['fileToUpload']['name'] ;?></td></tr>
     	<tr><td>File Size: <?php echo $_FILES['fileToUpload']['size'] ;?></td></tr>
      	<tr><td>File Type: <?php echo $_FILES['fileToUpload']['type'] ;?></td></tr>  
</table>
<hr/>
<?php
   if(isset($_FILES['fileToUpload'])){
      $errors= array();
      $file_name = $_FILES['fileToUpload']['name'];
      $file_size = $_FILES['fileToUpload']['size'];
      $file_tmp = $_FILES['fileToUpload']['tmp_name'];
      $file_type = $_FILES['fileToUpload']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));
      
      $extensions= array("jpeg","jpg","png","pdf","xlsx","docx");
      
     if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 9097152) {
         $errors[]='File size must be excately 9 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"excel/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<hr/>
	
		</form>
</div>
</body>
</html>

			