<?php

   include '../components/connect.php';

   if(isset($_COOKIE['vet_id'])){
      $vet_id = $_COOKIE['vet_id'];
   }else{
      $vet_id = '';
      header('location:login.php');
   }

   $select_vet_infos = $conn->prepare("SELECT * FROM `vet_info` WHERE vet_id = ?");
   $select_vet_infos->execute([$vet_id]);
   $total_vet_infos = $select_vet_infos->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);"> 

   <h1 class="heading">profile details</h1>

   <div class="details">
      <div class="tutor">
         <img src="../uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span><?= $fetch_profile['profession']; ?></span>
         <a href="update.php" class="inline-btn">update profile</a>
      </div>
      <div class="flex">
         <div class="box">
            <span><?= $total_vet_infos; ?></span>
            <p>total vet_infos</p>
            <a href="vet_infos.php" class="btn">view vet_infos</a>
         </div>
      </div>
   </div>

</section>















<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>

