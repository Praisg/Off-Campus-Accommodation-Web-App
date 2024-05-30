
<?php 

use PayPal\Api\Payer;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Exception\PPConnectionException;

require '../src/start.php';

$payer = new Payer();
$details = new Details();
$amount = new Amount();
$transaction = new Transaction();
$payment = new Payment();
$redirectUrls = new RedirectUrls();


//payer
$payer->setPaymentMethod('paypal');


//details
$details->setShipping('0.00')
    ->setTax('0.00')
    ->setSubtotal('100.00');


//Amount
$amount->setCurrency('USD')
    ->setTotal('100.00')
    ->setDetails($details);


//Transaction
$transaction->setAmount($amount)
    ->setDescription('Room of 4');

//payment
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions([$transaction]);

//Redirect URLs
$redirectUrls->setReturnUrl('http://localhost/paypalpayments/paypal/pay.php?approved=true')
    ->setCancelUrl('http://localhost/paypalpayments/paypal/pay.php?approved=false');

$payment->setRedirectUrls($redirectUrls);

try {
    $payment->create($api);

    //Generate and store hash
    $hash = md5($payment->getId());
    $_SESSION['paypal_hash'] = $hash;

    //Prepare and execute transaction storage
    /* $store = $con->prepare("
        INSERT INTO transactions_paypal (user_id, payment_id, hash, complete)
        VALUES (:user_id, :payment_id, :hash, 0)
    "); 
    
    $store->execute([
        'user_id' => $_SESSION['user_id'],
        'payment_id' => $payment->getId(),
        'hash' => $hash
        
    ])
    */

    $stmt = $con->prepare("INSERT INTO transactions_paypal (user_id, payment_id, hash, complete) VALUES (?, ?, ?, 0)");
    $stmt->bind_param("iss", $_SESSION['user_id'], $payment->getId(), $hash);

    // Execute the statement
    $stmt->execute();

    // Close the statement
    $stmt->close();

} catch (PPConnectionException $e){
    //perhaps log error here
    header('Location: ../paypal/error.php');
}


foreach($payment->getLinks() as $link) {
    if($link->getRel() == 'approval_url'){
        $redirectUrl = $link->getHref();
    }
}

header('Location: '.$redirectUrl)

?>