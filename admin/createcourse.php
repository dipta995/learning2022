<?php include 'header.php'; ?>
<main>
<div class="container-fluid px-4">
    <h1 class="mt-4">Create New Course <a class="btn btn-info" href="courses.php">Courses</a></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Courses</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
            <?php
                if(isset($_POST['submit'])){
                    $category_id       = $_POST['category_id'];
                    $course_title      = mysqli_real_escape_string($con,$_POST['course_title']); 
                    $price             = mysqli_real_escape_string($con,$_POST['price']); 
                    $discount          = mysqli_real_escape_string($con,$_POST['discount']); 
                    $hours             = mysqli_real_escape_string($con,$_POST['hours']); 
                    $short_description = mysqli_real_escape_string($con,$_POST['short_description']); 
                    $description       = mysqli_real_escape_string($con,$_POST['description']); 
                
                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];

                    $div            = explode('.', $file_name);
                    $file_ext       = strtolower(end($div));
                    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "image/".$unique_image;
                    $move_image     = "../image/".$unique_image;

                    $file_name1 = $_FILES['video']['name'];
                    $file_size1 = $_FILES['video']['size'];
                    $file_temp1 = $_FILES['video']['tmp_name'];

                    $div1            = explode('.', $file_name1);
                    $file_ext1       = strtolower(end($div1));
                    $unique_video    = substr(md5(time()), 0, 10).'.'.$file_ext1;
                    $uploaded_video  = "videos/".$unique_video;
                    $move_video      = "../videos/".$unique_video;   
                    
                    if (empty($short_description) ) {
                        echo "<span class='error'>Field Must Not be Empty</span>"; 
                    }elseif (empty($file_ext)) {
                        echo "<span class='error'>Image is required</span>";
                    }else{
                        $sql = "INSERT INTO courses (course_title,category_id,price,discount,hours,short_description,description,banner,demo_video)
                        VALUES ('$course_title','$category_id','$price','$discount','$hours','$short_description','$description','$uploaded_image','$uploaded_video')";
                        if ($con->query($sql) === TRUE) {
                            move_uploaded_file($file_temp, $move_image);
                            move_uploaded_file($file_temp1, $move_video);
                            echo "<span class='success'>New Record Created Successfully!</span>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $con->error;
                        }
                    }
                }
            ?>
                            
                       
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-floating mb-3 mb-md-0">                         
                            <select class="form-control" name="category_id">
                                <option>-- Choose Category --</option>
                                <?php
                                    $cat = "SELECT * FROM categories WHERE is_active=0";
                                    $catdata = $con->query($cat);
                                    foreach ($catdata as $key => $catvalue) {

                                ?>
                                <option value="<?php echo $catvalue['cat_id']?>"><?php echo $catvalue['cat_name']?></option>
                                <?php }  ?>
                            </select>
                            <label for="inputFirstName">Category</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input name="video" class="form-control" accept="video/*" type="file" placeholder="Enter your last name" />
                            <label for="inputFirstName">Video</label>
                        </div>
                    </div>                    
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input name="image" class="form-control" accept="image/*" type="file" placeholder="Enter your last name" />
                            <label for="inputFirstName">Image</label>
                        </div>
                    </div>  
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input required class="form-control"  type="text" name="course_title" />
                            <label for="inputFirstName">Course Title</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input  required class="form-control"  type="number" name="price"  />
                            <label for="inputLastName">Price</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input name="discount" required min="0" max="100" class="form-control" id="inputFirstName" type="number" />
                            <label for="inputFirstName">Discount</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="hours" class="form-control"  type="number"/>
                            <label for="inputLastName">Hours</label>
                        </div>
                    </div>
                </div>
            
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-floating mb-3 mb-md-0">
                            <textarea name="short_description" class="form-control" type="" > </textarea>
                            <label for="inputFirstName">Short Description</label>
                        </div>
                    </div>                    
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-floating mb-3 mb-md-0">
                            <textarea name="description" class="form-control" id="inputFirstName" type="" placeholder="description"> </textarea>
                            <label for="inputFirstName">Description</label>
                        </div>
                    </div>                    
                </div>
       
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <button class="btn btn-primary btn-block" type="submit" name="submit">Create Course</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div style="height: 100vh"></div>
</div>
</main>
<?php include 'footer.php'; ?>