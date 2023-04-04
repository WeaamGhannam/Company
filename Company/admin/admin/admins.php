<?php  require('inc/header.php '); ?>
<?php  require_once('handel/conection.php');
if(isset($_GET['page'])){
 $page=$_GET['page']; 
}else{
$page=1;
}

if(isset($_GET['page'])){
  $page=$_GET['page'];
}else{
  $page=1;
}
$query="SELECT count('id') as total from admins";
$result=mysqli_query($conn,$query);
$totalCount=mysqli_fetch_assoc($result);
$totalCount=$totalCount['total'];
$limit=2;
$offset=($page-1) * $limit;
$numberofpage=ceil($totalCount/$limit);
if($page<1 || $page>=$numberOfPage){
  header("location : admins.php?page=1");
}
$query="SELECT * FROM admins limit $limit offset $offset";
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
                    <h3>All Admins<?=$message['allAdmins']?></h3>
                    <?php if($admin['role']==1):?>
                    <a href="add-admin.php" class="btn btn-success"><?=$message['addAdmin']?> </a>
                <?php else:?>
                    <a href="#" class="btn btn-disabled"><?=$message['addAdmin']?> </a>
                <?php endif;?>
                </div>
               <?php 
               if(isset($_SESSION['seccess'])):
                echo $_SESSION['seccess'];
               
               endif;
               ?>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col"><?= $message['name']?></th>
                        <th scope="col">Email<?= $message['email']?></th>
                        <th scope="col">Status<?= $message['status']?></th>
                        <th scope="col">Actions<?= $message['action']?></th>
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
                        <?php if($_SESSION['adminRole']==1):?>

                            <a class="btn btn-sm btn-info" href="edit-admin.php?id=<?= $admin['id']?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="handel/admins/delet-admin.php ?id=<?= $admin['id']?>">
                                <i class="fas fa-trash"></i>
                            </a>
                            <?php 
                            else:
                              <a class="btn btn-sm btn-info" href="#">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="#">
                                <i class="fas fa-trash"></i>
                            ?>
                            <?php endif;?>
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
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item <?=($page==1)? 'disabled':''?>"><a class="page-link" href="admins.php?page=<?=$page-1;?>">Previous</a></li>
                <?php for($i=1;$i<$numberOfPage;$i++): ?>
                <li class="page-item"><a class="page-link" href="admins.php?page=<?=$i?>"><?= $i ?></a></li>
                <?php endfor; ?>
                <li class="page-item <?=($page==$numberOfPage)? 'disabled':''?>"><a class="page-link" href="admins.php?page=<?=$page+1;?>">Next</a></li>
              </ul>
</nav>

        </div>
    </div>
    <?php  require_once('inc/footer.php'); ?>