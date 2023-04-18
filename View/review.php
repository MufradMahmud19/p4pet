<?php

include '../Controller/components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['delete_review'])){

   $delete_id = $_POST['delete_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_delete = $conn->prepare("SELECT * FROM `reviews` WHERE id = ?");
   $verify_delete->execute([$delete_id]);
   
   if($verify_delete->rowCount() > 0){
      $delete_review = $conn->prepare("DELETE FROM `reviews` WHERE id = ?");
      $delete_review->execute([$delete_id]);
      $message[] = 'Review deleted!';
   }else{  
    $message[] = 'Review already deleted!';
   }

}


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

 <section class="about">

   <div class="row">

      <div class="image">
         <img src="../Controller/images/review.png" alt="">
      </div>

      <div class="content">
         <h3>Your Review Matters !</h3>
         <p>Please give your valuable reviews to help us to improve and don't forget to rate us.</p>
         <a href="../View/add_review.php" class="inline-btn">Submit Review</a>
      </div>

   </div>

</section>

<!-- reviews section starts  -->

<section class="reviews" id="rev">

   <h1 class="heading">user reviews</h1>

   <div class="box-container">
      <?php
         $select_reviews = $conn->prepare("SELECT * FROM `reviews`");
         $select_reviews->execute();

         if($select_reviews->rowCount() > 0){
            while($fetch_review = $select_reviews->fetch(PDO::FETCH_ASSOC)){
               $review_id = $fetch_review['id'];

               $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
               $select_user->execute([$fetch_review['user_id']]);
               $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

      ?>

      <div class="box">
         <p><?= $fetch_review['description']; ?></p>
         <div class="user">
            <img src="../Model/uploaded_files/<?= $fetch_user['image']; ?>">
            <div>
               <h3><?= $fetch_user['name']; ?></h3>
               <div class="stars">
                  <?php if($fetch_review['rating'] == 1){ ?>
            <i class="fas fa-star"></i>
         <?php }; ?> 
         <?php if($fetch_review['rating'] == 2){ ?>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
      
         <?php }; ?>
         <?php if($fetch_review['rating'] == 3){ ?>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         <?php }; ?>   
         <?php if($fetch_review['rating'] == 4){ ?>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         <?php }; ?>
         <?php if($fetch_review['rating'] == 5){ ?>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         <?php }; ?>
               </div>
            </div>
         </div>
               <?php if($fetch_review['user_id'] == $user_id){ ?>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="delete_id" value="<?= $fetch_review['id']; ?>">
            <a href="../View/update_review.php?get_id=<?= $fetch_review['id']; ?>" class="inline-option-btn">edit review</a>
            <input type="submit" value="delete review" class="inline-delete-btn" name="delete_review" onclick="return confirm('delete this review?');">
         </form>
      <?php }; ?>  
      </div>
<?php
         }
      }else{
         echo '<p class="empty">no reviews added yet!</p>';
      }
      ?>

</div>
</section>



<!-- footer section starts  -->
<?php include '../Controller/components/footer.php'; ?>
<!-- footer section ends -->

<!-- custom js file link  -->
<script src="../View/js/script.js"></script>
   
</body>
</html>