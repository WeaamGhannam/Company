<?php 
session_start();
if(isset($_GET['lang'])){
  if($_GET['lang'=='ar']){
    $_SESSION['lang']='ar';

  }else($_GET['lang'=='en']){
    $_SESSION['lang']='en';
  }
}else{
    $_SESSION['lang']='en';
}
header("location :".$_SERVER['HTTP_REFERER']);
?>