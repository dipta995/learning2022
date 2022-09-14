<?php
include 'header.php';
?>
<section class="section db p120">
    <div class="container">
    </div><!-- end container -->
</section><!-- end section -->

<section class="section gb nopadtop">
    <div class="container">
        <div class="boxed boxedp4">
            <div class="row">
                <div class="col-md-6">
                    <div class="tagline-message page-title">
                        <h3 style="font-family: cambria;">My Courses</h3>
                    </div>
                </div><!-- end col -->
                <div class="col-md-6 text-right">
                    <ul class="breadcrumb">
                        <li><a href="javascript:void(0)">Edulogy</a></li>
                        <li class="active">Course</li>
                    </ul>
                </div>
            </div><!-- end row -->
            <div class="row blog-grid">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Course Name</th>
                            <th>Amount</th>
                            <th>Payment No.</th>
                            <th>Payment Account</th>
                            <th>Ref.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $user_id = $_SESSION['user_id'];
                        if (isset($_GET['delid'])) {
                            $delid = $_GET['delid'];
                            $DELquery = "DELETE from orders WHERE order_id = $delid and status = 0";
                            $delete = $con->query($DELquery);
                            if ($delete) {
                                echo "<script>window.location='my-courses.php';</script>";
                            }
                        }

                        $query = "SELECT * FROM orders left join courses on orders.course_id=courses.course_id left join users on orders.customer_id=users.id where orders.customer_id = $user_id Order By enroll_at ASC";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            $i = 0;
                            foreach ($result as $key => $value) {
                                $i++;

                        ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value['course_title'] ?></td>
                                    <td><?php echo $value['discount_price']; ?> BDT</td>
                                    <td><?php echo $value['payment_no']; ?></td>
                                    <td><?php echo $value['payment_type'] . "<br> " . $value['account_no']; ?></td>
                                    <td><?php echo $value['ref'] ?></td>
                                    <td>
                                        <?php
                                        if ($value['status'] == 0) {
                                        ?>
                                            <a href="?delid=<?php echo $value['order_id']; ?>" class="btn btn-danger">Cancel</a>
                                        <?php } else { ?>
                                            <a href="playlist.php?courseid=<?php echo $value['course_id']; ?>&videoid=1" class="btn btn-danger">Preview</a>
                                        <?php } ?>
                                        <!-- <a target="_blank" href="../car-single.php?carid=" class="btn btn-success">Show Details</a> -->
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div><!-- end row -->
        </div><!-- end boxed -->
    </div><!-- end container -->
</section>
<?php include 'footer.php'; ?>