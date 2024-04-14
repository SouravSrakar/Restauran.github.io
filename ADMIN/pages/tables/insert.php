<?php 
//Databse Connection file
include('dbconnection.php');
if(isset($_POST['submit']))
  {
    $ID=$_POST['ID'];
    $ppic=$_FILES["image"]["name"];
    $fname=$_POST['fname'];
    $amount=$_POST['amount'];
    $deadline=$_POST['time'];
  
// get the image extension
$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["image"]["tmp_name"],"image/".$imgnewfile);
// Query for data insertion
$query=mysqli_query($con, "insert into food(ID,Picture,Foodname, Amount, Deadline) value('$ID','$imgnewfile','$fname','$amount','$deadline' )");
if ($query) {
echo "<script>alert('You have successfully inserted the data');</script>";
echo "<script type='text/javascript'> document.location ='fooddisplay.php'; </script>";
} else{
echo "<script>alert('Something Went Wrong. Please try again');</script>";
}}
}
?>