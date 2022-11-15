<?php
require_once('connect.php');

function getAll($table){
   global $conn;
    $getAll="SELECT *FROM $table";
    $getAll=mysqli_query($conn,$getAll);
    $getAllData=mysqli_fetch_all($getAll,MYSQLI_ASSOC);
    return $getAllData;
}
function getWhere($table,$where){
    global $conn;
    $getAll="SELECT * FROM $table where $where";
    $getAll=mysqli_query($conn,$getAll);
    $getAllData=mysqli_fetch_all($getAll);
    return $getAllData;


}
function getJoin($table1,$table2,$col){
    global $conn;
    $getJoin="SELECT $col
    FROM $table1 
    INNER JOIN
    $table2
    on $table1.id=$table2.portfolios_id";
    $getJoin=mysqli_query($conn,$getJoin);
    $getJoinData=mysqli_fetch_all($getJoin);
    return $getJoinData;
    // $table_=rtrim($table1,'s');
  //  $table_ .="id";
}
function getOnce($table,$where){
    global $conn;
    $getAll="SELECT * FROM $table where $where";
    $getAll=mysqli_query($conn,$getAll);
    $getAllData=mysqli_fetch_assoc($getAll);
    return $getAllData;
}



?>
<!-- 

function getJoin($table1,$table2,$col){
    global $conn;
    $getJoin="SELECT portfolios.id as PortId,
    portfolios.name as PortName,
    portfolios.status as PortStatus ,
    projects.id as ProjId,img,
    projects.name as ProjName,projects.status as ProjStatus FROM portfolios INNER JOIN projects on portfolios.id=projects.id";
    $getJoin=mysqli_query($conn,$getJoin);
    $getJoinData=mysqli_fetch_all($getJoin);
    return $getJoinData;
}

