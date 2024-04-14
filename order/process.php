<?php
session_start();
include("dbconnection.php");
if(isset($_POST["submit"])){

    if(!empty($_POST['lname']) && !empty($_POST['houseadd']) && !empty($_POST['city']) &&!empty($_POST["state"]) && !empty($_POST['zip']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['dbt'])) {
        $name=$_POST['lname'];
        $add=$_POST['houseadd'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $zip=$_POST['zip'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $mode=$_POST['dbt']; 
        //echo $name;
foreach ($_SESSION["cart_item"] as $item){
    $foodname=$item["Foodname"];
    $price=$item["Amount"];
    $qu=$item['quantity'];
    $sql="INSERT INTO order_booking(name,address,town,state,postcode,number,email,foodname,quantity,price,mode) values('$name','$add','$city','$state','$zip','$phone','$email','$foodname','$qu','$price','$mode')";
        $result=mysqli_query($con,$sql);
        header("Location: myorder.php");
        exit;
}

        
        //$result=$con->query($sql);
    }
}
?>