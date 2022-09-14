<?php 
include 'header.php'; 

if (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $DELquery = "DELETE FROM users WHERE id = $delid";
    $delete = $con->query($DELquery);
    if ($delete) {
        echo "<script>window.location='admins.php';</script>";
    }
}
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Admins  <a class="btn btn-info" href="create-admin.php">Create Admin</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Admins</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM users WHERE role = 'admin'";
                            $result = $con->query($query);
                            if ($result->num_rows > 0) {
                                foreach ($result as $key => $value) {
                            ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $value['first_name'].' '.$value['last_name']; ?></td>
                                        <td><?php echo $value['email']; ?></td>
                                        <td><?php echo $value['phone']; ?></td>
                                        <td><?php echo $value['role']; ?></td>
                                        <td>
                                            <a class="btn btn-info" href="editadmin.php?editid=<?php echo $value['id']; ?>">Edit</a>
                                            <a onclick="return confirm('Are you sure to Delete?');" class="btn btn-danger" href="?delid=<?php echo $value['id']; ?>">Delete</a>
                                        </td>
                                    </tr>

                            <?php }
                            } ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
<?php include 'footer.php'; ?>