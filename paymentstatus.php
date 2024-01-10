<?php 
require("functions.php");
session_start();

include('stripe-payment-gateway-integration-php\include\header.php');
?>

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/payment2.png" alt="courses" class="img-fluid" style="object-fit:cover; box-shadow:10px; height:400px;
		 width:100%"/>
    </div>
</div>
<title>Course Payment</title>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-creditcardvalidator/1.0.0/jquery.creditCardValidator.js"></script>
<script type="text/javascript" src="script/payments.js"></script>
<style>
    .main-btn {
    font-size: 2rem;
    font-weight: 500;
    color:  #374785;
    text-transform: uppercase;
    background-color:cornflowerblue ;

    border: .0625rem solid  #374785;
    padding: 1.375rem 4.875rem;
    border-radius: 4.125rem;
    line-height: 1.75rem;
    display: inline-block;
    transition: all 0.3s ease-out 0s;
}
.main-btn:hover {
    background-color: #374785;
    border-color:  #374785;
    color: white;
}
</style>

 <?php 
//  include('./stripe-payment-gateway-integration-php/include/container.php');?> 
 

<div class="container">	
	<div class="row">	
		

		<?php 
		if(!isset($_GET['id'])){
			

			redirect("course.php");

		}
		$courseData = filteration($_GET);
		$res = select("SELECT * FROM `courses` WHERE course_id=?",[$courseData["id"]],"i");
		
		if(mysqli_num_rows($res)==0){
			// redirect("course.php");
		}
		
		$data = mysqli_fetch_assoc($res);
		$_SESSION['courseId'] = $data["course_id"];
		if(isset($_SESSION["message"]) && $_SESSION["message"] && $_SESSION["message"] == 'failed') {
		?>			
			<div class="alert alert-danger">
			  <?php 
			  echo  $_SESSION["message"]; 
			  $_SESSION["message"] = '';
			  ?>
			</div>
		<?php 
		} elseif(isset($_SESSION["message"]) && $_SESSION["message"]) {
		?>
			<div class="alert alert-success">
			  <?php 
			  echo $_SESSION["message"]; 
			  $_SESSION["message"] = '';
			  ?>
			</div>
		<?php } ?>
		<div class="panel   panel-info" style="padding-top: 50px;" >			
			<div class="panel-heading" style="text-align: center; color:#243475; "><h1>Course Registeration & Payment Form</h1>	</div>
			<div class="panel-body" style="padding-left:300px; text-align:center;">
				<form action="process.php" method="POST" id="paymentForm">	
					<div class="row" >
						<div class="col-md-8">
							<h2 align="center">Student Details</h2>
							<div class="form-group" style= "padding-bottom:20px;">
								<label style="font-size:19px"><b>Card Holder Name <span class="text-danger">*</span></b></label>
								<input type="text" name="customerName" id="customerName" class="form-control" value="" placeholder="Card Holder Name" required>
								<span id="errorCustomerName" class="text-danger"></span>
							</div>
							
							<div class="row" style="padding-bottom: 40px;">
								<div class="col-sm-12" >
									<div class="form-group" style= "padding-bottom:20px;">
										<label style="font-size:19px"><b>City <span class="text-danger">*</span></b></label>
										<input type="text" name="customerCity" id="customerCity" class="form-control" value="" required>
										<span id="errorCustomerCity" class="text-danger"></span>
									</div>
								</div>
						
								<div class="col-sm-6">
									<div class="form-group" style= "padding-bottom:8px;">
									<label style="font-size:19px" for="gender">Gender</label>
										<select name="gender" id="gender">
											<optgroup label="Gender">
											<option value="male">Male</option>
											<option value="female">Female</option>
											</optgroup>
										</select>
									</div>
								</div>
                                <div class="col-sm-6">
									<div class="form-group" style= "padding-bottom:8px;">
									<label style="font-size:19px" for="occupation">Ocuupation</label>
										<select name="occupation" id="occupation">
											<optgroup label="occupation">
											<option value="student">Student</option>	
											</optgroup>
										</select>
									</div>
								</div>
							</div>
							<div style="  border: ridge gray 0.5px;;"></div>
			
							<h2 align="center" style="padding-top: 20px;">Payment Details</h2>
							<div class="form-group" style= "padding-bottom:20px;">
								<label style="font-size:19px">Card Number <span class="text-danger">*</span></label>
								<input type="text" name="cardNumber" id="cardNumber" class="form-control" placeholder="1234 5678 9012 3456" maxlength="20" onkeypress="">
								<span id="errorCardNumber" class="text-danger"></span>
							</div>
							<div class="form-group" style= "padding-bottom:20px;">
								<div class="row">
									<div class="col-md-4">
										<label style="font-size:19px">Expiry Month</label>
										<input type="text" name="cardExpMonth" id="cardExpMonth" class="form-control" placeholder="MM" maxlength="2" onkeypress="return validateNumber(event);">
										<span id="errorCardExpMonth" class="text-danger"></span>
									</div>
									<div class="col-md-4">
										<label style="font-size:19px">Expiry Year</label>
										<input type="text" name="cardExpYear" id="cardExpYear" class="form-control" placeholder="YYYY" maxlength="4" onkeypress="return validateNumber(event);">
										<span id="errorCardExpYear" class="text-danger"></span>
									</div>
									<div class="col-md-4">
										<label style="font-size:19px">CVC</label>
										<input type="text" name="cardCVC" id="cardcVC" class="form-control" placeholder="123" maxlength="3" onkeypress="return validateNumber(event);" required>
										<span id="errorCardCvc" class="text-danger"></span>
									</div>
								</div>
							</div>
							<br>
							<div align="center">
							<input type="hidden" name="price" value="500">
							<input type="hidden" name="total_amount" value="500">
							<input type="hidden" name="currency_code" value="USD">
							<input type="hidden" name="item_details" value="Jeans">
							<input type="hidden" name="item_number" value="TS1234567">
							<input type="hidden" name="order_number" value="SKA987654321">
							
							<a class="main-btn" href="course.php" value="Back">
                                Back
                                </a>
                            <input type="button" name="payNow" id="payNow" class="main-btn" onclick="stripePay(event)" value="Pay Now" />
							
                            </div>
							<br>
						</div>
				
							
					</div>
				</form>
			</div>
		</div>			
	</div>		
</div>
<!-- <?php include('include/footer.php');?> -->

