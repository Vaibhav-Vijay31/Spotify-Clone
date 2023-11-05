<?php
$login=false;
$showError = false;
if($_SERVER["REQUEST_METHOD"]== "POST"){

include 'partials/_dbconnect.php';
$username = $_POST["username"];
$password = $_POST["password"];



    $sql = "Select * from users1 where username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num==1){
        $login = true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        header("location: welcome.php");
    }



else {
    $showError = "Invalid Creditantials!";
}

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SecureShield Login Page</title>

    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- Google Fonts PT Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&family=PT+Sans:wght@400;700&family=Poppins:ital,wght@0,300;0,500;0,600;0,700;0,800;1,600&family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">


</head>
<body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($login)
    {
    echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You are now logged in!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }

    if($showError)
    {
    echo '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '.$showError.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    ?>
    

    <!-- Login Box -->
    <div class="container mt-5">
        <div class="login-box">
            <h2 class="text-center mb-4 login-title">Login</h2>
            <form action="/vaibhav/login.php" method = "post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name = "username" placeholder="Enter username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
