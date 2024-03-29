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
                $key = $_GET['search'];
                $query = "SELECT * FROM courses left join categories on categories.cat_id = courses.category_id where courses.is_active = 0 and course_title LIKE '%$key%' OR short_description LIKE '%$key%' OR description LIKE '%$key%' Order By course_id DESC";
                $result = $con->query($query);
                if ($result->num_rows > 0) {
                    foreach ($result as  $value) {
                ?>
                        <div class="col-md-4">
                            <div class="course-box">
                                <div class="image-wrap entry">
                                    <img style="width: 333px; height:250px;" src="<?php echo  $value['banner']; ?>" alt="" class="img-responsive">
                                    <div class="magnifier">
                                        <a href="single-course.php?courseid=<?php echo $value['course_id']; ?>" title=""><i class="flaticon-add"></i></a>
                                    </div>
                                </div><!-- end image-wrap -->
                                <div class="course-details">
                                    <h4>
                                        <small><?php echo  $value['cat_name']; ?></small>
                                        <a href="single-course.php?courseid=<?php echo $value['course_id'] ?>" title=""><?php echo  $value['course_title']; ?></a>
                                    </h4>
                                    <p><?php echo  $value['short_description']; ?></p>
                                </div><!-- end details -->
                                <div class="course-footer clearfix">
                                    <div class="pull-left">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fa fa-user"></i> 21</a></li>
                                            <li><a href="#"><i class="fa fa-clock-o"></i> <?php echo  $value['hours']; ?> Min.</a></li>
                                            <li><a href="#">৳ <?php echo round($value['price'] - (($value['price'] * $value['discount']) / 100)); ?></a></li>
                                        </ul>
                                    </div><!-- end left -->
                                </div><!-- end footer -->
                            </div><!-- end box -->
                        </div>
                <?php }
                } ?>

                <!-- end col -->




            </div><!-- end row -->

            <hr class="invis">

          
        </div><!-- end boxed -->
    </div><!-- end container -->
</section>
<?php include 'footer.php'; ?>