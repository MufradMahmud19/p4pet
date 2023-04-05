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
   <title>Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="dashboard">

   <h1 class="heading">dashboard</h1>

   <div class="box-container">

      <div class="box">
         <h3>welcome!</h3>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="profile.php" class="btn">view profile</a>
      </div>

      <div class="box">
         <h3><?= $total_vet_infos; ?></h3>
         <p>total vet_infos</p>
         <a href="add_vet_info.php" class="btn">add new vet_info</a>
      </div>

      <div class="box">
         <h3>quick select</h3>
         <p>login or register</p>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
      </div>

   </div>

</section>















<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>

