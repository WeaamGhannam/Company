<?php 
session_start();
require('../conection.php');
$id=$_POST['id'];
$query="SELECT * FROM admins where id=$id";
$result=mysqli_qurry($conn,$query);
$admin=mysqli_fetch_assoc($result);
$oldImg=$admin['img'];

if(isset($_POST['submit'])){
    $name=htmlspecialchars(trim($_POST['name']));
    $email=htmlspecialchars(trim($_POST['email']));
    $password=htmlspecialchars(trim($_POST['password']));
    $status=htmlspecialchars(trim($_POST['status']));
    $errors=[];

    //name

if(empty($name)){
    $errors[]="name is required";
}
else if(is_numeric($name)){
    $errors[]="name must be string";
}
else(strlen($name > 100)){
    $errors[]="name size more than 100";
}

 
    //email

    if(empty($email)){
        $errors[]="email is required";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors="is not a valid email address";  
    }elseif(strlen($email)>100){
        $errors[]="email size more than 100";
    }
    else{
        header('location :../../admins.php');
        }

  //img
  if($_FILES==true && $_FILES['img']['name']){
    //with
    $image=$_FILES['img'];
    $imgName=$image['name'];
    $imgTmpNmae=$image['tmp_name'];
    $size=$image['size'];
    $sizeMb=$size/(1024*1024);
    $ext=pathinfo($imgName,PATHINFO_EXTENSION);
    $newName=uniqid().".".$ext;

    if($sizeMb>1){
      $errors[]="img size more than 1MB";
    }
    else if(!in_array(strtolower($ext),['png','jpg','jpeg','gif'])){
      $errors[]="img not correct";
    }
    }else{
      //no img
      $newName="default.png";
  }

if(empty($errors)){
    $sql="UPDATE admins SET name='$name ,email='$email',status='$status' img='$newName' where id-$id";
    $result=mysqli_query($conn,$sql);
    if($result){

        if($_FILES['img']['name']){
            move_uploaded_file($imgTmpName,"../../uploads/$newName");
            unlink("../../uploads/$oldName");
        }
        $_SESSION['success']='admin updated successfully';
        header('location:../../admins.php');
    }
}
else{
    $_SESSION['errors']=$errors;
    header("location:../../edit-admin.php?id=$id"); 
}
?>