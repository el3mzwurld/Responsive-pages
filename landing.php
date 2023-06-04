<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myPage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--This is an attempt at a responsive webpage with HTML,CSS and JS-->

    
    <header>
        <h2 class="logo">myLogo</h2>
        <nav class="panel">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="services.php">Our Services</a>
            <a href="contact.php">Contact Us</a>
            <button class="btn-login">Login</button>
        </nav>
    </header>

    <div class="wrapper">
        <div class="form-box login">
            <span class="icon-close">
                <ion-icon name="close-circle-sharp"></ion-icon>
            </span>
            <h2>Login</h2>
            <form action="landing.php" method="post">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail-sharp"></ion-icon>
                    </span>
                    <input type="email" name="mail_login" required>
                    <label >Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed-sharp"></ion-icon>
                    </span>
                    <input type="password" name="password_login" required>
                    <label >Password</label>
                </div>
                <div class="remember-pw">
                  <label><input type="checkbox" name="remember-me_login">Remember me</label>
                  <a href="#">Forgot Password</a>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
                <div class="reg">
                    <p>Don't have an account? <a href="#" class="reg-link">Register here</a></p>
                </div>
            </form>
        </div>

        <div class="form-box reg">
            <span class="icon-close">
                <ion-icon name="close-circle-sharp"></ion-icon>
            </span>
            <h2>Registration</h2>
            <form action="landing.php" method="post">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail-sharp"></ion-icon>
                    </span>
                    <input type="text" name ="username_reg" required>
                    <label >Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail-sharp"></ion-icon>
                    </span>
                    <input type="email" name="mail_reg" required>
                    <label >Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed-sharp"></ion-icon>
                    </span>
                    <input type="password" name="password_reg" required>
                    <label >Password</label>
                </div>
                <div class="T-C">
                  <label><input type="checkbox" name="t-c_reg"> I agree to the Terms and Conditions</label>
                  
                </div>
                <button type="submit" name="register" class="btn">Register</button>
                <div class="reg">
                    <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
       
        

    </div>

    

<script src="function.js"></script>    
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>


<?php
/*Register Function*/
try{

        if(isset($_POST["register"])){
        $username = $_POST["username_reg"];
        $password = $_POST["password_reg"];
        $email = $_POST["mail_reg"];
        if(empty($username) || empty($password)){
            "<script>alert('PLEASE ENTER A USERNAME OR PASSWORD')</script>" ;
        }else{
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
            
            mysqli_query($conn,$sql);
        }
       
    }
}
catch(mysqli_sql_exception){
  $errormessage = "The E-mail stated has been used. Use a different mail address.";
  echo  "<script>alert('$errormessage')</script>" ;
}

    /*Login Function*/
        if(isset($_POST["login"])){
            $password = $_POST["password_login"];
            $email = $_POST["mail_login"];
            $sql_login = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn,$sql_login);
            if ($result->num_rows == 1) {
           header("Location: home.php");
            }else{
                $errormessage_login = "INVALID E-MAIL/PASSWORD. IF YOU DO NOT HAVE AN ACCOUNT, KINDLY REGISTER";
                echo  "<script>alert('$errormessage_login')</script>";
            }

         }
    



mysqli_close($conn);
?>