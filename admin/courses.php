<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Courses List <a class="btn btn-info" href="createcourse.php">Create course</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Cars</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Hours</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Hours</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php


                        if (isset($_GET['delid'])) {
                            $delid = $_GET['delid'];
                            $DELquery = "DELETE from courses WHERE course_id = $delid";
                            $delete = $con->query($DELquery);
                            if ($delete) {
                                echo "<script>window.location='courses.php';</script>";
                            }
                        }

                        $query = "SELECT * FROM courses left join categories on categories.cat_id=courses.category_id where courses.is_active=0 Order By course_id desc";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            foreach ($result as $key => $value) {

                        ?>
                                <tr>
                                    <td><?php echo $value['course_id']; ?></td>
                                    <td><?php echo $value['course_title'] ?></td>
                                    <td><?php echo $value['price']; ?>Taka</td>
                                    <td><?php echo $value['discount']; ?></td>
                                    <td><?php echo $value['hours']; ?> Hour</td>
                                    <td><img style="height:60px;width: 60px;" src="../<?php echo $value['banner']; ?>"></td>

                                    <td>
                                        <a href="editcourse.php?editid=<?php echo $value['course_id']; ?>" class="btn btn-info">Edit</a>
                                        <a href="?delid=<?php echo $value['course_id']; ?>" class="btn btn-danger">Delete</a>
                                        <!-- <a target="_blank" href="../car-single.php?carid=" class="btn btn-success">Show Details</a> -->
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