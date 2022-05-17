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

$create ="INSERT INTO orders (course_id, course_price, discount_price, enroll_at, customer_id, payment_type, account_no, ref) VALUES ('$course_id', '$course_price', '$discount_price', '$enroll_at', '$customer_id', '$payment_type', '$account_no', '$ref')";
$edit = $con->query($create);
if ($edit) {
    echo "<script>window.location='category.php';</script>";
}
}	
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
			<form action="" method="post">
				<table>
				<tr>
					<td>
					<input type="hidden" name="course_id" value="<?php echo $value['course_id']; ?>"/>
					<input type="hidden" name="customer_id" value="<?php echo $_SESSION['user_id']; ?>"/>
					</td>
				</tr>
				<tr>
					<td>Price:</td>
					<td>
					<input readonly type="text" name="course_price" value="<?php echo $value['price']; ?>"/>
					</td>
				</tr>
				
				<tr>
					<td>Discount:</td>
					<td>
					<input type="text" name="discount_price" value="<?php echo ($value['price'] - (($value['discount'] * $value['price']) / 100)); ?>"/>
					</td>
				</tr>
				<tr>
					<td>Payment Type:</td>
					<td>
                    <select name="payment_type" id="">
                             <option value="Bkash">Bkash</option>
                             <option value="Nagad">Nagad</option>
                             <option value="Rocket">Rocket</option>
                    </select>
					</td>
				</tr>
				<tr>
					<td>Account No:</td>
					<td>
					<input type="text" name="account_no"/>
					</td>
				</tr>
				<tr>
					<td>Reference:</td>
					<td>
					<input type="text" name="ref"/>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
				</table>
			<form>				
 			</div>

		</div>

<?php
	include 'footer.php';
?>		
