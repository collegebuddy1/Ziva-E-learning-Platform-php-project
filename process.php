<?php
include("db.php");
session_start();
$paymentMessage = '';


if(!empty($_POST['stripeToken'])){
    
	// get token and user details
    $stripeToken  = $_POST['stripeToken'];
    $customerName = $_POST['customerName'];

	$name = $_SESSION["userName"];
    $studentId = $_SESSION["userId"];
    $courseId = $_SESSION['courseId'];
	
    $customerCity = $_POST['customerCity'];
	$customergender = $_POST['gender'];
	$customerOccupation = $_POST['occupation'];
	
    $cardNumber = $_POST['cardNumber'];
    $cardCVC = $_POST['cardCVC'];
    $cardExpMonth = $_POST['cardExpMonth'];
    $cardExpYear = $_POST['cardExpYear'];    
    
	//include Stripe PHP library
    require_once('stripe-payment-gateway-integration-php\stripe-php\init.php'); 
	
    //set stripe secret key and publishable key
    $stripe = array(
      "secret_key"      => "sk_test_51MIsftFc5kniAJPcHzIJ5XbQWvmfRY68ywYOe60IJhOMoK2cAThpLkGwJnxJSLteNVgycpX7ygNkl7px2Ll4J3hW00mpb6gQmp",
      "publishable_key" => "pk_test_51MIsftFc5kniAJPcukV1p80TuXGGWGdyczj93TfqrJLZUg93DZI9WQrfpkHoPaVolrwJLcGxTSDqCdbbBpw8AFDz000CNXys5Z"
    );    
	
    \Stripe\Stripe::setApiKey($stripe['secret_key']);    
    
	//add customer to stripe
    $customer = \Stripe\Customer::create(array(
		'name' => $name,
		'description' => 'test description',
        // 'email' => $customerEmail,
        'source'  => $stripeToken,
		// 'gender ' => $customergender
    ));  
	
    // item details for which payment made
	$itemName = $_POST['item_details'];
	$itemNumber = $_POST['item_number'];
	$itemPrice = $_POST['price'];
	$totalAmount = $_POST['total_amount'];
	$currency = $_POST['currency_code'];
	$orderNumber = $_POST['order_number'];   
    
    // details for which payment performed
    $payDetails = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $totalAmount,
        'currency' => $currency,
        'description' => $itemName,
        'metadata' => array(
            'order_id' => $orderNumber
        )
    ));   
	
    // get payment details
    $paymenyResponse = $payDetails->jsonSerialize();
	
    // check whether the payment is successful
    if($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1){
        
		// transaction details 
        $amountPaid = $paymenyResponse['amount'];
        $balanceTransaction = $paymenyResponse['balance_transaction'];
        $paidCurrency = $paymenyResponse['currency'];
        $paymentStatus = $paymenyResponse['status'];
        $paymentDate = date("Y-m-d H:i:s");        
       
	   //insert tansaction details into database
       $check = "SELECT * FROM `course_enrollments` ce  WHERE  ce.student_id=$studentId and  ce.course_id=$courseId";
       
       $result =  mysqli_query($con, $check);
    //    echo $result;
       if($result->num_rows > 0){
        $_SESSION["message"]= "you can't enroll in course more than once";
       }
	  
		else{
        $sql = "INSERT INTO `course_enrollments`( `student_id`, `course_id`, `city`, `gender`, `payment_done`) 
        VALUES ('".$studentId."','".$courseId."','".$customerCity."','".$customergender."', '1')";

        // $sql1 = "INSERT INTO `payment`(`enroll_id`, `card_holder_name`, `card_no`, `cvc`, `card_expiry`) 
        // VALUES ('[value-3]','[value-4]','[value-5]','[value-6]');

	// 	mysqli_query($con, $insertData) or die("database error: ". mysqli_error($con));
       
	    
      
        $result = mysqli_query($con, $sql);
        $lastInsertId = mysqli_insert_id($con);
        
        $sql1 = "INSERT INTO `payment`(`enroll_id`, `card_holder_name`, `card_no`, `cvc`, `card_expiry`) 
        VALUES ('".$lastInsertId."','".$customerName."','".$cardNumber."','".$cardCVC."','".$cardExpYear."')";

        $result = mysqli_query($con, $sql1);
        
	   //if order inserted successfully
       $_SESSION["message"] = "successful";
            
    }
	   
    } else{
        $paymentMessage = "failed";
    }
} else{
    $paymentMessage = "failed";
}
$_SESSION["message"] =  $paymentMessage ;
echo '<script type="text/javascript">

    window.onload = function () { "alert({$paymentMessage}"); }

</script>';
sleep(3);
header('location:lesson.php');
