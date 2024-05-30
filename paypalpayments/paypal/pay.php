<?php 

/* use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require '../src/start.php';

if(isset($_GET['approved'])) {
    $approved = $_GET['approved'] === 'true';

    if($approved) {
        $payerId = $_GET['PayerID'];

        // Prepare the SQL statement
        $paymentId = $con->prepare("
            SELECT payment_id 
            FROM transactions_paypal 
            WHERE hash = ?");
        
            
        // Bind parameters
        $paymentId->bind_param("s", $_SESSION['paypal_hash']);
        

        // Execute the statement
        $paymentId->execute();
        

        //$paymentId = $paymentId->fetchObject()->payment_id;

        $paymentId->bind_result($payment_id);

        $paymentId->fetch();
        var_dump($paymentId);

        //get payment from paypal
        $payment = Payment::get($payment_id, $api);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        //execute PayPal payment
        $payment->execute($execution, $api);

        //update the transaction into our database
        $updateTransaction = $con->prepare("
            UPDATE transactions_paypal
            SET complete = 1
            WHERE payment_id = ?
        ")or die($con->error);

        $updateTransaction->bind_param("s", $payment_id);

        // Execute the statement
        $updateTransaction->execute();

        die();

    }else {
        header('Location: ../paypal/cancelled.php');
    }
}
 */

 

 
 /* use PayPal\Api\Payment;
 use PayPal\Api\PaymentExecution;
 
 require '../src/start.php';
 
 if(isset($_GET['approved'])) {
     $approved = $_GET['approved'] === 'true';
 
     if($approved) {
         $payerId = $_GET['PayerID'];
 
         // Prepare the SQL statement
         $paymentId = $con->prepare("
             SELECT payment_id 
             FROM transactions_paypal 
             WHERE hash = ?");
         
         // Bind parameters
         $paymentId->bind_param("s", $_SESSION['paypal_hash']);
         
         // Execute the statement
         $paymentId->execute();
         
         // Store the result so it can be freed
         $paymentId->store_result();
 
         // Bind the result to a variable
         $paymentId->bind_result($payment_id);
 
         // Fetch the result
         $paymentId->fetch();
 
         // Free the result
         $paymentId->free_result();
 
         // Get payment from PayPal
         $payment = Payment::get($payment_id, $api);
 
         $execution = new PaymentExecution();
         $execution->setPayerId($payerId);
 
         // Execute PayPal payment
         $payment->execute($execution, $api);
 
         // Update the transaction in our database
         $updateTransaction = $con->prepare("
             UPDATE transactions_paypal
             SET complete = 1
             WHERE payment_id = ?
         ");
 
         $updateTransaction->bind_param("s", $payment_id);
 
         // Execute the statement
         $updateTransaction->execute();
 
         // Close the statement
         $updateTransaction->close();
 
         die();
 
     } else {
         header('Location: ../paypal/cancelled.php');
     }
 }
  */



  use PayPal\Api\Payment;
  use PayPal\Api\PaymentExecution;
  
  require '../src/start.php';
  
  if(isset($_GET['approved'])) {
      $approved = $_GET['approved'] === 'true';
  
      if($approved) {
          $payerId = $_GET['PayerID'];
  
          // Prepare the SQL statement
          $paymentId = $con->prepare("
              SELECT payment_id 
              FROM transactions_paypal 
              WHERE hash = ?");
          
          // Bind parameters
          $paymentId->bind_param("s", $_SESSION['paypal_hash']);
          
          // Execute the statement
          $paymentId->execute();
          
          // Store the result so it can be freed
          $paymentId->store_result();
  
          // Bind the result to a variable
          $paymentId->bind_result($payment_id);
  
          // Fetch the result
          $paymentId->fetch();
  
          // Check if the payment_id is null
          if($payment_id === null) {
              // Handle the error appropriately
              die('Payment ID is null.');
          }
  
          // Free the result
          $paymentId->free_result();
  
          // Get payment from PayPal
          $payment = Payment::get($payment_id, $api);
  
          $execution = new PaymentExecution();
          $execution->setPayerId($payerId);
  
          // Execute PayPal payment
          $payment->execute($execution, $api);
  
          // Update the transaction in our database
          $updateTransaction = $con->prepare("
              UPDATE transactions_paypal
              SET complete = 1
              WHERE payment_id = ?
          ");
  
          $updateTransaction->bind_param("s", $payment_id);
  
          // Execute the statement
          $updateTransaction->execute();
  
          // Close the statement
          $updateTransaction->close();
  
          die();
  
      } else {
          header('Location: ../paypal/cancelled.php');
      }
  }
  
  ?>
  
 
?>