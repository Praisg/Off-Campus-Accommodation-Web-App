<?php require_once('C:\xampp\htdocs\RealEstate\autoloader.php') ?>
<!DOCTYPE html>
<html>
<head>
<style>
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
  border: 1px solid;
}
.btn-success {
  background-color: #28a745;
  border-color: #28a745;
  color: white;
  text-align: center;
}
</style>
<script>
function handleClick() {
  alert('Button clicked!');
  <?php
    require_once('./paynow/vendor/autoload.php');

    $paynow = new Paynow\Payments\Paynow(
        '17312',
        '8d2a8cfd-fe95-4e18-9772-5d1e2315dd39',
        'http://localhost/RealEstate/index.php',
    
        // The return url can be set at later stages. You might want to do this if you want to pass data to the return url (like the reference of the transaction)
        'http://example.com/return?gateway=paynow'
    );
    
    # $paynow->setResultUrl('');
    # $paynow->setReturnUrl('');
    
    // $payment = $paynow->createPayment('Invoice 35', 'melmups@outlook.com');
    
    // $payment->add('Sadza and Beans', 1.25);
    
    // $response = $paynow->send($payment);
    
    
    // if($response->success()) {
    //     // Or if you prefer more control, get the link to redirect the user to, then use it as you see fit
    //     $link = $response->redirectUrl();
    
    //     $pollUrl = $response->pollUrl();
    
    
    //     // Check the status of the transaction
    //     $status = $paynow->pollTransaction($pollUrl);
    
    //}
  ?>
}
</script>
</head>
<body>

<div class="center">
  <button class="btn btn-success" name="login" value="Login" type="submit" onclick="handleClick()">Proceed to Pay</button>
</div>

</body>
</html>
