<?php
include 'header.php';
include '../Controller/database.php';
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Video <a class="btn btn-info" href="courses.php">Courses</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Video</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($_GET['editid'])) {
                        $editid = $_GET['editid'];
                        $query = "select * from videos where video_id = $editid";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            $value = mysqli_fetch_array($result);
                        }
                    }
                    ?>

                    <?php
                    if (isset($_POST['submit'])) {
                        $video_title = $_POST['video_title'];
                        $video_title = mysqli_real_escape_string($con, $_POST['video_title']);
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div            = explode('.', $file_name);
                        $file_ext       = strtolower(end($div));
                        $ext_arr        = array("mp4", "avi", "3gp", "mov", "mpeg");
                        $unique_image   = substr(md5(time()), 0, 10) . '.' . $file_ext;
                        $uploaded_image = "videos/course/" . $unique_image;
                        $move_image     = "../videos/course/" . $unique_image;

                        if (empty($video_title)) {
                            echo "<span class='error'>Field Must Not be Empty!</span>";
                        } else {
                            if (!empty($file_name)) {
                                if (!in_array($file_ext, $ext_arr)) {
                                    echo "<span class='error'>Invalid File Extension!</span>";
                                } else {
                                    $sql = "UPDATE videos
                                    SET 
                                    video_title         = '$video_title',
                                    video_url           = '$uploaded_image'                           
                                    WHERE video_id      = '$editid'";
                                    if ($con->query($sql) === TRUE) {
                                        move_uploaded_file($file_temp, $move_image);
                                        echo "<span class='success'>New record created successfully</span>";
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $con->error;
                                    }
                                }
                            } else {
                                $sql = "UPDATE videos
                                SET 
                                video_title       = '$video_title'
                                WHERE video_id    = '$editid'";
                                if ($con->query($sql) === TRUE) {
                                    echo "<span class='success'>New Record Created Successfully!!</span>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $con->error;
                                }
                            }
                        }
                    }
                    ?>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input value="<?php echo $value['video_title']; ?>" name="video_title" class="form-control" id="inputFirstName" type="text" />
                                <label for="inputFirstName">Video Title</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="image" class="form-control" type="file" accept="video/*" placeholder="Enter your last name" />
                                <label for="inputFirstName">Video</label>
                                <div>
                                    <video width="300" height="250" controls>
                                        <source src="../<?php echo $value['video_url']; ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button class="btn btn-primary btn-block" type="submit" name="submit">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
<?php include 'footer.php'; ?>