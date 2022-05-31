<?php 
    include 'header.php';
    include '../Controller/database.php';

//File Upload
if(isset($_POST['submit'])){
    $maxsize = 5242880; //5MB in bytes

    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
        $name = $_FILES['file']['name'];
        $target_dir = "videos/";
        $target_file = $target_dir.$name;

        //File Extension
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        //Valid File Extension
        $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");

        //Check Extension
        if(in_array($extension, $extensions_arr)){
            //check file size
            if($_FILES['file']['size'] >= $maxsize){
                $_SESSION['message'] ="Too Large! File must be less than 5MB.";
            } else {
                //upload file
                if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
                    //insert record
                    $sql = "INSERT INTO tbl_video(name, location) VALUES('".$name."', '".$target_file."')";
                    mysqli_query($con, $sql);

                    $_SESSION['message'] = "Uploaded Successfully!";
                }

            }

        } else {
            $_SESSION['message'] = "Invalid file extension.";
        }

    } else {
        $_SESSION['message'] = "Please select a file.";
    }
}
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
            <?php
                  if(isset($_SESSION['message'])){
                      echo $_SESSION['message'];
                      unset($_SESSION['message']);
                  }
                    
            ?>
            <form action="" method="post" enctype="multipart/form-data">

                <input type="file" name="file">
                <input type="submit" name="submit" value="upload">
            </form>
        </div>
    </div>

    <div style="height: 100vh"></div>

</div>
</main>
<?php include 'footer.php'; ?>

