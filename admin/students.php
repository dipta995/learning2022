<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Student List <a class="btn btn-info" href="students.php">Reload</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">Name</th>
                            <th width="10%">Email</th>
                            <th width="10%">Phone</th>
                            <th width="10%">Status</th>
                            <th width="10%">Crated at</th>
                            <th width="35%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th width="5%">#</th>
                            <th width="15%">Name</th>
                            <th width="10%">Email</th>
                            <th width="10%">Phone</th>
                            <th width="10%">Status</th>
                            <th width="10%">Crated at</th>
                            <th width="35%">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php


                        if (isset($_GET['lock'])) {
                            $delid = $_GET['lock'];
                            $DELquery = "UPDATE users  
                            SET
                            is_active       = '1'
                            WHERE id = $delid";
                            $delete = $con->query($DELquery);
                            if ($delete) {
                                echo "<script>window.location='students.php';</script>";
                            }
                        }
                        if (isset($_GET['unlock'])) {
                            $delid = $_GET['unlock'];
                            $DELquery = "UPDATE users  
                            SET
                            is_active       = '0'
                            WHERE id = $delid";
                            $delete = $con->query($DELquery);
                            if ($delete) {
                                echo "<script>window.location='students.php';</script>";
                            }
                        }

                        $query = "SELECT * FROM users where role='user'";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            foreach ($result as $key => $value) {

                        ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value['first_name'] ." ". $value['last_name']; ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['phone']; ?> </td>
                            <td><?php  
                            if ($value['is_active']==0) {
                                echo "Active";
                            }elseif ($value['is_active']==1) {
                                echo "Inactive";
                            }
                            ?></td>
                            <td><?php echo $value['created_at']; ?></td>

                            <td>
                            <?php   if ($_SESSION['flag']==1 && $_SESSION['role']=='admin') { ?>

                            <?php  
                            if ($value['is_active']==0) { ?>
                                <a onclick="return confirm('Are you sure to Inactive?');" href="?lock=<?php echo $value['id']; ?>" class="btn btn-info">Inactive</a>
                                <?php }elseif ($value['is_active']==1) { ?>
                                    <a onclick="return confirm('Are you sure to active?');" href="?unlock=<?php echo $value['id']; ?>" class="btn btn-danger">Active</a>
                            <?php } ?>
                            <?php } ?>

                            </td>
                        </tr>
                        <?php }
                        } ?>


                    </tbody>
                </table>

            </div>
        </div>
        <div style="height: 100vh"></div>
        <div class="card mb-4">
            <div class="card-body"></div>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>