function add($table,$cols,$values){
    global $conn;
    $add="INSERT INTO Services($cols) VALUES ($values)"; 
    if(mysqli_query($conn,$add)){
        $_SESSION['create']="$table added sussfuly";
        header('location:../admin/add-$table.php');

    }
    else {
        echo mysqli_query_error($conn);
    }
    echo "add";  
  }
  if(isset($_POST['addService'])){
      $name=$_POST['Name'];
      $icon=$_POST['icon'];
      $Description=$_POST['Description'];
      $status=$_POST['status'];
      add("services","icon,name,Description,status","'$icon','$name','$Description','$status'");
  }

  if(isset($_POST['addSliders'])){
      
    $name=$_POST['Title'];
    $icon=$_POST['icon'];
    $Description=$_POST['Description'];
    $status=$_POST['status'];
    $img=$_POST['img'];
    $imgName=$img['name'];
    $imgTmpName=$img['Tmp_Name'];
    $t=time();
    $randomsString="$nowDate".hexcdec(uniqid());
    $ext=pathinfo($imgName,PATHINFO_EXTENSION);
    $imgNewName="$randomString.$txt";
    add("sliders","Title,icon,Description,status,img","'$title','$icon','$Description','$status','$img'");
move_uploaded_file($imgTmpName,"../assets/img/slide/$imgNewName");
}
if(isset($_POST['addClients'])){
    $img=$_POST['img'];
    $imgName=$img['name'];
    $imgTmpName=$img['Tmp_Name'];
    $t=time();
    $randomsString="$nowDate".hexcdec(uniqid());
    $ext=pathinfo($imgName,PATHINFO_EXTENSION);
    $imgNewName="$randomString.$txt";
add("clients","img,status","'$imgNewName','$status','add-Clients.php'");
}
if(isset($_POST['AddContacts'])){
    $Adress1=$_POST['Adress1'];
    $Adress2=$_POST['Adress2'];
    $Adress3=$_POST['Adress3'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $status=$_POST['status'];
    add("Contacts","Adress1,Adress2,Adress13,phone,email,status","'$Adress1','$Adress2','$Adress3','$phone','$email','$status','add-Contacts.php'");
}
if(isset($_POST['addPortfolios'])){
    $name=$_POST['Name'];
    $status=$_POST['status'];
    add("Portfolios","name,status","'$name','$status','add-Portfolios.php'");
}

if(isset($_POST['addProjects'])){
      
    $name=$_POST['Name'];
    $img=$_POST['img'];
    $imgName=$img['name'];
    $imgTmpName=$img['Tmp_Name'];
    $t=time();
    $randomsString="$nowDate".hexcdec(uniqid());
    $ext=pathinfo($imgName,PATHINFO_EXTENSION);
    $imgNewName="$randomString.$txt";
    $Portfolios=$_POST['Portfolios'];
    $status=$_POST['status'];
    add("Projects","Name,img,Portfolios_id,status","'$Name','$img','$Portfolios_id','$status'");
move_uploaded_file($imgTmpName,"../assets/img/Portfolio/$imgNewName");
}
function delete($table,$id,$goTo){
    global $conn;
    $sql="DELET FROM sliders where id=$id";
    if(mysqli_query($conn,$sql)){
        $_SESSION['CREATE']="$TABLE DELETE Successfuly";
        header("location:../admin/$goto");
    
    }
    else {
        echo mysqli_error($conn); 
    }
}
function update($table,$cols,$id,$goTo){
    global $conn;
    $sql="UPDATE FROM sliders where id=$id";
    if(mysqli_query($conn,$sql)){
        $_SESSION['CREATE']="$TABLE UPDATE Successfuly";
        header("location:../admin/$goto");
    
    }
    else {
        echo mysqli_error($conn); 
    }
}

if(isset($_GET['updateSlider'])){
    $id=$_GET['id'];
    $title=$_POST['title'];
    $name=$_POST['Name'];
    $img=$_FILES['img'];
    $link=$_POST['link'];
    $Description=$_POST['Description'];
    $status=$_POST['status'];
    $slider=getwhere('slider',"id=$id");
    $slider=$slider[0]['img'];

    $imgName=$img['name'];
    $imgTmpName=$img['Tmp_Name'];
    $t=time();
    $randomsString="$nowDate".hexcdec(uniqid());
    $ext=pathinfo($imgName,PATHINFO_EXTENSION);
    $imgNewName="$randomString.$txt";
    $Portfolios=$_POST['Portfolios'];
    add("updateSlider","Name,img,Portfolios_id,status","'$Name','$img','$Portfolios_id','$status'");
move_uploaded_file($imgTmpName,"../assets/img/Portfolio/$imgNewName");
}

if(isset($_GET['action']) && $_GET['action']=='deleteslider'){
    $id=$_GET['id'];

    $name=$_POST['Title'];
    $icon=$_POST['icon'];
    $Description=$_POST['Description'];
    $status=$_POST['status'];
    $img=$_FILES['img'];
    $imgName=$img['name'];
    $imgTmpName=$img['Tmp_Name'];
    $t=time();
    $nowDate=date('Y-M-D',$t);
    $randomsString="$nowDate".hexcdec(uniqid());
    $ext=pathinfo($imgName,PATHINFO_EXTENSION);
    $imgNewName="$randomString.$txt";
    add("sliders","Title=$title,description=$Description,status=$status,link=$link,img","'$title','$icon','$Description','$status','$img'");
move_uploaded_file($imgTmpName,"../assets/img/slide/$imgNewName");
     $slider=getwhere('slider',"id=$id");
     $slider=$slider[0]['img'];
     delete('sliders',$id,'sliders.php');

     if (isset($_FILES['img'])){
         echo "with new img";
        $imgName=$img['name'];
        $imgTmpName=$img['Tmp_Name'];
        $t=time();
        $randomsString="$nowDate".hexcdec(uniqid());
        $ext=pathinfo($imgName,PATHINFO_EXTENSION);
        $imgNewName="$randomString.$txt";
        $imgNewNameDb="assets/img/slider/";
        $imgNewNameDb="$randomString.$ext";
     
     update('sliders',"title='$title',img='$sliderimg',description='$description',status='$status'",'sliders.php');
     }
    else{
        echo 'with old img';
        update ("sliders","title='$title',img='$sliderimg',description='$description',status='$status'",'sliders.php');
   
    }
}
function register($table,$cols,$value){
    global $conn;
    $add="INSERT INTO Services($cols) VALUES ($values)"; 
    if(mysqli_query($conn,$add)){
        $_SESSION['id']=mysqli_insert_id($conn);
        $_SESSION['login']=true;
        header("location:../index.php");

    }
    else {
        echo mysqli_query_error($conn);
    }
}
-->