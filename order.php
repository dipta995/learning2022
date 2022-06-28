<?php 
include 'header.php'; 
if (isset($_GET['courseid'])) {
    $courseid = $_GET['courseid'];
}else{
    header ('Location:index.php');
}

$query = "SELECT * FROM courses WHERE course_id = $courseid";
$result = $con->query($query);
$value = mysqli_fetch_array($result);		
if(isset($_POST['submit']))	{
    $course_id = $_POST['course_id'];
    $course_price = $_POST['course_price'];
    $discount_price = $_POST['discount_price'];
    $enroll_at = $_POST['enroll_at'];
    $customer_id = $_POST['customer_id'];
    $payment_type = $_POST['payment_type'];
    $account_no = $_POST['account_no'];
    $ref = $_POST['ref'];			
	if (strlen($account_no) < 11) {
		echo "Account Number minimum 11 digit";
	}elseif (strlen($account_no) >12) {
		echo "Account Number maximum 12 digit";
	  }elseif (strlen($ref) >8) {
		echo "Ref Number maximum 8 digit";
	  }else{
		$create ="INSERT INTO orders (course_id, course_price, discount_price, enroll_at, customer_id, payment_type, account_no, ref) VALUES ('$course_id', '$course_price', '$discount_price', '$enroll_at', '$customer_id', '$payment_type', '$account_no', '$ref')";
		$edit = $con->query($create);
		if ($edit) {
			echo "<script>window.location='my-courses.php';</script>";
		}
	  }

}	
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
						<h3>Purchase Course</h3>
					</div>
				</div><!-- end col -->
				<div class="col-md-6 text-right">
					<ul class="breadcrumb">
						<li><a href="javascript:void(0)">Edulogy</a></li>
						<li class="active">Order</li>
					</ul>
				</div>
			</div><!-- end row -->
					
			<div class="row blog-grid">
				<div class="col-md-2"></div>
				<form class="form-group col-md-8" action="" method="post">
					<table>
						<div class="form-group">
							<td>
								<input type="hidden" name="course_id" value="<?php echo $value['course_id']; ?>"/>
								<input type="hidden" name="customer_id" value="<?php echo $customer_id = $_SESSION['user_id']; ?>"/>
							</td>
						</div>

						<div class="form-group">
							<label>PRICE</label>
							<input class="form-control" readonly type="text" name="course_price" value="<?php echo $value['price']; ?>"/>
						</div>
					
						<div class="form-group">
							<label>DISCOUNT</label>
							<input class="form-control" type="text" readonly name="discount_price" value="<?php echo ($value['price'] - (($value['discount'] * $value['price']) / 100)); ?>"/>
						</div>

						<div class="form-group">
							<label>PAYMENT TYPE</label>
							<select class="form-control" name="payment_type" id="">
								<option value="Bkash">Bkash</option>
								<option value="Nagad">Nagad</option>
								<option value="Rocket">Rocket</option>
							</select>					
						</div>

						<div class="form-group">
							<label>ACCOUNT NO</label>
							<input class="form-control" type="text" name="account_no"/>
						</div>

						<div class="form-group">
							<label>REFERENCE</label>
							<input class="form-control" type="text" name="ref"/>						
						</div>

						
							<td></td>
							<?php
								$query = "SELECT * FROM orders WHERE course_id = $courseid AND customer_id = $customer_id";
								$result = $con->query($query);
								if ($result->num_rows > 0) {
							?>
							<td>
								<strong class="text-danger">Already Enrolled! Please Visit <a href="my-courses.php">Here</a></strong>
							</td>
							<?php }else{ ?>
							<td>
								<input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
							</td>
							<?php } ?>
						</tr>
					
					</table>
				<form>				
			</div>
		</div>
	</div>
</section>

<?php
	include 'footer.php';
?>		
