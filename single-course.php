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

<style>
.star-rating {
    display:flex;
    flex-direction: row-reverse;
    font-size:1.5em;
    justify-content:space-around;
    padding:0 .2em;
    text-align:center;
    width:5em;
}

.star-rating input {
    display:none;
}

.star-rating label {
    color:#ccc;
    cursor:pointer;
}

.star-rating :checked ~ label {
    color:#f90;
}

.star-rating label:hover,
.star-rating label:hover ~ label {
    color:#fc0;
}

</style>

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
                        <h3 style="font-family: Cambria;">Course Details</h3>
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
                            <h4 style="font-family: cambria;"><strong> Click This Image to Watch Our Course Demo! </strong></h4>
                            <div class="image-wrap entry">
                                <div onclick="this.nextElementSibling.style.display='block'; this.style.display='none'">
                                    <img src="<?php echo  $value['banner'];?>" style="cursor:pointer"/>
                                </div>
                                <div style="display:none">
                                    <video width="500" height="350" controls>
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
                                <li> Total Enrolled: <?php echo $enroll_count; ?></li>
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
                            <li><a data-toggle="tab" href="#menu2">Reviews</a></li>
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
                                <div class="col-md-6">
                                <h3>Leave a review...</h3>

                                <?php                             
                                if(isset($_POST['submit'])){          
                                    $rating      = mysqli_real_escape_string($con,$_POST['rating']); 
                                    $customer_id = mysqli_real_escape_string($con,$_POST['customer_id']); 
                                    $review      = mysqli_real_escape_string($con,$_POST['review']);
                                    
                                    if (empty($rating) || empty($review)) {
                                        echo "<span class='error'>Field Must Not be Empty</span>"; 
                                    } else {                                      
                                        $sql = "INSERT INTO review(rating, review, course_id, customer_id) VALUES ('$rating', '$review', '$courseid', '$customer_id')";
                                        if ($con->query($sql) === TRUE) {
                                            echo "<span class='success'>New Record Created Successfully!</span>";
                                        } else {

                                            echo "Error: " . $sql . "<br>" . $con->error;
                                        }
                                    }
                                } 
                                if(isset($_SESSION['active']) == 'active'){
                                    $customer_id =  $_SESSION['user_id'];
                                    $query = "SELECT * FROM review where customer_id = $customer_id AND course_id = $courseid";
                                    $result = $con->query($query);
                                    if($result->num_rows > 0){ }else{                                 
                                ?>   
                                <?php 
                               
								$query = "SELECT * FROM orders WHERE course_id = $courseid AND customer_id = $customer_id";
								$result = $con->query($query);
								if ($result->num_rows > 0) {
                                ?>
                                <form method="post" action="">                                   
                                    <div class="row">
                                        <input type="hidden" name="customer_id" value="<?php echo $customer_id ?>"/>
                                        <div class="col-md-6">
                                            <label for="rating">Your Rating</label>
                                            <div class="star-rating">
                                                <input type="radio" id="5-stars" name="rating" value="5" />
                                                <label for="5-stars" class="star">&#9733;</label>
                                                <input type="radio" id="4-stars" name="rating" value="4" />
                                                <label for="4-stars" class="star">&#9733;</label>
                                                <input type="radio" id="3-stars" name="rating" value="3" />
                                                <label for="3-stars" class="star">&#9733;</label>
                                                <input type="radio" id="2-stars" name="rating" value="2" />
                                                <label for="2-stars" class="star">&#9733;</label>
                                                <input type="radio" id="1-star" name="rating" value="1" />
                                                <label for="1-star" class="star">&#9733;</label>
                                            </div>                            
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                    
                                   <div class="row">
                                       <div class="col-md-6">                         
                                           <label for="review">Your Review</label>
                                           <textarea class="form-group" type="text" name="review" cols="50" rows="3" placeholder="Your review ..."></textarea>
                                       </div>              
                                   </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </div> 
                                    </div>   
                                </form>
                                <?php } } } ?>
                                </div>
                                
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <h3>Course Rating</h3>
                                    <form method="post" action="">                                  
                                        <div class="row">
                                            <?php
                                                $query = "SELECT * FROM review where course_id = $courseid";
                                                $result = $con->query($query);
                                                $rating = 0;
                                        
                                                foreach($result as $rat) {
                                                    $rating += $rat['rating'];
                                                }
                                                $hit = $result->num_rows;
                                                if($hit>0){
                                                    $count = round($rating/$hit);
                                                }else{
                                                    $count = 0;
                                                }                                  
                                            ?>
                                            <div class="col-md-6">
                                                <label for="">Rating: </label>
                                                <?php 
                                                for ($i=0; $i < $count; $i++) { 
                                                    echo '<span style="color: orange;" class="fa fa-star checked"></span>';
                                                } for ($i=0; $i < 5 - $count; $i++) { 
                                                    echo '<span style="color:#444;" class="fa fa-star"></span>';
                                                }                                       
                                                ?>                                   
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- end row -->
                        </div>                          
                    </div>
                </div><!-- end shop-extra -->
            </div><!-- end col-md-12 -->
                  

            <hr class="invis">
            <div class="related-products">
                <div class="text-widget">
                    <h3>Related Courses</h3>
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
                                <img src="<?php echo $data['banner'];?>" alt="" class="img-responsive">
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
                                        <li><a href="single-course.php?courseid=<?php echo $value['course_id'] ?>"><i class="fa fa-eye"></i> Course Details </a></li>
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