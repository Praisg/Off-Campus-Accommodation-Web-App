<?php
require 'start.php';


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>STUDENT PAYMENT</title>
    <head>
    <body>
        <?php if ($user->has_paid): ?>
            <p> You have paid</p>
        <?php else: ?>
            <p>Proceed to <a href="../student/payment.php">PAY</a></p>
        <?php endif; ?>
    </body>
</html>