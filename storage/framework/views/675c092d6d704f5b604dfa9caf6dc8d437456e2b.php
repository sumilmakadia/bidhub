<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body style="background-color: #fff;">
<p style="margin-bottom:15px;font-weight:bold;">Claim Listing Request:</p>
<?php echo e($contact_name); ?><br>
<?php echo e($company_name); ?><br>
<?php echo e($phone); ?><br>
<?php echo e($email); ?><br>

<p style="margin-bottom:15px;font-weight:bold;">Associated Listing:</p>
<?php echo e($uploaded->businessName); ?><br>
<?php echo e($uploaded->contactName); ?><br>
<?php echo e($uploaded->phoneNumber); ?><br>
<?php echo e($uploaded->email); ?><br>
<p style="margin-bottom:5px;">https://bidhub.com</p>
</body>
</html><?php /**PATH /home/bidhub/bidhub/resources/views/emails/claimed.blade.php ENDPATH**/ ?>