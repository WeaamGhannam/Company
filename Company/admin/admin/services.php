<?php 
s//ession_start();
 require('inc/header.php '); 
 ?>
<?php  
require_once('handel/conection.php');
if(isset($_GET['page'])){
 $page=$_GET['page']; 
}else{
$page=1;
}
$query="SELECT * FROM admins ";
//$result=mysqli_query($conn,$query);
//$totalCount=mysqli_fetch_assoc($result);
//$totalCount=$totalCount['total'];
////$limit=2;
//$offset=($page-1)*$limit;
//$numberOfPage=ceil($totalCount/$limit);
//if($page<1 || $page>$numberOfPage){
 // header("location:admins.php?page=1");
//}
//$query="SELECT*FROM admins limit $limit offset $offset";
//$result=mysqli_query($conn,$query);
//if(mysqli_num_rows($result)> 0){
  //$admins=mysqli_fetch_all($result,MYSQLI_ASSOC);
//}
//else{
  //$msg="no data found";
//}
?>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Services</h3>
                    <a href="add-service.php" class="btn btn-success"> add service</a>
                </div>
               <?php 
               if(isset($_SESSION['errors'])):
                  foreach($_SESSION['errors'] as $error):?>
                  <li class="alret alert-danger"><?= $error ?></li>
                <?php endforeach;
                endif;
                unsent($_SESSION['errors']);?>
              <?php 
              else:
              ?>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($admins)):
                       foreach($admins as $index=>$admin): ?>
                      <tr>
                        <th scope="row"><?= $index +1 ?></th>
                        <td><?= $admin['name']?></td>
                        <td><?= $admin['email']?></td>
                        <td><?php if($admin['status']==1):?>
                          <span class="badge badge-pill badge-success">
                          <i class="fa-solid fa-check"></i>
                          </span>
                             
                        <?php 
                        else:  ?>
                              <span class="badge badge-pill badge-danger">
                                <i class="fas fa-times"></i>
                            </span>
                             
                        <?php endif;?>

                        </td>
                        <td>
                            <a class="btn btn-sm btn-info" href="#">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="handel/delet-admin.php ?id=<?= $admin['id']?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                      <?php endforeach;
                      else:
                        //echo $msg;
                        echo "";
                      endif;
                      //mysqli_close($conn);
                      ?> 
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <?php  require_once('inc/footer.php'); ?>