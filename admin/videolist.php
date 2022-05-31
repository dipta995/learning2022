<?php 
    include 'header.php';
    include '../Controller/database.php';
?>
<main>
<div class="container-fluid px-4">
    <h1 class="mt-4">All Videos <a class="btn btn-info" href="courses.php">Courses</a></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Courses</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <?php
                $fetchVideos = mysqli_query($con, "SELECT * FROM tbl_video ORDER BY id DESC");
                while($row = mysqli_fetch_assoc($fetchVideos)){
                    $name = $row['name'];
                    $location = $row['location'];

                    echo "<div style='float: left; margin-right: 5px;'>
                        <video src='".$location."' controls width='320px' height='320px'></video><br>
                        <span>".$name."</span>
                    </div>";
                }
            ?>
        </div>        
    </div>

    <div style="height: 100vh"></div>

</div>
</main>
<?php include 'footer.php'; ?>

