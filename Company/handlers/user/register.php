<?php
require_once('../../../admin/handel/conection.php');
if(isset($_POST['register'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="INSERT INTO users(`name`,`email`,`password`)
    VALUES('$name','$email','$password')";

$result=mysqli_qurry($conn,$sql);
if($result){ 
  $_SESSION['userId']=mysqli_insert_id($conn);
  header('location:../../index.php')

}


}
?>