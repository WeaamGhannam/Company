<?php
session_start();
require('connection.php');
if(isset($_POST['submit'])){
    $name=htmlspecialchars(trim($_POST['name']));
    $email=htmlspecialchars(trim($_POST['email']));
    $password=htmlspecialchars(trim($_POST['password']));
    $status=htmlspecialchars(trim($_POST['status']));
    $errors=[];
    $role=$_POST['role'];
    if(empty($name)){
        $errors[]="name is required";
    }
    else if(is_numeric($name)){
        $errors[]="name must be string";
    }
    else(strlen($name > 100)){
        $errors[]="name size more than 100";
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
        $query="INSERT INTO admins('name','email','password','status','img',`role`)
        VALUES('$name','$email','$password','$satus','$newName','$role')";
        $result=mysqli_qurry($conn,$query);
        if($result){ 
             if($_FILES['img']['name']){
                move_uploaded_file($imgTmpNmae,",,.uploads/$newName");
             }
            $_SESSION['success']="admin added successfully";
            header('location:../admins.php');

        }
}
  
    //email

    if(empty($email)){
        $errors[]="email is required";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors="is not a valid email address";  
    }elseif(strlen($email)>100){
        $errors[]="email size more than 100";
    }
    //password
    if(empty($password)){
        $errors[]="password is required";
    }  
       elseif(!preq_match("#[0-9]+#",$password )){
        $errors[]="your password must contain at least 1 number!";  
        }
        elseif(!preq_match("#[A-Z]+#",$password )){
            $errors[]="your password must contain at least 1 capital letter!";  
        }
        elseif(!preq_match("#[a-z]+#",$password )){
            $errors[]="your password must contain at least 1 lowercase letter!";  
        }

    elseif(strlen($password > 30)){
        $errors="password size more then 100";  
    }
    //$password=md5($password);
    $password=password_hash($password,PASSWORD_DEFAULT);

    if(empty($errors)){

    }else{
        $_SESSION['errors']=$errors;
        header('location:../../add-admin.php');
    }

}
else{
header('location :../../admins.php');
}
?>