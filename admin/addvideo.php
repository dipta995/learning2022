<?php 
    include 'header.php';
    include '../Controller/database.php';
?>
<main>
<div class="container-fluid px-4">
    <h1 class="mt-4">Add Videos <a class="btn btn-info" href="courses.php">Courses</a></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Courses</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
            <?php
            if(isset($_GET['addid'])){
                $addid = $_GET['addid'];
            }
                  
            if(isset($_POST['submit'])){
                $course_id = $_POST['course_id'];
                $video_title = mysqli_real_escape_string($con, $_POST['video_title']); 
                            
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];

                $div            = explode('.', $file_name);
                $file_ext       = strtolower(end($div));
                $ext_arr        = array("mp4", "avi", "3gp", "mov", "mpeg");
                $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "videos/course/".$unique_image;
                $move_image     = "../videos/course/".$unique_image;

                if (empty($video_title) ) {
                    echo "<span class='error'>Field Must Not be Empty!</span>"; 
                } elseif(!in_array( $file_ext, $ext_arr)){
                    echo "<span class='error'>Invalid File Extension!</span>";
                } else{        
                    $sql = "INSERT INTO videos (video_title,course_id,video_url)
                    VALUES ('$video_title','$course_id','$uploaded_image')";

                    if ($con->query($sql) === TRUE) {                     
                        move_uploaded_file($file_temp, $move_image);
                        echo "<span class='success'>New Record Created Successfully!!</span>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }
                }                             
             }

            ?>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <select name="course_id" class="form-control">
                                <?php
                                $query = "SELECT * FROM courses where is_active=0 Order By course_id desc";
                                $result = $con->query($query);
                                if ($result->num_rows > 0) {
                                    foreach ($result as $key => $value) {

                                ?>
                                 <?php
                                    if($value['course_id'] == $addid){
                                     
                                ?>
                                
                                <option value="<?php echo $value['course_id']; ?>"><?php echo $value['course_title']; ?></option>
                                <?php }  }} ?>
                            </select>
                            <label for="inputFirstName">Select Course</label>
                        </div>
                    </div>                 
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input name="video_title" required  class="form-control" id="inputFirstName" type="text" />
                            <label for="inputFirstName">Video Title</label>
                        </div>
                    </div>                     
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input  required class="form-control"  type="file" name="image"  />
                            <label for="inputLastName">Select Video</label>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <button class="btn btn-primary btn-block" type="submit" name="submit">Add Video</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div style="height: 100vh"></div>

</div>
</main>
<?php include 'footer.php'; ?>

