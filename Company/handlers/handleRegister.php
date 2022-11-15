<?php 
session_start();
require('functions.php');
require('db.php');
$errors=[];
if($_SERVER['REQUEST_METHOD']=='POST'){
   foreach($_POST AS $key=>$value){
       $key=validate($value);
       echo $key;
   }
    $name=validate( $_POST['name']);
    $email=validate( $_POST['email']);

    $password=validate( $_POST['password']);

    $phone=validate( $_POST['phone']);
    //name validate
  if(!required($name)){
    $errors[]="PLZ input your name ,name is required";
  
    }
  else(!minRange($name,4)){
    $errors[]="plz input valid name,name must be have greater then 4 char";
  }
  else(!minRange($name,20)){
    $errors[]="plz input valid name,name must be have greater then 4 char";
  }
  if(!required($email)){
    $errors[]="PLZ input your email ,email is required";
  
    }
    //email validate
  else(!minRange($email,4)){
    $errors[]="plz input valid email,email must be have greater then 4 char";
  }
  else(!minRange($email,60)){
    $errors[]="plz input valid email,email must be have greater then 4 char";
  }
  elseif(!emailValidate($email)){
      $errors[]='plz input valide email';
  } 
   if(!required($email)){
        $errors[]="PLZ input your email ,email is required";
      
        }

    //password validate
    if(!required($password)){
        $errors[]="PLZ input your password ,password is required";
      
        }
      elseif(!minRange($name,4)){
        $errors[]="plz input valid password,password must be have greater then 4 char";
      }
      elseif(!minRange($name,30)){
        $errors[]="plz input valid password,password must be have greater then 4 char";
      }
    

     //phone validate
    if(!required($phone)){
    $errors[]="PLZ input your phone ,phone is required";
  
    }
    elseif(!minRange($phone,11)){
    $errors[]="plz input valid phone,phone must be have greater then 4 char";
    }
    elseif(!minRange($phone,21)){
    $errors[]="plz input valid phone,phone must be have greater then 11 char";
    }
    if(!required($phone)){
    $errors[]="PLZ input your phone ,phone is required";
  
    }
  if(empty($errors)){
    register("users","name,email,phone,Password","'$name','$email','$phone','$Password'");

  }
  else{
      $_SESSION('errors')=$errors;
      header('location:../register.php');

    } 
}
 else{
    header('location:../register.php');
}
function register($table,$cols,$valueس){
    global $conn;
    $add="INSERT INTO Services($cols) VALUES ($values)"; 
    if(mysqli_query($conn,$add)){
        $_SESSION['login']=true;
        header("location:../index.php");

    }
    else {
        echo mysqli_query_error($conn);
    }
}
?>