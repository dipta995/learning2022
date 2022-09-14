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
                        <h3>Course Tutorial</h3>
                    </div>
                </div><!-- end col -->
                <div class="col-md-6 text-right">
                    <ul class="breadcrumb">
                        <li><a href="javascript:void(0)">Edulogy</a></li>
                        <li class="active">Tutorial</li>
                    </ul>
                </div>
            </div><!-- end row -->
            <div class="row">
                <div class="col-md-8">
                    <?php
                    $course_id  = $_GET['courseid'];
                    $videoid = $_GET['videoid'];
                    $query = "SELECT * FROM videos where video_id = $videoid";
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {
                        $data = mysqli_fetch_array($result);

                    ?>
                        <video width="600" height="400" controls>
                            <source src="
                    <?php echo $data['video_url']; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php } ?>
                </div><br>

                <hr>
                <div class="playlist col-md-4">
                    <div class="card-head">
                        <h4>Playlist</h4>
                    </div>
                    <div class="card-body">
                        <br>
                        <?php
                        $course_id  = $_GET['courseid'];
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT * FROM videos where course_id = $course_id Order By video_id DESC";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            $i = 1;
                            foreach ($result as $key => $value) {
                                echo $i++;
                        ?>
                                <a class="<?php echo ($value['video_id'] == $_GET['videoid']) ? "text-danger" : ""; ?>" href="?courseid=<?php echo $course_id; ?>&videoid=<?php echo $value['video_id'] ?> "><?php echo $value['video_title'] ?> </a><br>

                        <?php }
                        } ?>
                        <br>
                    </div>
                </div>
            </div><!-- end row -->

        </div>


    </div><!-- end container -->
</section>
<style>
    .playlist {
        background-color: #dcdce7;
        height: auto;
    }

    .card-head h4 {
        text-align: center;
        padding: 10px;
    }

    .card-head {
        background-color: #01bacf;
        height: auto;
    }

    .card-body {
        background-color: #afcdb7;
        height: auto;
        margin-bottom: 20px;
    }

    .card-body a {
        float: left;
        margin-left: 30px;
    }
</style>
<?php include 'footer.php'; ?>