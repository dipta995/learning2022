<?php include 'header.php'; ?>

<section id="home" class="video-section js-height-full">
    <div class="overlay"></div>
    <div class="home-text-wrapper relative container">
        <div class="home-message">
            <p>Learning Management System</p>
            <small>Edulogy is the ideal choice for your organization, your business and your online education system. Create your online course now with unlimited page templates, color options, and menu features.</small>
            <div class="btn-wrapper">
                <div class="text-center">
                    <a href="#" class="btn btn-primary wow slideInLeft">Read More</a> &nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-default wow slideInRight">Buy Now</a>
                </div>
            </div><!-- end row -->
        </div>
    </div>
    <div class="slider-bottom">
        <span>Explore <i class="fa fa-angle-down"></i></span>
    </div>
</section>
  

<section class="section gb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Recent Courses</h3>
            <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
        </div><!-- end title -->

        <div id="owl-01" class="owl-carousel owl-theme owl-theme-01">
            <?php
                $query = "SELECT * FROM courses left join categories on categories.cat_id=courses.category_id where courses.is_active=0  Order By course_id desc limit 6";
                $result = $con->query($query);
                if ($result->num_rows > 0) {
                    foreach ($result as $key => $value) {
            ?>
            <div class="caro-item">
                <div class="course-box">
                    <div class="image-wrap entry">
                        <img style="width: 272px; height:250px;" src="<?php echo  $value['banner'];?>" alt="" class="img-responsive">
                        <div class="magnifier">
                                <a href="single-course.php?courseid=<?php echo $value['course_id'] ?>" title=""><i class="flaticon-add"></i></a>
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
                            </ul>
                        </div><!-- end left -->

                        <div class="pull-right">
                            <ul class="list-inline">
                                <li><a href="#">৳ <?php echo round( $value['price']-(($value['price']*$value['discount'])/100));?></a></li>
                            </ul>
                        </div><!-- end left -->
                    </div><!-- end footer -->
                </div><!-- end box -->
            </div><!-- end col -->
            <?php } }?>
            
        </div><!-- end row -->

        <hr class="invis">

        <div class="section-button text-center">
            <a href="courses.php" class="btn btn-primary">View All Courses</a>
        </div>
    </div><!-- end container -->
</section>

                            
<section class="section">
    <div class="container">
        <div class="section-title text-center">
            <h3>Testimonials</h3>
            <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-4">
                <div class="box testimonial">
                    <p class="testiname"><strong><img src="upload/testimonial_01.png" alt="" class="img-circle"> Jenny LUXURY</strong></p>
                    <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div><!-- end testimonial -->
            </div><!-- end col -->

            <div class="col-md-4">
                <div class="box testimonial">
                    <p class="testiname"><strong><img src="upload/testimonial_02.png" alt="" class="img-circle"> Martin LEO</strong></p>
                    <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </div><!-- end testimonial -->
            </div><!-- end col -->

            <div class="col-md-4">
                <div class="box testimonial">
                    <p class="testiname"><strong><img src="upload/testimonial_03.png" alt="" class="img-circle"> John DOE</strong></p>
                    <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div><!-- end testimonial -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<?php include 'footer.php'; ?>