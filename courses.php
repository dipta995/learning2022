<?php include 'header.php'; ?>
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    
                    
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->

<section class="section gb nopadtop">
    <div class="container">
        <div class="boxed boxedp4">
            <div class="row blog-grid">
                <?php
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 12;
                $offset = ($pageno-1) * $no_of_records_per_page;

                // Check connection
                if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    die();
                }   
                
                $total_pages_sql = "SELECT COUNT(*) FROM courses left join categories on categories.cat_id = courses.category_id where courses.is_active = 0  Order By course_id DESC"; 
                $result = mysqli_query($con,$total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                $sqls = "SELECT * FROM courses left join categories on categories.cat_id = courses.category_id where courses.is_active = 0 LIMIT $offset, $no_of_records_per_page";
                ?>    

                <?php
                $res_data = mysqli_query($con,$sqls);
                if ($res_data->num_rows > 0) {
                    foreach ($res_data as $key => $value) {
                ?>

                <div class="col-md-4">
                    <div class="course-box">
                        <div class="image-wrap entry">
                        <img style="width: 333px; height:250px;" src="<?php echo  $value['banner'];?>" alt="" class="img-responsive">
                            <div class="magnifier">
                                    <a href="single-course.php?courseid=<?php echo $value['course_id']; ?>" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                        <div class="course-details">
                            <h4>
                                <small><?php echo  $value['cat_name'];?></small>
                                <a href="single-course.php?courseid=<?php echo $value['course_id'] ?>" title=""><?php echo  $value['course_title'];?></a>
                            </h4>
                            <p><?php echo  $value['short_description'];?></p>
                        </div><!-- end details -->
                        <div class="course-footer clearfix">
                            <div class="pull-left">
                                <ul class="list-inline">
                                    <li><a href="#"><i class="fa fa-user"></i> 21</a></li>
                                    <li><a href="#"><i class="fa fa-clock-o"></i> <?php echo  $value['hours'];?> Min.</a></li>
                                    <li><a href="#">৳ <?php echo round( $value['price']-(($value['price']*$value['discount'])/100));?></a></li>
                                </ul>
                            </div><!-- end left -->
                        </div><!-- end footer -->
                    </div><!-- end box -->
                </div><!-- end col -->
                <?php } } ?> 
        
            </div><!-- end row -->

            <hr class="invis">

            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="pagination ">                    
                        <li class="active"><a href="?pageno=1">&lt;</a></li>
                        <li class="active">
                        <?php
                        for ($i=1; $i <= $total_pages ; $i++) { ?>
                            <li><a href="?pageno=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php  } ?>
                            <a href=""></a>
                        </li>
                        <li><a href="?pageno=<?php echo $total_pages; ?>">&gt;</a></li>
                    </ul>                
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end boxed -->
    </div><!-- end container -->
</section>
<?php include 'footer.php'; ?>