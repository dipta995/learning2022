<?php 
include 'header.php'; 
if (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $DELquery ="DELETE FROM categories WHERE cat_id = $delid";
      $delete = $con->query($DELquery);
      if ($delete) {
          echo "<script>window.location='category.php';</script>";
      }
}
if (isset($_GET['editid']) && isset($_POST['edit'])) {
  
   
    $editid = $_GET['editid'];
    $catname = $_POST['cat_name'];
    $editquery ="UPDATE categories  
    SET
    cat_name       = '$catname'
    WHERE cat_id = $editid";
    $edit = $con->query($editquery);
    if ($edit) {
        echo "<script>window.location='category.php';</script>";
    }
    
}
if (isset($_POST['create'])) {
    $catname = $_POST['cat_name'];
    $create ="INSERT INTO categories (cat_name)VALUES ('$catname')";
      $edit = $con->query($create);
      if ($edit) {
          echo "<script>window.location='category.php';</script>";
      }
}

        $query = "SELECT * FROM categories where is_active=0 Order By cat_id desc";
        $result = $con->query($query);
?>
<main>

    <div class="container-fluid px-4">
    <h1 class="mt-4">Create Category <a class="btn btn-info" href="category.php">Categories</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Categories</li>
        </ol>
        <div class="row">
            <div class="col-md-8">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                foreach ($result as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $value['cat_name']; ?></td>
                                <td>
                                    <a class="btn btn-info" href="?editid=<?php echo $value['cat_id']; ?>">Edit</a> 
                                    <a class="btn btn-danger" href="?delid=<?php echo $value['cat_id']; ?>">Delete</a> 
                                </td>
                            </tr>
                           
                            <?php } } ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card-body col-md-4">
                <p cla ss="mt-4">Create New Category</p>
                <?php
                
                if (isset($_GET['editid']) && !empty($_GET['editid'])) {
                    $editid=$_GET['editid'];
                    $singlecatquery = "SELECT * FROM categories WHERE cat_id=$editid";
                    $getsinglecat = $con->query($singlecatquery);
                    if ($getsinglecat->num_rows > 0) {
                      $catvalue = mysqli_fetch_array($getsinglecat);
                  }
                ?>
            <form method="post" action="">
                <div class="form-floating">
                    <input class="form-control"  type="text" value="<?php echo $catvalue['cat_name']; ?>" name="cat_name" />
                    <label for="inputEmail">Category Name</label>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button class="btn btn-primary" type="submit" name="edit">Create</button>
                </div>
            </form> 
            <?php } else{?>
                <form method="post" action="">
                <div class="form-floating">
                    <input class="form-control" id="inputEmail" type="text" placeholder="" name="cat_name" />
                    <label for="inputEmail">Category Name</label>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button class="btn btn-primary" type="submit" name="create">Create</button>
                </div>
            </form> 
            <?php } ?>
            </div>
        </div>

        <div style="height: 100vh"></div>

    </div>
</main>
<?php include 'footer.php'; ?>