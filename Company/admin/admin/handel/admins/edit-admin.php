<?php  
session_start();

require('inc/header.php '); ?>
<?php  require_once('handel/conection.php');
if(isset($_GET['id'])){
  $id=(int)$_GET['id']; 
  $admin="SELECT *FROM admins where id=$id";
  $query=mysqli_query($conn,$admin);
  $admin=mysqli_fetch_assoc($query);
 }
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
                    <h3>add Admins</h3>
                    <a href="add-admin.php" class="btn btn-success"> add admin</a>
                </div>
               <?php 
               if(isset($_SESSION['seccess'])):
                echo $_SESSION['seccess'];
               
               endif;
               ?>
               <form method="post" action="handel/admins/edit-admin.php" enctype="multipart/form-data">
               <div class="form-group">
                            <input type="text" value="<?= $id ?>">
                              <label>Name</label>
                              <input type="text" value="<?= $admin['name'] ?>" class="form-control">
                            </div>


                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" value="<?= $admin['email'] ?>" class="form-control">
                            </div>
                            
                            <div class="form-group">
                            <img class ="w-100 h-100" src="uploads/<?=$admins['img']?>" />
                                <input type="email" value="<?= $admin['email'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control">
                                  <option value="1" <?=($admin['status']==1)?'selected':'' ?>>Active</option>
                                  <option value="0" <?=($admin['status']==0)?'selected':''?>>No Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="edit" name="edit" class="btn btn-primary">update</button>
                                <a class="btn btn-dark" href="#">back</a>
                              </div>
                            
              </form>
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
                            <a class="btn btn-sm btn-info" href="edit-admin.php?id<?=$admin['id']?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="handel/admins/delet-admin.php ?id=<?= $admin['id']?>">
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