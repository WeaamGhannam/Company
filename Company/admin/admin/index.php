<?php  require('inc/header.php'); ?>
<?php 
require_once('handel/conection.php');
$query="SELECT count(id)  as adminCount FROM admins";
$result=mysqli_query($con,$query);
$adminCount=mysqli_fetch_assoc($result);

$query="SELECT count(id)  as userCount FROM users";
$result=mysqli_query($con,$query);
$userCount=mysqli_fetch_assoc($result);
?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">admins</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>233<?php //$adminCount['adminCount'] ?></h5>
                          <a href="admins.php" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>5<?php //$userCount['userCount'] ?></h5>
                          <a href="users.php" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Orders</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>1120</h5>
                          <a href="#" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php  require_once('inc/footer.php'); ?>