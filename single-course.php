<?php 
include 'header.php'; 
if (isset($_GET['courseid'])) {
    $courseid = $_GET['courseid'];
}else{
    header ('Location:index.php');
}
$orderque = "SELECT * FROM orders where course_id = $courseid";
$resultdata = $con->query($orderque);
$enroll_count = $resultdata->num_rows;
$query = "SELECT * FROM courses LEFT JOIN categories ON categories.cat_id = courses.category_id WHERE course_id = $courseid";
$result = $con->query($query);
$value = mysqli_fetch_array($result);

$catid = $value['category_id'];
?>

<section class="section db p120">
    <div class="container">
    </div><!-- end container -->
</section><!-- end section -->

<section class="section gb nopadtop">
    <div class="container">
        <div class="boxed boxedp4">
            <div class="row">
                <div class="col-md-6">
                    <div class="tagline-message page-title">
                        <h3>Single Courses</h3>
                    </div>
                </div><!-- end col -->
                <div class="col-md-6 text-right">
                    <ul class="breadcrumb">
                        <li><a href="javascript:void(0)">Edulogy</a></li>
                        <li class="active">Course</li>
                    </ul>
                </div>
            </div><!-- end row -->
        
            <div class="row blog-grid">
                <div class="col-md-6 shop-media">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="image-wrap entry">
                                <div onclick="this.nextElementSibling.style.display='block'; this.style.display='none'">
                                    <img src="<?php echo  $value['banner'];?>" style="cursor:pointer" />
                                </div>
                                <div style="display:none">
                                    <video width="550" height="350" controls>
                                    <source src="<?php echo $value['demo_video']; ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                    </video>
                                </div>
                                <!-- <img src="<?php echo  $value['banner'];?>" alt="" class="img-responsive"> -->
                                        
                            </div><!-- end image-wrap -->
                        </div>
                    </div><!-- end row -->
                    <hr class="invis">  
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="shop-desc">
                        <h3><?php echo $value['course_title']; ?></h3>
                        <small><?php echo $value['price']; ?> Taka</small>
                        <p><?php echo $value['short_description']; ?></p>
                        <div class="shop-meta">
                            <a href="order.php?courseid=<?php echo $value['course_id']; ?>" class="btn btn-primary">Enroll Now</a>
                            <ul class="list-inline">
                                <li> Total Enrolled: <?php echo $enroll_count ?></li>
                                <li>Categories: <a href="#"><?php echo $value['cat_name']; ?></a>
                            </ul>
                        </div><!-- end shop meta -->
                    </div><!-- end desc -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis">
            <div class="row">   
                <div class="col-md-12">
                    <div class="shop-extra">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Description</a></li>
                            <li><a data-toggle="tab" href="#menu1">Additional Information</a></li>
                            <li><a data-toggle="tab" href="#menu2">Reviews (2)</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <p>
                                <?php echo $value['description']; ?>
                                </p>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <h3>Additional Information</h3>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><strong>Time</strong></td>
                                            <td><?php echo $value['hours']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Published At</strong></td>
                                            <td><?php echo $value['created_at']; ?></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>Reviews</h3>

                                <p>Your email address will not be published. Required fields are marked *</p>

                                <div class="rating">
                                    <p>Your Rating</p>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>

                                <hr class="invis">
                            
                                <form class="big-contact-form row" role="search">
                                    <div class="col-md-12">
                                        <textarea class="form-control" placeholder="Your reviews.."></textarea>
                                    </div>              
                                    <div class="col-md-6">   
                                        <input type="text" class="form-control" placeholder="Enter your name..">
                                    </div>     
                                    <div class="col-md-6">   
                                        <input type="email" class="form-control" placeholder="Enter email..">
                                    </div>             
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>              
                                </form>
                            </div>
                        </div>
                    </div><!-- end shop-extra -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis">
            <div class="related-products">
                <div class="text-widget">
                    <h3>Related Products</h3>
                </div><!-- end title -->        
    
                <div class="row blog-grid shop-grid">
                <?php
                    $sql = "SELECT * FROM courses left join categories on categories.cat_id = courses.category_id where courses.is_active = 0 
                    AND courses.category_id = '$catid'  order by rand() limit 4";
                    $getdata = $con->query($sql);
                    if ($getdata->num_rows > 0) {
                        foreach ($getdata as $key => $data) {
                ?>
                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="<?php echo  $data['banner'];?>" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="single-course.php?courseid=<?php echo $value['course_id'] ?>" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="single-course.php?courseid=<?php echo $value['course_id'] ?>" title=""><?php echo  $data['course_title'];?></a>
                                    <small><?php echo  $data['cat_name'];?></small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i> Add To Cart</a></li>
                                    </ul>
                                </div><!-- end left -->
    
                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#"><?php echo  $data['price'];?> Taka</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div>
                    <?php  } } ?>
                    
                </div><!-- end row -->
            </div><!-- end related --> 

        </div><!-- end boxed boxedp4 -->
    </div><!-- end container -->
</section>
<?php include 'footer.php'; ?>