<?php 
include 'header.php'; 
?>
<section class="section cb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tagline-message page-title">
                            <h3>My Coruses</h3>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-6 text-right">
                        <ul class="breadcrumb">
                            <li><a href="javascript:void(0)">Edulogy</a></li>
                            <li class="active">Course</li>
                        </ul>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section">
            <div class="container">
                <div class=" ">
                    <div class="row">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Coursr Name</th>
                            <th>amount</th>
                            <th>Payment acount</th>
                            <th>ref</th>
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
                                   
                                    <td><?php echo $value['payment_type']."<br> ".$value['account_no']; ?></td>
                                    
                                    <td><?php echo $value['ref'] ?></td>
                                    <td>
                                        <?php
                                        if ($value['status']==0) {
                                        ?>
                                        <a href="?delid=<?php echo $value['order_id']; ?>" class="btn btn-danger">Cancell</a>
                                        <?php }else{ ?>
                                            <a href="palaylist.php?courseid=<?php echo $value['course_id']; ?>" class="btn btn-danger">Preview</a>
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