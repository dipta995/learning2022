<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Admin <a class="btn btn-info" href="admins.php">Admins</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Admins</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST">
                    <?php
                        if (empty($_GET['editid']) || $_GET['editid'] == NULL || !isset($_GET['editid'])) {
                            echo "<script>window.location='admins.php';</script>";
                        } else {
                            $editid = $_GET['editid'];
                            $query = "SELECT * FROM users WHERE id=$editid";
                            $result = $con->query($query);
                            if ($result->num_rows > 0) {
                                $value = mysqli_fetch_array($result);
                            }
                        }

                        if (isset($_POST['submit'])) {
                            $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
                            $last_name  = mysqli_real_escape_string($con, $_POST['last_name']);
                            $email      = mysqli_real_escape_string($con, $_POST['email']);
                            $phone      = mysqli_real_escape_string($con, $_POST['phone']);
                            $password   = mysqli_real_escape_string($con, $_POST['password']);
                            $role       = mysqli_real_escape_string($con, $_POST['role']);

                            if (empty($first_name) || empty($last_name)) {
                                echo "<span class='error'>Field must not be empty!</span>";
                            } elseif (!preg_match("/^[a-zA-Z-']*$/", $first_name)) {
                                echo "<span class='error'>Only letters are allowed for first name</span>";
                            } elseif (!preg_match("/^[a-zA-Z-']*$/", $last_name)) {
                                echo "<span class='error'>Only letters are allowed for last name</span>";
                            } elseif (strlen($password) < 8) {
                                echo "<span class='error'>Password must be minimum 8 Digit</span>";
                            } elseif (strlen($phone) != 11) {
                                echo "<span class='error'>Phone number must be 11 Digits</span>";
                            } elseif (!preg_match("/^(?:\\+88|88)?(01[3-9]\\d{8})/", $phone)) {
                                echo "<span class='error'>Phone number is not valid (First two digits must be '01'!)</span>";
                            } else {
                                $sql = "UPDATE users  
                                SET
                                first_name   = '$first_name',
                                last_name    = '$last_name',
                                email        = '$email',
                                phone        = '$phone',
                                password     = '$password',
                                role         = '$role'
                                WHERE id     =  $editid";
                                if ($con->query($sql) === TRUE) {                               
                                    echo "<span class='success'>Updated successfully!</span>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $con->error;
                                }
                            }
                        }
                        
                    ?>
                     <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input required class="form-control" type="text" name="first_name" value="<?php echo $value['first_name']; ?>" />
                                        <label for="inputFirstName">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input required class="form-control" type="text" name="last_name" value="<?php echo $value['last_name']; ?>" />
                                        <label for="inputLastName">Last Name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input required class="form-control" type="email" name="email" value="<?php echo $value['email']; ?>" />
                                        <label for="inputEmail">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input required class="form-control" type="text" name="phone" value="<?php echo $value['phone']; ?>" />
                                        <label for="inputPhone">Phone</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input required class="form-control" type="password" name="password" value="<?php echo $value['password']; ?>" />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select class="form-control" name="role">
                                            <option value="<?php echo $value['role']; ?>"><?php echo $value['role']; ?></option>
                                            <option value="admin">admin</option>
                                        </select>
                                        <label for="inputRole">Role</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block" type="submit" name="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
<?php include 'footer.php'; ?>