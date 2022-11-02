<?php include 'header.php'; ?>
<main>
<div class="container-fluid">
    <h1 class="mt-4"></h1>
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="card ">
        <div class="card-body">
            <?php 
// 
// Create New Account 
// 
$userid=$_SESSION['user_id'];
$msg = "";
$msg1 = "";
if (isset($_POST['register'])) {
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
  
    $query1 = "SELECT * FROM users WHERE password='$password'";
    $oldpass = $con->query($query1);
  
 if (strlen($password) < 8) {
      $msg = "Password must be minimum 8 Digit";
    } elseif ($oldpass->num_rows > 0) {
      if ($new_password == $confirm_password ) {
        $DELquery = "UPDATE users  
        SET
        password       = $confirm_password
        WHERE id = $userid";
        $delete = $con->query($DELquery);
      }else{
        $msg = "Password not match";
      }
      
    }else {
      $msg = "wrong old password";

      
    }
  }
            ?>
            <p class="text-danger">
             <?php
                echo $msg;
              ?>
              </p>
            <p class="text-success">
             <?php
                echo $msg1;
              ?>
              </p>
            <form method="post" enctype="multipart/form-data">
                <div class="row ">
                  
                    <div class="col-md-12 mt-2">
                        <div class="form-floating mb-3 mb-md-0">                         
                        <input class="form-control" type="password" required name="password" placeholder="Password" />
                            <label for="inputFirstName">Password</label>
                        </div>
                    </div>

                    
                  
                    <div class="col-md-12 mt-2">
                        <div class="form-floating mb-3 mb-md-0">                         
                        <input class="form-control" type="password" required name="new_password" placeholder="new Password" />
                            <label for="inputFirstName">New Password</label>
                        </div>
                    </div>

                  
                    <div class="col-md-12 mt-2">
                        <div class="form-floating mb-3 mb-md-0">                         
                        <input class="form-control" type="password" required name="confirm_password" placeholder="confirm Password" />
                            <label for="inputFirstName">Confirm Password</label>
                        </div>
                    </div>


                </div>

                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <input class="btn btn-primary btn-block" type="submit" name="register" value="Update password">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div style="height: 100vh"></div>
</div>
</main>
<?php include 'footer.php'; ?>