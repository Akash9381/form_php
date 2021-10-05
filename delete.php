<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
include "conn.php";
if($_GET['id']==""){
    header('location:login.php');
}
$id = $_GET['id'];
$query = "DELETE from registration where id='$id'";
$data = mysqli_query($conn,$query);
if($data){
    
    header("Location://localhost/form/show.php");
}
else{
    echo "data not  deleted succesfully";
}
?>