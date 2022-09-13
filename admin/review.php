<?php
include 'header.php';
include '../Controller/database.php';
?>
<style>
    .star-rating {
        display: flex;
        flex-direction: row-reverse;
        font-size: 1.5em;
        justify-content: space-around;
        padding: 0 .2em;
        text-align: center;
        width: 5em;
    }

    .star-checked {
        color: orange;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        color: #ccc;
        cursor: pointer;
    }

    .star-rating :checked~label {
        color: #f90;
    }

    .star-rating label:hover,
    .star-rating label:hover~label {
        color: #fc0;
    }
</style>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Reviews <a class="btn btn-info" href="courses.php">Courses</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Courses</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

            </div>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Student Name</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (isset($_GET['delrev'])) {
                        $delrev = $_GET['delrev'];
                        $DELquery = "DELETE from review WHERE review_id = $delrev";
                        $delete = $con->query($DELquery);
                        if ($delete) {
                            echo "<script>window.location='review.php';</script>";
                        }
                    }
                    ?>
                    <?php
                    if (empty($_GET['revid']) || $_GET['revid'] == NULL || !isset($_GET['revid'])) {
                        echo "<script>window.location='courses.php';</script>";
                    } else {
                        $revid = $_GET['revid'];
                        $query = "SELECT * FROM review left join users on review.customer_id=users.id 
                        WHERE course_id=$revid";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            $i = 0;
                            foreach ($result as $key => $value) {
                                $i++;
                    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value['first_name'] . ' ' . $value['last_name']; ?></td>
                                    <td><?php echo $value['review'] ?></td>
                                    <td>
                                        <?php
                                        if($value['rating'] == 0){
                                            echo "No rating!";
                                        } elseif($value['rating'] == 1){
                                            echo "<i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>";
                                        } elseif($value['rating'] == 2){
                                            echo "<i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>";
                                        } elseif($value['rating'] == 3){
                                            echo "<i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>";
                                        } elseif($value['rating'] == 4){
                                            echo "<i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star'></i>";
                                        }elseif($value['rating'] == 5){
                                            echo "<i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star star-checked'></i>
                                            <i class='fa fa-star star-checked'></i>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Are you sure to Delete?');" href="?delrev=<?php echo $value['review_id']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                    <?php  }
                        }
                    } ?>
                </tbody>
            </table>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
<?php include 'footer.php'; ?>