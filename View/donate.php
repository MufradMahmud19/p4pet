<?php

include '../Controller/components/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../View/css/style.css">

</head>
<body>

<?php include '../Controller/components/user_header.php'; ?>

<div style="text-align: center;">
   
<img src="../Controller/images/bkash.jpg" height="10%" width="30%" alt="">
<img src="../Controller/images/nagad.jpg" height="30%" width="30%" alt="">
<img src="../Controller/images/paypal.png" height="70%" width="30%" alt="">

</div>

<!-- footer section starts  -->
<?php include '../Controller/components/footer.php'; ?>
<!-- footer section ends -->

<!-- custom js file link  -->
<script src="../View/js/script.js"></script>
   
</body>
</html>