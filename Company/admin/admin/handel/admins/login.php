<?php
session_start();
require_once('../conection.php');
if(isset($_POST['login'])){
     $email=htmlspecialchars(trim($_POST['email']));
     $password=htmlspecialchars(trim($_POST['password']));
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
       elseif(!preq_match("#[0-9]+#",$password)){
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

    if(empty($errors)){
      $sql="SELECT * FROM admins where email='$email' and 'status'==1";
      $query=mysqli_qurry($conn,$sql);
      if(mysqli_num_rows($query)> 0){
        echo "hello";
        $admin=mysqli_fetch_assoc($query);
        if($admin['status']!=1){
            $_SESSION['errors']=['plz contact with your adminstration'];
            header('location:../../login.php'); 
  
        }
        else{
        $adminPassword=$admin['password'];
        if(password_verify($password,$adminPassword)){
            $_SESSION['adminId']=$admin['id'];
            $_SESSION['adminRole']=$admin['role'];

            header('location:../../admin.php'); 
        }
        else{
            $_SESSION['errors']=['plz enter correct password'];
            header('location:../../login.php'); 
        }

      else{
        $_SESSION['errors']=['plz enter correct email'];
        header('location:../../login.php'); 
      } }
    //else{
       // $_SESSION['errors']=$error;
        //header('location:../../login.php'); 
   // }
}
else{
    header('location:../../login.php'); 
}

?>
