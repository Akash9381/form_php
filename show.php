<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
include "conn.php";
$query = "SELECT * from registration";
$data = mysqli_query($conn,$query);
$rows = mysqli_num_rows($data);

if($rows>=1){
    ?>
    <div>
        <a href="logout.php">Logout</a>
    </div>
    <table border=2 style="padding: 5px;">
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Gender</th>
            <th>Address</th>
            <th>State</th>
        </tr>
    
    <?php
   
    while($result = mysqli_fetch_assoc($data)){?>
       <tr>
            <th><?php echo $result['id'];?></th>
            <th><img width="100" height="100" src='/form/images/<?php echo $result['image'];?>'/></th>
            <th><?php echo $result['name'];?></th>
            <th><?php echo $result['email'];?></th>
            <th><?php echo $result['password'];?></th>
            <th><?php echo $result['gender'];?></th>
            <th><?php echo $result['address'];?></th>
            <th><?php echo $result['state'];?></th>
            
            <th><a href='update.php?id=<?php echo $result['id'];?>'>Edit</a></th>
            <th><a href='delete.php?id=<?php echo $result['id'];?>' onclick='return delete_row()'>Delete</a></th>
                
            </tr>
            <?php }  
}else{
    echo "Table have no data";
}
?>
</table>
<script>
    function delete_row(){
        return confirm("Are you sure to delete this row data");
    }
</script>