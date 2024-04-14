<?php
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['address']) && !empty($_POST['phone'])) {
	$name=$_POST['user'];
    $email=$_POST['email'];
	$pass=$_POST['pass'];
    $addr=$_POST['address'];
    $phone=$_POST['phone'];

    
	$con= mysqli_connect("localhost","root","","resturent","3306");

	$query=$con->query("SELECT * FROM registration WHERE Email='".$email."'");
	$numrows=mysqli_num_rows($query);
	if($numrows==0)
	{
	$sql="INSERT INTO registration(name,email,password,address,phone) VALUES('$name','$email','$pass','$addr','$phone')";

	$result=$con->query($sql);


	if($result){
        echo '<script>alert("account created success")</script>';
        header("Location: index.php");
	} else {
	
    echo '<script>alert("Failure!")</script>';
	}

	} else {
	
    echo '<script>alert("That Email already exists! Please try again with another.")</script>';
	}

} else {
    echo '<script>alert("All fields are required!")</script>';

}
}
?>