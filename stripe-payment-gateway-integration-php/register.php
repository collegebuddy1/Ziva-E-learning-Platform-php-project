<?php 
session_start();
include('include/header.php');
?>
<title>Stripe Payment Gateway Integration in PHP</title>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-creditcardvalidator/1.0.0/jquery.creditCardValidator.js"></script>
<script type="text/javascript" src="script/payment.js"></script>
<?php include('include/container.php');?>
<div class="container">	
	<div class="row">	
		<h2>Course Registeration Form</h2>	

		<?php 
		if(isset($_SESSION["message"]) && $_SESSION["message"] && $_SESSION["message"] == 'failed') {
		?>			
			<div class="alert alert-danger">
			  <?php 
			  echo "Error : Payment failed!"; 
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
		<div class="panel panel-default">			
			<div class="panel-heading">Registeration Process</div>
			<div class="panel-body">
				<form action="process.php" method="POST" id="paymentForm">	
					<div class="row">
						<div class="col-md-8" style="border-right:1px solid #ddd;">
							<h4 align="center">Student Details</h4>
							<div class="form-group">
								<label><b>Card Holder Name <span class="text-danger">*</span></b></label>
								<input type="text" name="customerName" id="customerName" class="form-control" value="">
								<span id="errorCustomerName" class="text-danger"></span>
							</div>
							
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label><b>City <span class="text-danger">*</span></b></label>
										<input type="text" name="customerCity" id="customerCity" class="form-control" value="">
										<span id="errorCustomerCity" class="text-danger"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label><b>Phone Number <span class="text-danger">*</span></b></label>
										<input type="tel" name="phoneNo" id="phoneNo" class="form-control" value="">
										<span id="errorCustomerCity" class="text-danger"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
									<label for="gender">Gender</label>
										<select name="gender" id="gender">
											<optgroup label="Gender">
											<option value="male">Male</option>
											<option value="female">Female</option>
											</optgroup>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
									<label for="occuupation">Ocuupation</label>
										<select name="occuupation" id="occupation">
											<optgroup label="Occupation">
											<option value="student">Student</option>	
											</optgroup>
										</select>
									</div>
								</div>
							</div>
							<hr>
							<h4 align="center">Payment Details</h4>
							<div class="form-group">
								<label>Card Number <span class="text-danger">*</span></label>
								<input type="text" name="cardNumber" id="cardNumber" class="form-control" placeholder="1234 5678 9012 3456" maxlength="20" onkeypress="">
								<span id="errorCardNumber" class="text-danger"></span>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Expiry Month</label>
										<input type="text" name="cardExpMonth" id="cardExpMonth" class="form-control" placeholder="MM" maxlength="2" onkeypress="return validateNumber(event);">
										<span id="errorCardExpMonth" class="text-danger"></span>
									</div>
									<div class="col-md-4">
										<label>Expiry Year</label>
										<input type="text" name="cardExpYear" id="cardExpYear" class="form-control" placeholder="YYYY" maxlength="4" onkeypress="return validateNumber(event);">
										<span id="errorCardExpYear" class="text-danger"></span>
									</div>
									<div class="col-md-4">
										<label>CVC</label>
										<input type="text" name="cardCVC" id="cardCVC" class="form-control" placeholder="123" maxlength="4" onkeypress="return validateNumber(event);">
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
							<input type="button" name="payNow" id="payNow" class="btn btn-success btn-sm" onclick="stripePay(event)" value="Pay Now" />
							</div>
							<br>
						</div>
						<!-- <div class="col-md-4">
							<h4 align="center">Order Details</h4>
							<div class="table-responsive" id="order_table">
								<table class="table table-bordered table-striped">
									<tbody>
										<tr>  
											<th>Product Name</th>  
											<th>Quantity</th>  
											<th>Price</th>  
											<th>Total</th>  
										</tr>
										<tr>
											<td><strong>Jeans</strong></td>
											<td>1</td>
											<td align="right">$ 500.00</td>
											<td align="right">$ 500.00</td>
										</tr>
										<tr>  
											<td colspan="3" align="right">Total</td>  
											<td align="right"><strong>$ 500.00</strong></td>
										</tr>
									</tbody>
								</table>									
							</div>
						</div> -->
					</div>
				</form>
			</div>
		</div>			
	</div>		
</div>
<?php include('include/footer.php');?>

