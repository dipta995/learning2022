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

            </div>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th width="5%">Sl</th>
                        <th width="15%">Course Title</th>
                        <th width="10%">Video Title</th>
                        <th width="35%">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Course Title</th>
                        <th>Video Title</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if (isset($_GET['vidid'])) {
                        $vidid = $_GET['vidid'];
                    }

                    if (isset($_GET['delid'])) {
                        $delid = $_GET['delid'];
                        $DELquery = "DELETE from videos WHERE video_id = $delid";
                        $delete = $con->query($DELquery);
                        if ($delete) {
                            echo "<script>window.location='video-single.php?vidid=" . $vidid . "';</script>";
                        }
                    }

                    $query = "SELECT * FROM videos left join courses on courses.course_id=videos.course_id where videos.course_id =$vidid Order By video_id desc";
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {
                        $i = 0;
                        foreach ($result as $key => $value) {
                            $i++;
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['course_title'] ?></td>
                                <td><?php echo $value['video_title'] ?></td>

                                <td>
                                    <a href="editvideo.php?editid=<?php echo $value['video_id']; ?>" class="btn btn-info">Edit</a>

                                    <a onclick="return confirm('Are you sure to Delete?');" href="?delid=<?php echo $value['video_id']; ?>&vidid=<?php echo $vidid; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                    <?php }
                    } ?>


                </tbody>
            </table>
        </div>

        <div style="height: 100vh"></div>

    </div>
</main>
<?php include 'footer.php'; ?>