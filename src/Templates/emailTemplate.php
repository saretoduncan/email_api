<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Template</title>
</head>

<body>
  <p><?php echo $mail_content ?></p>
  <p>
    Best Regards, <br>
    <?php echo $customer_name ?><br>
    <?php echo "Phone Number: " ?><strong><?php echo $customer_phone_number ?></strong><br>
    <?php echo "Email: " ?><strong><?php echo $customer_email ?></strong><br>
    <?php echo "Address: " ?><strong><?php echo $customer_address ?></strong>

  </p>
</body>

</html>