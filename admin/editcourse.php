<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Courses <a class="btn btn-info" href="courses.php">Courses</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Courses</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <?php
                    if (empty($_GET['editid']) || $_GET['editid'] == NULL || !isset($_GET['editid'])) {
                        echo "<script>window.location='Courses.php';</script>";
                    } else {
                        $editid = $_GET['editid'];
                        $query = "SELECT * FROM courses WHERE course_id=$editid";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            $value = mysqli_fetch_array($result);
                        }
                    }
                    if (isset($_POST['submit'])) {
                        $category_id = $_POST['category_id'];
                        $course_title = mysqli_real_escape_string($con, $_POST['course_title']);
                        $price = mysqli_real_escape_string($con, $_POST['price']);
                        $discount = mysqli_real_escape_string($con, $_POST['discount']);
                        $hours = mysqli_real_escape_string($con, $_POST['hours']);
                        $short_description = mysqli_real_escape_string($con, $_POST['short_description']);
                        $description = mysqli_real_escape_string($con, $_POST['description']);

                        $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div            = explode('.', $file_name);
                        $file_ext       = strtolower(end($div));
                        $unique_image   = substr(md5(time()), 0, 10) . '.' . $file_ext;
                        $uploaded_image = "image/" . $unique_image;
                        $move_image     = "../image/" . $unique_image;

                        $file_name1 = $_FILES['video']['name'];
                        $file_size1 = $_FILES['video']['size'];
                        $file_temp1 = $_FILES['video']['tmp_name'];

                        $div1            = explode('.', $file_name1);
                        $file_ext1       = strtolower(end($div1));
                        $unique_video    = substr(md5(time()), 0, 10) . '.' . $file_ext1;
                        $uploaded_video  = "videos/demo/" . $unique_video;
                        $move_video      = "../videos/demo/" . $unique_video;

                        if (empty($short_description)) {
                            echo "<span class='error'>Field Must Not be Empty</span>";
                        } elseif (empty($file_ext) && empty($file_ext1)) {
                            $sql = "UPDATE courses  
                SET
                course_title        = '$course_title',
                category_id         = '$category_id',
                price               = '$price',
                discount            = '$discount',
                hours               = '$hours',
                short_description   = '$short_description',
                description         = '$description'
                WHERE course_id     =  $editid";

                            if ($con->query($sql) === TRUE) {
                                move_uploaded_file($file_temp, $move_image);
                                echo "<span class='success'>New record created successfully</span>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $con->error;
                            }
                        } elseif (!empty($file_ext) && empty($file_ext1)) {
                            $sql = "UPDATE courses  
                SET
                course_title        = '$course_title',
                category_id         = '$category_id',
                price               = '$price',
                discount            = '$discount',
                hours               = '$hours',
                short_description   = '$short_description',
                description         = '$description',
                banner              = '$uploaded_image'
                WHERE course_id     =  $editid";

                            if ($con->query($sql) === TRUE) {
                                move_uploaded_file($file_temp, $move_image);
                                echo "<span class='success'>Updated successfully!</span>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $con->error;
                            }
                        } elseif (empty($file_ext) && !empty($file_ext1)) {
                            $sql = "UPDATE courses  
                SET
                course_title        = '$course_title',
                category_id         = '$category_id',
                price               = '$price',
                discount            = '$discount',
                hours               = '$hours',
                short_description   = '$short_description',
                description         = '$description',
                demo_video          = '$uploaded_video'
                WHERE course_id     =  $editid";

                            if ($con->query($sql) === TRUE) {
                                move_uploaded_file($file_temp1, $move_video);
                                echo "<span class='success'>Updated successfully!</span>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $con->error;
                            }
                        } else {
                            $sql = "UPDATE courses  
                SET
                course_title        = '$course_title',
                category_id         = '$category_id',
                price               = '$price',
                discount            = '$discount',
                hours               = '$hours',
                short_description   = '$short_description',
                description         = '$description',
                banner              = '$uploaded_image',
                demo_video          = '$uploaded_video'
                WHERE course_id     =  $editid";

                            if ($con->query($sql) === TRUE) {
                                move_uploaded_file($file_temp, $move_image);
                                move_uploaded_file($file_temp1, $move_video);
                                echo "<span class='success'>Updated successfully!</span>";
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
                                        <option <?php echo ($value['category_id'] == $catvalue['cat_id']) ? "selected" : ""; ?> value="<?php echo $catvalue['cat_id'] ?>"><?php echo $catvalue['cat_name'] ?></option>
                                    <?php }  ?>
                                </select>
                                <label for="inputFirstName">Select Category</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input required class="form-control" value="<?php echo $value['course_title'] ?>" type="text" name="course_title" />
                                <label for="inputFirstName">Course Title</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input required class="form-control" value="<?php echo $value['price'] ?>" type="number" name="price" />
                                <label for="inputLastName">Price</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="discount" required min="0" max="100" class="form-control" id="inputFirstName" type="number" value="<?php echo $value['discount'] ?>" />
                                <label for="inputFirstName">Discount</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="hours" class="form-control" value="<?php echo $value['hours'] ?>" type="number" />
                                <label for="inputLastName">Hours</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="video" class="form-control" type="file" accept="video/*" placeholder="Enter your last name" />
                                <label for="inputFirstName">Video</label>
                                <div>
                                    <video width="300" height="250" controls>
                                        <source src="../<?php echo $value['demo_video']; ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="image" class="form-control" type="file" accept="image/*" placeholder="Enter your last name" />
                                <label for="inputFirstName">Image</label>
                                <div>
                                    <img src="../<?php echo $value['banner']; ?>" style="height: 100px;" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <textarea name="short_description" class="form-control" type=""> <?php echo $value['short_description'] ?> </textarea>
                                <label for="inputFirstName">Short Description</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <textarea name="description" class="form-control" id="inputFirstName" type="" placeholder="description"><?php echo $value['description'] ?> </textarea>
                                <label for="inputFirstName">Description</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button class="btn btn-primary btn-block" type="submit" name="submit">Update Course</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
<?php include 'footer.php'; ?>