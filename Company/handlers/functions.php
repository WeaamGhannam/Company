<?php
function validate($input){
retuen trim($input);
}
function required($input){
    if(empty($input)){
        return false;
    }
    else{
        return true;  
    }
}
function minRange($input,$length){
    if(strlen($input)> $length){
        return false;

    }
    else{
        return true; 
    }
}
function emailValidate($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return FALSE;
    }
    else{
        return true; 
 
    }
}
?>