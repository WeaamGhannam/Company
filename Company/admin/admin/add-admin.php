<?php  
//session_start();
require('inc/header.php '); ?>
<?php
if($_SESSION['adminRole']!=1):
    header("location:index.php");
?>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <h3 >All Admin <?= $message['allAdmin']?></h3>
                    <h3 class="mb-3">Add Admin <?= $message['addAdmin']?></h3>
                <div class="card">
                    <div class="card-body p-5">
                        <ul>
                        <?php
                        if(isset($_SESSION['errors'])): 
                            foreach($_SESSION['errors'] as $error): ?> 
                            <li class="alret alret-danger" ><?=$error?></li>
                                <?php  endforeach; 
                                    endif;
                                   unset($_SESSION['errors']);    
                        ?>
                        </ul>
                        <form method="post" action="handel/add-admin.php">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control">
                            </div>


                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="role">
                                  <option value="0">Admin</option>
                                  <option value="1">Super Admin</option>
                                </select>
                            </div>
  
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                  <option value="1" >Active</option>
                                  <option value="0">No Active</option>
                                </select>
                            </div>
                            
                            
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                            </div>
                              
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="#">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php  require('inc/footer.php'); ?>
