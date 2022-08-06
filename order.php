<?php 
include 'header.php'; 

if(isset($_SESSION['active']) == 'active'){
    $customer_id =  $_SESSION['user_id'];
}else{
    echo "<script>window.location='auth.php';</script>";

}

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
    $payment_no = $_POST['payment_no'];
    $account_no = $_POST['account_no'];
    $ref = $_POST['ref'];	
	$enroll_at = date('Y-m-d g:i a');		
	if (strlen($account_no) != 11) {
		echo "Account Number must be 11 Digits";
	}elseif (!preg_match("/^(?:\\+88|88)?(01[3-9]\\d{8})/", $account_no)) {
		echo "Account number is not valid!";
	}elseif (strlen($ref) >8) {
		echo "Ref Number maximum 8 digit";
	}else{
		$create ="INSERT INTO orders (course_id, course_price, discount_price, enroll_at, customer_id, payment_type, payment_no, account_no, ref) VALUES ('$course_id', '$course_price', '$discount_price', '$enroll_at', '$customer_id', '$payment_type', '$payment_no', '$account_no', '$ref')";
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

<!-- jQuery Library -->
<script src="js\jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("#type").change(function () {
        var val = $(this).val();
        if (val == "Bkash") {
            $("#number").html("<option value='01458756873'>01458756873</option>");
        } else if (val == "Nagad") {
            $("#number").html("<option value='01458756873'>01458756873</option>");
        } else if (val == "Rocket") {
            $("#number").html("<option value='01458756873'>01458756873</option>");
        } else {
            $("#number").html("<option value=''> SELECT PAYMENT TYPE </option>");
        }
    });
});
</script>

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
								<input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>"/>
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
							<select class="form-control" name="payment_type" id="type">
								<option> PAYMENT TYPE </option>
								<option value="Bkash">Bkash</option>
								<option value="Nagad">Nagad</option>
								<option value="Rocket">Rocket</option>
							</select>
						</div>

						<div class="form-group">
						<label>PAYMENT NUMBER</label>
							<select class="form-control" name="payment_no" id="number">
								<option value=""> SELECT PAYMENT TYPE </option>
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
