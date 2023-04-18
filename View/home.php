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

$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
$select_likes->execute([$user_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
$select_comments->execute([$user_id]);
$total_comments = $select_comments->rowCount();

$select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
$select_bookmark->execute([$user_id]);
$total_bookmarked = $select_bookmark->rowCount();

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

   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
   
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include '../Controller/components/user_header.php'; ?>


<section class="home">

   <div class="swiper home-slider">
      
      <div class="swiper-wrapper">

         <section class="swiper-slide slide" style="background: url(../Controller/images/cat_cover_1.jpg) no-repeat;">
            <div class="content">
               <h3>Your Pet's Helping Hand!</h3>
               <h4 style="color: white;">“Time spent with cats is never wasted.” – Sigmund Freud</h4>
               <p></p>
            </div>
         </section>

         <section class="swiper-slide slide" style="background: url(../Controller/images/dog_cover_1.jpg) no-repeat;">
            <div class="content">
               <h3>Your Pet's Helping Hand!</h3>
               <h4 style="color: white;">“A dog is the only thing on earth that loves you more than you love yourself.” – Josh Billings</h4>
               <p></p>
            </div>
         </section>

         <section class="swiper-slide slide" style="background: url(../Controller/images/bird_cover_1.jpg) no-repeat;">
            <div class="content">
               <h3>Your Pet's Helping Hand!</h3>
               <h4 style="color: white;">"In order to see birds, it is necessary to become a part of the silence." - Robert Lynd</h4>
               <p></p>
                
            </div> 
         </section>
                
            </div>
         </section>


      </div>

      <div class="swiper-pagination"></div>

   </div>
 </section>
 <br> 

<section class="subjects">

   <h1 class="heading">Why Choose P4Pet?</h1> <br><br>

   <div class="box-container">

      <div class="box">
         <img src="../Controller/images/vet_icon_1.png" alt="">
         <h3>Medical inquiry</h3>
         <p>Medical related queries and vet schedules.</p>
      </div>

      <div class="box">
         <img src="../Controller/images/food_icon_1.png" alt="">
         <h3>Pet food informations</h3>
         <p>Pet wise food related informations.</p>
      </div>

      <div class="box">
         <img src="../Controller/images/breed_icon_1.png" alt="">
         <h3>Breed related information</h3>
         <p>Questionnaries related pet breeds.</p>
      </div>

      <div class="box">
         <img src="../Controller/images/adoption_1.png" alt="">
         <h3>Adoption</h3>
         <p>Adoption related posts.</p>
      </div>

   </div>

</section>



<section class="reviews" id="rev">

   <h1 class="heading">User reviews</h1>

   <div class="box-container">
      <?php
         $select_reviews = $conn->prepare("SELECT * FROM `reviews` limit 6");
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
<div class="more-btn box-container">
      <a href="../View/review.php" class="inline-option-btn" style="text-align: center;" >view more</a>
   </div>
</section>




<!-- footer section starts  -->
<?php include '../Controller/components/footer.php'; ?>
<!-- footer section ends -->

<!-- custom js file link  -->
<script src="../View/js/script.js"></script>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>

var swiper = new Swiper(".home-slider", {
  pagination: {
    el: ".swiper-pagination",
    clickable:true,
  },
  loop:true,
  grabCursor:true,
});
var swiper = new Swiper(".home-courses-slider", {
  loop:true,
  grabCursor:true,
  spaceBetween: 20,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
    },
  },
});
</script>

</body>
</html>