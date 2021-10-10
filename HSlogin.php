<!doctype html>
<html>
    <head>
        <title>OHHS Library - Log In</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/login.css"  type="text/css"/>
        <style>
            .error-message, i{
                color: #FF0000;  
            }
        </style>
</head>
<body>

<?php
  $usernameErr = $passErr = "";

  $myuser_name = "HSadmin";
  $mypass ="HSpages123";

  if(isset($_POST['login'])){
    if($_SERVER['REQUEST_METHOD'] == "POST"){

          //function to clean data before assigment
       function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }

       if(!empty($_POST['username'])){
           $username = test_input($_POST['username']);
         }else{      
           $usernameErr = "Username is a required field";
         }

         if(!empty($_POST['password'])){
           $password= test_input($_POST['password']);
         }else{      
           $passErr = "Password is required";
         }
         
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == $myuser_name && $password == $mypass){
        if(isset($_POST['remember'])){
            setcookie('username',$username, time()+(60*60*7));
            setcookie('password',$password, time()+(60*60*7));
        }
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('location: HSaddbook.php');
        exit();
    }if(!empty($_POST['username']) && $username != $myuser_name && !empty($_POST['password']) && $password != $mypass){
        echo "<h3>Username or password is invalid.</h3>";
    }
 
    }

?>

         
        <div class="container main">
            <!--left-->
            <div class="left-container">
                <div class="container-logo"><img src="img/logo.png" width="150" height="150" alt="..."/></div>
                <div class="container-text"><p class="text"><b>Explore</b> the world.OHHS Library</p></div>
            </div>
           
            <!--Form-->
            <div class="form-container">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h2 class="form-title">Sign in</h2>
                    <span class="error-message"><?php echo $usernameErr; ?></span>
                    <input type="text" name="username" placeholder="Username">
                   <span class="error-message"><?php echo $passErr; ?></span>
                    <input type="password" name="password" placeholder="Password">
                    <div class="check-box">
                            <input type="checkbox" name="remember" value="1"> 
                            <label>Remember me</label>
                    </div>
                    <input type="submit" name ="login" value ="Login">
                </form>
            </div>
        </div>
    </body>
</html>