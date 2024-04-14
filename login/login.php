

<?php
if(isset($_POST["submit"])){
    if(!empty($_POST['email']) && !empty($_POST['pass'])){
        $email=$_POST['email'];
        $pass=$_POST['pass'];
       
        $con=mysqli_connect("localhost","root","","resturent",3306);
        $query=$con->query("SELECT * FROM registration where email='".$email."' and password='".$pass."'");
        $numrows=mysqli_num_rows($query);
        if($numrows!=0)
        {
            while($row=mysqli_fetch_assoc($query))
            {
                $dbemail=$row['Email'];
                $dbpass=$row['PASSWORD'];
                $dbname=$row['NAME'];
                $dbid=$row['id'];
            }
            if($email==$dbemail && $pass==$dbpass)
            {
                session_start();
               
                $_SESSION['ses_user']=$dbname;
                $_SESSION['ses_id']=$dbid;
                header("Location:../index.php");
            }
        }
        else{
            echo '<script>alert("Invalid User name or password")</script>';
        }
    }
    else{
        echo '<script>alert("All fields are Required")</script>';
    }
}
?>
</body>
</html>