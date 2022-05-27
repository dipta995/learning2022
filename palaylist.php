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
                   <div class="col-md-10">
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
                   </div>
                   <div class="col-md-2">
                       <ul>
                   <?php
                   $course_id  = $_GET['courseid']; 
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT * FROM videos where course_id = $course_id Order By video_id DESC";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            $i = 0;
                            foreach ($result as $key => $value) {
                                $i++; ?>
                                <li class="<?php echo ($value['video_id']==$_GET['videoid']) ? "text-danger" : ""; ?>" ><a href="?courseid=<?php echo $course_id; ?>&videoid=<?php echo $value['video_id']?> "><?php echo $value['video_title']?> </a></li>
                        <?php } }?>
                        </ul>
                   </div>
                    </div><!-- end row -->

                  
                
                </div><!-- end boxed -->
            </div><!-- end container -->
        </section>
<?php include 'footer.php'; ?>