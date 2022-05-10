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
                                     <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->
                            <div class="course-details">
                                <h4>
                                    <small><?php echo  $value['cat_name'];?></small>
                                    <a href="#" title=""><?php echo  $value['course_title'];?></a>
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

        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message text-center">
                            <h3>Howdy, we are Edulogy, we have brought together the best quality services, offers, projects for you!</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box m30">
                            <i class="flaticon-computer-tool-for-education"></i>
                            <h4>Learning system</h4>
                            <p>All sections required for online training are included to Edulogy.</p>
                            <a href="#" class="readmore">Read more</a>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="box m30">
                            <i class="flaticon-monitor-tablet-and-smartohone"></i>
                            <h4>Works all mobile devices</h4>
                            <p>The most important feature of this template is that it is compatible with all mobile devices. Your customers can also visit your site easily from tablets and phones.</p>
                            <a href="#" class="readmore">Read more</a>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-3">
                        <div class="box m30">
                            <i class="flaticon-download-business-statistics-symbol-of-a-graphic"></i>
                            <h4>User Dashboard</h4>
                            <p>We designed the design of all the sub-pages needed for the users.</p>
                            <a href="#" class="readmore">Read more</a>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="invis">

                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <i class="flaticon-html5"></i> <i class="flaticon-css-3"></i>
                            <h4>Compatible HTML5 & CSS3</h4>
                            <p>HTML5 is a markup language used for structuring and presenting content on the World Wide Web. It is the fifth and current version of the HTML standard.</p>
                            <a href="#" class="readmore">Read more</a>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="box">
                            <i class="flaticon-html-coding"></i>
                            <h4>Bootstrap Framework</h4>
                            <p>Bootstrap is a technique of loading a program into a computer by means of a few initial instructions which enable the introduction of the rest of the program from an input device.</p>
                            <a href="#" class="readmore">Read more</a>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <section class="section db">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="stat-count">
                            <h4 class="stat-timer">1230</h4>
                            <h3><i class="flaticon-black-graduation-cap-tool-of-university-student-for-head"></i> Happy Students</h3>
                            <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. </p>
                        </div><!-- stat-count -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-4">
                        <div class="stat-count">
                            <h4 class="stat-timer">331</h4>
                            <h3><i class="flaticon-online-course"></i> Course Done</h3>
                            <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. </p>
                        </div><!-- stat-count -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-4">
                        <div class="stat-count">
                            <h4 class="stat-timer">8901</h4>
                            <h3><i class="flaticon-coffee-cup"></i> Ordered Coffe's</h3>
                            <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. </p>
                        </div><!-- stat-count -->
                    </div><!-- end col -->
                </div><!-- end row -->
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

        <section class="section gb">
            <div class="container">
                <div class="section-title text-center">
                    <h3>Recent News</h3>
                    <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
                </div><!-- end title -->

                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="blog-box">
                            <div class="image-wrap entry">
                                <img src="upload/blog_01.jpeg" alt="" class="img-responsive">
                                <div class="magnifier">
                                     <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->

                            <div class="blog-desc">
                                <h4><a href="blog-single.html">How to learn perfect code with Javascript</a></h4>
                                <p>Praesent at suscipit ligula. Suspendisse pre neque, quis suscipit enim. sed maximus, mia auctor.</p>
                            </div><!-- end blog-desc -->

                            <div class="post-meta">
                                <ul class="list-inline">
                                    <li><a href="#">21 March 2017</a></li>
                                    <li><a href="#">by WP Destek</a></li>
                                    <li><a href="#">14 Share</a></li>
                                </ul>
                            </div><!-- end post-meta -->
                        </div><!-- end blog -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12">
                        <div class="blog-box">
                            <div class="image-wrap entry">
                                <img src="upload/blog_02.jpeg" alt="" class="img-responsive">
                                <div class="magnifier">
                                     <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->

                            <div class="blog-desc">
                                <h4><a href="blog-single.html">The most suitable web design & development tutorials</a></h4>
                                <p>Sed suscipit neque in erat posuere tristique aliquam porta vestibulum. Cras placerat tincidunt. </p>
                            </div><!-- end blog-desc -->

                            <div class="post-meta">
                                <ul class="list-inline">
                                    <li><a href="#">20 March 2017</a></li>
                                    <li><a href="#">by WP Destek</a></li>
                                    <li><a href="#">11 Share</a></li>
                                </ul>
                            </div><!-- end post-meta -->
                        </div><!-- end blog -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12">
                        <div class="blog-box">
                            <div class="image-wrap entry">
                                <img src="upload/blog_03.jpeg" alt="" class="img-responsive">
                                <div class="magnifier">
                                     <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->

                            <div class="blog-desc">
                                <h4><a href="blog-single.html">Design for all mobile devices! This is name "responsive"</a></h4>
                                <p>Suspendisse scelerisque ex ac mattis molestie vel enim ut massa placerat faucibus sed ut dui vivamus. </p>
                            </div><!-- end blog-desc -->

                            <div class="post-meta">
                                <ul class="list-inline">
                                    <li><a href="#">19 March 2017</a></li>
                                    <li><a href="#">by WP Destek</a></li>
                                    <li><a href="#">44 Share</a></li>
                                </ul>
                            </div><!-- end post-meta -->
                        </div><!-- end blog -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <section class="section bgcolor1">
            <div class="container">
                <a href="#">
                <div class="row callout">
                    <div class="col-md-4 text-center">
                        <h3><sup>$</sup>49.99</h3>
                        <h4>Start your awesome course today!</h4>
                    </div><!-- end col -->

                    <div class="col-md-8">
                        <p class="lead">Limited time offer! Your profile will be added to our "Students" directory as well. </p>
                    </div>
                </div><!-- end row -->
                </a>
            </div><!-- end container -->  
        </section>
<?php include 'footer.php'; ?>