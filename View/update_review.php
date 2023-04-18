<?php

include '../Controller/components/connect.php';

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
}

if(isset($_POST['submit'])){

   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $rating = $_POST['rating'];
   $rating = filter_var($rating, FILTER_SANITIZE_STRING);

   $update_review = $conn->prepare("UPDATE `reviews` SET rating = ?, description = ? WHERE id = ?");
   $update_review->execute([$rating, $description, $get_id]);

   $message[] = 'Review updated!';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update review</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../View/css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include '../Controller/components/user_header.php'; ?>
<!-- header section ends -->

<!-- update reviews section starts  -->

<section class="account-form">

   <?php
      $select_review = $conn->prepare("SELECT * FROM `reviews` WHERE id = ? LIMIT 1");
      $select_review->execute([$get_id]);
      if($select_review->rowCount() > 0){
         while($fetch_review = $select_review->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post">
      <h3>edit your review</h3>
      <p class="placeholder">review description</p>
      <textarea name="description" class="box" placeholder="enter review description" maxlength="1000" cols="30" rows="10"><?= $fetch_review['description']; ?></textarea>
      <p class="placeholder">review rating <span>*</span></p>
      <select name="rating" class="box" required>
         <option value="<?= $fetch_review['rating']; ?>"><?= $fetch_review['rating']; ?></option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
      </select>
      <input type="submit" value="update review" name="submit" class="btn">
      <a href="../View/review.php#rev" class="option-btn">go back</a>
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">something went wrong!</p>';
      }
   ?>

</section>

<!-- update reviews section ends -->
<?php include '../Controller/components/footer.php'; ?>

<!-- custom js file link  -->
<script src="../View/js/script.js"></script>

</body>
</html>