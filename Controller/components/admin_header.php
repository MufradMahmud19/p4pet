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

      <a href="../admin/dashboard.php" class="logo">Admin.</a>

      <nav class="navbar">
         <a href="../admin/dashboard.php">home</a>
      <a href="../admin/playlists.php">playlists</a>
      <a href="../admin/contents.php">content</a>
      <a href="../admin/comments.php">comments</a>
      <a href="../../Controller/admin_logout.php" onclick="return confirm('logout from this website?');">logout</a>
      </nav>

      <div class="icons">
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
            $select_profile->execute([$tutor_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="../uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span><?= $fetch_profile['profession']; ?></span>
         <a href="../admin/profile.php" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="../admin/login.php" class="option-btn">login</a>
            <a href="../admin/register.php" class="option-btn">register</a>
         </div>
         <a href="../../Controller/admin_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         <?php
            }else{
         ?>
         <h3>please login or register</h3>
          <div class="flex-btn">
            <a href="../admin/login.php" class="option-btn">login</a>
            <a href="../admin/register.php" class="option-btn">register</a>
         </div>
         <?php
            }
         ?>
      </div>

   </section>

</header>
<div class="courses-search">
 <form action="search_page.php" method="post" class="search-form">
         <input type="text" name="search" placeholder="search here..." required maxlength="100">
         <button type="submit" class="fas fa-search" name="search_btn"></button>
      </form>
</div>

<!-- header section ends -->

