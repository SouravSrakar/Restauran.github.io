<html>
<head>
<title>LOG IN</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>

<div class="login-box">
  <h2>Login</h2>
  <form action="" method="POST">
    <div class="user-box">
      <input type="text" name="email" required="">
      <label>E-MAIL</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="">
      <label>Password</label>
    </div>
    <a >
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input type="submit" name="submit" value="submit">
    </a>
  </form>
  <?php
if(isset($_POST["submit"])){
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email=$_POST['email'];
        $pass=$_POST['password'];
       
        $con=mysqli_connect("localhost","root","","resturent",3306);
        $query=$con->query("SELECT * FROM admin where email='".$email."' and password='".$pass."'");
        $numrows=mysqli_num_rows($query);
        if($numrows!=0)
        {
            while($row=mysqli_fetch_assoc($query))
            {
                $dbemail=$row['email'];
                $dbpass=$row['password'];
            }
            if($email==$dbemail && $pass==$dbpass)
            {
                session_start();
               
                $_SESSION['ses_admin']=$dbname;
                header("Location:../pages/tables/fooddisplay.php");
            }
        }
        else{
            echo '<script>alert("Invalid Email  or password")</script>';
        }
    }
    else{
        echo '<script>alert("All fields are Required")</script>';
    }
}
?>
</body>
</html>
</div>
</body>
</html>