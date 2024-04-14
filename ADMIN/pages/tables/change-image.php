
<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "resturent");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
	  $uid=$_GET['userid'];
  	$image = $_FILES['image']['name'];
  	// Get text
  	//$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "image/".basename($image);

  	$sql = "update food set Picture='$image' where id='$uid'";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
     {
		echo "<script>alert('Profile pic updated successfully');</script>";
		echo "<script type='text/javascript'> document.location ='fooddisplay.php'; </script>";
  	}else{
		echo "<script>alert('Something Went Wrong. Please try again');</script>";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content
   {
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form
   {
   	width: 50%;
   	margin: 20px auto;
   }
   form div
   {
   	margin-top: 5px;
   }
   #img_div
   {
   	width: 10%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after
   {
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 50%;
   	height: 50%;
   }
</style>
</head>
<body>
<div id="content">
  
  <form method="POST" action="" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>