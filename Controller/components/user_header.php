<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

      <section class="flex">

      <a class="navbar-brand" href="../View/home.php"><i class='fa fa-paw'style='font-size:4rem; color:purple;'></i> P4Pet</a>
      
            <nav class="navbar">
               <a href="../View/home.php">Home</a>
        
               <a href="../View/courses.php"></i>Contents</a>
       
               <a href="../View/teachers.php"><span>Vets/Pharmacists</span></a>

               <a href="../View/food.php"><span>Foods</span></a>

               <a href="../View/review.php"><span>Reviews</span></a>

               <a href="../View/adoption.php"><span>Adoption</span></a>

               <a href="../View/quiz.php"><span>Fun Quiz</span></a>


            </nav>
        

      <div class="icons">
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="../Model/uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span>user</span>
         <a href="../View/profile.php" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="../View/login.php" class="option-btn">login</a>
            <a href="../View/register.php" class="option-btn">register</a>
         </div>
         <a href="../Controller/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         <?php
            }else{
         ?>
         <h3>please login or register</h3>
          <div class="flex-btn">
            <a href="../View/login.php" class="option-btn">login</a>
            <a href="../View/register.php" class="option-btn">register</a>
         </div>
         <?php
            }
         ?>
      </div>
</section>

</header>




<!-- header section ends -->


