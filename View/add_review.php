<?php

include '../Controller/components/connect.php';


if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
  
}

if(isset($_POST['submit'])){

   if($user_id != ''){

      $id = unique_id();
      $description = $_POST['description'];
      $description = filter_var($description, FILTER_SANITIZE_STRING);
      $rating = $_POST['rating'];
      $rating = filter_var($rating, FILTER_SANITIZE_STRING);

      $verify_review = $conn->prepare("SELECT * FROM `reviews` WHERE user_id = ?");
      $verify_review->execute([$user_id]);

      if($verify_review->rowCount() > 0){
         $message[] = 'Your review already added!';
      }else{
         $add_review = $conn->prepare("INSERT INTO `reviews`(id,  user_id, rating, description) VALUES(?,?,?,?)");
         $add_review->execute([$id, $user_id,$rating,  $description]);
         $message[] = 'Review added!';
      }

   }else{
      $message[] = 'Please login first!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>add review</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../View/css/style.css">

</head>
<body>

   <?php include '../Controller/components/user_header.php'; ?>
   

<!-- add review section starts  -->

<section class="account-form">

   <form action="" method="post">
      <h3>post your review</h3>

      <p class="placeholder">review description</p>
      <textarea name="description" class="box" placeholder="enter review description" maxlength="1000" cols="30" rows="10"></textarea>
      <p class="placeholder">review rating <span>*</span></p>
      <select name="rating" class="box" required>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
      </select>
      <input type="submit" value="submit review" name="submit" class="btn">
      <a href="../View/review.php#rev" class="option-btn">go back</a>
   </form>

</section>

<!-- add review section ends -->
<?php include '../Controller/components/footer.php'; ?>


<!-- custom js file link  -->
<script src="../View/js/script.js"></script>


</body>
</html>