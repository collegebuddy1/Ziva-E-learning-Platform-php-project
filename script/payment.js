Stripe.setPublishableKey('pk_test_51MIsftFc5kniAJPcukV1p80TuXGGWGdyczj93TfqrJLZUg93DZI9WQrfpkHoPaVolrwJLcGxTSDqCdbbBpw8AFDz000CNXys5Z');

function stripePay(event) {
    event.preventDefault(); 
    if(validateForm() == true) {
     $('#payNow').attr('disabled', 'disabled');
    //  $('#payNow').val('Payment Processing....');
     Stripe.createToken({
      number:$('#cardNumber').val(),
      cvc:$('#cardcVC').val(),
      exp_month : $('#cardExpMonth').val(),
      exp_year : $('#cardExpYear').val()
     }, stripeResponseHandler);
     return false;
    }
}

function stripeResponseHandler(status, response) {
 if(response.error) {
  $('#payNow').attr('disabled', false);
  $('#message').html(response.error.message).show();
 } else {
  var stripeToken = response['id'];
  $('#paymentForm').append("<input type='hidden' name='stripeToken' value='" + stripeToken + "' />");

  $('#paymentForm').submit();
 }
}

function validateForm() {
 var validCard = 0;
 var valid = false;
 var cardCVC = $('#cardcVC').val();
 var phoneNum = $('#phoneNo').val();
 var cardExpMonth = $('#cardExpMonth').val();
 var cardExpYear = $('#cardExpYear').val();
 var cardNumber = $('#cardNumber').val();
 var emailAddress = $('#emailAddress').val();
 var customerName = $('#customerName').val();
 var customerAddress = $('#customerAddress').val();
 var customerCity = $('#customerCity').val();
 var customerZipcode = $('#customerZipcode').val();
 var customerCountry = $('#customerCountry').val();
 var validateName = /^[a-z ,.'-]+$/i;
 var validateEmail = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
 var validateMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
 var validateYear = /^2023|2024|2025|2026|2027|2028|2029|2030|2031|2032|2033|2034$/;
 var validatePhone = /^\+(?:[0-9] ?){6,14}[0-9]$/
 var cvv_expression = /^[0-9]{3,3}$/;

 $('#cardNumber').validateCreditCard(function(result){
  if(result.valid) {
   $('#cardNumber').removeClass('require');
   $('#errorCardNumber').text('');
   validCard = 1;
  } else {
   $('#cardNumber').addClass('require');
   $('#errorCardNumber').text('Invalid Card Number');
   validCard = 0;
  }
});

 if(validCard == 1) {
  if((!validateMonth.test(cardExpMonth))){
   $('#cardExpMonth').addClass('require');
   $('#errorCardExpMonth').text('Enter Month(1-12)');
   valid = false;
  } else { 
   $('#cardExpMonth').removeClass('require');
   $('#errorCardExpMonth').text('');
   valid = true;
  }
  if(!validateYear.test(cardExpYear)){
   $('#cardExpYear').addClass('require');
   $('#errorCardExpYear').text('Enter a year');
   valid = false;
  } else {
   $('#cardExpYear').removeClass('require');
   $('#errorCardExpYear').text('');
   valid = true;
  }
  if(!cvv_expression.test(cardCVC)) {
    $('#cardcVC').addClass('require');
    $('#errorCardCvc').text('Invalid');
    valid = false;
   } else {
    $('#cardcVC').removeClass('require');
    $('#errorCardCvc').text('');
    valid = true;
   }
   
  if(!validateName.test(customerName)) {
    $('#customerName').addClass('require');
    $('#errorCustomerName').text('Invalid Name');
    valid = false;
   } else {
    $('#customerName').removeClass('require');
    $('#errorCustomerName').text('');
    valid = true;
   }
     
  if(!validatePhone.test(phoneNum)) {
   $('#phoneNo').addClass('require');
   $('#errorPhoneNo').text('Require');
   valid = false;
  } else {
   $('#phoneNo').removeClass('require');
   $('#errorPhoneNo').text('');
   valid = true;
  }

  if(customerCity == ''){
   $('#customerCity').addClass('require');
   $('#errorCustomerCity').text('Enter City');
   valid = false;
  } else {
   $('#customerCity').removeClass('require');
   $('#errorCustomerCity').text('');
   valid = true;
  }
 }
 return valid;
}


function validateNumber(event) {
 var charCode = (event.which) ? event.which : event.keyCode;
 if (charCode != 32 && charCode > 31 && (charCode < 48 || charCode > 57)){
  return false;
 }
 return true;
}