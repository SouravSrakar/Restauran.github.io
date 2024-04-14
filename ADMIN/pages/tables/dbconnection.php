<?php
$con=mysqli_connect("localhost", "root", "", "resturent","3306");
if(mysqli_connect_errno())
{
    echo "connection Fail".mysqli_connect_error();
}
?>