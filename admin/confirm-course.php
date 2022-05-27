<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
    
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">confirm Courses</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Coursr Name</th>
                            <th>payable amount</th>
                            <th>Student Name</th>
                            <th>Phone</th>
                            <th>Payment acount</th>
                            <th>ref</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Coursr Name</th>
                            <th>payable amount</th>
                            <th>Student Name</th>
                            <th>Phone</th>
                            <th>Payment acount</th>
                            <th>ref</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php


                        if (isset($_GET['confirmid'])) {
                            $confirmid = $_GET['confirmid'];
                            $editquery ="UPDATE orders  
                                SET
                                status       = 1
                            WHERE order_id = $confirmid";
                            $confirm = $con->query($editquery);
                            if ($confirm) {
                                echo "<script>window.location='confirm-course.php';</script>";
                            }
                        }
                        if (isset($_GET['delid'])) {
                            $delid = $_GET['delid'];
                            $DELquery = "DELETE from orders WHERE order_id = $delid";
                            $delete = $con->query($DELquery);
                            if ($delete) {
                                echo "<script>window.location='pending-course.php';</script>";
                            }
                        }

                        $query = "SELECT * FROM orders left join courses on orders.course_id=courses.course_id left join users on orders.customer_id=users.id where orders.status=1 Order By enroll_at ASC";
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
                                    <td><?php echo $value['first_name']." ".$value['last_name']; ?></td>
                                    <td><?php echo $value['phone']; ?></td>
                                    <td><?php echo $value['payment_type']."<br> ".$value['account_no']; ?></td>
                                    
                                    <td><?php echo $value['ref'] ?></td>
                                    
                                    <td>
                                        <strong class="text-success">Confirmed</strong>
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