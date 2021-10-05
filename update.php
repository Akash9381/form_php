<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
include "conn.php";
if($_GET['id']==""){
    header("location:login.php");
}
$id = $_GET['id'];
$query = "SELECT * FROM registration where id='$id'";
$data = mysqli_query($conn ,$query);
$result = mysqli_fetch_assoc($data);
$name = $result['name'];
$email = $result['email'];
$password = $result['password'];
$gender = $result['gender'];
$address = $result['address'];
$state = $result['state'];
$src = $result['image'];



if(isset($_POST["submit"])){    
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $gender = $_POST['gender'];   
    $address = $_POST['address'];
    $state = $_POST['state']; 
      
    $filename = $_FILES['photo']['name'];    
    
    $old_image = $_POST['old_image'];
    
    
    if($filename!==""){
        $filename = $_FILES['photo']['name'];
        // echo $filename;
        // die;
        $tmpname = $_FILES['photo']['tmp_name'];
        $folder = "images/".$filename;    
        move_uploaded_file($tmpname,$folder);
        $query = "UPDATE `registration` SET name='$name',email='$email',password='$password',gender='$gender', address='$address',state='$state',image='$src' WHERE id='$id'";
        $sql = mysqli_query($conn,$query);
            if($sql){            
                header("Location://localhost/form/show.php");
            }            
    }else{

        $old_image = $_POST['old_image'];
        // echo $old_image;
        // die;
        $query = "UPDATE `registration` SET name='$name',email='$email',password='$password',gender='$gender', address='$address',state='$state',image='$old_image' WHERE id='$id'";
        $sql = mysqli_query($conn,$query);
            if($sql){            
                header("Location://localhost/form/show.php");
            }
    }
  
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
    <title>Update Form</title>
</head>

<body>
    <section style="background-color:skyblue;">
        <div class="container h-100">
            <form action="" enctype="multipart/form-data" method="POST">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">
                    <h1 class="text-white text-center mb-4">Update Registration </h1>
                    <p><a href="logout.php">logout</a></p>
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
<div class="row align-items-center pt-4 pb-3">
    <div class="col-md-9">
        <h6 class="mb-2">Your Name <span class="name_error" style="color: red;">*</span></h6>
    </div>
    <div class="col-md-9 pe-5">

        <input id="name" value="<?php echo $name;?>" name="name" type="text" class="form-control form-control-lg" />

    </div>
</div>

    <div class="row align-items-center pt-4 pb-3">
        <div class="col-md-9">
            <h6 class="mb-2">Your Email <span class="email_error" style="color: red;">*</span></h6>
        </div>
        <div class="col-md-9 pe-5">

            <input type="email" id="email" value="<?php echo $email;?>" name="email" class="form-control form-control-lg" />

        </div>
    </div>

    <div class="row align-items-center pt-4 pb-3">
        <div class="col-md-9">
            <h6 class="mb-2"> Your Password <span class="password_error" style="color: red;">*</span></h6>
        </div>
        <div class="col-md-9 pe-5">

            <input type="password" value="<?php echo $password;?>" class="form-control form-control-lg" id="password" name="password" />

        </div>
    </div>

    <div class="row align-items-center pt-4 pb-3">
        <div class="col-md-9">
            <h6 class="mb-2">Confirm-password <span class="confirm_password_error" style="color: red;">*</span></h6>
        </div>
        <div class="col-md-9 pe-5">

            <input type="password" value="<?php echo $password;?>" id="confirmPassword" name="confirmPassword"class="form-control form-control-lg" />
        </div>
    </div>
    <div class="row align-items-center pt-4 pb-3">
        <div class="col-md-9">
            <div class="row">
                <div class="col-3">
                    <h6>Gender :</h6>
                </div>
        <div class="col-3">
            <input type="radio" name="gender" <?php if($gender=="Male"){echo "checked";}?> value="Male">
            <label for="male">Male</label>
        </div>
        <div class="col-3">
            <input type="radio" name="gender" <?php if($gender=="Female"){echo "checked";}?> value="Female">
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
            <textarea   name="address" id="address" class="form-control form-control-lg" cols="30" rows="3"><?php echo $address;?></textarea>                 
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
        
<option value="<?php echo $state;?>" > <?php echo $state;?></option selected>
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
                    <input  name="photo" id="image" class="form-control"type="file">
                </div>
                <div>
                <input type="text" name="old_image" value="<?php echo $result['image'];?>">
                </div>
                <div>
                <img id="profile_image" name="profile_image" width="100" height="100" src='/form/images/<?php echo $result['image'];?>'/>
</div>
            </div>
        </div>        
    </div>
    <div class="px-5 py-4">
        <button type="submit" id="submit" name="submit" class="btn btn-primary btn-lg">Update</button>
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
       
        var email = $("#email").val();
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();
        var gender = $('input[name="gender"]:checked').val();
        var address = $("#address").val();
        var state = $("#state").find(":selected").val();
        
        var image = $("#image").val(); 
        var profile_image = $("#profile_image").val();
        
        if(password !== confirmPassword){
            alert("Password doesn't matched");
           
            return false;
        }
        else if(name==""){
            alert("Insert your Name");
            
            return false;
        }
        else if(email==""){
            alert("Insert your Email");
           
            return false;
        }
        else if(password==""){
            alert("Insert your password");
            
            return false;
        }
        else if(state==""){
            alert("Select your state");
            return false;
        }        
        else{
            return true;
        }
    });
    });
</script>