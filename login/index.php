<html>
<head>
<title>LOG IN</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<br>
<br>
    <div class="cont">
        <div class="form sign-in">
        <form action="login.php" method="POST">
            <h2>Welcome</h2>
            <label>
                <span>Email</span>
                <input type="email" name="email" />
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="pass"/>
            </label>
            <p class="forgot-pass">Forgot password?</p>
            <input type="submit" value="Sign In" name="submit" class="submit">
        </form>
         
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                 
                    <h3>Don't have an account? Please Sign up!<h3>
                </div>
                <div class="img__text m--in">
                
                    <h3>If you already has an account, just sign in.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">

            <form action="res.php" method="POST">
                <h2>Create your Account</h2>
                <label>
                    <span>Name</span>
                    <input type="user" name="user"/>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email"/>
                </label>
                <label>
                    <span>Password</span>
                    <input type="pass" name="pass"/>
                </label>
                <label>
                    <span>Address</span>
                    <input type="address"  name="address"/>
                </label>
                <label>
                    <span>Phone Number</span>
                    <input type="phone" name="phone"/>
                </label>
                <input type="submit" value="Sign Up" name="submit" class="submit">

                </form>
                
            </div>
        </div>
    </div>

  


    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>