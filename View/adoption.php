<?php

include '../Controller/components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['delete_adoption'])){

   $delete_id = $_POST['delete_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_delete = $conn->prepare("SELECT * FROM `adoptions` WHERE id = ?");
   $verify_delete->execute([$delete_id]);
   
   if($verify_delete->rowCount() > 0){
      $delete_adoption = $conn->prepare("DELETE FROM `adoptions` WHERE id = ?");
      $delete_adoption->execute([$delete_id]);
      $message[] = 'Adoption deleted!';
   }else{  
    $message[] = 'Adoption already deleted!';
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

<section class="quick-select">


   <div class="box-container">


      <div class="box tutor">
         <h3 class="title">Our Shelter home</h3>
         <p>A place where we provide healthcare and support to homeless animals.</p>
         <a href="../View/adoption.php#shelter" class="inline-btn">Sheltered Animal</a>
      </div>

      <div class="box tutor">
         <h3 class="title">Help for rescued paws !!!</h3>
         <p>The donations are directly used for the rescued animals whom are receiveing constant support in our shelter home.</p>
         <a href="../View/donate.php" class="inline-btn">Donate</a>
      </div>
   </div>

</section>

<section id="rev">

 <section class="about">

   <div class="row">

      <div class="image">
         <img src="../Controller/images/adopt.png" alt="">
      </div>

      <div class="content">
         <h3>Your Adoption Matters !</h3>
         <p>Helping a stray is important, if you find any and want them in good hands, we are your reliable source.</p>
         <a href="../View/add_adoption.php" class="inline-btn">Submit Adoption</a>
      </div>

   </div>

</section>

<!-- adoptions section starts  -->

<section class="courses">

   <h1 class="heading">user's adoptions</h1>

   <div class="box-container">
      <?php
         $select_adoptions = $conn->prepare("SELECT * FROM adoptions");
         $select_adoptions->execute();

         if($select_adoptions->rowCount() > 0){
            while($fetch_adoption = $select_adoptions->fetch(PDO::FETCH_ASSOC)){
               $adoption_id = $fetch_adoption['id'];

               $select_user = $conn->prepare("SELECT * FROM users WHERE id = ?");
               $select_user->execute([$fetch_adoption['user_id']]);
               $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

      ?>

      <div class="box">
         <p style="font-size: 1.5rem;"> <?= $fetch_adoption['description']; ?></p>
            <img src="../Model/uploaded_files/<?= $fetch_adoption['image']; ?>" class = "thumb" alt="">
         <div class="tutor">
            <img src="../Model/uploaded_files/<?= $fetch_user['image']; ?>">
            <div>
               <h3><?= $fetch_user['name']; ?></h3>
               <span><?= $fetch_adoption['date']; ?></span>
            </div>
         </div>
               <?php if($fetch_adoption['user_id'] == $user_id){ ?>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="delete_id" value="<?= $fetch_adoption['id']; ?>">
            <input type="submit" value="delete adoption" class="inline-delete-btn" name="delete_adoption" onclick="return confirm('delete this adoption?');">
         </form>
      <?php }; ?>  
      </div>
<?php
         }
      }else{
         echo '<p class="empty">no adoptions added yet!</p>';
      }
      ?>

</div>
</section>

</section>

<?php include '../Controller/components/shelter.php'; ?>

<!-- footer section starts  -->
<?php include '../Controller/components/footer.php'; ?>
<!-- footer section ends -->

<!-- custom js file link  -->
<script src="../View/js/script.js"></script>
   
</body>
</html>
