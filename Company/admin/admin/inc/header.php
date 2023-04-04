<?php 
session_start();
require('handel/conection.php');
if(!isset($_SESSION['adminId'])){
  header('location: login.php');
}
$id=$_SESSION['adminId'];
$sql="SELECT *FROM admins where id=$id";
$query=mysqli_query($conn,$sql);
$lang='en';
if($_SESSION['lang']){
  $lang=$_SESSION['lang'];
}
if($lang=='en'){
  require_once 'message_en.php';
}
else{
  require_once 'message_ar.php';
}
?>
<!DOCTYPE html>
<html lang="en<?= lang;?>" dir="<?= ($lang=='en')?'ltr':'rtl'?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company | Dashboard</title>
    <?php 
    if($lang=='en'):
    ?>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <?php else: ?>
      <link rel="stylesheet" href="assets/css/untitled-1.css">
      <?php
    //<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
?>
    <?php endif; ?>
    <link rel="stylesheet" href="assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Dashboard<?php $message['dash']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="admins.php">admins</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Categories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Orders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Admins</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <?= $admins['name']?> Your name
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Profile</a>
                      <a class="dropdown-item" href="handel/admins/logout">Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="inc/change-lang.php?lang-en">en</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="inc/change-lang.php?lang=ar">arabic</a>
                </li>
              
            </ul>
        </div>
    </nav>