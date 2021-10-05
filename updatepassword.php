<?php
if(isset($_POST["btn_reset"])){
    include "conn.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
   $query = "UPDATE `registration`SET password='$password' WHERE email = '$email'";
   $data = mysqli_query($conn,$query);
   
   if($data){    
      header("Location://localhost/form/login.php");
    }
    else{       
        header("Location://localhost/form/updatepassword.php");
        return false;
    }
  }  

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Update Password</title>

</head>

<body>
    <section class="h-100 gradient-form" style="background-color:skyblue;">
        <div class="container py-5 h-100">
            <div class="row d_flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
    <div class="card-body p-md-5 mx-md-4">
    <div class="text-center">
        <img src="images/rexlogo.jpg" alt="logo" style="width:185px">
        <h4 class="mt-1 mb-5 pb-1">We are the Rex Web Team</h4>
    </div>
    <form method="POST" action="">
        <p>Change your Password</p>
        <div class="form-outline mb-4">
            <input type="email" class="form-control" name="email" id="email"
                placeholder=" Email address" />
            <label class="form-label" for="email">Email</label>
        </div>
        <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control"
                placeholder="Password" />
            <label class="form-label" for="password">Password</label>
        </div>
        <div class="form-outline mb-4">
            <input type="password" id="confirm_password" name="confirm_password" class="form-control"
                placeholder="Confirm Password" />
            <label class="form-label" for="password"> Confirm Password</label>
        </div>
        <div class="text-center pt-1 mb-5 pb-1">
            <button class="btn btn-outline-success" type="submit" id="btn_reset"
                name="btn_reset">Reset</button>
            <a  href="login.php">Login</a>
        </div>
        <div class="d-flex align-items-center justify-content-center pb-4">
            <p class="mb-0 me-2">Don't have an account?</p>
            <button type="button" id="btn_create" class="btn btn-outline-danger">Create new</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
        </div>
    </section>
</body>

</html>
<script>
    $(document).ready(function () {
        $("#btn_reset").click(function () {
            var email = $("#email").val();            
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();
            if (email == "") {
                alert("Enter Your Email");
                return false;
            } else if (password == "") {
                alert("Enter Your Password");
                return false;
            } 
            elseif(confirm_password !==password)
            {
                alert("Your password doesn't matched");
                return false;
            }
        });
        $("#btn_create").click(function(){
            window.location.href ='index.php';
        });   
    });
</script>