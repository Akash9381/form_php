<?php 
if(isset($_POST["submit"])){    
    include "conn.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $gender = $_POST['gender'];
  
    $address = $_POST['address'];
    $state = $_POST['state']; 
    
    $filename = $_FILES['photo']['name'];
    
    $tmpname = $_FILES['photo']['tmp_name'];
    $email_search ="SELECT * from registration where email = '$email'";
    $query_email = mysqli_query($conn,$email_search);
    $return_result =mysqli_fetch_assoc( $query_email);
    if($return_result['email'] ==$email){
        header("location:login.php");
    }else{
    $folder = "images/".$filename;
    move_uploaded_file($tmpname,$folder);
    $query = "INSERT INTO `registration`( `name`, `email`, `password`, `gender`, `address`, `state`, `image`) VALUES('$name','$email','$password','$gender','$address','$state','$filename')";
    $sql = mysqli_query($conn,$query);
    if($sql){ 
        echo "<script>alert('Your Data  Inserted Successfully')</script>";
        header("Location://localhost/form/login.php");
    }}   
}

?>



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Registration Form</title>
</head>

<body>
    <section style="background-color: #2779e2;">
        <div class="container h-100">
            <form action="" enctype="multipart/form-data" method="POST">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">
                    <h1 class="text-white text-center mb-4">Registration Now</h1>
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
<div class="row align-items-center pt-4 pb-3">
    <div class="col-md-9">
        <h6 class="mb-2">Your Name <span class="name_error" style="color: red;">*</span></h6>
    </div>
    <div class="col-md-9 pe-5">

        <input id="name" name="name" type="text" class="form-control form-control-lg" />

    </div>
</div>

    <div class="row align-items-center pt-4 pb-3">
        <div class="col-md-9">
            <h6 class="mb-2">Your Email <span class="email_error" style="color: red;">*</span></h6>
        </div>
        <div class="col-md-9 pe-5">

            <input type="email" id="email" name="email" class="form-control form-control-lg" />

        </div>
    </div>

    <div class="row align-items-center pt-4 pb-3">
        <div class="col-md-9">
            <h6 class="mb-2"> Your Password <span class="password_error" style="color: red;">*</span></h6>
        </div>
        <div class="col-md-9 pe-5">

            <input type="password" class="form-control form-control-lg" id="password" name="password" />

        </div>
    </div>

    <div class="row align-items-center pt-4 pb-3">
        <div class="col-md-9">
            <h6 class="mb-2">Confirm-password <span class="confirm_password_error" style="color: red;">*</span></h6>
        </div>
        <div class="col-md-9 pe-5">

            <input type="password" id="confirmPassword" name="confirmPassword"class="form-control form-control-lg" />
        </div>
    </div>
    <div class="row align-items-center pt-4 pb-3">
        <div class="col-md-9">
            <div class="row">
                <div class="col-3">
                    <h6>Gender :</h6>
                </div>
        <div class="col-3">
            <input type="radio" checked name="gender"value="Male">
            <label for="male">Male</label>
        </div>
        <div class="col-3">
            <input type="radio" name="gender" value="Female">
            <label for="female">Female</label>
        </div>
        </div>
        </div>
    </div>
    <div class="row align-items-center pt-4 pb-3">
        <div class="col-md-9">
            <h6 class="mb-2">Enter Address</h6>
        </div>
        <div class="col-md-9 pe-5">
            <textarea name="address" id="address" class="form-control form-control-lg" cols="30" rows="3"></textarea>                 
        </div>
    </div>
    <div class="row align-items-center pt-4 pb-3">
        <div class="col-md-9">
<div class="row">
<div class="col-4">
    <h6 class="mb-2">Select State <span class="state_error" style="color: red;">*</span></h6>
</div>
<div class="col-7">
    <select name="state"  id="state" class="form-control">
        <option value="0" disabled selected>Select State</option>
        <option value="Delhi">Delhi</option>
        <option value="Haryana">Harayan</option>
        <option value="Punjab">Punjab</option>
        <option value="Himalya">Himalya</option>
        <option value="Gujrat">Gujrat</option>
    </select>
</div>
</div>

        </div>        
    </div>
    <div class="row align-items-center pt-4 pb-3">
        <div class="col-md-9">
            <div class="row">
                <div class="col-4">
                    <h6 class="mb-2">Upload Your Image</h6>
                </div>
                <div class="col-7">
                    <input name="photo" id="image" class="form-control"type="file">
                </div>
            </div>
        </div>        
    </div>
    <div class="px-5 py-4">
        <button type="submit" id="submit" name="submit" class="btn btn-primary btn-lg">Registration</button>
        <p>Have you any account</p>
        <a  href="login.php">Login</a>
      </div>
                        </div>

                    </div>

                </div>
            </div>  
        </form>
        </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>

</body>
</html>
<script>   
    $(document).ready(function(){  
        $("#submit").click(function(){ 
        var name = $("#name").val();
        // alert(name);
        var email = $("#email").val();
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();
        var gender = $('input[name="gender"]:checked').val();
        var address = $("#address").val();
        var state = $("#state").find(":selected").val();
        var image = $("#image").attr('src');
        var image = $("#image").val(); 
        
        if(password !== confirmPassword){
            alert("Password doesn't matched");
            // $(".confirm_password_error").text("Password doesn't matched"); 
            return false;
        }
        else if(name==""){
            alert("Insert your Name");
            // $(".name_error").text("Please enter your Name"); 
            return false;
        }
        else if(email==""){
            alert("Insert your Email");
            // $(".email_error").text("Please enter your Email"); 
            return false;
        }
        else if(password==""){
            alert("Insert your password");
            // $(".password_error").text("Please enter your password"); 
            return false;
        }
        else if(state==""){
            alert("Select your state");
            return false;
        }
        else if(image==""){
            alert("Insert your Image");
            return false;
        }
        else{
            return true;
        }
    });
    });
</script>