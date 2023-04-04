<?php
require('conection.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT *FROM admins where id=$id";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
        $admin=mysqli_fetch_assoc($result);
        $img=$admin['img'];
    unlink("../../uploads/$img");
    $query="DELETE FROM admins where id=$id";
    $result=mysqli_query($conn,$query);
    if($result){
        $_SESSION['success']='admin deleted successfully';
        header('location:../../admins.php');
    }
}
else{
   $_SESSION['errors']="no data found";
   header('location:../../admins.php');
}
else{
    header('location:../../admins.php');
}
?>